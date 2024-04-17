<?php //debug($menuLinks);exit; ?> 
<?php if(!empty($this->request->params['named'])){ ?>
<style>
#collapseOne{display: block;}
</style>
<?php } ?>
<div id="menuLinksAjax">
<?php 
	echo $this->start('breadcrumb');
	echo $this->Html->tag('li', $this->Html->link(__('Menu Links'), array('controller'=>'menu_links', 'action'=>'index'), array('rel'=>'v:url', 'property'=>'v:title')), array('typeof'=>'v:Breadcrumb') );
	echo $this->Html->tag('li', $this->Html->link(__('Index'), array('controller'=>'menu_links', 'action'=>'index'), array()), array('class'=>'active', 'typeof'=>'v:Breadcrumb') );
	echo $this->end();
?>
<?php 
	echo $this->start('indexSearch');
	$arraySearch = array('id'=>__('Id'), 'ParentMenuLink.title'=>__('Parent'), 'lft'=>__('Lft'), 'rght'=>__('Rght'), 'Menu.name'=>__('Menu'), 'icon'=>__('Icon'), 'title'=>__('Title'), 'link'=>__('Link'), 'attributes'=>__('Attributes'), 'created'=>__('Created'), 'modified'=>__('Modified'), );
	echo $this->Bs->search($arraySearch, 'menuLinksTable');
	echo $this->end();
