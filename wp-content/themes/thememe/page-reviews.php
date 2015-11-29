<?php
/**
 * Template Name: Review
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thememe
 */

get_header(); ?>
<div class="row">
	<div class="col-md-12">	
		<div id="primary" class="content-area box-content">
			<main id="main" class="site-main box-content-body" role="main">
				<header class="page-header">
					<?php if (function_exists('breadcrumbs')) breadcrumbs(); ?>
				</header><!-- .page-header -->
				<?php 
 
				$temp = $wp_query;
				$wp_query = null;
				$wp_query = new WP_Query();
				$wp_query->query('showposts=20&post_type=reviews'.'&paged='.$paged);
				?>
				<div class="row">
					<?php
					$i=1;
					while ($wp_query->have_posts()) : $wp_query->the_post();
					?>
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
					$url = $thumb['0']; 
					$contact_email = get_post_meta( get_the_ID(), 'reviews_email', true );
					$contact_fb = get_post_meta( get_the_ID(), 'reviews_fb', true );
					$contact_linkedin = get_post_meta( get_the_ID(), 'reviews_linkedin', true );
					$contact_google_plus = get_post_meta( get_the_ID(), 'reviews_google_plus', true );
					$contact_youtube = get_post_meta( get_the_ID(), 'reviews_youtube', true );
					$content = get_post_meta( get_the_ID(), 'reviews_intro', true );
					?>
					<div class="col-sm-3">
						<div class="review">
							<div class="item-inner review-thumb" style="background-image:url('<?php echo $url; ?>')">
								<a href="<?php the_permalink();?>"><img class="img-circle" src="<?php echo get_template_directory_uri();?>/skins/img/thumb-1x1.png" width="130" height="130"></a>
							</div>

							<div class="review-body text-center">
								<h4 class="title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
								<div class="entry">
									<?php //the_content();
										echo $content;
									?>
								</div>
								<?php 
								if(!empty($contact_email)||!empty($contact_fb)||!empty($contact_linkedin)||!empty($contact_google_plus)||!empty($contact_youtube)):
									echo '<ul class="list-inline list-social">';
										if(!empty($contact_email)) echo '<li class="social-email"><a href="mailto:'.$contact_email.'"><i class="fa fa-envelope"></i></a></li>';
										if(!empty($contact_fb)) echo '<li><a href="'.$contact_fb.'" target="_blank"><i class="fa fa-facebook-square"></i></a></li>';
										if(!empty($contact_linkedin)) echo '<li><a href="'.$contact_linkedin.'" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>';
										if(!empty($contact_google_plus)) echo '<li><a href="'.$contact_google_plus.'" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>';
										if(!empty($contact_youtube)) echo '<li><a href="'.$contact_youtube.'" target="_blank"><i class="fa fa-youtube-square"></i></a></li>';
									echo '</ul>';									
								endif;?>
							</div>

						</div>
					</div>
					<?php if($i%4==0){?>
					</div>
					<div class="row">
					<?php }?>
					<?php $i++; endwhile; ?>
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
</div>
<?php get_footer(); ?>
