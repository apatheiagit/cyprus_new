<?php $page_type = arg(0); ?>
<?php global $user; $clear_class = "";
      global $language_content; $lang = $language_content->language; if ($lang == 'en') $prefix = '/en'; else $prefix = '';
      $url_alias = drupal_get_path_alias(current_path()); 
      $partition = explode('/', $url_alias);
      $lifestyle = $partition[0] == 'lifestyle' ? true : false;
      $partition_name = "";
      if(isset($partition[1])) $partition_name = $partition[1];
      if($partition_name == 'all') $partition_name = $partition[2];
?>
<?php if($is_front && $lang == 'ru'):?>
<div class="aroma-block">
  <a class="container" href="/review/lyudi-kipra-grek-po-imeni-grek">
    <div class="h1">Aroma Castle, Pyrgos</div>
    <div class="descr">Новое средневековье на Кипре</div>
  </a>
</div>
<?php endif;?>
<?php if($lifestyle):?>
<div class="partition-life <?php print $page_type; ?> partition-life-<?php print $partition_name; ?>">
  <header class="l-header">
    <div class="container">
      <div class="row">
        <div class="col-xs-2 col-sm-4">
          <div class="burger">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M14 12C14.552 12 15 12.448 15 13C15 13.552 14.552 14 14 14H2C1.448 14 1 13.552 1 13C1 12.448 1.448 12 2 12H14ZM14 7C14.552 7 15 7.448 15 8C15 8.552 14.552 9 14 9H2C1.448 9 1 8.552 1 8C1 7.448 1.448 7 2 7H14ZM14 2C14.552 2 15 2.448 15 3C15 3.552 14.552 4 14 4H2C1.448 4 1 3.552 1 3C1 2.448 1.448 2 2 2H14Z" fill="white"/>
            </svg>
          </div>
          <div class="l-logo">
            <a href="<?php print $prefix;?>/"><img src="/sites/all/themes/cyprus_new/img/mini-logo.svg" alt=""></a>
          </div>
        </div>
        <div class="col-xs-8 col-sm-4">
          <div class="partition-name"><a href="<?php print $prefix;?>/lifestyle"><?php print t('lifestyle');?></a></div>
        </div>
        <div class="col-xs-2 col-sm-4">
          <div class="l-search-block">
            <div class="lupa">
              <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
                <path fill-rule="evenodd" clip-rule="evenodd" d="M9 13C12.3137 13 15 10.3137 15 7C15 3.68629 12.3137 1 9 1C5.68629 1 3 3.68629 3 7C3 10.3137 5.68629 13 9 13Z" stroke="black" stroke-width="2"/>
                <path d="M4 12L1.5 14.5" stroke="black" stroke-width="2" stroke-linecap="square"/>
              </svg>
            </div>
            <input type="text" placeholder="<?php print t('Search by category');?>" class="txtHeaderSearch">
            <span class="close-search">
              <svg width="24" height="24" viewBox="0 0 24 24">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 13.4546L5.45455 20L4 18.5455L10.5455 12L4 5.45456L5.45455 4.00001L12 10.5455L18.5455 4L20 5.45455L13.4545 12L20 18.5455L18.5455 20L12 13.4546Z"></path>
              </svg>
            </span>
          </div>
          <div class="lupa open-search">
            <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
              <path fill-rule="evenodd" clip-rule="evenodd" d="M9 13C12.3137 13 15 10.3137 15 7C15 3.68629 12.3137 1 9 1C5.68629 1 3 3.68629 3 7C3 10.3137 5.68629 13 9 13Z" stroke="black" stroke-width="2"/>
              <path d="M4 12L1.5 14.5" stroke="black" stroke-width="2" stroke-linecap="square"/>
            </svg>
          </div>
        </div>
      </div>
    </div>
  </header>
  <div class="l-top-menu">
    <div class="container">
      <div class="row row-10">
        <div class="col col-md-3">
          <a href="#" class="back-button">
            <svg width="13" height="8" viewBox="0 0 13 8" fill="none" >
              <path d="M0.646446 3.64645C0.451184 3.84171 0.451184 4.15829 0.646446 4.35355L3.82843 7.53553C4.02369 7.7308 4.34027 7.7308 4.53553 7.53553C4.7308 7.34027 4.7308 7.02369 4.53553 6.82843L1.70711 4L4.53553 1.17157C4.7308 0.976311 4.7308 0.659728 4.53553 0.464466C4.34027 0.269204 4.02369 0.269204 3.82843 0.464466L0.646446 3.64645ZM13 3.5L1 3.5V4.5L13 4.5V3.5Z" fill="black"/>
            </svg>
            <?php print t('Back');?>
          </a>
          <div class="current-partition">
            <?php print t($partition_name);?>
          </div>      
        </div>
        <div class="col col-md-6">
          <div class="l-menu">
            <div class="mobile-header">
              <div class="close-burger">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M8.19125 6.66325L12.5312 2.32325C12.9622 1.89225 13.6623 1.89225 14.0933 2.32325C14.5243 2.75425 14.5243 3.45425 14.0933 3.88525L9.75325 8.22525L14.0933 12.5653C14.5153 12.9863 14.5153 13.6713 14.0933 14.0933C13.6713 14.5153 12.9863 14.5153 12.5653 14.0933L8.22525 9.75325L3.88525 14.0933C3.45425 14.5243 2.75425 14.5243 2.32325 14.0933C1.89225 13.6623 1.89225 12.9622 2.32325 12.5312L6.66325 8.19125L2.32325 3.85125C1.90125 3.43025 1.90125 2.74525 2.32325 2.32325C2.74525 1.90125 3.43025 1.90125 3.85125 2.32325L8.19125 6.66325V6.66325Z" fill="white"/>
                </svg>
              </div>
              <div class="partition-name"><?php print t('lifestyle');?></div>
            </div>
            <?php print render($page['help']); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php print $messages; ?>
  <?php print render($tabs); ?>
  <?php print render($page['content']); ?>
  <div class="l-footer">
    <div class="top-footer">
      <div class="container ">
        <div class="row">
          <div class="col-xs-2 col-sm-4">
            <div class="l-logo">
              <a href="/"><img src="/sites/all/themes/cyprus_new/img/mini-logo.svg" alt=""></a>
            </div>
          </div>
          <div class="col-xs-8 col-sm-4">
            <div class="partition-name"><?php print t('lifestyle');?></div>
          </div>
          <div class="col-xs-2 col-sm-4">
            <div class="l-search-block hidden-xs">
              <div class="lupa">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M9 13C12.3137 13 15 10.3137 15 7C15 3.68629 12.3137 1 9 1C5.68629 1 3 3.68629 3 7C3 10.3137 5.68629 13 9 13Z" stroke="black" stroke-width="2"/>
                  <path d="M4 12L1.5 14.5" stroke="black" stroke-width="2" stroke-linecap="square"/>
                </svg>
              </div>
              <input type="text" class="txtHeaderSearch" placeholder="<?php print t('Search by category');?>">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-footer-menu">
      <div class="container">
        <div class="row row-10">
          <div class="col col-md-3">
            <div class="phseudo-subscribe">
              <input type="text" placeholder="<?php print t('Your mail');?>">
              <span class="btn-subscr"><?php print t('Subscribe');?></span>
            </div>
          </div>
          <div class="col col-md-6">
            <?php print render($page['help']); ?>
          </div>
          <div class="col col-md-3">
            <div class="l-social-block">
              <a href="https://vk.com/cyprusfortravellers" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 3C16 1.344 14.656 0 13 0H3C1.344 0 0 1.344 0 3V13C0 14.656 1.344 16 3 16H13C14.656 16 16 14.656 16 13V3ZM2.445 4.514H3.767C4.097 4.514 4.224 4.653 4.351 5.022C4.999 6.89 6.08 8.53 6.524 8.53C6.69 8.53 6.766 8.453 6.766 8.034V6.102C6.73451 5.55317 6.54334 5.31382 6.40164 5.13642C6.31382 5.02646 6.245 4.9403 6.245 4.819C6.245 4.666 6.372 4.514 6.575 4.514H8.634C8.914 4.514 9.015 4.666 9.015 4.997V7.602C9.015 7.881 9.13 7.983 9.219 7.983C9.384 7.983 9.524 7.881 9.829 7.576C10.769 6.522 11.443 4.895 11.443 4.895C11.532 4.704 11.684 4.526 12.015 4.526H13.324C13.718 4.526 13.807 4.73 13.718 5.009C13.5788 5.6489 12.4303 7.34311 12.0709 7.87315C12.0018 7.97512 11.9619 8.034 11.964 8.034C11.824 8.263 11.773 8.364 11.964 8.619C12.0327 8.71224 12.1777 8.85461 12.3437 9.01751C12.5159 9.18655 12.7107 9.3777 12.866 9.559C13.425 10.194 13.857 10.728 13.972 11.097C14.073 11.465 13.896 11.656 13.514 11.656H12.205C11.8587 11.656 11.6798 11.4568 11.2989 11.0329C11.1353 10.8508 10.9344 10.6271 10.667 10.36C9.892 9.61 9.549 9.508 9.358 9.508C9.092 9.508 9.015 9.572 9.015 9.953V11.135C9.015 11.453 8.914 11.643 8.075 11.643C6.69 11.643 5.152 10.804 4.072 9.241C2.445 6.954 2 5.225 2 4.882C2 4.692 2.064 4.514 2.445 4.514Z" fill="#333333"/>
                </g>
                </svg>
              </a>
              <a href="https://www.facebook.com/cyprusfortravellers/" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.96197 15.9999V8.85093H11.412L11.779 6.00593H8.96197V4.18993C8.96197 3.36693 9.19097 2.80593 10.372 2.80593L11.878 2.80493V0.260926C11.617 0.225926 10.723 0.148926 9.68297 0.148926C7.51197 0.148926 6.02497 1.47393 6.02497 3.90893V6.00593H3.56897V8.85093H6.02497V15.9999H8.96197Z" fill="#333333"/>
                </g>
                </svg>
              </a>
              <a href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.52 16H4.48C2.007 16 0 13.993 0 11.52V4.48C0 2.007 2.007 0 4.48 0H11.52C13.993 0 16 2.007 16 4.48V11.52C16 13.993 13.993 16 11.52 16ZM11.48 2H4.52C3.129 2 2 3.129 2 4.52V11.48C2 12.871 3.129 14 4.52 14H11.48C12.871 14 14 12.871 14 11.48V4.52C14 3.129 12.871 2 11.48 2ZM12 3C12.552 3 13 3.448 13 4C13 4.552 12.552 5 12 5C11.448 5 11 4.552 11 4C11 3.448 11.448 3 12 3ZM8 4C10.208 4 12 5.792 12 8C12 10.208 10.208 12 8 12C5.792 12 4 10.208 4 8C4 5.792 5.792 4 8 4ZM8 6C9.104 6 10 6.896 10 8C10 9.104 9.104 10 8 10C6.896 10 6 9.104 6 8C6 6.896 6.896 6 8 6Z" fill="#333333"/>
                </g>
                </svg>
              </a>
              <a href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.88506 14.9991C11.1321 14.9991 14.5491 9.82312 14.5491 5.33512C14.5491 5.18812 14.5491 5.04112 14.5391 4.89612C15.0841 4.50212 15.5681 4.03012 15.9761 3.49812C16.0091 3.45212 16.0081 3.39012 15.9731 3.34512C15.9391 3.30012 15.8801 3.28312 15.8271 3.30312C15.3291 3.48512 14.8111 3.61012 14.2831 3.67212C14.9141 3.29512 15.4031 2.72412 15.6821 2.05012C15.6971 2.01112 15.6851 1.96712 15.6541 1.94012C15.6231 1.91312 15.5781 1.90812 15.5411 1.92812C14.9391 2.25212 14.2911 2.48512 13.6201 2.61812C12.9771 1.93512 12.0801 1.54712 11.1431 1.54712C9.27806 1.54712 7.74306 3.08212 7.74306 4.94712C7.74306 5.20612 7.77306 5.46412 7.83106 5.71612C5.17206 5.58212 2.68706 4.35412 0.967059 2.33012C0.936059 2.29312 0.888059 2.27412 0.840059 2.27912C0.792059 2.28412 0.749059 2.31312 0.727059 2.35612C-0.0259413 3.87112 0.458059 5.75012 1.88206 6.70112C1.49506 6.68912 0.872059 6.49812 0.549059 6.39112C0.502059 6.37512 0.451059 6.38412 0.412059 6.41412C0.372059 6.44412 0.351059 6.49212 0.354059 6.54112C0.434059 7.22012 0.846059 9.24512 3.06606 9.64812C2.63106 9.76712 2.17806 9.79812 1.73306 9.73912C1.69006 9.73312 1.64706 9.75012 1.62006 9.78312C1.59306 9.81712 1.58606 9.86212 1.60106 9.90212C2.09906 11.1761 3.32506 12.0401 4.70506 12.0661C3.91006 12.6901 2.99106 13.1271 2.01806 13.3501C1.70006 13.4231 0.945059 13.4661 0.371059 13.4801C0.286059 13.4771 0.210059 13.5341 0.187059 13.6161C0.165059 13.6991 0.201059 13.7861 0.276059 13.8281C1.68706 14.5951 3.27106 14.9991 4.88506 14.9971" fill="#333333"/>
                </g>
                </svg>
              </a>
              <a href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M0 8C0 6.159 0.331 4.535 0.833 3.577C1.073 2.995 1.479 2.5 1.992 2.151C2.912 1.479 5.256 1 8 1C10.744 1 13.088 1.479 14.008 2.151C14.521 2.5 14.927 2.995 15.167 3.577C15.669 4.535 16 6.159 16 8C16 9.841 15.669 11.465 15.167 12.423C14.927 13.005 14.521 13.5 14.008 13.849C13.088 14.521 10.744 15 8 15C5.256 15 2.912 14.521 1.992 13.849C1.479 13.5 1.073 13.005 0.833 12.423C0.331 11.465 0 9.841 0 8ZM6.833 10.897C6.746 10.962 6.638 11 6.521 11C6.234 11 6 10.766 6 10.479V5.521C6 5.234 6.234 5 6.521 5C6.638 5 6.746 5.038 6.833 5.103L10.764 7.546L10.762 7.549C10.906 7.648 11 7.813 11 8C11 8.187 10.906 8.352 10.762 8.451L10.764 8.454L6.833 10.897Z" fill="#333333"/>
                </g>
                </svg>

              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="l-footer-bottom">
      <div class="container">
        <?php print render($page['footer']); ?>
        <div class="copyright">© 2011-<?php print date("Y"); ?>. <?php print t('lifestyle');?></div>
      </div>
    </div>
  </div>
