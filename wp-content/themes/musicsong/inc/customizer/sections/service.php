<?php
/**
 * Service Section options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add Service section
$wp_customize->add_section( 'musicsong_service_section', array(
	'title'             => esc_html__( 'Services','musicsong' ),
	'description'       => esc_html__( 'Services Section options.', 'musicsong' ),
	'panel'             => 'musicsong_front_page_panel',
) );

// Service content enable control and setting
$wp_customize->add_setting( 'musicsong_theme_options[service_section_enable]', array(
	'default'			=> 	$options['service_section_enable'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[service_section_enable]', array(
	'label'             => esc_html__( 'Service Section Enable', 'musicsong' ),
	'section'           => 'musicsong_service_section',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

for ( $i = 1; $i <= 3; $i++ ) :

	// service note control and setting
	$wp_customize->add_setting( 'musicsong_theme_options[service_content_icon_' . $i . ']', array(
		'sanitize_callback' => 'sanitize_text_field',
	) );

	$wp_customize->add_control( new Musicsong_Icon_Picker( $wp_customize, 'musicsong_theme_options[service_content_icon_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Icon %d', 'musicsong' ), $i ),
		'section'           => 'musicsong_service_section',
		'active_callback'	=> 'musicsong_is_service_section_enable',
	) ) );

	// service pages drop down chooser control and setting
	$wp_customize->add_setting( 'musicsong_theme_options[service_content_page_' . $i . ']', array(
		'sanitize_callback' => 'musicsong_sanitize_page',
	) );

	$wp_customize->add_control( new Musicsong_Dropdown_Chooser( $wp_customize, 'musicsong_theme_options[service_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'musicsong' ), $i ),
		'section'           => 'musicsong_service_section',
		'choices'			=> musicsong_page_choices(),
		'active_callback'	=> 'musicsong_is_service_section_enable',
	) ) );

endfor;
