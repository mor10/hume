<?php
/**
 * Template Name: Post with no sidebar
 * Template Post Type: post
 *
 * Displays single posts without sidebar when the sidebar is active.
 *
 * @package hume
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'single' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
