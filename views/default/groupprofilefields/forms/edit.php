<?php

	global $CONFIG;
	
	$type_options = $vars['options'];
	$max_fields = $vars['max_fields']; 
	
	$profile = unserialize(get_plugin_setting('group_profile', 'groupprofilefields'));
	
	$name_array = array();
	$type_array = array();
	if (is_array($profile)) 
	{
		foreach ($profile as $k => $v)
		{
			$name_array[] = $k;
			$type_array[] = $v;
		}
	} 
	
	$body .= elgg_view('input/hidden', array('internalname' => 'max_fields', 'value' => $max_fields));
	for ($n = 0; $n < $max_fields; $n++)
	{
		$name = "";
		if (isset($name_array[$n]))
			$name = $name_array[$n];
		
		$type = "";
		if (isset($type_array[$n]))
			$type = $type_array[$n];
		
		
		$body .= elgg_view('page_elements/contentwrapper', array('body' =>
			elgg_view('input/text', array('internalname' => "name[]", 'value' => $name)) .
			elgg_view('input/pulldown', array('internalname' => "type[]", 'options_values' => $type_options, 'value' => $type))
		));
		
	}
	$body .= elgg_view('page_elements/contentwrapper', array('body' => elgg_view('input/submit', array('internalname' => elgg_echo('save'), 'value' => elgg_echo('save'))) ));
	
	echo elgg_view('input/form', array('action' => $CONFIG->wwwroot . "action/groupprofilefields/save", 'body' => $body));
?>