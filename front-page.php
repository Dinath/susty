<?php
/**
 * The template for displaying home page.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _s
 */

get_header();
?>
	<main id="primary" class="site-main">
		<?php
		while ( have_posts() ) :
			the_post();
			if ( ! is_front_page() && is_home() ) :
				get_template_part( 'template-parts/content', 'home' );
			else :
				?>
				<div class="contentable">
					<?php the_content(); ?>
				</div>
				<?php
			endif;
		endwhile;
		?>
		<?php
		if ( is_front_page() && ! is_home() ) :
			?>
			<div class="aligncenter">
				<a href="<?php echo get_post_type_archive_link( 'post' ); ?>" class="button"><?php esc_html_e( 'All posts.', 'susty' ); ?></a>
			</div>
			<?php
		else :
			get_template_part( 'template-parts/pagination' );
		endif;
		?>
	</main><!-- #main -->
<?php
get_sidebar();
get_footer();
