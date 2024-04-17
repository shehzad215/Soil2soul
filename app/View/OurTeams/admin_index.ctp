<?php if(!empty($this->request->params['named'])){ ?>
<style>
#collapseOne{display: block;}
</style>
<?php } ?>
<div id="ourTeamsAjax">
<?php 
	// debug($ourTeams);exit;
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Our Teams'), array('controller'=>'our_teams', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'our_teams', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'name'=>__('Name'), 'description'=>__('Description'), 'image_file'=>__('Image File'), 'page_slug'=>__('Page Slug'), 'page_title'=>__('Page Title'), 'meta_description'=>__('Meta Description'), 'meta_keywords'=>__('Meta Keywords'), 'page_url'=>__('Page Url'), 'active'=>__('Active'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'ourTeamsTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#ourTeamsAjax'));?>
<div class="ourTeams index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Our Teams').' '.'(Our Scholars)'; ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array();

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Our Team'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
				$dropdownMenu[] = $this->Bs->menuLink(__('Our Team Types'), array('controller'=>'our_team_types', 'action'=>'index'), array('icon'=>'list'));
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
                 	echo $this->Bs->create('OurTeam', array('class'=>'form-vertical','id'=>'
                 																																		preEnquirySearchForm'));
                 		echo $this->Html->div('tab-box',
                    		  $this->Html->div('row',
                    		  		$this->Bs->input('OurTeamType.id', array('options' =>$ourTeamtypes,'empty'=>'All','required'=>false,'label'=>'OurTeam Type','col'=>'3','value'=>$teamTypeId)).

                    		  		$this->Bs->input('id', array('options' =>$ourteams,'empty'=>'All','required'=>false,'col'=>'3','value'=>$teamsValue,'label'=>'Name')).


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
            <div id="ourTeamsTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                    <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class="text-center col-sm-1"><?php echo 'Image File'; ?></th>
                        <th class=""><?php echo 'Type'; ?></th>
                        <th class=""><?php echo $this->Paginator->sort('order', __('Order')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                       
                        <th class="text-center"><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <!-- <th class="text-center"><?php //echo $this->Paginator->sort('its_scholar', __('Its Scholar')); ?></th> -->
                        <th class=""><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class=""><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($ourTeams as $ourTeam): ?>
				<tr <?php echo 'tr_'.$ourTeam['OurTeam']['id']; ?>>
					<td class='hide'><?php echo h($ourTeam['OurTeam']['id']); ?>&nbsp;</td>
					<td class='text-center'><?php echo $this->Bs->image('OurTeam.image_file',$ourTeam,['class'=>'small_image','alt'=>'','class'=>'imageicon']); ?></td>
					<td><?php echo $this->Bs->bsLabel(Hash::extract($ourTeam, 'OurTeamType.{n}.name')); ?></td>
					<td class=''><?php echo h($ourTeam['OurTeam']['order']); ?>&nbsp;</td>
					<td class=''><?php echo h($ourTeam['OurTeam']['name']); ?>&nbsp;</td>

					<td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($ourTeam['OurTeam']['active']); ?>" class ='activeClass'  data-value="<?php echo $ourTeam['OurTeam']['id'];?>" <?php  if($ourTeam['OurTeam']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

					

					<td class=''><?php echo $this->Bs->niceShort($ourTeam['OurTeam']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($ourTeam['OurTeam']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'our_teams', 'action'=>'edit', $ourTeam['OurTeam']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'our_teams', 'action'=>'delete', $ourTeam['OurTeam']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'our_teams', 'action'=>'view', $ourTeam['OurTeam']['id']), array('icon'=>'search', 'class'=>'btn btn-warning linkrow', 'data-toggle'=>'modal-manager') );
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
		var ourteamid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'our_teams','action'=>'is_active']); ?>",
          data: {"ourteamid":ourteamid,"checkedid":checkedid} 
        });
	});
/*Scholar Fucntionality*/
	$('.scholarClass').change(function(){
		var checkedid = $(this).is(':checked');
		var ourteamid = $(this).attr('data-value');
		 $.ajax({
          type:"POST",
          url: "<?php echo $this->Html->url(['controller'=>'our_teams','action'=>'its_scholar']); ?>",
          data: {"ourteamid":ourteamid,"checkedid":checkedid} 
        });
	});	

	    var baseUrl = '<?php echo Router::url('/', true); ?>';
     baseUrl = baseUrl+'admin';
    $('.reset').click(function() {
        var url = baseUrl+"/"+"our_teams/"+"index";
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
      var baseUrl = '<?php echo $this->Html->url('/admin/our_teams/index');?>';
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