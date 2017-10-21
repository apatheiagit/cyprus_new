<?php foreach ($fields as $id => $field):   
    if($id == 'title') { $title = $field->content; }    
    if($id == 'field_title') { $position = $field->content; }
    if($id == 'field_image') { $photo = $field->content; }       
 endforeach; ?>
<div class="team-item">	
	<div class="photo"><?php print $photo; ?></div>
	<div class="info">
		<div class="title"><?php print $title;?></div>
		<div class="descr"><?php print $position;?></div>
	</div>
</div>