<?php 
/*
Template Name: Edit Celleb profile
*/
get_header();

$currentuserid                  = wp_get_current_user();
$loginuserID                    = $currentuserid->ID;

$loginUsername                  = get_user_meta($loginuserID, 'nickname', true); //get user nickname

$profile_img                    = get_user_meta($loginuserID, 'custom_picture', true); // get profile image

$livein                         = get_user_meta($loginuserID, 'live_in', true); //get live in

$speak                          = get_user_meta($loginuserID, 'i_speak', true); //get i_speak

$price                          = get_user_meta($loginuserID, 'celleb_price', true); //get price

$description                    = get_user_meta($loginuserID, 'celleb_description', true); // get user description

$heading                        = get_user_meta($loginuserID, 'celleb_heading', true); //get user heading 

$profilePhoto                   = get_user_meta($loginuserID, 'celleb_img_gallery', true); //get user heading 

$main_img_gallery               = get_user_meta($loginuserID, 'img_gallery', true); //get img gallery

$main_audio_gallery             = get_user_meta($loginuserID, 'audio_gallery', true); //get img gallery

$videourlembed 					= get_user_meta( $loginuserID, 'video_youtube_url', true ); //get video gallery uri return string

$videourlembedArray 			= get_user_meta( $loginuserID, 'video_youtube_url', false ); //get video gallery uri return array

$video_embed                    = str_replace( 'https://www.youtube.com/watch?v=', '', $videourlembed );


// remove video

if ( isset( $_GET['v'] ) ) {
	$youtubeUri = "https://www.youtube.com/watch?v=" . $_GET['v'] . '';
	$stringtoarrayvideo = explode( ',', $videourlembed );
	$key = array_search( $youtubeUri, $stringtoarrayvideo );
	unset( $stringtoarrayvideo[ $key ] );
	update_user_meta( $loginuserID, 'video_youtube_url', implode( ',', $stringtoarrayvideo ) );
	echo "<script>window.location.href='".get_site_url()."/edit-profile/?q=$loginuserID'</script>";
}

// remove image gallery

if ( isset( $_GET['i'] ) ) {
	$stringtoarrayimg = explode( ',', $main_img_gallery );
	$key = array_search( $_GET['i'], $stringtoarrayimg );
	unset( $stringtoarrayimg[ $key ] );
	update_user_meta( $loginuserID, 'img_gallery', implode( ',', $stringtoarrayimg ) );
	echo "<script>window.location.href='".get_site_url()."/edit-profile/?q=$loginuserID'</script>";
}

//save informations

if ( isset( $_POST['save'] ) ) {

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    $files = $_FILES["my_file_upload"];
    foreach ($files['name'] as $key => $value) {
        if ($files['name'][$key]) {
            $file = array(
                'name' => $files['name'][$key],
                'type' => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'error' => $files['error'][$key],
                'size' => $files['size'][$key]
            );
            $_FILES = array("upload_file" => $file);
            $attachment_id = media_handle_upload("upload_file", 0);

            if (is_wp_error($attachment_id)) {
                // There was an error uploading the image.
                echo "Error adding file";
            } else {
                // The image was uploaded successfully!
                //echo "File added successfully with ID: " . $attachment_id . "<br>";
                $attachment_idd .= $attachment_id . ',';
                //echo wp_get_attachment_image($attachment_id, array(800, 600)) . "<br>"; //Display the uploaded image with a size you wish. In this case it is 800x600
            }
        }
    }
    //$attachment_link = wp_get_attachment_image( $attachment_idd ); 
    $profile_img_url = wp_get_attachment_url($attachment_id);
    if ( $_FILES["upload_file"]["name"] <> "" ) {
    	update_user_meta($loginuserID, 'custom_picture', $profile_img_url);
    	update_user_meta($loginuserID, 'aim', $profile_img_url);
    	update_user_meta($loginuserID, 'celleb_img_gallery', $attachment_idd);
    } else {
    	update_user_meta($loginuserID, 'custom_picture', $_POST['hd_old_profile_pic']);
    	update_user_meta($loginuserID, 'aim', $_POST['hd_old_profile_pic']);
    	update_user_meta($loginuserID, 'celleb_img_gallery', $_POST['hd_old_profile_pic_id']);
    }
   	
	update_user_meta($loginuserID, 'nickname', $_POST['nickname']);
	update_user_meta($loginuserID, 'live_in', $_POST['live_in']);
	update_user_meta($loginuserID, 'i_speak', $_POST['i_speak']);
	update_user_meta($loginuserID, 'celleb_price', $_POST['celleb_price']);
	update_user_meta($loginuserID, 'celleb_heading', $_POST['celleb_heading']);
	update_user_meta($loginuserID, 'celleb_description', $_POST['celleb_description']);

	//-------------------------- add role/category --------------//
	$my_user = new WP_User( $loginuserID );
	$my_user->add_role( $_POST['category_role'] );


	/*$role_cate_celleb = get_user_meta( $loginuserID, 'role', false );
	$role_cate_cellebs = array_push( $role_cate_celleb, 'singer' );
	print_r($role_cate_cellebs); 
	$role_cate_celleb_array_string = implode(',', $role_cate_cellebs);
	update_user_meta( $loginuserID, 'role', $role_cate_celleb_array_string . 'singer' );
	*/
	echo '<script>window.location.href="'.get_site_url().'/profile"</script>';
	exit;
}

