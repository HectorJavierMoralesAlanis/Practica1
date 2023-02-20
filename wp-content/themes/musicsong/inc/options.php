<?php
/**
 * Theme Palace options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

/**
 * List of pages for page choices.
 * @return Array Array of page ids and name.
 */
function musicsong_page_choices() {
    $pages = get_pages();
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'musicsong' );
    foreach ( $pages as $page ) {
        $choices[ $page->ID ] = $page->post_title;
    }
    return  $choices;
}

/**
 * List of posts for post choices.
 * @return Array Array of post ids and name.
 */
function musicsong_post_choices() {
    $posts = get_posts( array( 'numberposts' => -1 ) );
    $choices = array();
    $choices[0] = esc_html__( '--Select--', 'musicsong' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

/**
 * List of audio for post choices.
 * @return Array Array of post ids and name.
 */
function musicsong_audio_choices() {
    $posts = get_posts( array( 'numberposts' => -1, 'post_type' => 'attachment', 'post_mime_type' => 'audio' ) );
    $choices = array();
    $choices[0] = esc_html__( '--None--', 'musicsong' );
    foreach ( $posts as $post ) {
        $choices[ $post->ID ] = $post->post_title;
    }
    wp_reset_postdata();
    return  $choices;
}

if ( ! function_exists( 'musicsong_site_layout' ) ) :
    /**
     * Site Layout
     * @return array site layout options
     */
    function musicsong_site_layout() {
        $musicsong_site_layout = array(
            'wide'  => get_template_directory_uri() . '/assets/images/full.png',
            'boxed-layout' => get_template_directory_uri() . '/assets/images/boxed.png',
            'frame-layout' => get_template_directory_uri() . '/assets/images/framed.png',
        );

        $output = apply_filters( 'musicsong_site_layout', $musicsong_site_layout );
        return $output;
    }
endif;

if ( ! function_exists( 'musicsong_selected_sidebar' ) ) :
    /**
     * Sidebars options
     * @return array Sidbar positions
     */
    function musicsong_selected_sidebar() {
        $musicsong_selected_sidebar = array(
            'sidebar-1'             => esc_html__( 'Default Sidebar', 'musicsong' ),
            'optional-sidebar'      => esc_html__( 'Optional Sidebar', 'musicsong' ),
        );

        $output = apply_filters( 'musicsong_selected_sidebar', $musicsong_selected_sidebar );

        return $output;
    }
endif;


if ( ! function_exists( 'musicsong_global_sidebar_position' ) ) :
    /**
     * Global Sidebar position
     * @return array Global Sidebar positions
     */
    function musicsong_global_sidebar_position() {
        $musicsong_global_sidebar_position = array(
            'right-sidebar'  => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'musicsong_global_sidebar_position', $musicsong_global_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'musicsong_sidebar_position' ) ) :
    /**
     * Sidebar position
     * @return array Sidbar positions
     */
    function musicsong_sidebar_position() {
        $musicsong_sidebar_position = array(
            'right-sidebar'  => get_template_directory_uri() . '/assets/images/right.png',
            'no-sidebar'    => get_template_directory_uri() . '/assets/images/full.png',
        );

        $output = apply_filters( 'musicsong_sidebar_position', $musicsong_sidebar_position );

        return $output;
    }
endif;


if ( ! function_exists( 'musicsong_pagination_options' ) ) :
    /**
     * Pagination
     * @return array site pagination options
     */
    function musicsong_pagination_options() {
        $musicsong_pagination_options = array(
            'numeric'   => esc_html__( 'Numeric', 'musicsong' ),
            'default'   => esc_html__( 'Default(Older/Newer)', 'musicsong' ),
        );

        $output = apply_filters( 'musicsong_pagination_options', $musicsong_pagination_options );

        return $output;
    }
endif;

if ( ! function_exists( 'musicsong_switch_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function musicsong_switch_options() {
        $arr = array(
            'on'        => esc_html__( 'Enable', 'musicsong' ),
            'off'       => esc_html__( 'Disable', 'musicsong' )
        );
        return apply_filters( 'musicsong_switch_options', $arr );
    }
endif;

if ( ! function_exists( 'musicsong_hide_options' ) ) :
    /**
     * List of custom Switch Control options
     * @return array List of switch control options.
     */
    function musicsong_hide_options() {
        $arr = array(
            'on'        => esc_html__( 'Yes', 'musicsong' ),
            'off'       => esc_html__( 'No', 'musicsong' )
        );
        return apply_filters( 'musicsong_hide_options', $arr );
    }
endif;

if ( ! function_exists( 'musicsong_sortable_sections' ) ) :
    /**
     * List of sections Control options
     * @return array List of Sections control options.
     */
    function musicsong_sortable_sections() {
        $sections = array(
            'slider'    => esc_html__( 'Main Slider', 'musicsong' ),
            'about'     => esc_html__( 'About Us', 'musicsong' ),
            'service'   => esc_html__( 'Services', 'musicsong' ),
            'latest_release' => esc_html__( 'Latest Release', 'musicsong' ),
            'cta'       => esc_html__( 'Call to Action', 'musicsong' ),
            'testimonial' => esc_html__( 'Testimonial', 'musicsong' ),
            'blog'      => esc_html__( 'Blog', 'musicsong' ),
        );
        return apply_filters( 'musicsong_sortable_sections', $sections );
    }
endif;
