<?php
/**
 * Excerpt options
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

// Add excerpt section
$wp_customize->add_section( 'musicsong_excerpt_section', array(
	'title'             => esc_html__( 'Excerpt','musicsong' ),
	'description'       => esc_html__( 'Excerpt section options.', 'musicsong' ),
	'panel'             => 'musicsong_theme_options_panel',
) );


// long Excerpt length setting and control.
$wp_customize->add_setting( 'musicsong_theme_options[long_excerpt_length]', array(
	'sanitize_callback' => 'musicsong_sanitize_number_range',
	'validate_callback' => 'musicsong_validate_long_excerpt',
	'default'			=> $options['long_excerpt_length'],
) );

$wp_customize->add_control( 'musicsong_theme_options[long_excerpt_length]', array(
	'label'       		=> esc_html__( 'Blog Page Excerpt Length', 'musicsong' ),
	'description' 		=> esc_html__( 'Total words to be displayed in archive page/search page.', 'musicsong' ),
	'section'     		=> 'musicsong_excerpt_section',
	'type'        		=> 'number',
	'input_attrs' 		=> array(
		'style'       => 'width: 80px;',
		'max'         => 100,
		'min'         => 5,
	),
) );

