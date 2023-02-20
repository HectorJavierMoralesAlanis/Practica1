<?php
/**
 * Call to Action Section options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add Call to Action section
$wp_customize->add_section( 'musicsong_cta_section', array(
	'title'             => esc_html__( 'Call to Action','musicsong' ),
	'description'       => esc_html__( 'Call to Action Section options.', 'musicsong' ),
	'panel'             => 'musicsong_front_page_panel',
) );

// Call to Action content enable control and setting
$wp_customize->add_setting( 'musicsong_theme_options[cta_section_enable]', array(
	'default'			=> 	$options['cta_section_enable'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[cta_section_enable]', array(
	'label'             => esc_html__( 'Call to Action Section Enable', 'musicsong' ),
	'section'           => 'musicsong_cta_section',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

// cta pages drop down chooser control and setting
$wp_customize->add_setting( 'musicsong_theme_options[cta_content_page]', array(
	'sanitize_callback' => 'musicsong_sanitize_page',
) );

$wp_customize->add_control( new Musicsong_Dropdown_Chooser( $wp_customize, 'musicsong_theme_options[cta_content_page]', array(
	'label'             => esc_html__( 'Select Page', 'musicsong' ),
	'section'           => 'musicsong_cta_section',
	'choices'			=> musicsong_page_choices(),
	'active_callback'	=> 'musicsong_is_cta_section_enable',
) ) );

// cta btn title setting and control
$wp_customize->add_setting( 'musicsong_theme_options[cta_btn_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'musicsong_theme_options[cta_btn_title]', array(
	'label'           	=> esc_html__( 'Button Label', 'musicsong' ),
	'section'        	=> 'musicsong_cta_section',
	'active_callback' 	=> 'musicsong_is_cta_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'musicsong_theme_options[cta_btn_title]', array(
		'selector'            => '#call-to-action .read-more a',
		'settings'            => 'musicsong_theme_options[cta_btn_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'musicsong_cta_btn_title_partial',
    ) );
}
