<?php $page_type = arg(0); ?>
<?php global $user; $clear_class = "";
      global $language_content; $lang = $language_content->language; if ($lang == 'en') $prefix = '/en'; else $prefix = '';
?>
<div class="somit somit-header <?php print $page_type; ?>">
  <div class="upper-header">
    <div class="container">
    <div class="inside-container">  
      <div class="row">
        <div class="col-sm-5 col-weather">
          <div class="weather-block">
            <div class="city-filter">
              <div class="city-label"><?php print t("weather")?>:</div>
              <div class="current-city"><span class="name"><?php print t("Limassol");?></span></div>
              <div class="city-list">
                <ul>
                  <li><span data-city="Ayia-Napa"><?php print t("Ayia-Napa");?></span></li>
                  <li><span data-city="Larnaca"><?php print t("Larnaca");?></span></li>
                  <li><span data-city="Limassol"><?php print t("Limassol");?></span></li>
                  <li><span data-city="Nicosia"><?php print t("Nicosia");?></span></li>
                  <li><span data-city="Paphos"><?php print t("Paphos");?></span></li>  
                  <li><span data-city="Polis"><?php print t("Polis");?></span></li>  
                </ul>
              </div>
            </div>
            <div class="weather" style="opacity:0;">
              <div class="weather-icon"><img src="/sites/all/themes/cyprus_new/img/weather/00d.png"></div>
              <div class="weather-temp"><span class="weather-degree"></span><span class="weather-zero">o</span>C</div>
            </div>
          </div>
        </div>
        <div class="col-xs-8 col-sm-5 col-md-5  col-social">
          <div class="soc-block">
          <?php if ($lang == 'en'):?>
            <a class="fb" title="Go Facebook" href="https://www.facebook.com/cyprusfortravellers.net/" rel="nofollow" target="_blank"></a>
            <a class="gp" title="Go Tumblr" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank"></a>         
            <a class="tw" title="Go Twitter" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank"></a>
            <a class="ig" title="Go Instagram" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank"></a>
          <?php else:?>
            <a class="vk" title="Перейти в группу Вконтакте" href="https://vk.com/cyprusfortravellers" rel="nofollow" target="_blank"></a>
            <a class="fb" title="Перейти в группу в Фейсбуке" href="https://www.facebook.com/cyprusfortravellers/" rel="nofollow" target="_blank"></a>
            <a class="gp" title="Перейти в группу в Tumblr" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank"></a>         
            <a class="tw" title="Перейти в группу в Twitter" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank"></a>
            <a class="ig" title="Перейти на страницу в Instagram" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank"></a>
          <?php endif;?>
          </div>
          <div class="media-kit"><a href="/sites/default/files/Media_Kit.pdf">Media kit</a></div>
        </div>
        <div class="col-xs-4 col-sm-2 col-md-2 lang-block">        	
    		<?php
	            $lang_block = module_invoke('locale', 'block_view', 'language');
	            print $lang_block['content'];
	          ?>        	
        </div>
      </div>
    </div>
    </div>
  </div>
  <div class="topMenu">
  <div class="container">
    <div class="row">
      <div class="logo-hidden-xs col-sm-2 col-md-3">
        <a href="<?php print $prefix;?>/" class="top-logo"><img src="/sites/all/themes/cyprus_new/logo.svg"  alt="Cyprustravellers"></a>
        <a href="<?php print $prefix;?>/" class="logo-mini"><img src="/sites/all/themes/cyprus_new/img/logo-mini.png"  alt="Cyprustravellers"></a>
        <span class="wrap-toggle-btn hidden-sm hidden-md hidden-lg"><span class="toggle-btn"></span></span>
      </div>
      <div class="col-sm-10 col-md-9 main-header">        
        <div class="bottom-header">
        <div class="search-block"><span class="icon icon-search"></span></div>
        <?php print render($page['header']); ?>       
        </div>
      </div>
    </div>
  </div>
  </div>
