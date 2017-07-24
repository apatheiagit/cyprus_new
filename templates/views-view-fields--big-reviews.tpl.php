<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'path') { $path = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_section') { $section = $field->content; }
    if($id == 'field_city') { $city = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'field_heading') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
    if($id == 'field_specproekt') { $specproekt_tid = $field->content; }
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
 		if ($city == '134' && $lang == 'ru') $city_name = "Весь Кипр";
 	}
	if (isset($section)){
 		$terms = taxonomy_term_load($section);
 		$english = $terms->field_english['und'][0]['value'];
 		$russian_name_localize = i18n_taxonomy_localize_terms($terms);
 		$russian = $russian_name_localize->name;
 	}
 	if (isset($specproekt_tid)){
 		$specproekt_term = taxonomy_term_load($specproekt_tid);	
 		$specproekt_name_localize = i18n_taxonomy_localize_terms($specproekt_term);
 		$specproekt = $specproekt_name_localize->name;	 		
 	}
?>
<div class="media-block media-block--review media-block--index media-block--<?php print $english;?>">
	<div class="photo">
		<?php print $image;?>
	</div>
	<div class="container">
		<div class="text">		
			<div class="category">
				<?php if(isset($specproekt_tid)):?>
					<a href="<?php print $prefix;?>/special/<?php print $specproekt_tid;?>"><?php print $specproekt;?></a>
				<?php elseif(isset($city)):?>
						<a href="<?php print $prefix;?>/reviews/<?php print $city;?>"><?php print $city_name; ?></a>
				<?php else:?>
						<a href="<?php print $prefix;?>/<?php print $english;?>"><?php print $russian; ?></a>
				<?php endif;?>
			</div>		
			<div class="title">
				<span class="big"><a href="<?php print $path;?>"><?php print $title?></a></span><!--<br><span class="small"><a href="<?php print $path;?>"><?php print $subtitle?></a></span>-->
			</div>
			<div class="statistic">
				<div class="metrika metrika-watch"><?php print file_get_contents($theme_path."/img/views.svg");?><span class="count"><?php print $totalcount;?></span></div>
			</div>
		</div>
	</div>
</div>
