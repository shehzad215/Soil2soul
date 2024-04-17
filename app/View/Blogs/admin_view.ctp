<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Blogs'), array('controller'=>'blogs', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'blogs', 'action'=>'view', $blog['Blog']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="blogsAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Blog'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $blog['Blog']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $blog['Blog']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
				/*$dropdownMenuLink[] = $this->Bs->link(__('Blogs'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
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
					<td class='hide id'><?php echo h($blog['Blog']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Blog Category'); ?></th>
					<td class=''><?php echo h($blog['BlogCategory']['name']); ?>&nbsp;</td>
				</tr>
				
				<tr>
					<th class=' col-md-2'><?php echo __('Title'); ?></th>
					<td class=''><?php echo h($blog['Blog']['title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Blog Tags'); ?></th>
					<td><?php echo $this->Bs->bsLabel(Hash::extract($blog, 'BlogTag.{n}.name')); ?></td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Slug'); ?></th>
					<td class=''><?php echo h($blog['Blog']['page_slug']); ?>&nbsp;</td>
				</tr>

				<tr>
					<th class=' col-md-2'><?php echo __('Image File'); ?></th>
					<td class=''>
						<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>'','class'=>'imageFile']); ?>

					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Image Banner'); ?></th>
					<td class=''>
						<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>'','class'=>'imageBanner']); ?>

					</td>
				</tr>	
				<tr>
					<th class=' col-md-2'><?php echo __('Notes'); ?></th>
					<td class=''><?php echo h($blog['Blog']['note']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Description'); ?></th>
					<td class=''><?php echo ($blog['Blog']['description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Url'); ?></th>
					<td class=''><?php echo h($blog['Blog']['page_url']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Title'); ?></th>
					<td class=''><?php echo h($blog['Blog']['page_title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Keyword'); ?></th>
					<td class=''><?php echo h($blog['Blog']['meta_keyword']); ?>&nbsp;</td>
				</tr>

				<tr>
					<th class=' col-md-2'><?php echo __('Meta Description'); ?></th>
					<td class=''><?php echo h($blog['Blog']['meta_description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Blog Date'); ?></th>
					<td class=''><?php echo $this->Bs->niceShortDate($blog['Blog']['blog_date']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><p>
                    <?php echo $this->Bs->getBooleanValue($blog['Blog']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                        </p></td>
                </tr> 
                <tr>
					<th class=' col-md-2'><?php echo __('Display Homepage'); ?></th>
					<td class=''><p>
                    <?php echo $this->Bs->getBooleanValue($blog['Blog']['is_display_homepage'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                        </p></td>
                </tr> 
                       
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($blog['Blog']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($blog['Blog']['modified']); ?>&nbsp;</td>
	
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