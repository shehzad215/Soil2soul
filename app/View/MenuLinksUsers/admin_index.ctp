<div id="menuLinksUsersAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menu Links Users'), array('controller'=>'menu_links_users', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'menu_links_users', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'MenuLink.title'=>__('Menu Link'), 'User.name'=>__('User'), );
	echo $this->Bs->search($arraySearch, 'menuLinksUsersTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#menuLinksUsersAjax'));?>
<div class="menuLinksUsers index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box blue-hoki'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Menu Links Users'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				$this->Bs->menuLink(__('Menu Links'), array('controller'=>'menu_links', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
				$this->Bs->menuLink(__('Users'), array('controller'=>'users', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Menu Links User'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
            <div class="tools">
                <a href="" class="collapse" data-original-title="" title=""> </a>
                <a href="#portlet-config" data-toggle="modal" class="config" data-original-title="" title=""> </a>
                <a href="" class="reload" data-original-title="" title="" data-url="<?=$this->Html->url(array('controller'=>'menuLinksUsers', 'action'=>'index'))?>"> </a>
            </div>
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
                <?php echo $this->Bs->toggleColumns(array(__('Id'), __('Menu Link'), __('User'), ), 'menuLinksUsersTable'); ?>
            </div>
            <div id="menuLinksUsersTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('MenuLink.title', __('Menu Link')); ?></th>
                        <th class="hide"><?php echo $this->Paginator->sort('User.name', __('User')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody data-link="row" class="rowlink">
                <?php foreach ($menuLinksUsers as $menuLinksUser): ?>
				<tr class='<?php echo 'tr_'.$menuLinksUser['MenuLinksUser']['id']; ?>'>
					<td class='hide'><?php echo h($menuLinksUser['MenuLinksUser']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($menuLinksUser['MenuLink']['title']); ?>&nbsp;</td>
					<td class='hide'><?php echo h($menuLinksUser['User']['name']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'menu_links_users', 'action'=>'edit', $menuLinksUser['MenuLinksUser']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'menu_links_users', 'action'=>'delete', $menuLinksUser['MenuLinksUser']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'menu_links_users', 'action'=>'view', $menuLinksUser['MenuLinksUser']['id']), array('icon'=>'search', 'class'=>'btn btn-default linkrow', 'data-toggle'=>'modal-manager') );
						echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'ul'=>array('class'=>'pull-right')));
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