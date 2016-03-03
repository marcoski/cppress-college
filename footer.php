<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Palestrabozza
 */

?>
	<footer class="footer">
		<?php get_template_part('template-parts/footer-widgets'); ?>
		<div class="bottom-bar">
			<div class="container">
				<div class="row">
					<small class="copyright col-md-6 col-sm-12 col-xs-12">Grafica e sviluppo di <a href="http://www.commonhelp.it" target="_new">Commonhelp.it</a></small>
						<?php get_template_part('template-parts/social', 'footer'); ?>
					</div><!--//row-->
				</div><!--//container-->
			</div><!--//bottom-bar-->
    </footer>
	</div>
	<?php wp_footer(); ?>
	<div id="topcontrol" title="Scroll Back to Top" style="position: fixed; bottom: 5px; right: 5px; opacity: 0; cursor: pointer;">
		<i class="fa fa-angle-up"></i>
	</div>
</body>
</html>
