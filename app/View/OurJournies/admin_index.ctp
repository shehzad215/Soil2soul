<?php if(!empty($this->request->params['named'])){ ?>
<style>
#collapseOne{display: block;}
</style>
<?php } ?>
<div id="ourJourniesAjax">
<?php 
	$firstUrl = (!empty($package_id)) ? $this->Html->link(__('Packages '), array('controller'=>'packages', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')) : $this->Html->link(__('Our Journies'), array('controller'=>'our_journies', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title'));

	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $firstUrl, array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'our_journies', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'Currency.title'=>__('Currency'), 'name'=>__('Name'), 'video_link'=>__('Video Link'), 'description'=>__('Description'), 'no_of_nights'=>__('No Of Nights'), 'total_seat'=>__('Total Seat'), 'cost'=>__('Cost'), 'map'=>__('Map'), 'page_title'=>__('Page Title'), 'page_slug'=>__('Page Slug'), 'meta_description'=>__('Meta Description'), 'meta_keywords'=>__('Meta Keywords'), 'page_url'=>__('Page Url'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'ourJourniesTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#ourJourniesAjax'));?>
<div class="ourJournies index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Our Journies'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Our Journey'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>
        </div>      
        <div class="portlet-body">
            <div class="table-toolbar row">
               <div class="col-sm-12">
                	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                		<div class="panel panel-info ">
                			<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
	                            <h4 class="panel-title">
	                                 <?php if(!empty($this->request->params['named'])){ ?>
	                                   <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><strong><i class="more-less glyphicon glyphicon-minus"></i></strong></a>
	                                <?php }else{?>
	                                  <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><strong><i class="more-less glyphicon glyphicon-plus"></i></strong></a>
	                                  <?php } ?>
	                            </h4>
	                        </div>
                    <div id="collapseOne" class="panel-collapse collapse">
                    	<div class="panel-body">
                    		<?php 
                 	echo $this->Bs->create('OurJourny', array('class'=>'form-vertical','id'=>'preEnquirySearchForm'));
                 		echo $this->Html->div('tab-box',
                    		  $this->Html->div('row',
                    		  		$this->Bs->input('package_id', array('options' =>$packages,'empty'=>'All','required'=>false,'col'=>'3','value'=>$packageValue)).

                    		  		$this->Bs->input('id', array('options' =>$journies,'empty'=>'All','required'=>false,'col'=>'3','value'=>$journeyValue,'label'=>'Name')).


                    		  		//$this->Bs->input('contact_no', array('options' =>$contactNoArr,'empty'=>'All','required'=>false,'col'=>'2','value'=>$contactValue)).
                    		  		
                    		  		$this->Bs->input('active', array('options' =>['true'=>'True','false'=>'False'],'empty'=>'All','required'=>false,'col'=>'2','value'=>$activeValue)).

                    		  		$this->html->div('col-sm-2 ',
                              $this->Form->button(__('Reset'), array('class'=>'reset btn-sm btn btn-danger ','type'=>'reset','style'=>['margin-top:28px;']))
                           )
                     		  )
                     		);
                  	echo $this->Form->end();
                  ?>
                    	</div>
                    </div>
                		</div>
                	</div>
                </div>
            </div>
            <div id="ourJourniesTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                    <th class="hide ids"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                    <th class="col-sm-1"><?php echo 'Order'; ?></th>
                    <th class=""><?php echo 'Trail No' ?></th>
                    <th class=""><?php echo 'Image'; ?></th>
                    <th class=""><?php echo 'Package Name'; ?></th>
                    <th class=""><?php echo 'Name'; ?></th>
                    <th class=""><?php echo 'No Of Days'; ?></th>
                    <!-- <th class=""><?php //echo $this->Paginator->sort('cost', __('Cost')); ?></th> -->
                    <th class=""><?php echo 'Active'; ?></th>  
                    <th class="actions"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ourJournies as $ourJourny): ?>
				<tr class='<?php echo 'tr_'.$ourJourny['OurJourny']['id']; ?>'>
					<td class='hide'><?php echo h($ourJourny['OurJourny']['id']); ?>&nbsp;</td>


					<td class=''><?php echo $this->Bs->input('order',['type'=>'text','class'=>'JourneyOrder numeric form-control','id'=>$ourJourny['OurJourny']['id'],'label'=>false,'value'=>$ourJourny['OurJourny']['order']]) ?>
						<span id="verror" style="color:red"></span>
					</td>

					<td><?php echo 'Trail '.sprintf("%02d", $ourJourny['OurJourny']['trail']); ?>&nbsp;</td>
					<td class=''>
						<?php //echo h($blog['Blog']['image_file']); ?>&nbsp;
						<?php echo $this->Bs->image('OurJourny.journey_banner',$ourJourny,['alt'=>'','class'=>'imageFile']); ?>

					</td>
					<td class=''><?php echo h($ourJourny['Package']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourJourny['OurJourny']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourJourny['OurJourny']['no_of_nights']); ?>&nbsp;</td>
					<!-- <td class=''><?php //echo h($ourJourny['OurJourny']['cost']); ?>&nbsp;</td> -->

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($ourJourny['OurJourny']['active']); ?>" class ='activeClass'  data-value="<?php echo $ourJourny['OurJourny']['id'];?>" <?php  if($ourJourny['OurJourny']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>
          
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'our_journies', 'action'=>'edit', $ourJourny['OurJourny']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'our_journies', 'action'=>'delete', $ourJourny['OurJourny']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						/*Scholar Details*/
						if(!empty($ourJourny['OurTeam'])){
							$dropdownMenu[] = $this->Bs->menuLink(__('Scholar Details'), array('controller'=>'our_scholar_details', 'action'=>'index', 'OurScholarDetail.our_journy_id'=>$ourJourny['OurJourny']['id']), array('icon'=>'list'));
						}

						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'our_journies', 'action'=>'view', $ourJourny['OurJourny']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow') );
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
		var journyid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'our_journies','action'=>'is_active']); ?>",
          data: {"journyid":journyid,"checkedid":checkedid} 
        });
	});

