<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'musicsong_single_post_section', array(
	'title'             => esc_html__( 'Single Post','musicsong' ),
	'description'       => esc_html__( 'Options to change the single posts globally.', 'musicsong' ),
	'panel'             => 'musicsong_theme_options_panel',
) );

// Archive date meta setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[single_post_hide_date]', array(
	'default'           => $options['single_post_hide_date'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[single_post_hide_date]', array(
	'label'             => esc_html__( 'Hide Date', 'musicsong' ),
	'section'           => 'musicsong_single_post_section',
	'on_off_label' 		=> musicsong_hide_options(),
) ) );

// Archive author meta setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[single_post_hide_author]', array(
	'default'           => $options['single_post_hide_author'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[single_post_hide_author]', array(
	'label'             => esc_html__( 'Hide Author', 'musicsong' ),
	'section'           => 'musicsong_single_post_section',
	'on_off_label' 		=> musicsong_hide_options(),
) ) );

// Archive author category setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[single_post_hide_category]', array(
	'default'           => $options['single_post_hide_category'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[single_post_hide_category]', array(
	'label'             => esc_html__( 'Hide Category', 'musicsong' ),
	'section'           => 'musicsong_single_post_section',
	'on_off_label' 		=> musicsong_hide_options(),
) ) );

// Archive tag category setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[single_post_hide_tags]', array(
	'default'           => $options['single_post_hide_tags'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[single_post_hide_tags]', array(
	'label'             => esc_html__( 'Hide Tag', 'musicsong' ),
	'section'           => 'musicsong_single_post_section',
	'on_off_label' 		=> musicsong_hide_options(),
) ) );
