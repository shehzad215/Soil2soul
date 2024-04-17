<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menu Links Users'), array('controller'=>'menu_links_users', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'menu_links_users', 'action'=>'view', $menuLinksUser['MenuLinksUser']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="menuLinksUsersAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box blue-hoki'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Menu Links User'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				$this->Bs->menuLink(__('Menu Links'), array('controller'=>'menu_links', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Users'), array('controller'=>'users', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
			);

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $menuLinksUser['MenuLinksUser']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $menuLinksUser['MenuLinksUser']['id']), array('icon'=>'trash-o', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
			endif;
				$dropdownMenuLink[] = $this->Bs->link(__('Menu Links Users'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                <a href="" class="reload" data-original-title="" title="" data-url="<?php echo $this->Html->url(array('controller'=>'menu_links_users', 'action'=>'admin_view'))?>"> </a>
            </div>			
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <tbody>
        				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($menuLinksUser['MenuLinksUser']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Menu Link'); ?></th>
					<td class=''>
						<?php echo $this->Html->link($menuLinksUser['MenuLink']['title'], array('controller'=>'menu_links', 'action'=>'view', $menuLinksUser['MenuLink']['id'])); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('User'); ?></th>
					<td class=''>
						<?php echo $this->Html->link($menuLinksUser['User']['name'], array('controller'=>'users', 'action'=>'view', $menuLinksUser['User']['id'])); ?>&nbsp;
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