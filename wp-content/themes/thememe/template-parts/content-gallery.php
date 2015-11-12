<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thememe
 */

?>

<?php 

$galleries_data = get_post_meta( get_the_ID(), 'gallery', true );

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php thememe_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	<?php echo do_shortcode('[ssba]' );?>
	<div class="entry-content">
		<?php

	        $photos=explode(',', $galleries_data);

	        if(!empty($photos)){
	        	echo '<div class="row">';
	        	$i=1;
	            foreach ($photos as $key_photo => $photo) {

	                $photo_meta=wp_prepare_attachment_for_js($photo);

	                $photo_url=wp_get_attachment_image_src($photo,'thumb-blog'); //https://codex.wordpress.org/Function_Reference/wp_get_attachment_image_src
					
	                echo '<div class="col-sm-3 col-xs-2"><a class="thumbnail" href="'.$photo_meta['url'].'" rel="prettyPhoto[gallery1]" title="'.$photo_meta['caption'].'"><img src="'.$photo_url[0].'" alt="'.$photo_meta['title'].'"></a></div>'; //$photo_url[0] 
	                if($i%4==0) echo '</div><div class="row">';
	                $i++;
	            }
	            echo '</div>';
	        }
	    ?>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php thememe_entry_footer(); ?>
		<?php echo do_shortcode('[ssba]' );?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


	

   