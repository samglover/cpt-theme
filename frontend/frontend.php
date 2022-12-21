<?php

function read_more_link() {
  return '<p><a class="more-link button button-small" href="' . get_permalink() . '">' . __('Read More', 'cpt-theme') . '</a></p>';
}
add_filter('the_content_more_link', 'read_more_link');