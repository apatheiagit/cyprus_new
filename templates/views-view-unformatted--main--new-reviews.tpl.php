<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
	<?php if ($id < 2):?>
		<div class="col-sm-6 media-wrapper--medium">
			<?php print $row; ?>
		</div>		
	<?php else:?>
		<div class="col-sm-4 media-wrapper--normal">
	    <?php print $row; ?>
	  </div>
	<?php endif;?>
<?php endforeach; ?>