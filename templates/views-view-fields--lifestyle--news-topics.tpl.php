<?php foreach ($fields as $id => $field): 
    if($id == 'field_main_img') { $image = $field->content; }
    if($id == 'title') { $title = $field->content; }   
    if($id == 'field_rubric') { $rubric = $field->content; }
    if($id == 'totalcount') { $totalcount = $field->content; }
    if($id == 'field_kindt') { $kind = $field->content; }   
    if($id == 'field_background') { $movie = $field->content; }    
 endforeach; ?>
<?php
	global $language_content; 
	$lang = $language_content->language;
	if ($lang == 'en') $prefix = '/en'; else $prefix = '';
 	
	$term_rubric = taxonomy_term_load($rubric);
	$rubric_name_localize = i18n_taxonomy_localize_terms($term_rubric);
	$rubric_name = $rubric_name_localize->name;  
  
?>
<div class="topic-item topic-item-small">
  <div class="photo">
    <?php if (isset($movie)):?>
      <?php print $movie;?>
    <?php else: ?>
      <?php print $image;?>
    <?php endif;?>
  </div>
  <?php if (!isset($movie)):?>
  <div class="info">
    <div class="l-rubric">
      <a href="<?php print $prefix;?>/lifestyle/all/<?php print $term_rubric->field_english['und'][0]['value'];?>"><?php print $rubric_name; ?></a>
        <?php if(isset($kind)):?>
          | <?php print $kind;?>
        <?php endif;?>
        <span>| <?php print $totalcount;?></span>
    </div>
    <div class="title"><?php print $title?></div>                  
  </div>
<?php endif;?>
</div>