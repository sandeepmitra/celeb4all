<?php 
/*
Template Name: Celeb Profile
*/
get_header();



$loginuserID              = um_profile_id();

//$loginuserID            = $currentuserid->ID;

$loginUsername            = get_user_meta( $loginuserID, 'nickname', true );

$profile_img              = get_user_meta( $loginuserID, 'custom_picture', true );

$livein                   = get_user_meta( $loginuserID, 'live_in', true );

$speak                    = get_user_meta( $loginuserID, 'i_speak', true );

$price                    = get_user_meta( $loginuserID, 'celleb_price', true );

$description              = get_user_meta( $loginuserID, 'celleb_description', true );

$heading                  = get_user_meta( $loginuserID, 'celleb_heading', true );

$img_gal                  = get_user_meta( $loginuserID, 'celleb_img_gallery', true );

$main_img_gallery         = get_user_meta( $loginuserID, 'img_gallery', true );

$videourlembed            = get_user_meta( $loginuserID, 'video_youtube_url', true );

$video_embed              = str_replace( 'https://www.youtube.com/watch?v=', '', $videourlembed );

$main_audio_gallery       = get_user_meta($loginuserID, 'audio_gallery', true);

$userdata                 = get_userdata( $loginuserID );

$currentuseridd          = wp_get_current_user(); // get current user data


//print_r( $currentuseridd );

//$loginUsername          = $currentuserid->user_login;

/*echo '<pre>'; 
print_r($userdata);
echo '</pre>';*/

//implode(',', $userdata->roles);

if( $userdata->roles[0] == 'subscriber' ) {

  do_action('inforain_redirect_role');
}

?>
<style type="text/css">
  .content_wrapper {
    width: 100%;
  }
