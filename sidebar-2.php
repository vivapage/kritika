<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bankrupt
 */

if ( ! is_active_sidebar( 'sidebar-2' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<?php dynamic_sidebar( 'sidebar-2' ); ?>
	<h6 class="widget-title">Еще новости</h6>
<div class="sidebar-scrollable-window">
	<?php
	echo '<ul class="section-list">';
	$args = array(
		'numberposts' => 150,
		'post_status' => 'publish',
		'offset' => 13,
	);

	$recent_posts = wp_get_recent_posts($args);

	foreach( $recent_posts as $recent ){
				echo '<li  class="list-item"><a class="list-item-link" href="' . get_permalink($recent["ID"]) .'">';

			 if ( has_post_thumbnail( $recent["ID"])) {
					echo  get_the_post_thumbnail($recent["ID"],'mini');
				}
				echo '<div class="mini-meta">';

				// category

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
						echo '<span class="meta-timesince-span">' . htmlspecialchars($category_display) . ' | </span>';
					}
				}

					//end category

				echo '<span class="meta-timesince-span">' . date('Y-m-d H:i', strtotime($recent['post_date'])) . '</span></div>';
				echo '<p class="mini-headline">' . $recent["post_title"] . '</p>';

				echo '</a></li>';

	}
	wp_reset_postdata();
echo '</ul>';
	?>
	</div>

</aside><!-- #secondary -->
