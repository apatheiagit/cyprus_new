<?php 
  $theme_path = path_to_theme();
  global $language_content; 
  $lang = $language_content->language;
  if ($lang == 'en') $prefix = '/en'; else $prefix = '';
  $url_alias = drupal_get_path_alias(current_path()); 
  $partition = explode('/', $url_alias); 
  $partition_name = "";
  if(isset($partition[1])) $partition_name = $partition[1];
  function substrwords($text, $maxchar, $end='...') {
    if (strlen($text) > $maxchar || $text == '') {
        $words = preg_split('/\s/', $text);      
        $output = '';
        $i      = 0;
        while (1) {
          $length = strlen($output)+strlen($words[$i]);
          if ($length > $maxchar) { break;} 
          else { $output .= " " . $words[$i]; ++$i;}
        }
        $output .= $end;
    } else { $output = $text;}
    return trim($output);
  }
?>
<?php /* На главной странице Лайфстай свой вариант главного баннера (2шт) */ ?>
<?php if($partition_name == ""): ?>  
  <div class="hit-topic-block">
    <div class="hit-main-carousel owl-carousel" data-slider-id="hit_main">
      <?php foreach ($content["field_main_article"]["#items"] as $key => $target) {
        $topic = node_load($target["target_id"]);
        $topic_rubric = $topic->field_rubric['und']['0']['tid']; 
        $topic_terms = taxonomy_term_load($topic_rubric); $topic_english = $topic_terms->field_english['und'][0]['value']; 
        $topic_russian = $topic_terms->name;
      ?>      
      <div class="container">
        <div class="decor decor-1"></div>
        <div class="decor decor-2"></div>
        <div class="hit-topic">
          <div class="photo">
            <?php
              $params = array(
                'style_name' => 'life680_528',
                'path' => $topic->field_main_img['und'][0]['uri'],
                'alt' => $topic->title,
                'title' => $topic->title,
                'getsize' => FALSE,
              );?>    
            <?php  print theme('image_style', $params); ?>
          </div>
          <div class="info">
            <div class="l-rubric"><a href="<?php print $prefix."/lifestyle/all/".$topic_english;?>"><?php print t($topic_english); ?></a></div>
            <div class="title"><a href="<?php print $prefix;?><?php print drupal_get_path_alias("node/".$topic->nid); ?>"><?php print substrwords($topic->title, 70);?></a></div>
            <div class="descr"><?php print $topic->field_heading["und"][0]["value"];?></div>
          </div>
        </div>
      </div>
      <?php }?>      
    </div>    
    <div class="hit-topic-nav hit-nav-<?php print count($content["field_main_article"]["#items"]);?>">
      <div class="hit-topic-container" data-slider-id="hit_main">
        <?php foreach ($content["field_main_article"]["#items"] as $key => $target) {
          $topic = node_load($target["target_id"]);
          $topic_totalcount = statistics_get($topic->nid);
          $topic_rubric = $topic->field_rubric['und']['0']['tid']; 
          $topic_terms = taxonomy_term_load($topic_rubric); $topic_english = $topic_terms->field_english['und'][0]['value']; 
          $topic_russian = $topic_terms->name;
        ?>
        <div class="hit-topic-item active">
          <div class="photo">
            <?php
              $params = array(
                'style_name' => 'life68_68',
                'path' => $topic->field_main_img['und'][0]['uri'],
                'alt' => $topic->title,
                'title' => $topic->title,
                'getsize' => FALSE,
              );?>    
            <?php  print theme('image_style', $params); ?>
          </div>
          <div class="info">
            <div class="l-rubric"><?php print t($topic_english); ?> <span>| <?php print $topic_totalcount["totalcount"];?></span></div>
            <div class="title"><?php print substrwords($topic->title, 70);?></div>
            <div class="descr"><?php print $topic->field_heading["und"][0]["value"];?></div>
          </div>
        </div>
        <?php }?> 
      </div>
    </div>
  </div>
