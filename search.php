<?php
use CpPress\CpPress;
/**
 * The template for displaying search results pages.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package CpPress_College_Theme
 */

get_header();
$app = CpPress::$App;
?>
<div class="content container">
	<div class="page-wrapper">
		<header class="page-heading clearfix">
			<h1 class="heading-title pull-left"><?php _e('Risultati della ricerca:'); ?> <?php the_search_query(); ?></h1>
			<div class="breadcrumbs pull-right">
				<?php	$app::main('Breadcrumb', 'show', $app->getContainer(), array($post)); ?>
			</div>
		</header>
		<div class="page-content">
			<div class="row page-row">
				<div class="col-md-12">
				<?php
					while(have_posts()):
						the_post();
				?>
					<article class="news-item page-row has-divider clearfix">
					  <?php if(has_post_thumbnail()): ?>  
						<figure class="thumb col-md-2 col-sm-3 col-xs-4">
							<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
						</figure>
						<?php endif; ?>
						<div class="details col-md-10 col-sm-9 col-xs-8">
							<?php 
								the_title(
									'<h3 class="title"><a href="' . get_the_permalink() . '">',
									'</a></h3>'
								);
								
								the_excerpt();
							?>
							
							<a class="btn btn-theme read-more" href="<?php the_permalink() ?>">Read more<i class="fa fa-chevron-right"></i></a>
						</div>
					</article>
				<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
get_footer();
