<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Susty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header>
		<div class="contentable">
		<?php
		if ( 'post' === get_post_type() ) :
			?>
			<div class="entry-meta">
				<?php
				susty_wp_posted_on();
				?>
			</div><!-- .entry-meta -->
			<?php
		endif;
		the_title( '<h1>', '</h1>' );
		susty_wp_post_category();
		the_excerpt();
		if ( ! is_archive() ) {
			get_template_part( 'entry-parts/breadcrumb' );
		}
		?>
		</div>
	</header>

	<div id="content" class="post-inner">
		<?php
		if ( ! is_archive() ) {
			the_content(
				sprintf(
					wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'susty' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				)
			);
		}

		wp_link_pages(
			array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'susty' ),
				'after'  => '</div>',
			)
		);
		?>
	</div>

	<footer class="contentable">
		<?php susty_wp_entry_footer(); ?>
	</footer>
</article><!-- #post-<?php the_ID(); ?> -->
