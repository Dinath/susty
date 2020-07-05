<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */


$has_sidebar_1 = is_active_sidebar( 'sidebar-footer-1' );
$has_sidebar_2 = is_active_sidebar( 'sidebar-footer-2' );
$has_sidebar_3 = is_active_sidebar( 'sidebar-footer-3' );
?>
	</div><!-- #content -->

	<footer id="colophon">

		<?php if ( $has_sidebar_1 || $has_sidebar_2 || $has_sidebar_3 ) : ?>
		<div class="wp-block-columns">
			<?php if ( $has_sidebar_1 ) : ?>
            <div class="wp-block-column"><?php dynamic_sidebar( 'sidebar-footer-1' ); ?></div>
			<?php endif; ?>

			<?php if ( $has_sidebar_2 ) : ?>
			<div class="wp-block-column"><?php dynamic_sidebar( 'sidebar-footer-2' ); ?></div>
			<?php endif; ?>

			<?php if ( $has_sidebar_3 ) : ?>
			<div class="wp-block-column"><?php dynamic_sidebar( 'sidebar-footer-3' ); ?></div>
			<?php endif; ?>
		</div>
		<?php endif; ?>

		<p class="copyright">&copy; 2020 - <?php bloginfo( 'name' ); ?></p>

	</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
