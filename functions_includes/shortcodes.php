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
		return '<div class="inline-list">'.do_shortcode($content).'</div>';}
	add_shortcode('inline-list', 'inline_list_shortcode');


	function div_class_shortcode($atts, $content = null) {
		extract(shortcode_atts( array(
			'class' => '',
		), $atts));
		return '<div class="'.esc_attr($class).'">'.do_shortcode($content).'</div>';
	}
	add_shortcode('div_class', 'div_class_shortcode');

	// Grid Shortcodes
		function grid_row_shortcode($atts, $content = null) {
			return '<div class="grid-row">'.do_shortcode($content).'</div>';}
		add_shortcode('grid_row', 'grid_row_shortcode');
		
		function grid_col_3_4_shortcode($atts, $content = null) {
			return '<div class="grid-3-4">'.do_shortcode($content).'</div>';}
		add_shortcode('grid_3_4', 'grid_col_3_4_shortcode');
		
		function grid_col_2_3_shortcode($atts, $content = null) {
			return '<div class="grid-2-3">'.do_shortcode($content).'</div>';}
		add_shortcode('grid_2_3', 'grid_col_2_3_shortcode');
		
		function grid_col_1_2_shortcode($atts, $content = null) {
			return '<div class="grid-1-2">'.do_shortcode($content).'</div>';}
		add_shortcode('grid_1_2', 'grid_col_1_2_shortcode');
		
		function grid_col_1_3_shortcode($atts, $content = null) {
			return '<div class="grid-1-3">'.do_shortcode($content).'</div>';}
		add_shortcode('grid_1_3', 'grid_col_1_3_shortcode');
		
		function grid_col_1_4_shortcode($atts, $content = null) {
			return '<div class="grid-1-4">'.do_shortcode($content).'</div>';}
		add_shortcode('grid_1_4', 'grid_col_1_4_shortcode');



	remove_filter('the_content', 'wpautop');
	remove_filter('the_content', 'wptexturize');
	add_filter('the_content', 'my_formatter', 99);
?>