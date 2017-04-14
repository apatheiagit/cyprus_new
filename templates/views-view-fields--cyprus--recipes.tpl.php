<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_category_recipe') { $type = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
 endforeach; ?>
<div class="col-sm-6 col-md-3 col-article">
	<div class="article-item article-item--basic article-item--recipe">						
		<div class="article-text align-center">
			<div class="article-type"><?php print t("Cuisine"); ?></div>
			<div class="article-title"><?php print str_replace("/en/en", "/en", $title)?><?php print $subtitle;?></div>
			<div class="article-photo article-photo--circle"><?php print $image;?></div>
			<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>
			<div class="article-category"><?php print $type;?></div>
			<div class="article-stat">
				<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>
			</div>
		</div>
	</div>
</div>