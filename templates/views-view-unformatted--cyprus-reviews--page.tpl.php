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
  <?php if (($id == 3) || ($id == 4)):?>
		<div class="col-sm-6">
			<div class="article-item article-item--typical article-item--into-photo">
				<?php print $row; ?>
			</div>
		</div>
	<?php else:?>
		<div class="col-sm-4">
			<div class="article-item article-item--basic article-item--common">
	    	<?php print $row; ?>
	  </div>
	</div>
	<?php endif;?>
<?php endforeach; ?>