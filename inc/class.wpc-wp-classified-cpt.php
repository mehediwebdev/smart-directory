<?php
 if( ! defined('ABSPATH') ){
    die;
}

if( ! class_exists( 'WPC_WP_Classified_Cpt' ) ){
  class WPC_WP_Classified_Cpt{
    function __construct(){
     add_action( 'init', array( $this, 'wpc_create_post_type') );
    }
    
    public function wpc_create_post_type(){
        $labels = [
            "name" => esc_html__( "WP Classifieds", "wp-classified" ),
            "singular_name" => esc_html__( "wpclassified", "wp-classified" ),
            "singular_slug" => esc_html__( "wpc_wp_classifieds", "wp-classified" ),
            "menu_name" => esc_html__( "WP Classifieds", "wp-classified" ),
            "all_items" => esc_html__( "All Listings", "wp-classified" ),
            "add_new" => esc_html__( "Add New", "wp-classified" ),
            "add_new_item" => esc_html__( "Add New Listing", "wp-classified" ),
            "edit_item" => esc_html__( "Edit Listing", "wp-classified" ),
            "new_item" => esc_html__( "New Listing", "wp-classified" ),
            "featured_image" => esc_html__( "Listing Image", "wp-classified" ),
            "set_featured_image" => esc_html__( "Set Listing Image", "wp-classified" ),
            "remove_featured_image" => esc_html__( "Remove Listing Image", "wp-classified" ),
            "use_featured_image" => esc_html__( "Use Listing Image", "wp-classified" ),
            "archives" => esc_html__( "all-listings", "wp-classified" ),
        ];
    
        $args = [
            "label" => esc_html__( "WP Classifieds", "wp-classified" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "rest_namespace" => "wp/v2",
            "has_archive" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "menu_icon"=> 'dashicons-admin-home',
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "can_export" => true,
            "rewrite" => [ "slug" => "wpclassifieds", "with_front" => true ],
            "query_var" => true,
            "supports" => [ "title", "editor", "thumbnail" ],
            "taxonomies" => [ "category", "post_tag" ],
            "show_in_graphql" => false,
        ];
    
        register_post_type( "wpc_wp_classifieds", $args );
    }

 }
}
