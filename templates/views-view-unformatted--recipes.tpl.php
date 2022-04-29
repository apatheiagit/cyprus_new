<?php

/**
 * @file
 * Default simple view template to display a list of rows.
 *
 * @ingroup views_templates
 */
?>
<?php 
global $language ;
$lang_name = $language->language;
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
	<div class="col-sm-6 col-md-3 col-article">
		<?php print $row; ?>
	</div>
<?php endforeach; ?>