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
			
</div>
<div id="primary" class="content-area">
		<main id="main" class="site-main">

		<?php
			      $args = array( 'numberposts' => '8', 'post_status' => 'publish', 'category' => 2, 'category__not_in' => 5);

			      $recent_posts = wp_get_recent_posts($args);
				echo '<ul class="golovne-list">';

			      foreach( $recent_posts as $key => $recent ){
							if ($key==4){
							echo '</ul><ul class="golovne-list">';
						}
			   echo '<li class="hero-item golovne-list-item item-'. $key . '"><span class="image-gradient"></span><a class="image-link" href="' . get_permalink($recent["ID"]) .'">';
				 echo '<span class="hero-item-wrap"><span class="hero-list-hed hero-item-hed">' . $recent["post_title"] . '</span></span>';



			         if ( has_post_thumbnail( $recent["ID"]) ) {
			            echo  get_the_post_thumbnail($recent["ID"],'main-list');
			          }



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
										echo '<span class="cat_label cat_label_top-left ' . $category_slug . '-label-bg">' . htmlspecialchars($category_display) . '</span>';
									}
			echo '</a></li>';


			}
		}
		wp_reset_postdata();
echo '</ul>';
			?>

<div class="primary-secondary-modules">
				<div class="primary-module">
					<section class="m-section">
						<h4 class="m-section-header">
						<a class="label-bg m-section-header-link" href="/category/novosti-v-mire/" >
						Новости в мире
    				</a>
						</h4>
						<?php
						echo '<ul class="section-list">';
						$args = array(
							'numberposts' => 5,
							'category' => 5,
							'post_status' => 'publish',
						);

						$recent_posts = wp_get_recent_posts($args);

						foreach( $recent_posts as $key => $recent ){
							if ($key ==0){
						echo '<li class="hero-item section-list-item item-'. $key . '"><span class="image-gradient"></span><a class="image-link" href="' . get_permalink($recent["ID"]) .'">';
	 				 echo '<span class="hero-item-wrap"><span class="hero-list-hed hero-item-hed">' . $recent["post_title"] . '</span></span>';

	 			         if ( has_post_thumbnail( $recent["ID"])) {
	 			            echo  get_the_post_thumbnail($recent["ID"],'section-list');
	 			          }

								} elseif ($key ==1) {
									echo '<li class="section-list-item-small item-'. $key . '"><a class="secondary-link" href="' . get_permalink($recent["ID"]) .'">';
									echo '<div class="secondary-image-wrap-small">';
									if ( has_post_thumbnail( $recent["ID"])) {
											 echo  get_the_post_thumbnail($recent["ID"],'section-list-small');
										}
									echo '</div>';
				 				 echo '<span class="section-list-hed">' . wp_trim_words( $recent["post_title"], 8, '...' ) . '</span>';
								 echo '<span class="section-list-hed-meta">' . $recent["post_date"] . '</span>';
								} else {
									echo '<li class="item-'. $key . '"><a class="section-list-item-noim" href="' . get_permalink($recent["ID"]) .'">';
				 				 echo '<span class="section-item-wrap-noim">' . $recent["post_title"] . '</span>';
								}

									echo '</a></li>';

						}
						wp_reset_postdata();
				echo '</ul>';
						?>
					</section>
					<section class="m-section">
						<h4 class="m-section-header">
						<a class="label-bg m-section-header-link" href="/category/novosti-v-evrope/" >
						Новости в Европе
    				</a>
					</h4>
					<?php
					echo '<ul class="section-list">';
					$args = array(
						'numberposts' => 5,
						'category' => 7,
						'post_status' => 'publish',
					);

					$recent_posts = wp_get_recent_posts($args);

					foreach( $recent_posts as $key => $recent ){
						if ($key ==0){
					echo '<li class="hero-item section-list-item item-'. $key . '"><span class="image-gradient"></span><a class="image-link" href="' . get_permalink($recent["ID"]) .'">';
				 echo '<span class="hero-item-wrap"><span class="hero-list-hed hero-item-hed">' . $recent["post_title"] . '</span></span>';

							 if ( has_post_thumbnail( $recent["ID"])) {
									echo  get_the_post_thumbnail($recent["ID"],'section-list');
								}

							} elseif ($key ==1) {
								echo '<li class="section-list-item-small item-'. $key . '"><a class="secondary-link" href="' . get_permalink($recent["ID"]) .'">';
								echo '<div class="secondary-image-wrap-small">';
								if ( has_post_thumbnail( $recent["ID"])) {
										 echo  get_the_post_thumbnail($recent["ID"],'section-list-small');
									}
								echo '</div>';
								echo '<span class="section-list-hed">' . wp_trim_words( $recent["post_title"], 8, '...' ) . '</span>';
							 echo '<span class="section-list-hed-meta">' . $recent["post_date"] . '</span>';
							} else {
								echo '<li class="item-'. $key . '"><a class="section-list-item-noim" href="' . get_permalink($recent["ID"]) .'">';
							 echo '<span class="section-item-wrap-noim">' . $recent["post_title"] . '</span>';
							}

								echo '</a></li>';

					}
					wp_reset_postdata();
			echo '</ul>';
					?>
					</section>
					<section class="m-section">
						<h4 class="m-section-header">
						<a class="label-bg m-section-header-link" href="/category/blogi-ukrainy/" >
						Блоги Украины
    				</a>
						</h4>
						<?php
						echo '<ul class="section-list">';
						$args = array(
							'numberposts' => 5,
							'category' => 3,
							'post_status' => 'publish',
						);

						$recent_posts = wp_get_recent_posts($args);

						foreach( $recent_posts as $key => $recent ){
							if ($key ==0){
						echo '<li class="hero-item section-list-item item-'. $key . '"><span class="image-gradient"></span><a class="image-link" href="' . get_permalink($recent["ID"]) .'">';
					 echo '<span class="hero-item-wrap"><span class="hero-list-hed hero-item-hed">' . $recent["post_title"] . '</span></span>';

								 if ( has_post_thumbnail( $recent["ID"])) {
										echo  get_the_post_thumbnail($recent["ID"],'section-list');
									}

								} elseif ($key ==1) {
									echo '<li class="section-list-item-small item-'. $key . '"><a class="secondary-link" href="' . get_permalink($recent["ID"]) .'">';
									echo '<div class="secondary-image-wrap-small">';
									if ( has_post_thumbnail( $recent["ID"])) {
											 echo  get_the_post_thumbnail($recent["ID"],'section-list-small');
										}
									echo '</div>';
									echo '<span class="section-list-hed">' . wp_trim_words( $recent["post_title"], 8, '...' ) . '</span>';
								 echo '<span class="section-list-hed-meta">' . $recent["post_date"] . '</span>';
								} else {
									echo '<li class="item-'. $key . '"><a class="section-list-item-noim" href="' . get_permalink($recent["ID"]) .'">';
								 echo '<span class="section-item-wrap-noim">' . $recent["post_title"] . '</span>';
								}

									echo '</a></li>';

						}
						wp_reset_postdata();
				echo '</ul>';
						?>
					</section>
					<section class="m-section">
						<h4 class="m-section-header">
						<a class="label-bg m-section-header-link" href="/category/mediczina/" >
        			Люди
    				</a>
					</h4>
					<?php
					echo '<ul class="section-list">';
					$args = array(
						'numberposts' => 5,
						'category' => 23,
						'post_status' => 'publish',
					);

					$recent_posts = wp_get_recent_posts($args);

					foreach( $recent_posts as $key => $recent ){
						if ($key ==0){
					echo '<li class="hero-item section-list-item item-'. $key . '"><span class="image-gradient"></span><a class="image-link" href="' . get_permalink($recent["ID"]) .'">';
				 echo '<span class="hero-item-wrap"><span class="hero-list-hed hero-item-hed">' . $recent["post_title"] . '</span></span>';

							 if ( has_post_thumbnail( $recent["ID"])) {
									echo  get_the_post_thumbnail($recent["ID"],'section-list');
								}

							} elseif ($key ==1) {
								echo '<li class="section-list-item-small item-'. $key . '"><a class="secondary-link" href="' . get_permalink($recent["ID"]) .'">';
								echo '<div class="secondary-image-wrap-small">';
								if ( has_post_thumbnail( $recent["ID"])) {
										 echo  get_the_post_thumbnail($recent["ID"],'section-list-small');
									}
								echo '</div>';
								echo '<span class="section-list-hed">' . wp_trim_words( $recent["post_title"], 8, '...' ) . '</span>';
							 echo '<span class="section-list-hed-meta">' . $recent["post_date"] . '</span>';
							} else {
								echo '<li class="item-'. $key . '"><a class="section-list-item-noim" href="' . get_permalink($recent["ID"]) .'">';
							 echo '<span class="section-item-wrap-noim">' . $recent["post_title"] . '</span>';
							}

								echo '</a></li>';

					}
					wp_reset_postdata();
			echo '</ul>';
					?>
					</section>
				</div>
				<div class="secondary-module">
					<h4 class="secondary-heading">Популярное</h4>
					<?php
					$args = array(
			'numberposts' => 3,
			'meta_key'    => 'post_views_count',
			'orderby'     => 'meta_value_num',
			'order'       => 'DESC'
	);

								$recent_posts = wp_get_recent_posts($args);
						echo '<ul class="secondary-list">';

								foreach( $recent_posts as $key => $recent ){

						 echo '<li class="secondary-list-item item-'.$key.'"><a class="secondary-image-link" href="' . get_permalink($recent["ID"]) .'">';




									 if ( has_post_thumbnail( $recent["ID"]) ) {
											echo  get_the_post_thumbnail($recent["ID"],'section-popular');
										}



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
												echo '<span class="cat_label cat_label_top-left ' . $category_slug . '-label-bg">' . htmlspecialchars($category_display) . '</span>';
											}
											echo '<p class="secondary-image-hed">' . $recent["post_title"] . '</p>';
					echo '</a></li>';


					}
					}
					wp_reset_postdata();
					echo '</ul>';
					?>
				</div>

			</div>
			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php
get_sidebar(2);
get_footer();
