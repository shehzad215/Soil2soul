<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menu Links Roles'), array('controller'=>'menu_links_roles', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'menu_links_roles', 'action'=>'view', $menuLinksRole['MenuLinksRole']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="menuLinksRolesAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box blue-hoki'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Menu Links Role'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $menuLinksRole['MenuLinksRole']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $menuLinksRole['MenuLinksRole']['id']), array('icon'=>'trash-o', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
			endif;
				$dropdownMenuLink[] = $this->Bs->link(__('Menu Links Roles'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                <a href="" class="reload" data-original-title="" title="" data-url="<?php echo $this->Html->url(array('controller'=>'menu_links_roles', 'action'=>'admin_view'))?>"> </a>
                <a href="javascript:void(0)" class="collapse fa fa-angle-down"></a>
                <!-- a href="javascript:void(0)" class="reload fa fa-refresh" data-url="<?php echo $this->Html->url(array('controller'=>'menu_links_roles', 'action'=>'admin_view'))?>"></a -->
                <!-- a href="javascript:void(0)" class="remove fa fa-remove"></a-->
            </div>			
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
        				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($menuLinksRole['MenuLinksRole']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Menu Link'); ?></th>
					<td class=''>
						<?php echo $this->Html->link($menuLinksRole['MenuLink']['title'], array('controller'=>'menu_links', 'action'=>'view', $menuLinksRole['MenuLink']['id'])); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Role'); ?></th>
					<td class=''>
						<?php echo $this->Html->link($menuLinksRole['Role']['name'], array('controller'=>'roles', 'action'=>'view', $menuLinksRole['Role']['id'])); ?>&nbsp;
					</td>
				</tr>
	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">

</div>
</div>