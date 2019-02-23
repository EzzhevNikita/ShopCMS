<?php
/**
 * VW Pet Shop Theme Customizer
 *
 * @package VW Pet Shop
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function vw_pet_shop_customize_register( $wp_customize ) {

	//add home page setting pannel
	$wp_customize->add_panel( 'vw_pet_shop_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'VW Settings', 'vw-pet-shop' ),
	    'description' => __( 'Description of what this panel does.', 'vw-pet-shop' ),
	) );

	$wp_customize->add_section( 'vw_pet_shop_left_right', array(
    	'title'      => __( 'General Settings', 'vw-pet-shop' ),
		'priority'   => 30,
		'panel' => 'vw_pet_shop_panel_id'
	) );

	// Add Settings and Controls for Layout
	$wp_customize->add_setting('vw_pet_shop_theme_options',array(
        'default' => __('Right Sidebar','vw-pet-shop'),
        'sanitize_callback' => 'vw_pet_shop_sanitize_choices'	        
	));
	$wp_customize->add_control('vw_pet_shop_theme_options',array(
        'type' => 'radio',
        'label' => __('Do you want this section','vw-pet-shop'),
        'section' => 'vw_pet_shop_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','vw-pet-shop'),
            'Right Sidebar' => __('Right Sidebar','vw-pet-shop'),
            'One Column' => __('One Column','vw-pet-shop'),
            'Three Columns' => __('Three Columns','vw-pet-shop'),
            'Four Columns' => __('Four Columns','vw-pet-shop'),
            'Grid Layout' => __('Grid Layout','vw-pet-shop')
        ),
	)   );
    

	$font_array = array(
        '' =>'No Fonts', 
        'Abril Fatface' => 'Abril Fatface',
        'Acme' => 'Acme', 
        'Anton' => 'Anton', 
        'Architects Daughter' =>'Architects Daughter',
        'Arimo' =>'Arimo',
        'Arsenal' =>'Arsenal', 
        'Arvo' =>'Arvo',
        'Alegreya' =>'Alegreya', 
        'Alfa Slab One' =>'Alfa Slab One', 
        'Averia Serif Libre' =>'Averia Serif Libre', 
        'Bangers' =>'Bangers',
        'Boogaloo' =>'Boogaloo',
        'Bad Script' =>'Bad Script', 
        'Bitter' => 'Bitter',
        'Bree Serif' =>'Bree Serif', 
        'BenchNine' =>'BenchNine',
        'Cabin' => 'Cabin',
        'Cardo' => 'Cardo',
        'Courgette' =>'Courgette',
        'Cherry Swash' =>'Cherry Swash', 
        'Cormorant Garamond' =>'Cormorant Garamond', 
        'Crimson Text' =>'Crimson Text', 
        'Cuprum' =>'Cuprum',
        'Cookie' => 'Cookie',
        'Chewy' => 'Chewy', 
        'Days One' => 'Days One', 
        'Dosis' =>'Dosis', 
        'Droid Sans' =>'Droid Sans',
        'Economica' => 'Economica', 
        'Fredoka One' =>'Fredoka One',
        'Fjalla One' =>'Fjalla One', 
        'Francois One' =>'Francois One',
        'Frank Ruhl Libre' =>'Frank Ruhl Libre',
        'Gloria Hallelujah' =>'Gloria Hallelujah', 
        'Great Vibes' =>'Great Vibes', 
        'Handlee' =>'Handlee', 
        'Hammersmith One' =>'Hammersmith One',
        'Inconsolata' =>'Inconsolata', 
        'Indie Flower' =>'Indie Flower',
        'IM Fell English SC' => 'IM Fell English SC', 
        'Julius Sans One' =>'Julius Sans One', 
        'Josefin Slab' =>'Josefin Slab', 
        'Josefin Sans' =>'Josefin Sans',
        'Kanit' =>'Kanit', 
        'Lobster' => 'Lobster',
        'Lato' =>'Lato', 
        'Lora' => 'Lora', 
        'Libre Baskerville' =>'Libre Baskerville', 
        'Lobster Two' =>'Lobster Two',
        'Merriweather' =>'Merriweather',
        'Monda' => 'Monda', 
        'Montserrat' =>'Montserrat',
        'Muli' =>'Muli',
        'Marck Script' =>'Marck Script',
        'Noto Serif' =>'Noto Serif',
        'Open Sans' => 'Open Sans', 
        'Overpass' =>'Overpass', 
        'Overpass Mono' =>'Overpass Mono', 
        'Oxygen' =>'Oxygen', 
        'Orbitron' =>'Orbitron',
        'Patua One' =>'Patua One', 
        'Pacifico' =>'Pacifico', 
        'Padauk' =>'Padauk',
        'Playball' =>'Playball', 
        'Playfair Display' => 'Playfair Display',
        'PT Sans' => 'PT Sans', 
        'Philosopher' =>'Philosopher',
        'Permanent Marker' =>'Permanent Marker', 
        'Poiret One' => 'Poiret One', 
        'Quicksand' =>'Quicksand',
        'Quattrocento Sans' =>'Quattrocento Sans', 
        'Raleway' =>'Raleway', 
        'Rubik' =>'Rubik', 
        'Rokkitt' => 'Rokkitt',
        'Russo One' =>'Russo One', 
        'Righteous' =>'Righteous',
        'Slabo' =>'Slabo',
        'Source Sans Pro' =>'Source Sans Pro',
        'Shadows Into Light Two' =>'Shadows Into Light Two',
        'Shadows Into Light' =>'Shadows Into Light',
        'Sacramento' =>'Sacramento', 
        'Shrikhand' =>'Shrikhand', 
        'Tangerine' =>'Tangerine', 
        'Ubuntu' =>'Ubuntu',
        'VT323' => 'VT323', 
        'Varela Round' => 'Varela Round',
        'Vampiro One' =>'Vampiro One', 
        'Vollkorn' =>'Vollkorn', 
        'Volkhov' => 'Volkhov',
        'Yanone Kaffeesatz' =>'Yanone Kaffeesatz'
    );

	//Typography
	$wp_customize->add_section( 'vw_pet_shop_typography', array(
    	'title'      => __( 'Typography', 'vw-pet-shop' ),
		'priority'   => 30,
		'panel' => 'vw_pet_shop_panel_id'
	) );
	
	// This is Paragraph Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_paragraph_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_paragraph_color', array(
		'label' => __('Paragraph Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_paragraph_color',
	)));

	//This is Paragraph FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_paragraph_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_paragraph_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( 'Paragraph Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	$wp_customize->add_setting('vw_pet_shop_paragraph_font_size',array(
		'default'	=> '12px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_pet_shop_paragraph_font_size',array(
		'label'	=> __('Paragraph Font Size','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_typography',
		'setting'	=> 'vw_pet_shop_paragraph_font_size',
		'type'	=> 'text'
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_atag_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_atag_color', array(
		'label' => __('"a" Tag Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_atag_color',
	)));

	//This is "a" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_atag_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_atag_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( '"a" Tag Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is "a" Tag Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_li_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_li_color', array(
		'label' => __('"li" Tag Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_li_color',
	)));

	//This is "li" Tag FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_li_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_li_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( '"li" Tag Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	// This is H1 Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_h1_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_h1_color', array(
		'label' => __('H1 Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_h1_color',
	)));

	//This is H1 FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_h1_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_h1_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( 'H1 Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H1 FontSize setting
	$wp_customize->add_setting('vw_pet_shop_h1_font_size',array(
		'default'	=> '50px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_pet_shop_h1_font_size',array(
		'label'	=> __('H1 Font Size','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_typography',
		'setting'	=> 'vw_pet_shop_h1_font_size',
		'type'	=> 'text'
	));

	// This is H2 Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_h2_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_h2_color', array(
		'label' => __('h2 Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_h2_color',
	)));

	//This is H2 FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_h2_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_h2_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( 'h2 Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H2 FontSize setting
	$wp_customize->add_setting('vw_pet_shop_h2_font_size',array(
		'default'	=> '45px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_pet_shop_h2_font_size',array(
		'label'	=> __('h2 Font Size','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_typography',
		'setting'	=> 'vw_pet_shop_h2_font_size',
		'type'	=> 'text'
	));

	// This is H3 Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_h3_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_h3_color', array(
		'label' => __('h3 Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_h3_color',
	)));

	//This is H3 FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_h3_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_h3_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( 'h3 Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H3 FontSize setting
	$wp_customize->add_setting('vw_pet_shop_h3_font_size',array(
		'default'	=> '36px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_pet_shop_h3_font_size',array(
		'label'	=> __('h3 Font Size','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_typography',
		'setting'	=> 'vw_pet_shop_h3_font_size',
		'type'	=> 'text'
	));

	// This is H4 Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_h4_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_h4_color', array(
		'label' => __('h4 Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_h4_color',
	)));

	//This is H4 FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_h4_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_h4_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( 'h4 Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H4 FontSize setting
	$wp_customize->add_setting('vw_pet_shop_h4_font_size',array(
		'default'	=> '30px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_pet_shop_h4_font_size',array(
		'label'	=> __('h4 Font Size','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_typography',
		'setting'	=> 'vw_pet_shop_h4_font_size',
		'type'	=> 'text'
	));

	// This is H5 Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_h5_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_h5_color', array(
		'label' => __('h5 Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_h5_color',
	)));

	//This is H5 FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_h5_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_h5_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( 'h5 Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H5 FontSize setting
	$wp_customize->add_setting('vw_pet_shop_h5_font_size',array(
		'default'	=> '25px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_pet_shop_h5_font_size',array(
		'label'	=> __('h5 Font Size','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_typography',
		'setting'	=> 'vw_pet_shop_h5_font_size',
		'type'	=> 'text'
	));

	// This is H6 Color picker setting
	$wp_customize->add_setting( 'vw_pet_shop_h6_color', array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'vw_pet_shop_h6_color', array(
		'label' => __('h6 Color', 'vw-pet-shop'),
		'section' => 'vw_pet_shop_typography',
		'settings' => 'vw_pet_shop_h6_color',
	)));

	//This is H6 FontFamily picker setting
	$wp_customize->add_setting('vw_pet_shop_h6_font_family',array(
	  'default' => '',
	  'capability' => 'edit_theme_options',
	  'sanitize_callback' => 'vw_pet_shop_sanitize_choices'
	));
	$wp_customize->add_control(
	    'vw_pet_shop_h6_font_family', array(
	    'section'  => 'vw_pet_shop_typography',
	    'label'    => __( 'h6 Fonts','vw-pet-shop'),
	    'type'     => 'select',
	    'choices'  => $font_array,
	));

	//This is H6 FontSize setting
	$wp_customize->add_setting('vw_pet_shop_h6_font_size',array(
		'default'	=> '18px',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	
	$wp_customize->add_control('vw_pet_shop_h6_font_size',array(
		'label'	=> __('h6 Font Size','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_typography',
		'setting'	=> 'vw_pet_shop_h6_font_size',
		'type'	=> 'text'
	));

	//Topbar section
	$wp_customize->add_section('vw_pet_shop_topbar',array(
		'title'	=> __('Topbar Section','vw-pet-shop'),
		'description'	=> __('Add Header Content here','vw-pet-shop'),
		'priority'	=> null,
		'panel' => 'vw_pet_shop_panel_id',
	));
	
	$wp_customize->add_setting('vw_pet_shop_header_callnumber',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_pet_shop_header_callnumber',array(
		'label'	=> __('Add Contact Details','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_header_callnumber',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_header_email_address',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_pet_shop_header_email_address',array(
		'label'	=> __('Add Email Address','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_header_email_address',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_header_time',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_pet_shop_header_time',array(
		'label'	=> __('Add Time','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_header_time',
		'type'		=> 'text'
	));

	$wp_customize->add_setting('vw_pet_shop_header_myaccount_url',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));	
	$wp_customize->add_control('vw_pet_shop_header_myaccount_url',array(
		'label'	=> __('Add My Account Page Link','vw-pet-shop'),
		'section'	=> 'vw_pet_shop_topbar',
		'setting'	=> 'vw_pet_shop_header_myaccount_url',
		'type'		=> 'url'
	));

	//home page slider
	$wp_customize->add_section( 'vw_pet_shop_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'vw-pet-shop' ),
		'priority'   => 30,
		'panel' => 'vw_pet_shop_panel_id'
	) );

	for ( $count = 1; $count <= 4; $count++ ) {
		// Add color scheme setting and control.
		$wp_customize->add_setting( 'vw_pet_shop_slidersettings-page-' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_pet_shop_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'vw_pet_shop_slidersettings-page-' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'vw-pet-shop' ),
			'section'  => 'vw_pet_shop_slidersettings',
			'type'     => 'dropdown-pages'
		) );
	}

	//Pet Collection
	$wp_customize->add_section('vw_pet_shop_products',array(
		'title'	=> __('Pets Collection','vw-pet-shop'),
		'description'=> __('This section will appear below the slider.','vw-pet-shop'),
		'panel' => 'vw_pet_shop_panel_id',
	));
	
	$wp_customize->add_setting('vw_pet_shop_maintitle',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_pet_shop_maintitle',array(
		'label'	=> __('Section Title','vw-pet-shop'),
		'section'=> 'vw_pet_shop_products',
		'setting'=> 'vw_pet_shop_maintitle',
		'type'=> 'text'
	));	

	for ( $count = 0; $count <= 0; $count++ ) {

		$wp_customize->add_setting( 'vw_pet_shop_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'vw_pet_shop_sanitize_dropdown_pages'
		));
		$wp_customize->add_control( 'vw_pet_shop_page' . $count, array(
			'label'    => __( 'Select Page', 'vw-pet-shop' ),
			'section'  => 'vw_pet_shop_products',
			'type'     => 'dropdown-pages'
		));
	}

	//Footer Text
	$wp_customize->add_section('vw_pet_shop_footer',array(
		'title'	=> __('Footer','vw-pet-shop'),
		'description'=> __('This section will appear in the footer','vw-pet-shop'),
		'panel' => 'vw_pet_shop_panel_id',
	));	
	
	$wp_customize->add_setting('vw_pet_shop_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('vw_pet_shop_footer_text',array(
		'label'	=> __('Copyright Text','vw-pet-shop'),
		'section'=> 'vw_pet_shop_footer',
		'setting'=> 'vw_pet_shop_footer_text',
		'type'=> 'text'
	));	
}

add_action( 'customize_register', 'vw_pet_shop_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo-resizer.php' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class VW_Pet_Shop_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'VW_Pet_Shop_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new VW_Pet_Shop_Customize_Section_Pro(
				$manager,
				'example_1',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'VW Pet Pro', 'vw-pet-shop' ),
					'pro_text' => esc_html__( 'Upgrade Pro', 'vw-pet-shop' ),
					'pro_url'  => esc_url('https://www.vwthemes.com/themes/premium-pet-wordpress-theme/')
				)
			)
		);

		// Register sections.
		$manager->add_section(
			new VW_Pet_Shop_Customize_Section_Pro(
				$manager,
				'example_2',
				array(
					'priority'   => 9,
					'title'    => esc_html__( 'Documentation', 'vw-pet-shop' ),
					'pro_text' => esc_html__( 'Docs', 'vw-pet-shop' ),
					'pro_url'  => admin_url( 'themes.php?page=vw_pet_shop_guide' )
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'vw-pet-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'vw-pet-shop-customize-controls', trailingslashit( get_template_directory_uri() ) . '/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
VW_Pet_Shop_Customize::get_instance();