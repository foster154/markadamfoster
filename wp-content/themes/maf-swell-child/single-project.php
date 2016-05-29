<?php
/**
* This template displays single post content.
*
* @package Swell Lite
* @since Swell Lite 1.0
*
*/
get_header(); ?>

<?php $thumb = ( '' != get_the_post_thumbnail() ) ? wp_get_attachment_image_src( get_post_thumbnail_id(), 'swell-featured-large' ) : false; ?>

<!-- BEGIN .post class -->
<div <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<!-- BEGIN .row -->
	<div class="row">
	
		<!-- BEGIN .content -->
		<div class="content">
	
			<!-- BEGIN .sixteen columns -->
			<div class="sixteen columns">
	
				<!-- BEGIN .postarea full -->
				<div class="postarea full">
		
					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
						<?php //Get the custom field 
							if (post_custom('wpcf-screenshot')) {
								$screenshots = get_post_meta( get_the_ID(), 'wpcf-screenshot', false );
							}
						?>

					<!-- BEGIN .post-holder -->
					<div class="post-holder shadow radius-full">

						<!-- BEGIN .article -->
						<div class="article">
							
							<?php if ( get_theme_mod('display_feature_post') == '' || ! has_post_thumbnail() ) { ?>
								<h1 class="headline"><?php the_title(); ?></h1>
							<?php } ?>
							
							<span class="divider-small"></span>
							
							<?php the_content(); ?>

							<?php foreach($screenshots as $screenshot) { ?>
							    
							  <a href="<?php echo $screenshot; ?>" rel="lightbox"> 
							    <div class="project-screenshot">
							    	<img src="<?php echo $screenshot; ?>">
							    </div>
							  </a>
							
							<?php } ?>
							
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
							
							<!-- BEGIN .post-meta -->
							<div class="post-meta">
							
								<p><i class="fa fa-bars"></i> <?php _e("Category:", 'swelllite'); ?> <?php the_category(', '); ?><?php $tag_list = get_the_tag_list( __( ", ", 'swelllite' ) ); if ( ! empty( $tag_list ) ) { ?> <i class="fa fa-tags"></i> <?php _e("Tags:", 'swelllite'); ?> <?php the_tags(''); ?><?php } ?></p>
							
							<!-- END .post-meta -->
							</div>
							
							<!-- BEGIN .post-navigation -->
							<div class="post-navigation">
								<div class="previous-post"><?php previous_post_link('&larr; %link'); ?></div>
								<div class="next-post"><?php next_post_link('%link &rarr;'); ?></div>
							<!-- END .post-navigation -->
							</div>
						
						<!-- END .article -->
						</div>

					<!-- END .post-holder -->
					</div>

					<div class="clear"></div>

					<?php endwhile; else: ?>

					<!-- BEGIN .post-holder -->
					<div class="post-holder shadow radius-full">

						<!-- BEGIN .article -->
						<div class="article">
						
							<div class="error-404">
								<h1 class="headline"><?php _e("No Posts Found", 'swelllite'); ?></h1>
								<p><?php _e("We're sorry, but the post was not found.", 'swelllite'); ?></p>
							</div>
							
						<!-- END .article -->
						</div>

					<!-- END .post-holder -->
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