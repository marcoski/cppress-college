<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CpPress_College_Theme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper">
		<header class="header">  
			<div class="top-bar">
				<div class="container">              
					<?php get_template_part('template-parts/social'); ?>
					<?php get_search_form(); ?>       
				</div>      
			</div><!--//to-bar-->
			<div class="header-main container">
				<h1 class="logo col-md-4 col-sm-4">
					<a href="<?php echo home_url(); ?>"><img id="logo" src="<?= get_stylesheet_directory_uri() ?>/img/logo.png" alt="Logo"></a>
				</h1><!--//logo-->           
				<div class="info col-md-8 col-sm-8">
					<div class="banner pull-right">
						<img class="img-responsive hidden-xs" src="<?= get_stylesheet_directory_uri() ?>/img/banner2.png" alt="Logo">
					</div><!--//contact-->
				</div><!--//info-->
			</div><!--//header-main-->
		</header>
		<? get_template_part('template-parts/navigation'); ?>