<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'field_advt') { $advt = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_category_recipe') { $type = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
 endforeach; ?>

<div class="article-item article-item--recipe  <?php if($advt == 1) print "article-item--fon";?>">						
	<div class="article-photo"><?php print $image;?></div>
	<div class="article-text">			
		<div class="article-category"><?php print $type;?></div>
		<div class="article-title"><?php print str_replace("/en/en", "/en", $title)?></div>			
		<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>		
	</div>
	<div class="article-stat article-stat--aprel-style">
		<div class="stat stat-watch"><span class="eye-solid ikon"></span><span class="count"><?php print $totalcount;?></span></div>
	</div>
</div>
