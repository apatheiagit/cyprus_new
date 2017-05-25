<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="row">
<?php foreach ($rows as $id => $row): ?>
  <?php if (($id == 0)):?>
		<div class="col-sm-8 media-wrapper--big">
			<?php print $row; ?>
		</div>
	<?php else:?>
		<div class="col-sm-4 media-wrapper--normal">			
	    <?php print $row; ?>
		</div>
	<?php endif;?>
<?php endforeach; ?>
</div>