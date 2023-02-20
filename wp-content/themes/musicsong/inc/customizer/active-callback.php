<?php
/**
 * Customizer active callbacks
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

if ( ! function_exists( 'musicsong_is_loader_enable' ) ) :
	/**
	 * Check if loader is enabled.
	 *
	 * @since Musicsong 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function musicsong_is_loader_enable( $control ) {
		return $control->manager->get_setting( 'musicsong_theme_options[loader_enable]' )->value();
	}
endif;

if ( ! function_exists( 'musicsong_is_breadcrumb_enable' ) ) :
	/**
	 * Check if breadcrumb is enabled.
	 *
	 * @since Musicsong 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function musicsong_is_breadcrumb_enable( $control ) {
		return $control->manager->get_setting( 'musicsong_theme_options[breadcrumb_enable]' )->value();
	}
endif;

if ( ! function_exists( 'musicsong_is_pagination_enable' ) ) :
	/**
	 * Check if pagination is enabled.
	 *
	 * @since Musicsong 1.0.0
	 * @param WP_Customize_Control $control WP_Customize_Control instance.
	 * @return bool Whether the control is active to the current preview.
	 */
	function musicsong_is_pagination_enable( $control ) {
		return $control->manager->get_setting( 'musicsong_theme_options[pagination_enable]' )->value();
	}
endif;

/**
 * Front Page Active Callbacks
 */

/**
 * Check if slider section is enabled.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_slider_section_enable( $control ) {
	return ( $control->manager->get_setting( 'musicsong_theme_options[slider_section_enable]' )->value() );
}

/**
 * Check if about section is enabled.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_about_section_enable( $control ) {
	return ( $control->manager->get_setting( 'musicsong_theme_options[about_section_enable]' )->value() );
}

/**
 * Check if service section is enabled.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_service_section_enable( $control ) {
	return ( $control->manager->get_setting( 'musicsong_theme_options[service_section_enable]' )->value() );
}

/**
 * Check if latest release section is enabled.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_latest_release_section_enable( $control ) {
	return ( $control->manager->get_setting( 'musicsong_theme_options[latest_release_section_enable]' )->value() );
}

/**
 * Check if cta section is enabled.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_cta_section_enable( $control ) {
	return ( $control->manager->get_setting( 'musicsong_theme_options[cta_section_enable]' )->value() );
}

/**
 * Check if testimonial section is enabled.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_testimonial_section_enable( $control ) {
	return ( $control->manager->get_setting( 'musicsong_theme_options[testimonial_section_enable]' )->value() );
}

/**
 * Check if blog section is enabled.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_blog_section_enable( $control ) {
	return ( $control->manager->get_setting( 'musicsong_theme_options[blog_section_enable]' )->value() );
}

/**
 * Check if blog section content type is category.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_blog_section_content_category_enable( $control ) {
	$content_type = $control->manager->get_setting( 'musicsong_theme_options[blog_content_type]' )->value();
	return musicsong_is_blog_section_enable( $control ) && ( 'category' == $content_type );
}

/**
 * Check if blog section content type is recent.
 *
 * @since Musicsong 1.0.0
 * @param WP_Customize_Control $control WP_Customize_Control instance.
 * @return bool Whether the control is active to the current preview.
 */
function musicsong_is_blog_section_content_recent_enable( $control ) {
	$content_type = $control->manager->get_setting( 'musicsong_theme_options[blog_content_type]' )->value();
	return musicsong_is_blog_section_enable( $control ) && ( 'recent' == $content_type );
}
