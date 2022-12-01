<?php

get_header();

  if (have_posts()) {
    while (have_posts()) {
      the_post();
      get_template_part('template-parts/loop-single');
    }
    if (comments_open() || get_comments_number()) comments_template();
  } else {
    echo '<p class="post">No posts match your query.</p>';
  }

get_footer();
