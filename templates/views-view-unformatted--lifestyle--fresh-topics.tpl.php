<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="row row-10 latest-articles">
	<?php foreach ($rows as $id => $row): ?>
	  <div <?php if ($classes_array[$id]): ?> class="col col-xs-6 <?php print $classes_array[$id]; ?>"<?php endif; ?>>
	    <?php print $row; ?>
	  </div>
	  <?php if($id == 1):?>
	  	<div class="clearfix"></div>
	  <?php endif;?>
	<?php endforeach; ?>
</div>

