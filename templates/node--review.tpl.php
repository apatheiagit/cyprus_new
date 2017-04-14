<?php    
    hide($content['comments']);
    hide($content['links']); 
    global $language_content; 
    $lang = $language_content->language;
    if ($lang == 'en') $prefix = '/en'; else $prefix = '';
    $term_city = taxonomy_term_load($content['field_city']['#items'][0]['taxonomy_term']->tid);
    $translated_term_city = i18n_taxonomy_localize_terms($term_city); 
    function print_gallery($photo_array, $image_style, $p_title){
      $gallery = '<div class="somit somit-gallery">';
      $gallery .= '<div class="photo-carousel">';
      foreach ($photo_array as $key => $photo) {
        $gallery .= '<div class="photo-item">';
        $photo_title = $photo['title'] == null ? $p_title : $photo['title'];
        $param = array(
          'style_name' => 'cyprus1140x720',
          'path' => $photo['uri'],
          'getsize' => FALSE,
        );
        $gallery .= theme('image_style', $param);
        $gallery .= '<div class="descr"><div>'.$photo_title.'</div></div>';
        $gallery .= '</div>';
      }
      $gallery .= '</div>';
      $gallery .= '<div class="photo-controls-wrapper"><div class="photo-controls"><div class="customBtn customPrevBtn"></div><div class="owl-counter">';
      $gallery .= t('Photo');  
      $gallery .= ' <span class="current-photo">1</span> ';
      $gallery .= t('of');
      $gallery .= ' '.count($photo_array).'</div> <div class="customBtn customNextBtn"></div></div></div>';
      $gallery .= '</div>';
      print $gallery;
    }   
?>
<?php $type = $content['field_type']['#items']['0']['value']; ?>
<div class="article-item article-item--detail-photo">  
  <?php if($type == 'blog'):?>
  <div class="article-photo-wrapper container">
    <div class="main-photo bottom-blackout">
      <?php 
        $params = array(
          'style_name' => 'cyprus1140x440',
          'path' => $content['field_main_img']['#items']['0']['uri'],
          'alt' => $title,
          'title' => $title,
          'attributes' => array('class' => array('img-responsive')),
          'getsize' => FALSE,
        );
      ?>
      <?php  print theme('image_style', $params); ?>
    </div>
    <div class="main-info main-info--bottom">
      <div class="article-title">
        <span class="big"><?php print $title;?></span><br><span class="small"><?php print $content['field_subtitle']['#items']['0']['value'];?></span>
      </div>
      <div class="bloger-block">
        <div class="photo">
        <?php $bloger = $content['field_bloger']['#items']['0']['taxonomy_term'];?>
        <a href="<?php print $prefix;?>/blog/<?php print $bloger->tid;?>">          
          <?php 
            $params = array(
              'style_name' => 'cyprus63x63',
              'path' => $bloger->field_image['und'][0]['uri'],
              'alt' => $bloger->name,
              'title' => $bloger->name,
              'attributes' => array('class' => array('img-circle','monochrome')),
              'getsize' => FALSE,
            );
          ?>
          <?php  print theme('image_style', $params); ?>
        </a></div>
        <div class="info">
          <div class="date"><?php print format_date($node->created, 'date'); ?></div>
          <div class="name"><a href="<?php print $prefix;?>/blog/<?php print $bloger->tid;?>"><?php print $bloger->name;?></a></div>
        </div>
      </div>
    </div>
  </div>
  <?php else:?> 
  <div class="article-photo">       
    <?php
      $params = array(
        'style_name' => 'cyprus1920x800',
        'path' => $content['field_main_img']['#items']['0']['uri'],
        'alt' => $title,
        'title' => $title,
        'attributes' => array('class' => array('img-responsive')),
        'getsize' => FALSE,
      );?>    
    <?php  print theme('image_style', $params); ?>
  </div>
  <div class="article-text article-text--center">
    <div class="container"> 
      <?php $special = $content['field_special']['#items']['0']['value']; ?>
      <?php if($special == 1):?>
        <?php if(isset($content['field_specproekt'])):?>
          <?php $term_specproekt = taxonomy_term_load($content['field_specproekt']['#items'][0]['taxonomy_term']->tid);
            $translated_term_specproekt = i18n_taxonomy_localize_terms($term_specproekt); ?>
          <a class="article-type article-type--white" href="<?php print $prefix;?>/special/<?php print $content['field_specproekt']['#items'][0]['taxonomy_term']->tid;?>"><?php print $translated_term_specproekt->name;?></a>
        <?php else:?>
          <a class="article-type article-type--white" href="<?php print $prefix;?>/special"><?php print t("Special project");?></a>
        <?php endif;?>
      <?php endif;?> 
      <?php if($type == 'photo'):?>
        <div class="article-type article-type--white"><?php print t("Picture story");?></div>
      <?php endif;?>     
      <?php if($type == 'lifehack'):?>
        <div class="article-type article-type--lifehack"><a class="type-text" href="<?php print $prefix;?>/lifehack"><?php print t("Life hack");?></a></div>
      <?php endif;?> 
      <h1 class="article-title">
        <span class="big"><?php 
          if(isset($content['field_heading']['#items']['0']['value'])){
            print $content['field_heading']['#items']['0']['value'];
          }else{
            print $title;}?></span>
        <br><span class="small"><?php print $content['field_subtitle']['#items']['0']['value'];?></span>
      </h1>
    </div>      
  </div> 
  <?php endif;?>
