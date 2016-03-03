<?php
use CpPress\CpPress;
use CpPress\Application\WP\Query\Query;
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
		<div class="page-content">
			<div class="row page-row">
				<div class="news-wrapper col-md-8 col-sm-7">
					<article class="news-item">
					<p class="meta text-muted">
						Posted on: <?php the_time(get_option('date_format')); ?>
					</p>
					<?php if(has_post_thumbnail()): ?>
					<p class="featured-image">
					<?php the_post_thumbnail('post-thumbnail', array('class' => 'img-responsive')); ?>
					</p>
					<?php endif; ?>
					<?php 
						while( have_posts() ){ the_post(); }
						the_content();
					?>
					</article>
				</div>
				<aside class="page-sidebar  col-md-3 col-md-offset-1 col-sm-4 col-sm-offset-1 col-xs-12">
					<section class="widget has-divider">
						<h3 class="title">Altri articoli</h3>
						<?php 
						$related = array('post__not_in' => array(get_the_ID()), 'orderby' => 'date', 'posts_per_page' => '10');
						$relQuery = new Query();
						$relQuery->setLoop($related);
						while($relQuery->have_posts()): $relQuery->the_post();
						?>
						<article class="news-item row">
							<?php if(has_post_thumbnail()): ?>
							<figure class="thumb col-md-2 col-sm-3 col-xs-3">
								<?php the_post_thumbnail('post-thumbnail'); ?>
							</figure>
							<div class="details col-md-10 col-sm-9 col-xs-9">
								<?php 
									the_title(
										'<h4 class="title"><a href="' . get_the_permalink() . '">',
										'</a></h4>'
									);
								?>
							</div>
							<?php endif; ?>
						</article>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</section>
				</aside>
			</div>
		</div>
		
	</div>
</div>

<?php
get_footer();
