<?php
/* ********************
-----------------------
	Shortcode Functions
-----------------------
******************** */

/*
	Shortcode to Remove AutoP
	To use wrap your content with
	[raw]... Content ...[/raw]
*/
	function my_formatter($content) {
		$new_content = '';
		$pattern_full = '{(\[raw\].*?\[/raw\])}is';
		$pattern_contents = '{\[raw\](.*?)\[/raw\]}is';
		$pieces = preg_split($pattern_full, $content, -1, PREG_SPLIT_DELIM_CAPTURE);
		foreach ($pieces as $piece) {
			if (preg_match($pattern_contents, $piece, $matches)) {
				$new_content .= $matches[1];
			} else {
				$new_content .= wptexturize(wpautop($piece));
			}
		}
		return $new_content;
	}


/* Basic Shortcode Format
	function SHORTCODE_NAME($atts, $content = null) {
		return '<div class="CLASS_NAME">'.do_shortcode($content).'</div>';}
	add_shortcode('SHORTCODE_NAME', 'SHORTCODE_NAME');
*/

	function inline_list_shortcode($atts, $content = null) {
		return '<div class="inline-list ">'.do_shortcode($content).'</div>';}
	add_shortcode('inline-list', 'inline_list_shortcode');



	remove_filter('the_content', 'wpautop');
	remove_filter('the_content', 'wptexturize');
	add_filter('the_content', 'my_formatter', 99);
?>