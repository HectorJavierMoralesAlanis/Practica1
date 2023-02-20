<?php
/**
  * Demo Import.
  *
  * This is the template that includes all the other files for core featured of Theme Palace
  *
  * @package Theme Palace
  * @subpackage musicsong
  * @since musicsong 1.0.0
*/


function musicsong_ctdi_plugin_page_setup( $default_settings ) {
    $default_settings['menu_title']  = esc_html__( 'Theme Palace Demo Import' , 'musicsong' );

    return $default_settings;
}
add_filter( 'cp-ctdi/plugin_page_setup', 'musicsong_ctdi_plugin_page_setup' );


function musicsong_ctdi_plugin_intro_text( $default_text ) {
    $default_text .= sprintf( '<p class="about-description">%1$s <a href="%2$s">%3$s</a></p>', esc_html__( 'Demo content files for musicsong Theme.', 'musicsong' ),
    esc_url( 'https://themepalace.com/instructions/themes/musicsong' ), esc_html__( 'Click here for Demo File download', 'musicsong' ) );
    return $default_text;
}
add_filter( 'cp-ctdi/plugin_intro_text', 'musicsong_ctdi_plugin_intro_text' );