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
<div class="blog-wrap--<?php print count($rows);?>">
<?php foreach ($rows as $id => $row): ?>  
    <?php print $row; ?>  
<?php endforeach; ?>
</div>
<div class="border-bottom"></div>