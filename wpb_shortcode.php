<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly 


/*  
Shortcode For this plugin
*/

function wpb_eps_shortcode_funcation( $atts ){
	extract(shortcode_atts(array(
		'title' 				=> '', // Slider title
		'nav'					=> 'true', // show navigation 
		'prev' 					=> "<i class='fa fa-angle-left'></i>", // prev icon
		'next' 					=> "<i class='fa fa-angle-right'></i>", // next icon
		'autoplay'				=> 'false', // slider auto play
		'stop'					=> 'true', // slider stop on mouse hover
		'pagination' 			=> 'true', // slider pagination
		'count' 				=> 'true', // slider pagination counting
		'items' 				=> 4, // Number of product on default screen
		'itemsDesktop'			=> 3, // Number of product on screen size 1199px
		'itemsDesktopSmall'		=> 3, // Number of product on screen size 979px
		'itemsTablet'			=> 2, // Number of product on screen size 768px
		'itemsMobile'			=> 1, // Number of product on screen size 479px
		'speed'					=> 1000, // slider speed
		'paginationSpeed'		=> 1000, // paginationSpeed speed
		'width' 				=> '320', // Product image width
		'height' 				=> '300', // Product image height
		'orderby'				=> 'none', // product orderby
		'order'					=> '', // product order
		'posts'					=> -1, // Number of products
	), $atts));
   
	$output = $id = $the_query = $args = '';
	$id 		= rand( 10,1000 );
	global $post;
	$args 	= array(
		'post_type' 		=> 'download',
		'posts_per_page'	=> $posts,
		'orderby'			=> $orderby,
		'order'				=> $order,
	);
	
	$loop = new WP_Query( $args );
	if ( $loop->have_posts() ) {
		$output .= '<div class="wpb_eps_carousel_area">';
		$output .= '<h2 class="wpb_eps_area_title">'.$title.'</h2>';
		$output .= '<div id="wpb_eps_'.$id.'">';
		while ( $loop->have_posts() ) : $loop->the_post();
		
			$thumb_id = get_post_thumbnail_id();
			$img_url = wp_get_attachment_url( $thumb_id,'full' );
			$image_thumb = aq_resize( $img_url, $width, $height, true );
			$thumbnail_mata = get_post_meta($thumb_id,'_wp_attachment_image_alt',true);
		
			$output .= '<div class="wpb_eps_item">';
			$output .= '<a href="'.get_permalink().'">';
			$output .= '<img src="'.$image_thumb.'" alt="'.$thumbnail_mata.'">'; // Download Image
			$output .= '</a>';
			$output .= '<div class="wpb_eps_content">';
			$output .='<span class="wpb_eps_cat">'.get_the_term_list(get_the_id(), 'download_category', '', ',&nbsp;').'</span>'; // Download Category
			$output .= '<h3 class="wpb_eps_pro_title"><a href="'.get_permalink().'">';
			$output .= get_the_title(); // Download Title
			$output .= '</a></h3>';
			$output .= do_shortcode( '[purchase_link id="'.$post->ID.'" style="button" color="white" text="Add To Cart"]' );
			$output .= '</div>';
			$output .= '</div>';
			
		endwhile;
		$output .= '</div><!-- wpb_eps_carousel -->';
		$output .= '</div><!-- wpb_eps_carousel_area -->';
		$output .= '<script type="text/javascript">
			jQuery("#wpb_eps_'.$id.'").owlCarousel({
				autoPlay: '.$autoplay.',
				stopOnHover: '.$stop.',
				navigation: '.$nav.',
				navigationText: ["'.$prev.'","'.$next.'"],
				slideSpeed: '.$speed.',
				paginationSpeed: '.$paginationSpeed.',
				pagination: '.$pagination.',
				paginationNumbers: '.$count.',
				items : '.$items.',
				itemsDesktop : [1199,'.$itemsDesktop.'],
				itemsDesktopSmall : [979,'.$itemsDesktopSmall.'],
				itemsTablet : [768,'.$itemsTablet.'],
				itemsMobile : [479,'.$itemsMobile.'],
				baseClass	: "wpb-eps-carousel",
			});
		</script>';
	} else {
		echo __( 'No products found', 'wpbean' );
	}
	wp_reset_postdata();
	
	wp_reset_query();
	
	return $output;
}
add_shortcode( 'wpb-edd-slider','wpb_eps_shortcode_funcation' );