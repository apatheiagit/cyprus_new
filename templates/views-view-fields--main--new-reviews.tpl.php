<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'path') { $path = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_section') { $section = $field->content; }
    if($id == 'field_type') { $type = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
    if($id == 'field_rubtic') { $rubric = $field->content; }
    if($id == 'field_special') { $special = $field->content; }
    if($id == 'field_specproekt') { $specproekt_tid = $field->content; }
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
 	if (isset($rubric)){
 		$term = taxonomy_term_load($rubric);
 		$rubric_type = $term->field_english['und'][0]['value']; 		
 	}
 	if (isset($specproekt_tid)){
 		$specproekt_term = taxonomy_term_load($specproekt_tid);	
 		$specproekt_name_localize = i18n_taxonomy_localize_terms($specproekt_term);
 		$specproekt = $specproekt_name_localize->name;	
 	}
 	$titleLength = iconv_strlen($title, 'UTF-8');
?>
<div class="media-block media-block--review media-block--new-review <?php if(isset($rubric_type)):?>media-block--rubric<?endif;?>  media-block--<?php print $english;?>">
	<?php if(isset($rubric_type) && $type != "photo"):?>
		<div class="rubric">
			<a href="<?php print $path;?>"><span class="canvas canvas--<?php print $rubric_type;?>"></span></a>
		</div>
	<?php endif;?>
	<div class="photo">		
		<?php print $image;?>
	</div>	
	<div class="text">
		<?php if($type == 'photo'):?>
			<a class="photo-icon" href="<?php print $prefix;?>/photoreviews"></a>
		<?php endif;?>
		<div class="category">
		<?php if($special == 1):?>
			<?php if(isset($specproekt_tid)):?>
				<a href="<?php print $prefix;?>/special/<?php print $specproekt_tid;?>"><?php print $specproekt;?></a>
			<?php else:?>
				<a href="<?php print $prefix;?>/special"><?php print t("Special project"); ?></a>
			<?php endif;?>
		<?php elseif($type == 'lifehack'):?>
				<a href="<?php print $prefix;?>/lifehack"><?php print t("Life hack"); ?></a>
		<?php elseif(isset($city)):?>
				<a href="<?php print $prefix;?>/reviews/<?php print $city;?>"><?php print $city_name; ?></a>
		<?php else:?>
				<a href="<?php print $prefix;?>/<?php print $english;?>"><?php print $russian; ?></a>
		<?php endif;?>
		</div>		
		<div class="title"><a href="<?php print $path;?>"><?php print $title?></a></div>		
		<div class="descr <?php if ($titleLength > 46):?> covert<?php endif;?>"><a href="<?php print $path;?>"><?php print $body;?></a></div>		
	</div>
	<div class="statistic">
		<div class="metrika metrika-watch"><?php print file_get_contents($theme_path."/img/views.svg");?><span class="count"><?php print $totalcount;?></span></div>
	</div>
</div>
