<?php
/**
 * About section
 *
 * This is the template for the content of about section
 *
 * @package Theme Palace
 * @subpackage Musicsong
 * @since Musicsong 1.0.0
 */
if ( ! function_exists( 'musicsong_add_about_section' ) ) :
    /**
    * Add about section
    *
    *@since Musicsong 1.0.0
    */
    function musicsong_add_about_section() {
    	$options = musicsong_get_theme_options();
        // Check if about is enabled on frontpage
        $about_enable = apply_filters( 'musicsong_section_status', true, 'about_section_enable' );

        if ( true !== $about_enable ) {
            return false;
        }
        // Get about section details
        $section_details = array();
        $section_details = apply_filters( 'musicsong_filter_about_section_details', $section_details );

        if ( empty( $section_details ) ) {
            return;
        }

        // Render about section now.
        musicsong_render_about_section( $section_details );
    }
endif;

if ( ! function_exists( 'musicsong_get_about_section_details' ) ) :
    /**
    * about section details.
    *
    * @since Musicsong 1.0.0
    * @param array $input about section details.
    */
    function musicsong_get_about_section_details( $input ) {
        $options = musicsong_get_theme_options();

        $content = array();
        $page_id = ! empty( $options['about_content_page'] ) ? $options['about_content_page'] : '';
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
                $page_post['image']  	= has_post_thumbnail() ? get_the_post_thumbnail_url( get_the_id(), 'post-thumbnail' ) : '';

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
// about section content details.
add_filter( 'musicsong_filter_about_section_details', 'musicsong_get_about_section_details' );


if ( ! function_exists( 'musicsong_render_about_section' ) ) :
  /**
   * Start about section
   *
   * @return string about content
   * @since Musicsong 1.0.0
   *
   */
   function musicsong_render_about_section( $content_details = array() ) {
        $options = musicsong_get_theme_options();
        $readmore = ! empty( $options['about_btn_title'] ) ? $options['about_btn_title'] : esc_html__( 'Read More', 'musicsong' );
        $playlist = ! empty( $options['about_playlist'] ) ? $options['about_playlist'] : array();

        if ( empty( $content_details ) ) {
            return;
        } ?>

        <div id="popular-artists" class="relative page-section">
            <div class="wrapper">
                <div class="clear col-2">
                    <?php foreach ( $content_details as $content ) : ?>
                        <article class="<?php echo ! empty( $content['image'] ) ? 'has' : 'no'; ?>-post-thumbnail">
                            <?php if ( ! empty( $content['image'] ) ) : ?>
                                <div class="featured-image" style="background-image: url('<?php echo esc_url( $content['image'] ); ?>');">
                                    <a href="<?php echo esc_url( $content['url'] ); ?>" class="post-thumbnail-link"></a>
                                </div><!-- .featured-image -->
                            <?php endif; ?>

                            <div class="entry-container">
                                <?php if ( ! empty( $content['title'] ) ) : ?>
                                    <div class="section-header">
                                        <h2 class="section-title"><?php echo esc_html( $content['title'] ); ?></h2>
                                    </div><!-- .section-header -->
                                <?php endif; 

                                if ( ! empty( $content['excerpt'] ) ) : ?>
                                    <div class="entry-content">
                                        <p><?php echo wp_kses_post( $content['excerpt'] ); ?></p>
                                    </div><!-- .entry-content -->
                                <?php endif;

                                if ( ! empty( $content['url'] ) ) : ?>
                                    <div class="read-more">
                                        <a href="<?php echo esc_url( $content['url'] ); ?>" class="btn btn-fill">   <?php echo esc_html( $readmore ); ?>
                                        </a>
                                    </div><!-- .read-more -->
                                <?php endif; ?>
                            </div><!-- .entry-container -->
                        </article>
                    <?php endforeach; 

                    if ( ! empty( $playlist ) ) :
                        $playlist = implode(',', $playlist); ?>

                        <div class="playlist">
                            <?php 
                                $playlist_shortcode = '[playlist type="audio" ids="' . $playlist . '" style="light"]';
                                echo do_shortcode( wp_kses_post( $playlist_shortcode ) );  
                            ?>
                        </div><!-- .playlist -->
                    <?php endif; ?>
                </div><!-- .section-content-wrapper -->
            </div><!-- .wrapper -->
        </div><!-- #popular-artists -->

    <?php }
endif;
