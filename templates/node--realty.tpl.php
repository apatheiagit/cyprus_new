<?php 
  $theme_path = path_to_theme();
  global $language_content; 
  $lang = $language_content->language;
  if ($lang == 'en') $prefix = '/en'; else $prefix = '';
  $term_city = taxonomy_term_load($content['field_city']['#items'][0]['taxonomy_term']->tid);
  $translated_term_city = i18n_taxonomy_localize_terms($term_city); 
  $field_transaction_key = $content['field_transaction']['#items']['0']['value'];
  $field_transaction = field_info_field('field_transaction');
  $field_object_key = $content['field_object']['#items']['0']['value'];
  $field_object = field_info_field('field_object');
?>
<div class="container white-container">
  <div class="breads">
    <a href="<?php print $prefix;?>/realty?city=<?php print $content['field_city']['#items'][0]['taxonomy_term']->tid;?>"><?php print $translated_term_city->name;?></a> 
    <a href="<?php print $prefix;?>/realty?city=<?php print $content['field_city']['#items'][0]['taxonomy_term']->tid;?>&transaction=<?php print $field_transaction_key;?>"><?php print t($field_transaction_key);?></a> 
    <a href="<?php print $prefix;?>/realty?city=<?php print $content['field_city']['#items'][0]['taxonomy_term']->tid;?>&transaction=<?php print $field_transaction_key;?>&object=<?php print $field_object_key; ?>"><?php print t($field_object_key); ?></a> 
    <?php if(isset($content['field_address']['#items']['1']['value'])):?>
      <a href="<?php print $prefix;?>/realty?city=<?php print $content['field_city']['#items'][0]['taxonomy_term']->tid;?>&transaction=<?php print $field_transaction_key;?>&object=<?php print $field_object_key; ?>&address=<?php print $content['field_address']['#items']['0']['value'];?>"><?php print $content['field_address']['#items']['0']['value'];?></a>
      <span><?php print $content['field_address']['#items']['1']['value'];?></span>
    <?php else:?>
      <span><?php print $content['field_address']['#items']['0']['value'];?></span>
    <?php endif;?>
  </div>
  <h1 class="h1-title"><?php print $title;?></h1>
  <main class="realty-main">
  <div class="row">
    <div class="col-md-7 col-lg-8">
      <?php if (isset($content['field_photos']['#items'])):?>
        <div class="somit somit-gallery">
          <div class="photo-carousel owl-carousel">
            <?php foreach ($content['field_photos']['#items'] as $photo):?>
              <div class="photo-item">
                <?php 
                  $watermark = $content['field_watermark']['#items']['0']['value'];
                  if (is_null($watermark) || ($watermark == 1)){  $style_name = 'cyprus1140x720';}
                  elseif ($watermark == 0) {$style_name = 'cyprus1140x720wo';}                          
                    $param = array(
                      'style_name' => $style_name,
                      'path' => $photo['uri'],
                      'getsize' => FALSE,
                    );
                    print theme('image_style', $param);
                  ?> 

              </div>
            <?php endforeach; ?>
          </div>
          <?php if (isset($content['field_photos']['#items']['1']['value'])):?>
          <div class="photo-controls-wrapper">
            <div class="photo-controls"><div class="customBtn customPrevBtn"></div>
            <div class="owl-counter">
              <span class="current-photo">1</span> / <?php print count($content['field_photos']['#items']);?></div> 
              <div class="customBtn customNextBtn"></div>
            </div>
          </div>
          <?php endif;?>
        </div>
      <?php endif;?>
      <div class="main-descr">
        <?php print $content['body']['#items'][0]['value'];?>
      </div>
    </div>
    <div class="col-md-5 col-lg-4">
      <div class="price"><?php print number_format($content['field_cost']['#items']['0']['value'], 0, '', ' ');?> €</div>
      <div class="main-info">
        <div class="item">
          <div class="value"><?php print substr($content['field_total_area']['#items']['0']['value'], 0 , -3);?> <?php print t('m');?><sup>2</sup></div>
          <div class="label"><?php print t('Total');?></div>
        </div>
        <div class="item">
          <div class="value"><?php print substr($content['field_living_area']['#items']['0']['value'], 0 , -3);?> <?php print t('m');?><sup>2</sup></div>
          <div class="label"><?php print t('Living');?></div>
        </div>
        <div class="item">
          <div class="value"><?php print substr($content['field_kitchen_area']['#items']['0']['value'], 0 , -3);?> <?php print t('m');?><sup>2</sup></div>
          <div class="label"><?php print t('Kitchen');?></div>
        </div>
        <div class="item">
          <div class="value"><?php print $content['field_floor']['#items']['0']['value'];?> <?php print t('of');?> <?php print $content['field_floors']['#items']['0']['value'];?></div>
          <div class="label"><?php print t('Floor');?></div>
        </div>
      </div>
      
      <?php if(isset($content['field_developers']['#items']['0']['taxonomy_term'])):?>
        <div class="developer-info">
          <?php $developer = $content['field_developers']['#items']['0']['taxonomy_term'];?>              
          <?php 
            $params = array(
              'style_name' => 'thumbnail',
              'path' => $developer->field_image['und'][0]['uri'],
              'alt' => $developer->name,
              'title' => $developer->name,
              'getsize' => FALSE,
            );
          ?>
          <?php if (isset($developer->field_image['und'][0]['uri'])):?>
            <div class="logo"><?php print theme('image_style', $params); ?></div>
          <?php endif;?>
          <?php if(isset($developer->field_www['und'][0]['value'])):?>
            <a href="<?php print $developer->field_www['und'][0]['value'];?>" target="_blank"><?php print $developer->name;?></a>
          <?php else: ?>
            <span><?php print $developer->name;?></span>
          <?php endif;?>
        </div>
      <?php endif;?>
      <div class="button lime-button show-phone w-100"><?php print t('Call');?></div>
      <div class="main-phone"><?php print $content['field_phone']['#items']['0']['value'];?></div>
      <a href="mailto:<?php print $content['field_email']['#items']['0']['value'];?>" class="button lime-button w-100"><?php print t('Write');?></a>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-7 col-lg-8">
      <div class="row">
        <div class="col-sm-7 general-information">
          <h6><?php print t('General information');?></h6>
          <?php if(isset($content['field_developer']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Developer');?></div>
              <div class="r-value"><?php print $content['field_developer']['#items']['0']['value'];?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_layout']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Layout');?></div>
              <div class="r-value">
                <?php 
                $field_layout_key = $content['field_layout']['#items']['0']['value'];
                $field_layout = field_info_field('field_layout');
                print t ($field_layout_key); //$field_layout['settings']['allowed_values'][$field_layout_key];?>
              </div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_areas']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Room area');?></div>
              <div class="r-value"><?php print $content['field_areas']['#items']['0']['value'];?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_height']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Ceiling height');?></div>
              <div class="r-value"><?php print $content['field_height']['#items']['0']['value'];?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_furniture']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Furniture design');?></div>
              <div class="r-value">
                <?php 
                $field_furniture_key = $content['field_furniture']['#items']['0']['value'];
                $field_furniture = field_info_field('field_furniture');
                print t($field_furniture_key);//$field_furniture['settings']['allowed_values'][$field_furniture_key];?>
              </div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_bathroom']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Bathroom');?></div>
              <div class="r-value"><?php print $content['field_bathroom']['#items']['0']['value'];?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_view']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('View from the windows');?></div>
              <div class="r-value"><?php print $content['field_view']['#items']['0']['value'];?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_infrastructure']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Infrastructure');?></div>
              <div class="r-value"><?php print $content['field_infrastructure']['#items']['0']['value'];?></div>
            </div>
          <?php endif;?>
        </div>
        <div class="col-sm-5 general-information">
          <h6><?php print t('About the house');?></h6>
          <?php if(isset($content['field_year']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Year of construction');?></div>
              <div class="r-value"><?php print substr($content['field_year']['#items']['0']['value'],0,-15);?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_material']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Type of house');?></div>
              <div class="r-value">
                <?php 
                $field_material_key = $content['field_material']['#items']['0']['value'];
                $field_material = field_info_field('field_material');
                print t($field_material_key);//$field_material['settings']['allowed_values'][$field_material_key];?>
                </div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_floor_type']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Type of overlap');?></div>
              <div class="r-value">
                <?php 
                $field_floor_type_key = $content['field_floor_type']['#items']['0']['value'];
                $field_floor_type = field_info_field('field_floor_type');
                print t($field_floor_type_key);//$field_floor_type['settings']['allowed_values'][$field_floor_type_key];?>
                </div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_top']['#items']['0']['value']) && $content['field_top']['#items']['0']['value'] == 1):?>
            <div class="flex">
              <div class="r-label"><?php print t('Loggias/balconies');?></div>
              <div class="r-value"><?php print t('Yes');?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_entrances']['#items']['0']['value'])):?>
            <div class="flex">
              <div class="r-label"><?php print t('Entrances');?></div>
              <div class="r-value"><?php print $content['field_entrances']['#items']['0']['value'];?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_elevators']['#items']['0']['value']) && $content['field_elevators']['#items']['0']['value'] == 1):?>
            <div class="flex">
              <div class="r-label"><?php print t('Elevator');?></div>
              <div class="r-value"><?php print t('Yes');?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_concierge']['#items']['0']['value']) && $content['field_concierge']['#items']['0']['value'] == 1):?>
            <div class="flex">
              <div class="r-label"><?php print t('Concierge service');?></div>
              <div class="r-value"><?php print t('Yes');?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_water_system']['#items']['0']['value']) && $content['field_water_system']['#items']['0']['value'] == 1):?>
            <div class="flex">
              <div class="r-label"><?php print t('Water heating system');?></div>
              <div class="r-value"><?php print t('Yes');?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_diesel_boiler']['#items']['0']['value']) && $content['field_diesel_boiler']['#items']['0']['value'] == 1):?>
            <div class="flex">
              <div class="r-label"><?php print t('Diesel boiler');?></div>
              <div class="r-value"><?php print t('Yes');?></div>
            </div>
          <?php endif;?>
          <?php if(isset($content['field_conditioners']['#items']['0']['value']) && $content['field_conditioners']['#items']['0']['value'] == 1):?>
            <div class="flex">
              <div class="r-label"><?php print t('Air conditioners');?></div>
              <div class="r-value"><?php print t('Yes');?></div>
            </div>
          <?php endif;?>
        </div>
      </div>
    </div>
  </div>
  </main>
  <?php /*Другие предложения в этом районе*/
  print views_embed_view('realty', 'other');
  ?>
</div>
<script type="text/javascript">
  (function($) {
    $(function() {          
      $('.show-phone').on('click', function(){   
        $('.show-phone').hide();
        $('.main-phone').show();
      });
     })
  })(jQuery);    
  </script>
</div>