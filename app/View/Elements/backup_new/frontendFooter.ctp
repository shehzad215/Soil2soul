</div>	   
	
<!--Footer start here-->
<footer class="footer">
<div class="container">
<div class="footernewsletterarea">
<div class="row">

<div class="col-sm-4">
<h5>Newsletter<br>
<span>Subscribe for updates & promotions</span></h5>	
</div>
<div class="col-sm-4 rowmargin20">
<div class="input-group newslettertextfieldarea">
<input type="text" class="newslettertextfield" placeholder="Enter your email id">
<span class="input-group-btn">
<button class="newsletterbtn" type="button">Subscribe</button>
</span>
 </div>	
 <span id="nerror" style="color:#fff"></span>
</div>
<div class="col-sm-4 rowmargin20">
<div class="sociallinks">
<li><a href="https://business.facebook.com/atstravelke" target="_blank"><img src="<?php echo $this->webroot;?>img/facebook.png" alt=""/></a></li>
<li><a href="https://www.linkedin.com/company/28853147/admin/" target="_blank"><img src="<?php echo $this->webroot;?>img/linkedin.png" alt=""/></a></li>
<li><a href="https://twitter.com/ATSTravelKe" target="_blank"><img src="<?php echo $this->webroot;?>img/twitter.png" alt=""/></a></li>
<li><a href="https://youtu.be/OFtrewkZISE" target="_blank"><img src="<?php echo $this->webroot;?>img/youtube.png" alt=""/></a></li>
<li><a href="https://www.instagram.com/atstravelke/" target="_blank"><img src="<?php echo $this->webroot;?>img/instagram.png" alt=""/></a></li>
</div>	
</div>	
</div>	
</div>	
<div class="footercontarea">
<div class="row">
<div class="col-md-4 col-sm-4">
<div><img src="<?php echo $this->webroot;?>img/footerlogo.png"></div>	
<div class="footertext topmargin20">ATS Travel aims to redefine your Corporate Travel and impart an experiential atmosphere to your travelers.  We improve efficiency while coordinating your organizational travel.<br>
<br>
<a href="<?php echo Router::url('/aboutus')?>">Read More</a></div>	
</div>
<div class="col-md-5 col-sm-4 rowmargin20">
<div class="row">
<div class="col-md-8">
<h6>ATS Travels</h6>
<div class="row">
<div class="col-xs-6">
<div class="footertext">
<ul>
<li><a href="<?php echo Router::url('/aboutus')?>">About us</a></li>	
<li><a href="<?php echo Router::url('/join-our-team')?>">Join Our Team</a></li>	
<li><a href="<?php echo Router::url('/partnerships')?>">Partnerships</a></li>
<li><a href="<?php echo Router::url('/blogs')?>">Blogs</a></li>
<li><a href="<?php echo Router::url('/gallery')?>">Gallery</a></li>
<li><a href="<?php echo Router::url('/contactus')?>">Contact us Today</a></li>	
</ul>	
</div>	
</div>
<div class="col-xs-6">
<div class="footertext">
<ul>
<li><a href="<?php echo Router::url('/travel-program')?>">Travel Program</a></li>
<li><a href="<?php echo Router::url('/consulting-integration')?>">Consulting & Integration</a></li>
<li><a href="<?php echo Router::url('/global-program')?>">Global Program</a></li>
<li><a href="<?php echo Router::url('/insights')?>">Insights</a></li>
<li><a href="<?php echo Router::url('/duty-of-care')?>">Duty of Care</a></li>	
</ul>	
</div>	
</div>	
</div>	
</div>
<div class="col-md-4 rowmargintabmob20">
<h6>Services</h6>
<div class="footertext">
<ul>
<li><a href="<?php echo Router::url('/corporate-travel')?>">Corporate Travel</a></li>
<li><a href="<?php echo Router::url('/meetings-incentives')?>">Meetings & Incentives</a></li>
<li><a href="<?php echo Router::url('/group-travels')?>">Group Travels</a></li>	
<li><a href="<?php echo Router::url('/technology')?>">Technology</a></li>
<li><a href="<?php echo Router::url('/risk-mitigation')?>">Risk Mitigation</a></li>
<li><a href="<?php echo Router::url('/business-intelligence')?>">Business Intelligence</a></li>	
</ul>	
</div>	
</div>	
</div>	
</div>
<div class="col-md-3 col-sm-4 rowmargin20">
<h6>Contact us Today</h6>
<div class="footertext">
<table width="100%" cellspacing="0" cellpadding="0" border="0">
<tbody>
<tr>
<td width="22" valign="top"><i class="fa fa-map-marker"></i></td>
<td valign="top">ACK Garden House, Ground Floor, First Ngong Avenue, Nairobi, Kenya.</td>
</tr>
<tr>
<td height="15"></td>
<td height="15"></td>
</tr>	
<tr>
<td width="22" valign="top"><i class="fa fa-phone"></i></td>
<td>+254 703 287 287 / +254 727 287 287</td>
</tr>
<tr>
<td height="15"></td>
<td height="15"></td>
</tr>	
<tr>
<td width="22" valign="top"><i class="fa fa-envelope"></i></td>
<td><a href="mailto:emarketing@atstravel.co.ke">emarketing@atstravel.co.ke</a></td>
</tr>
</tbody>
</table>
</div>	
</div>	
</div>
</div>
<div class="copyrightarea">
<div class="row">
<div class="col-sm-4 left-mob-center">
<div class="footertext"><a href="<?php echo Router::url('/privacy-policy')?>">Privacy Policy</a></div>	
</div>
<div class="col-sm-8 right-mob-center rowmargin10">
<div class="footertext">Ⓒ <script>document.write(new Date().getFullYear())</script>. ATS Travel. All Rights Reserved.</div>	
</div>	
</div>		
</div>
</div>	
</footer>
<!--Footer end here-->

</main>

<!-- Menu css and script start-->
<script type="text/javascript" src="<?php echo $this->webroot; ?>menu/navigation.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){				
		$("#navigation").navigation();	
	});
</script>
<!-- Menu css and script end-->	
	
<!--Numbers Counting script start here--> 
<script src="<?php echo $this->webroot; ?>counter/waypoints.min.js"></script> 
<script src="<?php echo $this->webroot; ?>counter/jquery.counterup.min.js"></script> 
<script>
    jQuery(document).ready(function( $ ) {
        $('.counter').counterUp({
            delay: 10,
            time: 1000
        });
    });
</script> 
<!--Numbers Counting script end here-->	

<script type="text/javascript" src="<?php echo $this->webroot; ?>js/custome_js/sticky-sidebar.js"></script>
<script type="text/javascript">

	var a = new StickySidebar('#sidebar', {
		topSpacing: 150,
		bottomSpacing: 100,
		containerSelector: '.container',
		innerWrapperSelector: '.sidebar__inner'
	});
</script>

<script>
	$(".anchorLink").click(function () {
		var moveto = $(this).attr("data-moveto");
		var scrollTo = $("#" + moveto);
		var position = eval(scrollTo.offset().top) - 150;
		$('html, body').animate({
			scrollTop: position
		}, 500);
	});
</script>

<script type="text/javascript">
	$('.newsletterbtn').click(function () {
	var value = $('.newslettertextfield').val();
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if(value != '' && testEmail.test(value)){

		$.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(['controller'=>'newsletters','action'=>'add']); ?>",
            data: {"value": value  },
            dataType: "json",
            success: function (data) {
                $("#nerror").text(data);
            }
        });

	}else{
		$('#nerror').text('Please Add Email Id!');	
	}
});
</script>

	