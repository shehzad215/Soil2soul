<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menu Links'), array('controller'=>'menu_links', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'menu_links', 'action'=>'view', $menuLink['MenuLink']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="menuLinksAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Menu Link'); ?></div>
            
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = [];
			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $menuLink['MenuLink']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn white btn-outline'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $menuLink['MenuLink']['id']), array('icon'=>'trash-o', 'class'=>'btn white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;				
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>            		
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <tbody>
				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($menuLink['MenuLink']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class='col-md-2'><?php echo __('Menu'); ?></th>
					<td class='' colspan="3">
						<?php echo $menuLink['Menu']['name']; ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class='col-md-2'><?php echo __('Parent Menu Link'); ?></th>
					<td class='' colspan="3">
						<?php echo $this->Html->link($menuLink['ParentMenuLink']['title'], array('controller'=>'menu_links', 'action'=>'view', $menuLink['ParentMenuLink']['id'])); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Icon'); ?></th>
					<td class=''><?php echo $this->Html->tag('span', $this->Bs->icon($menuLink['MenuLink']['icon']), array('data-toggle'=>'tooltip', 'title'=>$menuLink['MenuLink']['icon'])); ?></td>
					
					<th class=' col-md-2'><?php echo __('Title'); ?></th>
					<td class=''><?php echo h($menuLink['MenuLink']['title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class='col-md-2'><?php echo __('Link'); ?></th>
					<td class='rowlink-skip'>
                    <?php 
                        echo $this->Bs->link(
                            __('Link'), $this->Bs->getUrl($menuLink['MenuLink']['link']), 
                            array('icon'=>'link', 'data-toggle'=>'popover', 'data-content'=>h($menuLink['MenuLink']['link']), 'data-trigger'=>'hover')
                        );
                    ?>&nbsp;
                    </td>
					
					<th class=' col-md-2'><?php echo __('Attributes'); ?></th>
					<td class=''><?php echo h($menuLink['MenuLink']['attributes']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class='col-md-2'><?php echo __('Roles'); ?></th>
					<td class='' colspan="3"><?php echo $this->Bs->bsBadge(Hash::extract($menuLink, 'Role.{n}.name')); ?>&nbsp;</td>
					
				</tr>
				<tr>
					<th class='col-md-2'><?php echo __('Users'); ?></th>
					<td class='' colspan="3"><?php echo $this->Bs->bsBadge(Hash::extract($menuLink, 'User.{n}.name')); ?>&nbsp;</td>
					
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><?php echo $this->Bs->getBooleanValue($menuLink['MenuLink']['active'], $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($menuLink['MenuLink']['created']); ?>&nbsp;</td>
					
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($menuLink['MenuLink']['modified']); ?>&nbsp;</td>
				</tr>
			</tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<!-- <div class="row">
<div class="col-md-12">
	
	<div id="relatedMenuLinks" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php //echo $this->Html->url(array('controller'=>'menu_links', 'action'=>'index', 'parent_id'=>$menuLink['MenuLink']['id']));?>">
	
	</div>
</div>
</div> -->