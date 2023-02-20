<?php
	/**
	 * The header for our theme.
	 *
	 * This is the template that displays all of the <head> section and everything up until <div id="content">
	 *
	 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
	 *
	 * @package Theme Palace
	 * @subpackage Musicsong
	 * @since Musicsong 1.0.0
	 */

	/**
	 * musicsong_doctype hook
	 *
	 * @hooked musicsong_doctype -  10
	 *
	 */
	do_action( 'musicsong_doctype' );

?>
<head>
<?php
	/**
	 * musicsong_before_wp_head hook
	 *
	 * @hooked musicsong_head -  10
	 *
	 */
	do_action( 'musicsong_before_wp_head' );

	wp_head(); 
?>
</head>

<body <?php body_class(); ?>>
<?php do_action( 'wp_body_open' ); ?>

<?php
	/**
	 * musicsong_page_start_action hook
	 *
	 * @hooked musicsong_page_start -  10
	 *
	 */
	do_action( 'musicsong_page_start_action' ); 

	/**
	 * musicsong_header_action hook
	 *
	 * @hooked musicsong_header_start -  10
	 * @hooked musicsong_site_branding -  20
	 * @hooked musicsong_site_navigation -  30
	 * @hooked musicsong_header_end -  50
	 *
	 */
	do_action( 'musicsong_header_action' );

	/**
	 * musicsong_content_start_action hook
	 *
	 * @hooked musicsong_content_start -  10
	 *
	 */
	do_action( 'musicsong_content_start_action' );

	/**
	 * musicsong_header_image_action hook
	 *
	 * @hooked musicsong_header_image -  10
	 *
	 */
	do_action( 'musicsong_header_image_action' );

    if ( musicsong_is_frontpage() ) {

    	$sections = musicsong_sortable_sections();
    	$i = 1;
		foreach ( $sections as $section => $value ) {
			add_action( 'musicsong_primary_content', 'musicsong_add_'. $section .'_section', $i . 0 );
			$i++;
		}
		do_action( 'musicsong_primary_content' );
	}