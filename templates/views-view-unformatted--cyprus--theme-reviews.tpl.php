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
<?php $counter = 0;?>
<?php foreach ($rows as $id => $row): ?>
  <?php if($counter == 0):?>
  <div class="col-sm-8">
  	<div class="article-item article-item--typical article-item--into-photo text-center article-item--ip-big article-item--400">
  		<?php print $row; ?>
  	</div>
  </div>
  <?php endif;?>
  <?php if($counter == 1):?>  
  <div class="col-sm-4">
  	<div class="article-item article-item--small article-item--400">
    	<?php print $row; ?>
    </div>
  </div>
  <?php endif;?>
  <?php $counter++;?>
<?php endforeach; ?>

