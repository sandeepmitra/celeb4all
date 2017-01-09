<?php
// Template Name: User Dashboard
// Wp Estate Pack
if ( !is_user_logged_in() ) {   
    wp_redirect(  esc_html( home_url() ) );exit();
} 

if ( !wpestate_check_user_level()){
   wp_redirect(  esc_html( home_url() ) );exit(); 
}

$current_user = wp_get_current_user();
$userID                         =   $current_user->ID;
$user_login                     =   $current_user->user_login;
$user_pack                      =   get_the_author_meta( 'package_id' , $userID );
$user_registered                =   get_the_author_meta( 'user_registered' , $userID );
$user_package_activation        =   get_the_author_meta( 'package_activation' , $userID );   
$paid_submission_status         =   esc_html ( get_option('wp_estate_paid_submission','') );
$price_submission               =   floatval( get_option('wp_estate_price_submission','') );
$submission_curency_status      =   esc_html( get_option('wp_estate_submission_curency','') );
$edit_link                      =   wpestate_get_dasboard_edit_listing();
$floor_link                     =   '';
$processor_link                 =   wpestate_get_procesor_link();
 $th_separator                  =   get_option('wp_estate_prices_th_separator','');
if( isset( $_GET['delete_id'] ) ) {
    if( !is_numeric($_GET['delete_id'] ) ){
        exit('you don\'t have the right to delete this');
    }else{
        $delete_id= intval ( $_GET['delete_id']);
        $the_post= get_post( $delete_id); 
        if( $current_user->ID != $the_post->post_author ) {
            exit('you don\'t have the right to delete this');;
        }else{
            // delete attchaments
            $arguments = array(
                'numberposts'   => -1,
                'post_type'     => 'attachment',
                'post_parent'   => $delete_id,
                'post_status'   => null,
                'exclude'       => get_post_thumbnail_id(),
                'orderby'       => 'menu_order',
                'order'         => 'ASC'
            );
            $post_attachments = get_posts($arguments);
            
            foreach ($post_attachments as $attachment) {
                wp_delete_post($attachment->ID);                      
            }
            wp_delete_post( $delete_id ); 
        }  
    }
}  
  
get_header();
$options=wpestate_page_details($post->ID);
?> 
    
<div class="row is_dashboard">
    <?php
    if( wpestate_check_if_admin_page($post->ID) ){
        if ( is_user_logged_in() ) {   
            get_template_part('templates/user_menu'); 
        }  
    }
    ?> 
    
    <div class=" dashboard-margin">
        
        <div class="dashboard-header">
            <?php if (esc_html( get_post_meta($post->ID, 'page_show_title', true) ) != 'no') { ?>
                <h1 class="entry-title listings-title-dash"><?php the_title(); ?></h1>
            <?php } ?>
        </div>    
        
        
        
        
        
        <div class="row admin-list-wrapper flex_wrapper_list">    
        <?php
        $prop_no      =   intval( get_option('wp_estate_prop_no', '') );
        $paged        = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = array(
                'post_type'        =>  'estate_property',
                'author'           =>  $current_user->ID,
                'paged'             => $paged,
                'posts_per_page'    => $prop_no,
                'post_status'      =>  array( 'any' )
            );


        $prop_selection = new WP_Query($args);
        if( !$prop_selection->have_posts() ){
            print '<h4 class="no_list_yet">'.esc_html__( 'You don\'t have any properties yet!','wpestate').'</h4>';
        }

        while ($prop_selection->have_posts()): $prop_selection->the_post();          
            get_template_part('templates/dashboard_listing_unit'); 
        endwhile;
        
        kriesi_pagination($prop_selection->max_num_pages, $range =2);
        ?>    
        </div>
    </div>
</div>  

<?php 
wp_reset_query();
get_footer(); 
?>