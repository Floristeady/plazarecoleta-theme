<?php
/**
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */
?><!DOCTYPE html>
<!--[if IE 8 ]><html <?php language_attributes(); ?> class="no-js ie ie8"><![endif]-->
<!--[if IE 9 ]><html <?php language_attributes(); ?> class="no-js ie ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html <?php language_attributes(); ?> ><!--<![endif]-->
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
		<title><?php wp_title( '|', true, 'right' ); ?></title>			
	    <meta name="description" content="<?php echo '' . get_bloginfo ( 'description' );  ?>">
	    <meta name="robots" content="index,follow">
		<link rel="profile" href="http://gmpg.org/xfn/11" />
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
		<!--[if lte IE 9]>
		  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<?php
		/* pages with no-js for commmets */
		if ( is_singular() && get_option( 'thread_comments' ) )
			wp_enqueue_script( 'comment-reply' );

		/* no delete*/
		wp_head();
		?>
	</head>
	<body <?php body_class(); ?>>
		
		<div class="clearfix" id="container">
			
			<nav id="nav-top">
				<?php  wp_nav_menu( array( 'container_id' => 'menu-secondary', 'theme_location' => 'secondary', 'sort_column' => 'menu_order' ) ); ?>
						
				<?php 
				if ( !is_front_page() && !is_home() ) {
					include('include/breadcrumbs.php'); 
				} ?>

			</nav>
			
							
			<header id="header" role="banner">
				<div class="inner">
				
				<?php global $plazarecoleta_options;
					$plazarecoleta_settings = get_option( 'plazarecoleta_options', $plazarecoleta_options ); ?>
					
				<div id="site-title">
				
				<?php if( $plazarecoleta_settings['custom_logo'] ) : ?>
					<h1><a href="<?php echo bloginfo('url'); ?>" class="logo"><img src="<?php echo $plazarecoleta_settings['custom_logo']; ?>" alt="<?php bloginfo('name'); ?>" /> </a></h1>
				<?php  else : ?>
					<h1><a href="<?php echo bloginfo('url'); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<?php endif; ?>
			  
					<h2><?php bloginfo( 'description' ); ?></h2>
				</div>
				<a class="btn-menu" href="javascript:void(0);"><?php _e('Menú', 'plazarecoleta') ?></a>
				<nav id="access" role="navigation" class="clearfix">
				  	<?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'primary' ) ); ?>
				</nav><!-- #access -->
				
				<?php get_sidebar('contact'); ?>
				</div>
			</header>

			<section id="main" role="main">
			