<?php 
/*
Template Name: User Profile
*/
get_header();

//$currentuserid          = wp_get_current_user();

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
                </h1>
                <p><?php echo ( $userdata->roles[0] == 'subscriber' ? 'Member' : '' ) ?></p>
              
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
                  
                </div>    
              </div>  
              <div class="agent_personal_details" id="about_me">
              </div>
              <a href="<?php echo get_site_url(); ?>/edit-profile/?q=<?php echo $loginuserID; ?>">
                <div id="contact_me_long_owner" class="owner_read_more" data-postid="237">Edit Profile
                </div>
              </a>
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
      






      <!-- end single content -->
    </div>
    <!-- end 8col container-->
    <div class="clearfix visible-xs">
    </div>
    
  </div>   
</div>
<?php
get_footer();
?>