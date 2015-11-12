<div class="post-nav">
	
	<div class="row row-sm-height">
		<div class="col-sm-6 col-sm-height col-sm-top nav-prev">
			<?php
			$prev_post = get_previous_post();
			if (!empty( $prev_post )): ?>
				<span class="nav-label"><i class="fa fa-long-arrow-left"></i> <span><?php _e('Trước' );?></span></span>
			  	<h4><a href="<?php echo get_permalink( $prev_post->ID ); ?>"><?php echo $prev_post->post_title; ?></a></h4>
			<?php endif; ?>
		</div>
		<div class="col-sm-6 nav-next col-sm-height col-sm-top">
			<?php
			$next_post = get_next_post();
			if (!empty( $next_post )): ?>
				<span class="nav-label"><span><?php _e('Tiếp' );?></span> <i class="fa fa-long-arrow-right"></i></span>
			  	<h4><a href="<?php echo get_permalink( $next_post->ID ); ?>"><?php echo $next_post->post_title; ?></a></h4>
			<?php endif; ?>
		</div>
	</div>

</div>
<?php 

$post_type=get_post_type( get_the_ID() );
if($post_type=='post'){
?>
<div class="related-posts">
	<h3>Related posts</h3>
	
		<div class="row">
		<?php
		    $orig_post = $post;
		    global $post;
		    $tags = wp_get_post_tags($post->ID);
		   	$count=4;
		   	$i=1;
		    if ($tags) {
			    $tag_ids = array();
			    foreach($tags as $individual_tag) $tag_ids[] = $individual_tag->term_id;
			    $args=array(
			    'tag__in' => $tag_ids,
			    'post__not_in' => array($post->ID),
			    'posts_per_page'=>$count, // Number of related posts to display.
			    'caller_get_posts'=>1
			    );
			     
			    $my_query = new wp_query( $args );
			 	
			 	$count = $my_query->post_count;
			    
			    while( $my_query->have_posts() ) {
				    $my_query->the_post();

				    ?>
				 	<div class="col-sm-6">
					    <div class="post-block">
					        <div class="row">
					        	<div class="col-xs-5">
					        		<a href="<?php the_permalink()?>"><?php the_post_thumbnail('thumb-post'); ?></a>
					        	</div>
					        	<div class="col-xs-7">
					        		<h4><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h4>
					        		<span class="meta"><i class="fa fa-clock-o"></i> <?php the_time('M j, Y') ?></span>
					        	</div>
					        </div>
					    </div>
					</div>
					<?php if($i%2==0):?>
					</div>
					<div class="row">
					<?php endif; $i++;?>

				     
			    <?php }

			    $post = $orig_post;
		    	wp_reset_query();
		    }


		    $categories = get_the_category($post->ID);
		    if($count<4) $count=4-$count;
		   	if(!empty($categories)&&$count>0){
		    	$category_ids = array();
				foreach($categories as $individual_category) $category_ids[] = $individual_category->term_id;

				$args=array(
					'category__in' => $category_ids,
					'post__not_in' => array($post->ID),
					'posts_per_page'=> $count,
					'caller_get_posts'=>1
				);
				$my_query = new wp_query( $args );
				
				
				while( $my_query->have_posts() ) {
				$my_query->the_post();?>

					<div class="col-sm-6">
					    <div class="post-block">
					        <div class="row">
					        	<div class="col-xs-5">
					        		<a href="<?php the_permalink()?>"><?php the_post_thumbnail('thumb-post'); ?></a>
					        	</div>
					        	<div class="col-xs-7">
					        		<h4><a href="<?php the_permalink()?>"><?php the_title(); ?></a></h4>
					        		<span class="meta"><i class="fa fa-clock-o"></i> <?php the_time('M j, Y') ?></span>
					        	</div>
					        </div>
					    </div>
					</div>
					<?php if($i%2==0):?>
					</div>
					<div class="row">
					<?php endif; $i++;?>

				<?php }

				$post = $orig_post;
		    	wp_reset_query();

		    }
		   
		    
		 ?>

	</div>
</div>
<?php } ?>



