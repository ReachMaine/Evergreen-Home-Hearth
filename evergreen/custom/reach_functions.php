<?php 
/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */
/* zig: Strip out the 'archives' */

function fix_browswer_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}
	$title = substr_replace($title, 'Archives', 0);
	return $title;
	//return $title;
}

?>