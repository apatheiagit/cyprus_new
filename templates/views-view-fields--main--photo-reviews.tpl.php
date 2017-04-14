<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_section') { $section = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
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
<div class="col-sm-4">
	<div class="article-item  article-item--photoreview">
		<div class="article-photo"><?php print $image;?></div>
		<div class="article-text align-center">
			<div class="article-type"><a class="type-text" href="<?php print $prefix;?>/<?php print $english;?>"><?php print $russian; ?></a></div>
			<a class="article-icon article-icon--<?php print $english?>" href="<?php print $prefix;?>/<?php print $english;?>"><span></span></a>
			<div class="article-title"><?php print str_replace("/en/en", "/en", $title)?></div>							
		</div>
		<div class="article-announcing align-center">
			<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>		
			<div class="article-stat">
				<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>
			</div>
		</div>
	</div>
</div>
