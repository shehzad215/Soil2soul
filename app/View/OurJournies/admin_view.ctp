<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title') ), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('View'), array('controller'=>'our_journies', 'action'=>'view', $ourJourny['OurJourny']['id'])), array('class'=>'active', 'typeof'=>'v:Breadcrumb' ) );
	echo $this->end();
?>
<div class="ourJourniesAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Our Journey'); ?></div>
            
                <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['edit']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('action'=>'edit', $ourJourny['OurJourny']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-sm white btn-outline'));
			endif;
			if($isLoggedIn && $userRole['delete']) : 
				$dropdownMenuLink[] = $this->Bs->link(__('Delete'), array('action'=>'delete', $ourJourny['OurJourny']['id']), array('icon'=>'trash-o', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));
			endif;
				/*$dropdownMenuLink[] = $this->Bs->link(__('Our Journies'), array('action'=>'index'), array('icon'=>'list', 'class'=>'btn btn-sm white btn-outline', 'data-toggle'=>'modal-manager'));*/
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
					<td class='hide id'><?php echo h($ourJourny['OurJourny']['id']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Currency'); ?></th>
					<td class=''>
						<?php echo h($ourJourny['Currency']['title']); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Package'); ?></th>
					<td class=''>
						<?php echo h($ourJourny['Package']['name']); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Order'); ?></th>
					<td class=''>
						<?php echo h($ourJourny['OurJourny']['order']); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Trail No.'); ?></th>
					<td class=''>
						<?php echo h($ourJourny['OurJourny']['trail']); ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Name'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['name']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Video Link 1'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['video_link_1']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Video Link 2'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['video_link_2']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Description'); ?></th>
					<td class=''><?php echo strip_tags($ourJourny['OurJourny']['description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Overview'); ?></th>
					<td class=''><?php echo strip_tags($ourJourny['OurJourny']['overview']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('No Of Days'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['no_of_nights']); ?>&nbsp;</td>
				</tr>
				<!-- <tr>
					<th class=' col-md-2'><?php //echo __('Total Seat'); ?></th>
					<td class=''><?php //echo h($ourJourny['OurJourny']['total_seat']); ?>&nbsp;</td>
				</tr> -->
<!-- 				<tr>
					<th class=' col-md-2'><?php //echo __('Cost'); ?></th>
					<td class=''><?php //echo h($ourJourny['OurJourny']['cost']); ?>&nbsp;</td>
				</tr> -->
<!-- 				<tr>
					<th class=' col-md-2'><?php //echo __('Map'); ?></th>
					<td class=''><?php //echo h($ourJourny['OurJourny']['map']); ?>&nbsp;</td>
				</tr> -->
				<tr>
					<th class=' col-md-2'><?php echo __('Page Title'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['page_title']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Slug'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['page_slug']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Payment Terms'); ?></th>
					<td class=''><?php echo strip_tags($ourJourny['OurJourny']['payment_terms']) ?>&nbsp;
					</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Cancellation Policy'); ?></th>
					<td class=''><?php echo strip_tags($ourJourny['OurJourny']['cancellation_policy']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Description'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['meta_description']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Meta Keywords'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['meta_keywords']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Page Url'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['page_url']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Journey banner'); ?></th>
					<td class=''>
					<?php echo $this->bs->image('OurJourny.journey_banner',$ourJourny,['class'=>'imagefile']); ?>	
						&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Broucher File'); ?></th>
					<td class=''><?php echo h($ourJourny['OurJourny']['broucher_file']); ?>&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Journey Map'); ?></th>
					<td class=''>
					<?php echo $this->bs->image('OurJourny.upload_map',$ourJourny,['class'=>'imagefile']); ?>	
						&nbsp;</td>
				</tr>
				<tr>
					<th class=' col-md-2'><?php echo __('Active'); ?></th>
					<td class=''><p>
                       <?php echo $this->Bs->getBooleanValue($ourJourny['OurJourny']['active'],$this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')),$this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))); ?>&nbsp;
                    </p></td>
				<tr>
					<th class=' col-md-2'><?php echo __('Created'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($ourJourny['OurJourny']['created']); ?>&nbsp;</td>
				<tr>
					<th class=' col-md-2'><?php echo __('Modified'); ?></th>
					<td class=''><?php echo $this->Bs->niceShort($ourJourny['OurJourny']['modified']); ?>&nbsp;</td>
	
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col-md-12">

	<div id="relatedJourneyImages" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'journey_images', 'action'=>'index', $ourJourny['OurJourny']['id']));?>">
	</div>

	<div id="relatedTourGlimpses" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'tour_glimpses', 'action'=>'index', 'our_journy_id'=>$ourJourny['OurJourny']['id']));?>">
	</div>


	<div id="relatedOurJourneyExlusions" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'our_journey_exlusions', 'action'=>'index', 'our_journy_id'=>$ourJourny['OurJourny']['id']));?>">
	</div>
	
	<div id="relatedOurJourneyInclusions" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'our_journey_inclusions', 'action'=>'index', 'our_journy_id'=>$ourJourny['OurJourny']['id']));?>">
	
	</div>
	
	<div id="relatedOurJourneyIteneries" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'our_journey_iteneries', 'action'=>'index', 'our_journy_id'=>$ourJourny['OurJourny']['id']));?>">
	
	</div>
	
	<div id="relatedTourCost" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'tour_costs', 'action'=>'index', 'our_journy_id'=>$ourJourny['OurJourny']['id']));?>">
	
	</div>



	<div id="relatedOurJourneyHotels" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'our_journey_hotels', 'action'=>'index', 'our_journy_id'=>$ourJourny['OurJourny']['id']));?>">
	
	</div>

		<div id="relatedTestimonials" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php echo $this->Html->url(array('controller'=>'testimonials', 'action'=>'index', 'our_journy_id'=>$ourJourny['OurJourny']['id']));?>">
	
	</div>
	
<!-- 	<div id="relatedFaqs" class="ajaxLoad" data-toggle="ajax-load" data-url="<?php //echo $this->Html->url(array('controller'=>'faqs', 'action'=>'index', 'our_journy_id'=>$ourJourny['OurJourny']['id']));?>"> -->


	
	</div>
</div>
</div>