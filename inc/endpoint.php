<?php
add_action( 'rest_api_init', 'create_custon_endpoint' );

function create_custon_endpoint(){
    
    register_rest_route(
        'wp/v2',
        '/uts_seo_data',
        array(
            'methods' => 'GET',
            'callback' => 'seo_response',
            'permission_callback' => '__return_true'
        )
    );

}

function seo_response($data) {
	global $wpdb;
    $type = $data->get_param( 'type' );
    $slug = $data->get_param( 'slug' );     
    //$mypost = get_page_by_path($slug, '', $type);
	
	$sql = "SELECT ID FROM $wpdb->posts WHERE post_name IN ('".$slug."') AND post_type IN ('".$type."')";
	$pages = $wpdb->get_results( $sql);
	
    $id = !empty($pages) ? $pages[0]->ID : 0;
    $robot = get_post_meta($id, 'rank_math_robots',true);
	
    $robot_index = is_array($robot) && in_array("index", $robot) ? true : false;
    $robot_follow = is_array($robot) && in_array("nofollow", $robot) ? false : true;
	
    $data = [
        'title' => get_the_title($id),
        'description' => get_post_meta($id, 'rank_math_description',true),
        'focus' => get_post_meta($id, 'rank_math_focus_keyword',true),
        'robot_index' => $robot_index,
        'robot_follow' => $robot_follow,
    ]; 
    wp_send_json($data);
}