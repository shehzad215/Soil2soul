<div id="journeyImagesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Journey Images'), array('controller'=>'journey_images', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'journey_images', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'OurJourny.name'=>__('Our Journy'), 'name'=>__('Name'), 'order'=>__('Order'), 'image_file'=>__('Image File'), 'its_main_image'=>__('Its Main Image'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'journeyImagesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#journeyImagesAjax'));?>
<div class="journeyImages index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Journey Images'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions"></div>
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
                <?php echo $this->Bs->toggleColumns(array(), 'journeyImagesTable'); ?>
            </div>
            <div id="journeyImagesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed journeyImages">
                <thead>
                <tr>
                        <th class="hide id"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo 'Order'; ?></th>
                        <th class=""><?php echo 'Our Journy'; ?></th>
                        <th class=""><?php echo 'Name'; ?></th>
                        <th class=""><?php echo 'Image'; ?></th>
                        <th class=""><?php echo 'Main Image'; ?></th>
                        <th class=""><?php echo 'Active'; ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php //debug($journeyImages); ?>
                <?php foreach ($journeyImages as $key => $journeyImage): 
                	$isChecked = ($journeyImage['JourneyImage']['its_main_image'] == true) ? 'checked' : '';
                ?>
				<tr class='<?php echo 'tr_'.$journeyImage['JourneyImage']['id']; ?>'>
					<td class='hide'><?php echo h($journeyImage['JourneyImage']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($journeyImage['JourneyImage']['order']); ?>&nbsp;</td>
					<td class=''><?php echo h($journeyImage['OurJourny']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($journeyImage['JourneyImage']['name']); ?>&nbsp;</td>
					<td class=''>
						<?php echo ($this->bs->image('JourneyImage.image_file',$journeyImage,['class'=>'imageFile','alt'=>''])); ?>&nbsp;
					</td>
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="main[]" value="<?php echo h($journeyImage['JourneyImage']['its_main_image']); ?>" class ='mainClass'  data-value="<?php echo $journeyImage['JourneyImage']['id'];?>" data-Id="<?php echo $journeyImage['JourneyImage']['our_journy_id'];?>" <?php  if($journeyImage['JourneyImage']['its_main_image'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($journeyImage['JourneyImage']['active']); ?>" class ='activeClass'  data-value="<?php echo $journeyImage['JourneyImage']['id'];?>" <?php  if($journeyImage['JourneyImage']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'journey_images', 'action'=>'edit', $journeyImage['JourneyImage']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'journey_images', 'action'=>'delete', $journeyImage['JourneyImage']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'journey_images', 'action'=>'view', $journeyImage['JourneyImage']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
						echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
					?>
					</td>
				</tr>
			<?php endforeach; ?>
                </tbody>
                </table>
            </div>
            
            <?php echo $this->Bs->paginationRow(); ?>
            <?php echo $this->Js->writeBuffer(); ?>
            </div>
        </div>
    </div>
</div>
</div>
</div>
<script type="text/javascript">
/*Active Fucntionality*/
	$('.activeClass').change(function(){
		var checkedid = $(this).is(':checked');
		var journeyimageid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'journey_images','action'=>'is_active']); ?>",
          data: {"journeyimageid":journeyimageid,"checkedid":checkedid} 
        });
	});


  // $('.mainClass').change(function(){
  $(document).on('change','.mainClass',function(){
  		if ($(this).is(':checked')) {
  			var checkedid = $(this).is(':checked');
		  	var journeyimageid = $(this).attr('data-value');
		  	var journeyid = $(this).attr('data-Id');

		  	$.ajax({
		      type:"POST",
		      url: "<?php echo $this->Html->url(['controller'=>'journey_images','action'=>'update_main_image']); ?>",
		      data: {"checkedid":checkedid,"journeyimageid":journeyimageid,"journeyid":journeyid},
		      dataType:'json',
		      success : function(data){
		      }
		  });

		   $('.mainClass').not(this).prop('checked', false);
	}
  });	


// 	$('.isDefault').on('change', function() {
  //     if ($(this).is(':checked')) {
  //     $('.isDefault').not(this).prop('checked', false);
  //     var id = $(this).data('id');
  //   }
  //   setDefaultAddress(id);
  // });	


// 	function setDefaultAddress(id){
// 		$.ajax({
  //         type:"POST",
  //         url: "<?php echo $this->Html->url(['controller'=>'journey_images','action'=>'update_main_image']); ?>",
  //         data: {"id":id},
  //         dataType:'json',
  //         success : function(data){
  //         }
  //   });
// 	}
	
</script>