<?php
add_action( 'add_meta_boxes', 'add_meta_boxes_posttypes_metatags_metabox_settingsCBF');
add_action( 'save_post', 'save_posttypes_metatags_metabox_settingsCBF');


function add_meta_boxes_posttypes_metatags_metabox_settingsCBF(){
	global $mam_global_active_posttypes;
	if(count($mam_global_active_posttypes) >= 1){
		foreach($mam_global_active_posttypes as $mam_global_active_posttype)
			add_meta_box( 'id_posttypes_metatags_metabox_'.$mam_global_active_posttype, __( 'The Meta Tags Settings', 'mam_pt_metatags_txtdmn' ), 'posttypes_metatags_metabox_settingsCBF', $mam_global_active_posttype, 'normal','high' );
	} // if(count($mam_global_active_posttypes) >= 1)
} // function add_meta_boxes_posttypes_metatags_metabox_settingsCBF


function posttypes_metatags_metabox_settingsCBF($this_post_obj){
	$posttypes_metatags_metabox_settings = get_metadata('post',$this_post_obj->ID,'this_posttype_metatags_metabox_settings',true);
	$options_posttype_metatags_metabox_settings = get_option('this_posttype_metatags_metabox_settings_options',array());
	$feature_image_id = get_metadata('post',$this_post_obj->ID,'_thumbnail_id',true);
	$post_author_id = get_post_field( 'post_author', $this_post_obj->ID );
	$post_author_user_info = get_userdata($post_author_id);
	$post_date = get_post_field( 'post_date', $this_post_obj->ID );
	
		$default_published_post_date = '';
		$default_modified_post_date = '';
		
	//echo '<pre>'; print_r($posttypes_metatags_metabox_settings); echo '</pre>';?>
	<input type="hidden" name="posttypes_metatags_metabox_settings" value="posttypes_metatags_metabox_settings" />
    
    <table width="100%">
    	<tr><th width="50%" style="text-align:left"><?php _e('What kind of website do you have?','mam_pt_metatags_txtdmn')?></th><th style="text-align:left"><?php _e('Which platforms would you like to support','mam_pt_metatags_txtdmn')?></th></tr>
        <tr>
        	<td width="47%">
				<p>
                	<input type="radio" name="this_pt_mtags_mb_settings_kind_of_website" class="kind_of_website" value="general" required 
					<?php echo (isset($posttypes_metatags_metabox_settings['kind_of_website']) && ($posttypes_metatags_metabox_settings['kind_of_website'] == 'general' || $posttypes_metatags_metabox_settings['kind_of_website'] == '') ? 'checked' : '') ?> />
                	<label for="general"><?php _e('General','mam_pt_metatags_txtdmn')?></label>
                </p> 	
				<p>
            		<input type="radio" name="this_pt_mtags_mb_settings_kind_of_website" class="kind_of_website" value="mobileApp" 
                    <?php echo (isset($posttypes_metatags_metabox_settings['kind_of_website']) && $posttypes_metatags_metabox_settings['kind_of_website'] == 'mobileApp' ? 'checked' : '') ?> />
                	<label for="mobileApp"><?php _e('Mobile App (iOS & Android)','mam_pt_metatags_txtdmn')?></label>
                </p> 	
				<p>
            		<input type="radio" name="this_pt_mtags_mb_settings_kind_of_website" class="kind_of_website" value="article" 
                    <?php echo (isset($posttypes_metatags_metabox_settings['kind_of_website']) && $posttypes_metatags_metabox_settings['kind_of_website'] == 'article' ? 'checked' : '') ?> />
                	<label for="article"><?php _e('Article','mam_pt_metatags_txtdmn')?></label>
                </p> 		 	
				<p>
            		<input type="radio" name="this_pt_mtags_mb_settings_kind_of_website" class="kind_of_website" value="video" 
                    <?php echo (isset($posttypes_metatags_metabox_settings['kind_of_website']) && $posttypes_metatags_metabox_settings['kind_of_website'] == 'video' ? 'checked' : '') ?> />
                	<label for="video"><?php _e('Video','mam_pt_metatags_txtdmn')?></label>
                </p> 
				<p>
            		<input type="radio" name="this_pt_mtags_mb_settings_kind_of_website" class="kind_of_website" value="product" 
                    <?php echo (isset($posttypes_metatags_metabox_settings['kind_of_website']) && $posttypes_metatags_metabox_settings['kind_of_website'] == 'product' ? 'checked' : '') ?> />
                	<label for="product"><?php _e('Product (e-commerce)','mam_pt_metatags_txtdmn')?></label>
                </p>
                <?php do_action('backend__kind_of_website')?>
            </td>
        	<td valign="top">
				<p>
                	<input type="checkbox" name="this_pt_mtags_mb_settings_which_platforms[]" class="which_platforms" value="openGraph" 
                    <?php echo (isset($posttypes_metatags_metabox_settings['which_platforms'][0]) && $posttypes_metatags_metabox_settings['which_platforms'][0] == 'openGraph' ? 'checked' : '') ?> />
                	<label for="openGraph"><?php _e('Open Graph – Facebook, Pinterest, LinkedIn, Google+','mam_pt_metatags_txtdmn')?></label>
                </p> 	
				<p>
            		<input type="checkbox" name="this_pt_mtags_mb_settings_which_platforms[]" class="which_platforms" value="twitter" 
                    <?php echo ( (isset($posttypes_metatags_metabox_settings['which_platforms'][1]) && $posttypes_metatags_metabox_settings['which_platforms'][1] == 'twitter') 
							  || (isset($posttypes_metatags_metabox_settings['which_platforms'][0]) && $posttypes_metatags_metabox_settings['which_platforms'][0] == 'twitter') ? 'checked' : '') ?> />
                	<label for="twitter"><?php _e('Twitter','mam_pt_metatags_txtdmn')?></label>
                </p> 
                <?php do_action('backend__which_platforms')?>
            </td>
        </tr>
    </table>
    <p><hr /></p>
    
    <h3><?php _e('General information','mam_pt_metatags_txtdmn')?></h3>
    <table width="100%">
        <tr>
			<th width="25%" style="text-align:left"><?php _e('Page Title','mam_pt_metatags_txtdmn')?></th>
            <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Page_Title" id="Page_Title" value="<?php echo (isset($posttypes_metatags_metabox_settings['Page_Title']) ? $posttypes_metatags_metabox_settings['Page_Title'] : get_the_title($this_post_obj->ID)) ?>" /></td>            
        </tr>
        <tr>
			<th valign="top" style="text-align:left"><?php _e('Page Description','mam_pt_metatags_txtdmn')?></th>
            <td>
            	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Page_Description" id="Page_Description" value="<?php echo (isset($posttypes_metatags_metabox_settings['Page_Description']) ? $posttypes_metatags_metabox_settings['Page_Description'] : get_post_field( 'post_excerpt', $this_post_obj->ID )) ?>" />
            	<div><?php _e('150 characters for SEO, 200 characters for Twitter & Facebook','mam_pt_metatags_txtdmn')?></div><br />
            </td>            
        </tr>
        <tr>
			<th valign="top" style="text-align:left"><?php _e('Site Image','mam_pt_metatags_txtdmn')?></th>
            <td>
            	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Site_Image" id="Site_Image" value="<?php echo (isset($posttypes_metatags_metabox_settings['Site_Image']) ? $posttypes_metatags_metabox_settings['Site_Image'] : @$options_posttype_metatags_metabox_settings['Site_Image']) ?>" />
                <div><?php _e('Recommended dimension: 1200px x 630px; minimum dimension: 600px x 315px','mam_pt_metatags_txtdmn')?></div><br />
            </td>            
        </tr>
    </table>
    <hr />
    
    
    
    <div id="mobileApp_wrapper"><div><hr /><hr /></div>
        <h3><?php _e('Mobile App (iOS & Android) Meta Tags Settings','mam_pt_metatags_txtdmn')?></h3>
        <table width="100%">
            <tr>
                <th width="25%" style="text-align:left"><?php _e('iOS App ID','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_MobileApp_iOS_App_ID" id="MobileApp_iOS_App_ID" value="<?php echo (isset($posttypes_metatags_metabox_settings['MobileApp_iOS_App_ID']) ? $posttypes_metatags_metabox_settings['MobileApp_iOS_App_ID'] : @$options_posttype_metatags_metabox_settings['MobileApp_iOS_App_ID']) ?>" /></td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('iOS App name','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_MobileApp_iOS_App_name" id="MobileApp_iOS_App_name" value="<?php echo (isset($posttypes_metatags_metabox_settings['MobileApp_iOS_App_name']) ? $posttypes_metatags_metabox_settings['MobileApp_iOS_App_name'] : @$options_posttype_metatags_metabox_settings['MobileApp_iOS_App_name']) ?>" /></td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('The iOS app\'s custom URL scheme','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_MobileApp_iOS_App_custom_URL" id="MobileApp_iOS_App_custom_URL" value="<?php echo (isset($posttypes_metatags_metabox_settings['MobileApp_iOS_App_custom_URL']) ? $posttypes_metatags_metabox_settings['MobileApp_iOS_App_custom_URL'] : 
				@$options_posttype_metatags_metabox_settings['MobileApp_iOS_App_custom_URL']) ?>" /></td>            
            </tr>
            <tr>
                <th valign="top" style="text-align:left"><?php _e('Google Play App ID<','mam_pt_metatags_txtdmn')?>/th>
                <td>
                	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_MobileApp_Google_Play_App_ID" id="MobileApp_Google_Play_App_ID" value="<?php echo (isset($posttypes_metatags_metabox_settings['MobileApp_Google_Play_App_ID']) ? $posttypes_metatags_metabox_settings['MobileApp_Google_Play_App_ID'] : 
					@$options_posttype_metatags_metabox_settings['MobileApp_Google_Play_App_ID']) ?>" />
                    <div><a href="https://github.com/kudago/smart-app-banner" target="_blank"><?php _e('For this to work, install this plugin on your website','mam_pt_metatags_txtdmn')?></a></div><br />
                </td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('The app\'s name on the Google Play store','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_MobileApp_App_name_on_Google_Play_store" id="MobileApp_App_name_on_Google_Play_store" value="<?php echo (isset($posttypes_metatags_metabox_settings['MobileApp_App_name_on_Google_Play_store']) ? $posttypes_metatags_metabox_settings['MobileApp_App_name_on_Google_Play_store'] : @$options_posttype_metatags_metabox_settings['MobileApp_App_name_on_Google_Play_store']) ?>" /></td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('The Android app\'s custom URL scheme','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_MobileApp_Android_app_custom_URL" id="MobileApp_Android_app_custom_URL" value="<?php echo (isset($posttypes_metatags_metabox_settings['MobileApp_Android_app_custom_URL']) ? $posttypes_metatags_metabox_settings['MobileApp_Android_app_custom_URL'] : 
				@$options_posttype_metatags_metabox_settings['MobileApp_Android_app_custom_URL']) ?>" /></td>            
            </tr>
        </table>
    </div><hr /><!-- id="mobileApp_wrapper" -->



	<div id="opengraph_wrapper"><div><hr /><hr /></div>
        <h3><?php _e('Open Graph Meta Tags Settings','mam_pt_metatags_txtdmn')?></h3>
        <table width="100%">
            <tr>
                <th width="25%" style="text-align:left"><?php _e('Preview Image','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_OG_Preview_Image" id="OG_Preview_Image" value="<?php echo (isset($posttypes_metatags_metabox_settings['OG_Preview_Image']) ? $posttypes_metatags_metabox_settings['OG_Preview_Image'] : wp_get_attachment_url( $feature_image_id )) ?>" /></td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('URL','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_OG_URL" id="OG_URL" value="<?php echo (isset($posttypes_metatags_metabox_settings['OG_URL']) ? $posttypes_metatags_metabox_settings['OG_URL'] : get_permalink( $this_post_obj->ID )) ?>" /></td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('Site Name','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_OG_Site_Name" id="OG_Site_Name" value="<?php echo (isset($posttypes_metatags_metabox_settings['OG_Site_Name']) ? $posttypes_metatags_metabox_settings['OG_Site_Name'] : get_bloginfo( 'name' )) ?>" /></td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('Locale','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_OG_Site_Locale" id="OG_Site_Locale" value="<?php echo (isset($posttypes_metatags_metabox_settings['OG_Site_Locale']) ? $posttypes_metatags_metabox_settings['OG_Site_Locale'] : @$options_posttype_metatags_metabox_settings['OG_Site_Locale']) ?>" /></td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('Video','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_OG_Site_Video" id="OG_Site_Video" value="<?php echo (isset($posttypes_metatags_metabox_settings['OG_Site_Video']) ? $posttypes_metatags_metabox_settings['OG_Site_Video'] : @$options_posttype_metatags_metabox_settings['OG_Site_Video']) ?>" /></td>            
            </tr>
            <tr>
                <th valign="top" style="text-align:left"><?php _e('Admins ID','mam_pt_metatags_txtdmn')?></th>
                <td>
                	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_OG_Admins_ID" id="OG_Admins_ID" value="<?php echo (isset($posttypes_metatags_metabox_settings['OG_Admins_ID']) ? $posttypes_metatags_metabox_settings['OG_Admins_ID'] : @$options_posttype_metatags_metabox_settings['OG_Admins_ID']) ?>" />
                    <div><a href="http://findmyfbid.com/" target="_blank"><?php _e('Find your Facebook user ID with this tool','mam_pt_metatags_txtdmn')?></a></div><br />
                </td>            
            </tr>
            <tr>
                <th valign="top" style="text-align:left"><?php _e('App ID','mam_pt_metatags_txtdmn')?></th>
                <td>
                	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_OG_App_ID" id="OG_App_ID" value="<?php echo (isset($posttypes_metatags_metabox_settings['OG_App_ID']) ? $posttypes_metatags_metabox_settings['OG_App_ID'] : @$options_posttype_metatags_metabox_settings['OG_App_ID']) ?>" />
                    <div><a href="https://developers.facebook.com/apps" target="_blank"><?php _e('Find your Facebook App ID here','mam_pt_metatags_txtdmn')?></a></div><br />
                </td>            
            </tr>
        </table><hr />

        <div id="article_opengraph_wrapper"><div><hr /><hr /></div>
        	<h3><?php _e('Article : Open Graph Meta Tags Settings','mam_pt_metatags_txtdmn')?></h3>        
            <table width="100%">
                <tr>
                    <th valign="top" width="25%" style="text-align:left"><?php _e('Article Tags','mam_pt_metatags_txtdmn')?></th>
                    <td>
                    	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Article_OG_Tags" id="Article_OG_Tags" value="<?php echo (isset($posttypes_metatags_metabox_settings['Article_OG_Tags']) ? $posttypes_metatags_metabox_settings['Article_OG_Tags'] : '') ?>" />
                        <div><?php _e('Tag words associated with this article','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
                <tr>
                	<th style="text-align:left"><?php _e('Author','mam_pt_metatags_txtdmn')?></th>
                	<td>
                    	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Article_OG_Author" id="Article_OG_Author" value="<?php echo (isset($posttypes_metatags_metabox_settings['Article_OG_Author']) ? $posttypes_metatags_metabox_settings['Article_OG_Author'] : $post_author_user_info->user_login) ?>" />
                    </td>            
                </tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Section','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Article_OG_Section" id="Article_OG_Section" value="<?php echo (isset($posttypes_metatags_metabox_settings['Article_OG_Section']) ? $posttypes_metatags_metabox_settings['Article_OG_Section'] : '') ?>" />
                        <div><?php _e('A high-level section name. E.g. Technology','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e('Published Time','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Article_OG_Published_Time" placeholder="2018-09-20T19:08:47+01:00" id="Article_OG_Published_Time" value="<?php echo (isset($posttypes_metatags_metabox_settings['Article_OG_Published_Time']) ? $posttypes_metatags_metabox_settings['Article_OG_Published_Time'] : $default_published_post_date) ?>" /></td>            
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e('Modified Time','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Article_OG_Modified_Time" placeholder="2018-09-20T19:08:47+01:00" id="Article_OG_Modified_Time" value="<?php echo (isset($posttypes_metatags_metabox_settings['Article_OG_Modified_Time']) ? $posttypes_metatags_metabox_settings['Article_OG_Modified_Time'] : $default_modified_post_date) ?>" /></td>            
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e('Expiration Time','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Article_OG_Expiration_Time" placeholder="2018-09-20T19:08:47+01:00" id="Article_OG_Expiration_Time" value="<?php echo (isset($posttypes_metatags_metabox_settings['Article_OG_Expiration_Time']) ? $posttypes_metatags_metabox_settings['Article_OG_Expiration_Time'] : '') ?>" /></td>            
                </tr>
            </table>
        </div><hr />
        
		<div id="video_opengraph_wrapper"><div><hr /><hr /></div>
        	<h3><?php _e('Video: Open Graph Meta Tags Settings','mam_pt_metatags_txtdmn')?></h3>        
            <table width="100%">
                <tr>
                	<th width="25%" style="text-align:left"><?php _e('Video Format','mam_pt_metatags_txtdmn')?></th>
                	<td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_Video_Format" id="Video_OG_Video_Format" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_Video_Format']) ? $posttypes_metatags_metabox_settings['Video_OG_Video_Format'] : @$options_posttype_metatags_metabox_settings['Video_OG_Video_Format']) ?>" /></td>            
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e('Video Width (pixels)','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_Video_Width" id="Video_OG_Video_Width" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_Video_Width']) ? $posttypes_metatags_metabox_settings['Video_OG_Video_Width'] : @$options_posttype_metatags_metabox_settings['Video_OG_Video_Width']) ?>" /></td>            
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e('Video Height (pixels)','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_Video_Height" id="Video_OG_Video_Height" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_Video_Height']) ? $posttypes_metatags_metabox_settings['Video_OG_Video_Height'] : @$options_posttype_metatags_metabox_settings['Video_OG_Video_Height']) ?>" /></td>            
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e('Duration in Seconds','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_Duration_Seconds" id="Video_OG_Duration_Seconds" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_Duration_Seconds']) ? $posttypes_metatags_metabox_settings['Video_OG_Duration_Seconds'] : '') ?>" /></td>            
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e('The Video Tags','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_The_Video_Tags" id="Video_OG_The_Video_Tags" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_The_Video_Tags']) ? $posttypes_metatags_metabox_settings['Video_OG_The_Video_Tags'] : '') ?>" /></td>            
                </tr>
                <tr>
                    <th style="text-align:left"><?php _e('Release Date','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_Release_Date" id="Video_OG_Release_Date" placeholder="2018-09-20T19:08:47+01:00" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_Release_Date']) ? $posttypes_metatags_metabox_settings['Video_OG_Release_Date'] : '') ?>" /></td>            
                </tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Director','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_Director" id="Video_OG_Director" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_Director']) ? $posttypes_metatags_metabox_settings['Video_OG_Director'] : $post_author_user_info->user_login) ?>" />
                        <div><?php _e('The Director of the film/video','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Actors','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_Actors" id="Video_OG_Actors" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_Actors']) ? $posttypes_metatags_metabox_settings['Video_OG_Actors'] : $post_author_user_info->user_login) ?>" />
                        <div><?php _e('The actors of the film/video','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Writer','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_OG_Writer" id="Video_OG_Writer" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_OG_Writer']) ? $posttypes_metatags_metabox_settings['Video_OG_Writer'] : $post_author_user_info->user_login) ?>" />
                        <div><?php _e('The script writer of the film/video','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
            </table>
        </div><hr />

		<div id="product_opengraph_wrapper"><div><hr /><hr /></div>
        	<h3><?php _e('Product: Open Graph Meta Tags Settings','mam_pt_metatags_txtdmn')?></h3>        
            <table width="100%">
                <tr>
                    <th width="25%" valign="top" style="text-align:left"><?php _e('Brand','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Product_OG_Brand" id="Product_OG_Brand" value="<?php echo (isset($posttypes_metatags_metabox_settings['Product_OG_Brand']) ? $posttypes_metatags_metabox_settings['Product_OG_Brand'] : '') ?>" />
                        <div><?php _e('The brand of the product or its original manufacturer','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Availability','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Product_OG_Availability" id="Product_OG_Availability" value="<?php echo (isset($posttypes_metatags_metabox_settings['Product_OG_Availability']) ? $posttypes_metatags_metabox_settings['Product_OG_Availability'] : '') ?>" />
                        <div><?php _e('The availability of the product, one of \'instock\', \'oos\', \'pending\', \'preorder\', \'out of stock\', \'discontinued\'','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Price','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Product_OG_Price" id="Product_OG_Price" value="<?php echo (isset($posttypes_metatags_metabox_settings['Product_OG_Price']) ? $posttypes_metatags_metabox_settings['Product_OG_Price'] : '') ?>" />
                        <div><?php _e('The product price (without any currency sign, e.g., "6.50")','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Price Currency','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Product_OG_Price_Currency" id="Product_OG_Price_Currency" value="<?php echo (isset($posttypes_metatags_metabox_settings['Product_OG_Price_Currency']) ? $posttypes_metatags_metabox_settings['Product_OG_Price_Currency'] : '') ?>" />
                        <div><?php _e('The currency code (e.g., "USD")','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
            </table>
        </div><hr />

    </div><!-- id="opengraph_wrapper" -->
    <hr />
    
    
    <div id="twitter_wrapper"><div><hr /><hr /></div>
        <h3><?php _e('Twitter Meta Tags Settings','mam_pt_metatags_txtdmn')?></h3>
        <table width="100%">
            <tr>
                <th width="25%" style="text-align:left"><?php _e('Publisher’s handle','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_T_Publisher" id="T_Publisher" value="<?php echo (isset($posttypes_metatags_metabox_settings['T_Publisher']) ? $posttypes_metatags_metabox_settings['T_Publisher'] : $post_author_user_info->user_login) ?>" /></td>            
            </tr>
            <tr>
                <th style="text-align:left"><?php _e('Article author’s handle','mam_pt_metatags_txtdmn')?></th>
                <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_T_Author" id="T_Author" value="<?php echo (isset($posttypes_metatags_metabox_settings['T_Author']) ? $posttypes_metatags_metabox_settings['T_Author'] : $post_author_user_info->user_login) ?>" /></td>            
            </tr>
            <tr>
                <th valign="top" style="text-align:left"><?php _e('Preview Image','mam_pt_metatags_txtdmn')?></th>
                <td>
                	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_T_Preview_Image" id="T_Preview_Image" value="<?php echo (isset($posttypes_metatags_metabox_settings['T_Preview_Image']) ? $posttypes_metatags_metabox_settings['T_Preview_Image'] : wp_get_attachment_url( $feature_image_id )) ?>" />
                    <div><?php _e('Maximum dimension: 1024px x 512px; minimum dimension: 440px x 220px','mam_pt_metatags_txtdmn')?></div><br />
                </td>            
            </tr>
            <tr>
                <th valign="top" style="text-align:left"><?php _e('Video/Audio Player Source','mam_pt_metatags_txtdmn')?></th>
                <td>
                	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_T_Video_Audio_Player_Source" id="T_Video_Audio_Player_Source" value="<?php echo (isset($posttypes_metatags_metabox_settings['T_Video_Audio_Player_Source']) ? $posttypes_metatags_metabox_settings['T_Video_Audio_Player_Source'] : '') ?>" />
                    <div><?php _e('HTTPS URL to an iFrame player','mam_pt_metatags_txtdmn')?></div><br />
                </td>            
            </tr>
        </table><hr />
        
        <div id="mobileApp_twitter_wrapper"><div><hr /><hr /></div>
        	<h3><?php _e('Mobile App: Twitter Meta Tags Settings','mam_pt_metatags_txtdmn')?></h3>        
            <table width="100%">
                <tr>
                	<th valign="top" width="25%" style="text-align:left"><?php _e('The country your app is available in','mam_pt_metatags_txtdmn')?></th>
                	<td>
                    	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_MobileApp_T_Country_Code" id="MobileApp_T_Country_Code" value="<?php echo (isset($posttypes_metatags_metabox_settings['MobileApp_T_Country_Code']) ? $posttypes_metatags_metabox_settings['MobileApp_T_Country_Code'] : '') ?>" />
                        <div><?php _e('Fill only if your app is unavailable in the US','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
            </table>
        </div><hr />
        
        
        <div id="video_twitter_wrapper"><div><hr /><hr /></div>
        	<h3><?php _e('Video: Twitter Meta Tags Settings','mam_pt_metatags_txtdmn')?></h3>        
            <table width="100%">
                <tr>
                	<th valign="top" width="25%" style="text-align:left"><?php _e('Raw Stream URL','mam_pt_metatags_txtdmn')?></th>
                	<td>
                    	<input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_T_URL" id="Video_T_URL" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_T_URL']) ? $posttypes_metatags_metabox_settings['Video_T_URL'] : '') ?>" />
                        <div><?php _e('The media is rendered in Twitter’s mobile app directly. If provided, the stream must be delivered in the MPEG-4 container format (the .mp4 extension).','mam_pt_metatags_txtdmn')?></div><br />
                    </td>
                </tr>
 				<tr>
                    <th valign="top" style="text-align:left"><?php _e('Media Content Type','mam_pt_metatags_txtdmn')?></th>
                    <td>
                        <input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_T_Media_Content_Type" id="Video_T_Media_Content_Type" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_T_Media_Content_Type']) ? $posttypes_metatags_metabox_settings['Video_T_Media_Content_Type'] : '') ?>" />
                        <div><?php _e('The MIME type/subtype combination that describes the content contained in twitter:player:stream. Takes the form specified in RFC 6381.','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
            	</tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Twitter Video Width (pixels)','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_T_Video_Width" id="Video_T_Video_Width" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_T_Video_Width']) ? $posttypes_metatags_metabox_settings['Video_T_Video_Width'] : @$options_posttype_metatags_metabox_settings['Video_T_Video_Width']) ?>" />
                    	<div><?php _e('Width of the iFrame player specified in twitter:player in pixels','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
                <tr>
                    <th valign="top" style="text-align:left"><?php _e('Twitter Video Height (pixels)','mam_pt_metatags_txtdmn')?></th>
                    <td><input style="width:100%" type="text" name="this_pt_mtags_mb_settings_Video_T_Video_Height" id="Video_T_Video_Height" value="<?php echo (isset($posttypes_metatags_metabox_settings['Video_T_Video_Height']) ? $posttypes_metatags_metabox_settings['Video_T_Video_Height'] : @$options_posttype_metatags_metabox_settings['Video_T_Video_Height']) ?>" />
                    	<div><?php _e('Height of the iFrame player specified in twitter:player in pixels','mam_pt_metatags_txtdmn')?></div><br />
                    </td>            
                </tr>
            </table>
        </div><hr />
    </div><!-- id="twitter_wrapper" -->
	<?php do_action('backend__add_more_metatag_html_fields')?>
	
    	
	<script>
		jQuery(document).ready(function(e) {
			
			if(jQuery('.kind_of_website:checked').val() == 'mobileApp'){
				jQuery('#mobileApp_wrapper').attr('style','display:block');
				jQuery('#mobileApp_twitter_wrapper').attr('style','display:block');
				
				jQuery('#article_opengraph_wrapper').attr('style','display:none');
				jQuery('#video_opengraph_wrapper').attr('style','display:none');
				jQuery('#product_opengraph_wrapper').attr('style','display:none');
				jQuery('#video_twitter_wrapper').attr('style','display:none');
			}
			else if(jQuery('.kind_of_website:checked').val() == 'article'){
				jQuery('#article_opengraph_wrapper').attr('style','display:block');
				
				jQuery('#mobileApp_wrapper').attr('style','display:none');
				jQuery('#mobileApp_twitter_wrapper').attr('style','display:none');
				jQuery('#video_opengraph_wrapper').attr('style','display:none');
				jQuery('#product_opengraph_wrapper').attr('style','display:none');
				jQuery('#video_twitter_wrapper').attr('style','display:none');
			}
				
			else if(jQuery('.kind_of_website:checked').val() == 'video'){
				jQuery('#video_opengraph_wrapper').attr('style','display:block');
				jQuery('#video_twitter_wrapper').attr('style','display:block');

				jQuery('#mobileApp_wrapper').attr('style','display:none');
				jQuery('#mobileApp_twitter_wrapper').attr('style','display:none');
				jQuery('#article_opengraph_wrapper').attr('style','display:none');
				jQuery('#product_opengraph_wrapper').attr('style','display:none');
			}
				
			else if(jQuery('.kind_of_website:checked').val() == 'product'){
				jQuery('#product_opengraph_wrapper').attr('style','display:block');

				jQuery('#mobileApp_wrapper').attr('style','display:none');
				jQuery('#mobileApp_twitter_wrapper').attr('style','display:none');
				jQuery('#article_opengraph_wrapper').attr('style','display:none');
				jQuery('#video_opengraph_wrapper').attr('style','display:none');
				jQuery('#video_twitter_wrapper').attr('style','display:none');
			}

				
			else{
				jQuery('#mobileApp_wrapper').attr('style','display:none');
				jQuery('#mobileApp_twitter_wrapper').attr('style','display:none');
				jQuery('#article_opengraph_wrapper').attr('style','display:none');
				jQuery('#video_opengraph_wrapper').attr('style','display:none');
				jQuery('#product_opengraph_wrapper').attr('style','display:none');
				jQuery('#video_twitter_wrapper').attr('style','display:none');
			}


			
			jQuery('#twitter_wrapper').attr('style','display:none');
			jQuery('#opengraph_wrapper').attr('style','display:none');
			
			jQuery('.which_platforms:checked').each(function () {
				
				if(jQuery(this).is(':checked') && jQuery(this).val() == 'openGraph')
					jQuery('#opengraph_wrapper').attr('style','display:block');
					
				else if(jQuery(this).is(':checked') && jQuery(this).val() == 'twitter')
					jQuery('#twitter_wrapper').attr('style','display:block');
			
			});
								
            jQuery(document.body).on('click','.which_platforms',function(e){
				
				if(jQuery(this).is(':checked') && jQuery(this).val() == 'openGraph')
					jQuery('#opengraph_wrapper').attr('style','display:block');
					
				else if(jQuery(this).is(':checked') && jQuery(this).val() == 'twitter')
					jQuery('#twitter_wrapper').attr('style','display:block');
				
					
				else if(jQuery(this).is(':not(:checked)') && jQuery(this).val() == 'openGraph')
					jQuery('#opengraph_wrapper').attr('style','display:none');
				
				
				else if(jQuery(this).is(':not(:checked)') && jQuery(this).val() == 'twitter' )
					jQuery('#twitter_wrapper').attr('style','display:none');
			}); // jQuery(document.body).on('click','.which_platforms'


            jQuery(document.body).on('change','.kind_of_website',function(e){
				if(jQuery('.kind_of_website:checked').val() == 'mobileApp'){
					jQuery('#mobileApp_wrapper').attr('style','display:block');
					jQuery('#mobileApp_twitter_wrapper').attr('style','display:block');
					
					jQuery('#article_opengraph_wrapper').attr('style','display:none');
					jQuery('#video_opengraph_wrapper').attr('style','display:none');
					jQuery('#product_opengraph_wrapper').attr('style','display:none');
					jQuery('#video_twitter_wrapper').attr('style','display:none');
				}
				else if(jQuery('.kind_of_website:checked').val() == 'article'){
					jQuery('#article_opengraph_wrapper').attr('style','display:block');
					
					jQuery('#mobileApp_wrapper').attr('style','display:none');
					jQuery('#mobileApp_twitter_wrapper').attr('style','display:none');
					jQuery('#video_opengraph_wrapper').attr('style','display:none');
					jQuery('#product_opengraph_wrapper').attr('style','display:none');
					jQuery('#video_twitter_wrapper').attr('style','display:none');
				}
					
				else if(jQuery('.kind_of_website:checked').val() == 'video'){
					jQuery('#video_opengraph_wrapper').attr('style','display:block');
					jQuery('#video_twitter_wrapper').attr('style','display:block');

					jQuery('#mobileApp_wrapper').attr('style','display:none');
					jQuery('#mobileApp_twitter_wrapper').attr('style','display:none');
					jQuery('#article_opengraph_wrapper').attr('style','display:none');
					jQuery('#product_opengraph_wrapper').attr('style','display:none');
				}
					
				else if(jQuery('.kind_of_website:checked').val() == 'product'){
					jQuery('#product_opengraph_wrapper').attr('style','display:block');

					jQuery('#mobileApp_wrapper').attr('style','display:none');
					jQuery('#mobileApp_twitter_wrapper').attr('style','display:none');
					jQuery('#article_opengraph_wrapper').attr('style','display:none');
					jQuery('#video_opengraph_wrapper').attr('style','display:none');
					jQuery('#video_twitter_wrapper').attr('style','display:none');
				}

					
				else{
					jQuery('#mobileApp_wrapper').attr('style','display:none');
					jQuery('#mobileApp_twitter_wrapper').attr('style','display:none');
					jQuery('#article_opengraph_wrapper').attr('style','display:none');
					jQuery('#video_opengraph_wrapper').attr('style','display:none');
					jQuery('#product_opengraph_wrapper').attr('style','display:none');
					jQuery('#video_twitter_wrapper').attr('style','display:none');
				}
			}); // jQuery(document.body).on('change','.kind_of_website  
        }); // ready
	</script>
	
<?php  wp_nonce_field('posttypes_metatags_metabox_settings', 'posttypes_metatags_metabox_settings-value');
} // function posttypes_metatags_metabox_settingsCBF($this_post_obj)


function save_posttypes_metatags_metabox_settingsCBF($this_post_id){
	
	if(wp_verify_nonce( $_POST['posttypes_metatags_metabox_settings-value'], 'posttypes_metatags_metabox_settings' )){
		$posttypes_metatags_metabox_settings = array();
		foreach($_POST as $posted_data_key => $posted_data_val){
			if(strpos($posted_data_key,'his_pt_mtags_mb_settings_') !== false && !empty($posted_data_val))
				$posttypes_metatags_metabox_settings[str_replace('this_pt_mtags_mb_settings_','',$posted_data_key)] = sanitize_text_field($posted_data_val);
			if(strpos($posted_data_key,'his_pt_mtags_mb_settings_which') !== false && !empty($posted_data_val))
				$posttypes_metatags_metabox_settings[str_replace('this_pt_mtags_mb_settings_','',$posted_data_key)] = ($posted_data_val);
		}
		update_metadata('post',$this_post_id,'this_posttype_metatags_metabox_settings',$posttypes_metatags_metabox_settings);
		update_option('this_posttype_metatags_metabox_settings_options',$posttypes_metatags_metabox_settings);
		
	
	} // if(wp_verify_nonce( $_POST['posttypes_metatags_metabox_settings-value'], 'posttypes_metatags_metabox_settings' )){
	
} // function save_posttypes_metatags_metabox_settingsCBF
?>