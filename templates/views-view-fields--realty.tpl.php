<?php foreach ($fields as $id => $field): 
    if($id == 'field_photos') { $image = $field->content; }
    if($id == 'field_photos_1') { $images = $field->content; }
    if($id == 'changed') { $changed = $field->content; }
    if($id == 'title') { $title = $field->content; }
    if($id == 'path') { $path = $field->content; }
    if($id == 'body') { $body = $field->content; }
    if($id == 'field_cost') { $cost = $field->content; }
    if($id == 'field_phone') { $phone = $field->content; }
    if($id == 'field_email') { $email = $field->content; }
 endforeach; ?>
<?php 	
	$theme_path = path_to_theme();
	global $language_content; 
	$lang = $language_content->language;
	if ($lang == 'en') $prefix = '/en'; else $prefix = '';
	if (!function_exists('get_day_name')) {      
		function get_day_name($timestamp) {
	    $date = strtotime($timestamp);
	    $date = date('d.m.Y', $date);
	    if($date == date('d.m.Y')) {
	      $date = 'Today';
	    } 
	    else if($date == date('d.m.Y',time() - (24 * 60 * 60))) {
	      $date = 'Yesterday';
	    }
	    return $date;
		}
	}
?>

<div class="realty-item">
	<div class="md-5">
		<div class="photo">
			<?php print $image;?>
			<?php if(isset($images)):?>
				<div class="small-photos">
					<?php print $images;?>
				</div>
			<?php endif; ?>
		</div>
	</div>
	<div class="md-7 realty-item-info">
		<div class="date"><?php print t(get_day_name($changed));?></div>
		<h3 class="h3-title"><?php print $title;?></h3>
		<div class="descr"><?php print $body;?></div>
		<div class="bottom-block">
			<div class="price"><?php print number_format($cost, 0, '', ' ');?> €</div>
			<div class="buttons">
				<a href="tel:<?php print $phone;?>" class="button lime-button show-phone"><?php print t('Call');?></a>
	      <a href="mailto:<?php print $email;?>" class="button lime-button"><?php print t('Write');?></a>
			</div>
		</div>
	</div>
</div>