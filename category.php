<?php
/**
 * The template for displaying golovne category page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bankrupt
 */

get_header(category);
$cat = get_query_var('cat');
$category = get_category ($cat);
?>

	<div id="category-primary" class="content-area">
		<div id="main" class="category-main">
      <div class="category-primary-wrapper">
				<div class="suspender-color <?php  echo $category->slug ;?>">
					<h1 class="suspender-section-name">
						<?php echo $category->cat_name; ?>
					</h1>
					<div class="ssns-items"></div>
				</div>
				<div class="primary-module-suspender module-border">
					<div id="hero" class="hero-category">
						<?php
						      $args = array( 'numberposts' => '3', 'post_status' => 'publish', 'category' => 4);

						      $recent_posts = wp_get_recent_posts($args);


						      foreach( $recent_posts as $key => $recent ){

										if ($key==0){

						   echo '<div class="hero-item category-list-item item-'. $key . '"><span class="image-gradient"></span><a class="image-link" href="' . get_permalink($recent["ID"]) .'">';
							 echo '<span class="hero-item-wrap"><span class="hero-list-hed hero-item-hed">' . $recent["post_title"] . '</span>';
							 echo '<div class="hero-data">' . date('Y-m-d H:i', strtotime($recent['post_date'])) . ' </div></span>';



						         if ( has_post_thumbnail( $recent["ID"]) ) {
						            echo  get_the_post_thumbnail($recent["ID"],'category-big');
						          }

											echo '<span class="cat-label cat-label-top-left ukrayina-label-bg">УКРАЇНА</span>';
															 echo '</a></div>';


						

					} else {

						echo '<div class="hero-item category-list-item-secondary item-'. $key . '"><span class="image-gradient"></span><a class="image-link" href="' . get_permalink($recent["ID"]) .'">';
						echo '<span class="hero-item-wrap"><span class="hero-list-hed hero-item-hed">' . $recent["post_title"] . '</span>';
						echo '<div class="hero-data">' . date('Y-m-d H:i', strtotime($recent['post_date'])) . ' </div></span>';



									if ( has_post_thumbnail( $recent["ID"]) ) {
										 echo  get_the_post_thumbnail($recent["ID"],'category-small');
									 }

											 echo '<span class="cat-label cat-label-top-left ukrayina-label-bg">УКРАЇНА</span>';

				 echo '</a></div>';
					}
				}

					wp_reset_postdata();

						?>
					</div>





					<?php
					//if(is_category()){
 //$cat = get_query_var('cat');
 //$category = get_category ($cat);
 echo do_shortcode('[ajax_load_more container_type="ul" css_classes="golovne-list" post_type="post" posts_per_page="27" category="ukrayina" offset="3" scroll="false" transition="none" transition_container="false" button_label="Показати ще" button_loading_label="Показати ще" cache_id="cache-'.$category->slug.'"]');
//}
					 ?>
				</div>
      </div>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(3);
?>
<div class="front-overlay-arrows">
	<div class="front-arrow-wrapper">
		<a href="/category/golovne/" rel="prev" data-ht="frontprev" id="cards-prev-link" class="front-arrow-weather" style="visibility: visible;">
			<div class="cards-nav-icon"></div>
				<div class="front-overlay-prev-arrows-anchor golovne-label-bg">
					<div class="front-prev-story-content-holder">
						<p class="front-prev-arrow-label">ВАЖЛИВО</p>
					</div>
				</div>
		</a>
		<a href="/category/eks-srsr/" rel="next" data-ht="frontnext" id="cards-next-link" class="front-arrow-news" style="visibility: visible;">
		<div class="cards-nav-icon"></div>
			<div class="front-overlay-next-arrows-anchor eks-srsr-label-bg">
				<div class="front-next-story-content-holder">
					<p class="front-next-arrow-label">екс-СРСР</p>
				</div>
			</div>
		</a>
	</div>
</div>
<?php
get_footer(category);
