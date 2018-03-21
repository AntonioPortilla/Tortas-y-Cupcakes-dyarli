<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div class="container">
 *
 * @package Shudh
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
	<link rel="dns-prefetch" href="//fonts.gstatic.com"/>
	<link rel="dns-prefetch" href="//ajax.googleapis.com"/>
	<link rel="dns-prefetch" href="//fonts.googleapis.com"/>
	<link href="https://fonts.googleapis.com/css?family=Caveat:400,700" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
</head>
<body <?php body_class(); ?>>
  <div class="header">
        <div class="container">
			<div class="logo">
				<div class="logo-dyarli">
					<?php shudh_the_custom_logo(); ?>
					<a href="<?php echo esc_url( home_url('/') ); ?>"><h1><?php bloginfo('name'); ?></h1>
					<p><?php bloginfo('description'); ?></p></a>
				</div>
			</div>
			<div class="header_right">
				<div class="toggle">
					<a class="toggleMenu" href="#"><?php _e('Menu','shudh'); ?></a>
				</div><!-- toggle -->
				<div class="sitenav">
					<?php wp_nav_menu(array('theme_location' => 'primary')); ?>
				</div><!-- site-nav -->
				<div class="clear"></div>
			</div>
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
          <div class="clear"></div>
        </div><!-- container -->
  </div><!--.header -->

<?php if ( is_front_page() || is_home() ) { ?>
<?php if( get_theme_mod( 'hide_slides' ) == '') { ?>
<!-- Slider Section -->
<?php for($sld=7; $sld<10; $sld++) { ?>
	<?php if( get_theme_mod('page-setting'.$sld)) { ?>
     <?php $slidequery = new WP_query('page_id='.get_theme_mod('page-setting'.$sld,true)); ?>
		<?php while( $slidequery->have_posts() ) : $slidequery->the_post();
        $image = wp_get_attachment_url( get_post_thumbnail_id($post->ID));
        $img_arr[] = $image;
        $id_arr[] = $post->ID;
        endwhile;
  	  }
    }
?>
<?php if(!empty($id_arr)){ ?>
<div class="container">
<section id="home_slider" class="home_slider_main">
	<div class="slider-wrapper theme-default">
		<div id="slider" class="nivoSlider">
		<?php
		$i=1;
		foreach($img_arr as $url){ ?>
		<a href="<?php the_permalink(); ?>"><img src="<?php echo $url; ?>" title="#slidecaption<?php echo $i; ?>" /></a>
		<?php $i++; }  ?>
		</div>
		<?php
		$i=1;
		foreach($id_arr as $id){
		$title = get_the_title( $id );
		$post = get_post($id);
		$content = apply_filters('the_content', substr(strip_tags($post->post_content), 0, 100));
		?>
		<div id="slidecaption<?php echo $i; ?>" class="nivo-html-caption">
		<div class="slide_info">
		<h2><?php echo $title; ?></h2>
		<?php echo $content; ?>
		<div class="clear"></div>
		</div>
		</div>
		<?php $i++; } ?>
	</div>
	<div class="clear"></div>
	<div class="gradient"></div>
</section>
</div><!--end container-->
<?php } else { ?>
<div class="container">
<section id="home_slider">
  <div class="slider-wrapper theme-default">
    <div id="slider" class="nivoSlider"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider1.jpg" alt="" title="#slidecaption1" /> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider2.jpg" alt="" title="#slidecaption2" /> <img src="<?php echo esc_url(get_template_directory_uri()); ?>/images/slides/slider3.jpg" alt="" title="#slidecaption3" /></div>
    <div id="slidecaption1" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('100% RESPONSIVE ', 'shudh');?>
        </h2>
        <p><?php esc_html_e('Pellentesque habitant morbi tristique senect netus ettings malesuada fames ac turpis.', 'shudh');?></p>
      </div>
    </div>
    <div id="slidecaption2" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('100% RESPONSIVE', 'shudh');?>
        </h2>
        <p><?php esc_html_e('Pellentesque habitant morbi tristique senect netus ettings malesuada fames ac turpis.', 'shudh');?></p>
      </div>
    </div>
    <div id="slidecaption3" class="nivo-html-caption">
      <div class="slide_info">
        <h2>
          <?php esc_html_e('100% RESPONSIVE', 'shudh');?>
        </h2>
        <p><?php esc_html_e('Pellentesque habitant morbi tristique senect netus ettings malesuada fames ac turpis.', 'shudh');?></p>
      </div>
    </div>
  </div>
  <div class="clear"></div>
</section><!-- Slider Section -->
</div><!--.container-->
<?php } } } ?>