</div>

<?php else:?>

<div class="somit somit-header <?php print $page_type; ?>">
  <div class="upper-header">
    <div class="container">
    <div class="inside-container">  
      <div class="row">
        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 col-weather">
          <div class="weather-block">
            <div class="city-filter">              
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
            <div class="weather">
              <div class="weather-icon"><img src="/sites/all/themes/cyprus_new/img/weather/00d.png"></div>
              <div class="weather-temp"><span class="weather-degree"></span><span class="weather-zero">o</span>C</div>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-8 col-md-2 col-lg-2 col-taxi">          
        </div>
        <div class="clearfix visible-xs-block visible-sm-block"></div>
        <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-offset-0 col-md-offset-0 col-md-4 col-lg-6 col-logo">
           <a href="<?php print $prefix;?>/" class="top-logo"><img src="/sites/all/themes/cyprus_new/logo.svg"  alt="Cyprustravellers"></a>
        </div>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2 lang-block">        	
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
  <div class="inside-container">
    <div class="row">
      <div class="logo-hidden-xs col-sm-1 col-md-1">       
        <a href="<?php print $prefix;?>/" class="logo-mini"><img src="/sites/all/themes/cyprus_new/img/logo-mini.png"  alt="Cyprustravellers"></a>
        <span class="wrap-toggle-btn hidden-sm hidden-md hidden-lg"><span class="toggle-btn"></span></span>
      </div>
      <div class="col-sm-10 col-md-10 main-header">        
        <div class="bottom-header">        
          <?php print render($page['header']); ?>       
        </div>
      </div>
      <div class="col-sm-1 col-md-1 col-search">
        <div class="search-block"><span class="search-buttn"></span></div>
      </div>
    </div>
  </div>
  </div>
  </div>
