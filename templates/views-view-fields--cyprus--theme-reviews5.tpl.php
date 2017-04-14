<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_section') { $section = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
    if($id == 'field_special') { $special = $field->content; }
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
?>						
<div class="article-photo article-photo--md">
	<?php print $image;?>		
</div>		
<div class="article-text">
	<?php if($special == 1):?>
		<div class="article-type article-type--special"><a class="type-text" href="<?php print $prefix;?>/special"><?php print t("Special project");?></a></div>
	<?php else:?>
	<div class="article-type article-type--<?php print $english?>"><a class="type-text" href="<?php print $prefix;?>/<?php print $english;?>"><?php print $russian; ?></a></div>
	<?php endif;?>
	<div class="article-title-descr">
		<div class="article-title"><?php print str_replace("/en/en", "/en", $title)?></div>
		<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>
	</div>
	<div class="article-stat">
		<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>	
	</div>							
</div>
	