<?php
add_action('wp_head','wp_head_always_display_posttypes_metatags_settings_dataCBF');
function wp_head_always_display_posttypes_metatags_settings_dataCBF(){
	
	$queried_object = get_queried_object();
	//echo '<pre>'; print_r($queried_object); echo '</pre>';
	if(isset($queried_object->ID)){
		$viewed_pid = $queried_object->ID;
		$posttypes_metatags_metabox_settings = get_metadata('post',$viewed_pid,'this_posttype_metatags_metabox_settings',true);
		if(isset($posttypes_metatags_metabox_settings['kind_of_website']) && !empty(trim($posttypes_metatags_metabox_settings['Page_Title'])) ){
			
			echo (!empty(trim($posttypes_metatags_metabox_settings['Site_Image'])) ? "\n".'<meta name="image" content="'.$posttypes_metatags_metabox_settings['Site_Image'].'">' : '' );
			echo "\n"."\n".'<meta itemprop="name" content="'.$posttypes_metatags_metabox_settings['Page_Title'].'">';
			echo (!empty(trim($posttypes_metatags_metabox_settings['Page_Description'])) ? "\n".'<meta itemprop="description" content="'.$posttypes_metatags_metabox_settings['Page_Description'].'">' : '' );
			echo (!empty(trim($posttypes_metatags_metabox_settings['Site_Image'])) ? "\n".'<meta itemprop="image" content="'.$posttypes_metatags_metabox_settings['Site_Image'].'">' : '' );
			
			if($posttypes_metatags_metabox_settings['kind_of_website'] == 'mobileApp'){
				echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_iOS_App_ID'])) ? "\n".'<meta name="apple-itunes-app" content="app-id='.$posttypes_metatags_metabox_settings['MobileApp_iOS_App_ID'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_Google_Play_App_ID'])) ? "\n".'<meta name="google-play-app" content="app-id='.$posttypes_metatags_metabox_settings['MobileApp_Google_Play_App_ID'].'">' : '' );
				
				if(isset($posttypes_metatags_metabox_settings['which_platforms'][0]) && $posttypes_metatags_metabox_settings['which_platforms'][0] == 'openGraph'){
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_iOS_App_ID'])) ? "\n".'<meta name="al:ios:app_store_id" content="'.$posttypes_metatags_metabox_settings['MobileApp_iOS_App_ID'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_iOS_App_name'])) ? "\n".'<meta name="al:ios:app_name" content="'.$posttypes_metatags_metabox_settings['MobileApp_iOS_App_name'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_iOS_App_custom_URL'])) ? "\n".'<meta name="al:ios:url" content="'.$posttypes_metatags_metabox_settings['MobileApp_iOS_App_custom_URL'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_Google_Play_App_ID'])) ? "\n".'<meta name="al:android:package" content="'.$posttypes_metatags_metabox_settings['MobileApp_Google_Play_App_ID'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_App_name_on_Google_Play_store'])) ? "\n".'<meta name="al:android:app_name" content="'.$posttypes_metatags_metabox_settings['MobileApp_App_name_on_Google_Play_store'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_Android_app_custom_URL'])) ? "\n".'<meta name="al:android:url" content="'.$posttypes_metatags_metabox_settings['MobileApp_Android_app_custom_URL'].'">' : '' );
				} // $posttypes_metatags_metabox_settings['which_platforms'][0] == 'openGraph'
			} // if($posttypes_metatags_metabox_settings['kind_of_website'] == 'mobileApp')
			
			
			if((isset($posttypes_metatags_metabox_settings['which_platforms'][1]) && $posttypes_metatags_metabox_settings['which_platforms'][1] == 'twitter') 
				|| (isset($posttypes_metatags_metabox_settings['which_platforms'][0]) && $posttypes_metatags_metabox_settings['which_platforms'][0] == 'twitter') ){				
				
				echo (!empty(trim($posttypes_metatags_metabox_settings['T_Preview_Image'])) ? "\n".'<meta name="twitter:image:src" content="'.$posttypes_metatags_metabox_settings['T_Preview_Image'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['T_Video_Audio_Player_Source'])) ? "\n".'<meta name="twitter:player" content="'.$posttypes_metatags_metabox_settings['T_Video_Audio_Player_Source'].'">' : '' );
				
				if($posttypes_metatags_metabox_settings['kind_of_website'] == 'video'){
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_T_Media_Content_Type'])) ? "\n".'<meta name="twitter:player:stream:content_type" content="'.$posttypes_metatags_metabox_settings['Video_T_Media_Content_Type'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_T_URL'])) ? "\n".'<meta name="twitter:player:stream" content="'.$posttypes_metatags_metabox_settings['Video_T_URL'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_T_Video_Width'])) ? "\n".'<meta name="twitter:player:width" content="'.$posttypes_metatags_metabox_settings['Video_T_Video_Width'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_T_Video_Height'])) ? "\n".'<meta name="twitter:player:height" content="'.$posttypes_metatags_metabox_settings['Video_T_Video_Height'].'">' : '' );
				} // if($posttypes_metatags_metabox_settings['kind_of_website'] == 'video'){
					
				if($posttypes_metatags_metabox_settings['kind_of_website'] == 'mobileApp'){
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_iOS_App_ID'])) ? "\n".'<meta name="twitter:app:id:iphone" content="'.$posttypes_metatags_metabox_settings['MobileApp_iOS_App_ID'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_iOS_App_name'])) ? "\n".'<meta name="twitter:app:name:iphone" content="'.$posttypes_metatags_metabox_settings['MobileApp_iOS_App_name'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_iOS_App_custom_URL'])) ? "\n".'<meta name="twitter:app:url:iphone" content="'.$posttypes_metatags_metabox_settings['MobileApp_iOS_App_custom_URL'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_Google_Play_App_ID'])) ? "\n".'<meta name="twitter:app:id:googleplay" content="'.$posttypes_metatags_metabox_settings['MobileApp_Google_Play_App_ID'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_App_name_on_Google_Play_store'])) ? "\n".'<meta name="twitter:app:name:googleplay" content="'.$posttypes_metatags_metabox_settings['MobileApp_App_name_on_Google_Play_store'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_iOS_App_custom_URL'])) ? "\n".'<meta name="twitter:app:url:googleplay" content="'.$posttypes_metatags_metabox_settings['MobileApp_iOS_App_custom_URL'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['MobileApp_T_Country_Code'])) ? "\n".'<meta name="twitter:app:country" content="'.$posttypes_metatags_metabox_settings['MobileApp_T_Country_Code'].'">' : '' );
				} // if($posttypes_metatags_metabox_settings['kind_of_website'] == 'mobileApp')

			} // $posttypes_metatags_metabox_settings['which_platforms'][1] == 'twitter'
			
			
			if(isset($posttypes_metatags_metabox_settings['which_platforms'][0]) && $posttypes_metatags_metabox_settings['which_platforms'][0] == 'openGraph' ){
				
				echo (!empty(trim($posttypes_metatags_metabox_settings['OG_Site_Video'])) ? "\n".'<meta name="og:video" content="'.$posttypes_metatags_metabox_settings['OG_Site_Video'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['OG_Admins_ID'])) ? "\n".'<meta name="fb:admins" content="'.$posttypes_metatags_metabox_settings['OG_Admins_ID'].'">' : '' );
				
				
				if($posttypes_metatags_metabox_settings['kind_of_website'] == 'article'){
					echo (!empty(trim($posttypes_metatags_metabox_settings['Article_OG_Expiration_Time'])) ? "\n".'<meta name="article:expiration_time" content="'.$posttypes_metatags_metabox_settings['Article_OG_Expiration_Time'].'">' : '' );
					
				} // if($posttypes_metatags_metabox_settings['kind_of_website'] == 'article'){
					
					
					
				if($posttypes_metatags_metabox_settings['kind_of_website'] == 'video'){
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_Release_Date'])) ? "\n".'<meta name="video:release_date" content="'.$posttypes_metatags_metabox_settings['Video_OG_Release_Date'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_Video_Width'])) ? "\n".'<meta name="video:width" content="'.$posttypes_metatags_metabox_settings['Video_OG_Video_Width'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_Video_Height'])) ? "\n".'<meta name="video:height" content="'.$posttypes_metatags_metabox_settings['Video_OG_Video_Height'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_Director'])) ? "\n".'<meta name="video:director" content="'.$posttypes_metatags_metabox_settings['Video_OG_Director'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_Writer'])) ? "\n".'<meta name="video:writer" content="'.$posttypes_metatags_metabox_settings['Video_OG_Writer'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_Duration_Seconds'])) ? "\n".'<meta name="video:duration" content="'.$posttypes_metatags_metabox_settings['Video_OG_Duration_Seconds'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_Actors'])) ? "\n".'<meta name="video:actor" content="'.$posttypes_metatags_metabox_settings['Video_OG_Actors'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_Video_Format'])) ? "\n".'<meta name="video:type" content="'.$posttypes_metatags_metabox_settings['Video_OG_Video_Format'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Video_OG_The_Video_Tags'])) ? "\n".'<meta name="video:tag" content="'.$posttypes_metatags_metabox_settings['Video_OG_The_Video_Tags'].'">' : '' );
				} // if($posttypes_metatags_metabox_settings['kind_of_website'] == 'video'){
					
					
				if($posttypes_metatags_metabox_settings['kind_of_website'] == 'product'){
					echo (!empty(trim($posttypes_metatags_metabox_settings['Product_OG_Availability'])) ? "\n".'<meta name="product:availability" content="'.$posttypes_metatags_metabox_settings['Product_OG_Availability'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Product_OG_Price_Currency'])) ? "\n".'<meta name="product:price:currency" content="'.$posttypes_metatags_metabox_settings['Product_OG_Price_Currency'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Product_OG_Price'])) ? "\n".'<meta name="product:price:amount" content="'.$posttypes_metatags_metabox_settings['Product_OG_Price'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Product_OG_Brand'])) ? "\n".'<meta name="product:brand" content="'.$posttypes_metatags_metabox_settings['Product_OG_Brand'].'">' : '' );
					
				} // if($posttypes_metatags_metabox_settings['kind_of_website'] == 'product'){
				
			} // $posttypes_metatags_metabox_settings['which_platforms'][0] == 'openGraph'
			 do_action('frontend_always__handle_added_more_metatag_html_fields');
		} // if(isset($posttypes_metatags_metabox_settings['kind_of_website']) && !empty(trim($posttypes_metatags_metabox_settings['Page_Title']))
	} // if(isset($queried_object->ID))
	
} // wp_head_always_display_posttypes_metatags_settings_dataCBF


















