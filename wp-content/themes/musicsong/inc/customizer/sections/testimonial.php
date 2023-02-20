<?php
/**
 * Testimonial Section options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add Testimonial section
$wp_customize->add_section( 'musicsong_testimonial_section', array(
	'title'             => esc_html__( 'Testimonial','musicsong' ),
	'description'       => esc_html__( 'Testimonial Section options.', 'musicsong' ),
	'panel'             => 'musicsong_front_page_panel',
) );

// Testimonial content enable control and setting
$wp_customize->add_setting( 'musicsong_theme_options[testimonial_section_enable]', array(
	'default'			=> 	$options['testimonial_section_enable'],
	'sanitize_callback' => 'musicsong_sanitize_switch_control',
) );

$wp_customize->add_control( new Musicsong_Switch_Control( $wp_customize, 'musicsong_theme_options[testimonial_section_enable]', array(
	'label'             => esc_html__( 'Testimonial Section Enable', 'musicsong' ),
	'section'           => 'musicsong_testimonial_section',
	'on_off_label' 		=> musicsong_switch_options(),
) ) );

// testimonial title setting and control
$wp_customize->add_setting( 'musicsong_theme_options[testimonial_title]', array(
	'sanitize_callback' => 'sanitize_text_field',
	'default'			=> $options['testimonial_title'],
	'transport'			=> 'postMessage',
) );

$wp_customize->add_control( 'musicsong_theme_options[testimonial_title]', array(
	'label'           	=> esc_html__( 'Title', 'musicsong' ),
	'section'        	=> 'musicsong_testimonial_section',
	'active_callback' 	=> 'musicsong_is_testimonial_section_enable',
	'type'				=> 'text',
) );

// Abort if selective refresh is not available.
if ( isset( $wp_customize->selective_refresh ) ) {
    $wp_customize->selective_refresh->add_partial( 'musicsong_theme_options[testimonial_title]', array(
		'selector'            => '#client-testimonial .section-header h2.section-title',
		'settings'            => 'musicsong_theme_options[testimonial_title]',
		'container_inclusive' => false,
		'fallback_refresh'    => true,
		'render_callback'     => 'musicsong_testimonial_title_partial',
    ) );
}

for ( $i = 1; $i <= 3; $i++ ) :
	// testimonial pages drop down chooser control and setting
	$wp_customize->add_setting( 'musicsong_theme_options[testimonial_content_page_' . $i . ']', array(
		'sanitize_callback' => 'musicsong_sanitize_page',
	) );

	$wp_customize->add_control( new Musicsong_Dropdown_Chooser( $wp_customize, 'musicsong_theme_options[testimonial_content_page_' . $i . ']', array(
		'label'             => sprintf( esc_html__( 'Select Page %d', 'musicsong' ), $i ),
		'section'           => 'musicsong_testimonial_section',
		'choices'			=> musicsong_page_choices(),
		'active_callback'	=> 'musicsong_is_testimonial_section_enable',
	) ) );
endfor;