<?php else: ?>
  <div class="hit-topic-carousel"> <?php /* На остальных страницах 3 главных баннера  */ ?>
    <div class="container-fluid">
      <div class="mobile-carousel">
    <?php foreach ($content["field_main_article"]["#items"] as $key => $target) {
      $topic = node_load($target["target_id"]);
      $topic_totalcount = statistics_get($topic->nid);
      $topic_rubric = $topic->field_rubric['und']['0']['tid']; 
      $topic_terms = taxonomy_term_load($topic_rubric); $topic_english = $topic_terms->field_english['und'][0]['value'];
      $topic_russian = $topic_terms->name;
    ?>    
      <div class="hit-topic <?php if($key == 0) print "hit-topic-big"; else print "hit-topic-small"; ?>">
        <div class="decor decor-9"></div>
        <div class="decor decor-10"></div>
        <div class="photo photo-big">
          <?php
              $params = array(
                'style_name' => 'life1000_654',
                'path' => $topic->field_main_img['und'][0]['uri'],
                'alt' => $topic->title,
                'title' => $topic->title,
                'getsize' => FALSE,
              );?>    
            <?php  print theme('image_style', $params); ?>
        </div>
        <div class="photo photo-small">
          <?php
              $params = array(
                'style_name' => 'life320_654',
                'path' => $topic->field_main_img['und'][0]['uri'],
                'alt' => $topic->title,
                'title' => $topic->title,
                'getsize' => FALSE,
              );?>    
            <?php  print theme('image_style', $params); ?>
        </div>
        <div class="info">
          <div class="l-rubric"><a href="<?php print $prefix."/lifestyle/all/".$topic_english;?>"><?php print t($topic_english); ?></a> <span>| <?php print $topic_totalcount["totalcount"];?></span></div>
          <div class="title"><a href="<?php print $prefix;?>/<?php print drupal_get_path_alias("node/".$topic->nid); ?>"><?php print substrwords($topic->title, 70);?></a></div>
          <div class="descr"><?php print $topic->field_heading["und"][0]["value"];?></div>
        </div>
      </div>
    <?php }?> 
    </div>
    </div>
  </div>
<?php endif;?>

<?php  /* На всех, кроме главной, блок Материалы поддержки - 4 самые не популярные статьи */ ?>
<?php print render($content['field_news']);?>

