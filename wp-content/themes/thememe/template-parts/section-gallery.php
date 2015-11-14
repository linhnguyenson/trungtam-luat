<div class="inside-full-height box-content box-content-has-footer">
	<div class="box-content-header"><h2 class="widget-title heading-title">Hình ảnh hoạt động</h2></div>
	<div class="box-content-body">

		<?php 
			$args = array('post_type' => 'gallery', 'posts_per_page' =>'20', 'status' => 'publish');
			// The Query
		$the_query = new WP_Query( $args );

		// The Loop
		if ( $the_query->have_posts() ) {?>

			<div id="carousel-gallery" class="carousel-custom-js carousel slide" data-ride="carousel">
		
				<!-- Wrapper for slides -->
				<div class="carousel-inner" role="listbox">
					<?php
						$i=0;
						while ( $the_query->have_posts() ) { $the_query->the_post(); ?>

						<?php 
							$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
							$url = $thumb['0']; 
							$galleries_data = get_post_meta( get_the_ID(), 'gallery', true );
							$photos=explode(',', $galleries_data);

						?>
						<?php if($i%4==0){?>
							<div class="item <?php echo $i==0?' active':''; ?>">
								<div class="row">
						<?php } ?>			
									<div class="col-xs-6">
										<a href="<?php the_permalink();?>">
										<div class="gallery-item">
											<div class="item-inner gallery-thumb" style="background-image:url('<?php echo $url; ?>')">
												<img class="img-circle" src="<?php echo get_template_directory_uri();?>/skins/img/thumb-1x1.png" width="100%">				
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
						<?php 
							$i++;
							if($i%4==0){
						?>

								</div>
							</div>
						<?php } ?>

						<?php } ?>	

						<?php 
						
							if($i%4!=0){
						?>

								</div>
							</div>
						<?php } ?>					

				</div>

					

					
				<!-- Controls -->
				<a class="left carousel-control" href="#carousel-gallery" role="button" data-slide="prev">
					<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a class="right carousel-control" href="#carousel-gallery" role="button" data-slide="next">
					<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
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
				<div class="carouse carousel-gallery-clone">
					<ol class="carousel-indicators">
						<?php for ($j=0; $j < $i/4; $j++) { ?>
							<li data-target="#carousel-gallery" data-slide-to="<?php echo $j; ?>" <?php echo $j==0?'class="active"':''; ?>></li>
						<?php }?> 
					</ol>
				</div>
			</div>
			<div class="col-xs-6 text-right">
				<a class="readmore" href="/hinh-anh-hoat-dong/"><span><i class="fa fa-bars"></i></span> Xem tất cả</a>
			</div>
		</div>
	</div>
</div>
