<?php if (!empty($q)): ?>
  <?php
    // This ensures that, if clean URLs are off, the 'q' is added first so that
    // it shows up first in the URL.
    print $q;
  ?>
<?php endif; ?>
<script type="text/javascript">
(function($) {
  $(function() {
    if($('#edit-address').val() != ""){
      $('#edit-address-wrapper>label').hide();
    }  
    $('#edit-address').on('click', function(){
      $('#edit-address-wrapper>label').hide();
    });
   })
})(jQuery);    
</script>
<div class="realty-filter views-exposed-form">
  <div class="views-exposed-widgets clearfix">
    <?php foreach ($widgets as $id => $widget): ?>
      <div id="<?php print $widget->id; ?>-wrapper" class="views-exposed-widget views-widget-<?php print $id; ?>">
        <?php if ($id == 'sort-sort_bef_combine'):?>         
          
        <?php else: ?>
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
          <div class="views-widget">
            <?php print $widget->widget; ?>
          </div>
          <?php if (!empty($widget->description)): ?>
            <div class="description">
              <?php print $widget->description; ?>
            </div>
          <?php endif; ?>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
    
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
    <div class="views-exposed-widget views-submit-button">
      <?php print $button; ?>
    </div>
    <?php if (!empty($reset_button)): ?>
      <div class="views-exposed-widget views-reset-button">
        <?php print $reset_button; ?>
      </div>
    <?php endif; ?>
  </div>
  <?php if (!empty($widgets["sort-sort_bef_combine"])): ?>
    <div class="sort-order-block">
      <label for="<?php print $widgets["sort-sort_bef_combine"]->id; ?>">
        <?php print $widgets["sort-sort_bef_combine"]->label; ?>
      </label>
      <div class="views-widget">
        <?php print $widgets["sort-sort_bef_combine"]->widget; ?>
      </div>
    </div>
  <?php endif; ?>
</div>
