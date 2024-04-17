<?php

App::uses('CakeEmail', 'Network/Email');

class MailTask extends Shell {

    var $uses = array('SalesPaymentSchedule','SalesPaymentScheduleProject','CrmQuoteServiceValue','CrmQuoteServiceRenewalValue','User');

    public function mailschedule(){
    $this->autoRender=false;
    $this->layout = false;
    //ini_set('max_execution_time', 300);
    App::uses('CakeEmail', 'Network/Email');
    $email = new CakeEmail();
 
    $this->loadModel('User');
    
    /*Current Date*/
   $currentDate = date('Y-m-d');
   $currentMonth = date('F Y');
   $currentMonthFullname = date('F');
   $currentMonthHalfname = date('M');

    /*Sale Manager*/
   $user = $this->User->find('first',['conditions'=>['User.master_user_type_id'=>11,'User.active'=>true],'contain'=>false,'fields'=>['name','email']]);
   $saleManagerEmail = $user['User']['email']; 
   
    /***********  Sale Paymet Schedule email *********/
    /*Sale Paymet Schedule for Product*/
   $this->loadModel('SalesPaymentSchedule');
   $paymetforproduct = $this->SalesPaymentSchedule->find('all',['conditions'=>['SalesPaymentSchedule.alert-date'=>$currentDate,'SalesPaymentSchedule.payment_active'=>true],'contain'=>['SaleUpload'=>['fields'=>['id','delegate_visitor_enquiry_id','currency_id'],'Currency.iso_code','DelegateVisitorEnquiry'=>['fields'=>['id','sales_assigned_to_user_id'],'VisitorDetail'=>['company_name','Country.name','City.name'],'SaleAssignedToUser'=>['name','email']]],'AmcType'=>['title']]]);

    /*Sale Paymet Schedule for Project*/
   $this->loadModel('SalesPaymentScheduleProject');
   $paymetforproject =$this->SalesPaymentScheduleProject->find('all',['conditions'=>['SalesPaymentScheduleProject.alert-date'=>$currentDate,'SalesPaymentScheduleProject.payment_active'=>true],'contain'=>['SaleUpload'=>['fields'=>['id','delegate_visitor_enquiry_id','currency_id'],'Currency.iso_code','DelegateVisitorEnquiry'=>['fields'=>['id','sales_assigned_to_user_id'],'VisitorDetail'=>['company_name','Country.name','City.name'],'SaleAssignedToUser'=>['id','name','email']]],'AmcType'=>['title']]]);

  /*Email Login*/
  $salePayment = array_merge($paymetforproduct,$paymetforproject);
  $alertdateforproduct  =  $alertdateforproject = $nextdayproduct = $nextdayproject = $saleManagerEmail = $SaleManagerName = '';
   foreach ($salePayment as  $value) {
    $SaleManagerName = $value['SaleUpload']['DelegateVisitorEnquiry']['SaleAssignedToUser']['name'];
    /*SaleManagesr*/
    if(!empty($value['SaleUpload'])){
      $saleManagerEmail = $value['SaleUpload']['DelegateVisitorEnquiry']['SaleAssignedToUser']['email'];
    }

      if(isset($value['SalesPaymentSchedule'])){
        /*For Product*/
      $nextdayproduct = date('Y-m-d',strtotime($value['SalesPaymentSchedule']['alert-date']. '1 day'));
      if(empty($value['SalesPaymentSchedule']['mail_send_date'])){
        $value['SalesPaymentSchedule']['mail_send_date'] = $value['SalesPaymentSchedule']['alert-date'];
        $alertdateforproduct = $value['SalesPaymentSchedule']['mail_send_date'];
       }else{ $alertdateforproduct = $value['SalesPaymentSchedule']['mail_send_date'];}


     if($alertdateforproduct == $currentDate && $value['SalesPaymentSchedule']['payment_active'] == true){
         /*For Email Lgoin*/
         App::uses('CakeEmail', 'Network/Email');
              $email = new CakeEmail();
              $result = $email->template('saleupload_email', 'default')->emailFormat('html')->to(trim($saleManagerEmail))->from('noreply@efewa.com')->subject('eFEWA LIVE - Upcoming Payments for'.$currentMonth)->viewVars(['paymetforproduct'=>$paymetforproduct,'paymetforproject'=>$paymetforproject,'currentDate'=>$currentDate,'currentMonth'=>$currentMonth,'SaleManagerName'=>$SaleManagerName]);
        
        $productEmail = $email->send();
        
      /*Mail Date Update Query*/
      if($productEmail){
       $queryproduct = 'Update sales_payment_schedule AS SalesPaymentSchedule SET SalesPaymentSchedule.mail_send_date = "'.$nextdayproduct.'" where SalesPaymentSchedule.id IN ('.$value['SalesPaymentSchedule']['id'].')';
         }  

        $this->SalesPaymentSchedule->query($queryproduct);

       }
      }elseif(isset($value['SalesPaymentScheduleProject'])) {
      /*For Project*/
      $nextdayproject = date('Y-m-d',strtotime($value['SalesPaymentScheduleProject']['alert-date']. '1 day'));
      if(empty($value['SalesPaymentScheduleProject']['mail_send_date'])){
        $value['SalesPaymentScheduleProject']['mail_send_date'] = $value['SalesPaymentScheduleProject']['alert-date'];
        $alertdateforproject = $value['SalesPaymentScheduleProject']['mail_send_date'];
      }else{
        $alertdateforproject = $value['SalesPaymentScheduleProject']['mail_send_date'];
      }

      if($alertdateforproject == $currentDate && $value['SalesPaymentScheduleProject']['payment_active'] == true){
       /*For Email Lgoin*/
       App::uses('CakeEmail', 'Network/Email');
           $email = new CakeEmail();
           $result = $email->template('saleupload_email', 'default')->emailFormat('html')->to(trim($saleManagerEmail))->from('noreply@efewa.com')->subject('eFEWA LIVE - Upcoming Payments for'.$currentMonth)->viewVars(['paymetforproduct'=>$paymetforproduct,'paymetforproject'=>$paymetforproject,'currentDate'=>$currentDate,'currentMonth'=>$currentMonth,'SaleManagerName'=>$SaleManagerName]);
            
       $projectEmail = $email->send();

       /*Mail Date Update Query*/
       if($projectEmail){
        $queryproject = 'Update sales_payment_schedule_projects AS SalesPaymentScheduleProject SET SalesPaymentScheduleProject.mail_send_date = "'.$nextdayproject.'" where SalesPaymentScheduleProject.id IN ('.$value['SalesPaymentScheduleProject']['id'].')';
       }

      $this->SalesPaymentScheduleProject->query($queryproject);
      }
      } 
    }
  /*********** END  Paymet Schedule email *********/

 /***********  AMC Details Email Logic  *************/
 /*AMC Details*/
  $amcdetails = $this->CrmQuoteServiceValue->find('all',['conditions'=>['OR'=>['CrmQuoteServiceValue.alert_month'=>[$currentMonthHalfname,$currentMonthFullname],'CrmQuoteServiceValue.mail_send_date'=>date('Y-m-d')],'CrmQuoteServiceValue.is_amc_applied'=>true],'contain'=>['QuotationService','AmcServiceType','AmcPeriod','SaleUpload'=>['fields'=>['id','delegate_visitor_enquiry_id','currency_id'],'Currency.iso_code','DelegateVisitorEnquiry'=>['fields'=>['id','sales_assigned_to_user_id'],'VisitorDetail'=>['company_name','Country.name','City.name'],'SaleAssignedToUser'=>['id','name','email']]]]]);     

  $amcalertmonth = $amcalertdate = $AmcEmailSendDate = $nextemaidate = '';  
    foreach ($amcdetails as $amcdetail) { 
    /*SaleManagesr*/
    if(!empty($amcdetail['SaleUpload'])){
      $saleManagerEmail = $amcdetail['SaleUpload']['DelegateVisitorEnquiry']['SaleAssignedToUser']['email'];
    } 
    $SaleManagerName = $amcdetail['SaleUpload']['DelegateVisitorEnquiry']['SaleAssignedToUser']['name'];  
    $amcalertmonth = $amcdetail['CrmQuoteServiceValue']['alert_month']; 
    $emaildays = $amcdetail['AmcPeriod']['days'];
    $amcalertdate = date('Y-m-01');      
    $nextemaidate = date('Y-m-d',strtotime($amcalertdate. ''.$emaildays.' day'));
    if(empty($amcdetail['CrmQuoteServiceValue']['mail_send_date'])){
      $amcdetail['CrmQuoteServiceValue']['mail_send_date'] = $amcalertdate; 
      $AmcEmailSendDate = $amcdetail['CrmQuoteServiceValue']['mail_send_date'];
    }else{  $AmcEmailSendDate = $amcdetail['CrmQuoteServiceValue']['mail_send_date'];}
    
  
    /*AmC Email Logic*/
    if($AmcEmailSendDate == $currentDate){
        App::uses('CakeEmail', 'Network/Email');
                $email = new CakeEmail();
                $result = $email->template('amc_email', 'default')->emailFormat('html')->to(trim($saleManagerEmail))->from('noreply@efewa.com')->subject('eFEWA LIVE - Upcoming AMC Payments for'.$currentMonth)->viewVars(['amcdetails'=>$amcdetails,'currentMonthHalfname'=>$currentMonthHalfname,'currentMonthFullname'=>$currentMonthFullname,'SaleManagerName'=>$SaleManagerName]);
                 $amcEmail = $email->send();
               if($amcEmail){
                $amcemaildatequery = 'Update crm_quote_service_values AS CrmQuoteServiceValue SET CrmQuoteServiceValue.mail_send_date = "'.$nextemaidate.'" where CrmQuoteServiceValue.id IN ('.$amcdetail['CrmQuoteServiceValue']['id'].')';
               }
              $this->CrmQuoteServiceValue->query($amcemaildatequery);
      }
    }
  /***********  End AMC Details Email *********/

/***********  Service Renewal Logic  *************/
/*CRM Quote Service value */
 $amcquoteservicevalue = $this->CrmQuoteServiceRenewalValue->find('all',['contain'=>['SaleUpload'=>['fields'=>['id','delegate_visitor_enquiry_id','currency_id'],'Currency.iso_code','DelegateVisitorEnquiry'=>['fields'=>['id','sales_assigned_to_user_id'],'VisitorDetail'=>['company_name','Country.name','City.name'],'SaleAssignedToUser'=>['id','name','email']]],'CrmQuoteServiceValue.quotation_service_id'=>['QuotationService.name']]]);

foreach ($amcquoteservicevalue as $amcquoteservicevalues) {
      $alert_date = ' '; 
      /*SaleManagesr*/
        if(!empty($amcquoteservicevalues['SaleUpload'])){
          $saleManagerEmail = $amcquoteservicevalues['SaleUpload']['DelegateVisitorEnquiry']['SaleAssignedToUser']['email'];
          $SaleManagerName = $amcquoteservicevalues['SaleUpload']['DelegateVisitorEnquiry']['SaleAssignedToUser']['name'];
        }
       $ondaybefore = date('Y-m-d',strtotime($amcquoteservicevalues['CrmQuoteServiceRenewalValue']['renewal_date']. '1 day'));
      if(empty($amcquoteservicevalues['CrmQuoteServiceRenewalValue']['mail_send_date'])){
        $amcquoteservicevalues['CrmQuoteServiceRenewalValue']['mail_send_date'] = $amcquoteservicevalues['CrmQuoteServiceRenewalValue']['renewal_date'];
        $alert_date = $amcquoteservicevalues['CrmQuoteServiceRenewalValue']['mail_send_date'];
        $alert_date =  date('Y-m-d',strtotime($amcquoteservicevalues['CrmQuoteServiceRenewalValue']['renewal_date']. '-1 day'));
       }else{ $alert_date = $amcquoteservicevalues['CrmQuoteServiceRenewalValue']['mail_send_date'];}

        if($alert_date == $currentDate && $amcquoteservicevalues['CrmQuoteServiceRenewalValue']['active'] == true){
              App::uses('CakeEmail', 'Network/Email');
               $email = new CakeEmail();
               $result = $email->template('amc_renewal_service', 'default')->emailFormat('html')->to(trim($saleManagerEmail))->from('noreply@efewa.com')->subject('eFEWA LIVE - Upcoming Renewal Service Payments for'.$currentDate)->viewVars(['amcquoteservicevalue'=>$amcquoteservicevalue,'currentDate'=>$currentDate,'SaleManagerName'=>$SaleManagerName]);
           
              $emailSend = $email->send();
           
            if($emailSend){
            $query = 'Update crm_quote_service_renewal_values AS CrmQuoteServiceRenewalValue SET CrmQuoteServiceRenewalValue.mail_send_date = "'.$ondaybefore.'" where CrmQuoteServiceRenewalValue.id IN ('.$amcquoteservicevalues['CrmQuoteServiceRenewalValue']['id'].')';
              }
              $this->CrmQuoteServiceRenewalValue->query($query);
            }
        }
/***********  End Service Renewal *********/
}
 
}