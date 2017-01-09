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
			<!-- ==============================================================================  -->
			
			<?php $post   = get_post( 220 );?>
			<h1 class="entry-title single-title" ><?php the_title(); ?></h1>
			<div class="meta-element-head"> 
                <?php print the_date('', '', '', FALSE).' '.esc_html__( 'by', 'wpestate').' '.get_the_author();  ?>
            </div>
			<p>
			<?php $output =  apply_filters( 'the_content', $post->post_content );
			$author = $post->post_author;
			echo $output; ?>
			</p>
			
			<?php if ( has_post_thumbnail() ) : ?>
				<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
				<img src="<?php the_post_thumbnail_url(); ?>"/>
				</a>
			<?php endif; ?>
			<!---------------------------------->
			<?php
				$args = array(
						'blog_id'      => $GLOBALS['blog_id'],
						'role'         => 'subscriber',
						'role__in'     => array(),
						'role__not_in' => array(),
						'meta_key'     => '',
						'meta_value'   => '',
						'meta_compare' => '',
						'post_type'    => 'estate_agent',
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
				$postslist = get_posts( $args );
				foreach ( $postslist as $post ) :
				  setup_postdata( $post ); ?> 
					<div>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
						<img src="<?php the_post_thumbnail_url(); ?>" style="width:100px; height:auto;float:left;margin-right:5px;"/>
						</a>
						<!--<br />
						<?php //the_title(); ?> 
						<br />
						<?php //the_date(); ?>
						<?php //the_excerpt(); ?>-->
						</div>
				<?php
				endforeach; 
				wp_reset_postdata();
			?>
			<!-- ==============================================================================  --> 
			<?php $loop = new WP_Query( array( 'post_type' => 'estate_agent', 'posts_per_page' => 10 ) ); ?>

			<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

				<?php the_title( '<h2 class="entry-title"><a href="' . get_permalink() . '" title="' . the_title_attribute( 'echo=0' ) . '" rel="bookmark">', '</a></h2>' ); ?>

				<div class="entry-content">
					<?php the_content(); ?>
				</div>
			<?php endwhile; ?>
			<!-- ==============================================================================  -->
     
        <!-- #comments start-->
        <?php // comments_template('', true);?> 	
        <!-- end comments -->   
        
        <?php endwhile; // end of the loop. ?>
    </div>
       
<?php  //include(locate_template('sidebar.php')); ?>
</div>   

<?php get_footer(); ?>