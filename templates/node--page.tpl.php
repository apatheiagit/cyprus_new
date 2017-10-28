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
?>
<?php /* Поделитесь с друзьями */?>
<?php $current_url = url(current_path(), array('absolute' => TRUE)); $current_title = drupal_get_title();?>
<div class="wide-container container detail-share-block">  
  <div class="title"><?php print t("Share with friends");?></div>       
  <div class="share-links">         
    <a href="http://www.facebook.com/sharer.php?src=sp&amp;u=<?php print urlencode($current_url);?>" class="fa fa-facebook" target="_blank">
      <span class="note"><?php print t("Facebook");?></span></a>    
    <a href="http://twitter.com/home?status=<?php print urlencode($current_url);?>&amp;text=<?php print $current_title;?>" class="fa fa-twitter" target="_blank">
      <span class="note"><?php print t("Twitter");?></span></a>   
    <a href="https://telegram.me/share/url?url=<?php print urlencode($current_url);?>&amp;text=<?php print $current_title;?>" class="fa fa-telegram" target="_blank" >
      <span class="note"><?php print t("Telegram");?></span></a>            
    <a href="http://vk.com/share.php?url=<?php print urlencode($current_url);?>&amp;title=<?php print $current_title;?>" class="fa fa-vk" target="_blank">
      <span class="note"><?php print t("ВКонтакте");?></span></a> 
    <a href="http://www.tumblr.com/share/link?url=<?php print urlencode($current_url);?>&amp;name=<?php print $current_title;?>" class="fa fa-tumblr" target="_blank">
      <span class="note"><?php print t("Tumblr");?></span></a>  
  </div>
  <script type="text/javascript">
  (function($) {
    $(function() {          
      $('.share-links a').on('click', function(){   
        var Url = $(this).attr('href');
        var newWin = window.open(Url, 'example', 'width=600,height=400');
        return false;
      });
     })
  })(jQuery);    
  </script>
</div>
<?  
  /* Популярные обзоры  */
  print views_embed_view('cyprus', 'top_reviews');   
  /* Популярные места */
  print views_embed_view('cyprus', 'top_places');  
?>
<?php endif; ?>