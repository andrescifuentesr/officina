<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package officina
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="viewport" content="width=device-width" />
<title><?php wp_title( '|', true, 'right' ); ?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/js/html5.js" type="text/javascript"></script>
<![endif]-->

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> onload="initialize()">
<div id="page" class="hfeed site">
	<?php do_action( 'before' ); ?>
	
	<header id="masthead" <?php post_class('site-header'); ?> role="banner">	
		
		<div id="bloc-lang">
			<?php if (function_exists('qts_language_menu') ) qts_language_menu('text'); ?>
		</div>
		
		<div class="site-branding">
			<h1 class="site-title"><a href="<?php echo get_permalink('14') ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
		</div>

		<nav id="site-navigation" class="navigation-main" role="navigation">
			<h1 class="menu-toggle"><?php _e( 'Menu', 'officina' ); ?></h1>
			<div class="screen-reader-text skip-link"><a href="#content" title="<?php esc_attr_e( 'Skip to content', 'officina' ); ?>"><?php _e( 'Skip to content', 'officina' ); ?></a></div>

			<?php if( is_page( array( 7,14 ) ) ) { ?>
				<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
			<?php } elseif( is_page( array(8,38, 47, 49, 78) ) ) { ?>
				<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
			<?php } elseif( is_page(6) ) { ?>
					<?php wp_nav_menu( array( 'theme_location' => 'third', 
											'items_wrap' => '<ul><li id="book-item">Book </li>%3$s</ul>', 
											'before' => 'Télécharger book:',
					 ) ); ?>
			<?php } elseif( ( is_page(378) )  OR ( 'projets' == get_post_type() ) ) { ?>
				<?php $currentLang = qtrans_getLanguage();
					( $currentLang == "it") ? $projets = "PROGETTI" : $projets = "PROJETS";
				 ?>
				<?php wp_nav_menu( array( 'theme_location' => 'fourth',
										'items_wrap' => '<ul><li id="projet-item">'.$projets.'</li>%3$s</ul>', 
										'menu_class' => 'menu nav-responsive' ) ); ?>	
			<?php  }  ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="main" class="site-main">