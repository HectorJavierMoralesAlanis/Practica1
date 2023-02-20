<?php
/**
 * About Section options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add About section
$wp_customize->add_section( 'musicsong_about_section', array(
	'title'             => esc_html__( 'About Us','musicsong' ),
	'description'       => esc_html__( 'About Section options.', 'musicsong' ),
	'panel'             => 'musicsong_front_page_panel',
) );

// About content enable control and setting
$wp_customize->add_setting( 'musicsong_theme_options[about_section_enable]', array(
	'default'			=> 	$options['about_section_enable'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[about_section_enable]', array(
	'label'             => esc_html__( 'About Section Enable', 'musicsong' ),
	'section'           => 'musicsong_about_section',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

// about pages drop down chooser control and setting
$wp_customize->add_setting( 'musicsong_theme_options[about_content_page]', array(
	'sanitize_callback' => 'musicsong_sanitize_page',
) );

$wp_customize->add_control( new Musicsong_Dropdown_Chooser( $wp_customize, 'musicsong_theme_options[about_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'musicsong' ),
	'section'           => 'musicsong_about_section',
	'choices'			=> musicsong_page_choices(),
	'active_callback'	=> 'musicsong_is_about_section_enable',
) ) );

// about btn title setting and control
$wp_customize->add_setting( 'musicsong_theme_options[about_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'musicsong_theme_options[about_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'musicsong' ),
	'section'        	=> 'musicsong_about_section',
	'active_callback' 	=> 'musicsong_is_about_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'musicsong_theme_options[about_btn_title]', array(
		'selector'            => '#popular-artists .read-more a',
		'settings'            => 'musicsong_theme_options[about_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'musicsong_about_btn_title_partial',
    ) );
}

// playlist posts drop down chooser control and setting
$wp_customize->add_setting( 'musicsong_theme_options[about_playlist]', array(
	'sanitize_callback' => 'musicsong_sanitize_array_int',
) );

$wp_customize->add_control( new Musicsong_Multiple_Dropdown_Chooser( $wp_customize, 'musicsong_theme_options[about_playlist]', array(
	'label'             => esc_html__( 'Select Multiple Audios', 'musicsong' ),
	'section'           => 'musicsong_about_section',
	'choices'			=> musicsong_audio_choices(),
	'active_callback'	=> 'musicsong_is_about_section_enable',
) ) );
