<?php
/**
 * Breadcrumb options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

$wp_customize->add_section( 'musicsong_breadcrumb', array(
	'title'             => esc_html__( 'Breadcrumb','musicsong' ),
	'description'       => esc_html__( 'Breadcrumb section options.', 'musicsong' ),
	'panel'             => 'musicsong_theme_options_panel',
) );

// Breadcrumb enable setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[breadcrumb_enable]', array(
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
	'default'          	=> $options['breadcrumb_enable'],
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[breadcrumb_enable]', array(
	'label'            	=> esc_html__( 'Enable Breadcrumb', 'musicsong' ),
	'section'          	=> 'musicsong_breadcrumb',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

// Breadcrumb separator setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[breadcrumb_separator]', array(
	'sanitize_callback'	=> 'sanitize_text_field',
	'default'          	=> $options['breadcrumb_separator'],
) );

$wp_customize->add_control( 'musicsong_theme_options[breadcrumb_separator]', array(
	'label'            	=> esc_html__( 'Separator', 'musicsong' ),
	'active_callback' 	=> 'musicsong_is_breadcrumb_enable',
	'section'          	=> 'musicsong_breadcrumb',
) );
