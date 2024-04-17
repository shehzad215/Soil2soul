<div id="currenciesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Currencies'), array('controller'=>'currencies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'currencies', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'name'=>__('Name'), 'iso_code'=>__('Iso Code'), 'iso_code_num'=>__('Iso Code Num'), 'sign'=>__('Sign'), 'blank'=>__('Blank'), 'format'=>__('Format'), 'decimals'=>__('Decimals'), 'conversion_rate'=>__('Conversion Rate'), 'display_on_frontend'=>__('Display On Frontend'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'currenciesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#currenciesAjax'));?>
<div class="currencies index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Currencies'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Currency'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
        </div>

        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
                <?php echo $this->Bs->toggleColumns(array(), 'currenciesTable'); ?>
            </div>
            <div id="currenciesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="col-md-3 col-lg-2"><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('iso_code', __('Iso Code')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('iso_code_num', __('Iso Code Num')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('sign', __('Sign')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('conversion_rate', __('Conversion Rate')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('display_on_frontend', __('Display On Frontend')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($currencies as $currency): ?>
				<tr>
					<td class='hide'><?php echo h($currency['Currency']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($currency['Currency']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($currency['Currency']['iso_code']); ?>&nbsp;</td>
					<td class=''><?php echo h($currency['Currency']['iso_code_num']); ?>&nbsp;</td>
					<td class=''><?php echo h($currency['Currency']['sign']); ?>&nbsp;</td>
					<td class=''><?php echo h($currency['Currency']['conversion_rate']); ?>&nbsp;</td>
					<td class=''><p>
                    <?php echo $this->Bs->getBooleanValue($currency['Currency']['display_on_frontend'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                    </p></td>
					<td class=''><p>
                    <?php echo $this->Bs->getBooleanValue($currency['Currency']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                    </p></td>
					<td class=''><?php echo $this->Bs->niceShort($currency['Currency']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($currency['Currency']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'currencies', 'action'=>'edit', $currency['Currency']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'currencies', 'action'=>'delete', $currency['Currency']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'currencies', 'action'=>'view', $currency['Currency']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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