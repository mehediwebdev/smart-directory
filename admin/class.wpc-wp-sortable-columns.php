<?php
if (!defined('ABSPATH')) {
    die;
}

if (!class_exists('WPC_WP_Sortable_Columns')) {
    class WPC_WP_Sortable_Columns
    {
        public function __construct()
        {
            add_filter('manage_wpc_wp_classifieds_posts_columns', array($this, 'wpc_create_sortable_columns'));
            add_action('manage_wpc_wp_classifieds_posts_custom_column', array($this, 'wpc_custom_columns'), 10, 2);
        }

        public function wpc_create_sortable_columns($columns)
        {
            $columns['wpc-listing-location'] = 'Listing Location';
            $columns['wpc-listing-type'] = 'Listing Type'; // Corrected column key
            return $columns;
        }

        public function wpc_custom_columns($column, $post_id)
        {
            global $post; // Declare the global $post object

            switch ($column) {
                case 'wpc-listing-location':
                    $wpc_location = get_the_terms($post_id, 'wpc-listing-location', true);
              
                    foreach($wpc_location as $item){
                      echo $item->name . ', ';
                    }
                    break;

                case 'wpc-listing-type': // Corrected column key
                    $wpc_listing_type = get_the_terms($post_id, 'wpc-listing-type', true); // Corrected variable name

    
                  foreach($wpc_listing_type as $item){
                    echo $item->slug;
                  }
                    break;
            }
        }
    }
}
