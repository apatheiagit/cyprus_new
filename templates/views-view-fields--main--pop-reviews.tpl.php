<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'path') { $path = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_section') { $section = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
    if($id == 'field_special') { $special = $field->content; }
    if($id == 'field_rubtic') { $rubric = $field->content; }
 endforeach; ?>
<?php 	
 	global $language_content; 
  	$lang = $language_content->language;
  	if ($lang == 'en') $prefix = '/en'; else $prefix = '';
	if (isset($section)){
 		$terms = taxonomy_term_load($section);
 		$english = $terms->field_english['und'][0]['value'];
 		$russian_localize = i18n_taxonomy_localize_terms($terms);
 		$russian = $russian_localize->name;
 	}
 	if (isset($rubric)){
 		$term = taxonomy_term_load($rubric);
 		$rubric_type = $term->field_english['und'][0]['value'];		
 	}
?>
<div class="col-st-6 col-sm-6 col-md-3">
	<div class="article-item article-item--common article-item--plain">
		<div class="article-photo-wrap <?php if(isset($rubric_type)):?>article-photo--rubric<?endif;?>">
		<?php if(isset($rubric_type)):?>
		<div class="article-rubric article-rubric--<?php print $english?>">
			<a href="<?php print $path; ?>" class="fixed-height"><span class="article-canvas article-canvas--<?php print $rubric_type;?>"></span></a>
		</div>
	<?php else:?>
	<div class="article-photo">		
		<?php print $image;?>
	</div>
	<?php endif;?>
		<div class="article-text">
			<div class="article-type article-type--<?php print $english?>"><a class="type-text" href="<?php print $prefix;?>/<?php print $english;?>"><?php print $russian; ?></a></div>
			<div class="article-title-descr">
				<div class="article-title"><?php print str_replace("/en/en", "/en", $title)?></div>
				<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>
			</div>
			<div class="article-stat">
				<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>
			</div>
		</div>
		</div>
	</div>
</div>
