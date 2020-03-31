<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package kritika
 */

get_header('single');
?>

<div id="primary-post" class="content-area">
		<main id="main" class="site-main">
		<div class="utility-bar-wrap">
		<div class="utility-bar">
			<div class="util-bar-module">
			<a class="fa fa-facebook util-bar-btn"  href="http://www.facebook.com/sharer/sharer.php?s=100&p[url]=<?php echo urlencode(get_permalink()); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
			<a class="fa fa-twitter util-bar-btn" href="https://twitter.com/intent/tweet?text=<?php echo urlencode(get_the_title()); ?>+<?php echo get_permalink(); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
			<a class="fa fa-google-plus util-bar-btn" href="https://plus.google.com/share?url=<?php echo urlencode(get_permalink()); ?>" onclick="window.open(this.href, 'sharegplus', 'height=400,width=600'); return false;" target="_blank"></a>
			</div>
		</div>
	</div>

		<?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', get_post_type() );

			the_post_navigation();

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
<?php setPostViews(get_the_ID()); ?>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(3);
get_footer('single');
