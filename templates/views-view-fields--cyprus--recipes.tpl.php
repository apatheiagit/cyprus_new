<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'field_advt') { $advt = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_category_recipe') { $type = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
 endforeach; ?>

<div class="media-block media-block--recipe  <?php if($advt == 1) print "media-block--fon";?>">						
	<div class="photo"><?php print $image;?></div>
	<div class="text">			
		<div class="category"><?php print $type;?></div>
		<div class="title"><?php print str_replace("/en/en", "/en", $title)?></div>			
		<div class="descr"><?php print str_replace("/en/en", "/en", $body)?></div>		
	</div>
	<div class="statistic">
		<div class="metrika metrika-watch"><span class="ikon ikon-eye"></span><span class="count"><?php print $totalcount;?></span></div>
	</div>
</div>
