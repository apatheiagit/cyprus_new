<?php

	define('DRUPAL_ROOT', getcwd());
	include_once DRUPAL_ROOT . '/includes/bootstrap.inc';
	drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);
	
	$lang = $_GET['lang'];
	$alias = $_GET['url'];
	$alias = str_replace('http://cyprusfortravellers.net', '', $alias);
	$alias = ltrim($alias, '/');
	if ($lang == 'en'){
		$alias = ltrim($alias, 'en/');
	}
	$path = drupal_lookup_path("source", $alias, $lang);
	$node = menu_get_object("node", 1, $path);
	$image = file_create_url($node->field_main_img['und'][0]['uri']);
	if (isset($node->field_title['und'][0]['value'])) $title = $node->field_title['und'][0]['value'];
	else $title = $node->title;
	$output = '<div class="tooltip tooltip-bottom link-tooltip"><div class="tooltip-inner" style="background-image:url('.$image.')"><div class="tooltip-title"><a href="'.$_GET['url'].'">'.$title.'</a></div></div></div>';
	print $output;
?>