?>
<?php $this->Paginator->options(array('update' => '#menuLinksAjax'));?>
<div class="menuLinks index">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Menu Links'); ?> <?php echo $this->Bs->loader(); ?></div>
            <div class="actions">
    		<?php
			$dropdownMenuLink = array();
			$dropdownMenu = [];
			if($isLoggedIn && $userRole['add']) :
				$dropdownMenuLink[] = $this->Bs->link(__('New Menu Link'), array('action' => 'add'), array('icon'=>'plus', 'class'=>'btn btn-sm white btn-outline'));
			else : 
				$dropdownMenuLink[] = $this->Bs->link(' ', '#', array('icon'=>'list', 'class'=>'btn default disabled'));
			endif;
			echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
		?>
            </div>           
        </div>
        
        <div class="portlet-body">
            <div class="table-toolbar row">
                <?php //echo $this->fetch('indexSearch'); ?>
                <div class="col-sm-12">
                <?php
                    $dropdownMenuLinkMultipleActions = array();
                    $dropdownMenuMultipleActions = array(
                        $this->Bs->menuLink(__('Delete Selected Menu Links'), '#', array('class'=>'group-actions','icon'=>'trash-o','data-url'=>$this->Html->url(array('controller'=>'menu_links', 'action'=>'delete')), 'li'=>['class'=>'disabled']) ),

                        $this->Bs->menuLink(__('Active Selected Menu Links'), '#', array('class'=>'group-actions','icon'=>'fa fa-check','data-url'=>$this->Html->url(array('controller'=>'menu_links', 'action'=>'activeinactive',1)), 'li'=>['class'=>'disabled']) ),

                        $this->Bs->menuLink(__('Inactive Selected Menu Links'), '#', array('class'=>'group-actions','icon'=>'fa fa-check','data-url'=>$this->Html->url(array('controller'=>'menu_links', 'action'=>'activeinactive',0)),'li'=>['class'=>'disabled']) )
                    );

                    $dropdownMenuLinkMultipleActions[] = $this->Bs->link(__('Actions'), '#', array('icon'=>'list', 'class'=>'btn btn-info default disabled'));

                    echo $this->Bs->dropdown($dropdownMenuLinkMultipleActions, $dropdownMenuMultipleActions, array('type'=>'split', 'groupClass'=>'btn-group-sm menu_links-checkbox-actions pull-right', 'dropdownBtnClass'=>'default', 'ul'=>array('class'=>'pull-right')));
                ?>
                </div>
                <div class="col-sm-12" style="margin-top: 10px;">
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
                                    echo $this->Bs->create('MenuLink', array('class'=>'form-vertical','id'=>'preEnquirySearchForm'));
                                    echo $this->Html->div('tab-box',
                                        $this->Html->div('row',
                                            
                                            $this->Bs->input('menu_id', array('options' =>$menus,'empty'=>'All','label'=>'Menu','required'=>false,'col'=>'2','value'=>$menuValue)).
                                           
                                            $this->Bs->input('parent_id', array('options' =>$parentlinkArr,'empty'=>'All','required'=>false,'col'=>'2','value'=>$parentlinkValue)).

                                            $this->Bs->input('id', array('options' =>$menulinktitleArr,'empty'=>'All','label'=>'Title','required'=>false,'col'=>'2','value'=>$menulinltitleValue)).
                                            
                                            $this->Bs->input('Role.id', array('options' =>$roles,'empty'=>'All','label'=>'Role','required'=>false,'col'=>'2','value'=>$rolesVale)).

                                            $this->Bs->input('active', array('options' =>['true'=>'true','false'=>'false'],'empty'=>'All','required'=>false,'col'=>'2','value'=>$activelinks)).

                                            $this->html->div('col-sm-2 ',
                                               $this->Form->button(__('Reset'), array('class'=>'reset btn-sm btn btn-danger ','type'=>'reset','style'=>['margin-top:27px;']))
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
            <div id="menuLinksTable" class="tableData">
            <div class="table-responsive">
                <?php echo $this->Session->flash('search')?>
                <?php echo $this->Bs->paginationRow(); ?>
                <?php echo $this->Js->writeBuffer(); ?>
                <table cellpadding="0" cellspacing="0" class="table table-bordered table-advance table-hover table-condensed">
                <thead>
                <tr>
                    <th class="group-checkable"><input type="checkbox" data-set="menu_links-checkbox" data-toggle='group-checkable'>&nbsp;</th>
                    <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                    <th class=""><?php echo $this->Paginator->sort('Menu.name', __('Menu')); ?></th>
                    <th class=""><?php echo $this->Paginator->sort('ParentMenuLink.title', __('Parent')); ?></th>
                    <th class="hide"><?php echo $this->Paginator->sort('lft', __('Lft')); ?></th>
                    <th class="hide"><?php echo $this->Paginator->sort('rght', __('Rght')); ?></th>
                    <th class=""><?php echo $this->Paginator->sort('icon', __('Icon')); ?></th>
                    <th class="col-md-2"><?php echo $this->Paginator->sort('title', __('Title')); ?></th>
                    <th class=""><?php echo $this->Paginator->sort('link', __('Link')); ?></th>
                    <th class=""><?php echo $this->Paginator->sort('link', __('Active')); ?></th>
                    <th class="hide col-md-2 col-lg-1"><?php echo $this->Paginator->sort('created', __('Created')); ?></th>
                    <th class="hide col-md-2 col-lg-1"><?php echo $this->Paginator->sort('modified', __('Modified')); ?></th>
                    <th class="actions col-md-1"><?php echo __('Actions'); ?></th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($menuLinks as $menuLink): ?>
	            			<tr class=''>
                    <td class=''><input data-set-row="menu_links-checkbox"  type="checkbox" name="check[]" value="<?php echo h($menuLink['MenuLink']['id']); ?>">&nbsp;</td>
               					<td class='hide'><?php echo h($menuLink['MenuLink']['id']); ?>&nbsp;</td>
               					<td class=''><?php echo h($menuLink['Menu']['name']); ?>&nbsp;</td>
               					<td class=''><?php echo h($menuLink['ParentMenuLink']['title']); ?>&nbsp;</td>
               					<td class='hide'><?php echo h($menuLink['MenuLink']['lft']); ?>&nbsp;</td>
               					<td class='hide'><?php echo h($menuLink['MenuLink']['rght']); ?>&nbsp;</td>
               					<td class=''><?php echo $this->Html->tag('span', $this->Bs->icon($menuLink['MenuLink']['icon']), array('data-toggle'=>'tooltip', 'title'=>$menuLink['MenuLink']['icon'])); ?>&nbsp;</td>
               					<td class=''><?php echo h($menuLink['MenuLink']['title']); ?>&nbsp;</td>
               					<td class='rowlink-skip'>
                   <?php 
                       echo $this->Bs->link(
                           __('Link'), $this->Bs->getUrl($menuLink['MenuLink']['link']), 
                           array('icon'=>'link', 'data-toggle'=>'popover', 'data-content'=>h($menuLink['MenuLink']['link']), 'data-trigger'=>'hover')
                       );
                   ?>&nbsp;
                   </td>
                   <td class='text-center'><input data-set-row="countries-checkbox"  type="checkbox" name="check[]" value="<?php echo h($menuLink['MenuLink']['active']); ?>" class ='activeClass'  data-value="<?php echo $menuLink['MenuLink']['id'];?>" <?php  if($menuLink['MenuLink']['active'] == 1){ ?> checked <?php }?>>&nbsp;</td>

                   <td class='hide'><?php echo $this->Bs->niceShort($menuLink['MenuLink']['created']); ?>&nbsp;</td>
                   <td class='hide'><?php echo $this->Bs->niceShort($menuLink['MenuLink']['modified']); ?>&nbsp;</td>
               					<td class="actions">
               					<?php
               						$dropdownMenuLink = array();
               						$dropdownMenu = array();
                     $dropdownMenu[] = $this->Bs->menuLink(__('View'), array('controller'=>'menu_links', 'action'=>'view', $menuLink['MenuLink']['id']), array('icon'=>'search', 'data-toggle'=>'modal-manager'));
               						if($isLoggedIn) : 
               							if($userRole['edit']) : 
                      $dropdownMenuLink[] = $this->Bs->link(__('Edit'), array('controller'=>'menu_links', 'action'=>'edit', $menuLink['MenuLink']['id']), array('icon'=>'pencil-square-o', 'class'=>'btn btn-warning linkrow') );
                      $dropdownMenu[] = $this->Bs->menuLink(__('Move Up'), array('controller'=>'menu_links', 'action'=>'moveup', $menuLink['MenuLink']['id'], '1'), array('icon'=>'arrow-up'));
                      $dropdownMenu[] = $this->Bs->menuLink(__('Move Down'), array('controller'=>'menu_links', 'action'=>'movedown', $menuLink['MenuLink']['id'], '1'), array('icon'=>'arrow-down'));
               							endif;
               							if($userRole['delete']) :
               								$dropdownMenu[] = $this->Bs->menuLink(__('Delete'), array('controller'=>'menu_links', 'action'=>'delete', $menuLink['MenuLink']['id']), array('icon'=>'trash-o', 'data-toggle'=>'modal-manager'));
               							endif;
               						endif;
               					
               						echo $this->Bs->dropdown($dropdownMenuLink, $dropdownMenu, array('type'=>'split', 'groupClass'=>'btn-group-sm','dropdownBtnClass'=>'btn-success','ul'=>array('class'=>'pull-right')));
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
        var url = baseUrl+"/"+"menu_links/"+"index";
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
      var baseUrl = '<?php echo $this->Html->url('/admin/menu_links/index');?>';
      
      var label = $('label[for="'+$(this).attr('id')+'"]').text();
      var url = core.getNamedUrlFromForm(baseUrl, '[id*="preEnquirySearchForm"] :input');
      console.log(url);
      var sortVal = $('.filter').val();
      if(empty(sortVal)){
        window.location.href = url;
      }else{
        filterParams(sortVal, url);
      } 
    });


    $('.activeClass').change(function(){
     var checkedid = $(this).is(':checked');
     var menuLinkid = $(this).attr('data-value');
      $.ajax({
             type:"POST",
             url: "<?php echo $this->Html->url(['controller'=>'menu_links','action'=>'is_active']); ?>",
             data: {"menuLinkid":menuLinkid,"checkedid":checkedid} 
           });
    });

  <?php $this->end(); ?>
});
</script>