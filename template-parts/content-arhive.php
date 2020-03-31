<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package kritika
 */



// SHOW YOAST PRIMARY CATEGORY, OR FIRST CATEGORY
$category = get_the_category();
$useCatLink = true;
// If post has a category assigned.
if ($category){
	$category_display = '';
	$category_link = '';
	if ( class_exists('WPSEO_Primary_Term') )
	{
		// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
		$wpseo_primary_term = new WPSEO_Primary_Term( 'category', get_the_id() );
		$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
		$term = get_term( $wpseo_primary_term );
		if (is_wp_error($term)) {
			// Default to first category (not Yoast) if an error is returned
			$category_display = $category[0]->name;
			$category_slug = $category[0]->slug;
			$category_link = get_category_link( $category[0]->term_id );
			$category_id = $category[0]->term_id;
		} else {
			// Yoast Primary category
			$category_display = $term->name;
			$category_slug = $term->slug;
			$category_link = get_category_link( $term->term_id );
			$category_id = $term->term_id;
		}
	}
	else {
		// Default, display the first category in WP's list of assigned categories
		$category_display = $category[0]->name;
		$category_slug = $category[0]->slug;
		$category_link = get_category_link( $category[0]->term_id );
		$category_id = $category[0]->term_id;
	}
}

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php
		if ( is_singular() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				kritika_posted_on();
				kritika_entry_footer();
				?>
			</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="article-metadata-wrap">
				<?php kritika_post_thumbnail(); ?>
				<span class="toggle"></span>
			</div>
			<div class="inline-share-tools">
				<a class="fa fa-facebook inline-share-btn"  href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
				<a class="fa fa-twitter inline-share-btn" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
				<a class="fa fa-telegram inline-share-btn" href="https://telegram.me/share/url?url=<?php echo urlencode(get_permalink()); ?>"  onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
				<a class="fa fa-linkedin inline-share-btn" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo urlencode(get_permalink()); ?>&amp;title=<?php echo urlencode(get_the_title()); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
			</div>

	<div class="entry-content">
		<?php
		the_content( sprintf(
			wp_kses(
				/* translators: %s: Name of current post. Only visible to screen readers */
				__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'kritika' ),
				array(
					'span' => array(
						'class' => array(),
					),
				)
			),
			get_the_title()
		) );

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'kritika' ),
			'after'  => '</div>',
		) );
		?>
		<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php //kritika_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
