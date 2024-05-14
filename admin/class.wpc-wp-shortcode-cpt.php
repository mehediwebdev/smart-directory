<?php
 if( ! defined('ABSPATH') ){
    die;
}

if( ! class_exists( 'WPC_WP_Shortcode_Cpt' ) ){
  class WPC_WP_Shortcode_Cpt{
    function __construct(){
       add_shortcode( 'wpc_wp_cpt', array( $this, 'add_shortcode' ) );
    }


    public function add_shortcode( $atts = array(), $content = null, $tag = '' ){

        $atts = array_change_key_case( (array) $atts, CASE_LOWER);

        extract( shortcode_atts(
            array(
               'id' => '',
               'orderby' => 'date'
            ),
            $atts,
            $tag
        ) );

        if( !empty ( $id )){
           //$id = array_map( 'absint', explode( ',' $id ));
        }

        ob_start();
      // return 'test';
    

        require_once( WPC_WP_CLASSIFIED_PATH . 'views/wpc-wp-shortcode-views.php' );
        return ob_get_clean();
    
    }
    
 }
}
