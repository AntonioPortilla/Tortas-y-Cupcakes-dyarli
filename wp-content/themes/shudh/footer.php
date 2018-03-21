<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Shudh
 */
?>
<div id="footer-wrapper">
        <!--<div class="footer">
    	<div class="container">
             <div class="cols-4 widget-column-1">
               <?php /*if ( '' !== get_theme_mod( 'menu_title' ) ){  ?>
               <h5><?php echo esc_html(get_theme_mod('menu_title',__('Main Menu','shudh'))); ?></h5>
               <?php } ?>
                <div class="menu">
                  <?php wp_nav_menu(array('theme_location' => 'footer')); ?>
                </div>
       		 </div>


             <div class="cols-4 widget-column-2">

                <?php if ( '' !== get_theme_mod( 'latest_title' ) ){  ?>
                <h5><?php echo esc_html(get_theme_mod('latest_title',__('Latest News','shudh'))); ?></h5>
                <?php } ?>
                 <?php $args = array( 'posts_per_page' => 2, 'post__not_in' => get_option('sticky_posts'), 'orderby' => 'date', 'order' => 'desc' );
                    query_posts( $args ); ?>
                  <?php while ( have_posts() ) :  the_post(); ?>
                  	<div class="recent-post">

                    <a href="<?php the_permalink(); ?>">
                    <?php if ( has_post_thumbnail() ) { $src = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'thumbnail' );   $thumbnailSrc = $src[0]; ?>
                        <img src="<?php echo $thumbnailSrc; ?>" alt="" ><?php }
                    else { ?>
                        <img src="<?php echo esc_url( get_template_directory_uri()); ?>/images/img_404.png"  />
                    <?php } ?></a>
					 <p><?php echo shudh_content(8); ?></p>
                    <a href="<?php the_permalink(); ?>"><?php _e('Read more..','shudh'); ?></a>

                    </div>
                    <?php endwhile; ?>
                    <?php wp_reset_query(); ?>

              </div>

               <?php if( ! dynamic_sidebar( 'footer-3-column' ) ): ?>
               <div class="cols-4 widget-column-3">
                <?php if ( '' !== get_theme_mod( 'about_title' ) ){  ?>
                   <h5><?php echo esc_html(get_theme_mod('about_title',__('About Us','shudh'))); ?></h5>
                   <?php } ?>
                   <?php if ( '' !== get_theme_mod( 'about_description' ) ){  ?>
				<p><?php echo wp_kses_post(get_theme_mod('about_description',__('Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis aliquet sed urna.','shudh'))); ?></p>
                <?php } ?>

                </div>
                 <?php endif; // end sidebar widget area ?>

                <div class="cols-4 widget-column-4">
                    <?php if ( '' !== get_theme_mod( 'contact_title' ) ){  ?>
                  	 <h5><?php echo esc_html(get_theme_mod('contact_title',__('Contact Info','shudh'))); ?></h5>
                  <?php } ?>
                   <?php if ( '' !== get_theme_mod( 'contact_add' ) ){ ?>
                   <p><?php echo esc_attr_e( get_theme_mod( 'contact_add', __('591 Christie Way Passaic Street, North Carolina, America ( USA )','shudh'))); ?></p>
                   <?php } ?>
               <div class="phone-no">
               <?php if ( '' !== get_theme_mod( 'contact_no' ) ){  ?>
             		  <span><?php _e('Phone:', 'shudh');?></span> <?php echo wp_kses_post(get_theme_mod('contact_no',__('+62 500 800 122','shudh'))); ?> <br  />
               <?php } ?>

               <?php if ( '' !== get_theme_mod( 'fax_no' ) ){  ?>
             		  <span><?php _e('Fax:', 'shudh');?></span> <?php echo wp_kses_post(get_theme_mod('fax_no',__('+62 500 800 123','shudh'))); ?> <br  />
               <?php } ?>

             <?php if ( '' !== get_theme_mod( 'contact_mail' ) ){  ?>
          		 <span><?php _e('Email:', 'shudh');?></span> <a href="mailto:<?php echo esc_attr(get_theme_mod('contact_mail','contact@company.com')); ?>"><?php echo esc_attr(get_theme_mod('contact_mail','contact@company.com')); ?></a><br  />
            <?php } ?>

            <?php if ( '' !== get_theme_mod( 'website_link' ) ){  ?>
          		 <span><?php _e('Website:', 'shudh');?></span> <a href="<?php echo esc_attr(get_theme_mod('website_link','www.yourdomain.com')); ?>"><?php echo esc_attr(get_theme_mod('website_link','www.yourdomain.com')); ?></a>
            <?php } */?>



           </div>

                </div>
            <div class="clear"></div>
        </div>
        </div>-->
        <div class="copyright-wrapper">
        	<div class="container">
              	 <div class="social-icons">
					         <?php if ( get_theme_mod('fb_link') !== "") { ?>
                    <a title="facebook" class="fb" target="_blank" href="<?php echo esc_url(get_theme_mod('fb_link','#facebook')); ?>"></a>
                    <?php } ?>

                    <?php if ( get_theme_mod('twitt_link') !== "") { ?>
                    <a title="twitter" class="tw" target="_blank" href="<?php echo esc_url(get_theme_mod('twitt_link','#twitter')); ?>"></a>
                    <?php } ?>

                    <?php if ( get_theme_mod('gplus_link') !== "") { ?>
                    <a title="google-plus" class="gp" target="_blank" href="<?php echo esc_url(get_theme_mod('gplus_link','#gplus')); ?>"></a>
                    <?php } ?>

                    <?php if ( get_theme_mod('linked_link') !== "") { ?>
                    <a title="linkedin" class="in" target="_blank" href="<?php echo esc_url(get_theme_mod('linked_link','#linkedin')); ?>"></a>
                    <?php } ?>
                 </div>


                <div class="copyright-txt"><?php esc_attr_e('Copyright &copy; 2016','shudh');?> <?php bloginfo('name'); ?>. <?php esc_attr_e('All Rights Reserved', 'shudh');?></div>
                <div class="design-by">Design by <a rel="nofollow" target="_blank" href="http://www.intuyes.com/">Intuyes</a></div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
<?php wp_footer(); ?>

</body>
</html>