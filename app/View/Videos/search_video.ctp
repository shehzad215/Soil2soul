<?php //debug($videos);die; ?>
<?php foreach ($videos as $key => $video) { ?>
<div class="videoimgbox">
   <div class="row">
        <div class="col-md-5 col-sm-4">
            <a href="javascript:void(0);" onclick="openModal();currentSlide(1)">
            <span class="videoimgboxplay"></span>
            <?php echo $this->Bs->image('Video.image_file',$video,['alt'=>$video['Video']['title'],'class'=>'img-responsive']); ?>
            <!-- <img src="<?php //echo $this->webroot;?>img/a_journey_beyond.jpg" alt="" class="img-responsive" /> -->
            </a>    
            </div>
        <div class="col-md-7 col-sm-8">
    <h4><?php echo $video['Video']['title'] ?></h4>
            <div>This captivating video takes you on a transformative exploration of #HiddenGems of #India<br>
✔️Immerse yourself in a rich tapestry of #culture, #tradition, and #spirituality<br>
✔️Connect with #local communities through authentic #experiences<br>
✔️Seek serenity in off-the-beaten-path #retreats  <a href="#">Read more</a><!--<br>
<br>
Take a #tour across #sacred India and immerse in deep spiritual essence. <br>

Whether you're a seasoned traveler or a spiritual seeker, this video is your invitation to connect with the soul of India.--></div>
        </div>    
        </div>
              
              <div id="myModalgallery" class="modalgallery"> <span class="closegallery cursor" onclick="closeModal()">&times;</span>
                <div class="modalgallery-content">
                  <div class="container">               
                      <iframe src="<?php echo $video['Video']['video_link'] ?>" title="YouTube video player" frameborder="0" style="aspect-ratio: 14 / 7; width: 100%;" ></iframe>         
                      
                    </div>
                </div>
              </div>
  </div>
<?php } ?>  