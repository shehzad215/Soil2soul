<div id="amenitiesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Amenities'), array('controller'=>'amenities', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'amenities', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'name'=>__('Name'), 'icon'=>__('Icon'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'amenitiesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#amenitiesAjax'));?>
<div class="amenities index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Amenities'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
				$dropdownMenuLink = array();
				$dropdownMenu = array();

				if($isLoggedIn && $userRole['add']) :
					$dropdownMenuLink[] = $this->Bs->link(__('New Amenity'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline','data-toggle'=>'modal-manager'));
				else : 
					$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
				endif;
				echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
			?>
            </div>
        </div>
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
                <?php echo $this->Bs->toggleColumns(array(), 'amenitiesTable'); ?>
            </div>
            <div id="amenitiesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id "><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="text-center col-sm-1"><?php echo 'Icon'; ?></th>
                        <th class=""><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($amenities as $amenity): ?>
				<tr class='<?php echo 'tr_'.$amenity['Amenity']['id']; ?>'>
					<td class='hide'><?php echo h($amenity['Amenity']['id']); ?>&nbsp;</td>
					<td class='text-center'><?php echo $this->Bs->image('Amenity.icon',$amenity,['alt'=>'','class'=>'imageicon']); ?></td>
					<td class=''><?php echo h($amenity['Amenity']['name']); ?>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($amenity['Amenity']['active']); ?>" class ='activeClass'  data-value="<?php echo $amenity['Amenity']['id'];?>" <?php  if($amenity['Amenity']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>
					
					<td class=''><?php echo $this->Bs->niceShort($amenity['Amenity']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($amenity['Amenity']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'amenities', 'action'=>'edit', $amenity['Amenity']['id']), array('icon'=>'pencil-square-o','data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'amenities', 'action'=>'delete', $amenity['Amenity']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'amenities', 'action'=>'view', $amenity['Amenity']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var amenityid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'amenities','action'=>'is_active']); ?>",
          data: {"amenityid":amenityid,"checkedid":checkedid} 
        });
	});
	
</script>