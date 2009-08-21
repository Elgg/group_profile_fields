<?php

	function groupprofilefields_init()
	{
		global $CONFIG;
		
		register_plugin_hook('profile:fields', 'group', 'groupprofilefields_profile_hook');
		
		register_page_handler('groupprofile','groupprofilefields_page_handler');
		
		register_action("groupprofilefields/save",false, $CONFIG->pluginspath . "groupprofilefields/actions/save.php", true);
		
	}
	
	function groupprofilefields_pagesetup()
	{
		global $CONFIG;
	
		if (get_context() == 'admin' && isadminloggedin()) {
			
			add_submenu_item(elgg_echo('groupprofilefields'), $CONFIG->wwwroot . 'pg/groupprofile/edit/');
		}
	}
	
	function groupprofilefields_profile_hook($hook, $entity_type, $returnvalue, $params)
	{
		$group_profile = get_plugin_setting('group_profile', 'groupprofilefields');
		
		if ($group_profile)
		{
			$group_profile_array = unserialize($group_profile);
			
			if (($group_profile_array) && (is_array($group_profile_array)))
				return $group_profile_array;
		}
	}
	
	function groupprofilefields_page_handler($page) 
	{
		global $CONFIG;
		
		
		if (isset($page[0]))
		{
			// See what context we're using
			switch($page[0])
			{
				
    			case "edit" :			
    			default:
    				include($CONFIG->pluginspath . "groupprofilefields/edit.php");
    			break;
			}
		}
		
	}
	
	register_elgg_event_handler('init','system','groupprofilefields_init');
	
	register_elgg_event_handler('pagesetup','system','groupprofilefields_pagesetup');
?>