<?php
	$controller = $this->request->params['controller'];
?>
<div class="delete-container">
<div class="text-error" style="text-align: center;">
    Are you sure you want to delete <?php echo $modelName ?> image #<?php echo $id?>? &nbsp;&nbsp; 
    <?php 
        echo $this->Bs->link($this->Bs->icon('trash').' '.__('Yes, Delete!'), array('action'=>'updateimage',$fieldname, $id, 'true'), array('class'=>'btn btn-danger postDeleteLink', 'escape'=>false));
    ?>
</div>
</div>
