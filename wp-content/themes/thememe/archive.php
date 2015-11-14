<?php
/**
 * The template for displaying archive pages.
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

				<?php if ( have_posts() ) : ?>

					<header class="page-header">
						<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
					</header><!-- .page-header -->
					<div class="posts">
						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>

							<?php

								/*
								 * Include the Post-Format-specific template for the content.
								 * If you want to override this in a child theme, then include a file
								 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
								 */
								get_template_part( 'template-parts/content', 'archive' );
							?>

						<?php endwhile; ?>
					</div>

					<?php wpbeginner_numeric_posts_nav(); ?>

				<?php else : ?>

					<?php get_template_part( 'template-parts/content', 'none' ); ?>

				<?php endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>

	<div class="col-md-3">
		<?php get_sidebar(); ?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
