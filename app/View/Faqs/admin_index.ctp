<div id="faqsAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('FAQs'), array('controller'=>'faqs', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'faqs', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'OurJourny.name'=>__('Our Journy'), 'question'=>__('Question'), 'answer'=>__('Answer'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'faqsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#faqsAjax'));?>
<div class="faqs index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('FAQs'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				/*$this->Bs->menuLink(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),*/
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New FAQs'), array('action' => 'general_add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
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
                <?php echo $this->Bs->toggleColumns(array(), 'faqsTable'); ?>
            </div>
            <div id="faqsTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo 'Faq Type'; ?></th>
                        <th class=""><?php echo 'Question'; ?></th>
                        <th class=""><?php echo 'Answer'; ?></th>
                        <th class=""><?php echo 'Active'; ?></th>
                        <th class=""><?php echo 'Created'; ?></th>
                        <th class=""><?php echo 'Modified'; ?></th>
                        <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                	<?php //debug($faqs);die; ?>
                <?php foreach ($faqs as $faq): ?>
				<tr class='<?php echo 'tr_'.$faq['Faq']['id']; ?>'>
					<td class='hide'><?php echo h($faq['Faq']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($faq['FaqType']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($faq['Faq']['question']); ?>&nbsp;</td>
					<td class=''><?php echo h($faq['Faq']['answer']); ?>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($faq['Faq']['active']); ?>" class ='activeClass'  data-value="<?php echo $faq['Faq']['id'];?>" <?php  if($faq['Faq']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					<td class=''><?php echo $this->Bs->niceShort($faq['Faq']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($faq['Faq']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'faqs', 'action'=>'edit', $faq['Faq']['id']), array('icon'=>'pencil-square-o', 'data-toggle'=>'modal-manager'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'faqs', 'action'=>'delete', $faq['Faq']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'faqs', 'action'=>'view', $faq['Faq']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var faqid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'faqs','action'=>'is_active']); ?>",
          data: {"faqid":faqid,"checkedid":checkedid} 
        });
	});
	
</script>