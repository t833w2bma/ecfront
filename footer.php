<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package storefront
 */

?>

		</div><!-- .col-9 -->
		</div><!--row top-->
	</div><!-- #content -->

	<?php do_action( 'storefront_before_footer' ); ?>

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="col-full">

			<?php
			/**
			 * Functions hooked in to storefront_footer action
			 *
			 * @hooked storefront_footer_widgets - 10
			 * @hooked storefront_credit         - 20
			 */
			do_action( 'storefront_footer' );
			?>

		</div><!-- .col-full -->
	</footer><!-- #colophon -->

	<?php do_action( 'storefront_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>


<script>

window.addEventListener('load', function() {
         
		jQuery.ajax({
				url: "/wordpress/wp-content/themes/storefront/slick-slider.php",
				success: function (response) {
					if( response != undefined ) {
						jQuery('#masthead').append(response);
							
					}
				}, error: function () {
					console.log(response);
				}
		});

		 
});
		 
		 
</script>
</body>
</html>
