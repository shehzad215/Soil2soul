<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Salutations'), array('controller'=>'salutations', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'salutations', 'action'=>'view', $salutation['Salutation']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="salutationsAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Salutation'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $salutation['Salutation']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white', 'data-toggle'=>'modal-manager'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $salutation['Salutation']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white', 'data-toggle'=>'modal-manager'));
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
					<td class='hide id'><?php echo h($salutation['Salutation']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Title'); ?></th>
					<td class=''><?php echo h($salutation['Salutation']['title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($salutation['Salutation']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($salutation['Salutation']['modified']); ?>&nbsp;</td>
	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">
	
	<div id="relatedUsers" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'users', 'action'=>'index', 'salutation_id'=>$salutation['Salutation']['id']));?>">
	
	</div>

</div>
</div>