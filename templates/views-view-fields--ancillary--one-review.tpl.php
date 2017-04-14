<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_section') { $section = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
 endforeach; ?>
<?php
	global $language_content; 
	$lang = $language_content->language;
	if ($lang == 'en') $prefix = '/en'; else $prefix = '';
?>
<div class="col-sm-4">
	<div class="article-item article-item--small">						
		<div class="article-photo article-photo--md">
			<?php print $image;?>		
		</div>		
		<div class="article-text">
			<div class="article-type"><?php print $section; ?></div>
			<div class="article-title-descr">
				<div class="article-title"><?php print str_replace("/en/en", "/en", $title)?></div>
				<div class="article-descr"><div><?php print str_replace("/en/en", "/en", $body)?></div></div>
			</div>
			<div class="article-stat">
				<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>	
			</div>							
		</div>
	</div>
</div>