<div id="salutationsAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Salutations'), array('controller'=>'salutations', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'salutations', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'title'=>__('Title'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'salutationsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#salutationsAjax'));?>
<div class="salutations index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Salutations'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Salutation'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
                <?php echo $this->Bs->toggleColumns(array(), 'salutationsTable'); ?>
            </div>
            <div id="salutationsTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="col-md-4 col-lg-3"><?php echo $this->Paginator->sort('title', __('Title')); ?></th>
                        <th class="col-md-2 col-lg-3"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-3"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1 col-lg-3"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($salutations as $salutation): ?>
				<tr>
					<td class='hide'><?php echo h($salutation['Salutation']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($salutation['Salutation']['title']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($salutation['Salutation']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($salutation['Salutation']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'salutations', 'action'=>'edit', $salutation['Salutation']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'salutations', 'action'=>'delete', $salutation['Salutation']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'salutations', 'action'=>'view', $salutation['Salutation']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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