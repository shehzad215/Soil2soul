<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Teams'), array('controller'=>'our_teams', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'our_teams', 'action'=>'view', $ourTeam['OurTeam']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="ourTeamsAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Our Team'); ?></div>
            
            <div class="actions">
    		<?php
				$dropdownMenuLink = array();
				$dropdownMenu = array();

				if($isLoggedIn && $userRole['edit']) : 
					$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $ourTeam['OurTeam']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline'));
				endif;
				if($isLoggedIn && $userRole['delete']) : 
					$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $ourTeam['OurTeam']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
				endif;
					/*$dropdownMenuLink[] = $this->Bs->link(__('Our Teams'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
				echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
			?>
            </div>		
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-hover table-bordered table-condensed">
                    <tbody>
        				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($ourTeam['OurTeam']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Order'); ?></th>
					<td class=''><?php echo h($ourTeam['OurTeam']['order']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Name'); ?></th>
					<td class=''><?php echo h($ourTeam['OurTeam']['name']); ?>&nbsp;</td>
				</tr>
	    		<tr>
					<th class=' col-md-2'><?php echo __('Our Team Type'); ?></th>
					<td><?php echo $this->Bs->bsLabel(Hash::extract($ourTeam, 'OurTeamType.{n}.name')); ?></td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Designation'); ?></th>
					<td class=''><?php echo h($ourTeam['OurTeam']['designation']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Title'); ?></th>
					<td class=''><?php echo h($ourTeam['OurTeam']['page_title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Notes'); ?></th>
					<td class=''><?php echo $ourTeam['OurTeam']['description']; ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page URL'); ?></th>
					<td class=''><?php echo h($ourTeam['OurTeam']['page_url']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Image File'); ?></th>
					<td class=''><?php echo $this->Bs->image('OurTeam.image_file',$ourTeam,['class'=>'small_image','alt'=>'','class'=>'imageFile']); ?></td>
				</tr>	
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><p>
                    <?php echo $this->Bs->getBooleanValue($ourTeam['OurTeam']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                    </p></td>
                </tr>  
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($ourTeam['OurTeam']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($ourTeam['OurTeam']['modified']); ?>&nbsp;</td>
	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
