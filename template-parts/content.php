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
	<?php
	// Conditinoal Featured Image
	if ( has_post_thumbnail() ) { ?>
		<figure class="featured-image index-image">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark">
			<?php 
				the_post_thumbnail( 'humescores-index' );
			?>
			</a>
		</figure><!-- .featured-image -->
	<?php } ?>
	<div class="post__content">
		<header class="entry-header">
			<?php hume_category_list(); ?>
			<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<?php hume_posted_on(); ?>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				$length_setting = get_theme_mod('length_setting');
				if ( 'excerpt' === $length_setting ) {
					the_excerpt();
				} else {
					the_content();
				}
			?>
		</div><!-- .entry-content -->
		
		<?php 
		$read_more_link = sprintf(
			/* translators: %s: Name of current post. */
			wp_kses( __( 'Continue reading%s', 'humescores' ), array( 'span' => array( 'class' => array() ) ) ),
			the_title( ' <span class="screen-reader-text">"', '"</span>', false )
		);
		?>
		<div class="continue-reading">
			<a href="<?php echo esc_url( get_permalink() ); ?>" rel="bookmark"><?php echo $read_more_link; ?></a>
		</div>

	</div><!-- .post-content -->
</article><!-- #post-## -->
