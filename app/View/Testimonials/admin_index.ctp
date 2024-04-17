<div id="testimonialsAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Testimonials'), array('controller'=>'testimonials', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'testimonials', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'name'=>__('Name'), 'email'=>__('Email'), 'mobile'=>__('Mobile'), 'country'=>__('Country'), 'msg'=>__('Msg'), 'image'=>__('Image'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'testimonialsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#testimonialsAjax'));?>
<div class="testimonials index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Testimonials'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Testimonial'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'testimonialsTable'); ?>
            </div>
            <div id="testimonialsTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('image', __('Image')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('our_journy_id', __('Journey')); ?></th>
  						<th class="col-md-4"><?php echo $this->Paginator->sort('msg', __('Message')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('is_display_homepage', __('Display Homepage')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php //debug($testimonials);die; ?>
                <?php foreach ($testimonials as $testimonial): ?>
				<tr class='<?php echo 'tr_'.$testimonial['Testimonial']['id']; ?>'>
					<td class='hide'><?php echo h($testimonial['Testimonial']['id']); ?>&nbsp;</td>
					<td class=''>
						<?php if($testimonial['Testimonial']['its_video_link'] == true){ ?>	
						
						<iframe width="120" height="70" src="<?php echo $testimonial['Testimonial']['video_link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

						<?php }else{
							echo $this->bs->image('Testimonial.image',$testimonial,['class'=>'imagefile']);
						}
						?>	
						&nbsp;
					</td>
					<td class=''><?php echo h($testimonial['Testimonial']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h((!empty($testimonial['OurJourny']['name'])) ? $testimonial['OurJourny']['name'] : '---'); ?>&nbsp;</td>
					<td class=''>
				    <?php
				        $msg = h($testimonial['Testimonial']['msg']);
				        	
				        echo substr($msg, 0,150).$this->Bs->link(__('...'), array('controller'=>'testimonials', 'action'=>'testimonial_message', $testimonial['Testimonial']['id']), array('data-toggle'=>'modal-manager') );	

				    ?>
					</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($testimonial['Testimonial']['active']); ?>" class ='activeClass'  data-value="<?php echo $testimonial['Testimonial']['id'];?>" <?php  if($testimonial['Testimonial']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($testimonial['Testimonial']['is_display_homepage']); ?>" class ='displayClass'  data-value="<?php echo $testimonial['Testimonial']['id'];?>" <?php  if($testimonial['Testimonial']['is_display_homepage'] == 1){ ?> checked <?php }?>>&nbsp;</td>
					
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'testimonials', 'action'=>'edit', $testimonial['Testimonial']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'testimonials', 'action'=>'delete', $testimonial['Testimonial']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'testimonials', 'action'=>'view', $testimonial['Testimonial']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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

<script type="text/javascript">
/*Active Fucntionality*/
	$('.activeClass').change(function(){
		var checkedid = $(this).is(':checked');
		var testimonialid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'testimonials','action'=>'is_active']); ?>",
          data: {"testimonialid":testimonialid,"checkedid":checkedid} 
        });
	});
/*Display Fucntionality*/
	$('.displayClass').change(function(){
		var checkedid = $(this).is(':checked');
		var testimonialid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'testimonials','action'=>'is_display_homepage']); ?>",
          data: {"testimonialid":testimonialid,"checkedid":checkedid} 
        });
	});
	

	
</script>	