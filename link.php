<?php

	define('DRUPAL_ROOT', getcwd());
	include_once DRUPAL_ROOT . '/includes/bootstrap.inc';
	drupal_bootstrap(DRUPAL_BOOTSTRAP_FULL);

	$alias = $_GET['url'];
	$alias = str_replace('http://cyprusfortravellers.net', '', $alias);
	$alias = ltrim($alias, '/');
	$path = drupal_lookup_path("source", $alias);
	$node = menu_get_object("node", 1, $path);
	$image = file_create_url($node->field_main_img['und'][0]['uri']);
	if (isset($node->field_title['und'][0]['value'])) $title = $node->field_title['und'][0]['value'];
	else $title = $node->title;
	print '<div class="tooltip tooltip-bottom link-tooltip"><div class="tooltip-inner" style="background-image:url('.$image.')"><div class="tooltip-title"><a href="/'.$alias.'">'.$title.'</a></div></div></div>';

?>