</style>
<div class="content_wrapper listing_wrapper  row ">
  <div style="padding-left: 0; padding-right: 0;" class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="owner-page-wrapper">
          <div class="owner-page-wrapper-inside row">
            <div class="col-md-2">
              <?php
              $img_gallery = substr( $img_gal, 0, -1 );
              $imggal      = explode( ',', $img_gallery );
              foreach ( $imggal as $value ) {
              ?>
              <div class="owner-image-container" style="background-image: url('<?php echo wp_get_attachment_url($value); ?>');">
              </div>
              <?php } ?>
            </div>
            <div class="col-md-10">
              <h1 class="entry-title-agent">
                <?php echo $loginUsername; ?>
                <input style="display: none; color: #000; width: 200px; background-color: transparent;" type="text" id="edit_heading_val" value="<?php echo $loginUsername; ?>">
                
              </h1>
              <p> 
              <i class="fa fa-users" aria-hidden="true"></i> 
              <?php
              $cate = [];
              foreach( $userdata->caps as $key => $value ) {
                $cate[] = $key;
              }
              echo implode(',', $cate);
              ?>
              </p>
              <div class="property_ratings_agent">
                <i class="fa fa-star-o">
                </i>
                <i class="fa fa-star-o">
                </i>
                <i class="fa fa-star-o">
                </i>
                <i class="fa fa-star-o">
                </i>
                <i class="fa fa-star-o">
                </i>                       
                <span class="owner_total_reviews">(0)
                </span>
              </div>
              <div class="agent_menu">
                <div class="agent_general_details">
                  <span class="property_menu_item_title">
                    <span class="contact_title">
                      <i class="fa fa-map-marker">
                      </i>
                    </span>   
                    <span id="livein">
                      <?php echo ($livein ? $livein : 'Not set'); ?>
                    </span>
                    <input style="display: none; color: #000; width: 200px; background-color: transparent;" type="text" id="edit_live_val" value="<?php echo $livein; ?>">
                    <!-- <i class="fa fa-pencil" id="span_edit_live" style="cursor: pointer;" aria-hidden="true">
                    </i>
                    <i class="fa fa-check" id="span_save_live" style="cursor: pointer; display: none;" aria-hidden="true">
                    </i> -->          
                  </span>
                  <span class="property_menu_item_title">
                    <span class="contact_title">
                      <i class="fa fa-microphone" aria-hidden="true">
                      </i>
                    </span>
                    <?php echo ($speak ? $speak : 'Not set'); ?>       
                  </span>
                  <span style="font-size: 25px;" class="property_menu_item_title">
                    <span class="contact_title">
                      <i class="fa fa-usd" aria-hidden="true">
                      </i>
                    </span>
                    <?php echo ($price ? $price : 'Not set'); ?>       
                  </span>
                </div>    
              </div>  
              <div class="agent_personal_details" id="about_me">
              </div>

              <?php if( $currentuseridd->ID == $loginuserID ): ?>
              <a href="<?php echo get_site_url(); ?>/edit-profile/?q=<?php echo $loginuserID; ?>">
                <div id="contact_me_long_owner" class="owner_read_more" data-postid="237">Edit Profile
                </div>
              </a>
            <?php endif; ?>

            </div>   
          </div> 
        </div>
        <!------------------------------------ end -------------------------------------------------------->
      </div>
    </div>
  </div>
  <div class="row content-fixed-listing listing_type_1">
    <div class=" col-md-8  ">
      <span class="entry-title listing_loader_title">Your search results
      </span>
      <div class="loader-inner ball-pulse" id="internal-loader">
        <div class="double-bounce1">
        </div>
        <div class="double-bounce2">
        </div>
      </div>
      <div id="listing_ajax_container">
      </div>
      <div class="single-content listing-content">
        <h1 class="entry-title entry-prop">
          <?php echo ($heading ? $heading : 'not set'); ?>
          <span class="property_ratings">
          </span> 
        </h1>
        <div class="listing_main_image_location">
          <?php echo ($livein ? $livein : 'Not set'); ?>
        </div>   
        <div class="panel-wrapper imagebody_wrapper">
          <div class="panel-body imagebody imagebody_new">
            <div id="carousel-listing" class="carousel slide post-carusel carouselvertical" data-ride="carousel" data-interval="false">
              <div class="carousel-inner">
                <?php
                $img_gallery2 = substr( $main_img_gallery, 0, -1 );
                $imggal       = explode( ',', $img_gallery2 );
                foreach ( $imggal as $value ):
                ?>
                <div class="item active">
                  <a href="<?php echo wp_get_attachment_url($value); ?>" rel="data-fancybox-thumb" class="fancybox-thumb">
                    <img src="<?php echo wp_get_attachment_url($value); ?>" data-original="<?php echo wp_get_attachment_url($value); ?>" alt="" class="img-responsive">
                  </a>
                </div>
                <?php endforeach; ?>
                <a class="left vertical carousel-control" href="#carousel-listing" data-slide="prev">
                  <i class="fa fa-angle-left">
                  </i>
                </a>
                <a class="right vertical carousel-control" href="#carousel-listing" data-slide="next">
                  <i class="fa fa-angle-right">
                  </i>
                </a>
              </div>
              <div class="carousel-indicators-wrapper">
                <ol id="carousel-indicators-vertical">
                  <?php foreach ( $imggal as $value ): ?>
                  <li data-target="#carousel-listing" data-slide-to="1" class=" active ">
                    <div class="img_listings_overlay img_listings_overlay_last">
                    </div>
                    <img src="<?php echo wp_get_attachment_url($value); ?>" alt="slider">
                  </li>
                  <?php endforeach; ?>
                </ol>
              </div>   
            </div>
          </div> 
        </div>

        <div id="listing_description">
          <h4 class="panel-title-description">Videos
          </h4>
          <div class="panel-bodty">
            <?php
            $video_embedd  = substr($video_embed, 0, -1);
            $video_explode = explode( ',',  $video_embedd);
            if( $video_embedd <> '' ) {
            foreach( $video_explode as $video_embed_uri ) { 
            ?>
            <div class="col-md-6">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_embed_uri; ?>" frameborder="0" allowfullscreen></iframe>
            </div>
            <?php } } ?>
          </div>
        </div>

        <div id="listing_description">
          <h4 class="panel-title-description">Audio
          </h4>
          <div class="panel-bodty" style="width: 700px;">
            <?php
            $substr_audio_gallery = substr($main_audio_gallery, 0, -1);
            if ( $substr_audio_gallery <> '' ) {
              $explode_gallery = explode(',', $substr_audio_gallery);
              foreach ( $explode_gallery as $key => $gallery_audio_thumbnail ) {
                $attr = array(
              'src'      => wp_get_attachment_url( $gallery_audio_thumbnail ),
              'loop'     => 'off',
              'autoplay' => '0',
              'preload'  => 'none'
              );
              echo '<div class="col-md-6"' . wp_audio_shortcode( $attr ) . '</div>';
              }
            }
            ?>
          </div>
        </div>


        <div id="listing_description">
          <h4 class="panel-title-description">About Me
          </h4>
          <div class="panel-bodty">
            <?php echo ($description ? $description : 'not set'); ?>
          </div>
        </div>


        

        <p>&nbsp;
        </p>
        <div class="property_page_container ">
          <h3 class="panel-title" id="listing_calendar">Availability
          </h3>
          <div id="show-next-month" data-toggle="calendar">
          </div>
        </div>    
      </div>
      <!-- end single content -->
    </div>
    <!-- end 8col container-->
    <div class="clearfix visible-xs">
    </div>
    <div class=" 
                col-md-4  
                widget-area-sidebar listingsidebar2 listing_type_1" id="primary">
      <div class="listing_main_image_price">
        $
        <?php echo ($price ? $price : 'not set'); ?>
      </div>
      <div class="booking_form_request" id="booking_form_request">
        <div id="booking_form_request_mess">
        </div>
        <h3>Book Now
        </h3>
        <div class="">
          <input type="text" id="datepicker" placeholder="Check in" class="form-control" size="40" name="start_date" value="">
        </div>
        <div class="">
          <input type="text" id="datepicker_end_date" placeholder="Check Out" class="form-control" size="40" name="end_date" value="">
        </div>
        <div class="">
          <select class="form-control" id="guest_booking">
          <option selected="" value="">Select Guest</option>
            <?php for( $s=1;$s<=10;$s++ ): ?>
              <option value="<?php echo $s; ?>"><?php echo $s; ?> guests</option>
            <?php endfor; ?>
          </select>
        </div>
        <p class="full_form " id="add_costs_here">
        </p>            
        <input type="hidden" id="listing_edit" name="listing_edit" value="239">
        <div class="submit_booking_front_wrapper">
          <input type="submit" id="submit_booking_front" data-maxguest="" data-overload="0" data-guestfromone="0" class="wpb_btn-info wpb_btn-small wpestate_vc_button  vc_button" value="Book Now">
          <input type="hidden" id="security-register-booking_front" name="security-register-booking_front" value="c7a112899e">
          <input type="hidden" name="_wp_http_referer" value="/propertiess/lorem-lipsum/">
        </div>
        <div class="third-form-wrapper">
          <!--<div class="col-md-6 reservation_buttons">
            <div id="add_favorites" class=" isnotfavorite" data-postid="239">
              Add to Favorites
            </div>                 
          </div> -->
          <div class="col-md-12 reservation_buttons">
            <div id="contact_host" class="col-md-6" data-postid="239">
              Contact Owner
            </div>  
          </div>
        </div>
        <!--<div class="prop_social">
          <span class="prop_social_share">Share
          </span>
          <a href="http://www.facebook.com/sharer.php?u=http://celeb4all.inforain.in/propertiess/lorem-lipsum/&amp;t=Lorem+Lipsum" target="_blank" class="share_facebook">
            <i class="fa fa-facebook fa-2">
            </i>
          </a>
          <a href="http://twitter.com/home?status=Lorem+Lipsum+http%3A%2F%2Fceleb4all.inforain.in%2Fpropertiess%2Florem-lipsum%2F" class="share_tweet" target="_blank">
            <i class="fa fa-twitter fa-2">
            </i>
          </a>
          <a href="https://plus.google.com/share?url=http://celeb4all.inforain.in/propertiess/lorem-lipsum/" onclick="javascript:window.open(this.href,'', 'menubar=no,toolbar=no,resizable=yes,scrollbars=yes,height=600,width=600');return false;" target="_blank" class="share_google">
            <i class="fa fa-google-plus fa-2">
            </i>
          </a> 
          <a href="http://pinterest.com/pin/create/button/?url=http://celeb4all.inforain.in/propertiess/lorem-lipsum/&amp;media=http://celeb4all.inforain.in/wp-content/uploads/2017/01/demo384-1920x790.jpg&amp;description=Lorem+Lipsum" target="_blank" class="share_pinterest"> 
            <i class="fa fa-pinterest fa-2">
            </i> 
          </a>      
        </div>  -->           
      </div>
      <!-- <div class="owner_area_wrapper_sidebar">
</div> -->
    </div>
  </div>   
</div>
<?php
get_footer();
?>