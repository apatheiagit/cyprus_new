<?php print render($page['content']); ?>
<div class="somit somit-footer">
  <div class="container footer-margin-top">
  <div class="footer-border-top">
    <div class="row">
      <div class="col-sm-4 col-md-3">
        <a href="/" class="bottom-logo"><img src="/sites/all/themes/cyprus_new/logo.svg" class="img-responsive" alt=""></a>
        <div class="bottom-descr"><?php print $site_slogan; ?></div>
        <div class="bottom-rights">Перепечатка и использование любых материалов только с разрешения редакции: <a href="mailto:editor@cyprustrav.ru">editor@cyprustrav.ru</a></div>
      </div>
      <div class="col-sm-8 col-md-6">
        <?php print render($page['footer']); ?>
        <div class="block-simplenews-wrapper">
          
          <div class="title">Подпишись на события Кипра</div>
          <div class="description">Каждую неделю мы знакомим вас с интересными событиями из жизни острова.<br>Коротко, информативно, познавательно!</div>          
          <?php print render($page['subscribe']); ?>
        </div>
      </div>      
      <div class="col-sm-12 col-md-3">
        <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">         
          <div class="soc-block">
            <div class="title">Социальные сети</div>
            <a class="vk" href="https://vk.com/cyprusfortravellers" rel="nofollow" target="_blank"></a>
            <a class="fb" href="https://www.facebook.com/cyprusfortravellers/" rel="nofollow" target="_blank"></a>
            <a class="gp" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank"></a>         
            <a class="tw" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank"></a>
            <a class="ig" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank"></a>
          </div>
        </div>
        <div class="col-xs-6 col-sm-6 col-md-12 col-lg-12">
          <div class="bottom-text">
            Прогноз погоды предоставлен<br><a href="http://openweathermap.org/" target="_blank">OpenWeatherMap</a>
          </div>
        </div>        
      </div>
    </div>
  </div>
  </div>
</div>
