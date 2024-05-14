<?php
/*
 * Plugin Name:       WP Classified
 * Plugin URI:        
 * Description:       WP Classified is a classified  or directory plugin.
 * Version:           1.0.0
 * Requires at least: 6.2
 * Requires PHP:      7.2
 * Author:            Mehedi Hasan
 * Author URI:        
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        
 * Text Domain:       wp-classified
 * Domain Path:       /languages
 */

 if( ! defined('ABSPATH') ){
    die;
}

if( ! class_exists( 'WPC_WP_Classified' ) ){
  class WPC_WP_Classified{
    function __construct(){
        $this->define_constant();
       //$this->load_textdomain();
      require_once( WPC_WP_CLASSIFIED_PATH . 'inc/class.wpc-wp-classified-cpt.php' );
      $wpc_wp_classified_cpt = new WPC_WP_Classified_Cpt();

      require_once( WPC_WP_CLASSIFIED_PATH . 'inc/class.wpc-wp-classified-taxonomies.php' );
      $wpc_wp_classified_taxonomies = new WPC_WP_Classified_Taxonomies();

      require_once( WPC_WP_CLASSIFIED_PATH . 'admin/class.wpc-wp-sortable-columns.php' );
      $wpc_wp_sortable_columns = new WPC_WP_Sortable_Columns();

      require_once( WPC_WP_CLASSIFIED_PATH . 'admin/class.wpc-wp-shortcode-cpt.php' );
      $wpc_wp_shortcode_cpt = new WPC_WP_Shortcode_Cpt();
      
    }
    public function define_constant(){
       define( 'WPC_WP_CLASSIFIED_PATH', plugin_dir_path( __FILE__ ) );
       define( 'WPC_WP_CLASSIFIED_URL', plugin_dir_url( __FILE__ ) );
       define( 'WPC_WP_CLASSIFIED_VERSION', '1.0.0' );
    }
    public static function activate(){
		update_option( 'rewrite_rules', '' );
    }

    public static function deactivate(){
      flush_rewrite_rules();
    }
   public static function uninstall(){
      
   }
  // public function load_textdomain(){
    // load_plugin_textdomain(
     // 'wp-classified',
     // false,
      //dirname( plugin_basename( __FILE__ ) ) . '/languages/'
     //);
  // }


  }
}

if( class_exists( 'WPC_WP_Classified' ) ){

   register_activation_hook( __FILE__, array( 'WPC_WP_Classified', 'activate') );
   register_deactivation_hook( __FILE__, array( 'WPC_WP_Classified', 'deactivate') );
   register_uninstall_hook( __FILE__, array( 'WPC_WP_Classified', 'uninstall') );

   $wpc_wp_classified = new WPC_WP_Classified();
}