<?php
use CpPress\CpPress;
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package CpPress_College_Theme
 */
$app = CpPress::$App;

get_header(); ?>
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
			<?php the_title('<h1 class="heading-title pull-left">', '</h1>'); ?>
			<div class="breadcrumbs pull-right">
				<?php	$app::main('Breadcrumb', 'show', $app->getContainer(), array($post)); ?>
			</div>
		</header>
		<?php 
			while( have_posts() ){ the_post(); }
			the_content();
		?>
	</div>
</div>
<?php
get_footer();
