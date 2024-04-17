<div id="accordion1">
<dl class="accordion3" id="slider1">
<?php foreach ($faqs as $key => $faq) { ?>
<dt><?php echo $faq['Faq']['query'];?></dt>
<dd>
<div class="content_hide">
	<?php echo $faq['Faq']['answer'];?>
</div>
</dd>
<?php  } ?>	
</dl>
</div>