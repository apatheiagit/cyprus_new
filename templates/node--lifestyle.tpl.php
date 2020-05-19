<?php 
  $theme_path = path_to_theme();
  global $language_content; 
  $lang = $language_content->language;
  if ($lang == 'en') $prefix = '/en'; else $prefix = '';
  $totalcount = isset($content['links']['statistics']['#links']['statistics_counter']['title']) ? (int) $content['links']['statistics']['#links']['statistics_counter']['title'] : 10;
  $rubric = $content['field_rubric']['#items']['0']['tid']; 
  $terms = taxonomy_term_load($rubric); $english = $terms->field_english['und'][0]['value']; $russian_name_localize = i18n_taxonomy_localize_terms($terms); $russian = $russian_name_localize->name;
  $watermark = $content['field_watermark']['#items']['0']['value'];
?>
<div class="partition-detail">
  <div class="container container-white">
    <div class="content">
      
      <div class="l-rubric"><?php print $russian; ?> | <?php print $totalcount;?></div>

      <h1 class="h1-title"><?php print $title;?></h1>

      <?php if (isset($content['field_www']['#items'])):?>
        <div class="video-block">
          <div class="photo">
            <?php
              if ($watermark == 1){  $style_name = 'life1340_730water';}
              elseif ($watermark == 0) {$style_name = 'life1340_730';}    
              $params = array(
                'style_name' => $style_name,
                'path' => $content['field_image']['#items']['0']['uri'],
                'alt' => $title,
                'title' => $title,
                'attributes' => array('class' => array('img-responsive')),
                'getsize' => FALSE,
              );?>    
            <?php  print theme('image_style', $params); ?>
            <svg width="94" height="94" viewBox="0 0 94 94" fill="none" class="icon-play">
              <circle cx="47" cy="47" r="47" fill="white"/>
              <path d="M35.9414 27.6472V66.3531L66.3532 47.0002L35.9414 27.6472Z" fill="black"/>
            </svg>
          </div>
          <div class="video">
            <?php print $content['field_www']['#items']['0']['value'];?>
          </div>
        </div>        
      <?php else:?>
      <div class="main-image photo">
        <?php
          if ($watermark == 1){  $style_name = 'life1340_730water';}
          elseif ($watermark == 0) {$style_name = 'life1340_730';}    
          $params = array(
            'style_name' => $style_name,
            'path' => $content['field_image']['#items']['0']['uri'],
            'alt' => $title,
            'title' => $title,
            'attributes' => array('class' => array('img-responsive')),
            'getsize' => FALSE,
          );?>    
        <?php  print theme('image_style', $params); ?>
      </div>
    <?php endif;?>

      <?php print($content['body']['#items'][0]['value']);?>

      <?php 
        /* Если фотографии просто добавлены в обзор, выводим их крупно в виде ленты */
        if (isset($content['field_photos']['#items'])):?>
        <?php               
            if ($watermark == 1){  $style_name = 'life892_502water';}
            elseif ($watermark == 0) {$style_name = 'life892_502';}?>
        <?php foreach ($content['field_photos']['#items'] as $photo):?>
          <p>
            <?php               
                $param = array(
                  'style_name' => $style_name,
                  'path' => $photo['uri'],
                  'getsize' => FALSE,
                );
                print theme('image_style', $param);
              ?> 
          </p>
          <div class="img-caption"><?php print $photo['alt']; ?></div>
        <?php endforeach; ?>
      <?php endif;?>

      <?php if(isset($content['field_author']['#items']['0']['taxonomy_term'])):?>
        <?php $author = $content['field_author']['#items']['0']['taxonomy_term'];?>
        <div class="author"><b><?php print t('Author'); ?>:</b> <?php print $author->name;?></div>
      <?php endif ?>

      <?php /* Поделитесь с друзьями */?>
      <?php $current_url = url(current_path(), array('absolute' => TRUE)); $current_title = drupal_get_title();?>
      <div class="share-block">
        <a href="http://vk.com/share.php?url=<?php print urlencode($current_url);?>&amp;title=<?php print $current_title;?>">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >                
            <path fill-rule="evenodd" clip-rule="evenodd" d="M16 3C16 1.344 14.656 0 13 0H3C1.344 0 0 1.344 0 3V13C0 14.656 1.344 16 3 16H13C14.656 16 16 14.656 16 13V3ZM2.445 4.514H3.767C4.097 4.514 4.224 4.653 4.351 5.022C4.999 6.89 6.08 8.53 6.524 8.53C6.69 8.53 6.766 8.453 6.766 8.034V6.102C6.73451 5.55317 6.54334 5.31382 6.40164 5.13642C6.31382 5.02646 6.245 4.9403 6.245 4.819C6.245 4.666 6.372 4.514 6.575 4.514H8.634C8.914 4.514 9.015 4.666 9.015 4.997V7.602C9.015 7.881 9.13 7.983 9.219 7.983C9.384 7.983 9.524 7.881 9.829 7.576C10.769 6.522 11.443 4.895 11.443 4.895C11.532 4.704 11.684 4.526 12.015 4.526H13.324C13.718 4.526 13.807 4.73 13.718 5.009C13.5788 5.6489 12.4303 7.34311 12.0709 7.87315C12.0018 7.97512 11.9619 8.034 11.964 8.034C11.824 8.263 11.773 8.364 11.964 8.619C12.0327 8.71224 12.1777 8.85461 12.3437 9.01751C12.5159 9.18655 12.7107 9.3777 12.866 9.559C13.425 10.194 13.857 10.728 13.972 11.097C14.073 11.465 13.896 11.656 13.514 11.656H12.205C11.8587 11.656 11.6798 11.4568 11.2989 11.0329C11.1353 10.8508 10.9344 10.6271 10.667 10.36C9.892 9.61 9.549 9.508 9.358 9.508C9.092 9.508 9.015 9.572 9.015 9.953V11.135C9.015 11.453 8.914 11.643 8.075 11.643C6.69 11.643 5.152 10.804 4.072 9.241C2.445 6.954 2 5.225 2 4.882C2 4.692 2.064 4.514 2.445 4.514Z" fill="#333333"/>
          </svg>
        </a>
        <a href="http://www.facebook.com/sharer.php?src=sp&amp;u=<?php print urlencode($current_url);?>">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >                
            <path fill-rule="evenodd" clip-rule="evenodd" d="M8.96197 15.9999V8.85093H11.412L11.779 6.00593H8.96197V4.18993C8.96197 3.36693 9.19097 2.80593 10.372 2.80593L11.878 2.80493V0.260926C11.617 0.225926 10.723 0.148926 9.68297 0.148926C7.51197 0.148926 6.02497 1.47393 6.02497 3.90893V6.00593H3.56897V8.85093H6.02497V15.9999H8.96197Z" fill="#333333"/>
          </svg>
        </a>
        <a href="https://telegram.me/share/url?url=<?php print urlencode($current_url);?>&amp;text=<?php print $current_title;?>">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
            <path fill-rule="evenodd" clip-rule="evenodd" d="M11.52 16H4.48C2.007 16 0 13.993 0 11.52V4.48C0 2.007 2.007 0 4.48 0H11.52C13.993 0 16 2.007 16 4.48V11.52C16 13.993 13.993 16 11.52 16ZM11.48 2H4.52C3.129 2 2 3.129 2 4.52V11.48C2 12.871 3.129 14 4.52 14H11.48C12.871 14 14 12.871 14 11.48V4.52C14 3.129 12.871 2 11.48 2ZM12 3C12.552 3 13 3.448 13 4C13 4.552 12.552 5 12 5C11.448 5 11 4.552 11 4C11 3.448 11.448 3 12 3ZM8 4C10.208 4 12 5.792 12 8C12 10.208 10.208 12 8 12C5.792 12 4 10.208 4 8C4 5.792 5.792 4 8 4ZM8 6C9.104 6 10 6.896 10 8C10 9.104 9.104 10 8 10C6.896 10 6 9.104 6 8C6 6.896 6.896 6 8 6Z" fill="#333333"/>                
          </svg>
        </a>
        <a href="http://twitter.com/home?status=<?php print urlencode($current_url);?>&amp;text=<?php print $current_title;?>">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
            <path fill-rule="evenodd" clip-rule="evenodd" d="M4.88506 14.9991C11.1321 14.9991 14.5491 9.82312 14.5491 5.33512C14.5491 5.18812 14.5491 5.04112 14.5391 4.89612C15.0841 4.50212 15.5681 4.03012 15.9761 3.49812C16.0091 3.45212 16.0081 3.39012 15.9731 3.34512C15.9391 3.30012 15.8801 3.28312 15.8271 3.30312C15.3291 3.48512 14.8111 3.61012 14.2831 3.67212C14.9141 3.29512 15.4031 2.72412 15.6821 2.05012C15.6971 2.01112 15.6851 1.96712 15.6541 1.94012C15.6231 1.91312 15.5781 1.90812 15.5411 1.92812C14.9391 2.25212 14.2911 2.48512 13.6201 2.61812C12.9771 1.93512 12.0801 1.54712 11.1431 1.54712C9.27806 1.54712 7.74306 3.08212 7.74306 4.94712C7.74306 5.20612 7.77306 5.46412 7.83106 5.71612C5.17206 5.58212 2.68706 4.35412 0.967059 2.33012C0.936059 2.29312 0.888059 2.27412 0.840059 2.27912C0.792059 2.28412 0.749059 2.31312 0.727059 2.35612C-0.0259413 3.87112 0.458059 5.75012 1.88206 6.70112C1.49506 6.68912 0.872059 6.49812 0.549059 6.39112C0.502059 6.37512 0.451059 6.38412 0.412059 6.41412C0.372059 6.44412 0.351059 6.49212 0.354059 6.54112C0.434059 7.22012 0.846059 9.24512 3.06606 9.64812C2.63106 9.76712 2.17806 9.79812 1.73306 9.73912C1.69006 9.73312 1.64706 9.75012 1.62006 9.78312C1.59306 9.81712 1.58606 9.86212 1.60106 9.90212C2.09906 11.1761 3.32506 12.0401 4.70506 12.0661C3.91006 12.6901 2.99106 13.1271 2.01806 13.3501C1.70006 13.4231 0.945059 13.4661 0.371059 13.4801C0.286059 13.4771 0.210059 13.5341 0.187059 13.6161C0.165059 13.6991 0.201059 13.7861 0.276059 13.8281C1.68706 14.5951 3.27106 14.9991 4.88506 14.9971" fill="#333333"/>                
          </svg>
        </a>
        <a href="http://www.tumblr.com/share/link?url=<?php print urlencode($current_url);?>&amp;name=<?php print $current_title;?>">
          <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >                
            <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 6.159 0.331 4.535 0.833 3.577C1.073 2.995 1.479 2.5 1.992 2.151C2.912 1.479 5.256 1 8 1C10.744 1 13.088 1.479 14.008 2.151C14.521 2.5 14.927 2.995 15.167 3.577C15.669 4.535 16 6.159 16 8C16 9.841 15.669 11.465 15.167 12.423C14.927 13.005 14.521 13.5 14.008 13.849C13.088 14.521 10.744 15 8 15C5.256 15 2.912 14.521 1.992 13.849C1.479 13.5 1.073 13.005 0.833 12.423C0.331 11.465 0 9.841 0 8ZM6.833 10.897C6.746 10.962 6.638 11 6.521 11C6.234 11 6 10.766 6 10.479V5.521C6 5.234 6.234 5 6.521 5C6.638 5 6.746 5.038 6.833 5.103L10.764 7.546L10.762 7.549C10.906 7.648 11 7.813 11 8C11 8.187 10.906 8.352 10.762 8.451L10.764 8.454L6.833 10.897Z" fill="#333333"/>                
          </svg>
        </a>   
        <script type="text/javascript">
        (function($) {
          $(function() {          
            $('.share-links a').on('click', function(){   
              var Url = $(this).attr('href');
              var newWin = window.open(Url, 'example', 'width=600,height=400');
              return false;
            });
            $('.video-block .photo').on('click', function(){
              $(this).addClass('inactive');
              var video = $(this).next('.video').children('iframe');
              var symbol = video[0].src.indexOf("?") > -1 ? "&" : "?";
              video[0].src += symbol + "autoplay=1";
            });
           })
        })(jQuery);    
        </script>
      </div>
    </div>
  </div>
</div>