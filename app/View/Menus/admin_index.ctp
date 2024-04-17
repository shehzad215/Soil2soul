<div id="menusAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menus'), array('controller'=>'menus', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'menus', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('name'=>__('Name'), 'link'=>__('Link'));
	echo $this->Bs->search($arraySearch, 'menusTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#menusAjax'));?>
<div class="menus index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Menus'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = [];
			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Menu'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm btn-outline white', 'data-toggle'=>'modal-manager'));
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
                <?php //echo $this->Bs->toggleColumns(array(__('Id'), __('Name'), __('Link'), __('Created'), __('Modified'), ), 'menusTable'); ?>
            </div>
            <div id="menusTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <?php echo $this->Bs->paginationRow(); ?>
                <?php echo $this->Js->writeBuffer(); ?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="col-md-3 col-lg-2"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('link', __('Link')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($menus as $menu): ?>
				<tr>
					<td class='hide'><?php echo h($menu['Menu']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($menu['Menu']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($menu['Menu']['link']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($menu['Menu']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($menu['Menu']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
                        $dropdownMenu[] = $this->Bs->menuLink(__('View'), array('controller'=>'menus', 'action'=>'view', $menu['Menu']['id']), array('icon'=>'search', 'data-toggle'=>'modal-manager'));
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								
                                $dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('controller'=>'menus', 'action'=>'edit', $menu['Menu']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'menus', 'action'=>'delete', $menu['Menu']['id']), array('icon'=>'trash-o','data-toggle'=>'modal-manager') );
							endif;
						endif;

						echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success','ul'=>array('class'=>'pull-right')));
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