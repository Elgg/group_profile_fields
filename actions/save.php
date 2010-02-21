<?php

	admin_gatekeeper();
	$max = (int)get_input('max_fields');
	
	$names = get_input('name');
	$types = get_input('type');
	$save_array = array();
	
	foreach ($names as $index => $name)
	{
		if ($name)
		{
			$save_array[$name] = $types[$index];
		}
	}
	
	if (count($save_array))
	{
		$serialised = serialize($save_array);
		if ($serialised)
		{
			if (set_plugin_setting('group_profile', $serialised, 'groupprofilefields'))
				system_message(elgg_echo('groupprofilefields:save:success'));
			else
				register_error(elgg_echo('groupprofilefields:save:failure'));	
		}
		else
			register_error(elgg_echo('groupprofilefields:save:failure'));
	}
	else
		register_error(elgg_echo('groupprofilefields:save:failure'));
	
	forward($_SERVER['HTTP_REFERER']);
?>
