<?php
/**
 * The front page template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bankrupt
 */

get_header(); ?>
<div id="hero" class="hero_full_width">
asdfadsfasdf
</div>
<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section id="top_row">
			<?php
      $args = array( 'numberposts' => '4', 'post_status' => 'publish' );

      $recent_posts = wp_get_recent_posts($args);

      foreach( $recent_posts as $recent ){
				?>
				<article class="top_news">
				<a href="<?php echo get_permalink($recent["ID"]);?>" style="background-image:url(<?php echo get_the_post_thumbnail_url( $recent["ID"],'home-big' ); ?>);" class="image_link">
				<?php
						//category
						$category = get_the_category($recent["ID"]);
						// If post has a category assigned.
						if ($category){
							$category_display = '';
							if ( class_exists('WPSEO_Primary_Term') )
							{
								// Show the post's 'Primary' category, if this Yoast feature is available, & one is set
								$wpseo_primary_term = new WPSEO_Primary_Term( 'category', $recent["ID"] );
								$wpseo_primary_term = $wpseo_primary_term->get_primary_term();
								$term = get_term( $wpseo_primary_term );
								if (is_wp_error($term)) {
									// Default to first category (not Yoast) if an error is returned
									$category_display = $category[0]->name;
									$category_slug = $category[0]->slug;
								} else {
									// Yoast Primary category
									$category_display = $term->name;
									$category_slug = $term->slug;
								}
							}
							else {
								// Default, display the first category in WP's list of assigned categories
								$category_display = $category[0]->name;
								$category_slug = $category[0]->slug;
							}
							// Display category
							if ( !empty($category_display) ){
								//echo '<span class="post-category ' . $category_slug . '">'.htmlspecialchars($category_display).'</span>';
								echo '<span class="cat_label cat_label_top-right">' . htmlspecialchars($category_display) . '</span>';
							}
						}
				
				?>
				<div class="gradient_info">
				<div class="top_news_title">
				<?php //echo wp_trim_words($recent["post_title"], 20);?>
				<?php echo $recent["post_title"];?>
				</div>
				</div>
				</a>
				</article>
				
<?php
		}
		wp_reset_postdata();
?>
			</section>
			<section class="top_list">
			<?php
			echo '<ul class="hero-list"><li class="right-list-item right-list-item-link">ОСТАННІ ЗАПИСИ</li>';
			//right 1
			$args = array( 'numberposts' => '9', 'offset' => 4, 'post_status' => 'publish');
			  $recent_posts = wp_get_recent_posts($args);
				foreach( $recent_posts as $key => $recent ){
					echo '<li class="item-'. $key . '"><a class="right-list-item right-list-item-link" href="' . get_permalink($recent["ID"]) .'">';
				 echo '<span class="right-list-item-hed">' . $recent["post_title"] . '</span></a></li>';
				}
				wp_reset_postdata();
				echo '</ul>';
?>
			</section>
			<div class="qrrqwer">
			Mollit cillum in sint eu eu magna occaecat. Nostrud Lorem aute aute et amet commodo exercitation. Sint sunt culpa do officia irure culpa.
			In tempor qui esse velit et consectetur ad exercitation.Laborum adipisicing et aliquip adipisicing excepteur velit. Do esse labore laboris culpa est. Ad commodo eu cupidatat eiusmod nisi labore irure commodo anim consequat nostrud. Incididunt duis consequat officia irure id minim ullamco quis laboris ea. Velit eiusmod anim eiusmod nulla culpa ea Lorem culpa. Est sunt tempor mollit proident ad do irure adipisicing anim in ad deserunt Lorem velit. Adipisicing excepteur proident occaecat deserunt.Fugiat ex exercitation nisi et ea cupidatat fugiat in eu incididunt commodo voluptate.
			</div>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar(2);
get_footer();
