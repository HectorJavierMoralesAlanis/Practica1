<?php
/**
 * Layout options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add sidebar section
$wp_customize->add_section( 'musicsong_layout', array(
	'title'               => esc_html__('Layout','musicsong'),
	'description'         => esc_html__( 'Layout section options.', 'musicsong' ),
	'panel'               => 'musicsong_theme_options_panel',
) );

// Site layout setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[site_layout]', array(
	'sanitize_callback'   => 'musicsong_sanitize_select',
	'default'             => $options['site_layout'],
) );

$wp_customize->add_control(  new Musicsong_Custom_Radio_Image_Control ( $wp_customize, 'musicsong_theme_options[site_layout]', array(
	'label'               => esc_html__( 'Site Layout', 'musicsong' ),
	'section'             => 'musicsong_layout',
	'choices'			  => musicsong_site_layout(),
) ) );

// Sidebar position setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[sidebar_position]', array(
	'sanitize_callback'   => 'musicsong_sanitize_select',
	'default'             => $options['sidebar_position'],
) );

$wp_customize->add_control(  new Musicsong_Custom_Radio_Image_Control ( $wp_customize, 'musicsong_theme_options[sidebar_position]', array(
	'label'               => esc_html__( 'Global Sidebar Position', 'musicsong' ),
	'section'             => 'musicsong_layout',
	'choices'			  => musicsong_global_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[post_sidebar_position]', array(
	'sanitize_callback'   => 'musicsong_sanitize_select',
	'default'             => $options['post_sidebar_position'],
) );

$wp_customize->add_control(  new Musicsong_Custom_Radio_Image_Control ( $wp_customize, 'musicsong_theme_options[post_sidebar_position]', array(
	'label'               => esc_html__( 'Posts Sidebar Position', 'musicsong' ),
	'section'             => 'musicsong_layout',
	'choices'			  => musicsong_sidebar_position(),
) ) );

// Post sidebar position setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[page_sidebar_position]', array(
	'sanitize_callback'   => 'musicsong_sanitize_select',
	'default'             => $options['page_sidebar_position'],
) );

$wp_customize->add_control( new Musicsong_Custom_Radio_Image_Control( $wp_customize, 'musicsong_theme_options[page_sidebar_position]', array(
	'label'               => esc_html__( 'Pages Sidebar Position', 'musicsong' ),
	'section'             => 'musicsong_layout',
	'choices'			  => musicsong_sidebar_position(),
) ) );