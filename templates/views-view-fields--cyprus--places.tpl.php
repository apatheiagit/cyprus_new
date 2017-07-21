<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'path') { $path = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_city') { $city = $field->content; }
    if($id == 'field_when') { $when = $field->content; }
    if($id == 'field_category') { $event_type = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
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
 	}
 	if (isset($event_type)){
 		$term_type = taxonomy_term_load($event_type);
 		$type_name_localize = i18n_taxonomy_localize_terms($term_type);
 		$type_name = $type_name_localize->name;
 	}  
 	$titleLength = iconv_strlen($title, 'UTF-8');
 ?>
<div class="col-sm-6 col-md-3 media-wrapper--small">
	<div class="media-block media-block--quarter media-block--place">
		<div class="photo"><?php print $image;?></div>
		<div class="text">
			<div class="category"><a href="<?php print $prefix;?>/places?city=<?php print $city;?>"><?php print $city_name;?></a></div>
			<!--<div class="category"><a href="<?php print $prefix;?>/places?category=<?php print $event_type;?>"><?php print $type_name;?></a></div>-->
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