<?php /* Блок с Лидирующей статьей (выбирается менеджером) и Свежими статьями (4 самые последние статьи) */ ?>
<div class="topic-views fresh-topics bordered">
  <div class="container">
    <h2 class="color-title visible-xs"><?php print t('Recent articles'); ?></h2>
    <div class="row row-10">
      <div class="col col-sm-6">
        <?php 
          if (isset($content["field_leader"]["#items"]["0"])){
            $leader = node_load($content["field_leader"]["#items"]["0"]["target_id"]);
            $leader_totalcount = statistics_get($leader->nid);
            $leader_rubric = $leader->field_rubric['und']['0']['tid']; 
            $leader_terms = taxonomy_term_load($leader_rubric); $leader_english = $leader_terms->field_english['und'][0]['value']; 
            $leader_russian = $leader_terms->name;
            $leader_kind = $leader->field_kindt["und"][0]["tid"];
            $leader_kind_terms = i18n_taxonomy_localize_terms(taxonomy_term_load($leader_kind));
            $leader_label = $leader_kind_terms->name;
            $leader_video = $leader->field_www["und"][0]["value"];
          ?>
          <div class="topic-item topic-item-trailer">          
            <div class="photo">
              <?php
                $params = array(
                  'style_name' => 'life660_655',
                  'path' => $leader->field_main_img['und'][0]['uri'],
                  'alt' => $leader->title,
                  'title' => $leader->title,
                  'getsize' => FALSE,
                );?>    
              <?php  print theme('image_style', $params); ?>
            </div>
            <div class="info">
              <div class="l-rubric"><a href="<?php print $prefix."/lifestyle/all/".$leader_english;?>"><?php print t($leader_english); ?></a>
                <?php if($leader_kind):?>
                | <?php print t($leader_label);?>
                <?php endif;?> 
                | <?php print $leader_totalcount['totalcount'];?>
              </div>
              <div class="title"><a href="<?php print $prefix;?>/<?php print drupal_get_path_alias("node/".$leader->nid); ?>"><?php print $leader->title;?></a></div>
              <div class="descr"><?php print $leader->field_heading["und"][0]["value"];?></div>
              <?php if($leader_kind == 323 && (isset($leader_video))):?>
                <div class="special-mark special-mark-video play-trailer">
                  <span class="ellipse">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" >
                      <path d="M8 5V19L19 12L8 5Z" fill="black"/>
                    </svg>                  
                  </span> <?php print t('Trailer');?>
                  <div class="video-hidden">
                    <?php print $leader_video;?>
                  </div>
                </div>
              <?php elseif ($leader_kind == 322):?>
                <a href="/<?php print drupal_get_path_alias("node/".$leader->nid); ?>" class="special-mark special-mark-photo">
                  <span class="ellipse">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
                      <path d="M8.00003 10.1333C9.17824 10.1333 10.1334 9.17821 10.1334 8C10.1334 6.82179 9.17824 5.86667 8.00003 5.86667C6.82182 5.86667 5.8667 6.82179 5.8667 8C5.8667 9.17821 6.82182 10.1333 8.00003 10.1333Z" fill="black"/>
                      <path d="M5.99992 1.33333L4.77992 2.66666H2.66659C1.93325 2.66666 1.33325 3.26666 1.33325 3.99999V12C1.33325 12.7333 1.93325 13.3333 2.66659 13.3333H13.3333C14.0666 13.3333 14.6666 12.7333 14.6666 12V3.99999C14.6666 3.26666 14.0666 2.66666 13.3333 2.66666H11.2199L9.99992 1.33333H5.99992ZM7.99992 11.3333C6.15992 11.3333 4.66659 9.84 4.66659 8C4.66659 6.16 6.15992 4.66666 7.99992 4.66666C9.83992 4.66666 11.3333 6.16 11.3333 8C11.3333 9.84 9.83992 11.3333 7.99992 11.3333Z" fill="black"/>
                    </svg>                              
                  </span> <?php print t('Picture story');?>
                </a>
              <?php endif;?>
            </div>
          </div>
      <?php }?>
      </div>
      <div class="col col-sm-6">
        <?php print render($content['field_fresh']);?>
      </div>
    </div>
  </div>
</div>

<?php /* 6 самых популярных статей (большее число просмотров) */ ?>
<?php print render($content['field_popular']);?> 

<?php /* Новые кинопремьеры (статьи у которых есть Обложка кинопремьеры), отображается только на главной и в разделе Кино */ ?>
<?php print render($content['field_movie']);?>

<?php /* Выделенная цветом статья */ ?>
<?php if (isset($content["field_highlight"]["#items"]["0"])):?>
  <?php 
    $highlight = node_load($content["field_highlight"]["#items"]["0"]["target_id"]);
    $highlight_totalcount = statistics_get($highlight->nid);
    $highlightr_rubric = $highlight->field_rubric['und']['0']['tid']; 
    $highlight_terms = taxonomy_term_load($highlightr_rubric); $highlight_english = $highlight_terms->field_english['und'][0]['value']; 
    $highlight_rubric_terms = i18n_taxonomy_localize_terms($highlight_terms);
    $highlight_russian = $highlight_rubric_terms->name;
    $highlight_kind = $highlight->field_kindt["und"][0]["tid"];
    $highlight_kind_terms = i18n_taxonomy_localize_terms(taxonomy_term_load($highlight_kind));
    $highlight_label = $highlight_kind_terms->name;
  ?>
