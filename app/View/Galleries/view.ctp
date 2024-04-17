<?php //debug($galleries);die; ?>
<!--fancyBox main JS and CSS files start-->
<script type="text/javascript" src="<?php echo $this->bs->webroot ?>fancybox/jquery.fancybox.js?v=2.1.5"></script>
<link rel="stylesheet" type="text/css" href="<?php echo $this->bs->webroot ?>fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
<script type="text/javascript">
  $(document).ready(function() {
    /*
     *  Simple image gallery. Uses default settings
     */

    $('.fancybox').fancybox();

    /*
     *  Different effects
     */

    // Change title type, overlay closing speed
    $(".fancybox-effects-a").fancybox({
      helpers: {
        title : {
          type : 'outside'
        },
        overlay : {
          speedOut : 0
        }
      }
    });

    // Disable opening and closing animations, change title type
    $(".fancybox-effects-b").fancybox({
      openEffect  : 'none',
      closeEffect : 'none',

      helpers : {
        title : {
          type : 'over'
        }
      }
    });

    // Set custom style, close if clicked, change title type and overlay color
    $(".fancybox-effects-c").fancybox({
      wrapCSS    : 'fancybox-custom',
      closeClick : true,

      openEffect : 'none',

      helpers : {
        title : {
          type : 'inside'
        },
        overlay : {
          css : {
            'background' : 'rgba(238,238,238,0.85)'
          }
        }
      }
    });

    // Remove padding, set opening and closing animations, close if clicked and disable overlay
    $(".fancybox-effects-d").fancybox({
      padding: 0,

      openEffect : 'elastic',
      openSpeed  : 150,

      closeEffect : 'elastic',
      closeSpeed  : 150,

      closeClick : true,

      helpers : {
        overlay : null
      }
    });

    /*
     *  Button helper. Disable animations, hide close button, change title type and content
     */

    $('.fancybox-buttons').fancybox({
      openEffect  : 'none',
      closeEffect : 'none',

      prevEffect : 'none',
      nextEffect : 'none',

      closeBtn  : false,

      helpers : {
        title : {
          type : 'inside'
        },
        buttons : {}
      },

      afterLoad : function() {
        this.title = 'Image ' + (this.index + 1) + ' of ' + this.group.length + (this.title ? ' - ' + this.title : '');
      }
    });


    /*
     *  Thumbnail helper. Disable animations, hide close button, arrows and slide to next gallery item if clicked
     */

    $('.fancybox-thumbs').fancybox({
      prevEffect : 'none',
      nextEffect : 'none',

      closeBtn  : false,
      arrows    : false,
      nextClick : true,

      helpers : {
        thumbs : {
          width  : 50,
          height : 50
        }
      }
    });

    /*
     *  Media helper. Group items, disable animations, hide arrows, enable media and button helpers.
    */
    $('.fancybox-media')
      .attr('rel', 'media-gallery')
      .fancybox({
        openEffect : 'none',
        closeEffect : 'none',
        prevEffect : 'none',
        nextEffect : 'none',

        arrows : false,
        helpers : {
          media : {},
          buttons : {}
        }
      });

    /*
     *  Open manually
     */

    $("#fancybox-manual-a").click(function() {
      $.fancybox.open('1_b.jpg');
    });

    $("#fancybox-manual-b").click(function() {
      $.fancybox.open({
        href : 'iframe.html',
        type : 'iframe',
        padding : 5
      });
    });

    $("#fancybox-manual-c").click(function() {
      $.fancybox.open([
        {
          href : '1_b.jpg',
          title : 'My title'
        }, {
          href : '2_b.jpg',
          title : '2nd title'
        }, {
          href : '3_b.jpg'
        }
      ], {
        helpers : {
          thumbs : {
            width: 75,
            height: 50
          }
        }
      });
    });


  });
</script>
<!--Collage start here-->

<section class="innercollage">
  <div class="innerheading">
    <div class="lotus"><img src="<?php echo $this->webroot ?>img/lotus.png" alt="soil-2-soul-lotus-logo" title="Soil 2 Soul : expeditions"/></div>
    <h1>Gallery </h1>
  </div>
  <img src="<?php echo $this->webroot ?>img/gallery_collage.jpg" alt="soil-2-soul-galleries" title="Soil 2 Soul : Gallery"> </section>
<!--Collage end here-->

<div class="whitecontarea">
  <div class="container">
    <div class="text-center"><img src="<?php echo $this->webroot ?>img/om.png" alt="soil-2-soul-Om-logo"/><br>
<br></div>
<div class="mainheading"><h3><?php echo $galleryCategory['GalleryCategory']['name'];?></h3></div>
  <div class="row">
   <div class="col-sm-9">
  <div class="row">
<?php foreach ($galleries as $key => $gallery) { 

  $filePath = (!empty($this->webroot.'files/gallery/image/'.$gallery['Gallery']['id'].'/'.$gallery['Gallery']['image'])) ? $this->webroot.'files/gallery/image/'.$gallery['Gallery']['id'].'/'.$gallery['Gallery']['image'] : '';

  //debug($filePath);die;
  ?>
  <div class="col-sm-4">
  <div class="galleryimgbox">
  <div class="galleryimg">
  <a class="fancybox" href="<?php echo $filePath; ?>" data-fancybox-group="gallery" title="">
  <img src="<?php echo $filePath; ?>" alt="soil-2-soul" title="<?php echo $gallery['Gallery']['name']; ?>"></a>
  </div>
  </div>    
  </div>
<?php } ?>


</div>  
</div>
<div class="col-sm-3 rowmargin30">
<div class="mainheading"><h3>Other Gallery</h3></div> 
 <div class="row padding5pxarea">
<?php //debug($othergalleries);die; ?>
<?php foreach ($othergalleries as $key => $othergallery) { ?>
  <div class="col-md-12 col-sm-4 col-xs-6 padding5px">
  <div class="gallerycatbox"> 
  <a href="<?php echo $this->Html->url(['controller' => 'galleries', 'action' => 'view', 
       'gallery_slug' => $othergallery['GalleryCategory']['page_slug']]); ?>">
  <div class="gallerycatboximg">
  <div class="gallerycatboxshade"><h6><?php echo $othergallery['GalleryCategory']['name'] ?></h6></div>  
  <?php echo $this->Bs->image('GalleryCategory.image_file',$othergallery,['alt'=>'soil-2-soul','title'=>$othergallery['GalleryCategory']['name']]) ?>
  </div>
  </a>  
  </div>  
  </div>
<?php } ?>




</div>
    </div>  
   </div>
  </div>
</div>

<!--Testimonials section start here-->
<?php echo $this->element('testimonials'); ?> 
<!--Testimonials end here-->

<div class="whitecontarea ourBrandPedding">
  <div class="container"> 
    <!--Our Co-Brands section start here-->
    
    <?php echo $this->element('blogs/brand'); ?> 
    
    <!--Our Co-Brands section end here--> 
  </div>
</div>

