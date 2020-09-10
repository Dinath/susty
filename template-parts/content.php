    <?php
    /**
     * Template part for displaying posts
     *
     * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
     *
     * @package Susty
     */

    $post_link = get_the_permalink();

    $svgTwitter = '<svg fill="#000" width="29" height="29"><path d="M22.05 7.54a4.47 4.47 0 0 0-3.3-1.46 4.53 4.53 0 0 0-4.53 4.53c0 .35.04.7.08 1.05A12.9 12.9 0 0 1 5 6.89a5.1 5.1 0 0 0-.65 2.26c.03 1.6.83 2.99 2.02 3.79a4.3 4.3 0 0 1-2.02-.57v.08a4.55 4.55 0 0 0 3.63 4.44c-.4.08-.8.13-1.21.16l-.81-.08a4.54 4.54 0 0 0 4.2 3.15 9.56 9.56 0 0 1-5.66 1.94l-1.05-.08c2 1.27 4.38 2.02 6.94 2.02 8.3 0 12.86-6.9 12.84-12.85.02-.24 0-.43 0-.65a8.68 8.68 0 0 0 2.26-2.34c-.82.38-1.7.62-2.6.72a4.37 4.37 0 0 0 1.95-2.51c-.84.53-1.81.9-2.83 1.13z"></path></svg>';
    $svgLinkedIn = '<svg fill="#000" width="29" height="29" viewBox="0 0 29 29"><path d="M5 6.36C5 5.61 5.63 5 6.4 5h16.2c.77 0 1.4.61 1.4 1.36v16.28c0 .75-.63 1.36-1.4 1.36H6.4c-.77 0-1.4-.6-1.4-1.36V6.36z"></path><path fill-rule="evenodd" clip-rule="evenodd" d="M10.76 20.9v-8.57H7.89v8.58h2.87zm-1.44-9.75c1 0 1.63-.65 1.63-1.48-.02-.84-.62-1.48-1.6-1.48-.99 0-1.63.64-1.63 1.48 0 .83.62 1.48 1.59 1.48h.01zM12.35 20.9h2.87v-4.79c0-.25.02-.5.1-.7.2-.5.67-1.04 1.46-1.04 1.04 0 1.46.8 1.46 1.95v4.59h2.87v-4.92c0-2.64-1.42-3.87-3.3-3.87-1.55 0-2.23.86-2.61 1.45h.02v-1.24h-2.87c.04.8 0 8.58 0 8.58z" fill="#fff"></path></svg>';
    $svgFacebook = '<svg fill="#000" width="29" height="29"><path d="M23.2 5H5.8a.8.8 0 0 0-.8.8V23.2c0 .44.35.8.8.8h9.3v-7.13h-2.38V13.9h2.38v-2.38c0-2.45 1.55-3.66 3.74-3.66 1.05 0 1.95.08 2.2.11v2.57h-1.5c-1.2 0-1.48.57-1.48 1.4v1.96h2.97l-.6 2.97h-2.37l.05 7.12h5.1a.8.8 0 0 0 .79-.8V5.8a.8.8 0 0 0-.8-.79"></path></svg>';

    $shareTwitter  = sprintf( "https://twitter.com/intent/tweet?url=$post_link&text=%s", get_the_title() . ' par @alexsoyes' );
    $shareLinkedIn = "https://www.linkedin.com/sharing/share-offsite/?url=$post_link";
    $shareFacebook = "https://www.facebook.com/v3.3/dialog/share?app_id=993736991064466&href=$post_link&display=page&redirect_uri=https://facebook.com";

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
                <?php the_title( '<h1>', '</h1>' ); ?>
                <?php the_content_time_to_read(); ?>
                <?php printf( '<div class="post-excerpt">%s</div>', get_the_excerpt() ); ?>
                <div class="socials">
                    <button data-tab="<?php echo $shareTwitter; ?>"><?php echo $svgTwitter; ?></button>
                    <button data-tab="<?php echo $shareFacebook; ?>"><?php echo $svgFacebook; ?></button>
                    <button data-window="<?php echo $shareLinkedIn; ?>"><?php echo $svgLinkedIn; ?></button>
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

        <footer class="sharable socials">
            <div class="contentable">
                <h3>❤️ Tu as aimé cet article ?️</h3>
                <p>J'ai mis un moment à l'écrire... Ce serait top si tu pouvais le partager à la communauté !</p>
                <div class="socials">
                    <button data-tab="<?php echo $shareTwitter; ?>"><?php echo $svgTwitter; ?> Twitter</button>
                    <button data-tab="<?php echo $shareFacebook; ?>"><?php echo $svgFacebook; ?> Facebook</button>
                    <button data-window="<?php echo $shareLinkedIn; ?>"><?php echo $svgLinkedIn; ?> LinkedIn</button>
                </div>
            </div>
        </footer>
    </article><!-- #post-<?php the_ID(); ?> -->
