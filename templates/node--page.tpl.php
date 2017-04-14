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
    </div>
  </div>
</div>
<?php if ($node->nid == 27 || $node->nid == 1635): // Скрываем блок "Читайте также" на странице "Рекламодателям"?>
  <div class="container white-container">
  <div class="bordered-top">&nbsp;    
  </div>
</div>
<?php else:?>
<div class="container white-container">
  <div class="bordered-top">
    <h5 class="text-center special-font"><?php print t("See also");?></h5>
  </div>
</div>
<?php   
    /* Популярные события в Афише */
    print views_embed_view('cyprus', 'top_events');
    /* Популярные обзоры из того же раздела */
    print views_embed_view('cyprus', 'top_reviews');
    /* Популярные места в том же городе */
    print views_embed_view('cyprus', 'top_places');  
?>
<?php endif; ?>