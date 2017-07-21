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
    if($id == 'field_event_type') { $event_type = $field->content; }
    if($id == 'field_when_1') { $when_start = $field->content; }
    if($id == 'field_when_2') { $when_end = $field->content; }
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
<div class="col-sm-4 media-wrapper--normal">
<div class="media-block media-block--review media-block--event">
	<div class="photo">		
		<?php print $image;?>
	</div>	
	<div class="text">
		<div class="category">
			<a href="<?php print $prefix;?>/events?city=<?php print $city;?>"><?php print $city_name;?></a>
			<span class="date">
				<?php if ($when_start == $when_end){
					print $when;
				}else{
					print $when_start." - ".$when_end;
				}?>
			</span>
		</div>		
		<div class="title"><a href="<?php print $path;?>"><?php print $title?></a></div>
		<?php if ($titleLength < 46):?>
			<div class="descr"><a href="<?php print $path;?>"><?php print $body;?></a></div>
		<?php endif;?>
	</div>
	<div class="statistic">
		<div class="metrika metrika-watch"><?php print file_get_contents($theme_path."/img/views.svg");?><span class="count"><?php print $totalcount;?></span></div>
	</div>
</div>
</div>