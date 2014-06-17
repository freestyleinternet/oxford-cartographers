<?php

/****************************************
Theme Setup
*****************************************/

require_once( get_template_directory() . '/lib/init.php' );
require_once( get_template_directory() . '/lib/theme-helpers.php' );
require_once( get_template_directory() . '/lib/theme-functions.php' );
require_once( get_template_directory() . '/lib/theme-comments.php' );


/****************************************
Require Plugins
*****************************************/

require_once( get_template_directory() . '/lib/class-tgm-plugin-activation.php' );
require_once( get_template_directory() . '/lib/theme-require-plugins.php' );

add_action( 'tgmpa_register', 'mb_register_required_plugins' );


/****************************************
Misc Theme Functions
*****************************************/
// add featured image support
function custom_image_sizes() {
    add_theme_support('post-thumbnails');
	add_image_size('slide', 480, 370, TRUE);
	add_image_size('slidesub', 620, 250, TRUE);
	add_image_size('slidecasestudy', 960, 376, TRUE);
    add_image_size('quotefeature', 220, 156, TRUE);
	add_image_size('customthumb', 670, 9999, TRUE);
	add_image_size('newsthumb', 140, 99, TRUE);
	add_image_size('person', 160, 999, TRUE);
	add_image_size('smallthumb', 60, 40, TRUE);
	add_image_size('medthumb', 70, 40, TRUE);
	add_image_size('iso', 68, 52, TRUE);
}
add_action('after_setup_theme', 'custom_image_sizes');

/**
 * Define custom post type capabilities for use with Members
 */
function mb_add_post_type_caps() {
	// mb_add_capabilities( 'portfolio' );
}

/**
 * Allow SVG file upload in Wordpress Admin area
 */
function cc_mime_types( $mimes ){
	$mimes['svg'] = 'image/svg+xml';
	return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );


/**
 * Use same template for all services pages
 */
$page_children = get_pages('child_of=15');
foreach($page_children as $child){
	$current_page_template = get_post_meta($child->ID,'_wp_page_template',true);
	if($current_page_template != 'page-our-services-single.php') update_post_meta($child->ID,'_wp_page_template','page-our-services-single.php');
}

function the_url( $url ) {
    return get_bloginfo( 'url' );
}
 
add_filter( 'login_headerurl', 'the_url' );

/**
 * Blog search function to search blog only
 */
function SearchFilter($query) {
    if ($query->is_search) {
        $query->set('post_type', 'post');
    }
    return $query;
}
add_filter('pre_get_posts','SearchFilter');

/**
 * Filter Yoast SEO Metabox Priority
 */
add_filter( 'wpseo_metabox_prio', 'mb_filter_yoast_seo_metabox' );
function mb_filter_yoast_seo_metabox() {
	return 'low';
}

// truncate function
function truncate($string, $limit, $break=" ", $pad="...")
{
	// Remove any formatting first
	$string = strip_tags($string);
	if(strlen($string) <= $limit) return $string;
	if(false !== ($breakpoint = strpos($string, $break, $limit)))
	{
		if($breakpoint < strlen($string) - 1)
		{
			$string = substr($string, 0, $breakpoint) . $pad;
		}
	}
	return $string;
}

 /*-----------------------------------------------------------------------------------*/
/* Custom post type added by Annemarie
/*-----------------------------------------------------------------------------------*/
add_action('init', 'feature_init');
function feature_init() 
{
	//Default arguments
	$args = array
	(
		'public' 						=> true,
		'publicly_queryable'		=> true,
		'show_ui' 			   		=> true, 
		'query_var' 			 	=> true,
		'rewrite' 			   		=> true,
		'capability_type' 	   		=> 'post',
		'has_archive' 		   		=> true, 
		'hierarchical' 		  		=> false,
		'menu_position' 		 	=> NULL,
	);
	
	/* ----------------------------------------------------
	Our People
	---------------------------------------------------- */
	
	$labels = array
	(
		'name'						=> 'Our People',
		'singular_name' 			=> 'Our People',
		'add_new' 			  		=> _x('Add New', 'Person'),
		'add_new_item' 		 	=> 'Add Person',
		'edit_item' 					=> 'Edit Person',
		'new_item' 			 	=> 'New Person',
		'view_item' 				=> 'View People',
		'search_items' 		 	=> 'Search People',
		'not_found' 				=> 'No People found',
		'not_found_in_trash'  => 'No People found in Trash',
		'parent_item_colon' 	=> '',
		'menu_name' 				=> 'Our People'
	);
	
	$args['labels'] 				= $labels;
	$args['supports'] 		  	= array('title','editor','thumbnail');
	$args['rewrite']		   		= array('slug' => 'people');
	$args['menu_icon']		 	= get_bloginfo('template_directory').'/assets/images/people-admin.png';
	$args['show_in_menu']	= true;
	$args['has_archive']	    = true;
	
	register_post_type('people', $args);
	
	flush_rewrite_rules();
	
	/* ----------------------------------------------------
	Case Studies
	---------------------------------------------------- */
	
	$labels = array
	(
		'name'						=> 'Case Studies',
		'singular_name' 			=> 'Case Study',
		'add_new' 			  		=> _x('Add New', 'Case Study'),
		'add_new_item' 		 	=> 'Add Case Study',
		'edit_item' 					=> 'Edit Case Study',
		'new_item' 			 	=> 'New Case Study',
		'view_item' 				=> 'View Case Studies',
		'search_items' 		 	=> 'Search Case Studies',
		'not_found' 				=> 'No Case Studies found',
		'not_found_in_trash'  => 'No Case Studies found in Trash',
		'parent_item_colon' 	=> '',
		'menu_name' 				=> 'Case Studies'
	);
	
	$args['labels'] 				= $labels;
	$args['supports'] 		  	= array('title','editor','thumbnail');
	$args['rewrite']		   		= array('slug' => 'casestudies');
	$args['menu_icon']		 	= get_bloginfo('template_directory').'/assets/images/casestudy-admin.png';
	$args['show_in_menu']	= true;
	$args['has_archive']	    = true;
	
	register_post_type('casestudies', $args);
	
	flush_rewrite_rules();
}
