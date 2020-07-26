<?php
/**
 * The template for displaying the footer
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Susty
 */

?>
</div><!-- #content -->

<footer id="colophon">

    <div class="last-text">
        <p class="h1">¯\_(ツ)_/¯</p>
        <p>On est responsable de notre propre avenir !<br>
            <strong>Deviens un meilleur développeur dès aujourd'hui.</strong>
        </p>
		<?php get_template_part( 'template-parts/newsletter' ); ?>
    </div>

    <div class="menu-container">
		<?php
		if ( has_nav_menu( 'menu-1' ) ) :
			?>
            <nav>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'footer-menu',
					)
				);
				?>
            </nav>
		<?php
		endif;
		?>
    </div>

    <small class="copyright">&copy; 2020 - <?php bloginfo( 'name' ); ?></small>

</footer>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
