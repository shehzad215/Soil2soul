<div id="seoModulesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Seo Modules'), array('controller'=>'seo_modules', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'seo_modules', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'controller'=>__('Controller'), 'link'=>__('Link'), 'meta_title'=>__('Meta Title'), 'meta_keyword'=>__('Meta Keyword'), 'meta_description'=>__('Meta Description'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'seoModulesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#seoModulesAjax'));?>
<div class="seoModules index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Seo Modules'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Seo Module'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm btn-info btn-outline white'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'white', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
                <?php echo $this->Bs->toggleColumns(array(), 'seoModulesTable'); ?>
            </div>
            <div id="seoModulesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('controller', __('Page Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('page_title', __('Page Title')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('link', __('Url')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($seoModules as $seoModule): ?>
				<tr class=''>
					<td class='hide'><?php echo h($seoModule['SeoModule']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($seoModule['SeoModule']['page_name']); ?>&nbsp;</td>
					<td class=''><?php echo h($seoModule['SeoModule']['page_title']); ?>&nbsp;</td>
					<td class=''><?php echo h($seoModule['SeoModule']['page_url']); ?>&nbsp;</td>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $seoModule['SeoModule']['active'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
					<td class=''><?php echo $this->Bs->niceShort($seoModule['SeoModule']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($seoModule['SeoModule']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'seo_modules', 'action'=>'edit', $seoModule['SeoModule']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'seo_modules', 'action'=>'delete', $seoModule['SeoModule']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'seo_modules', 'action'=>'view', $seoModule['SeoModule']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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