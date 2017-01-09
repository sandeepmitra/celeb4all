<?php
// Template Name: User Dashboard My Reservations
// Wp Estate Pack
if ( !is_user_logged_in() ) {   
    wp_redirect(  esc_html( home_url() ) );exit();
} 


global $user_login;
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
$processor_link                 =   wpestate_get_procesor_link();
$where_currency                 =   esc_html( get_option('wp_estate_where_currency_symbol', '') );
$currency                       =   esc_html( get_option('wp_estate_submission_curency', '') );
$options                        =   wpestate_page_details($post->ID);
get_header();
?> 
  
<div class="row is_dashboard">
    <?php
    if( wpestate_check_if_admin_page($post->ID) ){
        if ( is_user_logged_in() ) {   
            get_template_part('templates/user_menu'); 
        }  
    }
    ?> 
    
    <div class="dashboard-margin">
        <div class="dashboard-header">
            <?php if (esc_html( get_post_meta($post->ID, 'page_show_title', true) ) != 'no') { ?>
                <h1 class="entry-title listings-title-dash"><?php the_title(); ?></h1>
            <?php } ?>
        </div>    
        
        <div class="row admin-list-wrapper booking_list">   
        <?php
        wp_reset_query();
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type'         => 'wpestate_booking',
                'post_status'       => 'publish',
                'paged'             => $paged,
                'posts_per_page'    => 30,
                'order'             => 'DESC',
                'author'            =>  $userID    
             );
            $book_selection = new WP_Query($args);
            if ( $book_selection->have_posts() ){
                while ($book_selection->have_posts()): $book_selection->the_post(); 
                    $booking_id    =    get_post_meta($post->ID, 'booking_id', true);
                    $listing_owner =    wpsestate_get_author($booking_id);
                    if ( $userID != $listing_owner){
                        get_template_part('templates/book-listing-user-unit');  
                    }
                endwhile;
                kriesi_pagination($book_selection->max_num_pages, $range =2);
            }else{
                print '<h4 class="no_favorites">'.esc_html__( 'You don\'t have any reservations made!','wpestate').'</h4>';
            } 
            wp_reset_query();
        ?>
        </div>
    </div>
</div>  

<?php 
wp_reset_query();
get_footer(); 
?>