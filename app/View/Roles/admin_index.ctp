<div id="rolesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Roles'), array('controller'=>'roles', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'roles', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array( 'name'=>__('Name'));
	echo $this->Bs->search($arraySearch, 'rolesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#rolesAjax'));?>
<div class="roles index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Roles'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Role'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'rolesTable'); ?>
            </div>
            <div id="rolesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="col-md-3 col-lg-2"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('description', __('Description')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('full_view', __('Full View')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('full_add', __('Full Add')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('full_edit', __('Full Edit')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('full_delete', __('Full Delete')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($roles as $role): ?>
				<tr>
					<td class='hide'><?php echo h($role['Role']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($role['Role']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($role['Role']['description']); ?>&nbsp;</td>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $role['Role']['full_view'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $role['Role']['full_add'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $role['Role']['full_edit'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $role['Role']['full_delete'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
					<td class=''><?php echo $this->Bs->niceShort($role['Role']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($role['Role']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'roles', 'action'=>'edit', $role['Role']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'roles', 'action'=>'delete', $role['Role']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'roles', 'action'=>'view', $role['Role']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow') );
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