<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<div class="row row-10 ">
	<?php foreach ($rows as $id => $row): ?>
	  <div <?php if ($classes_array[$id]): ?> class="col col-sm-6 col-md-4 <?php print $classes_array[$id]; ?>"<?php endif; ?>>
	    <?php print $row; ?>
	  </div>
	<?php endforeach; ?>
</div>