</div>
<div class="somit somit-body <?php print $page_type; ?>">
  <?php print $messages; ?>
  <?php print $breadcrumb; ?>
  <?php print render($tabs); ?>
  <?php print render($page['highlighted']); ?>
  <?php print render($page['top']); ?>
  <?php print render($page['content']); ?>
  <?php print render($page['bottom']); ?>
</div>
<div class="somit somit-footer">
  <div class="container footer-margin-top">
  <div class="border-top container-first">
    <div class="row">
      <div class="col-sm-4 col-md-2">
        <a href="/" class="bottom-logo"><img src="/sites/all/themes/cyprus_new/logo.svg" class="img-responsive" alt=""></a>        
      </div>
      <div class="col-sm-8 col-md-5">
        <div class="bottom-descr">
          <p>© 2011-<?php print date("Y"); ?> <a href="http://cyprusfortravellers.net">CyprusForTravellers.net</a></p>
          <?php print $site_slogan; ?>          
        </div>
        <?php if ($lang == "en"):?>
          <div class="bottom-rights">Reproduction or use of any materials only with the permission of the publisher: <a href="mailto:editor@cyprustrav.ru">editor@cyprustrav.ru</a></div>
        <?php else: ?>
          <div class="bottom-rights">Перепечатка и использование любых материалов только с&nbsp;разрешения редакции: <a href="mailto:editor@cyprustrav.ru">editor@cyprustrav.ru</a></div>
        <?php endif;?>       
      </div>      
      <div class="col-sm-12 col-md-5 text-right text-right-xs">        
        <div class="icon-link icon-link--subscribe"><a href="<?php print $prefix;?>/subscribe"><?php print t('Subscribe');?></a></div>
        <div class="icon-link icon-link--mediakit"><a href="/sites/default/files/Media_Kit.pdf">Media kit</a></div>             
      </div>
    </div>
  </div>
  <div class="border-top container-second">
    <div class="row">
      <div class="col-sm-8 col-md-7 col-md-offset-2">
        <?php print render($page['footer']); ?> 
      </div>
      <div class="col-sm-4 col-md-3 text-right text-right-xs">         
        <div class="small-share-block share-links">          
          <?php if ($lang == 'en'):?>
            <a class="fa fa-facebook" title="Go Facebook" href="https://www.facebook.com/cyprusfortravellers.net/" rel="nofollow" target="_blank"><span class="visuallyhidden">Facebook</span></a>
            <a class="fa fa-tumblr" title="Go Tumblr" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank"><span class="visuallyhidden">Tumblr</span></a>          
            <a class="fa fa-twitter" title="Go Twitter" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank"><span class="visuallyhidden">Twitter</span></a>
            <a class="fa-instagram" title="Go Instagram" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank"><span class="visuallyhidden">Instagram</span></a>
          <?php else:?>
            <a class="fa fa-vk" title="Перейти в группу Вконтакте" href="https://vk.com/cyprusfortravellers" rel="nofollow" target="_blank"><span class="visuallyhidden">ВКонтакте</span></a>
            <a class="fa fa-facebook" title="Перейти в группу в Фейсбуке" href="https://www.facebook.com/cyprusfortravellers/" rel="nofollow" target="_blank"><span class="visuallyhidden">Facebook</span></a>  
            <a class="fa fa-tumblr" title="Перейти в группу в Tumblr" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank"><span class="visuallyhidden">Tumblr</span></a>          
            <a class="fa fa-twitter" title="Перейти в группу в Twitter" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank"><span class="visuallyhidden">Twitter</span></a>
            <a class="fa fa-instagram" title="Перейти на страницу в Instagram" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank"><span class="visuallyhidden">Instagram</span></a> 
          <?php endif;?>
        </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="totopcontroller">
  <div class="container">
    <div class="icon icon-to-top"></div>
  </div>
</div>