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
$now  = new DateTime( "now" );
$calendar_date_start = new DateTime(get_post_meta( get_the_ID(), 'calendar_date_start', true ));
$calendar_date_end = new DateTime(get_post_meta( get_the_ID(), 'calendar_date_end', true ));
$calendar_location = get_post_meta( get_the_ID(), 'calendar_location', true );
$calendar_price = get_post_meta( get_the_ID(), 'calendar_price', true );
$calendar_contact_name = get_post_meta( get_the_ID(), 'calendar_contact_name', true );
$calendar_contact_phone = get_post_meta( get_the_ID(), 'calendar_contact_phone', true );
$calendar_contact_email = get_post_meta( get_the_ID(), 'calendar_email', true );
$calendar_note = get_post_meta( get_the_ID(), 'calendar_note', true );
$calendar_attachment = get_post_meta( get_the_ID(), 'calendar_attachment', true );

if( $now < $calendar_date_start ) {
    $label='<span class="label label-danger upcomming">Sắp diễn ra </span>';
} elseif ( $now <= $calendar_date_end ){
    $label='<span class="label label-success doing">Đang diễn ra</span>';
}else{
	$label='<span class="label label-default expired"> Hết hạn</span>';
}

if($calendar_attachment){
	$tokens = explode('/', $calendar_attachment);
	$attachment= '<a class="attachment" href="'.$calendar_attachment.'"><i class="fa fa-paperclip"></i> '.$tokens[sizeof($tokens)-1].'</a>';
}

?>

<?php 
	
	$terms = get_the_terms(get_the_ID(), 'calendartype' );
	if (!empty($terms)){
		$label .='<span class="in-term"> Khóa học ';
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term );
			if ( is_wp_error( $term_link ) ) {
		        continue;
		    }
		    $label .=' <a href="' . esc_url( $term_link ) . '">' . $term->name . '</a>';
		}
		$label .='</span>';
		
	}
	


?>


<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php the_permalink();?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>

		<div class="entry-meta">
			<?php thememe_posted_on($label,$attachment,false); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<?php if(is_single()): echo do_shortcode('[ssba]' );?>
	<div class="entry-content">

		<?php the_post_thumbnail('thumb-full');?>
		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'thememe' ),
				'after'  => '</div>',
			) );
		?>
		
			<dl class="dl-horizontal calendar-detail">
			  	<?php printf( '<dt>' . esc_html__( 'Thời gian đăng ký', 'thememe' ) . '</dt><dd>' . esc_html__( '%1s - %2s', 'thememe' ) . '</dd>',$calendar_date_start->format('d/m/Y'),$calendar_date_end->format('d/m/Y')) ?>
				<?php printf( '<dt>' . esc_html__( 'Địa điểm', 'thememe' ) . '</dt><dd>' . esc_html__( '%s', 'thememe' ) . '</dd>',$calendar_location) ?>
				<?php printf( '<dt>' . esc_html__( 'Học phí', 'thememe' ) . '</dt><dd>' . esc_html__( '%s VNĐ', 'thememe' ) . '</dd>',$calendar_price) ?>
				<?php printf( '<dt>' . esc_html__( 'Liên hệ', 'thememe' ) . '</dt><dd><span><i class="fa fa-user"></i></span> ' . esc_html__( '%1s', 'thememe' ) . '</dd><dd><span><i class="fa fa-phone"></i></span>' . esc_html__( '%2s', 'thememe' ) . '</dd><dd><span><i class="fa fa-envelope"></i></span>' . esc_html__( '%3s', 'thememe' ) . '</dd>',$calendar_contact_name, $calendar_contact_phone, $calendar_contact_email) ?>
			</dl>
			
			<?php 
			if(!empty($calendar_note)):
				$list_note=preg_split('/\r\n|[\r\n]/', $calendar_note);
				echo '<ul class="list-note">';
				foreach ($list_note as $key => $value) {
					echo '<li>'.$value.'</li>';
				}
				echo '</ul>';
			endif;
			?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php thememe_entry_footer(); ?>
		<?php echo do_shortcode('[ssba]' );?>
	</footer><!-- .entry-footer -->
	<?php endif;?>
</article><!-- #post-## -->