//################################################## save gallery ######################################################//

if ( isset( $_POST['save_gallery'] ) ) {

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    $files = $_FILES["gallery_upload"];
    foreach ($files['name'] as $key => $value) {
        if ($files['name'][$key]) {
            $file = array(
                'name' => $files['name'][$key],
                'type' => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'error' => $files['error'][$key],
                'size' => $files['size'][$key]
            );
            $_FILES = array("upload_file" => $file);
            $attachment_id = media_handle_upload("upload_file", 0);

            if (is_wp_error($attachment_id)) {
                // There was an error uploading the image.
                echo "Error adding file";
            } else {
                // The image was uploaded successfully!
                //echo "File added successfully with ID: " . $attachment_id . "<br>";
                $attachment_idd .= $attachment_id . ',';
                //echo wp_get_attachment_image($attachment_id, array(800, 600)) . "<br>"; //Display the uploaded image with a size you wish. In this case it is 800x600
            }
        }
    }
    //$attachment_link = wp_get_attachment_image( $attachment_idd ); 
    $profile_img_url = wp_get_attachment_url($attachment_id);
    if ( $_FILES["upload_file"]["name"] <> "" ) {
    	update_user_meta($loginuserID, 'img_gallery', $main_img_gallery . $attachment_idd);
    } else {
    	update_user_meta($loginuserID, 'img_gallery', $_POST['hd_old_gallery_pic_id']);
    	//die('else');
    }
   	
	echo '<script>window.location.href="'.get_site_url().'/profile"</script>';
	exit;
}

//save video gallery

if( isset( $_POST['save_video_gallery'] ) ) {

	foreach ($_POST['video_youtube'] as $key => $youtube_url_gallery) {
		$implode_gallery_youtube .= $youtube_url_gallery . ',';
	}
	update_user_meta($loginuserID, 'video_youtube_url', $videourlembed . $implode_gallery_youtube);
	echo "<script>window.location.href='".get_site_url()."/edit-profile/?q=$loginuserID'</script>";
}

//################################################## save audio gallery ######################################################//

if ( isset( $_POST['save_audio_gallery'] ) ) {

	require_once( ABSPATH . 'wp-admin/includes/image.php' );
    require_once( ABSPATH . 'wp-admin/includes/file.php' );
    require_once( ABSPATH . 'wp-admin/includes/media.php' );

    $files = $_FILES["audio_gallery"];
    foreach ($files['name'] as $key => $value) {
        if ($files['name'][$key]) {
            $file = array(
                'name' => $files['name'][$key],
                'type' => $files['type'][$key],
                'tmp_name' => $files['tmp_name'][$key],
                'error' => $files['error'][$key],
                'size' => $files['size'][$key]
            );
            $_FILES = array("upload_file" => $file);
            $attachment_id = media_handle_upload("upload_file", 0);
            //echo '<pre>'; print_r($attachment_id);
            if (is_wp_error($attachment_id)) {
                // There was an error uploading the image.
                echo "Error adding file";
            } else {
                // The image was uploaded successfully!
                //echo "File added successfully with ID: " . $attachment_id . "<br>";
                $attachment_idd .= $attachment_id . ',';
                //echo wp_get_attachment_image($attachment_id, array(800, 600)) . "<br>"; //Display the uploaded image with a size you wish. In this case it is 800x600
            }
        }
    }
    //$attachment_link = wp_get_attachment_image( $attachment_idd ); 
    $profile_img_url = wp_get_attachment_url($attachment_id);
    if ( $_FILES["upload_file"]["name"] <> "" ) {
    	update_user_meta($loginuserID, 'audio_gallery', $main_audio_gallery . $attachment_idd);
    } else {
    	update_user_meta($loginuserID, 'audio_gallery', $_POST['hd_old_gallery_audio_id']);
    	//die('else');
    }
   	//die();
	echo '<script>window.location.href="'.get_site_url().'/profile"</script>';
	exit;
}

