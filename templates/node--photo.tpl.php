<?php  
    function print_gallery($photo_array, $image_style, $p_title, $watermark = 1){
      $gallery = '<div class="somit somit-gallery">';
      $gallery .= '<div class="photo-carousel owl-carousel">';
      if (is_null($watermark) || ($watermark == 1)){  $style_name = 'cyprus1140x720';}
      elseif ($watermark == 0) {$style_name = 'cyprus1140x720wo';}
      foreach ($photo_array as $key => $photo) {
        $gallery .= '<div class="photo-item">';
        $photo_title = $photo['title'] == null ? $p_title : $photo['title'];
        $param = array(
          'style_name' => $style_name,
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
<div class="container white-container">
  <div class="container-bordered">
    <div class="article-content node-<?php print $node->nid; ?> <?php print $classes; ?> clearfix">
      <h1 class="main-title"><?php print $title; ?></h1>  
      <?php  print_gallery($content['field_photos']['#items'], "review", $title, $content['field_watermark']['#items'][0]['value']); ?>      
    </div>
  </div>
</div>
<?php 
  /* Популярные события в Афише */
  //print views_embed_view('cyprus', 'top_events');
  /* Популярные обзоры из того же раздела */
  print views_embed_view('cyprus', 'top_reviews');
  /* Популярные места в том же городе */
  print views_embed_view('cyprus', 'top_places');
?>
