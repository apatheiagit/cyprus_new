<?php
/**
 * @file
 * Returns the HTML for a block.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728246
 */
?>
<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <div class="index-filter">
    <div class="container white-container">
      <h2 class="title-head align-center bordered"><?php print t("Places of interest"); ?></h2>    
      <div class="city-selector">
        <div class="arrow arrow-left"></div>
        <div class="arrow arrow-right"></div>
        <div class="city-array">
          <div value="1" class="city"><?php print t("Ayia-Napa");?></div>
          <div value="2" class="city "><?php print t("Larnaca");?></div>
          <div value="3" class="city current"><?php print t("Limassol");?></div>
          <div value="4" class="city"><?php print t("Nicosia");?></div>
          <div value="5" class="city"><?php print t("Paphos");?></div>
          <div value="62" class="city"><?php print t("Protaras");?></div>
          <div value="200" class="city"><?php print t("Polis");?></div>
        </div>
      </div>  
    <script>
    (function ($) {
      $('.city-selector .arrow-right').click(function(){
        var old_current = $(this).parent().find('.current');
        var new_current = old_current.next();
        if(new_current.length){          
        }else{
          new_current = $('.city-array').find(':first-child');
        }
        old_current.removeClass('current');
        new_current.addClass('current');
        var value = new_current.attr('value');
        $('#edit-main-city').val(value);
        $('#edit-submit-main').click();  
      });
      $('.city-selector .arrow-left').click(function(){
        var old_current = $(this).parent().find('.current');
        var new_current = old_current.prev();
        if(new_current.length){
        }else{
          new_current = $('.city-array').find(':last-child');
        }
        old_current.removeClass('current');
        new_current.addClass('current');
        var value = new_current.attr('value');
        $('#edit-main-city').val(value);
        $('#edit-submit-main').click();
            
      })
    }(jQuery));
    </script> 
  </div>
  <?php print render($title_prefix); ?>
  <?php if ($title): ?>
    <h2<?php print $title_attributes; ?>><?php print $title; ?></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php print $content; ?>

</div>
</div>