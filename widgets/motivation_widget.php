<?php
/*
Plugin Name: Motivation Widget
Plugin URI: http://www.nulpointr.com/
Description: Shows motivation and tips articles
Author: Barry Nix
Version: 1.0
Author URI: http://www.nulpointr.com/
*/
 
 
class MotivationWidget extends WP_Widget
{
	function MotivationWidget()
	{
		$widget_ops = array('classname' => 'MotivationWidget', 'description' => 'Shows motivation and tips articles' );
		$this->WP_Widget('MotivationWidget', 'Motivation & Tips', $widget_ops);
	}
 
	function form($instance)
	{
		
	}

	function update($new_instance, $old_instance)
	{
		
	}

	function widget($args, $instance)
	{
		extract($args, EXTR_SKIP);
		
		echo $before_widget;
		
		echo "<h1>This is my new widget!</h1>";
		
		echo $after_widget;
	}

}

add_action( 'widgets_init', create_function('', 'return register_widget("MotivationWidget");') );
?>