/*Display Homepage*/
$('.DisplayHClass').change(function(){
	var checkedid = $(this).is(':checked');
	var journyid = $(this).attr('data-value');
	 $.ajax({
      type:"POST",
      url: "<?php echo $this->Html->url(['controller'=>'our_journies','action'=>'is_dispaly_home']); ?>",
      data: {"journyid":journyid,"checkedid":checkedid} 
    });
});	



$('.JourneyOrder').keyup(function() {
  var order = $(this).val();
  var journeyid = $(this).attr('id');
  var elem = $(this);

  $.ajax({
    type: "POST",
    url: "<?php echo $this->Html->url(['controller'=>'our_journies','action'=>'Journeyordervalue']); ?>",
    data: {"order": order ,"journeyid":journeyid },
    dataType: "json",
    success: function (data) {
    	elem.closest('td').find("#verror").text(data.statusText);
    }
});
});

    var baseUrl = '<?php echo Router::url('/', true); ?>';
     baseUrl = baseUrl+'admin';
    $('.reset').click(function() {
        var url = baseUrl+"/"+"our_journies/"+"index";
        window.location.href = url;
     });

    function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);

    $('[id*="preEnquirySearchForm"] :input').change(function(e) {
      e.preventDefault();
      var baseUrl = '<?php echo $this->Html->url('/admin/our_journies/index');?>';
      var label = $('label[for="'+$(this).attr('id')+'"]').text();
      var url = core.getNamedUrlFromForm(baseUrl, '[id*="preEnquirySearchForm"] :input');
      var sortVal = $('.filter').val();
      if(empty(sortVal)){
        window.location.href = url;
      }else{
        filterParams(sortVal, url);
      } 
    });
	
</script>
