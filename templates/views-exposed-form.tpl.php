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
<script type="text/javascript">
(function($) {
  $(function() {  
  	$('#edit-when-value-date').change(function(){
  		$('#edit-field-when-value-date').val($('#edit-when-value-date').val());
  	});
  	  //$('#edit-field-when-value-date').val($('#edit-when-value-date').val());
      if($('#edit-section').val() == '6'){
        $('#edit-category option').hide();
        $('#edit-category option').each(function(){
          if(($(this).val() == '38') || ($(this).val() == '39') ||
            ($(this).val() == '40') || ($(this).val() == '41') ||
            ($(this).val() == '42') || ($(this).val() == '43') ||
            ($(this).val() == '44')){
            $(this).show();
          }
        })
      }else if($('#edit-section').val() == '7'){
        $('#edit-category option').hide();
        $('#edit-category option').each(function(){
          if(($(this).val() == '45') || ($(this).val() == '46') ||
            ($(this).val() == '47') || ($(this).val() == '48') ||
            ($(this).val() == '49') || ($(this).val() == '50') ||
            ($(this).val() == '51') || ($(this).val() == '52') ||
            ($(this).val() == '53') || ($(this).val() == '54') ||
            ($(this).val() == '55') || ($(this).val() == '56')){
            $(this).show();
          }
        })
      }else if($('#edit-section').val() == '8'){
        $('#edit-category option').hide();
        $('#edit-category option').each(function(){
          if(($(this).val() == '57') || ($(this).val() == '58') ||
            ($(this).val() == '59') || ($(this).val() == '60')){
            $(this).show();
          }
        })
      }
     
   })
})(jQuery);    
</script>
<div class="main-filter">
  <div class="row">
    <?php if (current_path() == 'events'):?>
    <div class="col-sm-6 col-md-3">
    	<div class="filter-header">    	
    		<div class="title subtitle"><?php print t("Events in Cyprus");?>:<br> <?php print t("where to go");?></div>
      </div>
    </div>
  	<?php elseif (current_path() == 'places'):?>
      <div class="col-sm-6 col-md-3">
        <div class="filter-header">   
  		    <div class="title"><?php print t("Places to visit in Cyprus");?></div> 
        </div>
      </div>		
  	<?php endif;?>  	
    <?php foreach ($widgets as $id => $widget): ?>
      <div class="col-sm-6 col-md-3">

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

      </div>
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
