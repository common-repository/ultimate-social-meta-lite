<?php
add_action( 'admin_menu', 'admin_menu_add_posttypes_metatags_settings_pageCBF');
function admin_menu_add_posttypes_metatags_settings_pageCBF(){
	add_menu_page( 'Posttypes Metatags Settings', 'Posttypes Metatags Settings', 'manage_options', 'posttypes_metatags_settings', 'posttypes_metatags_settingsCBF' );	
} // function admin_menu_add_posttypes_metatags_settings_pageCBF

function posttypes_metatags_settingsCBF(){
	if(isset($_POST['posttypes_metatags_settingsBtn'])){
		$status_disappeared_yoast_metatags = isset($_POST['disappeared_yoast_metatags']) ? 'disappeared' : 'appeared';
		update_option('status_disappeared_yoast_metatags',$status_disappeared_yoast_metatags);
	}
	$status_disappeared_yoast_metatags = get_option('status_disappeared_yoast_metatags','disappeared');?>
	<h1>Posttypes Metatags Settings</h1>
    <form method="post">
		<table class="form-table">
        	<tr>
				<th scope="row"><label for="disappeared_yoast_metatags">Block "Yoast SEO" Metatags?</label></th>
				<td>
                	<input name="disappeared_yoast_metatags" type="checkbox" id="disappeared_yoast_metatags" value="disappeared" class="regular-text" <?php echo ($status_disappeared_yoast_metatags == 'disappeared' ? 'checked' : '') ?> />
                </td>
			</tr>
			<tr><td>
			<a target="_blank" href="https://codecanyon.net/item/ultimate-social-meta-pro/7215252?ref=alisaleem252">Get Premium</a>

			</td></tr>
		</table>
     <p>
     	<input type="submit" name="posttypes_metatags_settingsBtn" class="button button-primary" value="Save Changes" />
     </p>
    </form>
<?php
} // function posttypes_metatags_settingsCBF
?>