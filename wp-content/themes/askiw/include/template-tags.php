<?php
// Do not allow direct access to the file.
if( ! defined( 'ABSPATH' ) ) {
    exit;
}
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package score
 */
if ( ! function_exists( 'askiw__posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function askiw__posted_on() {
		$askiw__time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$askiw__time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}
		$askiw__time_string = sprintf( $askiw__time_string,
			esc_attr( get_the_date( DATE_W3C ) ),
			esc_html( get_the_date() ),
			esc_attr( get_the_modified_date( DATE_W3C ) ),
			esc_html( get_the_modified_date() )
		);
		$askiw__posted_on ='<a href="' . esc_url( get_permalink() ) . '" rel="bookmark">' . $askiw__time_string . '</a>';
		echo '<span class="cont-date"><span class="dashicons dashicons-calendar"></span> <span class="posted-on">' . $askiw__posted_on . '</span></span>'; // phpcs:ignore
	}
endif;
if ( ! function_exists( 'askiw__posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function askiw__posted_by() {
		$askiw__byline = '<span class="dashicons dashicons-businessman"></span> <span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>';
		echo '<span class="cont-author"><span class="byline"> ' . $askiw__byline . '</span></span>'; // phpcs:ignore
	}
endif;
if ( ! function_exists( 'askiw__entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function askiw__entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$askiw__categories_list = get_the_category_list( esc_html__( ', ', 'askiw' ) );
			if ( $askiw__categories_list ) {
				/* translators: 1: list of categories. */
				echo '<span class="cont-portfolio"><span class="dashicons dashicons-portfolio"></span> <span class="cat-links"></span>'. $askiw__categories_list.'</span>' ;  // phpcs:ignore
			}
			/* translators: used between list items, there is a space after the comma */
			$askiw__tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'askiw' ) );
			if ( $askiw__tags_list ) {
				/* translators: 1: list of tags. */
				echo '<span class="cont-tags"><span class="dashicons dashicons-tag"></span> <span class="tags-links"></span>'. $askiw__tags_list.'</span>'; // phpcs:ignore
			}
		}
		if ( ! is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="cont-comments"><span class="dashicons dashicons-admin-comments"></span><span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'askiw' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span></span>';
		}
		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__('Edit <span class="screen-reader-text">%s</span>', 'askiw' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				get_the_title()
			),
			'<span class="cont-edit"><span class="dashicons dashicons-edit"></span> <span class="edit-link">',
			'</span></span>'
		);
	}
endif;
if ( ! function_exists( 'askiw__post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function askiw__post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}
		if ( is_singular() ) :
			?>
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->
		<?php else : ?>
		<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
			<?php
			the_post_thumbnail( 'post-thumbnail', array(
				'alt' => the_title_attribute( array(
					'echo' => false,
				) ),
			) );
			?>
		</a>
		<?php
		endif; // End is_singular().
	}
endif;