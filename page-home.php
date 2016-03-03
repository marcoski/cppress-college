<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CPPressCollege
 */

get_header(); ?>
<div class="content container">
	<?php 
		while( have_posts() ){ the_post(); }
		the_content();
		get_template_part('template-parts/bookmarks');
	?>
</div>
<?php
get_footer();
