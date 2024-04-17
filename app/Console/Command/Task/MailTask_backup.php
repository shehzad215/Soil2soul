<?php

App::uses('CakeEmail', 'Network/Email');

class MailTask extends Shell {

    var $uses = array('CrmFollowup','DelegateVisitorEnquiry','DelegateVisitorEnquiryDetail','Event','UserActivationDetail','VisitorDetail','EnquirySourceType', 'User', 'CrmStage', 'CrmSubStage',  'CrmScheduleDemo', 'CrmScheduleDemosUser', 'Country');

      public function mailschedule(){
    $this->autoRender=false;
    $this->layout = false;
    //ini_set('max_execution_time', 300);
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
        $this->loadModel('User');
    /***********  Fallow-Up Scheduler *********/
    $this->loadModel('CrmFollowup');
     $CrmFollowupId = $this->CrmFollowup->find('all',['fields'=>['MAX(CrmFollowup.id) as id'],'group'=>['CrmFollowup.delegate_visitor_enquiry_id'],'order'=>['CrmFollowup.id DESC'],'contain'=>false]);

         $ids = []; 
         foreach ($CrmFollowupId as $key => $CrmFollowupIds) {
            $ids[] = $CrmFollowupIds[0]['id'];
         }         
         if(!empty($ids)){
           $ids = implode(",",$ids);
         }else{$ids = '0';}
    $options = [];
    $options['fields']=[];
    $options['conditions']=["CrmFollowup.id IN($ids)"];
    
    $options['contain']=[
      'User.name',
      'User.email',
      'User.Timezone.name',
      'CrmStage.name',
      'CrmSubStage.name',
      'DelegateVisitorEnquiry'=>[
        'DelegateVisitorEnquiryDetail'=>[
          'Event.name',
          'UserActivationDetail.User.email'
        ],
        'VisitorDetail'=>['Country.name'],
        'EnquirySourceType.name',
        'Event.name',
        'UserActivationDetail.User.name',
        'UserActivationDetail.User.email'
      ]
    ];
    $options['group']=['CrmFollowup.delegate_visitor_enquiry_id'];
    $options['order']=['CrmFollowup.id DESC'];
    $cronScheduler = $this->CrmFollowup->find('all',$options);
    $test_mail=[];
        foreach ($cronScheduler as $key => $value) {
      $id = $value['CrmFollowup']['id'];
            if(!empty($value['CrmFollowup']['followup_date'])){
        $date = $value['CrmFollowup']['followup_date'];
            }
            if(!empty($value['CrmFollowup']['followup_Time'])){
        $time = $value['CrmFollowup']['followup_Time'];
      }

      $schedulerResult = $this->scheduler->mail_scheduler($date, $time);
      $fieldName="";
      if($schedulerResult=="twoHoursScheduler"){
        if($value['CrmFollowup']['two_hour_scheduler'] ==false){
          $fieldName="two_hour_scheduler";
              $test_mail[]="sent form 2 hours before - ".$id;
        }else{
          $test_mail[]="Already sent from 2 hours before - ".$id;
        }
      }
      else if($schedulerResult=="twentyFourHoursScheduler"){
        if($value['CrmFollowup']['twentyfour_hour_scheduler'] ==false){
          $fieldName="twentyfour_hour_scheduler";
          $test_mail[]="sent form 24 hours before - ".$id;
        }else{
          $test_mail[]="Already sent from 24 hours before - ".$id;
        }
      }
      else if($schedulerResult=="fortyEightHoursScheduler"){
        if($value['CrmFollowup']['fortyeight_hour_scheduler'] ==false){
          $fieldName = "fortyeight_hour_scheduler";
          $test_mail[] = "sent form 48 hours before - ".$id;
        }else{
          $test_mail[]="Already sent from 48 hours before - ".$id;
        }
      }else{
        $test_mail[]="not sent".$id;
      }
      if($value['CrmFollowup']['follow_type'] == '0'){
                if(!empty($value['DelegateVisitorEnquiry']['UserActivationDetail']['User'])){
                    $toMail = $value['DelegateVisitorEnquiry']['UserActivationDetail']['User']['email'];
                }else if(!empty($value['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['UserActivationDetail'])){
                    $toMail = $value['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['UserActivationDetail']['User']['email'];
                }
            }
            elseif(!empty($value['User'])){
                $toMail = $value['User']['email'];
            }else{
              if(!empty($value['DelegateVisitorEnquiry']['UserActivationDetail'])){ 
                $toMail = $value['DelegateVisitorEnquiry']['UserActivationDetail']['User']['email'];
              }
            }
      if($fieldName!=""){
        try 
        {
          $email->template('cron_scheduler', 'default')
          ->emailFormat('both')
          ->to($toMail)
          // ->cc($ccMail)
          // ->from(FROM_EMAIL)
          ->subject('eFEWA - Reminder Email for Follow-up')
          ->viewVars(['crmFollowUp' => $value])
          ->send('default');
        }catch (Exception $e) 
        {
          echo $e->getMessage();
        }
        $this->CrmFollowup->id = $value['CrmFollowup']['id'];
        $this->CrmFollowup->saveField($fieldName, "1" );
      }

        }
        //debug($test_mail);exit;
        /*********** END  Fallow-Up Scheduler *********/

        /***********  Demo Scheduler *************/
        $this->loadModel('CrmScheduleDemo');
    $this->loadModel('CrmSubStage');
    $this->loadModel('CrmScheduleDemosUser');
         $cronSchedulerDemoId = $this->CrmScheduleDemo->find('all',['fields'=>['MAX(CrmScheduleDemo.id) as id'],'group'=>['CrmScheduleDemo.delegate_visitor_enquiry_id'],'order'=>['CrmScheduleDemo.id DESC'],'contain'=>false]);

         $ids = []; 
         foreach ($cronSchedulerDemoId as $key => $CrmScheduleDemoIds) {
            $ids[] = $CrmScheduleDemoIds[0]['id'];
         }         
         if(!empty($ids)){
           $ids = implode(",",$ids);
         }else{$ids = '0';}

        $options1 = [];
    $options1['conditions']=["CrmScheduleDemo.id IN($ids)"];
    
    $options1['contain']=[
      'Country.name',
      'CrmScheduleDemosUser',
      'DelegateVisitorEnquiry'=>[
        'DelegateVisitorEnquiryDetail.Event.id',
        'DelegateVisitorEnquiryDetail.Event.user_activation_detail_id',
        'DelegateVisitorEnquiryDetail'=>[
          'Event.name',
          'UserActivationDetail.User.email'
        ],
        'EnquirySourceType.name',
        'Event.name',
        'VisitorDetail'=>['Country.name'],
      ],
    ];

    //$options1['fields'] = ['max(CrmScheduleDemo.id) as id','*'];

    $options1['order']=['CrmScheduleDemo.id DESC' ];
    $options1['group']=['CrmScheduleDemo.delegate_visitor_enquiry_id'];

    $cronSchedulerDemo = $this->CrmScheduleDemo->find('all',$options1);
    $test_mail1=[];
        foreach ($cronSchedulerDemo as $key => $values) {
      $id = $values['CrmScheduleDemo']['id'];
            if(!empty($values['CrmScheduleDemo']['demo_date'])){
        $date = $values['CrmScheduleDemo']['demo_date'];
            }
            if(!empty($values['CrmScheduleDemo']['time'])){
        $time = $values['CrmScheduleDemo']['time'];
      }

      $headUser = $this->User->find('first',['fields'=>'name,email','contain'=>false,'conditions'=>['User.id'=>$values['CrmScheduleDemo']['head_user_id']]]);
      $headUserName =$headUser['User']['name'];
      $crmSubStage = $this->CrmSubStage->find('first',['fields'=>'name','contain'=>false,'conditions'=>['CrmSubStage.id'=>$values['CrmScheduleDemo']['crm_sub_stage_id']]]);
      $crmSubStageName =$crmSubStage['CrmSubStage']['name'];
      $crmAssistUser = $this->CrmScheduleDemosUser->find('all',['conditions'=>['CrmScheduleDemosUser.crm_schedule_demo_id'=>$values['CrmScheduleDemo']['id']]]);
      $crmAssistUserId = Hash::extract($crmAssistUser,'{n}.CrmScheduleDemosUser.user_id');
      $crmAssistUserNamesArr = $this->User->find('all',['fields'=>['User.name','User.email'],'contain'=>false,'conditions'=>['User.id'=>$crmAssistUserId]]);
            $schedulerResult=[];
      $schedulerResult = $this->scheduler->mail_scheduler($date, $time);
      $fieldName="";
      if($schedulerResult=="twoHoursScheduler"){
        if($values['CrmScheduleDemo']['two_hour_scheduler'] ==false){
          $fieldName="two_hour_scheduler";
              $test_mail1[]="sent form 2 hours before - ".$id;
        }else{
          $test_mail1[]="Already sent from 2 hours before - ".$id;
        }
      }
      else if($schedulerResult=="twentyFourHoursScheduler"){
        if($values['CrmScheduleDemo']['twentyfour_hour_scheduler'] ==false){
          $fieldName="twentyfour_hour_scheduler";
          $test_mail1[]="sent form 24 hours before - ".$id;
        }else{
          $test_mail1[]="Already sent from 24 hours before - ".$id;
        }
      }
      else if($schedulerResult=="fortyEightHoursScheduler"){
        if($values['CrmScheduleDemo']['fortyeight_hour_scheduler'] ==false){
          $fieldName="fortyeight_hour_scheduler";
          $test_mail1[]="sent form 48 hours before - ".$id;
        }else{
          $test_mail1[]="Already sent from 48 hours before - ".$id;
        }
      }else{
        $test_mail1[]="not sent".$id;
      }
      $toMail = $headUser['User']['email'];
      $ccMail = Hash::extract($crmAssistUserNamesArr,'{n}.User.email');
      if($fieldName!=""){
        try 
        {
          $email->template('cron_scheduler_demo', 'default')
          ->emailFormat('both')
          ->to($toMail)
          ->cc($ccMail)
          // ->from(FROM_EMAIL)
          ->subject('eFEWA - Reminder Email for Demo')
          ->viewVars(['crmScheduleDemo' => $values,'headUserName'=>$headUserName,'crmSubStageName'=>$crmSubStageName,'crmAssistUserNamesArr'=>$crmAssistUserNamesArr])
          ->send('default');
        }catch (Exception $e) 
        {
          echo $e->getMessage();
        }
        $this->CrmScheduleDemo->id = $values['CrmScheduleDemo']['id'];
        $this->CrmScheduleDemo->saveField($fieldName, "1" );
      }
    }
    //debug($test_mail);
   // debug($test_mail1);exit;

        /***********  End Demo Scheduler *********/


  }
  public function componentMailScheduler($date=null,$time=null){
    // echo  $date="2018-02-04";
    // echo $time = "08:00:00"; 
    
    if($date != null && $time != null){
      
          $beforeDateTime= $date." ".$time;
          $beforeDateTime = date_create($beforeDateTime);
          $currentDetaTime=date_create(date('Y-m-d H:i:s'));
          $diff=date_diff($beforeDateTime,$currentDetaTime);
          $days=$diff->format("%R%d");
          $hours=$diff->format("%R%h");
          //echo $days;exit;
          if(($days=='-0' && $hours=='-1') || $days=='-2' || $days=='-1') {
           // echo "days: ".$days." and Hours: ".$hours;
            if($days=='-0' && $hours =='-1'){
              return "twoHoursScheduler";
            }
            elseif($days=='-1'){
              return "twentyFourHoursScheduler";
            }
            elseif($days=='-2'){
              return "fortyEightHoursScheduler";
            }
            return true;
            }
            else{
              return false;
          }
      
    }else{
      return false;
    }
  }

}