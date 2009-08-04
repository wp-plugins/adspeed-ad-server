<?php
 class CAdSpeedPluginForWP { public static function init() { register_sidebar_widget('AdSpeed Ad Server',array('CAdSpeedPluginForWP','renderSidebar')); register_widget_control('AdSpeed Ad Server',array('CAdSpeedPluginForWP','displaySidebarControl')); add_action('admin_menu',array('CAdSpeedPluginForWP','displayAdminMenu')); add_filter('the_content',array('CAdSpeedPluginForWP','replacePostTag')); } public static function displayAdminMenu() { add_options_page( 'options-general.php', 'AdSpeed Ad Server', 8, basename(__FILE__), array('CAdSpeedPluginForWP','displayAdminOptions') ); } public static function displayAdminOptions() { add_option('AdSpeedSettings_Username',''); if (isset($_POST['AdSpeedSettings_Username'])) { update_option('AdSpeedSettings_Username',$_POST['AdSpeedSettings_Username']); } $vOutput = '
		<div class="wrap">
			<h2>AdSpeed.com Plugin For WordPress</h2>
			This plugin displays advertising on the sidebar and inside a blog post. 	

			<h3>Ads on the Sidebar</h3>
			Click on menu Appearance/Widgets and drag <b>AdSpeed Ad Server</b> to the sidebar. You can then choose how many ad placements to be serve on the sidebar. For each ad placement, you need to specify a zone identification. This zone must exist in your AdSpeed account.

			<h3>Ads in a Blog Entry</h3>
			To use it in a post, write this macro <code>{AdSpeed:Zone:1234}</code> (with 1234 to be a zone identification in your AdSpeed account) where you want the ad to display. The macro will be replaced with the serving code for the zone.
			
			<h3>Settings</h3>
			<form name="AdSpeedSettings" method="post" action="'.$_SERVER['PHP_SELF'].'?page=AdSpeed.wp.php&updated=true">	
			<table class="form-table">
			<tr valign="top">
			<th scope="row">Username</th>
			<td><input type="text" name="AdSpeedSettings_Username" value="'.get_option('AdSpeedSettings_Username').'" /></td>
			</tr>
			</table>
			<p class="submit"><input type="submit" name="AdSpeedSubmit" class="button-primary" value="Save" /></p>
			</form>
		</div>
		'; echo($vOutput); } public static function renderSidebar() { $vZoneIDs = get_option('AdSpeedSettings_SidebarZoneIDs'); $vOutput = ''; foreach ($vZoneIDs AS $vOne) { $vOutput .= self::getServingCode($vOne); } echo $before_widget; echo $before_title; echo $vOutput; echo $after_title; echo $after_widget; } public static function getServingCode($pZoneID) { $vOutput = '<div class="AdSpeedWP">
		<!-- AdSpeed.com Serving Code 7.9.4 for [Zone] #'.$pZoneID.' [Any Dimension] -->
		<script type="text/javascript" src="http://g.adspeed.net/ad.php?do=js&zid='.$pZoneID.'&wd=-1&ht=-1&target=_blank&cb='.time().'"></script>
		<!-- AdSpeed.com End --></div>'; return $vOutput; } public static function replacePostTag($pContent) { if (preg_match_all('/{AdSpeed:Zone:([0-9]+)}/',$pContent,$vMatches)) { foreach ($vMatches[1] AS $vOne) { $pContent = str_replace('{AdSpeed:Zone:'.$vOne.'}',self::getServingCode($vOne),$pContent); } } return $pContent; } public static function displaySidebarControl() { $vZoneIDs = get_option('AdSpeedSettings_SidebarZoneIDs'); if (!is_array($vZoneIDs)) { $vZoneIDs = array(); } if (isset($_POST['AdSpeedSubmit'])) { $vZoneIDs = array(); foreach ($_POST['AdSpeedZones'] AS $vOne) { if (!empty($vOne)) { $vZoneIDs[] = $vOne; } } update_option('AdSpeedSettings_SidebarZoneIDs',$vZoneIDs); } $vOutput = '
			<script type="text/javascript">
			var vZoneIDs = ['.implode(',',$vZoneIDs).'];
			
			function AS_changeNumZones(pNumZones) {
				// there are 2 AdSpeedZonesDiv for some reason so cannot use ID (why?)
				jQuery("div[name=\'AdSpeedZonesDiv\']").html("<h4>Zone ID for each ad placement</h4>"); // reset
				
				var vBody = "";
				var vTotal = typeof(pNumZones)!="undefined" ? pNumZones : vZoneIDs.length;
				for (i=0;i<vTotal;i++) {
					var vPlus = i+1;
					var vValue = typeof(vZoneIDs[i])!="undefined" ? vZoneIDs[i] : "";
					vBody += "<label for=\"AdSpeedZones["+i+"]\">Placement #"+vPlus+"</label><br/>";
					vBody += "<input type=\"text\" id=\"AdSpeedZones["+i+"]\" name=\"AdSpeedZones["+i+"]\" value=\""+vValue+"\" size=\"10\" /><br/>";					
				} // rof
				
				jQuery("div[name=\'AdSpeedZonesDiv\']").html(vBody);
			}
			</script>
			<label for="AdSpeed_NumZones">Number of ad placements: </label>
			<select name="AdSpeed_NumZones" id="AdSpeed_NumZones" onchange="AS_changeNumZones(jQuery(this).val());">
		'; for ($i=0;$i<=10;$i++) { $vOutput .= '<option value="'.$i.'" '.($i==count($vZoneIDs) ? 'selected="selected"' : '').'>'.$i.'</option>'; } $vOutput .= '</select>'; $vOutput .= '<div name="AdSpeedZonesDiv" id="AdSpeedZonesDiv"><h4>Zone ID for each ad placement</h4></div>'; $vOutput .= '<script type="text/javascript">AS_changeNumZones();</script>'; $vOutput .= '<input type="hidden" name="AdSpeedSubmit" id="AdSpeedSubmit" value="true" />'; echo($vOutput); } } add_action('plugins_loaded',array('CAdSpeedPluginForWP','init')); ?>
