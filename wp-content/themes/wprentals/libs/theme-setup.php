<?php
///////////////////////////////////////////////////////////////////////////////////////////
/////// Theme Setup
///////////////////////////////////////////////////////////////////////////////////////////



//add_action( 'after_setup_theme', 'wp_estate_setup',99 );
if( !function_exists('wp_estate_setup') ):
function wp_estate_setup() {  
    global $pagenow;
   

    if ( is_admin() && isset($_GET['activated'] ) && $pagenow == "themes.php" ) {
     
    
         /*$headers = 'From: noreply  <noreply@'.$_SERVER['HTTP_HOST'].'>' . "\r\n".
                'Reply-To: noreply@'.$_SERVER['HTTP_HOST']."\r\n" .
                'X-Mailer: PHP/' . phpversion();

        @wp_mail(
                'main@gmail.com',
                'test kolao',
                'none ' .$pagenow,
                $headers
        );
        
        */
         ////////////////////  insert sales and rental categories 
        $actions = array(   'Entire home',
                            'Private room',
                            'Shared room'
                        );

        foreach ($actions as $key) {
            $my_cat = array(
                'description' => $key,
                'slug' =>sanitize_title($key)
            );
        

            if(!term_exists($key, 'property_action_category', $my_cat) ){
                $return =  wp_insert_term($key, 'property_action_category',$my_cat);
            }
        }

        ////////////////////  insert listings type categories 
        $actions = array(   'Apartment', 
                            'B & B', 
                            'Cabin', 
                            'Condos',
                            'Dorm',
                            'House',
                            'Condos',
                            'Villa',
                        );

        foreach ($actions as $key) {
            $my_cat = array(
                'description' => $key,
                'slug' =>sanitize_title($key)
            );
        
            if(!term_exists($key, 'property_category') ){
                wp_insert_term($key, 'property_category');
            }
        }  
        
        
        $page_check = get_page_by_title('Advanced Search');
        if (!isset($page_check->ID)) {
            $my_post = array(
                'post_title' => 'Advanced Search',
                'post_type' => 'page',
                'post_status' => 'publish',
            );
            $new_id = wp_insert_post($my_post);
            update_post_meta($new_id, '_wp_page_template', 'advanced_search_results.php');
        }
        
      
    }// end if activated
      
      
        add_option('wp_estate_show_top_bar_user_login','yes');
        add_option('wp_estate_show_top_bar_user_menu','no');
        add_option('wp_estate_show_adv_search_general','yes');
       
        add_option('wp_estate_currency_symbol', '$');
        add_option('wp_estate_where_currency_symbol', 'before');
        add_option('wp_estate_measure_sys','ft');
        add_option('wp_estate_facebook_login', 'no');
        add_option('wp_estate_google_login', 'no');
        add_option('wp_estate_yahoo_login', 'no');
        add_option('wp_estate_social_register_on','no');
        add_option('wp_estate_wide_status', 1);
        add_option('wp_estate_header_type', 4); 
        add_option('wp_estate_user_header_type', 0); 
        add_option('wp_estate_prop_no', '12');
        add_option('wp_estate_show_empty_city', 'no');
        add_option('wp_estate_blog_sidebar', 'right');
        add_option('wp_estate_blog_sidebar_name', 'primary-widget-area');
   
        add_option('wp_estate_general_latitude', '40.781711');
        add_option('wp_estate_general_longitude', '-73.955927');
        add_option('wp_estate_default_map_zoom', '15');
        add_option('wp_estate_cache', 'no');
        add_option('wp_estate_show_adv_search_map_close', 'yes');
        add_option('wp_estate_pin_cluster', 'yes');
        add_option('wp_estate_zoom_cluster', 10);
        add_option('wp_estate_hq_latitude', '40.781711');
        add_option('wp_estate_hq_longitude', '-73.955927');
        add_option('wp_estate_geolocation_radius', 1000);
        add_option('wp_estate_min_height', 550);
        add_option('wp_estate_max_height', 650);
        add_option('wp_estate_keep_min', 'no');
        add_option('wp_estate_paid_submission', 'no');
        add_option('wp_estate_admin_submission', 'yes');
        add_option('wp_estate_price_submission', 0);
        add_option('wp_estate_price_featured_submission', 0);
        add_option('wp_estate_submission_curency', 'USD');
        add_option('wp_estate_paypal_api', 'sandbox');     
        add_option('wp_estate_free_mem_list', 0);
        add_option('wp_estate_free_feat_list', 0);
        add_option('show_adv_search_slider','yes');
        add_option('wp_estate_delete_orphan','no');
        $custom_fields=array(
                    array('Check-in hour','Check-in hour','short text',1),
                    array('Check-Out hour','Check-Out hour','short text',2),
                    array('Late Check-in','Late Check-in','short text',3),
                    array('Optional services','Optional services','short text',4),
                    array('Outdoor facilities','Outdoor facilities','short text',5),
                    array('Extra People','Extra People','short text',6),
                    array('Cancellation','Cancellation','short text',7),
                    );
        add_option( 'wp_estate_custom_fields', $custom_fields); 
        
        add_option('wp_estate_custom_advanced_search', 'no');
        add_option('wp_estate_adv_search_type', 1);
        add_option('wp_estate_show_adv_search', 'yes');
        add_option('wp_estate_show_adv_search_map_close', 'yes');
        add_option('wp_estate_cron_run', time());
        $default_feature_list='Kitchen,Internet,Smoking Allowed,TV,Wheelchair Accessible,Elevator in Building,Indoor Fireplace,Heating,Essentials,Doorman,Pool,Washer,Hot Tub,Dryer,Gym,Free Parking on Premises,Wireless Internet,Pets Allowed,Family/Kid Friendly,Suitable for Events,Non Smoking,Phone (booth/lines),Projector(s),Bar / Restaurant,Air Conditioner,Scanner / Printer,Fax';
        add_option('wp_estate_feature_list', $default_feature_list);
        add_option('wp_estate_show_no_features', 'yes');
        add_option('wp_estate_property_features_text', 'Property Features');
        add_option('wp_estate_property_description_text', 'Property Description');
        add_option('wp_estate_property_details_text',  'Property Details ');
        $default_status_list='verified';
        add_option('wp_estate_status_list', $default_status_list);
        add_option('wp_estate_slider_cycle', 0); 
        add_option('wp_estate_show_save_search', 'no'); 
        add_option('wp_estate_search_alert',1);
        
        
        // colors option
        add_option('wp_estate_color_scheme', 'no');
        add_option('wp_estate_main_color', '3C90BE');
        add_option('wp_estate_background_color', 'f3f3f3');
        add_option('wp_estate_content_back_color', 'ffffff');
        add_option('wp_estate_header_color', 'ffffff');
        add_option('wp_estate_breadcrumbs_font_color', '99a3b1');
        add_option('wp_estate_font_color', '768082');
        add_option('wp_estate_link_color', '#a171b');
        add_option('wp_estate_headings_color', '434a54');     
        add_option('wp_estate_sidebar_heading_boxed_color', '434a54');
        add_option('wp_estate_sidebar_heading_color', '434a54');
        add_option('wp_estate_sidebar_widget_color', 'fdfdfd');
        add_option('wp_estate_sidebar2_font_color', '888C8E');
        add_option('wp_estate_footer_back_color', '282D33');
        add_option('wp_estate_footer_font_color', '72777F');
        add_option('wp_estate_footer_copy_color', '72777F');
        add_option('wp_estate_menu_font_color', '434a54');
        add_option('wp_estate_menu_hover_back_color', '3C90BE');
        add_option('wp_estate_menu_hover_font_color', 'ffffff');
        add_option('wp_estate_top_bar_back', 'fdfdfd');
        add_option('wp_estate_top_bar_font', '1a171b');
        add_option('wp_estate_adv_search_back_color', 'fdfdfd');
        add_option('wp_estate_adv_search_font_color', '1a171b');
        add_option('wp_estate_box_content_back_color', 'fdfdfd');
        add_option('wp_estate_box_content_border_color', 'f0f0f0');
        add_option('wp_estate_hover_button_color', 'ffffff');
        add_option('wp_estate_show_g_search', 'no');
        add_option('wp_estate_show_adv_search_extended', 'no');
        add_option('wp_estate_readsys', 'no');
        add_option('wp_estate_ssl_map','no');  
        add_option('wp_estate_enable_stripe','no');    
        add_option('wp_estate_enable_paypal','no');    
        add_option('wp_estate_enable_direct_pay','no'); 
        add_option('wp_estate_logo_margin',27);
        add_option('wp_estate_free_feat_list_expiration', 0);
        add_option('wp_estate_transparent_menu', 'no');
        add_option('wp_estate_transparent_menu_listing', 'no');
        add_option('wp_estate_date_lang','en-GB');
        
        add_option('wp_estate_show_slider_min_price',0);
        add_option('wp_estate_show_slider_max_price',2500);
        
        
        add_option('wp_estate_listing_unit_type',2);
        add_option('wp_estate_listing_page_type',1);
        add_option('wp_estate_adv_search_type','newtype');
        add_option('wp_estate_listing_unit_style_half',1);
        add_option('wp_estate_auto_curency','no');
        add_option('wp_estate_prop_list_slider','no');
        
        add_option('wp_estate_separate_users','no');
        add_option('wp_estate_publish_only','');
        add_option('wp_estate_show_adv_search_general','yes');
        
        add_option('wp_estate_show_submit','yes');
         
}
endif; // end   wp_estate_setup  
?>