<div class="photo-topics">
  <div class="decor decor-3"></div>    
  <div class="container">
    <div class="decor decor-5"></div>      
    <div class="decor decor-6"></div>
    <div class="decor decor-7"></div>
    <div class="decor decor-8"></div>      
    <div class="topic-item topic-item-photo">        
      <div class="info">
        <div class="l-rubric"><a href="<?php print $prefix."/lifestyle/all/".$highlight_english;?>"><?php print $highlight_russian; ?></a>  
          <?php if (isset($highlight_kind)):?> 
          | <?php print $highlight_label;?> 
          <?php endif;?>
          | <?php print $highlight_totalcount['totalcount'];?></div>
        <div class="title"><a href="<?php print $prefix;?>/<?php print drupal_get_path_alias("node/".$highlight->nid); ?>"><?php print $highlight->title;?></a></div>
        <?php if ($highlight_kind == 322):?>
        <a class="special-mark special-mark-photo" href="<?php print $prefix;?>/<?php print drupal_get_path_alias("node/".$highlight->nid); ?>">
          <span class="ellipse">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
              <path d="M8.00003 10.1333C9.17824 10.1333 10.1334 9.17821 10.1334 8C10.1334 6.82179 9.17824 5.86667 8.00003 5.86667C6.82182 5.86667 5.8667 6.82179 5.8667 8C5.8667 9.17821 6.82182 10.1333 8.00003 10.1333Z" fill="black"/>
              <path d="M5.99992 1.33333L4.77992 2.66666H2.66659C1.93325 2.66666 1.33325 3.26666 1.33325 3.99999V12C1.33325 12.7333 1.93325 13.3333 2.66659 13.3333H13.3333C14.0666 13.3333 14.6666 12.7333 14.6666 12V3.99999C14.6666 3.26666 14.0666 2.66666 13.3333 2.66666H11.2199L9.99992 1.33333H5.99992ZM7.99992 11.3333C6.15992 11.3333 4.66659 9.84 4.66659 8C4.66659 6.16 6.15992 4.66666 7.99992 4.66666C9.83992 4.66666 11.3333 6.16 11.3333 8C11.3333 9.84 9.83992 11.3333 7.99992 11.3333Z" fill="black"/>
            </svg>                 
          </span> <?php print t("Watch");?>            
        </a> 
        <?php else:?>
          <a class="special-mark special-mark-read" href="<?php print $prefix;?>/<?php print drupal_get_path_alias("node/".$highlight->nid); ?>"><?php print t("Read");?> </a>
        <?php endif;?>                
      </div>
      <div class="photo">
        <div class="decor decor-101"></div>
        <div class="decor decor-102"></div>
        <div class="decor decor-103"></div>
        <div class="decor decor-104"></div>
        <?php
          $params = array(
            'style_name' => 'life600_364',
            'path' => $highlight->field_main_img['und'][0]['uri'],
            'alt' => $highlight->title,
            'title' => $highlight->title,
            'getsize' => FALSE,
          );?>    
        <?php  print theme('image_style', $params); ?>
      </div>
    </div>
  </div>
</div>
<?php endif;?>
 
<?php /* На главной странице Лайфстайл отображаем статьи с типом Мода, на остальных страницах блок Лучшее из раздела */ ?>
<?php if (isset($content["field_subtitle"]["#items"]["0"])):?>
<div class="container">
  <h2 class="color-title title_best_topics"><?php print $content["field_subtitle"]["#items"]["0"]["value"];?></h2>
