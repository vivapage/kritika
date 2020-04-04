<?php
/**
 * The template for displaying golovne category page
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package bankrupt
 */

get_header();
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
						
					</div>


					<?php
						 echo do_shortcode('[ajax_load_more container_type="ul" css_classes="golovne-list" post_type="post" posts_per_page="27" category="'.$category->slug.'" scroll="false" transition="none" transition_container="false" button_label="Показать еще" button_loading_label="Показать еще" cache_id="cache-'.$category->slug.'"]');
					 ?>
				</div>
      </div>
		</div><!-- #main -->
	</div><!-- #primary -->

<?php
get_sidebar(3);
?>

<?php
get_footer('single');
