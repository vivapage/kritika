<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package kritika
 */

if ( ! function_exists( 'kritika_posted_on' ) ) :
	/**
	 * Prints HTML with meta information for the current post-date/time.
	 */
	function kritika_posted_on() {
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string,
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date('Y-m-d H:i') ),
			esc_attr( get_the_modified_date( 'c' ) ),
			esc_html( get_the_modified_date('Y-m-d H:i') )
		);

		$posted_on = sprintf(
			/* translators: %s: post date. */
			esc_html_x( '%s', 'post date', 'kritika' ),
			'<span class="meta-timesince-span-post">Опубликовано: ' . $time_string . '</span>'
		);
/*
		$byline = sprintf(

			esc_html_x( 'by %s', 'post author', 'kritika' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="posted-on">' . $posted_on . '</span><span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.
*/
		echo '<span class="posted-on">' . $posted_on . '</span>';
	}
endif;

if ( ! function_exists( 'kritika_posted_by' ) ) :
	/**
	 * Prints HTML with meta information for the current author.
	 */
	function kritika_posted_by() {
		$byline = sprintf(
			/* translators: %s: post author. */
			esc_html_x( 'by %s', 'post author', 'kritika' ),
			'<span class="author vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author() ) . '</a></span>'
		);

		echo '<span class="byline"> ' . $byline . '</span>'; // WPCS: XSS OK.

	}
endif;

if ( ! function_exists( 'kritika_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function kritika_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() ) {
			/* translators: used between list items, there is a space after the comma */
			$categories_list = get_the_category_list( esc_html__( ', ', 'kritika' ) );
			if ( $categories_list ) {
				/* translators: 1: list of categories. */
				printf( '<span class="cat-links">' . esc_html__( 'Опубліковано в %1$s', 'kritika' ) . '</span>', $categories_list ); // WPCS: XSS OK.
			}
		}
	}
endif;

if ( ! function_exists( 'kritika_entry_comments' ) ) :
	/**
	 * Prints HTML with meta information for the categories, tags and comments.
	 */
	function kritika_entry_comments() {

		if ( is_single() && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {
			echo '<span class="comments-link">';
			comments_popup_link(
				sprintf(
					wp_kses(
						/* translators: %s: post title */
						__( 'Leave a Comment<span class="screen-reader-text"> on %s</span>', 'kritika' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
			echo '</span>';
		}
	}
endif;

if ( ! function_exists( 'kritika_post_thumbnail' ) ) :
	/**
	 * Displays an optional post thumbnail.
	 *
	 * Wraps the post thumbnail in an anchor element on index views, or a div
	 * element when on single views.
	 */
	function kritika_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			?>
		
			<div class="post-thumbnail">
				<?php //the_post_thumbnail(); ?>
		
		
		
					<a href="<?php the_post_thumbnail_url(); ?>" data-lightbox="image-1" data-title="<?php the_title();?>"><?php the_post_thumbnail('section-list'); ?></a>
			</div><!-- .post-thumbnail -->
		
		
			<?php else : ?>
		
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
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