//print_r(get_editable_roles());

?>
<div class="container">
	<div class="row">
		<h2 class="text-center">Update Profile</h2>
		<div style="border-right: 2px solid #eee; border-top: 2px solid #eee; padding: 20px;" class="col-md-6 leftdiv">
			
			<form action="" method="post" enctype="multipart/form-data">
				<div class="form-group">
			    <label for="exampleInputEmail1">Category</label>
			    <select required="" name="category_role" class="form-control">
			    	<option value="">Select Category</option>
			    	<?php 
			    	foreach (get_editable_roles() as $key => $value) { 
			    		if( $value['name'] <> 'Administrator' && $value['name'] <> 'Editor' && $value['name'] <> 'Author' && $value['name'] <> 'Contributor' && $value['name'] <> 'Subscriber' && $value['name'] <> 'Celebrity' ) { 
			    	?>
			    		<option value="<?php echo $value['name']; ?>"><?php echo $value['name']; ?></option>
			    	<?php } } ?>
			    </select>
			  </div>
				<div class="form-group">
			    <label for="exampleInputEmail1">Display Name</label>
			    <input type="text" name="nickname" class="form-control" id="exampleInputEmail1" placeholder="Nick name" value="<?php echo ($loginUsername ? $loginUsername : ''); ?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Live In</label>
			    <input type="text" name="live_in" class="form-control" id="exampleInputEmail1" placeholder="I live in" value="<?php echo ($livein ? $livein : '') ?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Speak In</label>
			    <input type="text" name="i_speak" class="form-control" id="exampleInputEmail1" placeholder="I speak in" value="<?php echo ($speak ? $speak : '') ?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">My Price</label>
			    <input type="text" name="celleb_price" class="form-control" id="exampleInputEmail1" placeholder="$" value="<?php echo ($price ? $price : '') ?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Heading</label>
			    <input type="text" name="celleb_heading" class="form-control" id="exampleInputEmail1" placeholder="Write your heading" value="<?php echo ($heading ? $heading : '') ?>">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">About Me</label>
			    <textarea name="celleb_description" rows="5" class="form-control" id="exampleInputEmail1" placeholder="Write about yourself"><?php echo ($description ? $description : '') ?></textarea>
			  </div>
			  <!-- <div class="form-group">
			    <label for="exampleInputEmail1">Availability</label>
			    <input type="text" name="availability" class="form-control" id="datepicker" placeholder="YYYY-MM-DD">
			  </div> -->
			  <div class="form-group">
			    <label for="exampleInputEmail1">Upload profile image</label>
			    <input type="file" name="my_file_upload[]" multiple="multiple">
			    <!-- <p>Note: You can upload multiple images at once.</p>-->
			    <div>
			    	<?php echo wp_get_attachment_image( substr( $profilePhoto, 0, -1 ), 'thumbnail', FALSE, [ 'class' => 'img-responsive' ] ); ?>
			    	<?php $profilepicimgurl = wp_get_attachment_url( substr( $profilePhoto, 0, -1 ) ); ?>
			    	<input type="hidden" name="hd_old_profile_pic" class="form-control" id="exampleInputEmail1" placeholder="Write your heading" value="<?php echo $profilepicimgurl; ?>" >
			    	<input type="hidden" name="hd_old_profile_pic_id" class="form-control" id="exampleInputEmail1" placeholder="Write your heading" value="<?php echo $profilePhoto; ?>" >
			    </div>
			  </div>
			   
			  <button type="submit" class="btn btn-primary" name="save">SAVE</button>
			</form>
		</div>


		<div style="border-top: 2px solid #eee; padding: 20px;" class="col-md-6 rightdiv">

		<div class="row">
    		<form action="" method="post" enctype="multipart/form-data">

    			<div class="form-group">
			    <label for="exampleInputEmail1">Upload image gallery</label>
			    <input type="file" name="gallery_upload[]" multiple="multiple">
			     <p>Note: You can upload multiple images at once.</p>
			  </div>
			  <p><button type="submit" class="btn btn-primary" name="save_gallery">SAVE Gallery</button></p>
			  <div class="form-group">

			    	<?php 
			    	$substr_img_gallery = substr($main_img_gallery, 0, -1);

			    	if ( $substr_img_gallery <> '' ) {
			    		$explode_gallery = explode(',', $substr_img_gallery);
			    		echo '<p>Preview</p>';
				    	foreach ( $explode_gallery as $key => $gallery_img_thumbnail ) {
				    		echo '<div class="col-md-6"><a href="#">' . wp_get_attachment_image( $gallery_img_thumbnail, 'thumbnail', FALSE, [ 'style' => 'margin-right: 20px;' ] ) . '</a>
				    		<p><a href="'.home_url().'/edit-profile/?q='.$loginuserID.'&i='.$gallery_img_thumbnail.'" style="text-decoration: underline;">Remove &minus;</a></p>
				    		</div>';
				    	}
				    }
			    	?>
			    	<input type="hidden" name="hd_old_gallery_pic_id" class="form-control" id="exampleInputEmail1" placeholder="Write your heading" value="<?php echo $main_img_gallery; ?>" >
			    </div>
    		</form>
    		</div>
    		<!--############################################# Video Gallery #####################################################-->
    		<hr />
    		<?php
    		$video_embedd  = substr($video_embed, 0, -1);
    		$video_explode = explode( ',',  $video_embedd);
    		?>
    		<div class="row">
    		<form action="" method="post">
    			<div class="form-group input_fields_wrap">
			    <label for="exampleInputEmail1">Upload video gallery</label>
			    <input type="text" name="video_youtube[]" placeholder="https://www.youtube.com/watch?v=JlimhpwZDeE">
			    </div>
			  <button type="submit" class="btn btn-primary add_field_button" name="save_video_gallery">Add Video</button>
			  <br /> <br />
			  <?php if( $video_embedd <> '' ) { ?>
			  <p>Preview</p>
			  <?php foreach( $video_explode as $video_embed_uri ) { ?>
			  <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $video_embed_uri; ?>" frameborder="0" allowfullscreen></iframe>
			  <p><a href="<?php home_url() ?>/edit-profile/?q=<?php echo $loginuserID; ?>&v=<?php echo $video_embed_uri; ?>" style="text-decoration: underline;">Remove &minus;</a></p>
			  <?php } } ?>
    		</form>
    		</div>

    		<!-- #################################### save audio files ############################### -->
    		<div class="row">
    		<form action="" method="post" enctype="multipart/form-data">

    			<div class="form-group">
			    <label for="exampleInputEmail1">Upload audio gallery</label>
			    <input type="file" name="audio_gallery[]" multiple="multiple">
			     <p>Note: You can upload multiple audio files at once.</p>
			  </div>
			  <p><button type="submit" class="btn btn-primary" name="save_audio_gallery">SAVE Gallery</button></p>
			  <div class="form-group">

			    	<?php 
			    	$substr_audio_gallery = substr($main_audio_gallery, 0, -1);

			    	if ( $substr_audio_gallery <> '' ) {
			    		$explode_gallery = explode(',', $substr_audio_gallery);
			    		echo '<p>Preview</p>';
				    	foreach ( $explode_gallery as $key => $gallery_audio_thumbnail ) {
				    		$attr = array(
							'src'      => wp_get_attachment_url( $gallery_audio_thumbnail ),
							'loop'     => 'off',
							'autoplay' => '0',
							'preload'  => 'metadata'
							);
							echo wp_audio_shortcode( $attr );
				    		echo '<div class="col-md-6"> 
				    		<p><a href="'.home_url().'/edit-profile/?q='.$loginuserID.'&i='.$gallery_audio_thumbnail.'" style="text-decoration: underline;">Remove &minus;</a></p>
				    		</div>';
				    	}
				    }
			    	?>
			    	<input type="hidden" name="hd_old_gallery_audio_id" class="form-control" id="exampleInputEmail1" placeholder="Write your heading" value="<?php echo $main_audio_gallery; ?>" >
			    </div> 
    		</form>
    		</div>


    	</div>
	</div>
</div>
<?php get_footer(); ?>