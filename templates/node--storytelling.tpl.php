<link rel="stylesheet" href="/sites/all/themes/cyprus_new/js/plugins/fullPage/jquery.fullPage.css">
<link rel="stylesheet" href="/sites/all/themes/cyprus_new/css/story_style.css">
<script src="/sites/all/themes/cyprus_new/js/plugins/fullPage/modernizr-custom.js"></script>
<script src="/sites/all/themes/cyprus_new/js/plugins/fullPage/jquery.easings.min.js"></script>
<script src="/sites/all/themes/cyprus_new/js/plugins/fullPage/scrolloverflow.min.js"></script>
<script src="/sites/all/themes/cyprus_new/js/plugins/fullPage/jquery.fullPage.js"></script>
<?php if ($unpublished): ?>
  <div class="unpublished"><?php print t('Unpublished'); ?></div>
<?php endif; ?>
<?php 
$chapters;
foreach ($content['field_chap']['#items'] as $key => $chap){ 
  $chaptId = $chap['value'];
  $field_collection_item = field_collection_item_load($chaptId);
  $field_wrapper = entity_metadata_wrapper('field_collection_item', $field_collection_item);
  $chapters[] = $field_wrapper;
}
?>
<?php function print_carousel($nid, $image_style, $carousel_type){
  $photo_node = node_load($nid);
  $carousel = '<div class="photo-carousel-wrap '.$carousel_type.'"><div class="story-carousel owl-carousel">';
  if(isset($photo_node)){
    foreach ($photo_node->field_photos['und'] as $key => $photo) {
      $carousel .= '<div class="photo-item">';
      $param = array(
          'style_name' => $image_style,
          'path' => $photo['uri'],
          'getsize' => FALSE,
        );
      $carousel .= theme('image_style', $param);
      $carousel .= '</div>';
    }
  }
  $carousel .= '</div></div>';
  print $carousel;
}?>
<div id="header">
  <div class="container">
    <div class="header-nav">
      <div class="back-button"><a href="/"></a></div>   
      <ul id="menu">
        <li data-menuanchor="chapter0" class="active"><a href="#chapter0"><img src="/sites/all/themes/cyprus_new/img/story-logo.png" alt=""></a></li>
        <?php $chapter_count = 1;?>
        <?php foreach ($chapters as $key => $chapter):?>
          <?php $menu_title = $chapter->field_title->value();?>
          <?php if(!empty($menu_title)):?>
            <li data-menuanchor="chapter<?php print $chapter_count;?>"><a href="#chapter<?php print $chapter_count;?>"><?php print $menu_title;?></a></li>
            <?php $chapter_count++;?>
          <?php endif;?>
        <?php endforeach; ?>
        <?php if(isset($content['field_english']['#items']['0']['value'])):?>
          <li data-menuanchor="chapter<?php print $chapter_count;?>"><a href="#chapter<?php print $chapter_count;?>"><?php print $content['field_english']['#items']['0']['value'];?></a></li>
            <?php $chapter_count++;?>
          <!--<li ><span class="anchor" data-href="#map2">глина</span></li>
          <li ><span class="anchor" data-href="#map3">церковь</span></li>-->
        <?php endif;?>
      </ul>
    </div>
  </div>
</div>
<div id="fullpage">
<?php foreach ($chapters as $key => $chapter):?>
  <?php 
    $background = $chapter->field_main_img->value();
    $background2 = $chapter->field_image->value();
    $body_right = $chapter->field_body->value();
    $body_left = $chapter->field_contacts->value();
    $dark = $chapter->field_advt->value();
  ?>
  <div class="section <?php if($dark == 1):?>dark-section<?php endif;?>  <?php if(!empty($background2['uri'])):?>changeBackground<?php endif;?>" id="chapter<?php print $key; ?>" style="background-image: url('<?php print file_create_url($background['uri']);?>');" <?php if(!empty($background2['uri'])):?> data-image1="<?php print file_create_url($background['uri']);?>" data-image2="<?php print file_create_url($background2['uri']);?>" data-imageCurrent="<?php print file_create_url($background['uri']);?>"<?php endif;?>>
    <div class="container">
      <div class="row">
        <div class="col-md-6"><div class="text-content">
          <?php 
          /* Делим весь текст по значку параграфа § чтобы вставить Фотогалерею (id фотогалереи внутри значков § §) */
          $body_array = explode("§",$body_left['value']);
          foreach ($body_array as $key => $text) {
            if(is_numeric($text)){
              print_carousel($text,'cyprus555x384', 'photo-carousel-wrap--small');
            }else{
              print $text;
            }
          }
          ?>          
        </div></div>
        <div class="col-md-6"><div class="text-content">
          <?php 
          $body_array = explode("§",$body_right['value']);
          foreach ($body_array as $key => $text) {
            if(is_numeric($text)){
              print_carousel($text,'cyprus490x615', 'photo-carousel-wrap--small');
            }else{
              print $text;
            }
          }
          ?>             
        </div></div>
      </div>
    </div>
  </div>  