add_action('wp_head','wp_head_display_posttypes_metatags_settings_dataCBF');
function wp_head_display_posttypes_metatags_settings_dataCBF(){
	$status_disappeared_yoast_metatags = get_option('status_disappeared_yoast_metatags','disappeared');
	
	if($status_disappeared_yoast_metatags == 'appeared' && class_exists( 'WPSEO_Twitter' ))
		return;
	
	$queried_object = get_queried_object();
	//echo '<pre>'; print_r($queried_object); echo '</pre>';
	if(isset($queried_object->ID)){
		$viewed_pid = $queried_object->ID;
		$posttypes_metatags_metabox_settings = get_metadata('post',$viewed_pid,'this_posttype_metatags_metabox_settings',true);
		if(isset($posttypes_metatags_metabox_settings['kind_of_website']) && !empty(trim($posttypes_metatags_metabox_settings['Page_Title'])) ){
			
			if((isset($posttypes_metatags_metabox_settings['which_platforms'][1]) && $posttypes_metatags_metabox_settings['which_platforms'][1] == 'twitter') 
				|| (isset($posttypes_metatags_metabox_settings['which_platforms'][0]) && $posttypes_metatags_metabox_settings['which_platforms'][0] == 'twitter') ){
				
				echo ($posttypes_metatags_metabox_settings['kind_of_website'] == 'mobileApp' ? "\n".'<meta name="twitter:card" content="app">' : ( $posttypes_metatags_metabox_settings['kind_of_website'] == 'video' ? "\n".'<meta name="twitter:card" content="player">' : "\n".'<meta name="twitter:card" content="summary">'));
				
				echo "\n".'<meta name="twitter:title" content="'.$posttypes_metatags_metabox_settings['Page_Title'].'">';
				echo (!empty(trim($posttypes_metatags_metabox_settings['Page_Description'])) ? "\n".'<meta name="twitter:description" content="'.$posttypes_metatags_metabox_settings['Page_Description'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['T_Publisher'])) ? "\n".'<meta name="twitter:site" content="'.$posttypes_metatags_metabox_settings['T_Publisher'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['T_Author'])) ? "\n".'<meta name="twitter:creator" content="'.$posttypes_metatags_metabox_settings['T_Author'].'">' : '' );

			} // $posttypes_metatags_metabox_settings['which_platforms'][1] == 'twitter'
			
			
			if(isset($posttypes_metatags_metabox_settings['which_platforms'][0]) && $posttypes_metatags_metabox_settings['which_platforms'][0] == 'openGraph' ){
				echo "\n".'<meta name="og:title" content="'.$posttypes_metatags_metabox_settings['Page_Title'].'">';
				echo (!empty(trim($posttypes_metatags_metabox_settings['Page_Description'])) ? "\n".'<meta name="og:description" content="'.$posttypes_metatags_metabox_settings['Page_Description'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['OG_Preview_Image'])) ? "\n".'<meta name="og:image" content="'.$posttypes_metatags_metabox_settings['OG_Preview_Image'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['OG_URL'])) ? "\n".'<meta name="og:url" content="'.$posttypes_metatags_metabox_settings['OG_URL'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['OG_Site_Name'])) ? "\n".'<meta name="og:site_name" content="'.$posttypes_metatags_metabox_settings['OG_Site_Name'].'">' : '' );
				echo (!empty(trim($posttypes_metatags_metabox_settings['OG_Site_Locale'])) ? "\n".'<meta name="og:locale" content="'.$posttypes_metatags_metabox_settings['OG_Site_Locale'].'">' : '' );
				echo ($posttypes_metatags_metabox_settings['kind_of_website'] == 'article' ? "\n".'<meta name="og:type" content="article">' : ( $posttypes_metatags_metabox_settings['kind_of_website'] == 'video' ? "\n".'<meta name="og:type" content="video.other">' : ( $posttypes_metatags_metabox_settings['kind_of_website'] == 'product' ? "\n".'<meta name="og:type" content="product">' : "\n".'<meta name="og:type" content="website">' )));
				echo (!empty(trim($posttypes_metatags_metabox_settings['OG_App_ID'])) ? "\n".'<meta name="fb:app_id" content="'.$posttypes_metatags_metabox_settings['OG_App_ID'].'">' : '' );
				if($posttypes_metatags_metabox_settings['kind_of_website'] == 'article'){
					echo (!empty(trim($posttypes_metatags_metabox_settings['Article_OG_Section'])) ? "\n".'<meta name="article:section" content="'.$posttypes_metatags_metabox_settings['Article_OG_Section'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Article_OG_Published_Time'])) ? "\n".'<meta name="article:published_time" content="'.$posttypes_metatags_metabox_settings['Article_OG_Published_Time'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Article_OG_Author'])) ? "\n".'<meta name="article:author" content="'.$posttypes_metatags_metabox_settings['Article_OG_Author'].'">' : '' );
					echo (!empty(trim($posttypes_metatags_metabox_settings['Article_OG_Tags'])) ? "\n".'<meta name="article:tag" content="'.$posttypes_metatags_metabox_settings['Article_OG_Tags'].'">' : '' );
					
					echo (!empty(trim($posttypes_metatags_metabox_settings['Article_OG_Modified_Time'])) ? "\n".'<meta name="article:modified_time" content="'.$posttypes_metatags_metabox_settings['Article_OG_Modified_Time'].'">' : '' );
				} // if($posttypes_metatags_metabox_settings['kind_of_website'] == 'article'){				
			} // $posttypes_metatags_metabox_settings['which_platforms'][0] == 'openGraph'
			 do_action('frontend__handle_added_more_metatag_html_fields');
		} // if(isset($posttypes_metatags_metabox_settings['kind_of_website']) && !empty(trim($posttypes_metatags_metabox_settings['Page_Title']))
	} // if(isset($queried_object->ID))
	
} // function wp_head_display_posttypes_metatags_settings_dataCBF
$og_slugs_arr[] = 'og_title';
$og_slugs_arr[] = 'og_locale';
$og_slugs_arr[] = 'og_type';
$og_slugs_arr[] = 'og_description';
$og_slugs_arr[] = 'og_url';
$og_slugs_arr[] = 'og_site_name';
$og_slugs_arr[] = 'article_publisher';
$og_slugs_arr[] = 'article_section';
$og_slugs_arr[] = 'article_published_time';
$og_slugs_arr[] = 'article_modified_time';
$og_slugs_arr[] = 'og_image';
$og_slugs_arr[] = 'og_image_secure_url';
$og_slugs_arr[] = 'article_author';
$og_slugs_arr[] = 'article_tag';
$og_slugs_arr[] = 'article_section';
$og_slugs_arr[] = 'fb_app_id';



foreach($og_slugs_arr as $og_slug)
	add_filter( 'wpseo_og_'.$og_slug, 'og_slugs_arrCBF' );
function og_slugs_arrCBF($default_og_slug){
	$status_disappeared_yoast_metatags = get_option('status_disappeared_yoast_metatags','disappeared');
	if($status_disappeared_yoast_metatags == 'disappeared')
		return false;
	else
		return $default_og_slug;
}


add_filter( 'wpseo_output_twitter_card', function($default_tw_slug){
	//var_dump($default_tw_slug);
	$status_disappeared_yoast_metatags = get_option('status_disappeared_yoast_metatags','disappeared');
		if($status_disappeared_yoast_metatags == 'disappeared')
			return false;
		else
			return $default_tw_slug;		
});
?>