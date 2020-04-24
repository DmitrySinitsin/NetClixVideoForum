<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Devion
 */
?>
	
	</div><!-- #content -->
	<div id="footer-widgets">
		<div class="container"><div class="row">
				<?php if ( ! dynamic_sidebar( 'sidebar-2' ) ) : ?>
				<?php endif; // end sidebar widget area ?>
		</div></div>
	</div>
	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="container"><div class="row">
			<div class="col-md-12">
				<div class="site-info">
					Copyright &copy; <?php echo date('Y');?> <a href="<?php bloginfo('url'); ?>" title="<?php bloginfo('name'); ?>"><?php bloginfo('name'); ?></a> - <?php bloginfo('description'); ?>.<br/>
					Сайт поддерживает: <a href="https://github.com/DmitrySinitsin" >Dmitry Sinitsin</a>
				</div><!-- .site-info -->
			</div>
		</div></div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
