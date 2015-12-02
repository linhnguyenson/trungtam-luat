<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thememe
 */

?>


<?php 

$format=get_post_format();

switch ($format) {
	case 'video':
		$format_icon='<span><i class="fa fa-video-camera"></i></span>';
		break;
	case 'gallery':
		$format_icon='<span><i class="fa fa-file-image-o"></i></span>';
		break;
	case 'image':
		$format_icon='<span><i class="fa fa-file-image-o"></i></span>';
		break;
	case 'quote':
		$format_icon='<span><i class="fa fa-quote-right"></i></span>';
		break;
	case 'aside':
		$format_icon='<span><i class="fa fa-file"></i></span>';
		break;
	case 'link':
		$format_icon='<span><i class="fa fa-paperclip"></i></span>';
		break;
	default:
		$format_icon='';
		break;
}

if(has_post_thumbnail()){
	$column_left=' class="col-sm-4"';
	$column_right=' class="col-sm-8"';

}else{
	$column_left='';
	$column_right=' class="col-xs-12"';
}


?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="row">
		<?php echo '<div'.$column_left.'>';?>
			<a href="<?php the_permalink();?>" title="<?php the_title();?>"><?php the_post_thumbnail('thumb-blog', array('class'=>'img-responsive')); ?></a>
		</div>
		<?php echo '<div'.$column_right.'>';?>
			<header class="entry-header">
				<?php the_title( sprintf( '<h2 class="entry-title">%1s <a href="%2s" rel="bookmark">',$format_icon, esc_url( get_permalink() ) ), '</a></h2>' ); ?>
				<?php if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php thememe_posted_on(); ?>
				</div><!-- .entry-meta -->
				<?php endif; ?>
			</header><!-- .entry-header -->
			
			<?php if(!$format): ?>
			<div class="entry-content">
				<?php
					
					the_excerpt();
				?>

				<?php
					wp_link_pages( array(
						'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thememe' ),
						'after'  => '</div>',
					) );
				?>
			</div><!-- .entry-content -->
			<?php endif;?>
		</div>

	</div>
</article><!-- #post-## -->
<hr>
