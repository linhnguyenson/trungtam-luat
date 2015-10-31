<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thememe
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
 <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
<!--[if gte IE 9]>
  <style type="text/css">
    .gradient {
       filter: none;
    }
  </style>
<![endif]-->
<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<header id="masthead" class="site-header clearfix" role="banner">
		
		<div class="site-top gradient">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-sm-6">
						<ul class="list-inline list-icon-item">
							<li><span><i class="fa fa-phone-square"></i></span><a href="tel:054 322 111"> 054 322 111</a></li>
							<li><span><i class="fa fa-envelope"></i></span><a href="mailto:"> contact@hlu.edu.vn</a></li>
						</ul>
					</div>
					<div class="col-md-6 col-sm-6">
						<?php echo get_search_form(); ?> 
					</div>
				</div>
				
			</div>
		</div>

		<div class="site-branding">
			<div class="container">
				<?php 
					$logo = (ot_get_option('logo')!='')?ot_get_option('logo'):get_template_directory_uri().'/skins/img/logo.png';
					$banner = (ot_get_option('banner')!='')?ot_get_option('banner'):get_template_directory_uri().'/skins/img/banner.png';
				?>
				<div class="banner">
					<img src="<?php echo $banner; ?>">
				</div>
				<div class="logo hidden-sm hidden-xs">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo $logo; ?>"></a>
				</div>
			</div>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<div class="container">
				<button class="menu-toggle btn btn btn-default btn-sm" aria-controls="primary-menu" aria-expanded="false"><i class="glyphicon glyphicon-menu-hamburger"></i> <span class="hidden"><?php esc_html_e( 'Primary Menu', 'thememe' ); ?></span></button>
				<div class="row">
					<div class="col-md-6">
						<?php wp_nav_menu( array( 'theme_location' => 'primary-left', 'menu_id' => 'primary-menu-left' ) ); ?>
					</div>
					<div class="col-md-6">
						<?php wp_nav_menu( array( 'theme_location' => 'primary-right', 'menu_id' => 'primary-menu-right' ) ); ?>
					</div>
				</div>
			</div>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div class="container">
