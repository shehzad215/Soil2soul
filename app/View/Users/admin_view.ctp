<?php 
	// debug($user);exit;
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Users'), array('controller'=>'users', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'users', 'action'=>'view', $user['User']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="usersAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('User'); ?></div>
               <div class="actions">
		    	<?php
					$dropdownMenuLink = array();
					$dropdownMenu = array();

					if($isLoggedIn && $userRole['edit']) : 
						$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $user['User']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white'));
					endif;
					if($isLoggedIn && $userRole['delete']) : 
						$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $user['User']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white', 'data-toggle'=>'modal-manager'));
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
					<td class='hide id'><?php echo h($user['User']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Role'); ?></th>
					<td class=''>
						<?php echo $user['Role']['name']; ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Name'); ?></th>
					<td class=''><?php echo h($user['User']['name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Username'); ?></th>
					<td class=''><?php echo h($user['User']['username']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Email'); ?></th>
					<td class=''><?php echo h($user['User']['email']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Contact No'); ?></th>
					<td class=''><?php echo h($user['User']['contact_no']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $user['User']['active'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Image File'); ?></th>
					<td class=''><?php $imagePath = (!empty($user['User']['image_file'])) ? $this->webroot.'files/user/image_file/'.$user['User']['id'].'/'.$user['User']['image_file'] : $this->webroot.'img/passportsize_photo.jpg';

					 ?><img src='<?php echo $imagePath;?>' id="blah" class="imageFile"></td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Last Login'); ?></th>
					<td class=''><?php echo h($user['User']['last_login']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($user['User']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($user['User']['modified']); ?>&nbsp;</td>
	
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