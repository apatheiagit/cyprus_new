<div class="node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix"<?php print $attributes; ?>>
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
   <div class="article-share-wrapper">
      <div class="article-stat">
        <?php $count = isset($content['links']['statistics']['#links']['statistics_counter']['title']) ? (int) $content['links']['statistics']['#links']['statistics_counter']['title'] : 10;?>
        <div class="stat stat-watch"><span class="icon icon-views"></span><span class="count <?php if($count >= 1000) print 'many'; ?>"><?php print  $count; ?></span></div>    
      </div>
      <div class="article-share">
        <div class="pluso" data-background="none;" data-options="big,square,line,horizontal,nocounter,sepcounter=1,theme=14" data-services="vkontakte,facebook,tumblr,twitter"></div>
      </div>
    </div>
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
      <script type="text/javascript">(function() {
      if (window.pluso)if (typeof window.pluso.start == "function") return;
      if (window.ifpluso==undefined) { window.ifpluso = 1;
        var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
        s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
        s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
        var h=d[g]('body')[0];
        h.appendChild(s);
      }})();</script>
    </div>
    <div class="article-share-wrapper">
    <div class="article-stat">
      <?php $count = isset($content['links']['statistics']['#links']['statistics_counter']['title']) ? (int) $content['links']['statistics']['#links']['statistics_counter']['title'] : 10;?>
      <div class="stat stat-watch"><span class="icon icon-views"></span><span class="count <?php if($count >= 1000) print 'many'; ?>"><?php print  $count; ?></span></div>    
    </div>
    <div class="article-share">
      <div class="pluso" data-background="none;" data-options="big,square,line,horizontal,nocounter,sepcounter=1,theme=14" data-services="vkontakte,facebook,tumblr,twitter"></div>
    </div>
  </div>
  </div>
</div>
<div class="container">
  <div class="bordered-top">
    <h5 class="text-center special-font"><?php print t("See also");?></h5>
  </div>
</div>
<?php 
  /* Обзоры из раздела кухня*/
  print views_embed_view('cyprus', 'theme_reviews5');
  /* Популярные места */
  print views_embed_view('cyprus', 'top_places');
?>