<?php endforeach; ?>
<?php if(isset($content['field_body'])):?>
  <div class="section map-section" >
   <div class="full-map" id="chapter4" style="background-image: url('<?php print file_create_url($content['field_image']['#items']['0']['uri']);?>');">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="pins hidden-xs hidden-sm">
            <?php 
            /* Метки на карте */
            foreach ($content['field_map_places']['#items'] as $key => $place){ 
              $placeId = $place['value'];
              $field_collection_item = field_collection_item_load($placeId);
              $field_wrapper = entity_metadata_wrapper('field_collection_item', $field_collection_item);
              $place = $field_wrapper->field_one_place->value();
              $path = drupal_lookup_path('alias','node/'.$place->nid);
              ?>                          
              <div class="pin-wrap" style="<?php print $field_wrapper->field_price->value();?>">
                <div class="pin-icon"></div>
                <?php if(!empty($place)):?>
                <div class="pin-block">
                  <div class="title"><a href="/<?php print $path;?>" ><?php print $place->field_title['und'][0]['value'];?></a></div>
                  <div class="contacts"><?php print $place->field_address['und'][0]['value'];?><br><?php print $place->field_phone['und'][0]['value'];?></div>
                  <a class='more' href='/<?php print $path;?>' >Узнать больше</a>
                </div>
                <?php endif;?>
              </div>              
            <?php }?>
            </div>
          </div>
          <div id="map0"></div>
          <?php 
          /* Делим весь текст по значку параграфа § чтобы вставить Фотогалерею (id фотогалереи внутри значков § §) */
          $body_array = explode("§",$content['field_body']['#items']['0']['value']);
          foreach ($body_array as $key => $text) {
            if(is_numeric($text)){
              print_carousel($text,'cyprus1140x690', 'photo-carousel-wrap--big');
            }else{
              print $text;
            }
          }
          ?>  
        </div>
      </div>
    </div>
  </div>
<?php endif;?>
<?php if(isset($content['field_contacts'])):?>
<div class="section fp-auto-height" id="chapter5" style="background-image: url('<?php print file_create_url($content['field_background']['#items']['0']['uri']);?>');">
  <div class="container">
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <div class="text-content">
        <?php print $content['field_contacts']['#items']['0']['value'];?>
        </div>
      </div>
    </div>
  </div>
</div>
<?php endif;?>
<div class="section fp-auto-height end-section" id="chapter6" style="background-image: url('<?php print file_create_url($content['field_last_img']['#items']['0']['uri']);?>');color: #FFF;">
  <div class="container">
    <div class="row">
      <div class="col-md-6"></div>
      <div class="col-md-6">
        <div class="text-content">
        <h6>спецпроект</h5>
        <h1><?php print $title; ?></h1>
        <p><a class="link-totop" href="#chapter0">в начало</a></p>
        </div>
      </div>
    </div>
  </div>
 </div>
</div>
<script>
  (function ($) {
    $(".story-carousel").owlCarousel({
      loop:true,
      items: 1,
      nav: true,
      navText: ["",""],
      dots: false,
    });
    $('.anchor').click(function(e){
      e.preventDefault();
      var elem = $(this).attr('data-href');
      var map_diff = $(elem).offset().top - $('#map0').offset().top - $('#map0').outerHeight();
      $.fn.fullpage.moveTo('chapter4');
      $('#map_section').css('transform', 'translate3d(0px, -' + map_diff + 'px, 0px)'); 
    }); 
    $('#menu li a').click(function(){
      var element = $(this).attr('href');
      $('html,body').animate({scrollTop: $(element).offset().top}, 2000); 
    })
    $(".link-totop").click(function(e){
      //e.preventDefault();  
      $('html,body').animate({scrollTop: $('#chapter0').offset().top}, 4000);  
    }); 
    setInterval(function(){
      var loadedSection = $('.changeBackground');
      var image1 = loadedSection.attr('data-image1');
      var image2 = loadedSection.attr('data-image2');
      var currentImg = loadedSection.attr('data-imageCurrent');
      if (currentImg == image1){
            currentImg = image2;
          }else{
            currentImg = image1;                    
          }
          loadedSection.css('background-image', 'url('+currentImg+')');
          loadedSection.attr('data-imageCurrent', currentImg);
        }, 3000);
  }(jQuery));
</script>
