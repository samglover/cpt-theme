<?php
/**
 * Frontend functions
 *
 * @file       frontend.php
 * @package    CPT_Theme
 * @subpackage Frontend
 * @since      1.0.0
 */

add_filter( 'body_class', 'cpt_body_classes' );
/**
 * Adds a `cpt-theme` class to the <body> tag for CSS customization.
 *
 * @param array $classes An array of body class names.
 */
function cpt_body_classes( $classes ) {
	$classes[] = 'cpt-theme';
	return $classes;
}

add_filter( 'the_content_more_link', 'read_more_link' );
/**
 * Customizes the read-more link.
 */
function read_more_link() {
	ob_start()
	?>
	<p>
		<a 
			class="more-link button button-small wp-element-button" 
			href="<?php echo esc_url( get_permalink() ); ?>"
		><?php esc_html_e( 'Read More', 'cpt-theme' ); ?></a>
	</p>
	<?php
	return ob_get_clean();
}


/**
 * Outputs a post's categories and tags.
 *
 * @param int $post_id The post id (optional).
 */
function cpt_the_terms( $post_id = false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	if ( ! $post_id ) {
		return;
	}

	if (
		! get_option( 'cpt_sites_show_categories' )
		&& ! get_option( 'cpt_sites_show_tags' )
	) {
		return;
	}

	$terms = '';

	if ( get_option( 'cpt_sites_show_categories' ) ) {
		$categories = get_the_category();
		if ( $categories ) {
			foreach ( $categories as $category ) {
				$terms .= '<a class="post-category post-tag" href="' . get_term_link( $category->term_id ) . '" rel="tag">' . esc_html( $category->name ) . '</a> ';
			}
		}
	}

	if ( get_option( 'cpt_sites_show_tags' ) ) {
		$tags = get_the_tags();
		if ( $tags ) {
			foreach ( $tags as $tag ) {
				$terms .= '<a class="post-tag" href="' . get_term_link( $tag->term_id ) . '" rel="tag">' . esc_html( $tag->name ) . '</a> ';
			}
		}
	}

	if ( empty( $terms ) ) {
		return;
	}

	?>
	<p class="post-terms wp-block-post-terms">
		<?php echo wp_kses_post( $terms ); ?>
	</p>
	<?php
}

/**
 * Checks to see if the post has a title. Must be used in the loop.
 *
 * @return bool
 */
function has_post_title( $post_id = false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	if ( ! $post_id ) {
		return;
	}

	if ( ! empty( get_the_title( $post_id ) ) ) {
		return true;
	}

	return false;
}
/**
 * Checks to see if the post has a title or thumnail. Must be used in the loop.
 *
 * @param int $post_id The post id (optional).
 * @return bool
 */
function has_post_header( $post_id = false ) {
	if ( ! $post_id ) {
		$post_id = get_the_ID();
	}

	if ( ! $post_id ) {
		return;
	}

	if ( has_post_title( $post_id ) || has_post_thumbnail( $post_id ) ) {
		return true;
	}

	return false;
}

add_filter( 'document_title_parts', 'cpt_no_title_title_tag' );
/**
 * Uses the first 15 words of the content for the `title` tag if there is no post title.
 *
 * @param array $title_parts The post title.
 * @return string
 */
function cpt_no_title_title_tag( $title_parts ) {
	if (
		doing_action( 'wp_head' ) &&
		is_singular() &&
		! has_post_title()
	) {
		$title_parts['title'] = wp_trim_words( wp_strip_all_tags( get_the_content() ), 15, '…' );
	}

	return $title_parts;
}

if ( get_option( 'cpt_sites_open_external_links_in_new_tab' ) ) {
	add_filter( 'the_content', 'cpt_open_external_links_in_new_tab' );
	add_filter( 'the_excerpt', 'cpt_open_external_links_in_new_tab' );
	add_filter( 'widget_text', 'cpt_open_external_links_in_new_tab' );
	add_filter( 'widget_custom_html', 'cpt_open_external_links_in_new_tab' );
	add_filter( 'wp_nav_menu', 'cpt_open_external_links_in_new_tab' );
	add_filter( 'comment_text', 'cpt_open_external_links_in_new_tab' );
}
/**
 * Adds `target="_blank"` to external links in the supplied HTML.
 *
 * @param string $content An HTML string.
 * @return string
 */
function cpt_open_external_links_in_new_tab( $content ) {
	// Exit if there are no links.
	if ( stripos( $content, '<a ' ) === false ) {
		return $content;
	}

	$this_website = wp_parse_url( home_url(), PHP_URL_HOST );
	$show_icon    = get_option( 'cpt_sites_show_external_link_icon' );

	// Suppress HTML parsing errors.
	libxml_use_internal_errors( true );

	$doc = new DOMDocument();
	// Load $doc as a UTF-8 HTML fragment.
	$doc->loadHTML(
		'<?xml encoding="UTF-8">' . $content,
		LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD
	);

	$links = $doc->getElementsByTagName( 'a' );

	foreach ( $links as $link ) {
		$href = $link->getAttribute( 'href' );
		if ( empty( $href ) || strpos( $href, 'http' ) !== 0 ) {
			continue; // Skip non-http links (anchors, mailto, etc.).
		}

		$link_website = wp_parse_url( $href, PHP_URL_HOST );

		// Add `target="_blank"` if the link is external.
		if ( $link_website && $link_website !== $this_website && strpos( $link_website, $this_website ) === false ) {
			$link->setAttribute( 'target', '_blank' );

			// Add or merge `rel="noopener, noreferrer"` attributes.
			$existing_rel  = $link->getAttribute( 'rel' );
			$required_rels = array( 'noopener', 'noreferrer' );

			$rels = array_unique(
				array_filter(
					array_merge(
						preg_split( '/\s+/', $existing_rel, -1, PREG_SPLIT_NO_EMPTY ),
						$required_rels
					)
				)
			);

			$link->setAttribute( 'rel', implode( ' ', $rels ) );

			// Add external link icon if option is enabled.
			if ( $show_icon ) {
				$icon = $doc->createElement( 'i' );
				$icon->setAttribute( 'class', 'cpt-icon external-link' );
				$link->appendChild( $icon );
			}
		}
	}

	$html = $doc->saveHTML();

	libxml_clear_errors();

	return $html;
}