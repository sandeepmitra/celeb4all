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
			
			<?php
				$args = array(
						'role' 		   => 'dancer',
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
				//print_r($postslist);
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
						<img src="<?php echo get_template_directory_uri(); ?>/images/noimage.png" style="width:150px; height:150px;float:left;margin-right:5px;margin-bottom:5px;"/>
					</a>
				  </div>
				  <?php }else{ ?>
					
					<div>
						<a href="<?php site_url(); ?>/profile/<?php echo $post->user_login; ?>" title="<?php the_title_attribute(); ?>">
						<img src="<?php echo get_user_meta( $post->ID, 'custom_picture', true ); ?>" style="width:150px; height:150px;float:left;margin-right:10px;margin-bottom:10px;"/>
						</a>
					</div>
				<?php
				  }
				endforeach; 
				wp_reset_postdata();
				?>
			
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