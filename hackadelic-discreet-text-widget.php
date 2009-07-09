<?php 
//---------------------------------------------------------------------------------------------
/*
Plugin Name: Hackadelic Discreet Text Widget
Version: 0.1
Plugin URI: http://hackadelic.com/solutions/wordpress/discreet-text-widget
Description: Ajax sliders for content fragments
Author: Hackadelic
Author URI: http://hackadelic.com
*/
//---------------------------------------------------------------------------------------------

require_once ABSPATH . '/wp-includes/default-widgets.php';

class HackadelicDiscreetTextWidget extends WP_Widget_Text
{
	function HackadelicDiscreetTextWidget() {
		$widget_ops = array('classname' => 'discreet_text_widget', 'description' => __('Arbitrary text or HTML, only shown if not empty'));
		$control_ops = array('width' => 400, 'height' => 350);
		$this->WP_Widget('discrete_text', __('Discreet Text'), $widget_ops, $control_ops);
	}

	function widget( $args, $instance ) {
		extract($args, EXTR_SKIP);
		$text = apply_filters( 'widget_text', $instance['text'] );
		if (empty($text)) return;
		$title = apply_filters('widget_title', empty($instance['title']) ? '' : $instance['title']);
		echo $before_widget;
		if ( !empty( $title ) ) { echo $before_title . $title . $after_title; } ?>
			<div class="textwidget"><?php echo $instance['filter'] ? wpautop($text) : $text; ?></div>
		<?php
		echo $after_widget;
	}
}

add_action('widgets_init', create_function('', 'return register_widget("HackadelicDiscreetTextWidget");'));

?>