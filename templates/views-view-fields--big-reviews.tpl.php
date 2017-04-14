<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_section') { $section = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'field_heading') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
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
<div class="article-item article-item--index">
	<div class="article-photo"><?php print $image;?></div>
	<div class="article-text article-text--center">
		<div class="container">
			<div class="article-type article-type--white">
			<?php if(isset($specproekt_tid)):?>
				<a class="type-text" href="<?php print $prefix;?>/special/<?php print $specproekt_tid;?>"><?php print $specproekt;?></a>
			<?php else:?>
				<a class="type-text" href="<?php print $prefix;?>/<?php print $english;?>"><?php print $russian; ?></a>
			<?php endif?>
			</div>
			<div class="article-title">
				<span class="big"><?php print str_replace("/en/en", "/en", $title)?></span><br><span class="small"><?php print $subtitle;?></span>
			</div>
		</div>			
	</div>
</div>
