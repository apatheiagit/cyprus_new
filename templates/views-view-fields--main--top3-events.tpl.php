<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'path') { $path = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_city') { $city = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
    if($id == 'field_when') { $when = $field->content; }
    if($id == 'field_when_1') { $when_1 = $field->content; }
    if($id == 'field_event_type') { $event_type = $field->content; }
 endforeach; ?>

<?php 	
	$theme_path = path_to_theme();
	global $language_content; 
	$lang = $language_content->language;
	if ($lang == 'en') $prefix = '/en'; else $prefix = '';
	if (isset($city)){
 		$term_city = taxonomy_term_load($city);
 		$city_name_localize = i18n_taxonomy_localize_terms($term_city);
 		$city_name = $city_name_localize->name;
 		if ($city == '134' && $lang == 'ru') $city_name = "Весь Кипр";
 	}
 	$titleLength = iconv_strlen($title, 'UTF-8');
?>
<div class="media-block media-block--event">
	<div class="nav-block">
		<div class="next-event nav-btn"><?php print file_get_contents($theme_path."/img/left.svg");?></div>
		<div class="start-date"><?php print $when_1;?></div>
		<div class="prev-event nav-btn"><?php print file_get_contents($theme_path."/img/right.svg");?></div>
	</div>
	<div class="photo">		
		<?php print $image;?>
	</div>	
	<div class="text">	
		<div class="category">
			<a href="<?php print $prefix;?>/events?city=<?php print $city;?>"><?php print $city_name;?></a>
			<span class="date"><?php print $when;?></span>
		</div>		
		<div class="title"><a href="<?php print $path;?>"><?php print $title?></a></div>
		<?php if ($titleLength < 46):?>
			<div class="descr"><a href="<?php print $path;?>"><?php print $body;?></a></div>
		<?php endif;?>
		<div class="kind"><?php print $event_type;?></div>
	</div>
	<div class="statistic">
		<div class="metrika metrika-watch"><?php print file_get_contents($theme_path."/img/views.svg");?><span class="count"><?php print $totalcount;?></span></div>
	</div>
</div>