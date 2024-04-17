<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Roles'), array('controller'=>'roles', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'roles', 'action'=>'view', $role['Role']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="rolesAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Role'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $role['Role']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white', 'data-toggle'=>'modal-manager'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $role['Role']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white', 'data-toggle'=>'modal-manager'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>		
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <tbody>
        				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($role['Role']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Name'); ?></th>
					<td class=''><?php echo h($role['Role']['name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Description'); ?></th>
					<td class=''><?php echo h($role['Role']['description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Full View'); ?></th>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $role['Role']['full_view'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Full Add'); ?></th>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $role['Role']['full_add'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Full Edit'); ?></th>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $role['Role']['full_edit'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Full Delete'); ?></th>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $role['Role']['full_delete'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($role['Role']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($role['Role']['modified']); ?>&nbsp;</td>
	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
