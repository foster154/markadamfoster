<!-- BEGIN .page-holder -->
<div class="page-holder shadow radius-full">

	<!-- BEGIN .article -->
	<div class="article clearfix">

		<h1 class="headline"><?php echo esc_html( get_the_author() ); ?></h1>
		
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), 120 ); ?>
		</div>
		
		<!-- BEGIN .author-column -->
		<div class="author-column">
		
			<?php $website = get_the_author_meta( 'user_url' ); ?>
			<?php if ( ! empty( $website ) ) : ?>
				<h6><?php _e("Website:", 'swelllite'); ?></h6>
				<p><a href="<?php echo esc_url( $website ); ?>" rel="bookmark" title="<?php esc_attr_e("Link to author page", 'swelllite'); ?>" target="_blank"><?php echo esc_url( $website ); ?></a></p>
			<?php endif; ?>
		
			<?php $description = get_the_author_meta( 'description' ); ?>
			<?php if ( ! empty( $description ) ) : ?>
				<h6><?php _e( "Profile:", 'swelllite' ); ?></h6>
				<p><?php echo wp_kses_post( $description ); ?></p>
			<?php endif; ?>
			
			<?php if ( have_posts() ) : ?>
			
			<h6><?php printf( __( 'Posts by %1$s:', 'swelllite'), get_the_author() );  ?></h6>
			
			<ul class="author-posts">
				<?php while ( have_posts() ) : the_post(); ?>
				<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
				<?php endwhile; ?>
			</ul>
			
			<div class="pagination">
				<?php echo swelllite_get_pagination_links(); ?>
			</div><!-- END .pagination -->
		
			<?php else: ?>
				<p><?php _e("No posts by this author.", 'swelllite'); ?></p>
			<?php endif; ?>
		
		<!-- END .author-column -->
		</div>
		
	<!-- END .article -->
	</div>

<!-- END .page-holder -->
</div>