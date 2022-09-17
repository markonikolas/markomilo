<?php
/**
 * Utility functions.
 *
 * @package markomilo
 */

namespace MarkoMilo;

/**
 * Get next post if on last post.
 *
 * @param string  $direction - previous or next post.
 * @param string  $type - post type.
 * @param WP_Post $current - current post.
 */
function custom_posttype_get_adjacent_id( $direction = 'next', $type = 'post', $current ) {

	$posts = get_posts( 'posts_per_page=-1&order=DESC&post_type=' . $type );

	$post_length   = count( $posts ) - 1;
	$current_index = 0;
	$index         = 0;
	$result        = 0;

	foreach ( $posts as $post ) {
		if ( $post->ID === $current ) {
			$current_index = $index;
		}
		$index++;
	}
	if ( 'prev' === $direction ) {
		$result = ! $current_index ? $posts[ $post_length ]->ID : $posts[ $current_index - 1 ]->ID;
	} else {
		$result = $current_index === $post_length ? $posts[0]->ID : $posts[ $current_index + 1 ]->ID;
	}
	return $result;
}
