<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
				<?php while ( have_posts() ) : the_post(); ?>

					<?php get_template_part( 'template-parts/content', 'review' ); ?>

					

					

					
					
					<?php
						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template();
						endif;
					?>

				<?php endwhile; // End of the loop. ?>
			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer(); ?>