</div>
<?php endif;?>
<?php if(isset($content["field_best_articles"]["#items"][0])):?> <?php /* Если менеджер выбрал Лучшие статьи, то они отображаются */ ?>
    
  <?php if($partition_name == "cinema"):?> <?php /* На странице Кино отображаем блок Новые трейлеры */ ?>
    <div class="container">
      <div class="trailer-carousel owl-carousel owl-nav-theme">
        <?php $big_array = array_chunk($content["field_best_articles"]["#items"], 3);
        foreach($big_array as $part_array):?>
        <div class="trailers-block">
          <div class="row row-10">
            <?php foreach ($part_array as $key => $target) {
              $topic = node_load($target["target_id"]);
              $topic_totalcount = statistics_get($topic->nid);
              $topic_rubric = $topic->field_rubric['und']['0']['tid']; 
              $topic_terms = taxonomy_term_load($topic_rubric); $topic_english = $topic_terms->field_english['und'][0]['value'];
              $topic_russian = $topic_terms->name;
              $topic_video = $topic->field_www["und"][0]["value"];
              $trailer = $topic->type == "trailer" ? true : false;
            ?>
            <?php if($key == 0):?>
            <div class="col col-sm-6 col-md-8">
              <div class="topic-item topic-item-trailer">
            <?php else:?>
            <div class="col col-sm-6 col-md-4 col-xs-6">            
              <div class="topic-item topic-item-announce">
            <?php endif;?>
                <div class="photo">
                  <?php
                    $params = array(
                      'style_name' => 'life883_717',
                      'path' => $topic->field_main_img['und'][0]['uri'],
                      'alt' => $topic->title,
                      'title' => $topic->title,
                      'getsize' => FALSE,
                    );?>    
                  <?php  print theme('image_style', $params); ?>
                </div>
                <div class="info">
                  <?php if (!$trailer):?>
                  <div class="l-rubric"><a href="<?php print $prefix."/lifestyle/all/".$topic_english;?>"><?php print $topic_russian; ?></a>
                    <span>| <?php print $topic_totalcount["totalcount"];?></span></div>
                  <?php endif;?>
                  <div class="title">
                    <?php if ($trailer):?> <?php /* У типа материала Трейлер нет подробной страницы, значит нет ссылки с переходом*/ ?>
                      <?php print $topic->title;?>
                    <?php else:?>
                      <a href="/<?php print drupal_get_path_alias("node/".$topic->nid); ?>"><?php print $topic->title;?></a>
                    <?php endif;?>
                  </div>
                  <div class="descr"><?php print $topic->field_heading['und']['0']['value'] ?></div>
                  <?php if(isset($topic_video)):?>
                    <div class="special-mark special-mark-mark play-trailer">
                      <span class="ellipse">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" >
                          <path d="M8 5V19L19 12L8 5Z" fill="black"/>
                        </svg>                  
                      </span> <?php print t("Trailer");?>
                      <div class="video-hidden">
                        <?php print $topic_video;?>
                      </div>
                    </div>  
                  <?php endif;?>              
                </div>
              </div>
            </div>          
            <?php } ?>        
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>

  <?php else:?> <?php /* На остальных страницах отображаем карусельку с Лучшими статьями, отобранными менеджером */ ?>
    <div class="container">
      <div class="best_topics-carousel topics3-carousel owl-carousel owl-nav-theme">
        <?php foreach ($content["field_best_articles"]["#items"] as $key => $target) {
          $topic = node_load($target["target_id"]);
          $topic_totalcount = statistics_get($topic->nid);
          $topic_rubric = $topic->field_rubric['und']['0']['tid']; 
          $topic_terms = taxonomy_term_load($topic_rubric); $topic_english = $topic_terms->field_english['und'][0]['value'];
          $topic_russian = $topic_terms->name;
          $topic_kind = $topic->field_kindt["und"][0]["tid"];
          $topic_kind_terms = i18n_taxonomy_localize_terms(taxonomy_term_load($topic_kind));
          $topic_label = $topic_kind_terms->name;

        ?> 
        <div class="topic-item topic-item-usial">
          <div class="photo">
            <?php
              $params = array(
                'style_name' => 'life430_253',
                'path' => $topic->field_main_img['und'][0]['uri'],
                'alt' => $topic->title,
                'title' => $topic->title,
                'getsize' => FALSE,
              );?>    
            <?php  print theme('image_style', $params); ?>
          </div>          
          <div class="info">
            <div class="l-rubric"><a href="<?php print $prefix."/lifestyle/all/".$topic_english;?>"><?php print $topic_russian; ?></a> 
              <?php if(isset($topic_kind)):?>
              | <?php print $topic_label;?>
              <?php endif;?>
              <span>| <?php print $topic_totalcount["totalcount"];?></span>
            </div>
            <div class="title"><a href="/<?php print drupal_get_path_alias("node/".$topic->nid); ?>"><?php print $topic->title;?></a></div>             
          </div>        
        </div>
      <?php }?>
      </div>
    </div>
  <?php endif;?>
    
<?php else:?> <?php /* иначе Последние статьи, исключая те, что вверху в блоке Свежие статьи */ ?>
  <?php print render($content['field_best']);?>
<?php endif;?>

