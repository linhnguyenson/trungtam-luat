<?php
/**
 * Custom functions that act independently of the theme templates.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package thememe
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function thememe_body_classes( $classes ) {
	// Adds a class of group-blog to blogs with more than 1 published author.
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}

	return $classes;
}
add_filter( 'body_class', 'thememe_body_classes' );

function thememe_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body media">
	<?php endif; ?>
	<div class="media-left">
		<div class="comment-author vcard">
		<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, 64, '', false, array('class' => 'img-circle') ); ?>
		</div>

	</div>
	<div class="media-body">
		<?php printf( __( '<cite class="fn"><strong>%s</strong></cite>' ), get_comment_author_link() ); ?>
		<?php if ( $comment->comment_approved == '0' ) : ?>
			<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em>
			<br />
		<?php endif; ?>

		<div class="comment-meta commentmetadata"><a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
			<?php
				/* translators: 1: date, 2: time */
				printf( __('%1$s at %2$s'), get_comment_date(),  get_comment_time() ); ?></a>
		</div>
		<?php comment_text(); ?>
	</div>
	<div class="reply">
		<?php edit_comment_link( __( 'Edit' ), '  ', '' );?>
		<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
	</div>
	<?php if ( 'div' != $args['style'] ) : ?>
	</div>
	<?php endif; ?>
<?php
}

function breadcrumbs() {

	echo '<ol class="breadcrumb">';
	echo '<li><a href="';
	echo esc_url( home_url( '/' ) );
	echo '"><i class="fa fa-home"></i> ';
	_e('Home','thememe');
	echo "</a></li>";
		if (is_category()) {
			echo '<li>';
			the_category(' &bull; ');
			echo '</li>';

		}elseif (is_single()) {
			$post_type=get_post_type( get_the_ID() );
			if($post_type!='post'){
				
				switch ($post_type) {
					case 'calendar':
						echo '<li><a href="/khoa-hoc">Khóa học</a></li>';
						break;
					case 'gallery':
						echo '<li><a href="/hinh-anh-hoat-dong/">Hình ảnh hoạt động</a></li>';
						break;

					default:
						
						break;
				}

				
				
			}else{
				echo '<li>';
				the_category(' &bull; ');
				echo '</li>';
			}
			
        } elseif (is_page()) {
            echo '<li class="active">';
            echo the_title();
            echo '</li>';
		}elseif (is_home()) {
			echo '<li class="active">';
            echo 'News & Events';
            echo '</li>';
		}
		 elseif (is_search()) {
            echo '<li class="active">Search Results for... ';
			echo '"<em>';
			echo the_search_query();
			echo '</em>"';
			echo '</li>';
        } elseif (is_date()) {
        	echo '<li class="active">';
        	the_archive_title();
        	echo '</li>';
        }
     echo "</ol>";
}

function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<nav><ul class="pagination">' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></nav>' . "\n";

}
