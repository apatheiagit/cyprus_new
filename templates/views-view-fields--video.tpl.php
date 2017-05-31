<?php foreach ($fields as $id => $field):   
    if($id == 'title') { $title = $field->content; }    
    if($id == 'field_www') { $www = $field->content; }   
    if($id == 'field_main_img') { $image = $field->content; }  
 endforeach; ?>
<?php 	
	global $language_content; 
	$lang = $language_content->language;
	if ($lang == 'en') $prefix = '/en'; else $prefix = '';
?>
<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	<div class="video-block">
		<div class="theimage">
			<?php print $image; ?>
		</div>
		<div class="thevideo" style="display: none;">
			<iframe allowfullscreen="" frameborder="0" mozallowfullscreen="" src="<?php print $www;?>" webkitallowfullscreen="" width="100%"></iframe>
		</div>		
	</div>
</div>	