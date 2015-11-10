<div class="inside-full-height box-content box-content-has-footer">
	<div class="box-content-header"><h2 class="widget-title heading-title">Giảng viên - tư vấn viên</h2></div>
	<div class="box-content-body">

		<?php 
			$args = array('post_type' => 'reviews', 'posts_per_page' =>'5', 'status' => 'publish');
			// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {?>

			<div id="carousel-review" class="carousel slide" data-ride="carousel">
		
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
						$i=0;
						while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
						$url = $thumb['0']; 
						$contact_email = get_post_meta( get_the_ID(), 'reviews_email', true );
						$contact_fb = get_post_meta( get_the_ID(), 'reviews_fb', true );
						$contact_linkedin = get_post_meta( get_the_ID(), 'reviews_linkedin', true );
						$contact_google_plus = get_post_meta( get_the_ID(), 'reviews_google_plus', true );
						$contact_youtube = get_post_meta( get_the_ID(), 'reviews_youtube', true );
						?>
						<div class="item review <?php echo $i==0?' active':''; ?>">
							<div class="item-inner review-thumb" style="background-image:url('<?php echo $url; ?>')">
								<img class="img-circle" src="<?php echo get_template_directory_uri();?>/skins/img/thumb-1x1.png" width="130" height="130">						
							</div>

							<div class="review-body text-center">
								<h4 class="title"><?php the_title();?></h4>
								<div class="entry">
									<?php the_content();?>
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

					<?php $i++;	 endwhile; ?>

					
					<!-- Controls -->
					<a class="left carousel-control" href="#carousel-review" role="button" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
						<span class="sr-only">Previous</span>
					</a>
					<a class="right carousel-control" href="#carousel-review" role="button" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
						<span class="sr-only">Next</span>
					</a>
				</div>
			</div>

		<?php	
		} else {
			// no posts found
		}
		/* Restore original Post Data */
		wp_reset_postdata();
		?>
	</div>
	<div class="content-footer">
		<div class="row">
			<div class="col-xs-6">
				<div class="carouse carouse-clone">
					<ol class="carousel-indicators">
						<?php for ($j=0; $j < $i; $j++) { ?>
							<li data-target="#carousel-review" data-slide-to="<?php echo $j; ?>" <?php echo $j==0?'class="active"':''; ?>></li>
						<?php }?> 
					</ol>
				</div>
			</div>
			<div class="col-xs-6 text-right">
				<a class="readmore" href="/giang-vien-tu-van-vien/"><span><i class="fa fa-bars"></i></span> Xem tất cả</a>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	jQuery(function($) {
		var slideByClick = false;
		$('#carousel-review').on('slid.bs.carousel', function () {
			if(slideByClick) {
				slideByClick = false;
				return true;
			}
			$holder = $( ".carouse-clone ol li.active" );
			$holder.next( "li" ).addClass("active");
			if($holder.is(':last-child'))
			{
				$holder.removeClass("active");
				$(".carouse-clone ol li:first").addClass("active");
			}
			$holder.removeClass("active");
		});

		$('.carouse-clone ol.carousel-indicators  li').on("click",function(){
			slideByClick = true;
			$('.carouse-clone ol.carousel-indicators li.active').removeClass("active");
			$(this).addClass("active");
		});

	});
</script>
