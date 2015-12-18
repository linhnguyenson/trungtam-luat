<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thememe
 */

?>

<?php $thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'medium' );
	$url = $thumb['0'];
	$contact_phone = get_post_meta( get_the_ID(), 'reviews_phone', true );
	$contact_email = get_post_meta( get_the_ID(), 'reviews_email', true );
	$contact_fb = get_post_meta( get_the_ID(), 'reviews_fb', true );
	$contact_linkedin = get_post_meta( get_the_ID(), 'reviews_linkedin', true );
	$contact_google_plus = get_post_meta( get_the_ID(), 'reviews_google_plus', true );
	$contact_youtube = get_post_meta( get_the_ID(), 'reviews_youtube', true );
	$content = get_post_meta( get_the_ID(), 'reviews_intro', true );

	$contact = '';
	if(!empty($contact_email)||!empty($contact_fb)||!empty($contact_linkedin)||!empty($contact_google_plus)||!empty($contact_youtube)):
		$contact.= '<ul class="list-inline list-social">';
			if(!empty($contact_phone)) $contact.= '<li><a href="tel:'.$contact_phone.'"><i class="fa fa-phone-square"></i></a></li>';
			if(!empty($contact_email)) $contact.= '<li class="social-email"><a href="mailto:'.$contact_email.'"><i class="fa fa-envelope"></i></a></li>';
			if(!empty($contact_fb)) $contact.= '<li><a href="'.$contact_fb.'" target="_blank"><i class="fa fa-facebook-square"></i></a></li>';
			if(!empty($contact_linkedin)) $contact.= '<li><a href="'.$contact_linkedin.'" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>';
			if(!empty($contact_google_plus)) $contact.= '<li><a href="'.$contact_google_plus.'" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>';
			if(!empty($contact_youtube)) $contact.= '<li><a href="'.$contact_youtube.'" target="_blank"><i class="fa fa-youtube-square"></i></a></li>';
		$contact.= '</ul>';									
	endif;
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<div class="entry-meta">
			<?php thememe_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->
	
	<div class="entry-content">
		<div class="row">
			<div class="col-sm-3">
				<div class="review-left">
					<div class="review-thumb" style="background-image:url('<?php echo $url; ?>')">
						<a href="<?php the_permalink();?>"><img class="img-circle" src="<?php echo get_template_directory_uri();?>/skins/img/thumb-1x1.png" width="100%" height="100%"></a>						
					</div>
					<div class="entry">
					<p> <?php echo $content; ?> </p>
					</div>
					<div class="review-contact">
						<label>Liên hệ</label><?php echo $contact;?>
					</div>
					
				</div>
			</div>
			<div class="col-sm-9">
				<?php the_content() ;?>
			</div>
		</div>
		
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php thememe_entry_footer(); ?>
		<?php echo do_shortcode('[ssba]' );?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

