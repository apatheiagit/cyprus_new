<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_title') { $short_title = $field->content; }
    if($id == 'field_section') { $section = $field->content; }
    if($id == 'view_node') { $link = $field->content; }
    if($id == 'field_title') { $short_title = $field->content; }
    if($id == 'field_type') { $review_type = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
 endforeach; ?>
 <?php 
 	$url = preg_match('/<a href="(.+)">/', $link, $match); 
 	$info = parse_url($match[1]);
 	if (isset($section)){
 		$terms = taxonomy_term_load($section);
 		$english = $terms->field_english['und'][0]['value'];
 		$russian = $terms->name;
 	} 	
 ?>
<div class="col-sm-3 col-article">
	<div class="article-item article-item--plain article-item--common">
		<div class="article-photo "><?php print $image;?></div>
		<div class="article-text">
			<div class="article-type article-type--<?php print $english?>"><span class="type-icon"></span><span class="type-text"><?php print $russian; ?></span></div>
			<div class="article-title-descr">
				<div class="article-title">
					<?php if (isset($short_title)):?>
						<a href="<?php print $info['path'];?>" title="<?php print $title;?>"><?php print $short_title;?></a>
					<?php else: ?>
						<a href="<?php print $info['path'];?>" title="<?php print $title;?>"><?php print $title;?></a>
					<?php endif;?>
				</div>
				<div class="article-descr"><?php print $body; ?></div>
			</div>	
			<div class="article-stat">
				<div class="stat stat-watch"><span class="icon icon-views"></span><span class="count"><?php print $totalcount;?></span></div>
			</div>		
		</div>
	</div>
</div>
