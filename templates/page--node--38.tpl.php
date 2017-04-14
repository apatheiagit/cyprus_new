<div class="somit somit--not-found">
  <div class="container">
    <div class="logo"><a href="/"><img src="/sites/all/themes/cyprus_new/img/logo.png" alt="Главная"></a></div>
    <div class="text-block">
      <div class="hello-text">
        <span>Ой!</span> Как вы здесь оказались? <br>Вернитесь назад или воспользуйтесь <br>меню для продолжения просмотра. 
      </div>
      <div class="menu-block">
        <?php if ($main_menu): ?>
	        <nav id="main-menu" role="navigation" tabindex="-1">
	          <?php
	          // This code snippet is hard to modify. We recommend turning off the
	          // "Main menu" on your sub-theme's settings form, deleting this PHP
	          // code block, and, instead, using the "Menu block" module.
	          // @see https://drupal.org/project/menu_block
	          print theme('links__system_main_menu', array(
	            'links' => $main_menu,
	            'attributes' => array(
	              'class' => array('links', 'inline', 'clearfix'),
	            ),
	            'heading' => array(
	              'text' => t('Main menu'),
	              'level' => 'h2',
	              'class' => array('element-invisible'),
	            ),
	          )); ?>
	        </nav>
	      <?php endif; ?>
      </div>
    </div>
    <div class="picture-block"></div>
  </div>
</div>