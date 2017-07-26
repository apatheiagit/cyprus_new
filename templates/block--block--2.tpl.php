<div class="clearfix"></div>
<div class="wide-container-wo container main-subscribe-simplenews">
<div id="subscribe-simplenews" class='subscribe-block'>
  <div class="simplenews-block-wrap">
    <div class="row">
      <div class="col-lg-4 col-simplenews-left">
        <div class="special-text">Подпишитесь и получайте только лучшие статьи</div>
      </div>
      <div class="col-lg-8 col-simplenews-right">
      <?php 
        $block = module_invoke('simplenews', 'block_view', 61);
        print render($block['content']);
      ?>
      </div>
    </div>
  </div>
</div>
</div>