<?php
/**
 * Service section
 *
 * This is the template for the content of service section
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */
if ( ! function_exists( 'musicsong_add_service_section' ) ) :
    /**
    * Add service section
    *
    *@since Musicsong 1.0.0
    */
    function musicsong_add_service_section() {
    	$options = musicsong_get_theme_options();
        // Check if service is enabled on frontpage
        $service_enable = apply_filters( 'musicsong_section_status', true, 'service_section_enable' );

        if ( true !== $service_enable ) {
            return false;
        }
        // Get service section details
        $section_details = array();
        $section_details = apply_filters( 'musicsong_filter_service_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render service section now.
        musicsong_render_service_section( $section_details );
    }
endif;

if ( ! function_exists( 'musicsong_get_service_section_details' ) ) :
    /**
    * service section details.
    *
    * @since Musicsong 1.0.0
    * @param array $input service section details.
    */
    function musicsong_get_service_section_details( $input ) {
        $options = musicsong_get_theme_options();

        $content = array();
        $page_ids = array();

        for ( $i = 1; $i <= 3; $i++ ) {
            if ( ! empty( $options['service_content_page_' . $i] ) )
                $page_ids[] = $options['service_content_page_' . $i];
        }
        
        $args = array(
            'post_type'         => 'page',
            'post__in'          => ( array ) $page_ids,
            'posts_per_page'    => 3,
            'orderby'           => 'post__in',
            );                    
            // Run The Loop.
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) : 
                while ( $query->have_posts() ) : $query->the_post();
                    $page_post['title']     = get_the_title();
                    $page_post['url']       = get_the_permalink();
                    $page_post['excerpt']   = musicsong_trim_content( 15 );

                    // Push to the main array.
                    array_push( $content, $page_post );
                endwhile;
            endif;
            wp_reset_postdata();

            
        if ( ! empty( $content ) ) {
            $input = $content;
        }
        return $input;
    }
endif;
// service section content details.
add_filter( 'musicsong_filter_service_section_details', 'musicsong_get_service_section_details' );


if ( ! function_exists( 'musicsong_render_service_section' ) ) :
  /**
   * Start service section
   *
   * @return string service content
   * @since Musicsong 1.0.0
   *
   */
   function musicsong_render_service_section( $content_details = array() ) {
        $options = musicsong_get_theme_options();
        $i = 1;        

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="featured-services" class="relative page-section">
            <div class="wrapper">
                <!-- supports col-1, col-2 and col-3 -->
                <div class="section-content clear col-3">
                    <div class="featured-services-wrapper">
                        <?php foreach ( $content_details as $content ) : ?>
                            <article>
                                <div class="icon">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>">
                                        <i class="fa <?php echo ! empty( $options['service_content_icon_' . $i] ) ? esc_attr( $options['service_content_icon_' . $i] ) : 'fa-cogs'; ?>"></i>
                                    </a>
                                </div><!-- .icon-container -->

                                <header class="entry-header">
                                    <h2 class="entry-title"><a href="<?php echo esc_url( $content['url'] ); ?>"><?php echo esc_html( $content['title'] ); ?></a></h2>
                                </header>

                                <div class="entry-content">
                                    <p><?php echo esc_html( $content['excerpt'] ); ?></p>
                                </div>
                            </article>
                        <?php $i++; endforeach; ?>
                    </div><!-- .featured-services-wrapper -->
                </div><!-- .section-content -->
            </div><!-- .wrapper -->
        </div><!-- #featured-services -->
        
    <?php }
endif;
