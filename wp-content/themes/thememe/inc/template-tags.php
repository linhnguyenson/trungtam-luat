<?php
/**
 * Custom template tags for this theme.
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package thememe
 */

if ( ! function_exists( 'thememe_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 */
function thememe_posted_on($before='',$after='') {
	$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
	if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
		$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time>';
	}

	$time_string = sprintf( $time_string,
		esc_attr( get_the_date( 'c' ) ),
		esc_html( get_the_date() ),
		esc_attr( get_the_modified_date( 'c' ) ),
		esc_html( get_the_modified_date() )
	);
	/* translators: used between list items, there is a space after the comma */
	if ( $before){
		printf( '<span class="meta-before">' . esc_html__( '%1$s', 'thememe' ) . '</span>', $before );
	}
	

	$categories_list = get_the_category_list( esc_html__( '', 'thememe' ) );
	if ( $categories_list && thememe_categorized_blog() ) {
		printf( '<span class="cat-links">' . esc_html__( '%1$s', 'thememe' ) . '</span>', $categories_list ); // WPCS: XSS OK.
	}
	
	$byline = sprintf(
		esc_html_x( 'by %s', 'post author', 'thememe' ),
		'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
	);

	$posted_on = sprintf(
		'<i class="fa fa-clock-o"></i> '.esc_html_x( '%s', 'post date', 'thememe' ),
		'<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $time_string . '</a>'
	);


	echo '<span class="byline"> ' . $byline . '</span> <span class="posted-on">' . $posted_on . '</span>'; // WPCS: XSS OK.

	if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
		echo '<span class="comments-link"><i class="fa fa-comment"></i> ';
		comments_popup_link( esc_html__( 'Leave a comment', 'thememe' ), esc_html__( '1', 'thememe' ), esc_html__( '%', 'thememe' ) );
		echo '</span>';
	}
	if ( $after){
		printf( '<span class="meta-after">' . esc_html__( '%1$s', 'thememe' ) . '</span>', $after );
	}
}
endif;

if ( ! function_exists( 'thememe_entry_footer' ) ) :
/**
 * Prints HTML with meta information for the categories, tags and comments.
 */
function thememe_entry_footer() {
	// Hide category and tag text for pages.
	if ( 'post' === get_post_type() ) {
		

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', esc_html__( '', 'thememe' ) );
		if ( $tags_list ) {
			printf( '<span class="tags-links"><span class-="label">' . esc_html__( 'Tags', 'thememe' ) . '</span>%1$s</span>', $tags_list ); // WPCS: XSS OK.
		}
	}

	

}
endif;

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function thememe_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'thememe_categories' ) ) ) {
		// Create an array of all the categories that are attached to posts.
		$all_the_cool_cats = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,

			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'thememe_categories', $all_the_cool_cats );
	}

	if ( $all_the_cool_cats > 1 ) {
		// This blog has more than 1 category so thememe_categorized_blog should return true.
		return true;
	} else {
		// This blog has only 1 category so thememe_categorized_blog should return false.
		return false;
	}
}

/**
 * Flush out the transients used in thememe_categorized_blog.
 */
function thememe_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'thememe_categories' );
}
add_action( 'edit_category', 'thememe_category_transient_flusher' );
add_action( 'save_post',     'thememe_category_transient_flusher' );
