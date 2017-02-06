<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package hume
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php hume_the_category_list(); ?>

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

		<?php
		if ( is_active_sidebar( 'sidebar-1' ) && !is_page_template( 'custom-templates/post-nosidebar.php') ) : ?>
			<div class="entry-meta">
				<?php hume_posted_on(); ?>
			</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<?php
	if ( has_post_thumbnail() ) { ?>
	<figure class="featured-image full-bleed">
		<?php
		the_post_thumbnail('hume-full-bleed');
		?>
	</figure><!-- .featured-image full-bleed -->
	<?php } ?>

	<section class="post-content">


		<?php
		if ( !is_active_sidebar( 'sidebar-1' ) || is_page_template( 'custom-templates/post-nosidebar.php') ) : ?>

		<div class="post-content__wrap">
			<div class="entry-meta">
				<?php hume_posted_on(); ?>
			</div><!-- .entry-meta -->
			<div class="post-content__body">

		<?php
		endif; ?>

		<div class="entry-content">
			<?php
				the_content( sprintf(
					/* translators: %s: Name of current post. */
					wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'hume' ), array( 'span' => array( 'class' => array() ) ) ),
					the_title( '<span class="screen-reader-text">"', '"</span>', false )
				) );

				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'hume' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php hume_entry_footer(); ?>
		</footer><!-- .entry-footer -->

		<?php

		if ( !is_active_sidebar( 'sidebar-1' ) || is_page_template( 'custom-templates/post-nosidebar.php')) : ?>
			</div><!-- .post-content__body -->
		</div><!-- .post-content__wrap -->
		<?php endif; ?>

		<?php
		hume_post_navigation();

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;
		?>
	</section><!-- .post-content -->

	<?php get_sidebar(); ?>

</article><!-- #post-## -->
