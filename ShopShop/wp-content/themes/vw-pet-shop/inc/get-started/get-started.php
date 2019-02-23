<?php
//about theme info
add_action( 'admin_menu', 'vw_pet_shop_gettingstarted' );
function vw_pet_shop_gettingstarted() {    	
	add_theme_page( esc_html__('About VW Petshop Theme', 'vw-pet-shop'), esc_html__('About VW Petshop Lite', 'vw-pet-shop'), 'edit_theme_options', 'vw_pet_shop_guide', 'vw_pet_shop_mostrar_guide');   
}

// Add a Custom CSS file to WP Admin Area
function vw_pet_shop_admin_theme_style() {
   wp_enqueue_style( 'vw-pet-shop-font', vw_pet_shop_admin_font_url(), array() );
   wp_enqueue_style('custom-admin-style', get_template_directory_uri() . '/inc/get-started/get-started.css');
   wp_enqueue_script('tabs', get_template_directory_uri() . '/inc/get-started/js/tab.js');
}
add_action('admin_enqueue_scripts', 'vw_pet_shop_admin_theme_style');

// Theme Font URL
function vw_pet_shop_admin_font_url() {
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Muli:300,400,600,700,800,900';

	$query_args = array(
		'family'	=> urlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
}

//guidline for about theme
function vw_pet_shop_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'vw-pet-shop' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to VW Petshop Theme', 'vw-pet-shop' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','vw-pet-shop'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy VW Petshop at 10% Discount','vw-pet-shop'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','vw-pet-shop'); ?> ( <span><?php esc_html_e('vwten2018','vw-pet-shop'); ?></span> ) </h4>
			<div class="info-link">
				<a href="<?php echo esc_url( VW_PET_SHOP_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'vw-pet-shop' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">
		  <button class="tablinks" onclick="openCity(event, 'theme_lite')"><?php esc_html_e( 'Getting Started', 'vw-pet-shop' ); ?></button>		  
		  <button class="tablinks" onclick="openCity(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'vw-pet-shop' ); ?></button>
		  <button class="tablinks" onclick="openCity(event, 'free_pro')"><?php esc_html_e( 'Support', 'vw-pet-shop' ); ?></button>
		</div>

		<!-- Tab content -->
		<div id="theme_lite" class="tabcontent open">
			<h3><?php esc_html_e( 'Lite Theme Information', 'vw-pet-shop' ); ?></h3>
			<hr class="h3hr">
		  	<p><?php esc_html_e('VW Pet Shop is a WordPress theme presented by VowelWeb for designing a website or a blog related to Pets. This theme can be used for almost all the businesses related to animal care or shops. The theme can be used by pet shops, animal care, veterinary doctors, pet groomers, pet and animal bloggers, pet consultant, pet spa, animal accessories shop etc. It has a simple and interactive design which enables the user to seek the right solution to their problem without any hassle. It has personalised option to use it according to your need. Clean and secure codes are implemented using shortcodes. It is loaded with awesome features still it is a light-weight theme which loads fast. These all things contribute to making it a search engine optimized theme to get your site a higher place in search engines. This animal WordPress theme is responsive, cross-browser compatible, translation ready and has call to action button (CTA). Its social media icons will widen the reach of your site and its content and will help increase the influx of visitors to your site. It has a beautiful design to make your site stand apart from your competitors. These features combined make it an ideal pet WordPress theme.','vw-pet-shop'); ?></p>
		  	<div class="col-left-inner">
		  		<h4><?php esc_html_e( 'Theme Documentation', 'vw-pet-shop' ); ?></h4>
				<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'vw-pet-shop' ); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'vw-pet-shop' ); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Theme Customizer', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'vw-pet-shop'); ?></p>
				<div class="info-link">
					<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'vw-pet-shop'); ?></a>
				</div>
				<hr>				
				<h4><?php esc_html_e('Having Trouble, Need Support?', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'vw-pet-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'vw-pet-shop'); ?></a>
				</div>
				<hr>
				<h4><?php esc_html_e('Reviews & Testimonials', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'vw-pet-shop'); ?>  </p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'vw-pet-shop'); ?></a>
				</div>
		  		<div class="link-customizer">
					<h3><?php esc_html_e( 'Link to customizer', 'vw-pet-shop' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-format-image"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','vw-pet-shop'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-admin-customizer"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_shop_typography') ); ?>" target="_blank"><?php esc_html_e('Typography','vw-pet-shop'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-images-alt"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_shop_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Settings','vw-pet-shop'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-editor-table"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_shop_products') ); ?>" target="_blank"><?php esc_html_e('Pets Collection','vw-pet-shop'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-admin-links"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_shop_topbar') ); ?>" target="_blank"><?php esc_html_e('Topbar Section','vw-pet-shop'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-editor-aligncenter"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','vw-pet-shop'); ?></a>
							</div>
						</div>
						<div class="row-box">
							<div class="row-box1">
								<span class="dashicons dashicons-welcome-write-blog"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_shop_left_right') ); ?>" target="_blank"><?php esc_html_e('Blog Layout','vw-pet-shop'); ?></a>
							</div>
							<div class="row-box2">
								<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=vw_pet_shop_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','vw-pet-shop'); ?></a>
							</div>
						</div>
					</div>
				</div>
		  	</div>
			<div class="col-right-inner">
				<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','vw-pet-shop'); ?></h3>
			  	<hr class="h3hr">
				<p><?php esc_html_e('Follow these instructions to setup Home page.','vw-pet-shop'); ?></p>
                <ul>
                	<li><?php esc_html_e('1. Create a Page to set template:  Go to ','vw-pet-shop'); ?>
                  	<b><?php esc_html_e('Dashboard &gt;&gt; Pages &gt;&gt; Add New Page','vw-pet-shop'); ?></b>.
                  	<p><?php esc_html_e('Label it "home" or anything as you wish. Then select template "home-page" from template dropdown.','vw-pet-shop'); ?></p></li>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/home-page-template.png" alt="" />
                  	<p></p><span class="strong"><?php esc_html_e('2. Set the front page:','vw-pet-shop'); ?></span><?php esc_html_e(' Go to ','vw-pet-shop'); ?>
				  	<b><?php esc_html_e(' Settings -&gt; Reading --&gt; Set the front page display static page to home page ','vw-pet-shop'); ?></b></p>
                  	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/set-front-page.png" alt="" />
                  	<p><?php esc_html_e(' Once you are done with this, you can see all the demo content on front page. ','vw-pet-shop'); ?></p>
                </ul>
		  	</div>
		</div>	

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'vw-pet-shop' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('The premium pet WordPress theme is the best solution for all those dealing with animals in any form. It can be used for a blog, a website or for a portfolio. It can be used for businesses like pet shop, animal accessories shop, pet spa and pet food shop etc. You may also find it useful if you are a veterinary doctor, pet consultant, animal blogger, pet food consultant or an animal protection and welfare worker. It is a minimal theme with a beautiful and stunning design to attract users attention and compel them to use it and spend some good time on your site. Its easy navigation and clean design will give them a good user experience. It does not only show your products and services but also show your professionalism, expertise and sincerity in doing business effectively. Its testimonial section will be the proof of your credibility. Our experts have dedicatedly designed it to give maximum exposure to your work. It is so easy to tweak that you can kick start your business within minutes after purchasing it. No need to spend hours of your valuable time in making it look like you wished it to.','vw-pet-shop'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( VW_PET_SHOP_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'vw-pet-shop'); ?></a>
					<a href="<?php echo esc_url( VW_PET_SHOP_BUY_NOW ); ?>"><?php esc_html_e('Buy Pro', 'vw-pet-shop'); ?></a>
					<a href="<?php echo esc_url( VW_PET_SHOP_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'vw-pet-shop'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/vw-petshop.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'vw-pet-shop' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'vw-pet-shop'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'vw-pet-shop'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'vw-pet-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'vw-pet-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'vw-pet-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'vw-pet-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'vw-pet-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'vw-pet-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'vw-pet-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-pet-shop'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'vw-pet-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Contact us Page Template', 'vw-pet-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'vw-pet-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Blog Templates & Layout', 'vw-pet-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'vw-pet-shop'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Page Templates & Layout', 'vw-pet-shop'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'vw-pet-shop'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Full Documentation', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Latest WordPress Compatibility', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support 3rd Party Plugins', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Secure and Optimized Code', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Exclusive Functionalities', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Enable / Disable', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Google Font Choices', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Gallery', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Simple & Mega Menu Option', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Shortcodes', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Premium Membership', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Budget Friendly Value', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Priority Error Fixing', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Custom Feature Addition', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td><?php esc_html_e('All Access Theme Pass', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Seamless Customer Support', 'vw-pet-shop'); ?></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/w-arrow.png" alt="" /></td>
								<td class="table-img"><img src="<?php echo esc_url(get_template_directory_uri()); ?>/inc/get-started/images/right-arrow.png" alt="" /></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( VW_PET_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'vw-pet-shop'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'vw-pet-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'vw-pet-shop'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'vw-pet-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'vw-pet-shop'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'vw-pet-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'vw-pet-shop'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'vw-pet-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','vw-pet-shop'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Post-purchase Queries', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'vw-pet-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'vw-pet-shop'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-media-text"></span><?php esc_html_e('Theme Demo Content', 'vw-pet-shop'); ?></h4>
				<p> <?php esc_html_e('We are providing the demo content file within the theme folder.  You will require an importer plugin to import the demo content.', 'vw-pet-shop'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( VW_PET_SHOP_DEMO_DATA ); ?>" target="_blank"><?php esc_html_e('Demo Content', 'vw-pet-shop'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>