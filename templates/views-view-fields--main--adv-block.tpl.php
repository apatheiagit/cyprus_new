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
<div class="media-wrapper--large">
<div class="media-block media-block--event">
	
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
		<div class="metrika metrika-watch">
			<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
				<path d="M1 12C1 12 5 4 12 4C19 4 23 12 23 12C23 12 19 20 12 20C5 20 1 12 1 12Z" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
				<path d="M12 15C13.6569 15 15 13.6569 15 12C15 10.3431 13.6569 9 12 9C10.3431 9 9 10.3431 9 12C9 13.6569 10.3431 15 12 15Z" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
			</svg>
			<span class="count"><?php print $totalcount;?></span>
		</div>
	</div>
</div>
</div>