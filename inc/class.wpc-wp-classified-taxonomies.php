<?php
 if( ! defined('ABSPATH') ){
    die;
}

if( ! class_exists( 'WPC_WP_Classified_Taxonomies' ) ){
  class WPC_WP_Classified_Taxonomies{
    function __construct(){
     add_action( 'init', array( $this, 'wpc_create_taxonomies') );
    }
    
   public function wpc_create_taxonomies(){
    

    //location

	$labels = [
		"name" => esc_html__( "Locations", "wp-classified" ),
		"singular_name" => esc_html__( "Location", "wp-classified" ),
	];

	
	$args = [
		"label" => esc_html__( "Locations", "wp-classified" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'wpc-listing-location', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "wpc-listing-location",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "wpc-listing-location", [ "wpc_wp_classifieds" ], $args );


    //Type
	$labels = [
		"name" => esc_html__( "Types", "wp-classified" ),
		"singular_name" => esc_html__( "Type", "wp-classified" ),
	];

	
	$args = [
		"label" => esc_html__( "Listing Types", "wp-classified" ),
		"labels" => $labels,
		"public" => true,
		"publicly_queryable" => true,
		"hierarchical" => true,
		"show_ui" => true,
		"show_in_menu" => true,
		"show_in_nav_menus" => true,
		"query_var" => true,
		"rewrite" => [ 'slug' => 'wpc-listing-type', 'with_front' => true, ],
		"show_admin_column" => false,
		"show_in_rest" => true,
		"show_tagcloud" => false,
		"rest_base" => "wpc-listing-type",
		"rest_controller_class" => "WP_REST_Terms_Controller",
		"rest_namespace" => "wp/v2",
		"show_in_quick_edit" => false,
		"sort" => false,
		"show_in_graphql" => false,
	];
	register_taxonomy( "wpc-listing-type", [ "wpc_wp_classifieds" ], $args );

    }
    
 }
}
