<?php
// Page
// Wp Estate Pack
get_header();
$options=wpestate_page_details($post->ID); 
global $more;
$more = 0;
$wide_page = get_post_meta($post->ID, 'wide_page', true);
$wide_class='';
?>

<?php
$currentuserid = wp_get_current_user();
$loginuserID = $currentuserid->ID;


?>
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/default.css" media="screen" type="text/css" />
<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/css/component.css" media="screen" type="text/css" />
              
<div id="post" <?php post_class('row  '.$wide_class);?>>
    <?php get_template_part('templates/breadcrumbs'); ?>
    <div class=" <?php print $options['content_class'];?> ">
        <?php get_template_part('templates/ajax_container'); ?>
        
        <div class="single-content">
            <?php 
            global $more;
            $more=0;
            while ( have_posts() ) : the_post();
            if (esc_html( get_post_meta($post->ID, 'page_show_title', true) ) != 'no') { ?>
                <h1 class="entry-title single-title" ><?php the_title(); ?></h1>
                <div class="meta-element-head"> 
                    <?php print the_date('', '', '', FALSE).' '.esc_html__( 'by', 'wpestate').' '.get_the_author();  ?>
                </div>
                
            <?php 
            } 
        
            if (has_post_thumbnail()){
                $pinterest = wp_get_attachment_image_src(get_post_thumbnail_id(),'wpestate_property_full_map');
            }
      
            the_content('Continue Reading');                     
            $args = array(
                       'before'           => '<p>' . esc_html__( 'Pages:','wpestate'),
                       'after'            => '</p>',
                       'link_before'      => '',
                       'link_after'       => '',
                       'next_or_number'   => 'number',
                       'nextpagelink'     => esc_html__( 'Next page','wpestate'),
                       'previouspagelink' => esc_html__( 'Previous page','wpestate'),
                       'pagelink'         => '%',
                       'echo'             => 1
              ); 
            wp_link_pages( $args ); 
            ?>          
        </div>
		<!--==============================================================================================-->
			
			<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1482737184287 vc_row-has-fill wpestate_row vc_row" style="position: relative; left: -74.5px; box-sizing: border-box; width: 1349px;">
			<div class="wpb_column vc_column_container vc_col-sm-6 vc_column">
			<div class="vc_column-inner ">
			<div class="wpb_wrapper">
			<!-- vc_grid start -->
			<div class="vc_grid-container-wrapper vc_clearfix">
				<div class="vc_grid-container vc_clearfix wpb_content_element vc_media_grid vc_media_grid" data-initial-loading-animation="fadeIn" data-vc-grid-settings="{&quot;page_id&quot;:30,&quot;style&quot;:&quot;all&quot;,&quot;action&quot;:&quot;vc_get_vc_grid_data&quot;,&quot;shortcode_id&quot;:&quot;1482830368894-6fd1be47-cb38-1&quot;,&quot;tag&quot;:&quot;vc_media_grid&quot;}" data-vc-request="http://celeb4all.inforain.in/wp-admin/admin-ajax.php" data-vc-post-id="30" data-vc-public-nonce="6428eb4bef">
				<style type="text/css" data-type="vc_shortcodes-custom-css">.vc_custom_1419003984488{padding-right: 15px !important;padding-left: 15px !important;}</style><style type="text/css">
			img.wp-smiley,
			img.emoji {
				display: inline !important;
				border: none !important;
				box-shadow: none !important;
				height: 1em !important;
				width: 1em !important;
				margin: 0 .07em !important;
				vertical-align: -0.1em !important;
				background: none !important;
				padding: 0 !important;
			}
			</style>
			
			
			<?php
				$args = array(
					'role' 		   => 'celleb',
					'blog_id'      => $GLOBALS['blog_id'],
					'role__in'     => array(),
					'role__not_in' => array(),
					'meta_key'     => '',
					'meta_value'   => '',
					'meta_compare' => '',
					'meta_query'   => array(),
					'date_query'   => array(),        
					'include'      => array(),
					'exclude'      => array(),
					'orderby'      => 'login',
					'order'        => 'ASC',
					'offset'       => '',
					'search'       => '',
					'number'       => '',
					'count_total'  => false,
					'fields'       => 'all',
					'who'          => ''
				 ); 
				$postslist = get_users( $args );
				
				foreach ( $postslist as $post ) :
				  //setup_postdata( $post ); 
				  //echo $post->ID;
				  ?> 
				  
				  <?php 
					$thumb_url = get_user_meta( $post->ID, 'custom_picture', true );
					$thumb_url = $thumb_url[0];
					if(!$thumb_url) {  
				  ?>
				  
					<div>
						<a href="<?php site_url(); ?>/profile/<?php echo $post->user_login; ?>" target="_blank">
							<img src="<?php echo get_template_directory_uri(); ?>/images/noimage.png" style="width:100px; height:100px;float:left;margin-right:5px;margin-bottom:5px;"/>
						</a>
					</div>
					
				  <?php }else{ ?>
					
					<div>
						<a href="<?php site_url(); ?>/profile/<?php echo $post->user_login; ?>" title="<?php the_title_attribute(); ?>">
						<img src="<?php echo get_user_meta( $post->ID, 'custom_picture', true ); ?>" style="width:100px; height:100px;float:left;margin-right:5px;margin-bottom:5px;"/>
						</a>
					</div>
				<?php
				  }
				endforeach; 
				wp_reset_postdata();
				?>
				
			<div class="vc_grid vc_row vc_grid-gutter-2px vc_pageable-wrapper vc_hook_hover" data-vc-pageable-content="true">
				<div class="vc_pageable-slide-wrapper vc_clearfix" data-vc-grid-content="true">
				<div class="vc_grid-item vc_clearfix vc_col-sm-2 vc_visible-item fadeIn animated">
				<div class="vc_grid-item-mini vc_clearfix">
				<div class="vc_gitem-animated-block  vc_gitem-animate vc_gitem-animate-slideTop" data-vc-animation="slideTop">
				<div class="vc_gitem-zone vc_gitem-zone-a vc-gitem-zone-height-mode-auto vc-gitem-zone-height-mode-auto-4-3">
						
				</div>
				
				</div>
				<div class="vc_gitem-zone vc_gitem-zone-b vc-gitem-zone-height-mode-auto vc_gitem-is-link">
					<a href="<?php echo get_template_directory_uri(); ?>/images/2014010613890058651494508920.jpg" title="Akshay Kumar" data-rel="prettyPhoto[rel--2090403253]" data-vc-gitem-zone="prettyphotoLink" class="vc_gitem-link prettyphoto vc-zone-link vc-prettyphoto-link"></a>		<div class="vc_gitem-zone-mini">
						<div class="vc_gitem_row vc_row vc_gitem-row-position-middle"><div class="vc_col-sm-12 vc_gitem-col vc_gitem-col-align-left vc_custom_1419003984488"><div class="vc_custom_heading vc_gitem_post_title vc_gitem-post-data vc_gitem-post-data-source-post_title"><div style="font-size: 18px;color: #ffffff;line-height: 1.3;text-align: center;font-family:Roboto;font-weight:500;font-style:normal">Akshay Kumar</div></div></div></div>	</div>
				</div>
				</div>
				</div>
				
				<div class="vc_clearfix"></div></div>
			
			</div></div></div>
			</div><!-- vc_grid end -->
			
			</div></div>
			
			
			<div class="wpb_column vc_column_container vc_col-sm-6 vc_column">
			<div class="vc_column-inner "><div class="wpb_wrapper">
			<div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1482486953267 vc_row-has-fill vc_column-gap-2 wpestate_row_inner vc_row_inner">
			<div class="wpb_column vc_column_container vc_col-sm-4 vc_column_inner">
			<div class="vc_column-inner ">
			<div class="wpb_wrapper">
			<!-- start celleb -->
			 
			<div class="vc_icon_element vc_icon_element-outer hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a wpb_animate_when_almost_visible wpb_top-to-bottom vc_icon vc_icon_element-align-center vc_icon_element-have-style wpb_start_animation">
			
			<section id="set-1">
			<div><a href="<?php site_url(); ?>/celebrity" target="_blank" class="hi-icon hi-icon-star">star</a></div>
			</div>
			<h4 style="color: #000000;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1482485961233 vc_custom_heading">
			<a href="<?php site_url(); ?>/celebrity" target="_blank">CELEBRITY</a></h4></div></div></div><div class="wpb_column vc_column_container vc_col-sm-4 vc_column_inner"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="vc_icon_element vc_icon_element-outer hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a wpb_animate_when_almost_visible wpb_top-to-bottom vc_icon vc_icon_element-align-center vc_icon_element-have-style wpb_start_animation">
			
			<!-- end celleb -->
			<div><a href="<?php site_url(); ?>/singer" target="_blank" class="hi-icon hi-icon-screen">Desktop</a></div>
			</div>
			<h4 style="color: #000000;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1482486039014 vc_custom_heading">
			<a href="<?php site_url(); ?>/singer" target="_blank">SINGER</a></h4></div></div></div><div class="wpb_column vc_column_container vc_col-sm-4 vc_column_inner"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="vc_icon_element vc_icon_element-outer hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a wpb_animate_when_almost_visible wpb_top-to-bottom vc_icon vc_icon_element-align-center vc_icon_element-have-style wpb_start_animation">
				
			<!-- end singer -->
			<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>anchor" target="_blank" class="hi-icon hi-icon-earth">Partners</a></div>
			</div>
			<h4 style="color: #000000;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1482486121791 vc_custom_heading">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>anchor" target="_blank">ANCHOR</a></h4></div></div></div></div><div class="vc_row wpb_row vc_inner vc_row-fluid vc_custom_1482487111194 vc_row-has-fill vc_column-gap-2 wpestate_row_inner vc_row_inner"><div class="wpb_column vc_column_container vc_col-sm-4 vc_column_inner"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="vc_icon_element vc_icon_element-outer hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a wpb_animate_when_almost_visible wpb_top-to-bottom vc_icon vc_icon_element-align-center vc_icon_element-have-style wpb_start_animation">
			
			<!-- end Anchor -->
			<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>dancer" target="_blank" class="hi-icon hi-icon-support">Support</a></div>
			</div>
			<h4 style="color: #000000;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1482486176508 vc_custom_heading">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>dancer" target="_blank">DANCER</a></h4></div></div></div><div class="wpb_column vc_column_container vc_col-sm-4 vc_column_inner"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="vc_icon_element vc_icon_element-outer hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a wpb_animate_when_almost_visible wpb_top-to-bottom vc_icon vc_icon_element-align-center vc_icon_element-have-style wpb_start_animation">
			
			<!-- end dancer -->
			<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>modelpage" target="_blank" class="hi-icon hi-icon-clock">Time</a></div>
			</div>
			<h4 style="color: #000000;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1482486228685 vc_custom_heading">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>modelpage" target="_blank">MODEL</a></h4></div></div></div><div class="wpb_column vc_column_container vc_col-sm-4 vc_column_inner"><div class="vc_column-inner "><div class="wpb_wrapper"><div class="vc_icon_element vc_icon_element-outer hi-icon-wrap hi-icon-effect-1 hi-icon-effect-1a wpb_animate_when_almost_visible wpb_top-to-bottom vc_icon vc_icon_element-align-center vc_icon_element-have-style wpb_start_animation">
			
			<!-- end model -->
			<div><a href="<?php echo esc_url( home_url( '/' ) ); ?>comedian" target="_blank" class="hi-icon hi-icon-archive">Archive</a></div>
			</div>
			<h4 style="color: #000000;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_1482486289835 vc_custom_heading">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>comedian" target="_blank">COMEDIAN</a></h4><div class=" ultimate_icons  uavc-icons "></div></div></div></div></div></div></div></div></div>
			
			<!-- end comedian -->
			</section>
			
			</div></div>
		<!--==============================================================================================-->
			<?php $loop = new WP_Query( array( 'post_type' => 'post', 'posts_per_page' => 5 ) );
				//print_r($loop);
			?>

			
			
			<div data-vc-full-width="true" data-vc-full-width-init="true" data-vc-stretch-content="true" class="vc_row wpb_row vc_row-fluid vc_custom_1482737279801 vc_row-has-fill wpestate_row vc_row" style="position: relative; left: -74.5px; box-sizing: border-box; width: 1349px;">
			<?php while ( $loop->have_posts() ) : $loop->the_post();?>
			<?php //if ( has_post_thumbnail()) : ?>

			<div class="wpb_column vc_column_container vc_col-sm-3 vc_column"><div class="vc_column-inner "><div class="wpb_wrapper">
			<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_top-to-bottom vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper   vc_box_border_grey">
						<div class="vc-zoom-wrapper" style="position: relative; overflow: hidden;">
							<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
							<img class="vc_single_image-img " src="<?php the_post_thumbnail_url(); ?>" width="440" height="auto" alt="image1" title="image1"><img src="<?php the_post_thumbnail_url(); ?>" class="zoomImg" style="position: absolute; top: -0.430851px; left: -9.96417px; opacity: 0; width: 440px; height: 269px; border: none; max-width: none; max-height: none;">
							</a>
						</div>
					</div>
				</figure>
			</div>
			<?php //endif; ?>

			<div class="wpb_text_column wpb_content_element  vc_column_text">
				<div class="wpb_wrapper">
					<?php the_title( '<h2 class="entry-title" style="text-align: center;"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>
			<p style="text-align: center;">PROJECT CATAGORY</p>
			<hr style="color: #ff0000; width: 100px;">

				</div>
			</div>

			<!--<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_top-to-bottom vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper   vc_box_border_grey"><div class="vc-zoom-wrapper" style="position: relative; overflow: hidden;"><img class="vc_single_image-img " src="<?php //echo get_template_directory_uri(); ?>/images/image1.jpg" width="440" height="269" alt="image1" title="image1"></div></div>
				</figure>
			</div>-->
			</div></div></div>
			<?php endwhile; ?>
			<!--<div class="wpb_column vc_column_container vc_col-sm-3 vc_column"><div class="vc_column-inner "><div class="wpb_wrapper">
			<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_top-to-bottom vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper   vc_box_border_grey"><div class="vc-zoom-wrapper" style="position: relative; overflow: hidden;"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>"><img class="vc_single_image-img " src="<?php //echo get_template_directory_uri(); ?>/images/jesse-mccartney-grammys-stylegirlfriend.jpg" width="300" height="700" alt="LOS ANGELES, CA - FEBRUARY 08: Singer/Songwriter Jesse McCartney  attends The 57th Annual GRAMMY Awards at the STAPLES Center on February 8, 2015 in Los Angeles, California.  (Photo by Larry Busacca/Getty Images for NARAS)" title="The 57th Annual GRAMMY Awards - Red Carpet"><img src="<?php //echo get_template_directory_uri(); ?>/images/jesse-mccartney-grammys-stylegirlfriend.jpg" class="zoomImg" style="position: absolute; top: 0px; left: -35.4583px; opacity: 0; width: 350px; height: 700px; border: none; max-width: none; max-height: none;"></a></div></div>
				</figure>
			</div>

			<div class="wpb_text_column wpb_content_element  vc_column_text">
				<div class="wpb_wrapper">
					<p style="text-align: center;"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>"><strong>HARBAL BEAUTY &nbsp;SALON</strong></a></p>
			<p style="text-align: center;">PROJECT CATAGORY</p>
			<hr style="color: #ff0000; width: 100px;">

				</div>
			</div>
			</div></div></div>
			<div class="wpb_column vc_column_container vc_col-sm-3 vc_column"><div class="vc_column-inner "><div class="wpb_wrapper">
			<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_top-to-bottom vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper   vc_box_border_grey"><div class="vc-zoom-wrapper" style="position: relative; overflow: hidden;"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>"><img class="vc_single_image-img " src="<?php //echo get_template_directory_uri(); ?>/images/Herbal.jpg" width="440" height="269" alt="herbal" title="herbal"><img src="<?php //echo get_template_directory_uri(); ?>/images/Herbal.jpg" class="zoomImg" style="position: absolute; top: -85.1755px; left: -218.565px; opacity: 0; width: 640px; height: 427px; border: none; max-width: none; max-height: none;"></a></div></div>
				</figure>
			</div>

			<div class="wpb_text_column wpb_content_element  vc_column_text">
				<div class="wpb_wrapper">
					<p style="text-align: center;"><a href="<?php //echo esc_url( home_url( '/' ) ); ?>"><strong>HARBAL BEAUTY &nbsp;SALON</strong></a></p>
			<p style="text-align: center;">PROJECT CATAGORY</p>
			<hr style="color: #ff0000; width: 100px;">

				</div>
			</div>

			<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_top-to-bottom vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper   vc_box_border_grey"><div class="vc-zoom-wrapper" style="position: relative; overflow: hidden;"><img class="vc_single_image-img " src="http://celeb4all.inforain.in/wp-content/uploads/2016/12/image1.jpg" width="440" height="269" alt="image1" title="image1"><img src="<?php //echo get_template_directory_uri(); ?>/images/image1.jpg" class="zoomImg" style="position: absolute; top: -51.7021px; left: -88.5945px; opacity: 0; width: 440px; height: 269px; border: none; max-width: none; max-height: none;"></div></div>
				</figure>
			</div>
			</div></div></div>
			<div class="wpb_column vc_column_container vc_col-sm-3 vc_column"><div class="vc_column-inner "><div class="wpb_wrapper">
			<div class="wpb_single_image wpb_content_element vc_align_left  wpb_animate_when_almost_visible wpb_top-to-bottom vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper   vc_box_border_grey"><div class="vc-zoom-wrapper" style="position: relative; overflow: hidden;"><img class="vc_single_image-img " src="http://celeb4all.inforain.in/wp-content/uploads/2016/12/parallax-img23-300x618.jpg" width="300" height="618" alt="parallax-img23" title="parallax-img23"><img src="<?php //echo get_template_directory_uri(); ?>/images/parallax-img23.jpg" class="zoomImg" style="position: absolute; top: 0px; left: 0px; opacity: 0; width: 350px; height: 618px; border: none; max-width: none; max-height: none;"></div></div>
				</figure>
			</div>

			<div class="wpb_text_column wpb_content_element  vc_column_text">
				<div class="wpb_wrapper">
					<p style="text-align: center;"><strong>HARBAL BEAUTY &nbsp;SALON</strong></p>
			<p style="text-align: center;">PROJECT CATAGORY</p>
			<hr style="color: #ff0000; width: 100px;">

				</div>
			</div>
			</div></div></div>
			-->
			</div>
			
		<!--==============================================================================================-->
			<div class="vc_row wpb_row vc_row-fluid vc_custom_1482737393709 vc_row-has-fill wpestate_row vc_row"><div class="wpb_column vc_column_container vc_col-sm-12 vc_column"><div class="vc_column-inner "><div class="wpb_wrapper"><h2 style="color: #000000;text-align: center;font-family:Abril Fatface;font-weight:400;font-style:normal" class="vc_custom_heading vc_custom_heading">What Clients Say</h2>
			<div class="wpb_text_column wpb_content_element  vc_column_text">
				<div class="wpb_wrapper">
					<p style="text-align: center;"><strong>Lorem Ipsum</strong> is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>

				</div>
			</div>
			
		<!--<div class="vc_row wpb_row vc_inner vc_row-fluid vc_column-gap-15 wpestate_row_inner vc_row_inner"><div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill vc_column_inner"><div class="vc_column-inner vc_custom_1482742877108"><div class="wpb_wrapper">
			<div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_left-to-right vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper vc_box_circle  vc_box_border_grey"><img width="150" height="150" src="http://celeb4all.inforain.in/wp-content/uploads/2016/12/images-150x150.jpg" class="vc_single_image-img attachment-thumbnail" alt="Imran Khan" srcset="http://celeb4all.inforain.in/wp-content/uploads/2016/12/images-150x150.jpg 150w, http://celeb4all.inforain.in/wp-content/uploads/2016/12/images-60x60.jpg 60w" sizes="(max-width: 150px) 100vw, 150px"></div>
				</figure>
			</div>

			<div class="wpb_text_column wpb_content_element  vc_column_text">
				<div class="wpb_wrapper">
					<p style="text-align: center;"><strong>Inverness McKenzie</strong></p>
		<p style="text-align: center;">BUSINESS OWNER</p>
		<p style="text-align: center;">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>

				</div>
			</div>
		</div></div></div><div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill vc_column_inner"><div class="vc_column-inner vc_custom_1482743020518"><div class="wpb_wrapper">
			<div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_left-to-right vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper vc_box_circle  vc_box_border_grey"><img width="150" height="150" src="http://celeb4all.inforain.in/wp-content/uploads/2016/12/Prabhu-Deva1-150x150.jpg" class="vc_single_image-img attachment-thumbnail" alt="Prabhu Deva" srcset="http://celeb4all.inforain.in/wp-content/uploads/2016/12/Prabhu-Deva1-150x150.jpg 150w, http://celeb4all.inforain.in/wp-content/uploads/2016/12/Prabhu-Deva1-60x60.jpg 60w" sizes="(max-width: 150px) 100vw, 150px"></div>
				</figure>
			</div>

			<div class="wpb_text_column wpb_content_element  vc_column_text">
				<div class="wpb_wrapper">
					<p style="text-align: center;"><strong>Hanson Deck</strong></p>
		<p style="text-align: center;">INDEPENDENT ARTIST</p>
		<p style="text-align: center;">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>

				</div>
			</div>
		</div></div></div><div class="wpb_column vc_column_container vc_col-sm-4 vc_col-has-fill vc_column_inner"><div class="vc_column-inner vc_custom_1482743170296"><div class="wpb_wrapper">
			<div class="wpb_single_image wpb_content_element vc_align_center  wpb_animate_when_almost_visible wpb_left-to-right vc_single_image wpb_start_animation">
				
				<figure class="wpb_wrapper vc_figure">
					<div class="vc_single_image-wrapper vc_box_circle  vc_box_border_grey"><img width="150" height="150" src="http://celeb4all.inforain.in/wp-content/uploads/2016/12/3551e6616c9a2ecbb28fb9f1b4e9423c-150x150.jpg" class="vc_single_image-img attachment-thumbnail" alt="Priyanka Chopra" srcset="http://celeb4all.inforain.in/wp-content/uploads/2016/12/3551e6616c9a2ecbb28fb9f1b4e9423c-150x150.jpg 150w, http://celeb4all.inforain.in/wp-content/uploads/2016/12/3551e6616c9a2ecbb28fb9f1b4e9423c-60x60.jpg 60w" sizes="(max-width: 150px) 100vw, 150px"></div>
				</figure>
			</div>

			<div class="wpb_text_column wpb_content_element  vc_column_text">
				<div class="wpb_wrapper">
					<p style="text-align: center;"><strong>Natalya Undergrowth</strong></p>
		<p style="text-align: center;">FREELANCER</p>
		<p style="text-align: center;">I am text block. Click edit button to change this text. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.</p>

				</div>
			</div>
		</div></div></div></div>
		-->
		
		<?php echo do_shortcode( '[testimonial_rotator id=391]' ); ?>
		</div></div></div></div>
		
		
		<!--==============================================================================================-->
        <!-- #comments start-->
        <?php // comments_template('', true);?> 	
        <!-- end comments --> 

			<script>
			var hash = window.location.hash,
				current = 0,
				demos = Array.prototype.slice.call( document.querySelectorAll( '#codrops-demos > a' ) );
			
			if( hash === '' ) hash = '#set-1';
			setDemo( demos[ parseInt( hash.match(/#set-(\d+)/)[1] ) - 1 ] );

			demos.forEach( function( el, i ) {
				el.addEventListener( 'click', function() { setDemo( this ); } );
			} );

			function setDemo( el ) {
				var idx = demos.indexOf( el );
				if( current !== idx ) {
					var currentDemo = demos[ current ];
					currentDemo.className = currentDemo.className.replace(new RegExp("(^|\\s+)" + 'current-demo' + "(\\s+|$)"), ' ');
				}
				current = idx;
				el.className = 'current-demo'; 
			}
		</script>
		<!--<script>
		jQuery(document).ready(function(){ 
		jQuery('.zoomImg').ZooMove();
		});
		</script>-->
        
        <?php endwhile; // end of the loop. ?>
    </div>
       
<?php  //include(locate_template('sidebar.php')); ?>
</div>   

<?php get_footer(); ?>