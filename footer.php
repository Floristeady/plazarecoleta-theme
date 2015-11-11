<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the id=main div and all content
 * after.  Calls sidebar-footer.php for bottom widgets.
 *
 * @package WordPress
 * @subpackage plazarecoleta
 * @since plazarecoleta 1.0
 */
?>

	</section><!-- #main -->
	
	<footer id="footer" role="contentinfo">
		<div id="footer-content">

		<?php if ( is_active_sidebar( 'first-footer-widget-area' ) ) : ?>
			<ul class="widget-list">
				<?php dynamic_sidebar( 'first-footer-widget-area' ); ?>
			</ul>
		<?php endif; ?>

		</div>
		
	</footer><!-- footer -->

<?php
	/* Always have wp_footer() just before the closing </body>
	 * tag of your theme, or you will break many plugins, which
	 * generally use this hook to reference JavaScript files.
	 */
	wp_footer();
?>
	</body>
</html>