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

<?php foreach ($rows as $id => $row): ?>
  <?php if (($id == 3)):?>
		<div class="col-md-8 col-sm-12 media-wrapper--big">
			<?php print $row; ?>
		</div>
	<?php else:?>
		<div class="col-md-4 col-sm-6 media-wrapper--normal">			
	    <?php print $row; ?>
		</div>
	<?php endif;?>
<?php endforeach; ?>