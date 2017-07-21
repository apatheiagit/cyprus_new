<?php $current_url = url(current_path(), array('absolute' => TRUE)); $current_title = drupal_get_title();?>
<div class="wide-container container">	
	<div id="<?php print $block_html_id; ?>" class="<?php print $classes; ?> big-share-block">
		<div class="text-center">
			<div class="title">Делитесь историями, рассказывайте о нас друзьям</div>
			<div class="text">Поделитесь интересными материалами о Кипре, его особенностях и увлекательных путешествиях.</div>			
			<div class="share-links">					
				<a href="http://www.facebook.com/sharer.php?src=sp&amp;u=<?php print urlencode($current_url);?>" class="fa fa-facebook" target="_blank">
					<span class="visuallyhidden">Facebook</span></a>		
				<a href="http://twitter.com/home?status=<?php print urlencode($current_url);?>&amp;text=<?php print $current_title;?>" class="fa fa-twitter" target="_blank">
					<span class="visuallyhidden">Twitter</span></a>		
				<a href="https://telegram.me/share/url?url=<?php print urlencode($current_url);?>&amp;text=<?php print $current_title;?>" class="fa fa-telegram" target="_blank" >
					<span class="visuallyhidden">Telegram</span></a>						
				<a href="http://vk.com/share.php?url=<?php print urlencode($current_url);?>&amp;title=<?php print $current_title;?>" class="fa fa-vk" target="_blank">
					<span class="visuallyhidden">ВКонтакте</span></a>	
				<a href="http://www.tumblr.com/share/link?url=<?php print urlencode($current_url);?>&amp;name=<?php print $current_title;?>" class="fa fa-tumblr" target="_blank">
					<span class="visuallyhidden">Tumblr</span></a>	
			</div>
		</div>
	</div>
	<script type="text/javascript">
	(function($) {
	  $(function() {  
	      
	      $('.share-links a').on('click', function(){   
	      	var Url = $(this).attr('href');
	      	var newWin = window.open(Url, 'example', 'width=600,height=400');
	        return false;
	      });

	   })
	})(jQuery);    
	</script>
</div>
