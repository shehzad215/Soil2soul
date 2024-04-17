<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Upload Images</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
  <link rel="stylesheet" href="<?php echo $this->webroot ?>css/custome_css/bootstrap.css">
  <link rel="stylesheet" href="<?php echo $this->webroot ?>css/custome_css/bootstrap-theme.css">
  <link href="<?php echo $this->webroot ?>css/custome_css/main.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $this->webroot ?>css/custome_css/form.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $this->webroot; ?>css/custome_css/developer.css" rel="stylesheet" type="text/css">
  <link href="<?php echo $this->webroot ?>css/fonts/font-awesome.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300;400;500;700&family=Philosopher:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<div class="whitecontarea">
   <div class="container">
      <div class="row topmargin40">
         <?php echo $this->Form->create('Gallery', array('class'=>'form-vertical','type'=>'file'));
           echo $this->Bs->inputDefaults(array('label'=>false));
          ?>
          <?php //echo $this->Form->input('Gallery.image',['type'=>'file','placeholder'=>'Verfication Code','class'=>'form-control','multiple' => true]); ?>
          
          <input type="file" name="data[Gallery][image][]" class="form-control" placeholder="Verfication Code" multiple="multiple" id="GalleryImage" aria-invalid="false">

          <button class="submit_btn2 btnmd" type="submit">Send</button>
          <?php echo $this->form->end(); ?>
      </div>
   </div>
</div>  

</body>
</html>