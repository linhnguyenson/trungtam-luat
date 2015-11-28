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
				<div class="row">
					<div class="col-sm-8">
						<?php echo (ot_get_option('footer')!='')?ot_get_option('footer'):'Copyright © 2013 Trung Tâm tư vấn pháp luật và đào tạo ngắn hạn. All rights reserved. ';?>
					</div>
					<div class="col-sm-4">
						<?php get_sidebar('footer');?>
					</div>
				</div>
				
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

		$('[data-toggle="tooltip"]').tooltip();

		$('.selectpicker').selectpicker();

		$("a[rel^='prettyPhoto']").prettyPhoto();

		setUpCarouselIndicator("#carousel-review", ".carousel-clone");
		setUpCarouselIndicator("#carousel-gallery", ".carousel-gallery-clone");

		function setUpCarouselIndicator(carouselId, carouselIndicatorClass) {
			var slideByClick = false;
			$(carouselId).on('slid.bs.carousel', function () {
				if(slideByClick) {
					slideByClick = false;
					return true;
				}
				$holder = $( carouselIndicatorClass + " ol li.active" );
				$holder.next( "li" ).addClass("active");
				if($holder.is(':last-child')) {
					$holder.removeClass("active");
					$(carouselIndicatorClass + " ol li:first").addClass("active");
				}
				$holder.removeClass("active");
			});

			$(carouselIndicatorClass + " ol.carousel-indicators  li").on("click",function(){
				slideByClick = true;
				$(carouselIndicatorClass + " ol.carousel-indicators li.active").removeClass("active");
				$(this).addClass("active");
			});
		};

		$('.bx-partners').bxSlider({
		  	minSlides: 2,
		  	maxSlides: 5,
		  	slideWidth: 180,
		  	slideMargin: 10
		});


		$( "#other-links" ).change(function() {
		 	var url=($(this).val());
		 	if(url!='none') window.open($(this).val(), "_blank");
		});
	});
</script>

</body>
</html>
