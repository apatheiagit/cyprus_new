<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
	<?php if ($id == 0):?>
		<div class="media-wrapper--large" id="event_<?php print $id;?>" data-id="<?php print $id;?>">
			<?php print $row; ?>
		</div>		
	<?php else:?>
		<div class="col-sm-4 media-wrapper--wo-image" id="event_<?php print $id;?>" data-id="<?php print $id;?>">
	    <?php print $row; ?>
	  </div>
	<?php endif;?>
<?php endforeach; ?>