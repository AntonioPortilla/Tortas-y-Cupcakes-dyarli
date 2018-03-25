<?php
/**
 * The template for displaying home page.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package Shudh
 */

get_header();
?>
<div class="container homee2">
     <div class="page_content">
     <h2 class="tortasycupcakes">
         <span>Tortas y <strong>Cupcakes</strong></span>
     </h2>
        <!--<section class="site-main">
        	 <div class="blog-post">
					<?php
                    /*if ( have_posts() ) :
                        // Start the Loop.
                        while ( have_posts() ) : the_post();

                            get_template_part( 'content', get_post_format() );

                        endwhile;
                        // Previous/next post navigation.
                        the_posts_pagination( array(
								'mid_size' => 2,
								'prev_text' => __( 'Back', 'shudh' ),
								'next_text' => __( 'Next', 'shudh' ),
								'screen_reader_text' => __( 'Posts navigation', 'shudh' )
					) );

                    else :
                        // If no content, include the "No posts found" template.
                         get_template_part( 'no-results', 'index' );

                    endif;*/
                    ?>

                    </div>
             </section>-->

        <?php //get_sidebar();?>
        <?php 
            if ( function_exists( 'envira_gallery' ) ) { envira_gallery( 'galeria-home', 'slug' ); }
        ?>
        <div class="reserva">
            <a href="<?php echo home_url() ?>/contactar/">¡Reserva tu pedido Aquí!</a>
        </div>
        <div class="clear"></div>
    </div><!-- site-aligner -->
</div>
</div>
</section>

<?php get_footer(); ?>