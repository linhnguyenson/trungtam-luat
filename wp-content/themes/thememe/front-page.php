<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package thememe
 */

get_header(); ?>
<section id="section-1" class="section">
	<div class="row-sm-expand">
		<div class="row row-sm-height">
			<div class="col-sm-9 col-sm-height col-sm-top">
				<div class="inside-full-height box-content">
				<?php echo get_template_part( 'template-parts/section', 'slider' ); ?>
				</div>
			</div>
			<div class="col-sm-3 col-sm-height col-sm-top">
				<div class="inside-full-height box-content">
					<div class="box-content-header"><h2 class="widget-title heading-title">Recent Posts</h2></div>
				</div>
			</div>
		</div>
	</div>
</section>
<section id="section-3">
	<div class="row-sm-expand">
		<div class="row row-sm-height">
			<div class="col-sm-9 col-sm-height col-sm-top">
				<div class="inside-full-height box-content">
					<?php echo do_shortcode("[catbox slug=dao-tao-ngan-han /]");?>
				</div>
			</div>
			<div class="col-sm-3 col-sm-height col-sm-top">
				<?php echo get_template_part( 'template-parts/section', 'review' ); ?>
				
			</div>
		</div>
	</div>
	
</section>

<?php get_footer(); ?>
