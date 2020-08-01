<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Susty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content post-content' ); ?>>

	<header>
		<div class="contentable">
			<?php
			get_template_part( 'entry-parts/breadcrumb' );
			?>
			<div class="entry-meta">
				<?php
				susty_wp_posted_on();
				?>
			</div><!-- .entry-meta -->
			<?php
			the_title( '<h1>', '</h1>' );
			printf( '<div class="post-excerpt">%s</div>', get_the_excerpt() );
			?>
			<?php
			$post_link = "https://developer.mozilla.org/fr/docs/Web/API/Window/open";

			$shareTwitter  = sprintf( "https://twitter.com/intent/tweet?url=$post_link&text=%s", get_the_title() . ' par @alexsoyes' );
			$shareLinkedIn = "https://www.linkedin.com/sharing/share-offsite/?url=$post_link";
			$shareFacebook = "https://www.facebook.com/v3.3/dialog/share?app_id=993736991064466&href=$post_link&display=page&redirect_uri=https://facebook.com";
			?>
			<div class="socials">
				<a target="_blank" class="" data-size="large" href="<?php echo $shareTwitter; ?>">Twitter</a>
				<a target="_blank" class="" href="<?php echo $shareFacebook; ?>" class="">Facebook</a>
				<a href="#" data-window="<?php echo $shareLinkedIn; ?>" class="">LinkedIn</a>
			</div>
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
