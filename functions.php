<?php
		
//add thumbnails support
	add_theme_support( 'post-thumbnails' );
	
//add menus support
	register_nav_menus( array(
		'primary' => __( 'Primary Navigation', '' ),
		'footer' => __( 'Footer Navigation', '' ),
	));
/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  

// Define the style_formats array
	$style_formats = array(  
		// Each array child is a format with it's own settings
		array(  
			'title' => 'blue h1',  
			'block' => 'span',  
			'classes' => 'blueh1',
			'wrapper' => true,
			
		), 
		array(  
			'title' => 'white h1',  
			'block' => 'span',  
			'classes' => 'whiteh1',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'blue h2',  
			'block' => 'span',  
			'classes' => 'blueh2',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'white h2',  
			'block' => 'span',  
			'classes' => 'whiteh2',
			'wrapper' => true,
			
		),
		array(  
			'title' => 'white text',  
			'block' => 'span',  
			'classes' => 'white-text',
			'wrapper' => true,
			
		), 
		array(  
			'title' => 'blue-button',  
			'block' => 'span',  
			'classes' => 'blue-button',
			'wrapper' => true,
			
		), 
	);  
	// Insert the array, JSON ENCODED, into 'style_formats'
	$init_array['style_formats'] = json_encode( $style_formats );  
	
	return $init_array;  
  
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );

/*
* Walker class to change default wp nav menu form
*/

class Bootstrap_Walker_Nav_Menu extends Walker_Nav_Menu {
 
  /**
   * Display Element
   */
  function display_element( $element, &$children_elements, $max_depth, $depth, $args, &$output ) {
    $id_field = $this->db_fields['id'];
 
    if ( isset( $args[0] ) && is_object( $args[0] ) )
    {
      $args[0]->has_children = ! empty( $children_elements[$element->$id_field] );
    }
    
    return parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
  }
 
  /**
   * Start Element
   */
  function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
    if ( is_object($args) && !empty($args->has_children) )
    {
      $link_after = $args->link_after;
      $args->link_after = ' <b class="caret"></b>';
    }
 
    parent::start_el($output, $item, $depth, $args, $id);
 
    if ( is_object($args) && !empty($args->has_children) )
      $args->link_after = $link_after;
  }
 
  /**
   * Start Level
   */
  function start_lvl( &$output, $depth = 0, $args = array() ) {
    $indent = str_repeat("t", $depth);
    $output .= "\n$indent<ul class=\"dropdown-menu list-unstyled\">\n";
  }
} //end class Bootstrap_Walker_Nav_Menu

add_filter('nav_menu_link_attributes', function($atts, $item, $args) {
  if ( $args->has_children )
  {
    $atts['data-toggle'] = 'dropdown';
    $atts['class'] = 'dropdown-toggle';
  }
 
  return $atts;
}, 10, 3);


//Add Theme settings support
if( function_exists('acf_add_options_page') ) {	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	)); 
	 
	
} 
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Review', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Post Type Review', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Reviews', 'text_domain' ),
		'name_admin_bar'        => __( 'Reviews', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Reviews', 'text_domain' ),
		'add_new_item'          => __( 'Add New Review', 'text_domain' ),
		'add_new'               => __( 'Add New Review', 'text_domain' ),
		'new_item'              => __( 'New Review', 'text_domain' ),
		'edit_item'             => __( 'Edit Review', 'text_domain' ),
		'update_item'           => __( 'Update Review', 'text_domain' ),
		'view_item'             => __( 'View Reviews', 'text_domain' ),
		'search_items'          => __( 'Search Reviews', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Reviews list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Post Type Review', 'text_domain' ),
		'description'           => __( 'Customer\'s Review', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'trackbacks', 'revisions', 'custom-fields', 'page-attributes', 'post-formats', ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,		
		'exclude_from_search'   => true,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
	);
	register_post_type( 'review', $args );

}
add_action( 'init', 'custom_post_type', 0 );

//Functionn to replace default select text
function replace_default_strings($text) {
	$search = array(
		'Select Category',   
	);
	$replace = array(
		'What type of boat?',   
	);
return str_replace($search, $replace, $text);
}
?>