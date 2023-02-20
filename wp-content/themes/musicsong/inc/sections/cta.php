<?php
/**
 * Call to action section
 *
 * This is the template for the content of cta section
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */
if ( ! function_exists( 'musicsong_add_cta_section' ) ) :
    /**
    * Add cta section
    *
    *@since Musicsong 1.0.0
    */
    function musicsong_add_cta_section() {
    	$options = musicsong_get_theme_options();
        // Check if cta is enabled on frontpage
        $cta_enable = apply_filters( 'musicsong_section_status', true, 'cta_section_enable' );

        if ( true !== $cta_enable ) {
            return false;
        }
        // Get cta section details
        $section_details = array();
        $section_details = apply_filters( 'musicsong_filter_cta_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render cta section now.
        musicsong_render_cta_section( $section_details );
    }
endif;

if ( ! function_exists( 'musicsong_get_cta_section_details' ) ) :
    /**
    * cta section details.
    *
    * @since Musicsong 1.0.0
    * @param array $input cta section details.
    */
    function musicsong_get_cta_section_details( $input ) {
        $options = musicsong_get_theme_options();
        
        $content = array();
        $page_id = ! empty( $options['cta_content_page'] ) ? $options['cta_content_page'] : '';
        $args = array(
            'post_type'         => 'page',
            'page_id'           => $page_id,
            'posts_per_page'    => 1,
            );                    

        // Run The Loop.
        $query = new WP_Query( $args );
        if ( $query->have_posts() ) : 
            while ( $query->have_posts() ) : $query->the_post();
                $page_post['title']     = get_the_title();
                $page_post['url']       = get_the_permalink();
                $page_post['excerpt']   = musicsong_trim_content( 25 );
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'full' ) : get_template_directory_uri() . '/assets/uploads/call-to-action.jpg';

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
// cta section content details.
add_filter( 'musicsong_filter_cta_section_details', 'musicsong_get_cta_section_details' );


if ( ! function_exists( 'musicsong_render_cta_section' ) ) :
  /**
   * Start cta section
   *
   * @return string cta content
   * @since Musicsong 1.0.0
   *
   */
   function musicsong_render_cta_section( $content_details = array() ) {
        $options = musicsong_get_theme_options();
        $readmore = ! empty( $options['cta_btn_title'] ) ? $options['cta_btn_title'] : esc_html__( 'Read More', 'musicsong' );

        if ( empty( $content_details ) ) {
            return;
        } 

        foreach ( $content_details as $content ) : ?>

            <div id="call-to-action" class="relative page-section" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                <div class="overlay"></div>
                <div class="wrapper">
                    <?php if ( ! empty( $content['title'] ) ) : ?>
                        <div class="section-header">
                            <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                        </div><!-- .section-header -->
                    <?php endif;

                    if ( ! empty( $content['excerpt'] ) ) : ?>
                        <div class="section-content">
                            <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                        </div><!-- .entry-content -->
                    <?php endif;

                    if ( ! empty( $content['url'] ) ) : ?>
                        <div class="read-more">
                            <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn">   <?php echo esc_html( $readmore ); ?>
                            </a>
                        </div><!-- .read-more -->
                    <?php endif; ?>
                </div><!-- .wrapper -->
            </div><!-- #call-to-action -->

        <?php endforeach; 
    }
endif;
