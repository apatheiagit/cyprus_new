<?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    //print render($content);
    global $language_content; 
    $lang = $language_content->language;
    if ($lang == 'en') $prefix = '/en'; else $prefix = '';
    $term_city = taxonomy_term_load($content['field_city']['#items'][0]['taxonomy_term']->tid);
    $translated_term_city = i18n_taxonomy_localize_terms($term_city); 
?>
<div class="article-detail article-detail--event">
  <div class="article-photo-wrapper container">
    <div class="main-photo">
    <?php
      if ($content['field_cut_photo']['#items']['0']['value'] == 'top'){
        $params = array(
          'style_name' => 'cyprus1140x440top',
          'path' => $content['field_main_img']['#items']['0']['uri'],
          'alt' => $title,
          'title' => $title,
          'attributes' => array('class' => array('img-responsive')),
          'getsize' => FALSE,
        );
      }elseif($content['field_cut_photo']['#items']['0']['value'] == 'bottom'){
        $params = array(
          'style_name' => 'cyprus1140x440bottom',
          'path' => $content['field_main_img']['#items']['0']['uri'],
          'alt' => $title,
          'title' => $title,
          'attributes' => array('class' => array('img-responsive')),
          'getsize' => FALSE,
        );
      }else{
        $params = array(
          'style_name' => 'cyprus1140x440',
          'path' => $content['field_main_img']['#items']['0']['uri'],
          'alt' => $title,
          'title' => $title,
          'attributes' => array('class' => array('img-responsive')),
          'getsize' => FALSE,
        );
      }
      print theme('image_style', $params);
    ?>  
    </div> 
    <div class="main-info">
      <div class="article-type">
      <?php if (isset($content['field_city']['#items'][0]['taxonomy_term']->tid)):?>
        <a href="/events?city=<?php print $content['field_city']['#items'][0]['taxonomy_term']->tid;?>"><?php print $translated_term_city->name;?></a>
      <?php else:?>
        <a href="/events"><?php print t("All Cyprus") ?></a>
      <?php endif;?>
      </div>
      <div class="article-date">
        <?php 
            print format_date(strtotime($content['field_when']['#items'][0]['value']), 'long_event'); 
            if ($content['field_when']['#items'][0]['value2'] != $content['field_when']['#items'][0]['value']){
              print " - ";
              print format_date(strtotime($content['field_when']['#items'][0]['value2']), 'long_event');
         } ?>         
      </div>
      <h1 class="main-title"><?php print $title; ?></h1>
    </div>
  </div>
  <div class="container">
    <div class="article-share-wrapper">
      <div class="article-stat">
        <?php $count = isset($content['links']['statistics']['#links']['statistics_counter']['title']) ? (int) $content['links']['statistics']['#links']['statistics_counter']['title'] : 10;?>
        <div class="stat stat-watch"><span class="icon icon-views"></span><span class="count <?php if($count >= 1000) print 'many'; ?>"><?php print  $count; ?></span></div>    
      </div>
      <div class="article-share">
        <div class="pluso" data-background="none;" data-options="big,square,line,horizontal,nocounter,sepcounter=1,theme=14" data-services="vkontakte,facebook,tumblr,twitter"></div>
      </div>
    </div>
    <div class="container-bordered bordered-bottom">
        <div class="article-contact-block">        
          <div class="article-contact">
            <h5 class="article-title"><?php print t("Contact Information");?></h5>
            <?php if (isset($content['field_places']['0']['#markup'])):?>
              <div class="item-row">             
                <span class="item-label"><?php print t("Where");?>:</span>
                <span class="item-value">
                  <?php 
                  $count_places = count($content['field_places']);
                  for($i = 0; $i < $count_places; $i++) {
                    if(isset($content['field_places'][$i]['#markup'])){
                      print $content['field_places'][$i]['#markup']."; ";
                    }
                  }
                  ?>                    
                </span>
              </div>
            <?php endif;?>
            <?php if (isset($content['field_address']['#items']['0']['value'])):?>
              <div class="item-row">
                <span class="item-label"><?php print t("Address");?>:</span>
                <span class="item-value">
                <?php 
                  foreach ($content['field_address']['#items'] as $key => $value) {
                    print $value['value']."; ";
                  }                  
                ?>
                  <?php if(isset($content['field_latlng']['#items'][0])):?> <span class="show_map">(<?php print t("Show map");?>)</span><?php endif;?>
                </span>
              </div>
            <?php elseif (isset($content['field_places']['0']['#markup'])):?>
              <div class="item-row">
                <span class="item-label"><?php print t("Address");?>:</span>
                <span class="item-value">
                <?php 
                  foreach($content['field_places']['#items'] as $places){
                    print $places['entity']->field_address['und'][0]['value']."; ";
                  } 
                ?><span class='show_map'>(<?php print t("Show map");?>)</span>               
                </span>
              </div>
            <?php endif;?>
            <?php if (isset($content['field_phone']['#items']['0']['value'])):?>
              <div class="item-row">             
                <span class="item-label"><?php print t("Phone");?>:</span>
                <span class="item-value"><?php print($content['field_phone']['#items']['0']['value']);?></span>
              </div>
            <?php endif;?>
            <?php if (isset($content['field_time']['#items']['0']['value'])):?>
              <div class="item-row"> 
                <span class="item-label"><?php print t("Start");?>:</span>
                <span class="item-value"><?php print ($content['field_time']['#items'][0]['value']);?></span>
              </div>
            <?php endif;?>
            <?php if (isset($content['field_price']['#items']['0']['value'])):?>
              <div class="item-row"> 
                <span class="item-label"><?php print t("Price");?>:</span>
                <span class="item-value"><?php print ($content['field_price']['#items'][0]['value']);?></span>
              </div>
            <?php endif;?>
            <?php if (isset($content['field_www']['#items']['0']['value'])):?>
              <div class="item-row">
                <?php $newphrase = str_replace('http://', '', $content['field_www']['#items']['0']['value']);?>
                <?php $newphrase = str_replace('https://', '', $newphrase);?>
                <span class="item-label"><?php print t("Website") ?>:</span><span class="item-value"><?php print($newphrase);?></span>
              </div>
            <?php endif;?>
         </div>
        </div>    
      <div class="article-detail-block ">
        <div class="article-text bordered-top">
        <?php print($content['body']['#items'][0]['value']);?>
        </div>
      </div> 
  </div>
  <div class="map-wrapper">
    <div id="map_canvas" class="map-container"></div>
  </div>
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
  <?php if(isset($content['field_latlng']['#items'][0]) || isset($content['field_places']['#items'][0])):?>
  <script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?key=AIzaSyCBHA4KKBAltxjI2LHONR2AhNJekCfx1Vw&sensor=false"></script>
  <script type="text/javascript">
    <?php
    print "var Address = [";
    if(isset($content['field_latlng']['#items'][0])){
      foreach ($content['field_latlng']['#items'] as $latlng) { print "'".$latlng['value']."',"; }
    }else{
      foreach($content['field_places']['#items'] as $places){
        foreach ($places['entity']->field_latlng['und'] as $latlng) { print "'".$latlng['value']."',"; }
      }      
    }
    print "];";
    ?>
    var markers = new Array();
    var Locations = new Array(); 
    function initialize() {
      geocoder = new google.maps.Geocoder();
      var latlng = new google.maps.LatLng(35.126413, 33.429859);
      var mapOptions =  {zoom: 15, center: latlng}
      map = new google.maps.Map(document.getElementById('map_canvas'), mapOptions);      
      codeAddress(Address[0]);      
      for (var i = 0; i < Address.length; i++) {
        setMarkers(Address[i]);
      }
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    function setMarkers(address){
      geocoder.geocode( {address:address}, function(results, status) 
      {
        if (status == google.maps.GeocoderStatus.OK){
          var marker = new google.maps.Marker(
          {
            icon: '/sites/all/themes/cyprus_new/img/pin.svg',
            map: map,
            position: results[0].geometry.location,
            title: address
          });
        } else {
          console.log('Geocode was not successful for the following reason: ' + status);
       }
      });
    } 
    function codeAddress(address) {
      geocoder.geocode( {address:address}, function(results, status){
        if (status == google.maps.GeocoderStatus.OK)   map.setCenter(results[0].geometry.location);
        else console.log('Geocode was not successful for the following reason: ' + status);
      });
    }
  </script>
  <script type="text/javascript">
  (function($) {
      $(function() {  
        $('.show_map').click(function(){
            $('.body').css('width', $('.body').css('width'));
            $('body').css('overflow-y', 'hidden');
            $('<div id="mybox_overlay"></div>')
            .css('top',$(document).scrollTop()).css('opacity','0').animate({'opacity':'0.75'},'slow').appendTo('body');
            google.maps.event.trigger(map, 'resize');
            $('<span class="lb-close"></span>').prependTo('.map-wrapper');
            //$('.map-wrapper').show();
            $('.map-wrapper').css('visibility','visible');
        })
     });
  })(jQuery);   
  </script>
  <?php endif;?>
  <div class="tags-block">
    <h5><?php print t("Related topics"); ?></h5>   
    <a href="<?php print $prefix;?>/events?city=<?php print $content['field_city']['#items'][0]['taxonomy_term']->tid;?>"><?php print $translated_term_city->name;?></a>
    <?php foreach ($content['field_section']['#items'] as $section):?>
      <?php $term_section = taxonomy_term_load($section['taxonomy_term']->tid);
            $translated_term_section = i18n_taxonomy_localize_terms($term_section); ?>
      <a href="<?php print $prefix;?>/events?section=<?php print $section['taxonomy_term']->tid;?>"><?php print $translated_term_section->name;?></a>
    <?php endforeach; ?>
    <?php foreach ($content['field_category']['#items'] as $category):?>
      <?php $term_category = taxonomy_term_load($category['taxonomy_term']->tid);
            $translated_term_category = i18n_taxonomy_localize_terms($term_category); ?>
      <a href="<?php print $prefix;?>/events?category=<?php print $category['taxonomy_term']->tid;?>"><?php print $translated_term_category->name;?></a>
    <?php endforeach; ?>
    <?php foreach ($content['field_tags']['#items'] as $tags):?>
       <?php $term_tag = taxonomy_term_load($tags['taxonomy_term']->tid);
            $translated_term_tag = i18n_taxonomy_localize_terms($term_tag); ?>
      <a href="<?php print $prefix;?>/tags/<?php print str_replace(" ", "-", $tags['taxonomy_term']->name);?>"><?php print $translated_term_tag->name;?></a>
    <?php endforeach; ?>
  </div> 
</div>
</div>
<div class="container">
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