<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package thememe
 */

?>
		</div><!--.container-->
	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">
			<div class="container">
				<?php echo (ot_get_option('footer')!='')?ot_get_option('footer'):'Copyright © 2013 Trung Tâm tư vấn pháp luật và đào tạo ngắn hạn. All rights reserved. ';?>
			</div><!-- .site-info -->
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

<script type="text/javascript">
	jQuery(function($) {
		function resize_full_height() {
			$(".inside-full-height").each(function (index, element) {
				var elementHeight = $(element).height();
				var parentHeight = $(element).parent().height();
				if(elementHeight < parentHeight)
					$(element).height(parentHeight);
			});
		}

		resize_full_height();

        $(window).on("resize", function() {
			resize_full_height();
		});
	});
</script>

</body>
</html>
