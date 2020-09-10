<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Susty
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'content' ); ?>>

    <div class="contentable">

        <header>
            <small class="entry-meta"><?php susty_wp_posted_on(); ?></small>
			<?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<?php susty_wp_post_category(); ?>

        </header>

        <div>
			<?php
			the_excerpt();

			wp_link_pages(
				array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'susty' ),
					'after'  => '</div>',
				)
			);
			?>
        </div>

        <footer>
            <small class="entry-time">
		        <?php the_content_time_to_read() ?>
            </small>
        </footer>

    </div><!-- .contentable -->

</article><!-- #post-<?php the_ID(); ?> -->
