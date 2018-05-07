<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package coletivo
 */
?>
    <footer id="colophon" class="site-footer" role="contentinfo">
        <?php $coletivo_btt_disable = get_theme_mod( 'coletivo_btt_disable' ); ?>
        <div class="site-info">
            <div class="container">
                <?php if ( $coletivo_btt_disable != '1' ) : ?>
                    <div class="btt">
                        <a class="back-top-top" href="#page" title="<?php echo esc_html__('Back To Top', 'coletivo') ?>"><i class="fa fa-angle-double-up wow flash" data-wow-duration="2s"></i></a>
                    </div><!-- btt -->
                <?php endif; ?>
                <?php if ( is_front_page() ) { ?>
                <div class="row section-widgets">
                        <div class="col-lg-4 col-sm-6">
                           <?php dynamic_sidebar('sidebar-3'); ?>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <?php dynamic_sidebar('sidebar-4'); ?>
                        </div>
                        <div class="col-lg-4 col-sm-6">
                            <?php dynamic_sidebar('sidebar-5'); ?>
                        </div>
                </div>
                <?php }; ?>
                <?php
                    /**
                     * Hooked: coletivo_footer_site_info
                     *
                     * @see coletivo_footer_site_info
                     */
                    do_action( 'coletivo_footer_site_info' );
                ?>
            </div><!-- container -->
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
    <?php
        /**
         * Hooked: coletivo_site_footer
         *
         * @see coletivo_site_footer
         */
        do_action( 'coletivo_site_end' );
    ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
