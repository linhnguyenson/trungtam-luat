<div class="box-content-header"><h2 class="widget-title heading-title">Recent Posts</h2></div>
<div class="box-content-body">
<?php 
	$num = 5;
	$args = array('post_type' => 'post' ,  'posts_per_page' => $num);
	$the_query = new WP_Query( $args );
	if ( $the_query->have_posts() ) {
		echo '<ul class="list-post">';
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			echo 
				'<li>
					<a href="'.get_the_permalink().'" data-toggle="tooltip" data-placement="left" 
					title="'.get_the_excerpt().'">' . get_the_title() . '</a>
						<span class="post-date">'.get_the_time('d/m/Y  h:i A').'</span>
				</li>';
		}
		echo '</ul>';
	} else {
		// no posts found
	}
	/* Restore original Post Data */
wp_reset_postdata();

?>
</div>