</div>
<div class="somit somit-body <?php print $page_type; ?>">     
  <?php print render($page['navigation']); ?>
  <?php print render($page['highlighted']); ?>
  <?php print $messages; ?>
  <?php /*print $breadcrumb; */?> 
  <?php print render($tabs); ?>
  <?php print render($page['top']); ?>
  <?php print render($page['content']); ?>
  <?php print render($page['bottom']); ?>
</div>
<div class="somit somit-footer">
  <div class="wide-container-wo container footer-margin-top">
  <div class="border-top container-first">
    <div class="row">
      <div class="col-sm-6 col-md-7">
        <?php print render($page['header']); ?> 
        <div class="subscribe-media">
          <div class="left">
            <div class="icon-link"><a href="<?php print $prefix;?>/subscribe">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" >
                <path d="M5.25 4C3.46403 4 2 5.46403 2 7.25V16.75C2 18.536 3.46403 20 5.25 20H18.75C20.536 20 22 18.536 22 16.75V7.25C22 5.46403 20.536 4 18.75 4H5.25ZM5.25 5.5H18.75C19.725 5.5 20.5 6.27497 20.5 7.25V7.80273L12 12.3975L3.5 7.80273V7.25C3.5 6.27497 4.27497 5.5 5.25 5.5ZM3.5 9.50781L11.6436 13.9102C11.7531 13.9693 11.8755 14.0003 12 14.0003C12.1245 14.0003 12.2469 13.9693 12.3564 13.9102L20.5 9.50781V16.75C20.5 17.725 19.725 18.5 18.75 18.5H5.25C4.27497 18.5 3.5 17.725 3.5 16.75V9.50781Z" fill="#333333"/>
              </svg>
              <?php print t('Subscribe');?></a></div>
            <div class="icon-link"><a href="/sites/default/files/Media_Kit.pdf" download>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path d="M4.25 2.5C3.0095 2.5 2 3.5095 2 4.75V19.25C2 20.4905 3.0095 21.5 4.25 21.5H6.41016C6.01416 21.0885 5.72682 20.5735 5.59082 20H4.25C3.8365 20 3.5 19.6635 3.5 19.25V4.75C3.5 4.3365 3.8365 4 4.25 4H5.59082C5.72732 3.4265 6.01416 2.9115 6.41016 2.5H4.25ZM8.75 2.5C7.51625 2.5 6.5 3.51625 6.5 4.75V19.25C6.5 20.4838 7.51625 21.5 8.75 21.5H19.75C20.9838 21.5 22 20.4838 22 19.25V9.25C22 9.0511 21.9209 8.86036 21.7803 8.71973L15.7803 2.71973C15.6396 2.57907 15.4489 2.50004 15.25 2.5H8.75ZM8.75 4H14.5V7.75C14.5 8.98375 15.5162 10 16.75 10H20.5V19.25C20.5 19.6733 20.1733 20 19.75 20H8.75C8.32675 20 8 19.6733 8 19.25V4.75C8 4.32675 8.32675 4 8.75 4ZM16 5.06055L19.4395 8.5H16.75C16.3268 8.5 16 8.17325 16 7.75V5.06055ZM11.25 12.5C11.1506 12.4986 11.0519 12.517 10.9597 12.554C10.8675 12.5911 10.7836 12.6461 10.7128 12.7159C10.642 12.7857 10.5858 12.8688 10.5474 12.9605C10.5091 13.0522 10.4893 13.1506 10.4893 13.25C10.4893 13.3494 10.5091 13.4478 10.5474 13.5395C10.5858 13.6312 10.642 13.7143 10.7128 13.7841C10.7836 13.8539 10.8675 13.9089 10.9597 13.946C11.0519 13.983 11.1506 14.0014 11.25 14H17.25C17.3494 14.0014 17.4481 13.983 17.5403 13.946C17.6325 13.9089 17.7164 13.8539 17.7872 13.7841C17.858 13.7143 17.9142 13.6312 17.9526 13.5395C17.9909 13.4478 18.0107 13.3494 18.0107 13.25C18.0107 13.1506 17.9909 13.0522 17.9526 12.9605C17.9142 12.8688 17.858 12.7857 17.7872 12.7159C17.7164 12.6461 17.6325 12.5911 17.5403 12.554C17.4481 12.517 17.3494 12.4986 17.25 12.5H11.25ZM11.25 16C11.1506 15.9986 11.0519 16.017 10.9597 16.054C10.8675 16.0911 10.7836 16.1461 10.7128 16.2159C10.642 16.2857 10.5858 16.3688 10.5474 16.4605C10.5091 16.5522 10.4893 16.6506 10.4893 16.75C10.4893 16.8494 10.5091 16.9478 10.5474 17.0395C10.5858 17.1312 10.642 17.2143 10.7128 17.2841C10.7836 17.3539 10.8675 17.4089 10.9597 17.446C11.0519 17.483 11.1506 17.5014 11.25 17.5H15.75C15.8494 17.5014 15.9481 17.483 16.0403 17.446C16.1325 17.4089 16.2164 17.3539 16.2872 17.2841C16.358 17.2143 16.4142 17.1312 16.4526 17.0395C16.4909 16.9478 16.5107 16.8494 16.5107 16.75C16.5107 16.6506 16.4909 16.5522 16.4526 16.4605C16.4142 16.3688 16.358 16.2857 16.2872 16.2159C16.2164 16.1461 16.1325 16.0911 16.0403 16.054C15.9481 16.017 15.8494 15.9986 15.75 16H11.25Z" fill="#333333"/>
            </svg>
              Media kit</a></div>
          </div>
          <div class="social-block">
            <div class="small-share-block share-links">          
              <?php if ($lang == 'en'):?>
                <a class="newfa newfa-facebook" title="Go Facebook" href="https://www.facebook.com/cyprusfortravellers.net/" rel="nofollow" target="_blank"><span class="visuallyhidden">Facebook</span></a>
                <a class="newfa newfa-tumblr" title="Go Tumblr" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank"><span class="visuallyhidden">Tumblr</span></a>          
                <a class="newfa newfa-twitter" title="Go Twitter" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank"><span class="visuallyhidden">Twitter</span></a>
                <a class="newfa newfa-instagram" title="Go Instagram" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank"><span class="visuallyhidden">Instagram</span></a>
              <?php else:?>
                <a class="newfa newfa-vk" title="Перейти в группу Вконтакте" href="https://vk.com/cyprusfortravellers" rel="nofollow" target="_blank"><span class="visuallyhidden">ВКонтакте</span></a>
                <a class="newfa newfa-facebook" title="Перейти в группу в Фейсбуке" href="https://www.facebook.com/cyprusfortravellers/" rel="nofollow" target="_blank"><span class="visuallyhidden">Facebook</span></a>  
                <a class="newfa newfa-tumblr" title="Перейти в группу в Tumblr" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank"><span class="visuallyhidden">Tumblr</span></a>          
                <a class="newfa newfa-twitter" title="Перейти в группу в Twitter" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank"><span class="visuallyhidden">Twitter</span></a>
                <a class="newfa newfa-instagram" title="Перейти на страницу в Instagram" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank"><span class="visuallyhidden">Instagram</span></a> 
              <?php endif;?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6 col-md-5">
        <a href="/" class="bottom-logo"><img src="/sites/all/themes/cyprus_new/logo.svg" class="img-responsive" alt=""></a>
        <div class="bottom-longtext">
          <p><?php print $site_slogan; ?></p>
          <?php if ($lang == "en"):?>
            <p>Reproduction or use of any materials only with the permission of the publisher: <a href="mailto:editor@cyprusfortravellers.net">editor@cyprusfortravellers.net</a></p>
          <?php else: ?>
            <p>Перепечатка и использование любых материалов только с&nbsp;разрешения редакции: <a href="mailto:editor@cyprusfortravellers.net">editor@cyprusfortravellers.net</a></p>
          <?php endif;?>
        </div>
      </div>
      <div class="most-bottom">
        <div class="col-sm-6 col-md-7">
          <?php print render($page['footer']); ?> 
        </div>
        <div class="col-sm-6 col-md-5">
          <p class="copyright">© 2011-<?php print date("Y"); ?> <a href="http://cyprusfortravellers.net">CyprusForTravellers.net</a></p>
        </div>
      </div>
      
    </div>
  </div>
 
</div>
<?php endif;?>
<div class="totopcontroller">
  <div class="container">
    <div class="icon icon-to-top"></div>
  </div>
</div>
