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
<?php if($is_front):?>

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
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
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
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M16 3C16 1.344 14.656 0 13 0H3C1.344 0 0 1.344 0 3V13C0 14.656 1.344 16 3 16H13C14.656 16 16 14.656 16 13V3ZM2.445 4.514H3.767C4.097 4.514 4.224 4.653 4.351 5.022C4.999 6.89 6.08 8.53 6.524 8.53C6.69 8.53 6.766 8.453 6.766 8.034V6.102C6.73451 5.55317 6.54334 5.31382 6.40164 5.13642C6.31382 5.02646 6.245 4.9403 6.245 4.819C6.245 4.666 6.372 4.514 6.575 4.514H8.634C8.914 4.514 9.015 4.666 9.015 4.997V7.602C9.015 7.881 9.13 7.983 9.219 7.983C9.384 7.983 9.524 7.881 9.829 7.576C10.769 6.522 11.443 4.895 11.443 4.895C11.532 4.704 11.684 4.526 12.015 4.526H13.324C13.718 4.526 13.807 4.73 13.718 5.009C13.5788 5.6489 12.4303 7.34311 12.0709 7.87315C12.0018 7.97512 11.9619 8.034 11.964 8.034C11.824 8.263 11.773 8.364 11.964 8.619C12.0327 8.71224 12.1777 8.85461 12.3437 9.01751C12.5159 9.18655 12.7107 9.3777 12.866 9.559C13.425 10.194 13.857 10.728 13.972 11.097C14.073 11.465 13.896 11.656 13.514 11.656H12.205C11.8587 11.656 11.6798 11.4568 11.2989 11.0329C11.1353 10.8508 10.9344 10.6271 10.667 10.36C9.892 9.61 9.549 9.508 9.358 9.508C9.092 9.508 9.015 9.572 9.015 9.953V11.135C9.015 11.453 8.914 11.643 8.075 11.643C6.69 11.643 5.152 10.804 4.072 9.241C2.445 6.954 2 5.225 2 4.882C2 4.692 2.064 4.514 2.445 4.514Z" fill="#333333"/>
                </g>
                </svg>
              </a>
              <a href="https://www.facebook.com/cyprusfortravellers/" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M8.96197 15.9999V8.85093H11.412L11.779 6.00593H8.96197V4.18993C8.96197 3.36693 9.19097 2.80593 10.372 2.80593L11.878 2.80493V0.260926C11.617 0.225926 10.723 0.148926 9.68297 0.148926C7.51197 0.148926 6.02497 1.47393 6.02497 3.90893V6.00593H3.56897V8.85093H6.02497V15.9999H8.96197Z" fill="#333333"/>
                </g>
                </svg>
              </a>
              <a href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M11.52 16H4.48C2.007 16 0 13.993 0 11.52V4.48C0 2.007 2.007 0 4.48 0H11.52C13.993 0 16 2.007 16 4.48V11.52C16 13.993 13.993 16 11.52 16ZM11.48 2H4.52C3.129 2 2 3.129 2 4.52V11.48C2 12.871 3.129 14 4.52 14H11.48C12.871 14 14 12.871 14 11.48V4.52C14 3.129 12.871 2 11.48 2ZM12 3C12.552 3 13 3.448 13 4C13 4.552 12.552 5 12 5C11.448 5 11 4.552 11 4C11 3.448 11.448 3 12 3ZM8 4C10.208 4 12 5.792 12 8C12 10.208 10.208 12 8 12C5.792 12 4 10.208 4 8C4 5.792 5.792 4 8 4ZM8 6C9.104 6 10 6.896 10 8C10 9.104 9.104 10 8 10C6.896 10 6 9.104 6 8C6 6.896 6.896 6 8 6Z" fill="#333333"/>
                </g>
                </svg>
              </a>
              <a href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
                <g opacity="0.32">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M4.88506 14.9991C11.1321 14.9991 14.5491 9.82312 14.5491 5.33512C14.5491 5.18812 14.5491 5.04112 14.5391 4.89612C15.0841 4.50212 15.5681 4.03012 15.9761 3.49812C16.0091 3.45212 16.0081 3.39012 15.9731 3.34512C15.9391 3.30012 15.8801 3.28312 15.8271 3.30312C15.3291 3.48512 14.8111 3.61012 14.2831 3.67212C14.9141 3.29512 15.4031 2.72412 15.6821 2.05012C15.6971 2.01112 15.6851 1.96712 15.6541 1.94012C15.6231 1.91312 15.5781 1.90812 15.5411 1.92812C14.9391 2.25212 14.2911 2.48512 13.6201 2.61812C12.9771 1.93512 12.0801 1.54712 11.1431 1.54712C9.27806 1.54712 7.74306 3.08212 7.74306 4.94712C7.74306 5.20612 7.77306 5.46412 7.83106 5.71612C5.17206 5.58212 2.68706 4.35412 0.967059 2.33012C0.936059 2.29312 0.888059 2.27412 0.840059 2.27912C0.792059 2.28412 0.749059 2.31312 0.727059 2.35612C-0.0259413 3.87112 0.458059 5.75012 1.88206 6.70112C1.49506 6.68912 0.872059 6.49812 0.549059 6.39112C0.502059 6.37512 0.451059 6.38412 0.412059 6.41412C0.372059 6.44412 0.351059 6.49212 0.354059 6.54112C0.434059 7.22012 0.846059 9.24512 3.06606 9.64812C2.63106 9.76712 2.17806 9.79812 1.73306 9.73912C1.69006 9.73312 1.64706 9.75012 1.62006 9.78312C1.59306 9.81712 1.58606 9.86212 1.60106 9.90212C2.09906 11.1761 3.32506 12.0401 4.70506 12.0661C3.91006 12.6901 2.99106 13.1271 2.01806 13.3501C1.70006 13.4231 0.945059 13.4661 0.371059 13.4801C0.286059 13.4771 0.210059 13.5341 0.187059 13.6161C0.165059 13.6991 0.201059 13.7861 0.276059 13.8281C1.68706 14.5951 3.27106 14.9991 4.88506 14.9971" fill="#333333"/>
                </g>
                </svg>
              </a>
              <a href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank">
                <svg width="16" height="16" viewBox="0 0 16 16" fill="none" >
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
  <div class="container">
    <div class="inside-container">  
      <a href="<?php print $prefix;?>/" class="top-logo"><img src="/sites/all/themes/cyprus_new/logo.svg"  alt="Cyprustravellers"></a>      
      <div class="top-menu-block">             
        <?php print render($page['header']); ?>
        <div class="search-block"><span class="search-buttn">
          <svg width="18" height="18" viewBox="0 0 18 18" fill="none" >
            <path fill-rule="evenodd" clip-rule="evenodd" d="M7 0C10.866 0 14 3.13401 14 7C14 8.57229 13.4816 10.0235 12.6065 11.1921L17.7072 16.2928C18.0977 16.6833 18.0977 17.3165 17.7072 17.707C17.3167 18.0975 16.6835 18.0975 16.293 17.707L11.1923 12.6063C10.0237 13.4816 8.57238 14 7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0ZM12 7C12 4.23858 9.76142 2 7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7Z" fill="#4F4F4F"/>
            </svg>
        </span></div>
      </div>
      <div class="weather-lang display-flex align-center">
      <div class="weather-block">
        <div class="city-filter">              
          <div class="current-city">
            <span class="name"><?php print t("Limassol");?></span>
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M19.0303 15.2803C18.7374 15.5732 18.2626 15.5732 17.9697 15.2803L12.1768 9.48744C12.0791 9.38981 11.9209 9.38981 11.8232 9.48744L6.03033 15.2803C5.73744 15.5732 5.26256 15.5732 4.96967 15.2803C4.67678 14.9874 4.67678 14.5126 4.96967 14.2197L10.7626 8.42678C11.446 7.74336 12.554 7.74336 13.2374 8.42678L19.0303 14.2197C19.3232 14.5126 19.3232 14.9874 19.0303 15.2803Z" fill="#1A1919"/>
            </svg>
          </div>
          <div class="city-list">
            <ul>
              <li><span data-city="Ayia-Napa"><?php print t("Ayia-Napa");?></span></li>
              <li><span data-city="Larnaca"><?php print t("Larnaca");?></span></li>
              <li class="active"><span data-city="Limassol"><?php print t("Limassol");?></span></li>
              <li><span data-city="Nicosia"><?php print t("Nicosia");?></span></li>
              <li><span data-city="Paphos"><?php print t("Paphos");?></span></li>  
              <li><span data-city="Polis"><?php print t("Polis");?></span></li>  
            </ul>
          </div>
        </div>
        <div class="weather">
          <div class="weather-icon"><img src="/sites/all/themes/cyprus_new/img/weather/00d.png"></div>
          <div class="weather-temp"><span class="weather-degree"></span></div>
        </div>
      </div>        
      <div class="lang-block">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" class="globus">
          <path d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M2 12H22" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          <path d="M12 2C14.5013 4.73835 15.9228 8.29203 16 12C15.9228 15.708 14.5013 19.2616 12 22C9.49872 19.2616 8.07725 15.708 8 12C8.07725 8.29203 9.49872 4.73835 12 2V2Z" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg> 	
        <?php
          $lang_block = module_invoke('locale', 'block_view', 'language');
          print $lang_block['content'];
        ?>        	
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
  <div class="container">
    <div class="logo-lang display-flex space-between">
      <a href="/" class="bottom-logo"><img src="/sites/all/themes/cyprus_new/logo.svg" class="img-responsive" alt=""></a>
      <div class="lang-search">
        <div class="search-block"><span class="search-buttn">
            <svg width="18" height="18" viewBox="0 0 18 18" fill="none" >
              <path fill-rule="evenodd" clip-rule="evenodd" d="M7 0C10.866 0 14 3.13401 14 7C14 8.57229 13.4816 10.0235 12.6065 11.1921L17.7072 16.2928C18.0977 16.6833 18.0977 17.3165 17.7072 17.707C17.3167 18.0975 16.6835 18.0975 16.293 17.707L11.1923 12.6063C10.0237 13.4816 8.57238 14 7 14C3.13401 14 0 10.866 0 7C0 3.13401 3.13401 0 7 0ZM12 7C12 4.23858 9.76142 2 7 2C4.23858 2 2 4.23858 2 7C2 9.76142 4.23858 12 7 12C9.76142 12 12 9.76142 12 7Z" fill="#4F4F4F"/>
              </svg>
          </span></div>
      </div>
    </div>
    <div class="menu-kit display-flex space-between align-center">
      <?php print render($page['header']); ?>
      <div class="subscribe-media">
        <div class="icon-link">
          <a href="<?php print $prefix;?>/subscribe">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" >
              <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
              <path d="M22 6L12 13L2 6" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            </svg><?php print t('Subscribe');?>
          </a>
        </div>
        <div class="icon-link">
          <a href="/sites/default/files/Media_Kit.pdf" download>
          <svg width="24" height="24" viewBox="0 0 24 24" fill="none" >
            <path d="M14 2H6C5.46957 2 4.96086 2.21071 4.58579 2.58579C4.21071 2.96086 4 3.46957 4 4V20C4 20.5304 4.21071 21.0391 4.58579 21.4142C4.96086 21.7893 5.46957 22 6 22H18C18.5304 22 19.0391 21.7893 19.4142 21.4142C19.7893 21.0391 20 20.5304 20 20V8L14 2Z" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M14 2V8H20" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16 13H8" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M16 17H8" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
            <path d="M10 9H9H8" stroke="#1A1919" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
          </svg>Media kit
          </a>
        </div>
      </div>
    </div>
    <div class="copyright-social display-flex space-between">      
      <div class="bottom-longtext">
        <p class="copyright">© 2011-<?php print date("Y"); ?> <a href="http://cyprusfortravellers.net">CyprusForTravellers.net</a></p>
        <p class="m-b-24"><?php print $site_slogan; ?></p>
        <?php if ($lang == "en"):?>
          <p>Reproduction or use of any materials only with the permission of the publisher: <a href="mailto:editor@cyprusfortravellers.net">editor@cyprusfortravellers.net</a></p>
        <?php else: ?>
          <p>Перепечатка и использование любых материалов только с&nbsp;разрешения редакции: <a href="mailto:editor@cyprusfortravellers.net">editor@cyprusfortravellers.net</a></p>
        <?php endif;?>
      </div>
      <div class="menu-social">
        <?php print render($page['footer']); ?> 
        <div class="small-share-block share-links">          
              <?php if ($lang == 'en'):?>
                <a class="newfa newfa-facebook" title="Go Facebook" href="https://www.facebook.com/cyprusfortravellers.net/" rel="nofollow" target="_blank">
                  <svg width="25" height="24" viewBox="0 0 25 24" fill="none" >
                  <path d="M18.8325 2H15.8325C14.5064 2 13.2347 2.52678 12.297 3.46447C11.3593 4.40215 10.8325 5.67392 10.8325 7V10H7.83252V14H10.8325V22H14.8325V14H17.8325L18.8325 10H14.8325V7C14.8325 6.73478 14.9379 6.48043 15.1254 6.29289C15.3129 6.10536 15.5673 6 15.8325 6H18.8325V2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a>
                <a class="newfa newfa-tumblr" title="Go Tumblr" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank">
                  <svg width="25" height="24" viewBox="0 0 25 24" fill="none" >
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3325 20.6904C19.3325 20.8534 19.2527 21.0054 19.1089 21.0821C18.581 21.3639 17.1042 22 14.5309 22C11.2237 22 9.18698 20.1193 9.18698 18.2808V10.5958C9.18698 10.3197 8.96312 10.0958 8.68698 10.0958H6.83252C6.55638 10.0958 6.33252 9.87197 6.33252 9.59582V7.69204C6.33252 7.44061 6.51878 7.22621 6.76314 7.16703C7.41877 7.00825 8.66936 6.58789 9.41251 5.58776C10.2609 4.44788 10.5679 3.24885 10.6777 2.46516C10.7142 2.20443 10.9307 2 11.194 2H13.2149C13.491 2 13.7149 2.22386 13.7149 2.5V6.05032C13.7149 6.32647 13.9387 6.55032 14.2149 6.55032H18.0165C18.2926 6.55032 18.5165 6.77418 18.5165 7.05032V9.64041C18.5165 9.91655 18.2926 10.1404 18.0165 10.1404H14.2596C13.9835 10.1404 13.7596 10.3643 13.7596 10.6404V17.1797C13.7596 18.464 15.347 18.8069 16.2078 18.8069C16.8513 18.8069 17.7761 18.5367 18.5802 18.1988C18.9279 18.0527 19.3325 18.2989 19.3325 18.6761V20.6904Z" stroke="white" stroke-width="2"/>
                  </svg>
                </a>          
                <a class="newfa newfa-twitter" title="Go Twitter" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank">
                  <svg width="25" height="24" viewBox="0 0 25 24" fill="none" >
                  <g clip-path="url(#clip0_1088_4077)">
                  <path d="M23.8325 3.00005C22.8749 3.67552 21.8146 4.19216 20.6925 4.53005C20.0903 3.83756 19.2899 3.34674 18.3996 3.12397C17.5093 2.90121 16.572 2.95724 15.7146 3.2845C14.8572 3.61176 14.121 4.19445 13.6055 4.95376C13.09 5.71308 12.8202 6.61238 12.8325 7.53005V8.53005C11.0752 8.57561 9.33379 8.18586 7.76353 7.39549C6.19326 6.60513 4.84284 5.43868 3.83252 4.00005C3.83252 4.00005 -0.16748 13 8.83252 17C6.77305 18.398 4.31968 19.099 1.83252 19C10.8325 24 21.8325 19 21.8325 7.50005C21.8316 7.2215 21.8048 6.94364 21.7525 6.67005C22.7731 5.66354 23.4933 4.39276 23.8325 3.00005Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_1088_4077">
                  <rect width="24" height="24" fill="white" transform="translate(0.83252)"/>
                  </clipPath>
                  </defs>
                  </svg>
                </a>
                <a class="newfa newfa-instagram" title="Go Instagram" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank">
                  <svg width="25" height="24" viewBox="0 0 25 24" fill="none" >
                  <path d="M17.8325 2H7.83252C5.0711 2 2.83252 4.23858 2.83252 7V17C2.83252 19.7614 5.0711 22 7.83252 22H17.8325C20.5939 22 22.8325 19.7614 22.8325 17V7C22.8325 4.23858 20.5939 2 17.8325 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16.8325 11.3701C16.9559 12.2023 16.8138 13.0523 16.4263 13.7991C16.0388 14.5459 15.4257 15.1515 14.6742 15.5297C13.9226 15.908 13.071 16.0397 12.2403 15.906C11.4097 15.7723 10.6423 15.3801 10.0474 14.7852C9.45245 14.1903 9.06026 13.4229 8.9266 12.5923C8.79293 11.7616 8.9246 10.91 9.30286 10.1584C9.68112 9.40691 10.2867 8.7938 11.0335 8.4063C11.7803 8.0188 12.6303 7.87665 13.4625 8.00006C14.3115 8.12594 15.0974 8.52152 15.7042 9.12836C16.3111 9.73521 16.7066 10.5211 16.8325 11.3701Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M18.3325 6.5H18.3425" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a>
              <?php else:?>
                <a class="newfa newfa-vk" title="Перейти в группу Вконтакте" href="https://vk.com/cyprusfortravellers" rel="nofollow" target="_blank">
                  <svg width="31" height="20" viewBox="0 0 31 20" fill="none" >
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M26.7468 19C26.0744 19 25.3987 18.9977 24.7263 19C23.8682 19.0023 23.1196 18.6612 22.5135 18.0112C21.8442 17.2879 21.2315 16.4937 20.5856 15.7406C20.3901 15.514 20.1814 15.2943 19.9594 15.1043C19.4428 14.6648 18.9259 14.7541 18.6809 15.4247C18.4653 16.0153 18.3993 16.6768 18.2731 17.3108C18.2601 17.3772 18.2701 17.4527 18.2701 17.5259C18.2634 18.3934 17.8923 18.881 17.1206 18.9267C15.0999 19.0503 13.1422 18.7963 11.3168 17.7045C9.76994 16.7798 8.53762 15.4728 7.46765 13.9484C5.68223 11.4009 4.29087 8.5924 3.01571 5.70381C2.67112 4.92101 2.34973 4.12448 2.01532 3.33481L1.95236 3.17001C1.66079 2.37577 1.90243 1.92256 2.66449 1.84703C2.85998 1.82643 3.05878 1.84016 3.25403 1.83559C4.30743 1.81956 5.36415 1.81041 6.41779 1.7921C7.15951 1.77836 7.66645 2.10796 7.95471 2.91137C8.69003 4.96908 9.64072 6.90091 10.8399 8.6748C11.0586 8.99753 11.3237 9.30195 11.6117 9.55144C11.9894 9.87418 12.3174 9.75973 12.4831 9.25617C12.5988 8.89911 12.6717 8.51 12.7082 8.13004C12.8374 6.7155 12.844 5.29868 12.632 3.89101C12.5129 3.11279 12.0822 2.68705 11.4029 2.5337C11.0056 2.44443 10.9592 2.27277 11.2276 1.92714C11.5852 1.45792 12.0621 1.24505 12.5922 1.16723C14.0001 0.958941 15.4144 0.938341 16.8158 1.14434C18.111 1.33203 18.2767 1.8745 18.3165 3.23181C18.343 4.12906 18.2701 5.02859 18.2601 5.92584C18.2502 6.7979 18.2436 7.66997 18.28 8.54204C18.2899 8.83044 18.3927 9.13715 18.5216 9.39351C18.6942 9.72769 18.9424 9.78033 19.2075 9.53542C19.5388 9.22413 19.8567 8.88537 20.1184 8.50771C21.311 6.77273 22.2352 4.87066 22.9506 2.83812C23.2455 1.9981 23.4543 1.84703 24.2691 1.84245C25.6936 1.84245 27.1179 1.83101 28.5424 1.8333C28.8008 1.8333 29.0692 1.85619 29.3141 1.9363C29.725 2.07134 29.9335 2.45588 29.7844 2.89992C29.5427 3.61863 29.3077 4.36939 28.9265 4.99884C27.9826 6.56902 26.9555 8.07739 25.9651 9.61553C25.7698 9.91995 25.5876 10.2358 25.4186 10.5608C25.1701 11.0346 25.2198 11.4924 25.5346 11.9067C25.7466 12.1814 25.975 12.4446 26.2069 12.6964C27.2935 13.8729 28.4264 14.9944 29.2812 16.4067C29.4599 16.6928 29.619 17.0041 29.7382 17.3268C29.9602 17.9334 29.7482 18.4804 29.1948 18.707C28.8836 18.8283 28.5457 18.881 28.2143 18.929C27.9694 18.9634 27.714 18.9382 27.4658 18.9428H26.7468V19Z" stroke="white" stroke-width="2"/>
                  </svg>
                </a>
                <a class="newfa newfa-facebook" title="Перейти в группу в Фейсбуке" href="https://www.facebook.com/cyprusfortravellers/" rel="nofollow" target="_blank"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" >
                  <path d="M18.8325 2H15.8325C14.5064 2 13.2347 2.52678 12.297 3.46447C11.3593 4.40215 10.8325 5.67392 10.8325 7V10H7.83252V14H10.8325V22H14.8325V14H17.8325L18.8325 10H14.8325V7C14.8325 6.73478 14.9379 6.48043 15.1254 6.29289C15.3129 6.10536 15.5673 6 15.8325 6H18.8325V2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a>  
                <a class="newfa newfa-tumblr" title="Перейти в группу в Tumblr" href="http://cyprusfortravellers.tumblr.com/" rel="nofollow" target="_blank">
                  <svg width="25" height="24" viewBox="0 0 25 24" fill="none" >
                  <path fill-rule="evenodd" clip-rule="evenodd" d="M19.3325 20.6904C19.3325 20.8534 19.2527 21.0054 19.1089 21.0821C18.581 21.3639 17.1042 22 14.5309 22C11.2237 22 9.18698 20.1193 9.18698 18.2808V10.5958C9.18698 10.3197 8.96312 10.0958 8.68698 10.0958H6.83252C6.55638 10.0958 6.33252 9.87197 6.33252 9.59582V7.69204C6.33252 7.44061 6.51878 7.22621 6.76314 7.16703C7.41877 7.00825 8.66936 6.58789 9.41251 5.58776C10.2609 4.44788 10.5679 3.24885 10.6777 2.46516C10.7142 2.20443 10.9307 2 11.194 2H13.2149C13.491 2 13.7149 2.22386 13.7149 2.5V6.05032C13.7149 6.32647 13.9387 6.55032 14.2149 6.55032H18.0165C18.2926 6.55032 18.5165 6.77418 18.5165 7.05032V9.64041C18.5165 9.91655 18.2926 10.1404 18.0165 10.1404H14.2596C13.9835 10.1404 13.7596 10.3643 13.7596 10.6404V17.1797C13.7596 18.464 15.347 18.8069 16.2078 18.8069C16.8513 18.8069 17.7761 18.5367 18.5802 18.1988C18.9279 18.0527 19.3325 18.2989 19.3325 18.6761V20.6904Z" stroke="white" stroke-width="2"/>
                  </svg>
                </a>          
                <a class="newfa newfa-twitter" title="Перейти в группу в Twitter" href="https://twitter.com/cyprusfortravel" rel="nofollow" target="_blank"><svg width="25" height="24" viewBox="0 0 25 24" fill="none" >
                  <g clip-path="url(#clip0_1088_4077)">
                  <path d="M23.8325 3.00005C22.8749 3.67552 21.8146 4.19216 20.6925 4.53005C20.0903 3.83756 19.2899 3.34674 18.3996 3.12397C17.5093 2.90121 16.572 2.95724 15.7146 3.2845C14.8572 3.61176 14.121 4.19445 13.6055 4.95376C13.09 5.71308 12.8202 6.61238 12.8325 7.53005V8.53005C11.0752 8.57561 9.33379 8.18586 7.76353 7.39549C6.19326 6.60513 4.84284 5.43868 3.83252 4.00005C3.83252 4.00005 -0.16748 13 8.83252 17C6.77305 18.398 4.31968 19.099 1.83252 19C10.8325 24 21.8325 19 21.8325 7.50005C21.8316 7.2215 21.8048 6.94364 21.7525 6.67005C22.7731 5.66354 23.4933 4.39276 23.8325 3.00005Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </g>
                  <defs>
                  <clipPath id="clip0_1088_4077">
                  <rect width="24" height="24" fill="white" transform="translate(0.83252)"/>
                  </clipPath>
                  </defs>
                  </svg>
                </a>
                <a class="newfa newfa-instagram" title="Перейти на страницу в Instagram" href="https://instagram.com/cyprusfortravellers" rel="nofollow" target="_blank">
                  <svg width="25" height="24" viewBox="0 0 25 24" fill="none" >
                  <path d="M17.8325 2H7.83252C5.0711 2 2.83252 4.23858 2.83252 7V17C2.83252 19.7614 5.0711 22 7.83252 22H17.8325C20.5939 22 22.8325 19.7614 22.8325 17V7C22.8325 4.23858 20.5939 2 17.8325 2Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M16.8325 11.3701C16.9559 12.2023 16.8138 13.0523 16.4263 13.7991C16.0388 14.5459 15.4257 15.1515 14.6742 15.5297C13.9226 15.908 13.071 16.0397 12.2403 15.906C11.4097 15.7723 10.6423 15.3801 10.0474 14.7852C9.45245 14.1903 9.06026 13.4229 8.9266 12.5923C8.79293 11.7616 8.9246 10.91 9.30286 10.1584C9.68112 9.40691 10.2867 8.7938 11.0335 8.4063C11.7803 8.0188 12.6303 7.87665 13.4625 8.00006C14.3115 8.12594 15.0974 8.52152 15.7042 9.12836C16.3111 9.73521 16.7066 10.5211 16.8325 11.3701Z" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  <path d="M18.3325 6.5H18.3425" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                  </svg>
                </a> 
              <?php endif;?>
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
