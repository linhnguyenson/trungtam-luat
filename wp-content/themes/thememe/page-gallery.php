<?php
/**
 * Template Name: Gallery
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
				$wp_query->query('showposts=20&post_type=gallery'.'&paged='.$paged);
				?>
				<div class="row">
					<?php
					$i=1;
					while ($wp_query->have_posts()) : $wp_query->the_post();
					?>
					<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumb-blog' );
					$url = $thumb['0'];
					$galleries_data = get_post_meta( get_the_ID(), 'gallery', true );
					$photos=explode(',', $galleries_data);

					?>
					<div class="col-sm-3">
						<a href="<?php the_permalink();?>">
						<div class="gallery-item">
							<div class="item-inner gallery-thumb" style="background-image:url('<?php echo $url; ?>')">
								<img class="img-circle" src="<?php echo get_template_directory_uri();?>/skins/img/thumb-7x5.png" width="100%">				
							</div>

							<div class="gallery-info">
								<?php the_title( '<h3 class="gallery-title">', '</h3>' ); ?>
								<div class="meta-gallery">
									<span class="number-gallery"><i class="fa fa-file-image-o"></i> <?php echo count($photos); ?></span>
									<span class="posted-on">Đăng ngày <?php echo get_the_time(); ?></span>
								</div>
							</div>
						</div></a>
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
