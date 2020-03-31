<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package bankrupt
 */

?>
</div>
	</div><!-- #content -->

	<footer id="colophon" class="site-footer">
		<div class=" footer site-footer">

				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-footer',
						'menu_id'        => 'footer-menu',
						'container'       => 'div',
						'container_class' => 'footer-nav',
						'menu_class'      => 'footer-nav-list',
						'after'           => '<span></span>',
						'link_before'     => '<span class="footer-nav-span">',
						'link_after'      => '</span>',
					) );
				?>
					<div class="site-footer-content">
						<div class="site-footer-widget">
							<?php dynamic_sidebar( 'footer-1' ); ?>
						</div>
						<div class="site-footer-widget">
							<?php dynamic_sidebar( 'footer-2' ); ?>
							<p>
								&copy; <?php echo date('Y'); ?> All Rights Reserved
							</p>
						</div>
						<div class="site-footer-widget">
							<?php dynamic_sidebar( 'footer-3' ); ?>
						</div>
					</div>
		</div><!-- .site-footer -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
  jQuery(document).ready(function() {
    jQuery('.content, .sidebar').theiaStickySidebar({
      // Settings
      additionalMarginTop: 30
    });
  });
</script>

</body>
</html>
