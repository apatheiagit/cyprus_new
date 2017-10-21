<div class="container white-container">  
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
<?php if ($node->nid != 27 && $node->nid != 1635 && $node->nid != 24 && $node->nid != 1634): // Скрываем блок "Читайте также" на странице "Рекламодателям" и "О проекте"?>
<?php   
    /* Популярные события в Афише */
    print views_embed_view('cyprus', 'top_events');    
    /* Популярные места  */
    print views_embed_view('cyprus', 'top_places');  
    /* Популярные обзоры  */
    print views_embed_view('cyprus', 'top_reviews');
?>
<?php endif; ?>
<?php if ($node->nid == 24 || $node->nid == 1634): // На странице "О проекте" показываем блок "Команда" и "Читайте также" в другом порядке ?>
<?php
  /* Команда  */
  print views_embed_view('team', 'block');   
  /* Популярные обзоры  */
  print views_embed_view('cyprus', 'top_reviews');   
  /* Популярные места */
  print views_embed_view('cyprus', 'top_places');  
?>
<?php endif; ?>