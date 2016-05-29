<?php

/**
 * Add child theme JS
 */

function maf_swell_child_scripts() {
	wp_enqueue_script( 'maf-script', get_template_directory_uri() . '/js/maf-script.js', array(), '1.0.0', true );
}

add_action( 'wp_enqueue_scripts', 'maf_swell_child_scripts' );

// ============================================
// === Front Page Buttons Shortcode ===========
// ============================================

function fp_content_function() {

	ob_start();
	?>
	
	<div class="fp-content-wrapper">
		<h3>Greetings!</h3>
		<img class="avatar img-round" alt="Mark Foster" src="<?php bloginfo('stylesheet_directory'); ?>/images/avatar.jpg" height="150" width="150" />
		<p>I'm Mark, a passionate frontend web developer based in Boise, Idaho.</p>

		<div class="fp-buttons-wrapper">
			<a href="/about" class="fp-button fp-about">
				<span>About</span>
			</a>
			<a href="/projects" class="fp-button fp-portfolio">
				<span>Projects</span>
			</a>
			<a href="/blog" class="fp-button fp-blog">
				<span>Blog</span>
			</a>
			<a href="/contact" class="fp-button fp-contact">
				<span>Contact</span>
			</a>
		</div>
	</div>

<?php

	return ob_get_clean();

}

add_shortcode('fp-content', 'fp_content_function');


// ============================================
// === Projects Page Shortcode ================
// ============================================

function maf_projects_function() {

	$args = array(
		'post-type' => 'project'
	);
	$query = new WP_Query( $args );

	ob_start();
	?>
	
	<?php if( $query->have_posts() ) : while( $query->have_posts() ) : $query->the_post(); ?>
	
	<a href="<?php the_permalink(); ?>">
		<div class="mafportfolio-item radius-full shadow">
			<div class="mafportfolio-caption">
				<h2 class="title">Panoractives</h2>
			</div>
			<div class="mafportfolio-image">
				<img src="<?php echo get_site_url(); ?>/wp-content/uploads/portfolio-logos/portfolio-logo-panoractives.jpg" alt="Panoractives Logo">
				<div class="mafportfolio-description">
					A full service real estate photography and virtual tour creation service. We use the latest in digital imaging technology to fully capture the beauty of homes.
				</div>
			</div>
		</div>
	</a>

	<?php endwhile; endif; wp_reset_postdata(); ?>

<?php

	return ob_get_clean();

}

add_shortcode('maf_projects', 'maf_projects_function');