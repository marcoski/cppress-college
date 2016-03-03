<?php 

use CpPress\Application\WP\Theme\Menu;
use CpPressCollege\Walker\CollegeWalker;

$menu = new Menu('primary', '', new CollegeWalker());
$menu->setShowOption(
		'items_wrap',
		apply_filters("cppress_theme_menu_items_wrap",'<ul class="nav navbar-nav">%3$s</ul>')
);

?>
<nav class="main-nav" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-collapse">
				<span class="sr-only"><?php __('Toggle navigation'); ?></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button><!--//nav-toggle-->
		</div><!--//navbar-header-->            
		<div class="navbar-collapse collapse" id="navbar-collapse">
      <?php $menu->show(); ?>              
		</div><!--//navabr-collapse-->
	</div><!--//container-->
</nav>