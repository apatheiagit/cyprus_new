<?php foreach ($fields as $id => $field):   
    if($id == 'title') { $title = $field->content; }    
    if($id == 'field_title') { $title = $field->content; }
    if($id == 'path') { $path = $field->content; }    
    if($id == 'totalcount') { $totalcount = $field->content; }    
    if($id == 'field_bloger') { $bloger_tid = $field->content; }    
 endforeach; ?>
<?php 	
	$theme_path = path_to_theme();
	global $language_content; 
	$lang = $language_content->language;
	if ($lang == 'en') $prefix = '/en'; else $prefix = '';
 	if (isset($bloger_tid)){
 		$bloger = taxonomy_term_load($bloger_tid);
 		$bloger_photo = $bloger->field_image['und'][0]['uri'];
 		$bloger_name_localize = i18n_taxonomy_localize_terms($bloger);
 		$bloger_name = $bloger_name_localize->name;	
 	}
?>
<div class="col-sm-6 col-md-4 col-lg-3">	
	<div class="blog-block">
		<div class="photo">
			<a href="<?php print $path; ?>">
				<?php 
	        $params = array(
	          'style_name' => 'cyprus150x150',
	          'path' => $bloger_photo,
	          'alt' => $bloger_name,
	          'attributes' => array('class' => array('img-circle', "img-responsive")),
	          'getsize' => FALSE,
	        );
	        print theme('image_style', $params); ?>
			</a>
		</div>	
		<div class="title-wrap">	
			<div class="title"><?php print str_replace("/en/en", "/en", $title)?></div>
		</div>
		<div class="statistic">
			<div class="metrika metrika-watch"><?php print file_get_contents($theme_path."/img/views.svg");?><span class="count"><?php print $totalcount;?></span></div>
		</div>		
	</div>
</div>
