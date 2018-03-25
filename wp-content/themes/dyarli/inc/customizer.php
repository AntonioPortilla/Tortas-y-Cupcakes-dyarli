<?php
/**
 * Shudh Theme Customizer
 *
 * @package Shudh
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function shudh_customize_register( $wp_customize ) {
	
	//Add a class for titles
    class shudh_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function shudh_render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->remove_control('header_textcolor');
	$wp_customize->remove_control('display_header_text');
	
	
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#ff8a00',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => __('Color Scheme','shudh'),			
			 'description'	=> __('More color options in PRO Version','shudh'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	
	// Slider Section		
	$wp_customize->add_section(
        'slider_section',
        array(
            'title' => __('Slider Settings', 'shudh'),
            'priority' => null,
			'description'	=> __('Featured Image Size Should be ( 1170x606 ) More slider settings available in PRO Version','shudh'),           	
        )
    );
	
	
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',
			'sanitize_callback'	=> 'shudh_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide one:','shudh'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'shudh_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide two:','shudh'),
			'section'	=> 'slider_section'
	));	
	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'shudh_sanitize_dropdown_pages'
	));
	
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> __('Select page for slide three:','shudh'),
			'section'	=> 'slider_section'
	));	// Slider Section
	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'sanitize_text_field',
	));	 

	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> __('Hide slider Section','shudh'),
    	   'type'      => 'checkbox'
     )); // Slider Section	
	
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_second', array(
		'title'	=> __('Homepage Our Services Section','shudh'),
		'description'	=> __('Select Pages from the dropdown for homepage Our Services section','shudh'),
		'priority'	=> null
	));	
	
	$wp_customize->add_setting('services_title',array(
			'default'	=> __('Our Services','shudh'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('services_title',array(
			'label'	=> __('Add title for services four boxes','shudh'),
			'section'	=> 'section_second',
			'setting'	=> 'services_title'
	));	
	
	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'shudh_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'label' => __('','shudh'),
			'section' => 'section_second',
	));	
	
	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'shudh_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'label' => __('','shudh'),
			'section' => 'section_second',
	));
	
	$wp_customize->add_setting('page-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'shudh_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'label' => __('','shudh'),
			'section' => 'section_second',
	));	
	
	$wp_customize->add_setting('page-column4',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'shudh_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-column4',array('type' => 'dropdown-pages',
			'label' => __('','shudh'),
			'section' => 'section_second',
	));	//end four column part
	
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagefourboxes',array(
			'sanitize_callback' => 'sanitize_text_field',
	));	 

	$wp_customize->add_control( 'hide_pagefourboxes', array(
    	   'section'   => 'section_second',    	 
		   'label'	=> __('Hide four column page boxes','shudh'),
    	   'type'      => 'checkbox'
     )); // Hide Page Boxes Column Section
	
	// Home Welcome Section 	
	$wp_customize->add_section('section_first',array(
		'title'	=> __('Homepage Welcome Section','shudh'),
		'description'	=> __('Select Page from the dropdown for first section','shudh'),
		'priority'	=> null
	));
	
	$wp_customize->add_setting('page-setting1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'shudh_sanitize_dropdown_pages',
		));
 
	$wp_customize->add_control(	'page-setting1',array('type' => 'dropdown-pages',
			'label' => __('','shudh'),
			'section' => 'section_first',
	));
	
	//Hide Welcome Section
	$wp_customize->add_setting('hide_welcomesection',array(
			'sanitize_callback' => 'sanitize_text_field',
	));	 

	$wp_customize->add_control( 'hide_welcomesection', array(
    	   'section'   => 'section_first',    	 
		   'label'	=> __('Hide Welcome Section','shudh'),
    	   'type'      => 'checkbox'
     )); // Welcome Section	
	
	
	$wp_customize->add_section('social_sec',array(
			'title'	=> __('Social Settings','shudh'),				
			'description'	=> __('More social icon available in PRO Version','shudh'),				
			'priority'		=> null
	));
	
	
	$wp_customize->add_setting('fb_link',array(
			'default'	=> '#facebook',
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	
	$wp_customize->add_control('fb_link',array(
			'label'	=> __('Add facebook link here','shudh'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> '#twitter',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	
	$wp_customize->add_control('twitt_link',array(
			'label'	=> __('Add twitter link here','shudh'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> '#gplus',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> __('Add google plus link here','shudh'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> '#linkedin',
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> __('Add linkedin link here','shudh'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	
	$wp_customize->add_section('footer_area',array(
			'title'	=> __('Footer Area','shudh'),
			'priority'	=> null,
			'description'	=> __('Add footer copyright text','shudh')
	));
	
	$wp_customize->add_setting('menu_title',array(
			'default'	=> __('Main Menu','shudh'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('menu_title',array(
			'label'	=> __('Add title for menu','shudh'),
			'section'	=> 'footer_area',
			'setting'	=> 'menu_title'
	));	
	
	$wp_customize->add_setting('latest_title',array(
			'default'	=> __('Latest News','shudh'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('latest_title',array(
			'label'	=> __('Add title for footer latest post','shudh'),
			'section'	=> 'footer_area',
			'setting'	=> 'latest_title'
	));	
	
	$wp_customize->add_setting('about_title',array(
			'default'	=> __('About Us','shudh'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('about_title',array(
			'label'	=> __('Add title for our philosophy','shudh'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));
	
	$wp_customize->add_setting('about_description',array(
			'default'	=> __('Donec ut ex ac nulla pellentesque mollis in a enim. Praesent placerat sapien mauris, vitae sodales tellus venenatis ac. Suspendisse suscipit velit id ultricies auctor. Duis turpis arcu, aliquet sed sollicitudin sed, porta quis urna. Quisque velit nibh, egestas et erat a, vehicula interdum augue.','shudh'),
			'sanitize_callback'	=> 'wp_filter_post_kses'
	));
	
	$wp_customize->add_control('about_description', array(	
			'label'	=> __('Add description for about us','shudh'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_description',
			'type' => 'textarea',
	));
	
	$wp_customize->add_setting('contact_title',array(
			'default'	=> __('Contact Info','shudh'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('contact_title',array(
			'label'	=> __('Add title for contact info','shudh'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));	
		
	// Footer Info
	$wp_customize->add_section('contact_sec',array(
			'title'	=> __('Contact Info','shudh'),
			'description'	=> __('Add your contact details here','shudh'),
			'priority'	=> null
	));	
	
	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> __('591 Christie Way Passaic Street, North Carolina, America ( USA )','shudh'),
			'sanitize_callback'	=> 'esc_textarea'
	));
	
	$wp_customize->add_control('contact_add', array(
				'label'	=> __('Add contact address here','shudh'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add',
				'type' => 'textarea',
			));
	$wp_customize->add_setting('contact_no',array(
			'default'	=> __('+62 500 800 122','shudh'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> __('Add contact number here.','shudh'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	
	
	$wp_customize->add_setting('fax_no',array(
			'default'	=> __('+62 500 800 123','shudh'),
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('fax_no',array(
			'label'	=> __('Add fax number here.','shudh'),
			'section'	=> 'contact_sec',
			'setting'	=> 'fax_no'
	));
	
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> 'contact@company.com',
			'sanitize_callback'	=> 'sanitize_email'
	));
	
	$wp_customize->add_control('contact_mail',array(
			'label'	=> __('Add you email here','shudh'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));	
	
	$wp_customize->add_setting('website_link',array(
			'default'	=> 'www.yourdomain.com',
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('website_link',array(
			'label'	=> __('Add your website url','shudh'),
			'section'	=> 'contact_sec',
			'setting'	=> 'website_link'
	));	
		
}
add_action( 'customize_register', 'shudh_customize_register' );

//Integer
function shudh_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return absint( $input );
    }
}

function shudh_sanitize_dropdown_pages( $page_id, $setting ) {
	// Ensure $input is an absolute integer.
	$page_id = absint( $page_id );
	
	// If $page_id is an ID of a published page, return it; otherwise, return the default.
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

function shudh_custom_css(){
		?>
        	<style type="text/css"> 
					a, .blog_lists h2 a:hover,
					#sidebar ul li a:hover,								
					.cols-4 ul li a:hover, .cols-4 ul li.current_page_item a,						
					.sitenav ul li a:hover, .sitenav ul li.current_page_item a,					
					.services-wrap .one_third h4,					
					.rightwrap .threebox .ReadMore,
					.footer a:hover,
					.design-by a:hover,
					div.recent-post a:hover,
					.serviceswrap .threebox .ReadMore
					{ color:<?php echo esc_html(get_theme_mod('color_scheme','#ff8a00')); ?>;}
					 
					
					.pagination ul li .current, .pagination ul li a:hover, 
					#commentform input#submit:hover,					
					.nivo-controlNav a.active,				
					h3.widget-title,				
					.wpcf7 input[type='submit'],					
					.services-wrap .one_third:hover,					
					.rightwrap .threebox,
					.social-icons a:hover,
					.serviceswrap .threebox
					{ background-color:<?php echo esc_html(get_theme_mod('color_scheme','#ff8a00')); ?> !important;}
					
						
					.nivo-prevNav
					{ border-color:<?php echo esc_html(get_theme_mod('color_scheme','#ff8a00')); ?> transparent transparent;}
					
					.nivo-nextNav
					{ border-color: transparent transparent<?php echo esc_html(get_theme_mod('color_scheme','#ff8a00')); ?>;}
					
			</style> 
<?php   
}
         
add_action('wp_head','shudh_custom_css');	

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function shudh_customize_preview_js() {
	wp_enqueue_script( 'shudh_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'shudh_customize_preview_js' );

function shudh_custom_customize_enqueue() {
	wp_enqueue_script( 'shudh-custom-customize', get_template_directory_uri() . '/js/custom-customize.js', array( 'jquery', 'customize-controls' ), false, true );
	wp_localize_script( 'custom-customize', 'custom_customize_vars', array('accordion-section-title' => __('Upgrade to PRO Version', 'shudh'),
	'li#accordion-panel-widgets ul li .accordion-section-content' => __('More Widgets in', 'shudh'),
	'li#accordion-panel-widgets ul li .accordion-section-content' => __('PRO Version', 'shudh')
		));
} 
add_action( 'customize_controls_enqueue_scripts', 'shudh_custom_customize_enqueue' );