<?php
/*
Plugin Name: Ultimate Social Meta Lite
Description: This plugin allow authors to define the social meta tags for Facebook, Google, Twitter and others using Open Graph.
Author:      alisaleem252 | Gigsix
Author URI:  http://gigsix.com/
Version: 1.0
Text Domain: mas_pt_metatags_txtdmn
*/

define('mam_pt_metatags_ABSPATH', dirname(__FILE__) );

function mas_pt_metatags_txtdmn_action_links( $links ) {
	$links = array_merge( array(
		'<a href="' . esc_url( 'https://codecanyon.net/item/ultimate-social-meta-pro/7215252?ref=alisaleem252' ) . '">' . __( 'Get Premium', 'textdomain' ) . '</a>'
	), $links );
	return $links;
}
add_action( 'plugin_action_links_' . plugin_basename( __FILE__ ), 'mas_pt_metatags_txtdmn_action_links' );



add_action('admin_init',function(){
	global $mam_global_active_posttypes;
	$args = array(
     '_builtin' => true,
   	 'show_in_nav_menus' => true
    );

    $args2 = array(
     '_builtin' => false,
	 'show_in_nav_menus' => true
    );

    $output = 'names'; // names or objects, NOTE: names = only gets the post type slugs, while objects = full details object
    $operator = 'and'; // 'and' or 'or'

    $builtin = get_post_types( $args, $output, $operator );
	$customs = get_post_types( $args2, $output, $operator );
	
	$mam_global_active_posttypes = array_merge($customs,$builtin);
}); // add_action('admin_init',function 
 
	require_once(mam_pt_metatags_ABSPATH.'/dashboard/posttypes_metatags_settings_page.php');	
	require_once(mam_pt_metatags_ABSPATH.'/dashboard/posttypes_metatags_metabox_settings.php');
	require_once(mam_pt_metatags_ABSPATH.'/frontend/display_posttypes_metatags_settings.php');
	
	


?>