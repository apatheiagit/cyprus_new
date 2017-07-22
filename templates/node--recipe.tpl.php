<?php
    $theme_path = path_to_theme();
    global $language_content; 
    $lang = $language_content->language;
    if ($lang == 'en') $prefix = '/en'; else $prefix = '';
    $term_city = taxonomy_term_load($content['field_city']['#items'][0]['taxonomy_term']->tid);
    $translated_term_city = i18n_taxonomy_localize_terms($term_city); 
?>
<?php $totalcount = isset($content['links']['statistics']['#links']['statistics_counter']['title']) ? (int) $content['links']['statistics']['#links']['statistics_counter']['title'] : 10;?>
<div class="media-detail media-detail--recipe node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
 <div class="article-photo-wrapper container">
    <div class="main-photo">
    <?php
      $params = array(
        'style_name' => 'cyprus1140x440',
        'path' => $content['field_main_img']['#items']['0']['uri'],
        'alt' => $title,
        'title' => $title,
        'attributes' => array('class' => array('img-responsive')),
        'getsize' => FALSE,
      );
      print theme('image_style', $params);
    ?>  
    </div> 
    <div class="main-info main-info-center text-center">            
      <h1 class="main-title">
          <?php print $title; ?>
      </h1>
      <div class="subtitle"><?php print $content['field_subtitle']['#items']['0']['value']; ?></div>
    </div>
  </div>
 <div class="article-recipe container">
    <div class="container-bordered">
      <div class="article-content">
        <div class="recipe-summery"><big><?php print $content['body']['#items'][0]['value']; ?></big></div>      
        <div class="recipe-ingredients">
          <h6 class="cuisine"><?php print t("Ingredients");?></h6>
          <?php if (isset($content['field_title']['#items'][0]['value'])):?>
            <p class='bold-text'><?php print $content['field_title']['#items'][0]['value'];?></p>
          <?php endif;?>
          <?php foreach($content['field_address']['#items'] as $ingredient):?>
            <p><?php print $ingredient['value']; ?></p>
          <?php endforeach;?>
          <?php if (isset($content['field_www']['#items'][0]['value']) && isset($content['field_latlng']['#items'][0])):?>
            <p class='bold-text'><?php print $content['field_www']['#items'][0]['value'];?></p>
            <?php foreach($content['field_latlng']['#items'] as $ingr):?>
              <p><?php print $ingr['value']; ?></p>
            <?php endforeach;?>
          <?php endif;?> 
        </div>
        <?php /* Фотографии этого рецепта */ ?>
        <?php if (isset($content['field_photos']['#items'])):?>
        <div class="somit somit-gallery somit-gallery--small">
            <div class="photo-carousel">
              <?php foreach ($content['field_photos']['#items'] as $photo):?>
                <div class="photo-item">
                  <?php 
                    $param = array(
                      'style_name' => 'cyprus798x430',
                      'path' => $photo['uri'],
                      'getsize' => FALSE,
                    );
                    print theme('image_style', $param);
                  ?> 
                  <div class="descr"><div><?php print $photo['title']; ?></div></div>
                </div>              
              <?php endforeach; ?>
            </div>
            <div class="photo-controls-wrapper"><div class="photo-controls"><div class="customBtn customPrevBtn"></div> <div class="owl-counter"><?php print t("Photo");?> <span class="current-photo">1</span> <?php print t("of");?> <?php print count($content['field_photos']['#items']);?></div> <div class="customBtn customNextBtn"></div></div></div> 
        </div>  
        <?php endif; ?>
        <div class="recipe-cooking">
          <h6 class="cuisine"><?php print t("Cooking method");?></h6>
           <?php 
            /* Находим в тексте все картинки и к родительскому параграфу добавляем класс photo-intext */
            $new_body = str_replace('<p><img', '<p class="photo-intext"><img', $content['field_body']['#items'][0]['value']);
            print $new_body; ?>
        </div>
      </div>
    </div>
    <div class="tags-block">
      <div class="statistic">
        <div class="metrika metrika-watch"><?php print file_get_contents($theme_path."/img/views.svg");?><span class="count"><?php print $totalcount;?></span></div>
      </div>
    </div>
  </div>    
</div>
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
<?php 
  /* Обзоры из раздела кухня*/
  print views_embed_view('cyprus', 'theme_reviews5');
  /* Популярные места */
  print views_embed_view('cyprus', 'top_places');
?>
