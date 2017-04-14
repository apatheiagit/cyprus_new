<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_city') { $city = $field->content; }
    if($id == 'field_when') { $when = $field->content; }
    if($id == 'field_when_1') { $when_1 = $field->content; }
    if($id == 'field_event_type') { $event_type = $field->content; }
    if($id == 'field_subtitle') { $subtitle = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
 endforeach; ?>
<div class="article-item article-item--affiche article-text--left">
	<div class="article-photo"><?php print $image;?></div>
	<div class="article-text ">
		<div class="article-date article-date--big"><?php print $when;?> <?php if ($when_1 != $when) print " - ".$when_1;?></div>
		<div class="article-title article-title--bordered"><span class="big"><?php print str_replace("/en/en", "/en", $title)?></span><br><span class="small"><?php print $subtitle;?></span></div>
		<div class="article-descr"><?php print str_replace("/en/en", "/en", $body)?></div>
		<div class="article-stat">
			<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>	
		</div>
	</div>
</div>