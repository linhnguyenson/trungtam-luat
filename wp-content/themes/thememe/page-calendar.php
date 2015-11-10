<?php
/**
 * Template Name: Calendar
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thememe
 */

get_header(); ?>
<div class="row">
	<div class="col-md-9">	
		<div id="primary" class="content-area box-content">
			<main id="main" class="site-main box-content-body" role="main">
				<header class="page-header">
					<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
				</header><!-- .page-header -->
				<?php 
 
				$temp = $wp_query;
				$wp_query = null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=10&post_type=calendar'.'&paged='.$paged);
				?>
				<div class="list-calendar">
				
					<?php

					while ($wp_query->have_posts()) : $wp_query->the_post();
					?>
					
					<?php get_template_part( 'template-parts/content', 'calendar' ); ?>
					

					<?php endwhile; ?>
				</div>
				<?php wpbeginner_numeric_posts_nav(); ?>
				<!-- or -->
				<!-- <nav>
				  <?php wpbeginner_numeric_posts_nav(); ?> //pagination.txt
				</nav> -->
				<?php
				$wp_query = null;
				$wp_query = $temp;  // Reset
				?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>
