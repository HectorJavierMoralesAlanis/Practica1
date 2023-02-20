<?php
/**
 * Slider Section options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add Slider section
$wp_customize->add_section( 'musicsong_slider_section', array(
	'title'             => esc_html__( 'Main Slider','musicsong' ),
	'description'       => esc_html__( 'Slider Section options.', 'musicsong' ),
	'panel'             => 'musicsong_front_page_panel',
) );

// Slider content enable control and setting
$wp_customize->add_setting( 'musicsong_theme_options[slider_section_enable]', array(
	'default'			=> 	$options['slider_section_enable'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[slider_section_enable]', array(
	'label'             => esc_html__( 'Slider Section Enable', 'musicsong' ),
	'section'           => 'musicsong_slider_section',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

for ( $i = 1; $i <= 5; $i++ ) :
	// slider pages drop down chooser control and setting
	$wp_customize->add_setting( 'musicsong_theme_options[slider_content_page_' . $i . ']', array(
		'sanitize_callback' => 'musicsong_sanitize_page',
	) );

	$wp_customize->add_control( new Musicsong_Dropdown_Chooser( $wp_customize, 'musicsong_theme_options[slider_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'musicsong' ), $i ),
		'section'           => 'musicsong_slider_section',
		'choices'			=> musicsong_page_choices(),
		'active_callback'	=> 'musicsong_is_slider_section_enable',
	) ) );

endfor;
