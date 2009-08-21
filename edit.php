<?php
	require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
	admin_gatekeeper();
	
	set_context('admin');
	
	$type_options = array(
		'text' => elgg_echo('text'),
		'longtext' => elgg_echo('longtext'),
		'tags' => elgg_echo('tags'),
		'url' => elgg_echo('url'),
		'email' => elgg_echo('email')
	);
	
	$max_fields = 20;
	
	$title = elgg_view_title(elgg_echo('groupprofilefields'));
	
	$body = elgg_view('page_elements/contentwrapper', array('body' => elgg_echo('groupprofilefields:description')) );
	$body .= elgg_view('groupprofilefields/forms/edit', array('options' => $type_options, 'max_fields' => $max_fields));
	
	page_draw(elgg_echo('groupprofilefields'), elgg_view_layout("two_column_left_sidebar", $area1, $title.$body));
?>