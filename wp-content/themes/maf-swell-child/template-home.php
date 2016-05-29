<?php
/**
Template Name: MAF Home
*
* This template is used to display full-width pages.
*
* @package Swell Lite
* @since Swell Lite 1.0
*
*/
get_header(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'swell-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="page-<?php the_ID(); ?>">

	<?php if ( has_post_thumbnail() ) { ?>
		<div class="feature-img page-banner" <?php if ( ! empty( $thumb ) ) { ?> style="background-image: url(<?php echo $thumb[0]; ?>);" <?php } ?>>
			<h1 class="headline img-headline"><?php the_title(); ?></h1>
			<?php the_post_thumbnail( 'swell-featured-large' ); ?>
		</div>
	<?php } ?>
	
	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content<?php if ( has_post_thumbnail() ) { ?> overlap<?php } ?>">
		
			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">
		
				<!-- BEGIN .postarea full -->
				<div class="postarea full">
		
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

					<!-- BEGIN .page-holder -->
					<div class="page-holder shadow radius-full">

						<!-- BEGIN .article -->
						<div class="article">
						
							<?php the_content(__("Read More", 'swelllite')); ?>
							
							<?php wp_link_pages(array(
								'before' => '<p class="page-links"><span class="link-label">' . __('Pages:', 'swelllite') . '</span>',
								'after' => '</p>',
								'link_before' => '<span>',
								'link_after' => '</span>',
								'next_or_number' => 'next_and_number',
								'nextpagelink' => __('Next', 'swelllite'),
								'previouspagelink' => __('Previous', 'swelllite'),
								'pagelink' => '%',
								'echo' => 1 )
							); ?>
							
							<?php edit_post_link(__("(Edit)", 'swelllite'), '', ''); ?>
						
						<!-- END .article -->
						</div>

					<!-- END .page-holder -->
					</div>

					<?php if ( comments_open() || '0' != get_comments_number() ) comments_template(); ?>

					<div class="clear"></div>

					<?php endwhile; else: ?>

					<!-- BEGIN .page-holder -->
					<div class="page-holder shadow radius-full">

						<!-- BEGIN .article -->
						<div class="article">

							<div class="error-404">
								<h1 class="headline"><?php _e("Page Not Found", 'swelllite'); ?></h1>
								<p><?php _e("We're sorry, but the page could not be found.", 'swelllite'); ?></p>
							</div>

						<!-- END .article -->
						</div>

					<!-- END .page-holder -->
					</div>

					<?php endif; ?>
		
				<!-- END .postarea full -->
				</div>
			
			<!-- END .sixteen columns -->
			</div>
		
		<!-- END .content -->
		</div>
	
	<!-- END .row -->
	</div>

<!-- END .post class -->
</div>

<?php get_footer(); ?>