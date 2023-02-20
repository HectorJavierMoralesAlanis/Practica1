<?php
/**
 * Latest Release Section options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add Latest Release section
$wp_customize->add_section( 'musicsong_latest_release_section', array(
	'title'             => esc_html__( 'Latest Release','musicsong' ),
	'description'       => esc_html__( 'Latest Release Section options.', 'musicsong' ),
	'panel'             => 'musicsong_front_page_panel',
) );

// Latest Release content enable control and setting
$wp_customize->add_setting( 'musicsong_theme_options[latest_release_section_enable]', array(
	'default'			=> 	$options['latest_release_section_enable'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[latest_release_section_enable]', array(
	'label'             => esc_html__( 'Latest Release Section Enable', 'musicsong' ),
	'section'           => 'musicsong_latest_release_section',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

// latest_release title setting and control
$wp_customize->add_setting( 'musicsong_theme_options[latest_release_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['latest_release_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'musicsong_theme_options[latest_release_title]', array(
	'label'           	=> esc_html__( 'Title', 'musicsong' ),
	'section'        	=> 'musicsong_latest_release_section',
	'active_callback' 	=> 'musicsong_is_latest_release_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'musicsong_theme_options[latest_release_title]', array(
		'selector'            => '#latest-albums .section-header h2.section-title',
		'settings'            => 'musicsong_theme_options[latest_release_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'musicsong_latest_release_title_partial',
    ) );
}

// Add dropdown category setting and control.
$wp_customize->add_setting(  'musicsong_theme_options[latest_release_content_category]', array(
	'sanitize_callback' => 'musicsong_sanitize_single_category',
) ) ;

$wp_customize->add_control( new Musicsong_Dropdown_Taxonomies_Control( $wp_customize,'musicsong_theme_options[latest_release_content_category]', array(
	'label'             => esc_html__( 'Select Category', 'musicsong' ),
	'description'      	=> esc_html__( 'Note: Latest three posts will be shown from selected category', 'musicsong' ),
	'section'           => 'musicsong_latest_release_section',
	'type'              => 'dropdown-taxonomies',
	'active_callback'	=> 'musicsong_is_latest_release_section_enable'
) ) );
