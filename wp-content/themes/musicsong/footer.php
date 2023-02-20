<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */

/**
 * musicsong_content_end_action hook
 *
 * @hooked musicsong_content_end -  10
 *
 */
do_action( 'musicsong_content_end_action' );

/**
 * musicsong_content_end_action hook
 *
 * @hooked musicsong_footer_start -  10
 * @hooked Musicsong_Footer_Widgets->add_footer_widgets -  20
 * @hooked musicsong_footer_site_info -  40
 * @hooked musicsong_footer_end -  100
 *
 */
do_action( 'musicsong_footer' );

/**
 * musicsong_page_end_action hook
 *
 * @hooked musicsong_page_end -  10
 *
 */
do_action( 'musicsong_page_end_action' ); 

?>

<?php wp_footer(); ?>

</body>
</html>
