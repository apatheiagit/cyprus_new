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
  <?php if (($id == 8) && ($lang_name == 'ru')):?>
		<div class="clearfix"></div>
	  <div id="subscribe-simplenews" class='subscribe-block'>
	    <div class="simplenews-block-wrap">
	      <div class="row">
	        <div class="col-lg-4 col-simplenews-left">
	          <div class="special-text">Подпишитесь и получайте только лучшие статьи</div>
	        </div>
	        <div class="col-lg-8 col-simplenews-right">
	        <?php 
	          $block = module_invoke('simplenews', 'block_view', 61);
	          print render($block['content']);
	        ?>
	        </div>
	      </div>
	    </div>
	  </div>
		<div class="col-sm-6 col-md-3 col-article">
	    <?php print $row; ?>
		</div>
	<?php else:?>
		<div class="col-sm-6 col-md-3 col-article">
	    <?php print $row; ?>
		</div>
	<?php endif;?>
<?php endforeach; ?>