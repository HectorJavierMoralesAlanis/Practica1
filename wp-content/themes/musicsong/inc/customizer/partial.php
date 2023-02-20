<?php
/**
* Partial functions
*
* @package Theme Palace
* @subpackage Musicsong
* @since Musicsong 1.0.0
*/

if ( ! function_exists( 'musicsong_about_title_partial' ) ) :
    // about title
    function musicsong_about_title_partial() {
        $options = musicsong_get_theme_options();
        return esc_html( $options['about_title'] );
    }
endif;

if ( ! function_exists( 'musicsong_about_btn_title_partial' ) ) :
    // about btn title
    function musicsong_about_btn_title_partial() {
        $options = musicsong_get_theme_options();
        return esc_html( $options['about_btn_title'] );
    }
endif;

if ( ! function_exists( 'musicsong_latest_release_title_partial' ) ) :
    // latest_release title
    function musicsong_latest_release_title_partial() {
        $options = musicsong_get_theme_options();
        return esc_html( $options['latest_release_title'] );
    }
endif;

if ( ! function_exists( 'musicsong_cta_btn_title_partial' ) ) :
    // cta btn title
    function musicsong_cta_btn_title_partial() {
        $options = musicsong_get_theme_options();
        return esc_html( $options['cta_btn_title'] );
    }
endif;

if ( ! function_exists( 'musicsong_testimonial_title_partial' ) ) :
    // testimonial title
    function musicsong_testimonial_title_partial() {
        $options = musicsong_get_theme_options();
        return esc_html( $options['testimonial_title'] );
    }
endif;

if ( ! function_exists( 'musicsong_blog_title_partial' ) ) :
    // blog title
    function musicsong_blog_title_partial() {
        $options = musicsong_get_theme_options();
        return esc_html( $options['blog_title'] );
    }
endif;
