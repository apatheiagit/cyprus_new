<?php
/**
 * @file
 * Returns the HTML for a node.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728164
 */
?>
<div class="container white-container">
  <div class="container-bordered">
    <div class="article-content node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix">
      <h1 class="main-title"><?php print $title; ?></h1>  
      <?php  print $content['body']['#items'][0]['value']; ?>
      <?php if ($node->nid == 2444 || $node->nid == 2445):?>
        <div class="subscribe-block">
        <?php $block_simplenews = module_invoke('simplenews', 'block_view', 61);
          print render($block_simplenews['content']);?>
        </div>
      <?php endif;?>
    </div>
  </div>
</div>
<?php if ($node->nid == 27 || $node->nid == 1635): // Скрываем блок "Читайте также" на странице "Рекламодателям"?>
  <div class="container white-container">
  <div class="bordered-top">&nbsp;    
  </div>
</div>
<?php else:?>
<?php   
    /* Популярные события в Афише */
    print views_embed_view('cyprus', 'top_events');
    /* Популярные обзоры из того же раздела */
    print views_embed_view('cyprus', 'top_reviews');
    /* Популярные места в том же городе */
    print views_embed_view('cyprus', 'top_places');  
?>
<?php endif; ?>