<?php
/**
 * Index template
 *
 * @file    index.php
 * @package CPT_Theme
 * @since   1.0.0
 */

get_header();
?>

<?php if ( ! is_front_page() ) { ?>
	<header class="page-header wp-block-group has-global-padding is-layout-constrained">
		<h1 class="headline wp-block-post-title">
			<?php
			if ( is_home() && ! is_front_page() && single_post_title() ) {
				single_post_title();
			} elseif ( is_archive() ) {
				the_archive_title();
			} elseif ( is_search() ) {
				echo 'Search Results for "' . esc_html( get_search_query() ) . '"';
			}
			?>
		</h1>
		<?php if ( is_archive() && ! empty( get_the_archive_description() ) ) { ?>
			<div class="term-description wp-block-group alignfull has-global-padding is-layout-constrained has-gray-wash-background-color">
				<?php the_archive_description(); ?>
			</div>
		<?php } ?>
		<?php if ( is_search() ) { ?>
			<form 
				role="search" 
				method="get" 
				action="<?php echo esc_url( home_url() ); ?>http://robots.local/" 
				class="wp-block-search__button-outside wp-block-search__text-button wp-block-search"
			>
				<label 
					for="wp-block-search__input-1" 
					class="wp-block-search__label screen-reader-text"
				>Search</label>
				<div class="wp-block-search__inside-wrapper ">
					<input 
						type="search" 
						id="wp-block-search__input-1" 
						class="wp-block-search__input " 
						name="s" 
						value="<?php echo esc_attr( get_search_query() ); ?>" 
						placeholder="" 
						required=""
					>
					<button type="submit" class="wp-block-search__button wp-element-button">Search</button>
				</div>
			</form>
		<?php } ?>
	</header>
<?php } ?>

<div class="posts wp-block-query has-global-padding is-layout-constrained">
	<?php
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post();
			get_template_part( 'template-parts/loop-index' );
		}
		the_posts_pagination();
	} else {
		echo '<p class="post">' . esc_html__( 'No posts match your query.', 'cpt-theme' ) . '</p>';
	}
	?>
</div>

<?php get_footer(); ?>
