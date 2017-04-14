<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }  
    if($id == 'field_subtitle') { $subtitle = $field->content; }  
    if($id == 'totalcount') { $totalcount = $field->content; }
 endforeach; ?>
<div class="article-item article-item--affiche article-text--center">
	<div class="article-photo"><?php print $image;?></div>
	<div class="article-text ">		
		<div class="article-recipe-caption"><?php print t("Recipe");?></div>
		<div class="article-title"><span class="big"><?php print str_replace("/en/en", "/en", $title)?></span><br><span class="small"><?php print $subtitle;?></span></div>
		<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>
		<div class="article-stat">
			<!--<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>	-->
		</div>
	</div>
</div>