</div>
<div class="article-item article-item--detail-content container">
  <script type="text/javascript">(function() {
    if (window.pluso)if (typeof window.pluso.start == "function") return;
    if (window.ifpluso==undefined) { window.ifpluso = 1;
      var d = document, s = d.createElement('script'), g = 'getElementsByTagName';
      s.type = 'text/javascript'; s.charset='UTF-8'; s.async = true;
      s.src = ('https:' == window.location.protocol ? 'https' : 'http')  + '://share.pluso.ru/pluso-like.js';
      var h=d[g]('body')[0];
      h.appendChild(s);
    }})();
  </script>
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
      <?php 
          /* Находим в тексте все картинки и к родительскому параграфу добавляем класс photo-intext */
          $new_body = str_replace('<p><img', '<p class="photo-intext"><img', $content['body']['#items'][0]['value']);
          /* Делим весь текст по значку параграфа § чтобы вставить Фотогалерею (если она есть) */
          $body_array = explode("§",$new_body);
          $global_key = 0;
          /* Если не одного значка § не найдено, то просто выводим текст*/ 
          if (count($body_array) > 1){
            foreach ($body_array as $key => $text) {
              print $text;
              if(isset($content['field_photogallery']['#items'][$key])){
                $photo_gallery = $content['field_photogallery']['#items'][$key]['entity'];
                $photo_gallery_photos = $photo_gallery->field_photos['und'];
                print_gallery($photo_gallery_photos, "review", $photo_gallery->title);
                $global_key = $key;
              }
            }
          }else{
            print $new_body;
          }
       ?>
      <?php 
        /* Если фотографии просто добавлены в обзор, выводим их крупно в виде ленты */
        if (isset($content['field_photos']['#items'])):?>
        <?php foreach ($content['field_photos']['#items'] as $photo):?>
          <div class="photo-intext">
            <?php 
                $param = array(
                  'style_name' => 'cyprus1140x720',
                  'path' => $photo['uri'],
                  'getsize' => FALSE,
                );
                print theme('image_style', $param);
              ?> 
          </div>
        <?php endforeach; ?>
      <?php endif;?>
	  <?php
        /* Если к обзору привязаны рецепты, показываем их */
        if (isset($content['field_recipe']['#items']['0'])): ?>
        <h2 class="bordered"><?php print t("Recipes");?></h2>
        <?php 
          $recipes = $content['field_recipe']['#items'];
          foreach($recipes as $recipe):?>
          <div class="article-recipe">
            <?php $item = $recipe['entity'];?>
            <h5 class="uppercase"><?php print $item->title; ?></h5>
            <?php if (isset($item->body)):?>
            <div class="recipe-summery"><?php print $item->body['und'][0]['value']; ?></div>
            <?php endif;?>
            <?php 
              /* Если у рецепта несколько фотографий, то показываем фотогаллерею */
              if(isset($item->field_photos['und'][0])):?>
              <?php 
                $recipe_photo = $item->field_photos['und'];
                print_gallery($recipe_photo, "review", $item->title); 
              ?> 
            <?php else:?>
              <p class="recipe-photo photo-intext"><img src="<?php print file_create_url($item->field_main_img['und'][0]['uri']); ?>" alt="<?php print $item->title; ?>" /></p>
            <?php endif;?>
            <div class="recipe-ingredients">
              <h6 class="green2"><?php print t("Ingredients");?></h6>
              <?php if (isset($item->field_title['und'][0]['value'])):?>
                <p class='bold-text'><?php print $item->field_title['und'][0]['value'];?></p>
              <?php endif;?>
              <?php foreach($item->field_address['und'] as $ingredient):?>
                <p><?php print $ingredient['value']; ?></p>
              <?php endforeach;?>
              <?php if (isset($item->field_www['und'][0]['value']) && isset($item->field_latlng['und'][0])):?>
                <p class='bold-text'><?php print $item->field_www['und'][0]['value'];?></p>
                <?php foreach($item->field_latlng['und'] as $ingr):?>
                  <p><?php print $ingr['value']; ?></p>
                <?php endforeach;?>
              <?php endif;?> 
            </div>
            <div class="recipe-cooking">
              <h6 class="green2"><?php print t("Cooking method");?></h6>
              <?php print $item->field_body['und'][0]['value']; ?>
            </div>
            <hr class="grey" />
          </div>
        <?php endforeach;?>     
      <?php endif; ?>
      <?php 
        /* Находим в тексте все картинки и к родительскому параграфу добавляем класс photo-intext */
        $new_body_continue = "";
        if(isset($content['field_body'])){
          $new_body_continue = str_replace('<p><img', '<p class="photo-intext"><img', $content['field_body']['#items'][0]['value']);
        }
      ?>
      <?php 
          /* Делим весь текст по значку параграфа § чтобы вставить Фотогалерею (если она есть) */
          $body_continue_array = explode("§",$new_body_continue);
          if (count($body_continue_array) > 1){
            foreach ($body_continue_array as $key => $text) {
              print $text;
              if ($global_key > 0) $global_key = $global_key + 1;
              if (isset($content['field_photogallery']['#items'][$global_key])){
                $photo_gallery = $content['field_photogallery']['#items'][$global_key]['entity'];
                $photo_gallery_photos = $photo_gallery->field_photos['und'];
                print_gallery($photo_gallery_photos, "review", $photo_gallery->title);
                $global_key = $global_key + 1;
              }
            }
          }else{
            print $new_body_continue;
          }
      ?>
      <?php 
        /* Если к обзору привязан фотообзор, то показываем фото в виде галереи */
        if (isset($content['field_photo_review']['#items']['0'])):?>
        <?php 
          $photo_review = $content['field_photo_review']['#items']['0']['entity'];
          $photo_review_photos = $photo_review->field_photos['und'];
          print_gallery($photo_review_photos, "review", $photo_review->title); 
        ?>     
      <?php endif; ?> 
       
    </div>
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
  <div class="tags-block">
    <h5><?php print t("Related topics"); ?></h5>   
    <?php foreach ($content['field_section']['#items'] as $section):?>
      <?php $term_section = taxonomy_term_load($section['taxonomy_term']->tid);
            $translated_term_section = i18n_taxonomy_localize_terms($term_section); ?>
      <a href="<?php print $prefix;?>/<?php print $term_section->field_english['und'][0]['value'];?>"><?php print $translated_term_section->name;?></a>
    <?php endforeach; ?>
    <?php foreach ($content['field_tags']['#items'] as $tags):?>
       <?php $term_tag = taxonomy_term_load($tags['taxonomy_term']->tid);
            $translated_term_tag = i18n_taxonomy_localize_terms($term_tag); ?>
      <a href="<?php print $prefix;?>/tags/<?php print str_replace(" ", "-", $tags['taxonomy_term']->name);?>"><?php print $translated_term_tag->name;?></a>
    <?php endforeach; ?>
  </div>
</div>
<div class="container">
  <div class="bordered-top">
    <h5 class="text-center special-font"><?php print t("See also");?></h5>
  </div>
</div>
<?php 
  /* Популярные обзоры */
  print views_embed_view('cyprus', 'theme_reviews5');
  switch ($type) {
    case 'text':
      /* Популярные места */
      print views_embed_view('cyprus', 'top_places');
      break;
    case 'photo':
      /* События из Афиши */
      print views_embed_view('cyprus', 'top_events');
      break;
    case 'recipe':
      /* События из Афиши */
      print views_embed_view('cyprus', 'top_events');
      break;
    default:
      # code...
      break;
  }
?>