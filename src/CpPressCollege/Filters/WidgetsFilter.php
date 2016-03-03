<?php
namespace CpPressCollege\Filters;

use CpPress\Application\WP\Hook\Filter;
use CpPress\CpPress;

class WidgetsFilter extends Filter{
	
	private static $instance = null;
	
	public static function add(){
		if(is_null(self::$instance)){
			self::$instance = new static(CpPress::$App);
		}
		
		self::$instance->register('cppress_widget_the_title', function($the_title, $title){
			return self::$instance->theTitle($the_title, $title);
		}, 9, 2);
		
		self::$instance->register('cppress_widget_slider_classes', function($classes, $slides, $options){
			if($options['theme'] === 'flexer'){
				$classes[] = 'slider';
			}
			
			return $classes;
		}, 10, 3);
		
		self::$instance->register('cppress_widget_slider_caption_classes', function($classes, $slides, $options=null){
			if($options['theme'] === 'flexer'){
				$classes = array('flex-caption');
			}
			
			return $classes;
		}, 10, 3);
		
		self::$instance->register('cppress_widget_slider_before', function($before, $slides, $options, $id){
			return self::$instance->sliderWrapper($before, $slides, $options, $id,  true);
		}, 10, 4);
		
		self::$instance->register('cppress_widget_slider_after', function($before, $slides, $options, $id){
			return self::$instance->sliderWrapper($before, $slides, $options, $id, false);
		}, 10, 4);
		
		self::$instance->register('cppress_widget_slider_post_item_classes', function($classes, $slides, $options){
			if(is_front_page() && strtolower($options['title']) === 'corsi'){
				$classes[] = 'news-item';
			}
			return $classes;
		}, 10, 3);
		
		self::$instance->register('cppress_widget_slider_tag', function($tag, $slides, $options){
			if(is_front_page() && strtolower($options['title']) === 'corsi'){
				return 'div';
			}
			
			return $tag;
		}, 10, 3);
		
		self::$instance->register('cppress_widget_before', function($before, $classes, $id, $instance, $section){
			return self::$instance->widgetWrapper($before, $instance, $section, true);
		}, 10, 5);
		
		self::$instance->register('cppress_widget_after', function($after, $classes, $id, $instance, $section){
			return self::$instance->widgetWrapper($after, $instance, $section, false);
		}, 10, 5);
		
		
		self::$instance->execAll();
	}
	
	
	public function theTitle($the_title, $title){
		if(is_front_page()){
			return '<h1 class="section-heading text-highlight"><span class="line">' . $title . '</span></h1>';
		}
		
		return '<h3 class="title">' . $title . '</h3>';
	}
	
	public function widgetWrapper($return, $instance, $section, $isBefore){
		if(is_front_page() && ($section === 3 || $section === 4)){
			if($isBefore){
				return '<section class="' . strtolower($instance['wtitle']) . '">';
			}
			
			return '</section>';
		}
		
		return $return;
	}
	
	public function sliderWrapper($return, $slides, $options, $id, $isBefore){
		if(is_front_page() && $options['theme'] === 'bootstrap'){
			if($isBefore){
				return '<div class="carousel-controls">
						<a class="prev" href="#' . $id . '" data-slide="prev"><i class="fa fa-caret-left"></i></a>
						<a class="next" href="#' . $id . '" data-slide="next"><i class="fa fa-caret-right"></i></a>
					</div><!--//carousel-controls--> 
					<div class="section-content clearfix">';
			}else{
				return '</div>';
			}
		}
		
		return $return;
	}
	
	
	
}