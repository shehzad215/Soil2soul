<?php if(!empty($this->request->params['named'])){ ?>
<style>
#collapseOne{display: block;}
</style>
<?php } ?>
<div id="usersAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Staff'), array('controller'=>'users', 'action'=>'staff'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'users', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('Role.name'=>__('Role'), 'Designation.name'=>__('Designation'), 'username'=>__('Username'),'name'=>__('Name'), 'email'=>__('Email'), 'contact_no'=>__('Contact No'), 'active'=>__('Active'));
	echo $this->Bs->search($arraySearch, 'usersTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#usersAjax'));?>
<div class="users index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box red'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Staff'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = array(
				$this->Bs->menuLink(__('Domain'), array('controller'=>'domins', 'action'=>'index'), array('icon'=>'list', 'data-toggle'=>'modal-manager')),
			);

			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New User'), array('action' => 'add','role_id:2'), array('icon'=>'plus', 'class'=>'btn btn-sm white'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
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
                                    	echo $this->Bs->create('User', array('class'=>'form-vertical','id'=>'preEnquirySearchForm'));
                                    		echo $this->Html->div('tab-box',
                                       		  $this->Html->div('row',
                                       		  		$this->Bs->input('role_id', array('options' =>$roles,'empty'=>'All','required'=>false,'col'=>'2','value'=>$roleValue)).

                                       		  		$this->Bs->input('designation_id', array('options' =>$designations,'empty'=>'All','required'=>false,'col'=>'2','value'=>$designationValue)).

                                       		  		$this->Bs->input('department_id', array('options' =>$departments,'empty'=>'All','required'=>false,'col'=>'2','value'=>$departmentValue)).

                                       		  		$this->Bs->input('sub_department_id', array('options' =>$subDepartments,'empty'=>'All','required'=>false,'col'=>'2','value'=>$subDepartmentValue)).

                                       		  		
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
            <div id="usersTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                        <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('Role.name', __('Role')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('Designation.name', __('Designation')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('username', __('Username')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('name', __('Name')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('Department.name', __('Department')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('SubDepartment.name', __('SubDepartment')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('active', __('Active')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('CreatedBy.name', __('Created By')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                        <th class=""><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                        <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $user): ?>
				<tr>
					<td class='hide'><?php echo h($user['User']['id']); ?>&nbsp;</td>
					<td class=''><?php echo h($user['Role']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($user['Designation']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($user['User']['username']); ?>&nbsp;</td>
					<td class=''><?php echo h($user['User']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($user['Department']['name']); ?>&nbsp;</td>
					<td class=''><?php echo h($user['SubDepartment']['name']); ?>&nbsp;</td>
					<td class=''><?php  
				         echo $this->Bs->getBooleanValue(
				            $user['User']['active'], 
				            $this->Html->tag('span', $this->Bs->icon('check'), array('class'=>'text-success')), 
				            $this->Html->tag('span', $this->Bs->icon('times'), array('class'=>'text-danger'))
				         );
				        ?>&nbsp;
				    </td>
					<td class=''><?php echo h($user['CreatedBy']['name']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($user['User']['created']); ?>&nbsp;</td>
					<td class=''><?php echo $this->Bs->niceShort($user['User']['modified']); ?>&nbsp;</td>
					<td class="actions">
					<?php
						$dropdownMenuLink = array();
						$dropdownMenu = array();
						if($isLoggedIn) : 
							if($userRole['edit']) : 
								$dropdownMenu[] = $this->Bs->menuLink(__('Edit'), array('controller'=>'users', 'action'=>'edit', $user['User']['id']), array('icon'=>'pencil-square-o'));
							endif;
							if($userRole['delete']) :
								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'users', 'action'=>'delete', $user['User']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager') );
							endif;
						endif;
						$dropdownMenuLink[] = $this->Bs->link(__('View'), array('controller'=>'users', 'action'=>'view', $user['User']['id']), array('icon'=>'search', 'class'=>'btn btn-info linkrow', 'data-toggle'=>'modal-manager') );
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
$(function() {
  <?php $this->start('appScript'); ?> 
    var baseUrl = '<?php echo Router::url('/', true); ?>';
     baseUrl = baseUrl+'admin';
    $('.reset').click(function() {
        var url = baseUrl+"/"+"users/"+"staff";
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
      var baseUrl = '<?php echo $this->Html->url('/admin/users/staff');?>';
      var label = $('label[for="'+$(this).attr('id')+'"]').text();
      var url = core.getNamedUrlFromForm(baseUrl, '[id*="preEnquirySearchForm"] :input');
      var sortVal = $('.filter').val();
      if(empty(sortVal)){
        window.location.href = url;
      }else{
        filterParams(sortVal, url);
      } 
    });

  <?php $this->end(); ?>
});
</script>