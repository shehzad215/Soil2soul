<div id="contactEnqueriesAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Contact Enquiries'), array('controller'=>'contact_enqueries', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'contact_enqueries', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'first_name'=>__('First Name'), 'last_name'=>__('Last Name'), 'contact_no'=>__('Contact No'), 'email'=>__('Email'), 'msg'=>__('Msg'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'contactEnqueriesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#contactEnqueriesAjax'));?>
<div class="contactEnqueries index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Contact Enquiries'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions"></div>
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php echo $this->fetch('indexSearch'); ?>
            </div>
            <div id="contactEnqueriesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('first_name', __('Name')); ?></th>
                       
                        <th class=""><?php echo $this->Paginator->sort('contact_no', __('Contact No')); ?></th>
                        <th class="col-md-3 col-lg-2"><?php echo $this->Paginator->sort('email', __('Email')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class="col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($contactEnqueries as $contactEnquery): ?>
				<tr>
					<td class='hide'><?php echo h($contactEnquery['ContactEnquery']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($contactEnquery['ContactEnquery']['first_name'].' '.$contactEnquery['ContactEnquery']['last_name']); ?>&nbsp;</td>
					
					<td class=''><?php echo h($contactEnquery['ContactEnquery']['contact_no']); ?>&nbsp;</td>
					<td class=''><?php echo h($contactEnquery['ContactEnquery']['email']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($contactEnquery['ContactEnquery']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($contactEnquery['ContactEnquery']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'contact_enqueries', 'action'=>'view', $contactEnquery['ContactEnquery']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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