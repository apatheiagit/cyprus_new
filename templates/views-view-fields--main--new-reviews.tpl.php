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
    if($id == 'field_special') { $special = $field->content; }
    if($id == 'field_rubtic') { $rubric = $field->content; }
    if($id == 'field_bloger') { $bloger_tid = $field->content; }
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
 	if (isset($rubric)){
 		$term = taxonomy_term_load($rubric);
 		$rubric_type = $term->field_english['und'][0]['value']; 		
 	}
 	if (isset($bloger_tid)){
 		$bloger = taxonomy_term_load($bloger_tid);
 		$bloger_photo = $bloger->field_image['und'][0]['uri'];
 		$bloger_name_localize = i18n_taxonomy_localize_terms($bloger);
 		$bloger_name = $bloger_name_localize->name;	
 	}
 	if (isset($specproekt_tid)){
 		$specproekt_term = taxonomy_term_load($specproekt_tid);	
 		$specproekt_name_localize = i18n_taxonomy_localize_terms($specproekt_term);
 		$specproekt = $specproekt_name_localize->name;	
 	}
?>
<?php if ($type == 'blog'):?>
<div class="article-photo-wrap article-bloger fixed-height">	
	<div class="article-bloger-info">
		<div class="article-bloger-photo">
			<a href="<?php print $path; ?>">
				<?php 
	        $params = array(
	          'style_name' => 'cyprus150x150',
	          'path' => $bloger_photo,
	          'alt' => $bloger_name,
	          'attributes' => array('class' => array('img-circle','monochrome')),
	          'getsize' => FALSE,
	        );
	        print theme('image_style', $params); ?>
			</a>
		</div>
		<div class="article-bloger-name"><a href="<?php print $prefix;?>/blog/<?php print $bloger_tid;?>"><?php print $bloger_name;?></a></div>
	</div>
	<div class="article-type article-type--blog"><a class="type-text" href="<?php print $prefix;?>/blog"><?php print t("Experience");?></a></div>
	<div class="article-title-descr">
		<div class="article-title"><?php print str_replace("/en/en", "/en", $title)?></div>
		<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>
	</div>
	<div class="article-stat">
		<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>
	</div>
</div>
<?php else:?>
<div class="article-photo-wrap <?php if(isset($rubric_type)):?>article-photo--rubric<?php endif;?><?php if($type == 'lifehack'):?>article-item--lifehack<?php endif;?>">
	<?php if(isset($rubric_type)):?>
		<div class="article-rubric article-rubric--<?php print $english?>">
			<a href="<?php print $path; ?>" class="fixed-height"><span class="article-canvas article-canvas--<?php print $rubric_type;?>"></span></a>
		</div>
	<?php else:?>
	<div class="article-photo">		
		<?php print $image;?>
	</div>
	<?php endif;?>
	<div class="article-text <?php if(($special == 1) || ($type == 'lifehack')):?>text-center<?php endif;?>">
		<?php if($special == 1):?>
			<div class="article-type article-type--special">
			<?php if(isset($specproekt_tid)):?>
				<a class="type-text" href="<?php print $prefix;?>/special/<?php print  $specproekt_tid;?>"><?php print $specproekt;?></a>
			<?php else:?>
				<a class="type-text" href="<?php print $prefix;?>/special"><?php print t("Special project"); ?></a>
			<?php endif;?>
			</div>
		<?php elseif($type == 'lifehack'):?>
			<div class="article-type article-type--lifehack"><a class="type-text" href="<?php print $prefix;?>/lifehack"><?php print t("Life hack"); ?></a></div>
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
</div>
<?php endif;?>