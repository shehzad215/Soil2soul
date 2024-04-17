<div id="tourGlimpsesAjax">
<?php 
	// debug($ourJournies);exit;
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'),  array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'OurJourny.name'=>__('Our Journy'), 'Amenity.name'=>__('Amenity'), 'description'=>__('Description'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'tourGlimpsesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#tourGlimpsesAjax'));?>
<div class="tourGlimpses index">
<div class="row">
<div class="col-md-12">
	
<!-- Our Journey navigation -->
<?php if(!empty($journeyId)){ ?>
	<h4><?php  echo 'Tour :- '.$ourJournies[$journeyId];?></h4>	
<nav class="navbar navbar-default listingBar">
	<ul class="nav navbar-nav" role="tablist">
		<?php echo $this->Bs->menuLink(__('Our Journey'), array('controller'=>'our_journies', 'action'=>'edit',$journeyId)); ?>
		<?php echo $this->Bs->menuLink(__('Journey Images'),['controller'=>'journey_images','action'=>'add',$journeyId]); ?>
		<?php echo $this->Bs->menuLink(__('Tour Glimpse'), '#userTab', array('aria-expanded'=>'true', 'data-toggle'=>'tab', 'role'=>'tab', 'li'=>array('class'=>'active')),['class'=>'active']); ?>
		<?php echo $this->Bs->menuLink(__('Exclusions'), array('controller'=>'our_journey_exlusions', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Inclusions'), array('controller'=>'our_journey_inclusions', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Itineraries'), array('controller'=>'our_journey_iteneries', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Tour Cost'), array('controller'=>'tour_costs', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Hotels'), array('controller'=>'our_journey_hotels', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Faqs'), array('controller'=>'faqs', 'action'=>'add',$journeyId)) ?>
		<?php echo $this->Bs->menuLink(__('Testimonials'), array('controller'=>'testimonials', 'action'=>'add',$journeyId)) ?>
	</ul>
</nav>	
<?php } ?>
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Tour Glimpses'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			
			$addUrl = (!empty($journeyId)) ? ['action'=>'add','our_journy_id'=>$journeyId] : ['action'=>'add'];	

			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Tour Glimpse'), ['action'=>'add'], array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'tourGlimpsesTable'); ?>
            </div>
            <div id="tourGlimpsesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('OurJourny.name', __('Our Journy')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('Amenity.name', __('Amenity')); ?></th>
                        
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($tourGlimpses as $tourGlimpse): ?>
				<tr class='<?php echo 'tr_'.$tourGlimpse['TourGlimpse']['id']; ?>'>
					<td class='hide'><?php echo h($tourGlimpse['TourGlimpse']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($tourGlimpse['OurJourny']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($tourGlimpse['Amenity']['name']); ?>&nbsp;</td>
					
					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($tourGlimpse['TourGlimpse']['active']); ?>" class ='activeClass'  data-value="<?php echo $tourGlimpse['TourGlimpse']['id'];?>" <?php  if($tourGlimpse['TourGlimpse']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class=''><?php echo $this->Bs->niceShort($tourGlimpse['TourGlimpse']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($tourGlimpse['TourGlimpse']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'tour_glimpses', 'action'=>'edit', $tourGlimpse['TourGlimpse']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'tour_glimpses', 'action'=>'delete', $tourGlimpse['TourGlimpse']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'tour_glimpses', 'action'=>'view', $tourGlimpse['TourGlimpse']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var glimseid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'tour_glimpses','action'=>'is_active']); ?>",
          data: {"glimseid":glimseid,"checkedid":checkedid} 
        });
	});
	
</script>