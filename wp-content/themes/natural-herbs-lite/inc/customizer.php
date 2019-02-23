<?php
/**
 * Natural Herbs Lite Theme Customizer
 *
 * @package Natural Herbs Lite
 */
function natural_herbs_lite_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'natural_herbs_lite_custom_header_args', array(
		'default-text-color'     => '949494',
		'width'                  => 1600,
		'height'                 => 200,
		'wp-head-callback'       => 'natural_herbs_lite_header_style',
 		'default-text-color' => false,
 		'header-text' => false,
	) ) );
}
add_action( 'after_setup_theme', 'natural_herbs_lite_custom_header_setup' );
if ( ! function_exists( 'natural_herbs_lite_header_style' ) ) :
/**
 * Styles the header image and text displayed on the blog
 *
 * @see natural_herbs_lite_custom_header_setup().
 */
function natural_herbs_lite_header_style() {
	$header_text_color = get_header_textcolor();
	?>
	<style type="text/css">
	<?php
		//Check if user has defined any header image.
		if ( get_header_image() ) :
	?>
		.header {
			background: url(<?php echo esc_url(get_header_image()); ?>) no-repeat;
			background-position: center top;
		}
	<?php endif; ?>	
	</style>
	<?php
}
endif; // natural_herbs_lite_header_style 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */ 
/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function natural_herbs_lite_customize_register( $wp_customize ) {
	//Add a class for titles
    class natural_herbs_lite_Info extends WP_Customize_Control {
        public $type = 'info';
        public $label = '';
        public function render_content() {
        ?>
			<h3 style="text-decoration: underline; color: #DA4141; text-transform: uppercase;"><?php echo esc_html( $this->label ); ?></h3>
        <?php
        }
    }
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->add_setting('color_scheme',array(
			'default'	=> '#ECB00E',
			'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control(
		new WP_Customize_Color_Control($wp_customize,'color_scheme',array(
			'label' => esc_html__('Color Scheme','natural-herbs-lite'),			
			 'description'	=> esc_html__('More color options in PRO Version','natural-herbs-lite'),	
			'section' => 'colors',
			'settings' => 'color_scheme'
		))
	);
	// Slider Section		
	$wp_customize->add_section( 'slider_section', array(
            'title' => esc_html__('Slider Settings', 'natural-herbs-lite'),
            'priority' => null,
            'description'	=> esc_html__('Featured Image Size Should be ( 1400 X 775 ) More slider settings available in PRO Version','natural-herbs-lite'),		
        )
    );
	$wp_customize->add_setting('page-setting7',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'natural_herbs_lite_sanitize_integer'
	));
	$wp_customize->add_control('page-setting7',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide one:','natural-herbs-lite'),
			'section'	=> 'slider_section'
	));	
	$wp_customize->add_setting('page-setting8',array(
			'default' => '0',
			'capability' => 'edit_theme_options',			
			'sanitize_callback'	=> 'natural_herbs_lite_sanitize_integer'
	));
	$wp_customize->add_control('page-setting8',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide two:','natural-herbs-lite'),
			'section'	=> 'slider_section'
	));	
	$wp_customize->add_setting('page-setting9',array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback'	=> 'natural_herbs_lite_sanitize_integer'
	));
	$wp_customize->add_control('page-setting9',array(
			'type'	=> 'dropdown-pages',
			'label'	=> esc_html__('Select page for slide three:','natural-herbs-lite'),
			'section'	=> 'slider_section'
	));	
	//Slider hide
	$wp_customize->add_setting('hide_slides',array(
			'sanitize_callback' => 'natural_herbs_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_slides', array(
    	   'section'   => 'slider_section',    	 
		   'label'	=> esc_html__('Uncheck To Show Slider','natural-herbs-lite'),
    	   'type'      => 'checkbox'
     )); // Slider Section	
	 
	// Home Three Boxes Section 	
	$wp_customize->add_section('section_one', array(
		'title'	=> esc_html__('Home First Section Three Boxes','natural-herbs-lite'),
		'description'	=> esc_html__('Select Pages from the dropdown for homepage first section three boxes','natural-herbs-lite'),
		'priority'	=> null
	));	
	$wp_customize->add_setting('page-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'natural_herbs_lite_sanitize_integer',
		));
	$wp_customize->add_control(	'page-column1',array('type' => 'dropdown-pages',
			'section' => 'section_one',
	));	
	$wp_customize->add_setting('page-column2',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'natural_herbs_lite_sanitize_integer',
		));
	$wp_customize->add_control(	'page-column2',array('type' => 'dropdown-pages',
			'section' => 'section_one',
	));
	$wp_customize->add_setting('page-column3',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'natural_herbs_lite_sanitize_integer',
		));
	$wp_customize->add_control(	'page-column3',array('type' => 'dropdown-pages',
			'section' => 'section_one',
	));
	//Hide Page Boxes Column Section
	$wp_customize->add_setting('hide_pagethreeboxes',array(
			'sanitize_callback' => 'natural_herbs_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_pagethreeboxes', array(
    	   'section'   => 'section_one',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','natural-herbs-lite'),
    	   'type'      => 'checkbox'
     )); // Hide Page Boxes Column Section
	// Home First Section Three Box 	
	
	$wp_customize->add_section('section_thumb_with_content', array(
		'title'	=> esc_html__('Home Second Section','natural-herbs-lite'),
		'description'	=> esc_html__('Select Pages from the dropdown for home second section','natural-herbs-lite'),
		'priority'	=> null
	));	
	$wp_customize->add_setting('sec-column1',	array(
			'default' => '0',
			'capability' => 'edit_theme_options',	
			'sanitize_callback' => 'natural_herbs_lite_sanitize_integer',
		));
	$wp_customize->add_control(	'sec-column1',array('type' => 'dropdown-pages',
			'section' => 'section_thumb_with_content',
	));	
	//Hide Second Section Box 	
	$wp_customize->add_setting('hide_home_secwith_content',array(
			'sanitize_callback' => 'natural_herbs_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_home_secwith_content', array(
    	   'section'   => 'section_thumb_with_content',    	 
		   'label'	=> esc_html__('Uncheck To Show This Section','natural-herbs-lite'),
    	   'type'      => 'checkbox'
     )); // Hide Second Section Box 	 	
	
	 
	$wp_customize->add_section('social_sec',array(
			'title'	=> esc_html__('Social Settings','natural-herbs-lite'),				
			'description'	=> esc_html__('More social icon available in PRO Version','natural-herbs-lite'),		
			'priority'		=> null
	));
	$wp_customize->add_setting('fb_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'	
	));
	$wp_customize->add_control('fb_link',array(
			'label'	=> esc_html__('Add facebook link here','natural-herbs-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'fb_link'
	));	
	$wp_customize->add_setting('twitt_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('twitt_link',array(
			'label'	=> esc_html__('Add twitter link here','natural-herbs-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'twitt_link'
	));
	$wp_customize->add_setting('gplus_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('gplus_link',array(
			'label'	=> esc_html__('Add google plus link here','natural-herbs-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'gplus_link'
	));
	$wp_customize->add_setting('linked_link',array(
			'default'	=> null,
			'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('linked_link',array(
			'label'	=> esc_html__('Add linkedin link here','natural-herbs-lite'),
			'section'	=> 'social_sec',
			'setting'	=> 'linked_link'
	));
	$wp_customize->add_section('footer_area',array(
			'title'	=> esc_html__('Footer Area','natural-herbs-lite'),
			'priority'	=> null,
	));
	$wp_customize->add_setting('natural_herbs_lite_options[credit-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new natural_herbs_lite_Info( $wp_customize, 'cred_section', array(
        'section' => 'footer_area',
        'settings' => 'natural_herbs_lite_options[credit-info]'
        ) )
    );
	$wp_customize->add_setting('newsfeed_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('newsfeed_title',array(
			'label'	=> esc_html__('Add title for latest news feed','natural-herbs-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'newsfeed_title'
	));	
	$wp_customize->add_setting('about_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('about_title',array(
			'label'	=> esc_html__('Add title for about us','natural-herbs-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'about_title'
	));	
	$wp_customize->add_setting( 'about_description', array(
			'default'	=> null,				
			'sanitize_callback' => 'sanitize_textarea_field',
	) );
	$wp_customize->add_control( 'about_description', array(
			'type' => 'textarea',
			'label' => esc_html__( 'About Description', 'natural-herbs-lite' ),   
			'section' => 'footer_area',   
			'setting'	=> 'about_description',
	) );
	$wp_customize->add_setting('contact_title',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_title',array(
			'label'	=> esc_html__('Add title for footer contact info','natural-herbs-lite'),
			'section'	=> 'footer_area',
			'setting'	=> 'contact_title'
	));
		//Slider hide
	$wp_customize->add_setting('hide_footer',array(
			'sanitize_callback' => 'natural_herbs_lite_sanitize_checkbox',
			'default' => true,
	));	 
	$wp_customize->add_control( 'hide_footer', array(
    	   'section'   => 'footer_area',    	 
		   'label'	=> esc_html__('Uncheck To Show Footer','natural-herbs-lite'),
    	   'type'      => 'checkbox'
     )); // Slider Section	
	$wp_customize->add_section('contact_sec',array(
			'title'	=> esc_html__('Contact Details','natural-herbs-lite'),
			'description'	=> esc_html__('Add you contact details here','natural-herbs-lite'),
			'priority'	=> null
	));	
	$wp_customize->add_setting('contact_add',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_textarea_field',
	));
	$wp_customize->add_control(	'contact_add', array(
				'type' => 'textarea',
				'label'	=> esc_html__('Add contact address here','natural-herbs-lite'),
				'section'	=> 'contact_sec',
				'setting'	=> 'contact_add'
	));
	$wp_customize->add_setting('contact_no',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('contact_no',array(
			'label'	=> esc_html__('Add contact number here.','natural-herbs-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_no'
	));
	$wp_customize->add_setting('contact_mail',array(
			'default'	=> null,
			'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('contact_mail',array(
			'label'	=> esc_html__('Add you email here','natural-herbs-lite'),
			'section'	=> 'contact_sec',
			'setting'	=> 'contact_mail'
	));
    $wp_customize->add_setting('natural_herbs_lite_options[layout-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new natural_herbs_lite_Info( $wp_customize, 'layout_section', array(
        'section' => 'theme_layout_sec',
        'settings' => 'natural_herbs_lite_options[layout-info]',
        'priority' => null
        ) )
    );
    $wp_customize->add_setting('natural_herbs_lite_options[font-info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new natural_herbs_lite_Info( $wp_customize, 'font_section', array(
        'section' => 'theme_font_sec',
        'settings' => 'natural_herbs_lite_options[font-info]',
        'priority' => null
        ) )
    );	
    $wp_customize->add_setting('natural_herbs_lite_options[info]', array(
            'type' => 'info_control',
            'capability' => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field'
        )
    );
    $wp_customize->add_control( new natural_herbs_lite_Info( $wp_customize, 'doc_section', array(
        'section' => 'theme_doc_sec',
        'settings' => 'natural_herbs_lite_options[info]',
        'priority' => 10
        ) )
    );		
}
add_action( 'customize_register', 'natural_herbs_lite_customize_register' );
//Integer
function natural_herbs_lite_sanitize_integer( $input ) {
    if( is_numeric( $input ) ) {
        return intval( $input );
    }
}
function natural_herbs_lite_sanitize_checkbox( $checked ) {
	// Boolean check.
	return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
//setting inline css.
function natural_herbs_lite_custom_css() {
    wp_enqueue_style(
        'natural-herbs-lite-custom-style',
        get_template_directory_uri() . '/css/natural-herbs-lite-custom-style.css'
    );
        $color = esc_html( get_theme_mod( 'color_scheme' ) ); //E.g. #e64d43
		$header_text_color = get_header_textcolor();
        $custom_css = "
					#sidebar ul li a:hover,
					.cols-3 ul li a:hover, .cols-3 ul li.current_page_item a,					
					.phone-no strong,					
					.left a:hover,
					.blog_lists h4 a:hover,
					.recent-post h6 a:hover,
					.recent-post a:hover,
					.design-by a,
					.postmeta a:hover,
					.recent-post .morebtn:hover, .sitenav ul li a:hover, .sitenav ul li.current_page_item a, .sitenav ul li.menu-item-has-children.hover, .sitenav ul li.current-menu-parent a.parent
					{ 
						 color: {$color} !important;
					}
					.pagination .nav-links span.current, .pagination .nav-links a:hover,
					#commentform input#submit:hover,
					.nivo-controlNav a.active,								
					.wpcf7 input[type='submit'],
					a.ReadMore,
					input.search-submit
					{ 
					   background-color: {$color} !important;
					}
					.slide_info .slide_more:hover{border-color: {$color} !important;}
				";
        wp_add_inline_style( 'natural-herbs-lite-custom-style', $custom_css );
}
add_action( 'wp_enqueue_scripts', 'natural_herbs_lite_custom_css' );          
/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function natural_herbs_lite_customize_preview_js() {
	wp_enqueue_script( 'natural_herbs_lite_customizer', get_template_directory_uri() . '/js/customize-preview.js', array( 'customize-preview' ), '20130508', true );
}
add_action( 'customize_preview_init', 'natural_herbs_lite_customize_preview_js' );