<link rel="stylesheet" type="text/css" href="<?php echo $this->webroot;?>css/crm-main.css"/>
<?php 
// debug($enqueries);exit;
 if(!empty($this->request->params['named'])){ ?>
    <style>
      #collapseOne{display: block;}
    </style>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function (){
      $('.panel-heading').click(function(){
        $("#collapseOne").slideToggle();
    });  
});
</script>

<div id="delegateVisitorEnquiriesAjax">
  <?php $this->Paginator->options(array('update' => '#delegateVisitorEnquiriesAjax'));?>
  <div class="delegateVisitorEnquiries index">
     <div class="row">
        <div class="col-sm-12">
            <div class='portlet box blue' style="margin-top: 15px;">
               <div class="portlet-title">               
                 <div class="caption"><b><?php echo __('Total Enquiries Report'); ?><?php echo $this->Bs->loader(); ?></b></div>
                 <div class="action" style="margin-top: 5px;">
                   <?php 
                     echo  $this->Bs->link(__('Export to Excel'), am($this->request->params['named'], ['action'=>'enqueries_excel_reports']), ['icon'=>'file-excel-o', 'class'=>'btn btn-sm btn-outline white  pull-right exporturl', 'target'=>'_blank'],array('escape'=>false))
                   ?>
                 </div>                 
              </div>
              <!-- Load Report Body -->
              <?php echo $this->element('Reports/total_reports'); ?>
            </div>  
        </div>
        
     </div>
  </div>
</div>
<script type="text/javascript">
$(function() {
  <?php $this->start('appScript'); ?>  
   var getUrl = window.location;
   var baseUrl = '<?php echo Router::url('/', true); ?>';
    baseUrl = baseUrl+'admin';

    $('.reset').click(function() {
      var url = baseUrl+"/"+"new_reports/"+"total_enquery";
      window.location.href = url;
    });

    $('#DelegateVisitorEnquiryCreated0').change(function(){
    var todate = $('#DelegateVisitorEnquiryCreated1').val();
     if(todate == ''){
          e.preventDefault();
      }
  });

    $('[id*="preEnquirySearchForm"] :input').change(function(e) {
     e.preventDefault();
     var baseUrl = '<?php echo $this->Html->url('/admin/new_reports/total_enquery');?>';
     var label = $('label[for="'+$(this).attr('id')+'"]').text();
     var url = core.getNamedUrlFromForm(baseUrl, '[id*="preEnquirySearchForm"] :input');
     var sortVal = $('.filter').val();
     if(empty(sortVal)){
       window.location.href = url;
     }else{
       filterParams(sortVal, url);
     } 
   });
  

    function toggleIcon(e) {
  $(e.target)
      .prev('.panel-heading')
      .find(".more-less")
      .toggleClass('glyphicon-plus glyphicon-minus');
}
$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon); 
  
  <?php $this->end(); ?>
});
</script>
