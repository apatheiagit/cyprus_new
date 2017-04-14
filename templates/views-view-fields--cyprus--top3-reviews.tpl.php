<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'field_city') { $city = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'field_heading') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
   	if($id == 'field_section') { $section = $field->content; }
   	if($id == 'field_type') { $type = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
    if($id == 'field_specproekt') { $specproekt_tid = $field->content; }
 endforeach; ?>
 <?php 	
 	global $language_content; 
	$lang = $language_content->language;
	if ($lang == 'en') $prefix = '/en'; else $prefix = '';
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
<div class="article-item article-item--affiche article-item--top3reviews article-text--center article-item--top3reviews-<?php print $type;?>">
	<div class="article-photo"><?php print $image;?></div>
		<?php if(isset($specproekt_tid)):?>
			<div class="article-city"><a class="type-text" href="<?php print $prefix;?>/special/<?php print  $specproekt_tid;?>"><?php print $specproekt;?></a></div>
		<?php elseif (isset($city)):?>
			<div class="article-city"><a class="type-text" href="<?php print $prefix;?>/reviews/<?php print $city;?>"><?php print str_replace("_"," ",$city); ?></a></div>
		<?php endif;?>
	<div class="article-text">
		<?php if($type == 'photo'):?>
			<div class="article-icon article-icon--<?php print $english?>"></div>
			<div class="article-photo-caption"><?php print t("Picture story"); ?></div>
		<?php endif;?>		
		<div class="article-title"><span class="big"><?php print str_replace("/en/en", "/en", $title)?></span></div>
		<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>
		<div class="article-stat">
			<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>	
		</div>
	</div>
</div>