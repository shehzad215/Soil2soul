<div id="ourScholarDetailsAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journey'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'OurJourny.name'=>__('Our Journy'), 'OurTeam.name'=>__('Our Team'), 'description'=>__('Description'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'ourScholarDetailsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#ourScholarDetailsAjax'));?>
<div class="ourScholarDetails index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Our Scholar Details'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Our Scholar Detail'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'ourScholarDetailsTable'); ?>
            </div>
            <div id="ourScholarDetailsTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('OurJourny.name', __('Our Journy')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('OurTeam.name', __('Our Team')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ourScholarDetails as $ourScholarDetail): ?>
				<tr class='<?php echo 'tr_'.$ourScholarDetail['OurScholarDetail']['id']; ?>'>
					<td class='hide'><?php echo h($ourScholarDetail['OurScholarDetail']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourScholarDetail['OurJourny']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourScholarDetail['OurTeam']['name']); ?>&nbsp;</td>
					<td class=''><p>
                                   <?php echo $this->Bs->getBooleanValue($ourScholarDetail['OurScholarDetail']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                                   </p></td>
					<td class=''><?php echo $this->Bs->niceShort($ourScholarDetail['OurScholarDetail']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($ourScholarDetail['OurScholarDetail']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'our_scholar_details', 'action'=>'edit', $ourScholarDetail['OurScholarDetail']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'our_scholar_details', 'action'=>'delete', $ourScholarDetail['OurScholarDetail']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'our_scholar_details', 'action'=>'view', $ourScholarDetail['OurScholarDetail']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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