<?php if (is_front_page() || is_home()) { ?>
<?php if( get_theme_mod( 'hide_pagefourboxes' ) == '') { ?>
<section class="section-home">
<div class="content-home">
<div id="pagearea" class="home-d1">
	<div class="container">
           <div class="serviceswrap">
            <?php if ( '' !== get_theme_mod( 'services_title' ) ){  ?>
                <h2 class="section-title">
                	<span><?php esc_html_e(get_theme_mod('services_title',__('Our Services','shudh'))); ?></span>
                	<span class="line-h"></span>
                </h2>
            <?php } ?>

            <?php for($fx=1; $fx<5; $fx++) { ?>
        	<?php if( get_theme_mod('page-column'.$fx,false) ) { ?>
        	<?php $queryvar = new wp_query('page_id='.get_theme_mod('page-column'.$fx,true));
			while( $queryvar->have_posts() ) : $queryvar->the_post(); ?>
				<div class="int-cate threebox <?php if($fx % 4 == 0) { echo "last_column"; } ?>">
					<h3><?php the_title(); ?></h3>
					<div class="page-thumbbx">
						<?php if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail();?>
						<?php } else { ?>
						<img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/img_404.png" width="65" alt=""/>
						<?php } ?>
					</div>
					<div class="threebox-content">
						<p><?php echo shudh_content(20); ?></p>
						<a class="ReadMore" href="<?php the_permalink(); ?>"><?php esc_html_e('Leer más', 'shudh');?></a>
					</div>
				</div>
             <?php endwhile;
						wp_reset_query(); ?>
        <?php } else { ?>
        <div class="threebox <?php if($fx % 4 == 0) { echo "last_column"; } ?>">

             <div class="page-thumbbx">
                <img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/services<?php echo $fx; ?>.jpg" alt="" />
             </div>
             <div class="threebox-content">
              <h3><?php esc_html_e('Pellentesque habitant morbi', 'shudh');?><?php echo $fx; ?></h3>
               <p><?php esc_html_e('Pellentesque habitant morbi tristique senect netus ettings malesuada fames ac turpis.', 'shudh');?></p>
                <a class="ReadMore" href="#"><?php esc_html_e('Read More', 'shudh');?></a>
             </div>

         </div>
		<?php }} ?>


             </div>
        <div class="clear"></div>
    </div><!-- .container -->
 </div><!-- #pagearea -->
<div class="clear"></div>
<?php } ?>
<?php if( get_theme_mod( 'hide_welcomesection' ) == '') { ?>
<section id="wrapfirst">
            	<div class="container">
                    <div class="welcomewrap">
					<?php if( get_theme_mod('page-setting1')) { ?>
                    <?php $queryvar = new WP_query('page_id='.get_theme_mod('page-setting1' ,true)); ?>
                     <?php while( $queryvar->have_posts() ) : $queryvar->the_post();?>
                      <div class="welcomethumb">
                        <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail();?></a>
                      </div>
                      <h2><?php the_title(); ?></h2>
                      <?php the_content(); ?>
                      <a class="ReadMore" href="<?php the_permalink(); ?>"><?php esc_html_e('Read More', 'shudh');?></a>
                      <div class="clear"></div>
                    <?php endwhile; } else { ?>
                    <div class="welcomethumb">
                      <a href="#"><img src="<?php echo esc_url( get_template_directory_uri() ) ; ?>/images/featured-image-homepage.jpg" alt="" /></a>
                    </div>
                    <h2><?php _e('Hello! and Welcome to our site','shudh'); ?></h2>
                    <p><?php _e('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas imperdiet ex at mauris varius interdum. Fusce mattis gravida libero, nec sollicitudin eros finibus at. Praesent ex diam, mattis vitae efficitur vel, egestas sed neque. Sed congue interdum cursus.Nullam in tincidunt neque. Cras enim tortor, porta id tempor vel, placerat et tellus. ollicitudin eros finibus at. Praesent ex diam, mattis vitae efficitur vel, egestas sed neque. Sed congue interdum cursus ollicitudin eros finibus at. Praesent ex diam, mattis vitae efficitur vel, egestas sed neque. Sed congue interdum cursus.','shudh'); ?></p>

                    <a class="ReadMore" href="#"><?php esc_html_e('Read More', 'shudh');?></a>
                    <?php } ?>

               </div><!-- welcomewrap-->
              <div class="clear"></div>
            </div><!-- container -->
 </section><div class="clear"></div>

<?php }}?>