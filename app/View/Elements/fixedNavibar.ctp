<div class="fixednavbar">
<nav id='nav_barfixed'>
<div class="container">
<ul class='nav_linksfixed'>
<?php if(!empty($streamDetails['Stream']['profile'])){ ?>	
<li><a href="#Profile" rel="" id="anchor1" class="anchorLink">Profile</a></li>
<?php } ?>
<!-- Faculties -->
<?php if(!empty($faculties)){ ?>
<li><a href="#Faculty" rel="" id="anchor1" class="anchorLink">Faculty</a></li> 
<?php } ?>
<!-- Achievements -->
<?php if(!empty($achivements)){ ?>
<li><a href="#Achievements" rel="" id="anchor1" class="anchorLink">Achievements</a></li>	
<?php } ?>

<!-- Subject -->
<?php if(!empty($subjects)){ ?>
<li><a href="#Subjects" rel="" id="anchor1" class="anchorLink">Subject</a></li>
<?php } ?>

<!-- Academinc -->
<?php if(!empty($activities)){ ?>
<li><a href="#Activities" rel="" id="anchor1" class="anchorLink">Activities</a></li>
<?php } ?>


<li><a href="#Enquiry" rel="" id="anchor1" class="anchorLink">Enquiry</a></li>
</ul>
</div>
</nav>
</div>