<?xml version="1.0" encoding="UTF-8"?>
<urlset>
<?php 
if(!empty($xmlUrlData['SeoModule'])){
foreach ($xmlUrlData['SeoModule'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>



<?php 
if(!empty($xmlUrlData['Blog'])){
foreach ($xmlUrlData['Blog'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>

<?php 
if(!empty($xmlUrlData['BlogCategory'])){
foreach ($xmlUrlData['BlogCategory'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>

<?php 
if(!empty($xmlUrlData['BlogTag'])){
foreach ($xmlUrlData['BlogTag'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>

<?php 
if(!empty($xmlUrlData['BlogAuthor'])){
foreach ($xmlUrlData['BlogAuthor'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>

<?php 
if(!empty($xmlUrlData['VideoCategory'])){
foreach ($xmlUrlData['VideoCategory'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>

<?php 
if(!empty($xmlUrlData['Package'])){
foreach ($xmlUrlData['Package'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>

<?php 
if(!empty($xmlUrlData['OurJourny'])){
foreach ($xmlUrlData['OurJourny'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>

<?php 
if(!empty($xmlUrlData['OurTeam'])){
foreach ($xmlUrlData['OurTeam'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>

<?php 
if(!empty($xmlUrlData['GalleryCategory'])){
foreach ($xmlUrlData['GalleryCategory'] as $key => $xmlUrl) { ?>
<url>
  <loc><?php echo $xmlUrl['URL'];?></loc>
  <lastmod><?php echo $xmlUrl['LstModified'];?></lastmod>
  <priority>1.00</priority>
</url>  
<?php  }} ?>


</urlset>