<?php

/**
 * @file
 * This template handles the layout of the views exposed filter form.
 *
 * Variables available:
 * - $widgets: An array of exposed form widgets. Each widget contains:
 * - $widget->label: The visible label to print. May be optional.
 * - $widget->operator: The operator for the widget. May be optional.
 * - $widget->widget: The widget itself.
 * - $sort_by: The select box to sort the view using an exposed form.
 * - $sort_order: The select box with the ASC, DESC options to define order. May be optional.
 * - $items_per_page: The select box with the available items per page. May be optional.
 * - $offset: A textfield to define the offset of the view. May be optional.
 * - $reset_button: A button to reset the exposed filter applied. May be optional.
 * - $button: The submit button for the form.
 *
 * @ingroup views_templates
 */
?>

<div class="recipe-filter">
  <div class="container">
   <div class="inside-container">
    <div class="title"><?php print t("recipes");?></div>
    <div class="item" value="125">
     <span class="text"><?php print t("soups");?></span>
    </div>
    <div class="item" value="126">
     <span class="text"><?php print t("meat dishes");?></span>
    </div>
    <div class="item" value="127">
     <span class="text"><?php print t("seafood");?></span>
    </div>
    <div class="item" value="128">
     <span class="text"><?php print t("snacks");?></span>
    </div>
    <div class="item" value="129">
     <span class="text"><?php print t("salads");?></span>
    </div>
    <div class="item" value="130">
     <span class="text"><?php print t("desserts");?></span>
    </div>
    <div class="item" value="131">
     <span class="text"><?php print t("drinks");?></span>
   </div> 
  </div>
</div>
 <script type="text/javascript">
(function($) {
  $(function() {  
      Drupal.behaviors.betterExposedFilters = {
       attach: function(context, settings) {   
          $(document).ajaxComplete(function(event, jqXHR, settings) {            
            $('#subscribe-simplenews').remove();
          });
      }}
      var selectedCat = $('#edit-category-recipe').val();
      $('.recipe-filter .item').each(function(){
        if($(this).attr('value') == selectedCat){
          $(this).addClass('selected');
        }
      })
      $('.recipe-filter .item').on('click', function(){       
        $('.recipe-filter .item').removeClass('selected');
        $(this).addClass('selected');
        var value = $(this).attr('value');
        $('#edit-category-recipe').val(value);
        $('#edit-submit-cyprus').click();
      });
      $('.recipe-filter .title').on('click', function(){
      $('#edit-reset').click(); 
      });

   })
})(jQuery);    
</script>
  <div style="display: none;">
    <?php foreach ($widgets as $id => $widget): ?>  
          <?php if (!empty($widget->label)): ?>
            <label for="<?php print $widget->id; ?>">
              <?php print $widget->label; ?>
            </label>
          <?php endif; ?>
          <?php if (!empty($widget->operator)): ?>
            <div class="views-operator">
              <?php print $widget->operator; ?>
            </div>
          <?php endif; ?>
          <?php print $widget->widget; ?> 
    <?php endforeach; ?>
  
    <?php if (!empty($sort_by)): ?>
      <div class="views-exposed-widget views-widget-sort-by">
        <?php print $sort_by; ?>
      </div>
      <div class="views-exposed-widget views-widget-sort-order">
        <?php print $sort_order; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($items_per_page)): ?>
      <div class="views-exposed-widget views-widget-per-page">
        <?php print $items_per_page; ?>
      </div>
    <?php endif; ?>
    <?php if (!empty($offset)): ?>
      <div class="views-exposed-widget views-widget-offset">
        <?php print $offset; ?>
      </div>
    <?php endif; ?>
    <div class="col-xs-6 col-sm-9 col-md-3">
      <div class="views-exposed-widget views-submit-button filter-control--apply">
        <?php print $button; ?>
      </div>
    </div>
    <?php if (!empty($reset_button)): ?>
      <div class="col-xs-6 col-sm-3 col-md-3">
        <div class="views-exposed-widget views-reset-button filter-control--reset">
          <?php print $reset_button; ?>
        </div>
      </div>
    <?php endif; ?>
  </div>
</div>