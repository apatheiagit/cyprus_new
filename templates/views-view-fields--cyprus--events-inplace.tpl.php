<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_city') { $city = $field->content; }
    if($id == 'field_when') { $when = $field->content; }
    if($id == 'field_event_type') { $event_type = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
 endforeach; ?>
 <?php
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
 ?>
<div class="col-st-6 col-sm-6 col-md-3 col-article">
	<div class="article-item article-item--small">
		<div class="article-photo"><?php print $image;?></div>
		<div class="article-text">
			<div class="article-type">
			<?php if (isset($city_name)):?>
				<a href="<?php print $prefix;?>/events?city=<?php print $city;?>"><?php print $city_name;?></a>
			<?php else:?>
				<?php print t("All Cyprus") ?>
			<?php endif;?>
			</div>
			<div class="article-date"><?php print $when;?></div>
			<div class="article-title-descr">
				<div class="article-title"><?php print str_replace("/en/en", "/en", $title)?></div>
				<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>
			</div>
			<div class="article-category"><a href="<?php print $prefix;?>/events?type=<?php print $event_type;?>"><?php print $type_name;?></a></div>
			<div class="article-stat">
				<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>	
			</div>
		</div>
	</div>
</div>