<div class="portlet-body">
                  <div class="table-toolbar row">
                     <div class="col-sm-12">
                       <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                          <div class="panel panel-default">
                            <div class="panel-heading" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                              <h4 class="panel-title">
                               <?php if(!empty($this->request->params['named'])){ ?>
                                 <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-minus"></i>
                                </a>
                              <?php }else{?>
                                <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                    <i class="more-less glyphicon glyphicon-plus"></i>
                                </a>
                                <?php } ?>
                          </h4>
                            </div>
                           <div id="collapseOne" class="panel-collapse collapse">
                              <div class="panel-body">
                                 <?php
                                  echo $this->Bs->create('DelegateVisitorEnquiry', array('class'=>'form-vertical','id'=>'preEnquirySearchForm'));
                                  echo  $this->Html->div('row',

                                   $this->Bs->input('crm_meeting_status_id', array('options'=>$crmMeetingStatus,'empty'=>'All','label'=>'Enquiry Stage','required'=>false,'col'=>'2','value'=>$crmMeetingStatusValue)). 

                                   $this->Bs->input('pre_enquiry_assigned_to_user_id', array('options'=>$userDropDown,'empty'=>'All','label'=>'Assiend User','required'=>false,'col'=>'2','value'=>$userDropDownValue)).
                                   
                                   $this->Bs->input('VisitorDetail.country_id', array('options'=>$countries,'empty'=>'All','label'=>'Country','required'=>false,'col'=>'2','value'=>$countryValue)).

                                   $this->Bs->input('VisitorDetail.city_id', array('options'=>$cities,'empty'=>'All','label'=>'City','required'=>false,'col'=>'2','value'=>$cityValue)).

                                    $this->Bs->input('enquiry_source_type_id', array('options'=>$enquirySourceTypes,'empty'=>'All','label'=>'Source Type','required'=>false,'col'=>'2','value'=>$enquirySourceTypeValue)).

                                    $this->Bs->input('Finance.rating', array('options'=>['1'=>'1','3'=>'3','6'=>'6'],'label'=>'Rating','empty'=>'All','required'=>false,'col'=>'2','value'=>$ratingValue)).

                                    $this->Bs->input('status', array('options'=>['1'=>'Non-initiated','2'=>'Initiated'],'empty'=>'All','label'=>'Follow-Up Status','required'=>false,'col'=>'2','value'=>$followupstatus)).

                                    $this->Bs->input('bussiness_type_id', array('options'=>$bussinessTypes,'empty'=>'All','label'=>'Bussiness Type','required'=>false,'col'=>'2','value'=>$bussinessTypeValue)).

                                    $this->Bs->input('DelegateVisitorEnquiry.created.0', array('type'=>'text', 'class'=>'date start-date input-sm','value'=>$formDate,'data-max-date'=>'', 'required'=>false,'placeholder'=>'YYYY-MM-DD', 'append'=>array('icon'=>'calendar'), 'label'=>'Start Date','col'=>'2')).

                                    $this->Bs->input('DelegateVisitorEnquiry.created.1', array('type'=>'text', 'class'=>'date start-date input-sm','value'=>$toDate,'data-max-date'=>'', 'required'=>false,'placeholder'=>'YYYY-MM-DD', 'append'=>array('icon'=>'calendar'), 'label'=>'End Date','col'=>'2')).

                                    $this->html->div('col-sm-2',
                                       $this->Form->button(__('Reset'), array('class'=>'btn btn-sm btn-outline blue reset','type'=>'reset','style'=>['margin-top:27px']))
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
                  <div id="delegateVisitorEnquiriesTable" class="tableData">
                     <?php echo $this->Session->flash('search')?>
                     <?php echo $this->Bs->paginationRow(); ?>
                  
                     <div class="table-scrollable">
                        <table cellpadding="0" cellspacing="0" class="table table-bordered table-hover table-condensed" style="background: #f9f9f9;font-size:12px;">
                          <thead>
                            <tr>
                              <th class="hide id col-md-1"><?php echo $this->Paginator->sort('id', __('Id')); ?></th>
                              <th class="">Stage</th>                             
                              <th class="">Created Date</th>                             
                              <th class="">Rating</th>
                              <th class="">Pre-Enquiry No.</th>                        
                              <th class="">Follow-Up Status</th>
                              <th class="">Assiend User</th>
                              <th class="">Company Name</th>
                              <th class="">Country</th>                        
                              <th class="">City</th>                                       
                              <th class="">Source Name</th>
                              <th class="">Bussiness Type</th>
                            </tr>
                          </thead>
                          <tbody>
                            <?php 
                            $sno=0;
                            foreach ($enqueries as $key => $value) { 
                              $sno ++;
                              /*Assigned User*/
                              $assignUserName = (!empty($value['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'])) ? $value['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'] : '###';
                              
                              /*Company Name*/
                              $comapnyNmae = (!empty($value['VisitorDetail']['0']['company_name'])) ? $value['VisitorDetail']['0']['company_name'] : '';

                              /*Country*/
                              $countryName = (!empty($value['VisitorDetail']['0']['Country']['name'])) ? $value['VisitorDetail']['0']['Country']['name'] : '';                              
                              
                              /*City*/
                              $cityName = (!empty($value['VisitorDetail']['0']['City']['name'])) ? $value['VisitorDetail']['0']['City']['name'] : '';                              

                            ?>
                            <tr>
                              <td><?php echo $value['CrmMeetingStatus']['name']; ?></td>
                              <td><?php echo date_format(date_create($value['DelegateVisitorEnquiry']['created']),'jS M Y');?></td>
                              <!-- Rating -->
                              <td><?php echo (!empty($value['Finance'][0]['rating'])) ? $value['Finance'][0]['rating'] : '1'; ?></td>
                              
                              <!-- Pre-enquiry No -->
                              <td class=''><?php echo $value['DelegateVisitorEnquiry']['pre_enquiry_no']; ?></td>

                              <!-- Followup Status -->
                               <td><?php echo (!empty($value['CrmFollowup'])) ? $value['CrmFollowup']['0']['CrmStage']['name'] : 'initial';  ?></td>

                               <!-- Assiend User -->
                               <td><?php echo $assignUserName; ?></td>

                               <!-- Company Name -->
                               <td><?php echo $comapnyNmae;?></td>

                               <!-- Country Name -->
                               <td><?php echo $countryName;?></td>

                               <!-- City Name -->
                               <td><?php echo $cityName;?></td>

                               <!-- Source Name -->
                               <td><?php echo $value['EnquirySourceType']['name']; ?></td>

                               <!-- Bussiness Type -->
                               <td><?php echo $this->Bs->bsLabel(Hash::extract($value, 'BussinessType.{n}.name')); ?>&nbsp;</td>
                            </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                     </div>
                    <?php echo $this->Bs->paginationRow(); ?>
                  </div> 
              </div> 