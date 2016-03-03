<?php
namespace CpPressCollege\Filters;

use CpPress\Application\WP\Hook\Filter;
use CpPress\CpPress;

class LayoutFilter extends Filter{
	
	private static $instance = null;
	
	public static function add(){
		if(is_null(self::$instance)){
			self::$instance = new static(CpPress::$App);
		}
		
		self::$instance->register('body_class', function($classes){
			$classes = array();
			if(is_front_page()){
				$classes[] = 'home-page';
			}
			return $classes;
		});
		
		self::$instance->register('cppress_layout_section_tag', function($tag, $section){
			if($section['slug'] === 'footer-content' ||
					$section['slug'] === 'home-slider' ||
					$section['slug'] === 'cols-wrapper'){
				return 'div';
			}
			return $tag;
		}, 10, 2);
		
		self::$instance->register('cppress_layout_section_classes', function($classes, $post, $section){
			if($section['slug'] === 'promo'){
				$classes[] = 'box';
				$classes[] = 'box-dark';
			}
			if($section['slug'] === 'cols-wrapper'){
				$classes[] = 'row';
			}
			return $classes;
		}, 10, 3);
		
		self::$instance->register('cppress_layout_cell_classes', function($classes, $post, $cell, $section){
			if($section === 'footer-content'){
				$classes[] = 'footer-col';
			}
			return $classes;
		}, 10, 4);
		
		self::$instance->register('cppress_layout_widget_before', function($before, $cell, $section){
			return self::$instance->widgetWrapper($before, $cell, $section, true);
		}, 10, 3);
		
		self::$instance->register('cppress_layout_widget_after', function($after, $cell, $section){
			return self::$instance->widgetWrapper($after, $cell, $section, false);
		}, 10, 3);
		
		self::$instance->register('cppress_layout_grid_container_open', function($open, $section){
			if($section !== 'footer-content'){
				return self::$instance->removeContainer();
			}
			
			return $open;
		}, 10, 2);
		
		self::$instance->register('cppress_layout_grid_container_close', function($close, $section){
			if($section !== 'footer-content'){
				return self::$instance->removeContainer();
			}
			
			return $close;
		}, 10, 2);
		
		self::$instance->register('cppress_layout_grid_classes', function($classes, $post, $grid, $section){
			if($section === 'cols-wrapper'){
				if(($key = array_search('row', $classes)) !== false) {
					unset($classes[$key]);
				}
			}
			
			return $classes;
		}, 10, 4);
		
		self::$instance->register('the_content_more_link', function($more, $link){
			return self::$instance->more($more, $link);
		}, 10, 2);
	
		self::$instance->execAll();
	}
	
	public function widgetWrapper($return, $cell, $section, $isBefore){
		if($section === 'footer-content'){
			if($isBefore){
				return '<div class="footer-col-inner">';
			}
			
			return '</div>';
		}
		return $return;
	}
	
	public function removeContainer(){
		return '';
	}
	
	public function more($more, $link){
		return '<a class="read-more" href="' . get_permalink() . '">Read more <i class="fa fa-chevron-right"></i></a>';
	}
	
}