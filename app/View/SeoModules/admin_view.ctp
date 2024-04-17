<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Seo Modules'), array('controller'=>'seo_modules', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'seo_modules', 'action'=>'view', $seoModule['SeoModule']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="seoModulesAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Seo Module'); ?></div>
           	<div class="actions">
	    		<?php
				$dropdownMenuLink = array();
				$dropdownMenu = array(
				);

				if($isLoggedIn && $userRole['edit']) : 
					$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $seoModule['SeoModule']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
				endif;
				if($isLoggedIn && $userRole['delete']) : 
					$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $seoModule['SeoModule']['id']), array('icon'=>'trash-o', 'class'=>'btn default', 'data-toggle'=>'modal-manager'));
				endif;
				echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
			?>
            </div>		
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-condensed">
                    <tbody>
        				<tr>
					<th class='hide id col-md-2'><?php echo __('Id'); ?></th>
					<td class='hide id'><?php echo h($seoModule['SeoModule']['id']); ?>&nbsp;</td>
				</tr>
					<tr>
					<th class=' col-md-2'><?php echo __('Page Name'); ?></th>
					<td class=''><?php echo h($seoModule['SeoModule']['page_name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Controller'); ?></th>
					<td class=''><?php echo h($seoModule['SeoModule']['controller']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Link'); ?></th>
					<td class=''><?php echo h($seoModule['SeoModule']['link']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Action'); ?></th>
					<td class=''><?php echo h($seoModule['SeoModule']['action']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Title'); ?></th>
					<td class=''><?php echo h($seoModule['SeoModule']['page_title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Keyword'); ?></th>
					<td class=''><?php echo h($seoModule['SeoModule']['meta_keyword']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Description'); ?></th>
					<td class=''><?php echo h($seoModule['SeoModule']['meta_description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Image'); ?></th>
					<td class=''><?php echo $this->Bs->image('SeoModule.meta_image', $seoModule, array('class'=>'imagefile')); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $seoModule['SeoModule']['active'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($seoModule['SeoModule']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($seoModule['SeoModule']['modified']); ?>&nbsp;</td>
	
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