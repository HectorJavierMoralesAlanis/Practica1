<?php
/**
 * pagination options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'musicsong_pagination', array(
	'title'               => esc_html__('Pagination','musicsong'),
	'description'         => esc_html__( 'Pagination section options.', 'musicsong' ),
	'panel'               => 'musicsong_theme_options_panel',
) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[pagination_enable]', array(
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
	'default'             => $options['pagination_enable'],
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[pagination_enable]', array(
	'label'               => esc_html__( 'Pagination Enable', 'musicsong' ),
	'section'             => 'musicsong_pagination',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

// Site layout setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[pagination_type]', array(
	'sanitize_callback'   => 'musicsong_sanitize_select',
	'default'             => $options['pagination_type'],
) );

$wp_customize->add_control( 'musicsong_theme_options[pagination_type]', array(
	'label'               => esc_html__( 'Pagination Type', 'musicsong' ),
	'section'             => 'musicsong_pagination',
	'type'                => 'select',
	'choices'			  => musicsong_pagination_options(),
	'active_callback'	  => 'musicsong_is_pagination_enable',
) );