<?php /* На главной странице Лайфстайл отображаем статьи с типом "Гурман-киноман" */ ?>
<?php if(isset($content["field_recipe"]["#items"]["0"])): ?>
<div class="best-recipes bordered">
    <div class="container">
      <h2 class="color-title"><?php print t('Film Foodie'); ?></h2>
      <div class="trailer-carousel owl-carousel owl-nav-theme">
        <?php $big_array = array_chunk($content["field_recipe"]["#items"], 3);
        foreach($big_array as $part_array):?>
        <div class="trailers-block">
          <div class="row row-10">
            <?php foreach ($part_array as $key => $target) {
              $recipe = node_load($target["target_id"]);
              $recipe_totalcount = statistics_get($recipe->nid);
              $recipe_rubric = $recipe->field_rubric['und']['0']['tid']; 
              $recipe_terms = taxonomy_term_load($recipe_rubric); $recipe_english = $recipe_terms->field_english['und'][0]['value']; 
              $recipe_russian = $recipe_terms->name;
            ?>
            <?php if ($key == 2):?>
              <div class="col col-sm-8 col-md-8">             
                <div class="topic-item topic-item-trailer">
                  <div class="photo">
                    <?php
                      $params = array(
                        'style_name' => 'life883_717',
                        'path' => $recipe->field_main_img['und'][0]['uri'],
                        'alt' => $recipe->title,
                        'title' => $recipe->title,
                        'getsize' => FALSE,
                      );?>    
                    <?php  print theme('image_style', $params); ?>
                  </div>
                  <div class="info">
                    <div class="l-rubric"><a href="<?php print $prefix."/lifestyle/all/".$topic_english;?>"><?php print $recipe_russian; ?></a> | <?php print $recipe_totalcount['totalcount'];?></div>
                    <div class="title"><a href="/<?php print drupal_get_path_alias("node/".$recipe->nid); ?>"><?php print $recipe->title;?></a></div>              
                  </div>
                </div>
              </div>
            <?php else:?>
              <?php if ($key == 0):?>
              <div class="col col-sm-4 col-md-4">
                <div class="row row-10">
              <?php endif;?>    
                  <div class="col col-xs-6 col-sm-12">
                    <div class="topic-item topic-item-usial ">
                      <div class="photo">
                        <?php
                          $params = array(
                            'style_name' => 'life430_253',
                            'path' => $recipe->field_main_img['und'][0]['uri'],
                            'alt' => $recipe->title,
                            'title' => $recipe->title,
                            'getsize' => FALSE,
                          );?>    
                        <?php  print theme('image_style', $params); ?>
                      </div>
                      <div class="info">
                        <div class="l-rubric"><a href="<?php print $prefix."/lifestyle/all/".$topic_english;?>"><?php print $recipe_russian; ?></a> | <?php print $recipe_totalcount['totalcount'];?></div>
                        <div class="title"><a href="/<?php print drupal_get_path_alias("node/".$recipe->nid); ?>"><?php print $recipe->title;?></a></div>              
                      </div>
                    </div>
                  </div>
              <?php if ($key == 1 || ($key == 0 && count($part_array) == 1)):?>        
                </div>
              </div>
              <?php endif;?>
            <?endif;?>            
          <?php }?>
          </div>
        </div>
        <?php endforeach;?>
      </div>
    </div>
  </div>
<?php endif;?>

<?php /* На главной странице отображаем #нольотходов, в разделе Кино - Лучшие сериалы, в остальных разделах Выбор редакции (статьи с наименьшим просмотром) */ ?>
<?php print render($content['field_zerowaste']);?>

<?php /* На главной странице отображаем Психология, на других ничего */ ?>
<?php print render($content['field_psychology']);?>

<?php /* Кнопка перехода на все статьи раздела */ ?>
<?php if($partition_name != ""): ?>
  <div class="align-center view-all-articles">
    <a href="<?php print $prefix;?>/lifestyle/all/<?php print $partition_name;?>"><?php print t("View all articles");?></a>
  </div>

<?php endif;?>

<script>
  (function ($) {

  }(jQuery));
</script>