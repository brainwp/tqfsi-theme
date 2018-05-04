<?php
/**
 * Temos que falar sobre isso functions and definitions.
 *
 */

//function cti_custom_content_width() {
//    return '1040';
//}
//add_filter( 'coletivo_content_width', 'cti_custom_content_width' );

function cti_widgets_init() {
	register_sidebar( array(
		'name'          =>__( 'Widget Bottom 1', 'tainacan' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tainacan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Bottom 2', 'tainacan' ),
		'id'            => 'sidebar-4',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tainacan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	register_sidebar( array(
		'name'          => __( 'Widget Bottom 3', 'tainacan' ),
		'id'            => 'sidebar-5',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'tainacan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );
}
add_action( 'widgets_init', 'cti_widgets_init' );


// Altera a função do footer, originalmente no arquivo inc/template-tags.php

if ( ! function_exists( 'onepress_footer_site_info' ) ) {
    /**
     * Add Copyright and Credit text to footer
     * @since 1.1.3
     */
    function coletivo_footer_site_info()
    {
        ?>
        <div class="row site-credits">
        <div class="col-sm-6 sponsor">
        <br />
			Este site foi apoiado pelo<br /><a class="logo-sabin" rel="license" href="http://institutosabin.org.br" target="_blank" alt="Instituto Sabin">Instituto Sabin</a>
        </div>
		<div class="col-sm-6 credits">
        <?php printf(esc_html__('Desenvolvido pela %1$s com %2$s', 'coletivo'), '<a class="logo-brasa" href="' . esc_url('https://brasa.art.br', 'coletivo') . '">Brasa</a>', '<a class="logo-wp" href="' . esc_url('https://br.wordpress.org', 'coletivo') . '"><i class="fa fa-wordpress" aria-hidden="true"></i></a>'); ?>
        </div>
        </div>
        <?php
    }
}
add_action( 'coletivo_footer_site_info', 'coletivo_footer_site_info' );

/**
 * Hook to add custom section before feature section
 *
 * @see wp-content/themes/onepress/template-frontpage.php
 */
function add_custom_section_tqfsi(){

$coletivo_tqfsi_id        = get_theme_mod( 'coletivo_tqfsi_id', esc_html__('tqfsi', 'coletivo') );
$coletivo_tqfsi_disable   = get_theme_mod( 'coletivo_tqfsi_disable' ) == 1 ? true : false;
$coletivo_tqfsi_title     = get_theme_mod( 'coletivo_tqfsi_title', esc_html__('Seção TQFSI', 'coletivo' ));
$coletivo_tqfsi_subtitle  = get_theme_mod( 'coletivo_tqfsi_subtitle', esc_html__('Section subtitle', 'coletivo' ));
$coletivo_tqfsi_more_link = get_theme_mod( 'coletivo_tqfsi_more_link', '#' );
$coletivo_tqfsi_more_text = get_theme_mod( 'coletivo_tqfsi_more_text', esc_html__('More', 'coletivo' ));
$desc = get_theme_mod( 'coletivo_tqfsi_desc' );

if ( coletivo_is_selective_refresh() ) {
    $disable = false;
}
if ( ! $coletivo_tqfsi_disable  ) :

if ( ! coletivo_is_selective_refresh() ){ ?>
<section id="<?php if ( $coletivo_tqfsi_id != '' ) echo $coletivo_tqfsi_id; ?>" <?php do_action( 'coletivo_section_atts', 'coletivo' ); ?> class="<?php echo esc_attr( apply_filters( 'coletivo_section_class', 'section-tqfsi section-padding onepage-section', 'coletivo' ) ); ?>">
<?php } ?>
    <?php do_action( 'coletivo_section_before_inner', 'coletivo' ); ?>
    <div class="container">
        <?php if ( $coletivo_tqfsi_title ||  $coletivo_tqfsi_subtitle ||  $desc ) { ?>
        <div class="section-title-area">
            <?php if ( $coletivo_tqfsi_subtitle != '' ) echo '<h5 class="section-subtitle">' . esc_html( $coletivo_tqfsi_subtitle ) . '</h5>'; ?>
            <?php if ( $coletivo_tqfsi_title != '' ) echo '<h2 class="section-title">' . esc_html( $coletivo_tqfsi_title ) . '</h2>'; ?>
            <?php if ( $desc ) {
                echo '<div class="section-desc">' . apply_filters( 'the_content', wp_kses_post( $desc ) ) . '</div>';
            } ?>
        </div>
        <?php } ?>

        <?php if ( $coletivo_tqfsi_more_link != '' ) { ?>
    <div class="more-link">
        <a class="btn btn-theme-primary btn-lg" href="<?php echo esc_url($coletivo_tqfsi_more_link) ?>"><?php if ( $coletivo_tqfsi_more_text != '' ) echo esc_html( $coletivo_tqfsi_more_text ); ?></a>
    </div>
    <?php } ?>
    </div>
    <?php do_action( 'coletivo_section_after_inner', 'tainacan' ); ?>
<?php if ( ! coletivo_is_selective_refresh() ){ ?>
</section>
<?php } ?>
<?php endif;
wp_reset_query();

}
add_action( 'coletivo_before_section_features', 'add_custom_section_tqfsi'  );

function add_custom_section_tqfsi_search(){
$coletivo_tqfsi_search_disable   = get_theme_mod( 'coletivo_tqfsi_search_disable' ) == 1 ? true : false;
$coletivo_tqfsi_search_title     = get_theme_mod( 'coletivo_tqfsi_search_title', esc_html__('Search', 'coletivo' ));

if ( coletivo_is_selective_refresh() ) {
    $disable = false;
}
if ( ! $coletivo_tqfsi_search_disable  ) :

if ( ! coletivo_is_selective_refresh() ){ ?>
<section id="tqfsi-search" <?php do_action( 'coletivo_section_atts', 'coletivo' ); ?> class="<?php echo esc_attr( apply_filters( 'coletivo_section_class', 'section-tqfsi-search section-padding onepage-section', 'coletivo' ) ); ?>">
<?php } ?>
    <?php do_action( 'coletivo_section_before_inner', 'coletivo' ); ?>
    <div class="container">
        <div class="section-content">
                <div class="row">
                        <?php if ( $coletivo_tqfsi_search_title ) { ?>
                    <div class="section-title-area">
                        <?php if ( $coletivo_tqfsi_search_title != '' ) echo '<h2 class="section-title search-title">' . esc_html( $coletivo_tqfsi_search_title ) . '</h2>'; ?>
                    </div>
                        <?php } ?>
                            <div class="col-sm-12 home-search">
                                <?php get_search_form(); ?>
                            </div>
                </div>
        </div>
    </div>
    <?php do_action( 'coletivo_section_after_inner', 'tainacan' ); ?>
<?php if ( ! coletivo_is_selective_refresh() ){ ?>
</section>
<?php } ?>
<?php endif;

}
add_action( 'coletivo_after_section_features', 'add_custom_section_tqfsi_search'  );

function coletivo_customize_after_register( $wp_customize ) {

    /*------------------------------------------------------------------------*/
    /*  TQFSI
    /*------------------------------------------------------------------------*/

    $wp_customize->add_section( 'coletivo_tqfsi_settings' ,
        array(
            'priority'    => 0,
            'capability'     => 'edit_theme_options',
            'theme_supports' => '',
            'title'       => esc_html__( 'Seção TQFSI', 'coletivo' ),
            'description' => '',
            'panel'          => 'theme_options',
        )
    );
    // Show Content
    $wp_customize->add_setting( 'coletivo_tqfsi_disable',
        array(
            'sanitize_callback' => 'coletivo_sanitize_checkbox',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 'coletivo_tqfsi_disable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Hide this section?', 'coletivo'),
            'section'     => 'coletivo_tqfsi_settings',
            'description' => esc_html__('Check this box to hide this section.', 'coletivo'),
        )
    );
    // Section ID
    $wp_customize->add_setting( 'coletivo_tqfsi_id',
        array(
            'sanitize_callback' => 'coletivo_sanitize_text',
            'default'           => esc_html__('tqfsi', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_tqfsi_id',
        array(
            'label'     => esc_html__('Section ID:', 'coletivo'),
            'section'       => 'coletivo_tqfsi_settings',
            'description'   => esc_html__( 'The section id, we will use this for link anchor.', 'coletivo' )
        )
    );
    // Title
    $wp_customize->add_setting( 'coletivo_tqfsi_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Sobre a TQFSI', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_tqfsi_title',
        array(
            'label'     => esc_html__('Section Title', 'coletivo'),
            'section'       => 'coletivo_tqfsi_settings',
            'description'   => '',
        )
    );
    // Sub Title
    $wp_customize->add_setting( 'coletivo_tqfsi_subtitle',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Section subtitle', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_tqfsi_subtitle',
        array(
            'label'     => esc_html__('Section Subtitle', 'coletivo'),
            'section'       => 'coletivo_tqfsi_settings',
            'description'   => '',
        )
    );

    // Description
    $wp_customize->add_setting( 'coletivo_tqfsi_desc',
        array(
            'sanitize_callback' => 'coletivo_sanitize_text',
            'default'           => '',
        )
    );
    $wp_customize->add_control( new coletivo_Editor_Custom_Control(
        $wp_customize,
        'coletivo_tqfsi_desc',
        array(
            'label'         => esc_html__('Section Description', 'coletivo'),
            'section'       => 'coletivo_tqfsi_settings',
            'description'   => '',
        )
    ));

    // More Button
    $wp_customize->add_setting( 'coletivo_tqfsi_more_link',
        array(
            'sanitize_callback' => 'esc_url',
            'default'           => '#',
        )
    );
    $wp_customize->add_control( 'coletivo_tqfsi_more_link',
        array(
            'label'       => esc_html__('More tqfsi button link', 'coletivo'),
            'section'     => 'coletivo_tqfsi_settings',
            'description' => esc_html__(  'It should be your blog page link.', 'coletivo' )
        )
    );
    $wp_customize->add_setting( 'coletivo_tqfsi_more_text',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('More', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_tqfsi_more_text',
        array(
            'label'         => esc_html__('More Button', 'coletivo'),
            'section'       => 'coletivo_tqfsi_settings',
            'description'   => '',
        )
    );

    // Show Search
    $wp_customize->add_setting( 'coletivo_tqfsi_search_disable',
        array(
            'sanitize_callback' => 'coletivo_sanitize_checkbox',
            'default'           => '',
        )
    );
    $wp_customize->add_control( 'coletivo_tqfsi_search_disable',
        array(
            'type'        => 'checkbox',
            'label'       => esc_html__('Hide the TQFSI search section?', 'coletivo'),
            'section'     => 'coletivo_tqfsi_settings',
            'description' => esc_html__('Check this box to hide this section.', 'coletivo'),
        )
    );
    // Search Title
    $wp_customize->add_setting( 'coletivo_tqfsi_search_title',
        array(
            'sanitize_callback' => 'sanitize_text_field',
            'default'           => esc_html__('Search', 'coletivo'),
        )
    );
    $wp_customize->add_control( 'coletivo_tqfsi_search_title',
        array(
            'label'     => esc_html__('Search', 'coletivo'),
            'section'       => 'coletivo_tqfsi_settings',
            'description'   => '',
        )
    );

}
add_action( 'coletivo_customize_after_register', 'coletivo_customize_after_register' );

function coletivo_customizer_child_partials( $wp_customize ) {

    // Abort if selective refresh is not available.
    if ( ! isset( $wp_customize->selective_refresh ) ) {
        return;
    }

    $selective_refresh_keys = array(

        // section tqfsi
        array(
            'id' => 'tqfsi',
            'selector' => '.section-tqfsi',
            'settings' => array(
                'coletivo_tqfsi_title',
                'coletivo_tqfsi_subtitle',
                'coletivo_tqfsi_desc',
                'coletivo_tqfsi_more_text',
                'coletivo_tqfsi_more_link',
            ),
        ),

        // section tqfsi search
        array(
            'id' => 'tqfsi-search',
            'selector' => '.section-tqfsi-search',
            'settings' => array(
                'coletivo_tqfsi_search_title',
                'coletivo_tqfsi_search_disable',
            ),
        )
    );
}
add_action( 'customize_register', 'coletivo_customizer_child_partials', 50 );
