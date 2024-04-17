<?php
App::uses('AppController', 'Controller');

class NewReportsController extends AppController {

	public $components = array('Paginator', 'Flash', 'Session');
	//public $helpers = array('PhpSpreadsheet');	

	var $uses = array('User');


	/*
	* beforeFilter method
	*/
 	function beforeFilter() { 
		parent::beforeFilter();
		$this->set('enableAjax', false);
	}

 /* Users Wise Events Report */ 
public function admin_event_report(){
	$this->set('enableAjax',false);
	$this->layout = 'report';
	$this->loadModel('Event');
	$this->loadModel('UserActivationDetail');
	$this->loadModel('User');
	$options = [];
	$conditions = $newDelegateDropdown = $events = $country = $City =  $Domain=  [];

	$conditions = ['UserActivationDetail.role_type_id'=>3,'UserActivationDetail.active'=>true];
	

	//debug($this->request->params);exit;
	if(!empty($this->request->params['named'])){ 

	$options['joins'] = [
			['type' => 'left','table' => 'events', 'alias' => 'Events','conditions'=>['Events.id = UserActivationDetail.event_id']],
			['type' => 'left','table' => 'event_domains', 'alias' => 'EventDomain','conditions'=>['EventDomain.id = Events.event_domain_id']],
			['type' => 'left','table' => 'countries', 'alias' => 'Country','conditions'=>['Country.id = Events.country_id']],
			['type' => 'left','table' => 'cities', 'alias' => 'City','conditions'=>['City.id = Events.city_id']],
		];
	}

	$options['contain']=['Event'=>['id','name','alias','start_date','end_date','is_exhibiting','is_visiting','Country.name','City.name','EventDomain'=>['name','color']],'User'=>['id','name']];
	
	$options['conditions'] = $this->Hetu->named_index($conditions);
	if(empty($this->request->params['pass'])){ 
				$this->UserActivationDetail->find('all',$options);
				$this->paginate = $options;
				$this->set('Userdetails', $this->paginate('UserActivationDetail'));
  }else{
  		$delagateusers = $this->UserActivationDetail->find('all',$options);
  					 
  }

	 $delegateUsers1 = $this->UserActivationDetail->find('all', [
        	'conditions'=>['UserActivationDetail.role_type_id'=>'3' ],
        	'contain'=>[
        		'User.name',
        		'Event'=>['name','EventDomain.name','Country.name','City.name']]
        	]);

	 //debug($delegateUsers1);die;

/*      $delegateUsers1 = $this->UserActivationDetail->find('all', [
        	'conditions'=>['UserActivationDetail.role_type_id'=>'3' ],
        	'contain'=>[
        		'User.name',
        		'Event'=>['name','Country.name','City.name','EventDomain.name']
        	],
     ]);
*/
     //debug($delegateUsers1);exit;
     $newDelegateDropdown = [];
     $events = [];
     $country = [];
     $City = [];
     $Domain = [];
        foreach($delegateUsers1 as $delData){

        	if(!empty($delData['User'])){
        	$newDelegateDropdown[$delData['UserActivationDetail']['id']] = $delData['User']['name'] ;
        	}
        	if(!empty($delData['Event'])){
        	$events[$delData['UserActivationDetail']['id']] = $delData['Event']['name'];
        	}if(!empty($delData['Event']) && !empty($delData['Event']['Country'])){
        	$country[$delData['UserActivationDetail']['id']] = $delData['Event']['Country']['name'];
        	}if(!empty($delData['Event']) && !empty($delData['Event']['City'])){
        	$City[$delData['UserActivationDetail']['id']] = $delData['Event']['City']['name'];
        	}if(!empty($delData['Event']) && !empty($delData['Event']['EventDomain'])){
        	$Domain[$delData['UserActivationDetail']['id']] = $delData['Event']['EventDomain']['name'];
        	}
        }

        //debug($Domain);exit;

     $newDelegateDropdown = array_combine($newDelegateDropdown,$newDelegateDropdown);
     $events=array_combine($events,$events);
     $country=array_combine($country,$country);
     $City=array_combine($City,$City);
     $City=array_filter($City);

     $Domain=array_combine($Domain,$Domain);
     $Domain=array_filter($Domain);

	$this->set(compact('newDelegateDropdown','events','country','City','Domain'));
}


public function user_event_report(){
	 $this->admin_event_report();
}

public function admin_export_event_report(){
	 $this->autoRender = false;
 	 $this->loadModel('Event');
     $this->loadModel('UserActivationDetail');
	 $this->loadModel('User');
	 $options = [];
	 $conditions = $newDelegateDropdown = $events = $country = $City =  $Domain=  [];

	 $conditions = ['UserActivationDetail.role_type_id'=>3,'UserActivationDetail.active'=>true];


	if(!empty($this->request->params['named'])){ 

	$options['joins'] = [
			['type' => 'left','table' => 'events', 'alias' => 'Events','conditions'=>['Events.id = UserActivationDetail.event_id']],
			['type' => 'left','table' => 'event_domains', 'alias' => 'EventDomain','conditions'=>['EventDomain.id = Events.event_domain_id']],
			['type' => 'left','table' => 'countries', 'alias' => 'Country','conditions'=>['Country.id = Events.country_id']],
			['type' => 'left','table' => 'cities', 'alias' => 'City','conditions'=>['City.id = Events.city_id']],
		];
	}

	$options['contain']=['Event'=>['id','name','alias','start_date','end_date','is_exhibiting','is_visiting','Country.name','City.name','EventDomain'=>['name','color']],'User'=>['id','name']];
	
	$options['conditions'] = $this->Hetu->named_index($conditions);
	if(empty($this->request->params['pass'])){ 
				$this->UserActivationDetail->find('all',$options);
				$this->paginate = $options;
				$this->set('Userdetails', $this->paginate('UserActivationDetail'));
  }else{
  		$delagateusers = $this->UserActivationDetail->find('all',$options); 					 
 	   }

 	   	 $dataArr = [];
		 $count = 0;
		 $srno=0; $status= '';
		 foreach ($delagateusers as $key => $value) {
		 	$srno++;
		 	if($value['Event']['is_exhibiting'] == true){
                $status = 'Participation';
            }else{$status = 'Visit';}
            //debug($value);
            $username = $value['User']['name'];
            $eventname = $value['Event']['name'];
            $alias = $value['Event']['alias'];
            $startDate = date_format(date_create($value['Event']['start_date']),'jS M Y');
            $endDate = date_format(date_create($value['Event']['end_date']),'jS M Y');
            $country = (!empty($value['Event']['Country']['name'])) ? $value['Event']['Country']['name'] : '';
            $city = (!empty($value['Event']['City']['name'])) ? $value['Event']['City']['name'] : '';
            //debug($city);die;
            $domain = $value['Event']['EventDomain']['name'];
           
		 	$dataArr [] = [$srno,$username,$eventname,$alias,$startDate,$endDate,$country,$city,$status,$domain];
		 }

		$tableHeader[] = ['Sr.No.','User Name', 'Event Name','Alias','Start Date','End Date','Country','City','Status Domain'];
		
		 $tableDate = array_merge($tableHeader,$dataArr);

		 //debug($tableDate);die;
		 /*Setup Export To Excel*/
		 $currentDate = date('Y-m-d');
		 $fileName = 'Event Reports'.$currentDate;	
		 //debug($fileName);die;
		 $this->export_to_excel($fileName,$tableDate);

}

/*For Quotation Request Raised Report*/
public function admin_quotation_request_raised_report(){
  $this->layout = 'report';
  $this->loadModel('DelegateVisitorEnquiry');
  $this->loadModel('CrmQuoteRequest');
  $conditions = [];
  $formDate = '';
  $toDate = '';
  $conditionsDate = '';
    // debug($this->request->params);exit;
    if(!empty($this->request->params['named']['CrmQuoteRequest.quote_deadline_date_from']) && !empty($this->request->params['named']['CrmQuoteRequest.quote_deadline_date_to'])){
      $formDate = $this->request->params['named']['CrmQuoteRequest.quote_deadline_date_from']; 
      $toDate = $this->request->params['named']['CrmQuoteRequest.quote_deadline_date_to'];
      unset($this->request->params['named']['CrmQuoteRequest.quote_deadline_date_from']);
      unset($this->request->params['named']['CrmQuoteRequest.quote_deadline_date_to']);
      $conditionsDate = "AND ((CrmQuoteRequest.quote_deadline_date_to BETWEEN '$formDate' AND '$toDate') OR (CrmQuoteRequest.quote_deadline_date_from BETWEEN '$formDate' AND '$toDate'))" ;
    }

   /*Conditoins Joints*/
     $options['joins'] =[
        ['type' => 'left', 'table' => 'visitor_details', 'alias' => 'VisitorDetail', 'conditions' => ['VisitorDetail.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],

        ['type' => 'left', 'table' => 'crm_quotes', 'alias' => 'CrmQuote', 'conditions' => ['CrmQuote.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
       ];

   /*Condiition Contain*/     
  $options['contain'] = ['CrmMeetingStatus'=>['name'],'CrmQuoteRequest'=>['RequestByUser.name','CrmMeetingStatus.name','CrmQuoteRequestContact','order'=>'CrmQuoteRequest.id DESC'], 'VisitorDetail.company_name'];

  // $conditions ="".''.$conditionsDate;
  	/*Main Conditions*/
  $conditions = ["CrmQuoteRequest.is_quote_given IN (1,0) AND DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (5)".$conditionsDate];

    
$options['conditions'] = $this->Hetu->named_index($conditions);
      $options['group'] = ['DelegateVisitorEnquiry.id'];
      $options['order'] = ['DelegateVisitorEnquiry.id' => 'DESC'];
      $options['fields'] = ['id','crm_meeting_status_id','is_archive','pre_enquiry_assigned_to_user_id','lead_no','event_domain_id']; 
    if(empty($this->request->params['pass'])){ 
     $this->paginate = $options;
     $this->DelegateVisitorEnquiry->find('all',$options);
     $this->set('totalquoterequest', $this->paginate('DelegateVisitorEnquiry'));
    }else{
        $quoeterequests = $this->DelegateVisitorEnquiry->find('all',$options);
    } 

  $this->loadModel('User');
 /*Requested By User*/
  $newUserDropdown = $this->User->find('list', ['fields' => ['name'],'conditions'=>['User.master_user_type_id IN (4,5,1) OR User.role_id IN (6)'],'contain'=>false,'order'=>'User.name']); 

  $companyNames=$this->DelegateVisitorEnquiry->find('all',['conditions'=>['CrmQuoteRequest.is_quote_given IN (1,0) AND DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (5)'],'contain'=>['VisitorDetail.company_name','CrmQuoteRequest'=>['is_quote_given']],'fields'=>['id','crm_meeting_status_id','is_archive'],'group'=>['DelegateVisitorEnquiry.id']]);


    $companyName = Hash::extract($companyNames,'{n}.VisitorDetail.{n}.company_name');
    $companyName = array_filter(array_unique($companyName));
    $companyName = array_combine($companyName,$companyName);   
  // debug($companyName);exit;



if(!empty($formDate)) {
		// debug($formDate);exit;
         $this->request->params['named']['CrmQuoteRequest.quote_deadline_date_from'] = $formDate;
     }

	if(!empty($toDate)) {
         $this->request->params['named']['CrmQuoteRequest.quote_deadline_date_to'] = $toDate;
     }    

 $this->set(compact('newUserDropdown','formDate','toDate','companyName'));
  // $conditions = 

}

public function admin_quotation_request_raised_report_export(){
  $this->autoRender = false;
  $this->loadModel('DelegateVisitorEnquiry');
  $this->loadModel('CrmQuoteRequest');
  $conditions = [];
  $formDate = '';
  $toDate = '';
  $conditionsDate = '';
    //debug($this->request->params);exit;
    if(!empty($this->request->params['named']['CrmQuoteRequest.quote_deadline_date_from']) && !empty($this->request->params['named']['CrmQuoteRequest.quote_deadline_date_to'])){
      $formDate = $this->request->params['named']['CrmQuoteRequest.quote_deadline_date_from']; 
      $toDate = $this->request->params['named']['CrmQuoteRequest.quote_deadline_date_to'];
      unset($this->request->params['named']['CrmQuoteRequest.quote_deadline_date_from']);
      unset($this->request->params['named']['CrmQuoteRequest.quote_deadline_date_to']);
      $conditionsDate = "AND ((CrmQuoteRequest.quote_deadline_date_to BETWEEN '$formDate' AND '$toDate') OR (CrmQuoteRequest.quote_deadline_date_from BETWEEN '$formDate' AND '$toDate'))" ;
    }

   /*Conditoins Joints*/
     $options['joins'] =[
        ['type' => 'left', 'table' => 'visitor_details', 'alias' => 'VisitorDetail', 'conditions' => ['VisitorDetail.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],

        ['type' => 'left', 'table' => 'crm_quotes', 'alias' => 'CrmQuote', 'conditions' => ['CrmQuote.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
       ];

   /*Condiition Contain*/     
  $options['contain'] = ['CrmMeetingStatus'=>['name'],'CrmQuoteRequest'=>['RequestByUser.name','CrmMeetingStatus.name','CrmQuoteRequestContact','order'=>'CrmQuoteRequest.id DESC'], 'VisitorDetail.company_name'];

  // $conditions ="".''.$conditionsDate;
  	/*Main Conditions*/
  $conditions = ["CrmQuoteRequest.is_quote_given IN (1,0) AND DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (5)".$conditionsDate];

    
$options['conditions'] = $this->Hetu->named_index($conditions);
      $options['group'] = ['DelegateVisitorEnquiry.id'];
      $options['order'] = ['DelegateVisitorEnquiry.id' => 'DESC'];
      $options['fields'] = ['id','crm_meeting_status_id','is_archive','pre_enquiry_assigned_to_user_id','lead_no','event_domain_id']; 
    if(empty($this->request->params['pass'])){ 
     $this->paginate = $options;
     $this->DelegateVisitorEnquiry->find('all',$options);
     $this->set('totalquoterequest', $this->paginate('DelegateVisitorEnquiry'));
    }else{
        $quoeterequests = $this->DelegateVisitorEnquiry->find('all',$options);
    } 
    
    $dataArr = [];
		 $count = 0;
		 $srno=0; $status= '';
		 //debug($quoeterequests);die;
		 foreach ($quoeterequests as $key => $value) {
		 	$srno++;
            //debug($value);
            $requestedBy = $value['CrmQuoteRequest']['RequestByUser']['name'];
            $quoterequestdate = date_format(date_create($value['CrmQuoteRequest']['request_date']),'jS M Y');
            $deadlinedatefrom = date_format(date_create($value['CrmQuoteRequest']['quote_deadline_date_from']),'jS M Y');
            $deadlinedateto = date_format(date_create($value['CrmQuoteRequest']['quote_deadline_date_to']),'jS M Y');
           	$companyName =  (!empty($value['CrmQuoteRequest']['CrmQuoteRequestContact']['company_name'])) ? $value['CrmQuoteRequest']['CrmQuoteRequestContact']['company_name'] : '---';

           	//  debug($companyName);

           	$leadno = (!empty($value['DelegateVisitorEnquiry']['lead_no'])) ? $value['DelegateVisitorEnquiry']['lead_no'] : '---';


		 	$dataArr [] = [$srno,$requestedBy,$quoterequestdate,$deadlinedatefrom,$deadlinedateto,$companyName,$leadno];

		 	
		 }

		$tableHeader[] = ['Sr.No.','Requested By', 'Quote Request Date','Deadline Date From','Deadline Date To',
		'Company Name','Lead No.'];
		
		 $tableDate = array_merge($tableHeader,$dataArr);

		 //debug($tableDate);die;
		 /*Setup Export To Excel*/
		 $currentDate = date('Y-m-d');
		 $fileName = 'Quotation Request Raised Report'.$currentDate;	
		 //debug($fileName);die;
		 $this->export_to_excel($fileName,$tableDate);
}


/*Admin Quoatetion Folloqup repot*/
public function admin_quotation_follow_up_report(){

	$this->layout = 'report';
	$this->loadModel('DelegateVisitorEnquiry');
	$this->loadModel('CrmQuote');
	$this->loadModel('CrmQuoteRequest');
	$this->loadModel('EnquirySourceType');
	$this->loadModel('Event');

	$options = [];
    $conditions = [];
 	 $formDate = $toDate =  $conditionsDate = '';
 	   if(!empty($this->request->params['named']['CrmQuote.quote_date'])){
     		 $formDate = $this->request->params['named']['CrmQuote.quote_date'][0]; 
      	 $toDate = $this->request->params['named']['CrmQuote.quote_date'][1];
    }
 	 /*Conditoins Joints*/
     $options['joins'] =[
        ['type' => 'left', 'table' => 'visitor_details', 'alias' => 'VisitorDetail', 'conditions' => ['VisitorDetail.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],

        ['type' => 'left', 'table' => 'crm_quotes', 'alias' => 'CrmQuote', 'conditions' => ['CrmQuote.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
       ];

     /*Condiition Contain*/
     $options['contain']=['CrmMeetingStatus'=>['name','background'],  'VisitorDetail.company_name', 'CrmQuote' => ['CrmQuoteContac','User.name','QuoteType.name','Currency.iso_code','order'=>'CrmQuote.id DESC'],'PreEnquiryAssignedToUser'=>['id','name'],'CrmQuoteRequest'=>['is_quote_given'],'EnquirySourceType.name','DelegateVisitorEnquiryDetail'=>[
				'fields'=>['delegate_visitor_enquiry_id','event_id','user_id','user_activation_detail_id'],
				'EnquirySourceType.name',
				'Event.name',
				'UserActivationDetail.user_id'=>[
					'User.name'
				],
				'User.name'
			],'CrmLeadStatus.name',
			'CrmFollowup' => [
                'id','crm_stage_id','followup_date',
                'CrmStage'=>['name','color_code'], 'order' => 'CrmFollowup.id DESC','limit'=>1
               ]
		];   
 	
 		/*Main Conditions*/
 		$conditions = ["CrmQuoteRequest.is_quote_given IN (1) AND DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (5,6,7,8)"];


 		$options['conditions'] = $this->Hetu->named_index($conditions);
        $options['group'] = ['DelegateVisitorEnquiry.id'];
        $options['order'] = ['DelegateVisitorEnquiry.id' => 'DESC'];
         $options['fields'] = ['id','crm_meeting_status_id','is_archive','pre_enquiry_assigned_to_user_id','lead_no','event_domain_id','event_id','enquiry_source_type_id','crm_lead_status_id'];	
	    if(empty($this->request->params['pass'])){ 
	     $this->paginate = $options;
	     $this->DelegateVisitorEnquiry->find('all',$options);
	     $this->set('CrmQuoteRequest', $this->paginate('DelegateVisitorEnquiry'));
	    }else{
	    	$QuotetionGivenReport = $this->DelegateVisitorEnquiry->find('all',$options);
	    } 

	    /*debug($QuotetionGivenReport);exit;*/
    	
    /*Requested By User*/
     $UserRequestedBy = $this->User->find('list', ['fields' => ['name'],'conditions'=>['User.master_user_type_id IN (4,5,1) OR User.role_id IN (6)'],'contain'=>false,'order'=>'User.name']);	

     $visitordatails= $this->CrmQuoteRequest->find('all',['fields'=>['id','delegate_visitor_enquiry_id'],'conditions'=>['CrmQuoteRequest.is_quote_given IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (5,6)'],'contain'=>['DelegateVisitorEnquiry'=>['id','lead_no','VisitorDetail'=>['id','company_name'],'Event'=>['id','name'],'EnquirySourceType.name']]]);
    	
    	// debug($visitordatails);exit;

     /*Company Name*/
     $companyName = Hash::extract($visitordatails,'{n}.DelegateVisitorEnquiry.VisitorDetail.0.company_name');
	  $companyName = array_combine($companyName, $companyName);

	  /*Source Name*/
	 $sourceTypes = $this->EnquirySourceType->find('list');
	
	 /*Event Name*/
	 
	 $eventNames = Hash::extract($visitordatails,'{n}.DelegateVisitorEnquiry.Event.name');
	 $eventNames = array_unique(array_filter($eventNames));
	 $eventId = Hash::extract($visitordatails,'{n}.DelegateVisitorEnquiry.Event.id');
	 $eventId = array_unique(array_filter($eventId));
	 $eventNames = array_combine($eventId, $eventNames);
	 
	 $crmleadstatus = $this->DelegateVisitorEnquiry->CrmLeadStatus->find('list',['fields' => 'name']);

     $this->set(compact('UserRequestedBy','companyName','sourceTypes','eventNames','formDate','toDate','crmleadstatus'));

 }

 public function admin_quotation_follow_up_report_export(){
 	$this->autoRender = false;
	$this->loadModel('DelegateVisitorEnquiry');
	$this->loadModel('CrmQuote');
	$this->loadModel('CrmQuoteRequest');
	$this->loadModel('EnquirySourceType');
	$this->loadModel('Event');

	$options = [];
    $conditions = [];
 	 $formDate = $toDate =  $conditionsDate = '';
 	   if(!empty($this->request->params['named']['CrmQuote.quote_date'])){
     		 $formDate = $this->request->params['named']['CrmQuote.quote_date'][0]; 
      	 $toDate = $this->request->params['named']['CrmQuote.quote_date'][1];
    }
 	 /*Conditoins Joints*/
     $options['joins'] =[
        ['type' => 'left', 'table' => 'visitor_details', 'alias' => 'VisitorDetail', 'conditions' => ['VisitorDetail.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],

        ['type' => 'left', 'table' => 'crm_quotes', 'alias' => 'CrmQuote', 'conditions' => ['CrmQuote.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
       ];

     /*Condiition Contain*/
     $options['contain']=['CrmMeetingStatus'=>['name','background'],  'VisitorDetail.company_name', 'CrmQuote' => ['CrmQuoteContac','User.name','QuoteType.name','Currency.iso_code','order'=>'CrmQuote.id DESC'],'PreEnquiryAssignedToUser'=>['id','name'],'CrmQuoteRequest'=>['is_quote_given'],'EnquirySourceType.name','DelegateVisitorEnquiryDetail'=>[
				'fields'=>['delegate_visitor_enquiry_id','event_id','user_id','user_activation_detail_id'],
				'EnquirySourceType.name',
				'Event.name',
				'UserActivationDetail.user_id'=>[
					'User.name'
				],
				'User.name'
			],'CrmLeadStatus.name',
			'CrmFollowup' => [
                'id','crm_stage_id','followup_date',
                'CrmStage'=>['name','color_code'], 'order' => 'CrmFollowup.id DESC','limit'=>1
               ]
		];   
 	
 		/*Main Conditions*/
 		$conditions = ["CrmQuoteRequest.is_quote_given IN (1) AND DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (5,6,7,8)"];


 		$options['conditions'] = $this->Hetu->named_index($conditions);
        $options['group'] = ['DelegateVisitorEnquiry.id'];
        $options['order'] = ['DelegateVisitorEnquiry.id' => 'DESC'];
         $options['fields'] = ['id','crm_meeting_status_id','is_archive','pre_enquiry_assigned_to_user_id','lead_no','event_domain_id','event_id','enquiry_source_type_id','crm_lead_status_id'];	
	    if(empty($this->request->params['pass'])){ 
	     $this->paginate = $options;
	     $this->DelegateVisitorEnquiry->find('all',$options);
	     $this->set('CrmQuoteRequest', $this->paginate('DelegateVisitorEnquiry'));
	    }else{
	    	$QuotetionGivenReport = $this->DelegateVisitorEnquiry->find('all',$options);
	    } 

	    //debug($QuotetionGivenReport);die;
	     $dataArr = [];		
		 $srno=0;
		 //debug($quoeterequests);die;
		 foreach ($QuotetionGivenReport as $key => $value) {
		 	$srno++;
            //debug($value);
           $referernceNo = (!empty($value['CrmQuote'][0]['internal_reference_no'])) ? $value['CrmQuote'][0]['internal_reference_no'] : '---';
           $assiendUser = (!empty($value['PreEnquiryAssignedToUser']['name'])) ? $value['PreEnquiryAssignedToUser']['name'] : '---';
           $companyName = (!empty($value['VisitorDetail'][0]['company_name'])) ? $value['VisitorDetail'][0]['company_name'] : '---';
           $status = (!empty($value['CrmLeadStatus']['name'])) ? $value['CrmLeadStatus']['name'] : '---';
           $stage = (!empty($value['CrmFollowup'][0]['CrmStage']['name'])) ? $value['CrmFollowup'][0]['CrmStage']['name'] : '---';
           $quotationDate = (!empty($value['CrmQuote'][0]['quote_date'])) ? date_format(date_create($value['CrmQuote'][0]['quote_date']),'jS M Y') : '---';

           $quotationAmount = $value['CrmQuote'][0]['Currency']['iso_code'].' '.number_format($value['CrmQuote'][0]['value_in_other_currency'],2);

           $quotationInr = number_format($value['CrmQuote'][0]['value_in_inr'],2);

           //debug($quotationInr);die;

		 	$dataArr [] = [$srno,$referernceNo,$assiendUser,$companyName,$status,$stage,$quotationDate,$quotationAmount,$quotationInr];

		 	
		 }

		$tableHeader[] = ['Sr.No.','Internal Reference No.', 'Assiend User','Company Name','Status',
		'Last Followup','Quotation Date','Quotation Amount','Quotation Value In INR'];
		
		 $tableDate = array_merge($tableHeader,$dataArr);

		 //debug($tableDate);die;
		 /*Setup Export To Excel*/
		 $currentDate = date('Y-m-d');
		 $fileName = 'Quotation Follow-Up Report'.$currentDate;	
		 //debug($fileName);die;
		 $this->export_to_excel($fileName,$tableDate);
 }

 /*EVENT-WISE INVESTMENT vs CONVERSION REPORT*/
public function admin_event_conversion_report(){
  ini_set('memory_limit', '-1');
  ini_set('max_execution_time', 500);
  $this->layout = 'report';
  $this->loadModel('Event');
  $this->loadModel('BudgetDetail');
  $this->loadModel('DelegateVisitorEnquiry');
  $this->loadModel('SaleUpload');
  $this->loadModel('CrmQuote');

 /*Define Array*/   
 $eventlistings = $BudgetDetailsArr = $DelegateArr = $SaleUploadArr = $ConversionValueArr = $QuotedValueArr = [];
   
 /*Define Variable*/
 $formDate = $toDate =  $conditionsDate = $EventEnquiries = $CountryEnquiries = $CityEnquiries = '';

  /*Date Range Search */
  if(!empty($this->request->params['named']['Event.start_date'])){
      $formDate = $this->request->params['named']['Event.start_date']; 
      $toDate = $this->request->params['named']['Event.end_date'];
         unset($this->request->params['named']['Event.start_date']);
         unset($this->request->params['named']['Event.end_date']);
         $conditionsDate = "(Event.start_date BETWEEN '$formDate' AND '$toDate')" . " AND ";
  }

  /*Event Search Filter*/
   if(!empty($this->request->params['named']['Event.id'])){
    $eventId=$this->request->params['named']['Event.id'];
    $eventIds=$this->Event->find('list',['conditions'=>['Event.id IN ('.$eventId.')'],'fields'=>['id']]);
    unset($this->request->params['named']['Event.id']);

    $eventIds = implode(",",$eventIds);
    if(empty($eventIds)){
      $eventIds = 0;
    }

    $EventEnquiries=" Event.id IN (".$eventIds.") AND ";
  }

   /*Country Name Search Filter*/
   if(!empty($this->request->params['named']['Country.name'])) {
     $countryName = $this->request->params['named']['Country.name'];
      $countries = $this->Event->find('list',['fields'=>['id'],'conditions'=>['Country.name'=>$countryName],'contain'=>['Country'],'group'=>['Event.id']]);
       unset($this->request->params['named']['Country.name']);
       if(!empty($countries)){
         $countries = array_filter(array_unique($countries));
         $countries = implode(",", $countries);
         $CountryEnquiries = "Event.id IN (" . $countries . ") AND ";
       }
     }

     /*City Name Search Filter*/
   if(!empty($this->request->params['named']['City.name'])) {
       $CityName = $this->request->params['named']['City.name'];
        $cities = $this->Event->find('list',['fields'=>['id'],'conditions'=>['City.name'=>$CityName],'contain'=>['City'],'group'=>['Event.id']]);
        
         unset($this->request->params['named']['City.name']);
         if(!empty($CityName)){
           $cities = array_filter(array_unique($cities));
           $cities = implode(",", $cities);
           $CityEnquiries = "Event.id IN (" . $cities . ") AND ";
         }    
    }   
   /*Main Query*/
  $events = $this->Event->query('
      Select * ,(Select Country.name from countries AS Country where Country.id = Event.country_id ) As Countryname ,(Select City.name from cities AS City where City.id = Event.city_id ) As Cityname
      From events AS Event where '.$conditionsDate.' '.$EventEnquiries.' '.$CountryEnquiries.' '.$CityEnquiries.' ((Event.is_exhibiting= 1) OR (Event.is_visiting= 1))
      ORDER BY Event.id DESC
  ');

  //debug($events);die;
   
  /*Main Conditions */
   foreach ($events as $key => $value) {
       $eventlistings ['Event'][$key]= $value['Event'];
       $eventlistings ['Event'][$key]['EventDetails']= $value['0'];
   }

   /*Event IDs*/
   $eventid = Hash::extract($events,'{n}.Event.id');
   $eventid = implode(",", $eventid);
   if(empty($eventid)) { $eventid = 0;}

    /*Budget Details Query*/
    $eventbudget = $this->BudgetDetail->query('
       Select  *  From budget_details AS  BudgetDetail where  BudgetDetail.event_id in ('.$eventid.') 
     ');
    
    $cCounter = $costCounter = 0;
    foreach ($eventbudget as $key => $BudgedArr) {
       $BudgetDetailsArr[$BudgedArr['BudgetDetail']['event_id']]['BudgetDetail'][$cCounter] = $BudgedArr['BudgetDetail']; 
    $cCounter++;
    }

   /*Delegate Enquiries*/
   $DelegateEnquiries = $this->DelegateVisitorEnquiry->query('
     Select  id,event_id From delegate_visitor_enquiries AS  DelegateVisitorEnquiry where  DelegateVisitorEnquiry.event_id in ('.$eventid.') 
   ');

   $DelegateId = Hash::extract($DelegateEnquiries,'{n}.DelegateVisitorEnquiry.id');
   $DelegateId = implode(",", $DelegateId);
   if(empty($DelegateId)) { $DelegateId = 0;}

   // debug($eventid);exit;


   /*Delegate Enquiries Array*/
   foreach ($DelegateEnquiries as $DellArr) {
        $DelegateArr[$DellArr['DelegateVisitorEnquiry']['event_id']]['DelegateVisitorEnquiry'][$cCounter] = $DellArr['DelegateVisitorEnquiry']; 
        $cCounter++;
   }

   /*Sale Upload*/
   $saleupload = $this->SaleUpload->query('
    Select * from sale_uploads AS SaleUpload where SaleUpload.delegate_visitor_enquiry_id in ('.$DelegateId.') 
   ');

   foreach ($saleupload as $key => $SaleArr) {
        $SaleUploadArr[$SaleArr['SaleUpload']['delegate_visitor_enquiry_id']]['SaleUpload'] = $SaleArr['SaleUpload']; 
   }


/* Delegete Id For Conversion Value (CV) */
  $DelegateconvertionId = Hash::extract($saleupload,'{n}.SaleUpload.delegate_visitor_enquiry_id');
  $DelegateconvertionId = implode(",", $DelegateconvertionId);
  if(empty($DelegateconvertionId)) { $DelegateconvertionId = 0;}

  // debug($DelegateconvertionId);exit;

  /*Conversion Value (CV)*/
  $convertionvalue = $this->CrmQuote->query('
    Select * from crm_quotes AS CrmQuote where CrmQuote.delegate_visitor_enquiry_id in ('.$DelegateconvertionId.') 
    ORDER BY CrmQuote.id DESC
    LIMIT 1
   ');

  foreach ($convertionvalue as $key => $CvArr) {
        $ConversionValueArr[$CvArr['CrmQuote']['delegate_visitor_enquiry_id']]['CrmQuote'] = $CvArr['CrmQuote']; 
   }

   /*Quoted Value (QV)*/
   $QuotedValue = $this->CrmQuote->query('
    Select * from crm_quotes AS CrmQuote where CrmQuote.delegate_visitor_enquiry_id in ('.$DelegateId.')

   ');


   foreach ($QuotedValue as $key => $QuoteArr) {
        $QuotedValueArr[$QuoteArr['CrmQuote']['delegate_visitor_enquiry_id']]['CrmQuote'][$cCounter] = $QuoteArr['CrmQuote']; 
        $cCounter++;
   }

   /*Event Name*/
  $this->loadModel('Event');
  $eventNames = $this->Event->find('list', ['conditions'=>['OR'=>['is_visiting'=>'1','is_exhibiting'=>'1'],],'fields'=>['id', 'name']]);

  $EventDetails = $this->Event->query('
      Select * From events AS Event where ((Event.is_exhibiting= 1) OR (Event.is_visiting= 1))
  ');

  /* Country Name Search Filter */
  $this->loadModel('Country');
  $countryId = Hash::extract($EventDetails,'{n}.Event.country_id');
  $countryId = array_filter(array_unique($countryId));
  $countries = $this->Country->find('list',['fields'=>['name','name'],'conditions'=>['Country.id'=>$countryId]]);

  /* City Name Search Filter */
  $this->loadModel('City');
  $cityids = Hash::extract($EventDetails,'{n}.Event.city_id');
  $cityids = array_filter(array_unique($cityids));
  $cityName = $this->City->find('list',['fields'=>['name','name'],'conditions'=>['City.id'=>$cityids]]);

  // debug($countries);exit;


  if(!empty($eventId)) {$this->request->params['named']['Event.id'] = $eventId;}
  if(!empty($countryName)) {$this->request->params['named']['Country.name'] = $countryName;}  
   if(!empty($CityName)) {$this->request->params['named']['City.name'] = $CityName;}

   $this->set(compact('formDate','toDate','eventlistings','BudgetDetailsArr','DelegateArr','SaleUploadArr','ConversionValueArr','QuotedValueArr','eventNames','countries','cityName'));

}

/*For User*/
public function user_event_conversion_report(){
  $this->admin_event_conversion_report  ();
}

public function admin_event_conversion_export(){
    $this->autoRender = false;
     $this->loadModel('Event');
  $this->loadModel('BudgetDetail');
  $this->loadModel('DelegateVisitorEnquiry');
  $this->loadModel('SaleUpload');
  $this->loadModel('CrmQuote');

 /*Define Array*/   
 $eventlistings = $BudgetDetailsArr = $DelegateArr = $SaleUploadArr = $ConversionValueArr = $QuotedValueArr = [];
   
 /*Define Variable*/
 $formDate = $toDate =  $conditionsDate = $EventEnquiries = $CountryEnquiries = $CityEnquiries = '';

  /*Date Range Search */
  if(!empty($this->request->params['named']['Event.start_date'])){
      $formDate = $this->request->params['named']['Event.start_date']; 
      $toDate = $this->request->params['named']['Event.end_date'];
         unset($this->request->params['named']['Event.start_date']);
         unset($this->request->params['named']['Event.end_date']);
         $conditionsDate = "(Event.start_date BETWEEN '$formDate' AND '$toDate')" . " AND ";
  }

  /*Event Search Filter*/
   if(!empty($this->request->params['named']['Event.id'])){
    $eventId=$this->request->params['named']['Event.id'];
    $eventIds=$this->Event->find('list',['conditions'=>['Event.id IN ('.$eventId.')'],'fields'=>['id']]);
    unset($this->request->params['named']['Event.id']);

    $eventIds = implode(",",$eventIds);
    if(empty($eventIds)){
      $eventIds = 0;
    }

    $EventEnquiries=" Event.id IN (".$eventIds.") AND ";
  }

   /*Country Name Search Filter*/
   if(!empty($this->request->params['named']['Country.name'])) {
     $countryName = $this->request->params['named']['Country.name'];
      $countries = $this->Event->find('list',['fields'=>['id'],'conditions'=>['Country.name'=>$countryName],'contain'=>['Country'],'group'=>['Event.id']]);
       unset($this->request->params['named']['Country.name']);
       if(!empty($countries)){
         $countries = array_filter(array_unique($countries));
         $countries = implode(",", $countries);
         $CountryEnquiries = "Event.id IN (" . $countries . ") AND ";
       }
     }

     /*City Name Search Filter*/
   if(!empty($this->request->params['named']['City.name'])) {
       $CityName = $this->request->params['named']['City.name'];
        $cities = $this->Event->find('list',['fields'=>['id'],'conditions'=>['City.name'=>$CityName],'contain'=>['City'],'group'=>['Event.id']]);
        
         unset($this->request->params['named']['City.name']);
         if(!empty($CityName)){
           $cities = array_filter(array_unique($cities));
           $cities = implode(",", $cities);
           $CityEnquiries = "Event.id IN (" . $cities . ") AND ";
         }    
    }   
   /*Main Query*/
  $events = $this->Event->query('
      Select * ,(Select Country.name from countries AS Country where Country.id = Event.country_id ) As Countryname ,(Select City.name from cities AS City where City.id = Event.city_id ) As Cityname
      From events AS Event where '.$conditionsDate.' '.$EventEnquiries.' '.$CountryEnquiries.' '.$CityEnquiries.' ((Event.is_exhibiting= 1) OR (Event.is_visiting= 1))
      ORDER BY Event.id DESC
  ');

   /*Main Conditions */
   foreach ($events as $key => $value) {
       $eventlistings ['Event'][$key]= $value['Event'];
       $eventlistings ['Event'][$key]['EventDetails']= $value['0'];
   }

   /*Event IDs*/
   $eventid = Hash::extract($events,'{n}.Event.id');
   $eventid = implode(",", $eventid);
   if(empty($eventid)) { $eventid = 0;}

    /*Budget Details Query*/
    $eventbudget = $this->BudgetDetail->query('
       Select  *  From budget_details AS  BudgetDetail where  BudgetDetail.event_id in ('.$eventid.') 
     ');
    
    $cCounter = $costCounter = 0;
    foreach ($eventbudget as $key => $BudgedArr) {
       $BudgetDetailsArr[$BudgedArr['BudgetDetail']['event_id']]['BudgetDetail'][$cCounter] = $BudgedArr['BudgetDetail']; 
    $cCounter++;
    }

   /*Delegate Enquiries*/
   $DelegateEnquiries = $this->DelegateVisitorEnquiry->query('
     Select  id,event_id From delegate_visitor_enquiries AS  DelegateVisitorEnquiry where  DelegateVisitorEnquiry.event_id in ('.$eventid.') 
   ');

   $DelegateId = Hash::extract($DelegateEnquiries,'{n}.DelegateVisitorEnquiry.id');
   $DelegateId = implode(",", $DelegateId);
   if(empty($DelegateId)) { $DelegateId = 0;}

   // debug($eventid);exit;


   /*Delegate Enquiries Array*/
   foreach ($DelegateEnquiries as $DellArr) {
        $DelegateArr[$DellArr['DelegateVisitorEnquiry']['event_id']]['DelegateVisitorEnquiry'][$cCounter] = $DellArr['DelegateVisitorEnquiry']; 
        $cCounter++;
   }

   /*Sale Upload*/
   $saleupload = $this->SaleUpload->query('
    Select * from sale_uploads AS SaleUpload where SaleUpload.delegate_visitor_enquiry_id in ('.$DelegateId.') 
   ');

   foreach ($saleupload as $key => $SaleArr) {
        $SaleUploadArr[$SaleArr['SaleUpload']['delegate_visitor_enquiry_id']]['SaleUpload'] = $SaleArr['SaleUpload']; 
   }


/* Delegete Id For Conversion Value (CV) */
  $DelegateconvertionId = Hash::extract($saleupload,'{n}.SaleUpload.delegate_visitor_enquiry_id');
  $DelegateconvertionId = implode(",", $DelegateconvertionId);
  if(empty($DelegateconvertionId)) { $DelegateconvertionId = 0;}

  // debug($DelegateconvertionId);exit;

  /*Conversion Value (CV)*/
  $convertionvalue = $this->CrmQuote->query('
    Select * from crm_quotes AS CrmQuote where CrmQuote.delegate_visitor_enquiry_id in ('.$DelegateconvertionId.') 
    ORDER BY CrmQuote.id DESC
    LIMIT 1
   ');

  foreach ($convertionvalue as $key => $CvArr) {
        $ConversionValueArr[$CvArr['CrmQuote']['delegate_visitor_enquiry_id']]['CrmQuote'] = $CvArr['CrmQuote']; 
   }

   /*Quoted Value (QV)*/
   $QuotedValue = $this->CrmQuote->query('
    Select * from crm_quotes AS CrmQuote where CrmQuote.delegate_visitor_enquiry_id in ('.$DelegateId.')

   ');


   foreach ($QuotedValue as $key => $QuoteArr) {
        $QuotedValueArr[$QuoteArr['CrmQuote']['delegate_visitor_enquiry_id']]['CrmQuote'][$cCounter] = $QuoteArr['CrmQuote']; 
        $cCounter++;
   }


  //debug($events);die; 
        //debug($QuotetionGivenReport);die;
       $dataArr = [];   
     //$srno=0;
     //debug($quoeterequests);die;
     foreach ($eventlistings['Event'] as $event){
        //debug($event);
        $totalinvestment = $totalconversion = $eventconversionCount = $totalConversionvalue = $totalDiffrence = $totalQuotevalue = $conversionratio = '';
        $Investment = $conversion = $eventconversion = $conversionvalue = $quotedvalue = [];
                         /*Budget Investment*/
          if(isset($BudgetDetailsArr[$event['id']]) && !empty($BudgetDetailsArr[$event['id']])){
                            foreach($BudgetDetailsArr[$event['id']]['BudgetDetail'] as $key => $BudgetDetails){
                               $Investment [] = $BudgetDetails['cost_inr'];
                            }
                         }

                         /*Delegate Enquiries*/
          if(isset($DelegateArr[$event['id']]) && !empty($DelegateArr[$event['id']])){
                            foreach($DelegateArr[$event['id']]['DelegateVisitorEnquiry'] as $key => $DelegateVisitorEnquiry){
                             /*Total No. of Conversions*/
                             if(isset($SaleUploadArr[$DelegateVisitorEnquiry['id']]['SaleUpload'])){
                                $eventconversion [] = $SaleUploadArr[$DelegateVisitorEnquiry['id']]['SaleUpload'];
                             }

                             /*Conversion Value (CV)*/
                              if(isset($ConversionValueArr[$DelegateVisitorEnquiry['id']]['CrmQuote'])){
                                $conversionvalue [] = $ConversionValueArr[$DelegateVisitorEnquiry['id']]['CrmQuote']['value_in_inr'];
                             }

                             // /*Quoted Value (QV)*/
                             if(isset($QuotedValueArr[$DelegateVisitorEnquiry['id']]['CrmQuote'])){
                                foreach($QuotedValueArr[$DelegateVisitorEnquiry['id']]['CrmQuote'] as $key => $QuoteDetails){
                                   $quotedvalue [] = $QuoteDetails['value_in_inr'];
                                 }
                             }
                            }
                         }
                         
                         /*Total Investment*/
                         $totalinvestment = array_sum($Investment);
                         /* Total No. of Conversions Enquiries*/
                         $eventconversionCount = count($eventconversion);
                         /*Total Coversion Value*/ 
                         $totalConversionvalue = array_sum($conversionvalue);

                         /*Diffrence Amount*/
                         $totalDiffrence = $totalConversionvalue - $totalinvestment;
                         //$totalDiffrence = number_format($totalDiffrence,2);
                         //*Quoted Value (QV)*/
                         $totalQuotevalue = array_sum($quotedvalue);

                         /*Conversion Ration*/
                         if($totalConversionvalue != 0){
                           $conversionratio = ($totalConversionvalue / $totalQuotevalue ) * 100;
                         }else{
                           $conversionratio = 0;
                         }

      //$srno++;
            //debug($event);

           $startDate = (!empty($event['start_date'])) ? date_format(date_create($event['start_date']),'jS M Y') : '---';
           $endDate = (!empty($event['end_date'])) ? date_format(date_create($event['end_date']),'jS M Y') : '---';

           $eventName = (!empty($event['name'])) ? $event['name'] : '---';

           $eventCountry = (!empty($event['EventDetails']['Countryname'])) ? $event['EventDetails']
           ['Countryname'] : '---';

           $eventCity = (!empty($event['EventDetails']['Cityname'])) ? $event['EventDetails']
           ['Cityname'] : '---';


           $incurrend = (!empty($totalinvestment)) ? 
                'INR'." ".number_format($totalinvestment,2) : "INR".' '.'0';

           //debug($totalinvestment);

           $noofConversions = (!empty($eventconversionCount)) ? $eventconversionCount : '0';

           //debug($noofConversions);

           $conversionValue = (!empty($totalConversionvalue)) ? 
           'INR'." ".number_format($totalConversionvalue,2) : "INR".' '.'0';

            //debug($conversionValue);

           $difference = (!empty($totalDiffrence)) ? 'INR'." ".number_format($totalDiffrence,2) : "INR".' '.'0';

           //debug($difference);

           $quotedValue = (!empty($totalQuotevalue)) ? 'INR'." ".number_format($totalQuotevalue,2) : "INR".' '.'0';

           //debug($quotedValue);

           $conversionratio = round($conversionratio).' '.'%'; 

           //debug($conversionratio);

           if($totalinvestment > $totalConversionvalue) {
             $Type = "Loss";
            }else{
              $Type = "Profit";
            }


      $dataArr [] = [$startDate,$endDate,$eventName,$eventCountry,$eventCity,$incurrend,$noofConversions,
        $conversionValue,$difference,$quotedValue,$conversionratio,$Type];

      
     }

    $tableHeader[] = ['Event Start Date','Event End Date', 'Event Name','Event Country','Event City',
    'Incurred Investment','Total No. of Conversions','Conversion Value (CV)','Difference','Quoted Value (QV)','Conversion Ratio','Type'];
    
     $tableDate = array_merge($tableHeader,$dataArr);

     //debug($tableDate);die;
     /*Setup Export To Excel*/
     $currentDate = date('Y-m-d');
     $fileName = 'Event-Wise Investment vs Conversion Report'.$currentDate; 
     //debug($fileName);die;
     $this->export_to_excel($fileName,$tableDate);

}

/*Upcomin Payment Reports For Project */
/*For Admin*/
public function admin_upcoming_payment_report_for_project(){  
  $this->layout = 'report'; 
  $this->loadModel('DelegateVisitorEnquiry');
  $this->loadModel('DelegateVisitorEnquiryDetail');
  $this->loadModel('SaleUpload');
  $this->loadModel('SalesPaymentScheduleProject');
  
  $options = [];
  $conditions = [];
  $startDate = $endDate = '';
  $conditionsDate = '';

    /*Conditions Joint*/
      $options['joins'] = [

       ['type' => 'inner','table' => 'sale_uploads', 'alias' => 'Sales',
      'conditions'=> ['Sales.id = SalesPaymentScheduleProject.sale_upload_id']],

      ['type' => 'left','table' => 'delegate_visitor_enquiries', 'alias' => 'DelegateVisitorEnquiry',
        'conditions'=> ['DelegateVisitorEnquiry.id = Sales.delegate_visitor_enquiry_id']
       ],

        ['type' => 'left','table' => 'visitor_details', 'alias' => 'VisitorDetail',
        'conditions'=> ['VisitorDetail.delegate_visitor_enquiry_id = Sales.delegate_visitor_enquiry_id']
       ], 
  
   ];

  /*Conditions Contain*/
    $options['contain'] = [
      'SaleUpload'=>[
        'fields'=>['id','conversion_rate','sales_date','delegate_visitor_enquiry_id'],  
        'DelegateVisitorEnquiry'=>[
            'id','market_id','pre_enquiry_no','event_id','user_activation_detail_id',
            'Market.name',
            'Event'=>['name','alias'],
          'CrmAssignedPreEnquiry'=>['fields'=>['id','pre_enquiry_assigned_to_user_id'],
            'PreEnquiryAssignedToUser.name','order'=>'CrmAssignedPreEnquiry.id DESC','limit'=>1],
            'EnquirySourceType.name',
          'UserActivationDetail'=>['user_id','User.name'],
          'VisitorDetail'=>['company_name', 'Country.name', 'City.name',],
          'DelegateVisitorEnquiryDetail' => ['id','user_activation_detail_id','UserActivationDetail.user_id' => ['User.name'],'User.name'],
          'PreEnquiryAssignedToUser.name',
          ],
        ]
    ];


    $options['conditions'] = $this->Hetu->named_index($conditions);
    $options['group'] = ['SalesPaymentScheduleProject.id'];
  $options['order'] = ['SalesPaymentScheduleProject.id'=>'DESC'];
  if(empty($this->request->params['pass'])){ 
   $this->SalesPaymentScheduleProject->find('all',$options);
   $this->paginate = $options;
  $this->set('totalupcomingpaymetforprojects', $this->paginate('SalesPaymentScheduleProject'));
  }else{
     $totalupcomingpaymetforprojects = $this->SalesPaymentScheduleProject->find('all',$options);
    $this->set(compact('totalupcomingpaymetforprojects'));
  }

   $visitordatails= $this->DelegateVisitorEnquiry->find('all',['fields'=>['id','market_id'],'conditions'=>['DelegateVisitorEnquiry.is_send_project'=>true],'contain'=>['VisitorDetail'=>['id','company_name','city_id','country_id']]]);

      /* Company Name Search Filter */
    $companyName = Hash::extract($visitordatails,'{n}.VisitorDetail.{n}.company_name');
    $companyName = array_filter(array_unique($companyName));  
    $companyName = array_combine($companyName,$companyName);

    /*Market Name Search Filter*/
    $this->loadModel('Market');
    $marketid = Hash::extract($visitordatails,'{n}.DelegateVisitorEnquiry.market_id');
    $marketid = array_filter(array_unique($marketid));
    $markets = $this->Market->find('list',['fields'=>['id','name'],'conditions'=>['Market.id'=>$marketid]]);

    /* Country Name Search Filter */
    $this->loadModel('Country');
    $countryId = Hash::extract($visitordatails,'{n}.VisitorDetail.{n}.country_id');
    $countryId = array_filter(array_unique($countryId));
    $countries = $this->Country->find('list',['fields'=>['id','name'],'conditions'=>['Country.id'=>$countryId]]);

    /* City Name Search Filter */
    $this->loadModel('City');
    $cityids = Hash::extract($visitordatails,'{n}.VisitorDetail.{n}.city_id');
    $cityids = array_filter(array_unique($cityids));        
    $cityName = $this->City->find('list',['fields'=>['id','name'],'conditions'=>['City.id'=>$cityids]]);

    // debug($cityName);exit;

    // debug($cityName);exit;
    $eventNames = $this->DelegateVisitorEnquiry->find('list',['fields'=>['Event.id','Event.name'],'contain'=>['Event.name'],'conditions'=>['DelegateVisitorEnquiry.is_send_project '=>true,
      'OR'=>[
        'is_visiting'=>'1',
        'is_exhibiting'=>'1'
      ]]]    
    );
    
    $this->loadModel('EnquirySourceType');
    $sourceTypes = $this->EnquirySourceType->find('list',['fields'=>['id','name']]);

    // debug($sourceTypes);exit;

  $this->set(compact('companyName','markets','countries','cityName','eventNames','sourceTypes'));

}

/*For User*/
public function user_upcoming_payment_report_for_project(){
    $this->admin_upcoming_payment_report_for_project();
}

public function admin_upcoming_payment_report_for_project_export(){
   $this->autoRender = false;
     $this->loadModel('DelegateVisitorEnquiry');
  $this->loadModel('DelegateVisitorEnquiryDetail');
  $this->loadModel('SaleUpload');
  $this->loadModel('SalesPaymentScheduleProject');
  
  $options = [];
  $conditions = [];
  $startDate = $endDate = '';
  $conditionsDate = '';

    /*Conditions Joint*/
      $options['joins'] = [

       ['type' => 'inner','table' => 'sale_uploads', 'alias' => 'Sales',
      'conditions'=> ['Sales.id = SalesPaymentScheduleProject.sale_upload_id']],

      ['type' => 'left','table' => 'delegate_visitor_enquiries', 'alias' => 'DelegateVisitorEnquiry',
        'conditions'=> ['DelegateVisitorEnquiry.id = Sales.delegate_visitor_enquiry_id']
       ],

        ['type' => 'left','table' => 'visitor_details', 'alias' => 'VisitorDetail',
        'conditions'=> ['VisitorDetail.delegate_visitor_enquiry_id = Sales.delegate_visitor_enquiry_id']
       ], 
  
   ];

  /*Conditions Contain*/
    $options['contain'] = [
      'SaleUpload'=>[
        'fields'=>['id','conversion_rate','sales_date','delegate_visitor_enquiry_id'],  
        'DelegateVisitorEnquiry'=>[
            'id','market_id','pre_enquiry_no','event_id','user_activation_detail_id',
            'Market.name',
            'Event'=>['name','alias'],
          'CrmAssignedPreEnquiry'=>['fields'=>['id','pre_enquiry_assigned_to_user_id'],
            'PreEnquiryAssignedToUser.name','order'=>'CrmAssignedPreEnquiry.id DESC','limit'=>1],
            'EnquirySourceType.name',
          'UserActivationDetail'=>['user_id','User.name'],
          'VisitorDetail'=>['company_name', 'Country.name', 'City.name',],
          'DelegateVisitorEnquiryDetail' => ['id','user_activation_detail_id','UserActivationDetail.user_id' => ['User.name'],'User.name'],
          'PreEnquiryAssignedToUser.name',
          ],
        ]
    ];


    $options['conditions'] = $this->Hetu->named_index($conditions);
    $options['group'] = ['SalesPaymentScheduleProject.id'];
  $options['order'] = ['SalesPaymentScheduleProject.id'=>'DESC'];
  if(empty($this->request->params['pass'])){ 
   $this->SalesPaymentScheduleProject->find('all',$options);
   $this->paginate = $options;
  $this->set('totalupcomingpaymetforprojects', $this->paginate('SalesPaymentScheduleProject'));
  }else{
     $totalupcomingpaymetforprojects = $this->SalesPaymentScheduleProject->find('all',$options);
    $this->set(compact('totalupcomingpaymetforprojects'));
  }

         $dataArr = [];   
     $srno=0;
     //debug($quoeterequests);die;
     foreach ($totalupcomingpaymetforprojects as $key => $value) {
      $srno++;
            //debug($value);die;
           $paymentDate = (!empty($value['SalesPaymentScheduleProject']['month'].'-'.$value['SalesPaymentScheduleProject']['year'])) ? $value['SalesPaymentScheduleProject']['month'].'-'.$value['SalesPaymentScheduleProject']['year'] : '---';

           $valueUsd = (!empty($value['SalesPaymentScheduleProject']['value_in_inr'])) ? 
                        number_format($value['SalesPaymentScheduleProject']['value_in_inr'],2) : '---';

           $conversionRate = (!empty($value['SaleUpload']['conversion_rate'])) ?
                          number_format($value['SaleUpload']['conversion_rate'],2)
                          : '---' ;            

           $valueInr = (!empty($value['SalesPaymentScheduleProject']['value_in_other_currency'])) ? number_format($value['SalesPaymentScheduleProject']['value_in_other_currency'],2) : '---' ;

           $salesDate = (!empty($value['SaleUpload']['sales_date'])) ? date_format(date_create($value['SaleUpload']['sales_date']),'jS F Y') : '---' ;

           $companyName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['company_name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['company_name'] : '---';

           $market = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['Market']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['Market']['name'] : '---';

           $country = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['Country']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['Country']['name'] : '---';

           $city = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['City']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['City']['name'] : '---';

                 if($value['SaleUpload']['DelegateVisitorEnquiry']['event_id'] == null){
                             if($value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['user_activation_detail_id'] == null){ 
                               if(!empty($value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['User'])){
                                  $primaryOwner =  $value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['User']['name'];
                               }else{
                                  $primaryOwner = '---';
                               }
                             }else{
                               if(!empty($value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['UserActivationDetail']['User'])){
                                  $primaryOwner = $value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['UserActivationDetail']['User']['name'];
                               }else{
                                  $primaryOwner = "---";
                               }
                             }
                           }else{
                             if($value['SaleUpload']['DelegateVisitorEnquiry']['user_activation_detail_id'] == null){
                               if(!empty($value['SaleUpload']['DelegateVisitorEnquiry']['PreEnquiryAssignedToUser']['name'])){
                                    $primaryOwner = $value['SaleUpload']['DelegateVisitorEnquiry']['PreEnquiryAssignedToUser']['name'];
                                 }else{
                                    $primaryOwner = '---';
                                 }
                             }else{
                               if(!empty($value['SaleUpload']['DelegateVisitorEnquiry']['UserActivationDetail']['User']['name'])){
                                 $primaryOwner = $value['SaleUpload']['DelegateVisitorEnquiry']['UserActivationDetail']['User']['name'];
                              } else {$primaryOwner = '---';}
                             } 
                            } 

        $assingedTo = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['CrmAssignedPreEnquiry']
                  ['PreEnquiryAssignedToUser']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']
                ['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'] :  '---';
           //debug($assingedTo);die;

        $preenquiryNo = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['pre_enquiry_no'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['pre_enquiry_no'] : '---' ;

        $sourceName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['EnquirySourceType']['name'])) ?
                      $value['SaleUpload']['DelegateVisitorEnquiry']['EnquirySourceType']['name'] : '---';

        $eventName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['Event']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['Event']['name'] : '---' ;


        //debug($eventName);die;

      $dataArr [] = [$srno,$paymentDate,$valueUsd,$conversionRate,$valueInr,$salesDate,$companyName,$market,$country,
        $city,$primaryOwner,$assingedTo,$preenquiryNo,$sourceName,$eventName];

      
     }

    $tableHeader[] = ['Sr.No.','Payment Month & Year', 'Value (in USD)','Conversion Rate','Value (in INR)',
    'Sales Date','Company Name','Market ','Country','City','Primary Owner','Assigned to','Pre-Enuiry No.',
    'Source Name','Event Name'];
    
     $tableDate = array_merge($tableHeader,$dataArr);

     //debug($tableDate);die;
     /*Setup Export To Excel*/
     $currentDate = date('Y-m-d');
     $fileName = 'Upcoming Payment Report For Project'.$currentDate; 
     //debug($fileName);die;
     $this->export_to_excel($fileName,$tableDate);


}


/*Upcoming Payment Report for Product*/
public function admin_upcoming_payment_report_for_product(){
  $this->layout = 'report'; 
  $this->loadModel('DelegateVisitorEnquiry');
  $this->loadModel('DelegateVisitorEnquiryDetail');
  $this->loadModel('SaleUpload');
  $this->loadModel('SalesPaymentSchedule');
  
  $options = [];
  $conditions = [];
  $startDate = $endDate = '';
  $conditionsDate = '';

    /*Conditions Joint*/
      $options['joins'] = [

       ['type' => 'inner','table' => 'sale_uploads', 'alias' => 'Sales',
      'conditions'=> ['Sales.id = SalesPaymentSchedule.sale_upload_id']],

      ['type' => 'left','table' => 'delegate_visitor_enquiries', 'alias' => 'DelegateVisitorEnquiry',
        'conditions'=> ['DelegateVisitorEnquiry.id = Sales.delegate_visitor_enquiry_id']
       ],

        ['type' => 'left','table' => 'visitor_details', 'alias' => 'VisitorDetail',
        'conditions'=> ['VisitorDetail.delegate_visitor_enquiry_id = Sales.delegate_visitor_enquiry_id']
       ], 
  
   ];

  /*Conditions Contain*/
    $options['contain'] = [
      'SaleUpload'=>[
        'fields'=>['id','conversion_rate','sales_date','delegate_visitor_enquiry_id'],  
        'DelegateVisitorEnquiry'=>[
            'id','market_id','pre_enquiry_no','event_id','user_activation_detail_id',
            'Market.name',
            'Event'=>['name','alias'],
          'CrmAssignedPreEnquiry'=>['fields'=>['id','pre_enquiry_assigned_to_user_id'],
            'PreEnquiryAssignedToUser.name','order'=>'CrmAssignedPreEnquiry.id DESC','limit'=>1],
            'EnquirySourceType.name',
          'UserActivationDetail'=>['user_id','User.name'],
          'VisitorDetail'=>['company_name', 'Country.name', 'City.name',],
          'DelegateVisitorEnquiryDetail' => ['id','user_activation_detail_id','UserActivationDetail.user_id' => ['User.name'],'User.name'],
          'PreEnquiryAssignedToUser.name',
          ],
        ]
    ];

    $options['conditions'] = $this->Hetu->named_index($conditions);
    $options['group'] = ['SalesPaymentSchedule.id'];
  $options['order'] = ['SalesPaymentSchedule.id'=>'DESC'];
  if(empty($this->request->params['pass'])){ 
   $this->SalesPaymentSchedule->find('all',$options);
   $this->paginate = $options;
  $this->set('totalupcomingpaymetforproducts', $this->paginate('SalesPaymentSchedule'));
  }else{
     $totalupcomingpaymetforproducts = $this->SalesPaymentSchedule->find('all',$options);
    $this->set(compact('totalupcomingpaymetforproducts'));
  }

   $visitordatails= $this->DelegateVisitorEnquiry->find('all',['fields'=>['id','market_id'],'conditions'=>['DelegateVisitorEnquiry.is_send_project'=>true],'contain'=>['VisitorDetail'=>['id','company_name','city_id','country_id']]]);

      /* Company Name Search Filter */
    $companyName = Hash::extract($visitordatails,'{n}.VisitorDetail.{n}.company_name');
    $companyName = array_filter(array_unique($companyName));  
    $companyName = array_combine($companyName,$companyName);

    /*Market Name Search Filter*/
    $this->loadModel('Market');
    $marketid = Hash::extract($visitordatails,'{n}.DelegateVisitorEnquiry.market_id');
    $marketid = array_filter(array_unique($marketid));
    $markets = $this->Market->find('list',['fields'=>['id','name'],'conditions'=>['Market.id'=>$marketid]]);

    /* Country Name Search Filter */
    $this->loadModel('Country');
    $countryId = Hash::extract($visitordatails,'{n}.VisitorDetail.{n}.country_id');
    $countryId = array_filter(array_unique($countryId));
    $countries = $this->Country->find('list',['fields'=>['id','name'],'conditions'=>['Country.id'=>$countryId]]);

    /* City Name Search Filter */
    $this->loadModel('City');
    $cityids = Hash::extract($visitordatails,'{n}.VisitorDetail.{n}.city_id');
    $cityids = array_filter(array_unique($cityids));        
    $cityName = $this->City->find('list',['fields'=>['id','name'],'conditions'=>['City.id'=>$cityids]]);

    // debug($cityName);exit;

    // debug($cityName);exit;
    $eventNames = $this->DelegateVisitorEnquiry->find('list',['fields'=>['Event.id','Event.name'],'contain'=>['Event.name'],'conditions'=>['DelegateVisitorEnquiry.is_send_project '=>true,
      'OR'=>[
        'is_visiting'=>'1',
        'is_exhibiting'=>'1'
      ]]]    
    );
    
    $this->loadModel('EnquirySourceType');
    $sourceTypes = $this->EnquirySourceType->find('list',['fields'=>['id','name']]);

    // debug($sourceTypes);exit;

  $this->set(compact('companyName','markets','countries','cityName','eventNames','sourceTypes'));

}

public function user_upcoming_payment_report_for_product(){
  $this->admin_upcoming_payment_report_for_product();
}

public function admin_upcoming_payment_report_for_product_export(){
    $this->autoRender = false;
      $this->loadModel('DelegateVisitorEnquiry');
  $this->loadModel('DelegateVisitorEnquiryDetail');
  $this->loadModel('SaleUpload');
  $this->loadModel('SalesPaymentSchedule');
  
  $options = [];
  $conditions = [];
  $startDate = $endDate = '';
  $conditionsDate = '';

    /*Conditions Joint*/
      $options['joins'] = [

       ['type' => 'inner','table' => 'sale_uploads', 'alias' => 'Sales',
      'conditions'=> ['Sales.id = SalesPaymentSchedule.sale_upload_id']],

      ['type' => 'left','table' => 'delegate_visitor_enquiries', 'alias' => 'DelegateVisitorEnquiry',
        'conditions'=> ['DelegateVisitorEnquiry.id = Sales.delegate_visitor_enquiry_id']
       ],

        ['type' => 'left','table' => 'visitor_details', 'alias' => 'VisitorDetail',
        'conditions'=> ['VisitorDetail.delegate_visitor_enquiry_id = Sales.delegate_visitor_enquiry_id']
       ], 
  
   ];

  /*Conditions Contain*/
    $options['contain'] = [
      'SaleUpload'=>[
        'fields'=>['id','conversion_rate','sales_date','delegate_visitor_enquiry_id'],  
        'DelegateVisitorEnquiry'=>[
            'id','market_id','pre_enquiry_no','event_id','user_activation_detail_id',
            'Market.name',
            'Event'=>['name','alias'],
          'CrmAssignedPreEnquiry'=>['fields'=>['id','pre_enquiry_assigned_to_user_id'],
            'PreEnquiryAssignedToUser.name','order'=>'CrmAssignedPreEnquiry.id DESC','limit'=>1],
            'EnquirySourceType.name',
          'UserActivationDetail'=>['user_id','User.name'],
          'VisitorDetail'=>['company_name', 'Country.name', 'City.name',],
          'DelegateVisitorEnquiryDetail' => ['id','user_activation_detail_id','UserActivationDetail.user_id' => ['User.name'],'User.name'],
          'PreEnquiryAssignedToUser.name',
          ],
        ]
    ];

    $options['conditions'] = $this->Hetu->named_index($conditions);
    $options['group'] = ['SalesPaymentSchedule.id'];
  $options['order'] = ['SalesPaymentSchedule.id'=>'DESC'];
  if(empty($this->request->params['pass'])){ 
   $this->SalesPaymentSchedule->find('all',$options);
   $this->paginate = $options;
  $this->set('totalupcomingpaymetforproducts', $this->paginate('SalesPaymentSchedule'));
  }else{
     $totalupcomingpaymetforproducts = $this->SalesPaymentSchedule->find('all',$options);
    $this->set(compact('totalupcomingpaymetforproducts'));
  }

     $dataArr = [];   
     $srno=0;
     //debug($quoeterequests);die;
     foreach ($totalupcomingpaymetforproducts as $key => $value) {
      $srno++;
            //debug($value);die;
           $paymentDate = (!empty($value['SalesPaymentSchedule']['month'].'-'.$value['SalesPaymentSchedule']['year'])) ? $value['SalesPaymentSchedule']['month'].'-'.$value['SalesPaymentSchedule']['year'] : '---';

           $valueUsd = (!empty($value['SalesPaymentSchedule']['value_in_inr'])) ? 
                        number_format($value['SalesPaymentSchedule']['value_in_inr'],2) : '---';

           $conversionRate = (!empty($value['SaleUpload']['conversion_rate'])) ?
                          number_format($value['SaleUpload']['conversion_rate'],2)
                          : '---' ;            

           $valueInr = (!empty($value['SalesPaymentSchedule']['value_in_other_currency'])) ? number_format($value['SalesPaymentSchedule']['value_in_other_currency'],2) : '---' ;

           $salesDate = (!empty($value['SaleUpload']['sales_date'])) ? date_format(date_create($value['SaleUpload']['sales_date']),'jS F Y') : '---' ;

           $companyName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['company_name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['company_name'] : '---';

           $market = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['Market']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['Market']['name'] : '---';

           $country = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['Country']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['Country']['name'] : '---';

           $city = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['City']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail'][0]['City']['name'] : '---';

                 if($value['SaleUpload']['DelegateVisitorEnquiry']['event_id'] == null){
                             if($value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['user_activation_detail_id'] == null){ 
                               if(!empty($value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['User'])){
                                  $primaryOwner =  $value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['User']['name'];
                               }else{
                                  $primaryOwner = '---';
                               }
                             }else{
                               if(!empty($value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['UserActivationDetail']['User'])){
                                  $primaryOwner = $value['SaleUpload']['DelegateVisitorEnquiry']['DelegateVisitorEnquiryDetail']['UserActivationDetail']['User']['name'];
                               }else{
                                  $primaryOwner = "---";
                               }
                             }
                           }else{
                             if($value['SaleUpload']['DelegateVisitorEnquiry']['user_activation_detail_id'] == null){
                               if(!empty($value['SaleUpload']['DelegateVisitorEnquiry']['PreEnquiryAssignedToUser']['name'])){
                                    $primaryOwner = $value['SaleUpload']['DelegateVisitorEnquiry']['PreEnquiryAssignedToUser']['name'];
                                 }else{
                                    $primaryOwner = '---';
                                 }
                             }else{
                               if(!empty($value['SaleUpload']['DelegateVisitorEnquiry']['UserActivationDetail']['User']['name'])){
                                 $primaryOwner = $value['SaleUpload']['DelegateVisitorEnquiry']['UserActivationDetail']['User']['name'];
                              } else {$primaryOwner = '---';}
                             } 
                            } 

        $assingedTo = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['CrmAssignedPreEnquiry']
                  ['PreEnquiryAssignedToUser']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']
                ['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'] :  '---';
           //debug($assingedTo);die;

        $preenquiryNo = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['pre_enquiry_no'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['pre_enquiry_no'] : '---' ;

        $sourceName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['EnquirySourceType']['name'])) ?
                      $value['SaleUpload']['DelegateVisitorEnquiry']['EnquirySourceType']['name'] : '---';

        $eventName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['Event']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['Event']['name'] : '---' ;


        //debug($eventName);die;

      $dataArr [] = [$srno,$paymentDate,$valueUsd,$conversionRate,$valueInr,$salesDate,$companyName,$market,$country,
        $city,$primaryOwner,$assingedTo,$preenquiryNo,$sourceName,$eventName];

      
     }

    $tableHeader[] = ['Sr.No.','Payment Month & Year', 'Value (in USD)','Conversion Rate','Value (in INR)',
    'Sales Date','Company Name','Market ','Country','City','Primary Owner','Assigned to','Pre-Enuiry No.',
    'Source Name','Event Name'];
    
     $tableDate = array_merge($tableHeader,$dataArr);

     //debug($tableDate);die;
     /*Setup Export To Excel*/
     $currentDate = date('Y-m-d');
     $fileName = 'Upcoming Payment Report For Products'.$currentDate; 
     //debug($fileName);die;
     $this->export_to_excel($fileName,$tableDate);


}


	/*For Total Enquery Reports*/
 public function admin_total_enquery(){
 				$this->loadModel('DelegateVisitorEnquiry');	
 				$this->layout = 'report';
 			 $options = $conditions = [];

 			 /*Load Conditions*/
					$conditionsQuery = $this->all_enqueries();	
					
					$options = $conditionsQuery['options']; 

					// debug($options);exit;

					$this->DelegateVisitorEnquiry->find('all',$options);
					$this->paginate = $options;
					$this->set('enqueries', $this->paginate('DelegateVisitorEnquiry'));	

					/*Assiend User Drop Down*/
					$userDropDown = $conditionsQuery['userDropDown'];
					$userDropDownValue = $conditionsQuery['userDropDownValue'];

					/*Country DropDown*/
					$countries = $conditionsQuery['countries'];
					$countryValue = $conditionsQuery['countryValue'];

					/*City DropDown*/
					$cities = $conditionsQuery['cities'];
					$cityValue = $conditionsQuery['cityValue']; '';

					/*CTM Meeting Status*/
					$crmMeetingStatus = $conditionsQuery['crmMeetingStatus'];
					$crmMeetingStatusValue = $conditionsQuery['crmStage'];

					/*Enquiry SourceType*/
					$enquirySourceTypes = $conditionsQuery['enquirySourceTypes'];
					$enquirySourceTypeValue = $conditionsQuery['enquirySourceTypeValue'];

					/*Rating Value*/
					$ratingValue = $conditionsQuery['ratingValue'];
					

					/*From And To Date*/
					$formDate = $conditionsQuery['formDate'];
					$toDate = $conditionsQuery['toDate'];
				
				 $followupstatus = $conditionsQuery['followupstatus'];

				 /*Bussiness Type*/
				 $bussinessTypes = $conditionsQuery['bussinessTypes'];
				 $bussinessTypeValue = $conditionsQuery['bussinessTypeValue'];
				 // debug($bussinessTypes);exit;

					/*Set Compact*/
					$this->set(compact('userDropDown','userDropDownValue','countries','countryValue','cities','cityValue','crmMeetingStatus','crmMeetingStatusValue','enquirySourceTypes','enquirySourceTypeValue','ratingValue','formDate','toDate','followupstatus','bussinessTypes','bussinessTypeValue'));	
 }

 /*For User*/
 public function user_total_enquery(){
 		$this->admin_total_enquery();
 }

 /*All Enqueries Excel Report*/
 public function admin_enqueries_excel_reports(){
 		$this->autoRender = false;
 		
 		/*Load Conditions*/
		 $conditionsQuery = $this->all_enqueries();	

		 $delegateVisitorEnqueries = $conditionsQuery['delegateVisitorEnqueries'];	

		 // debug($delegateVisitorEnqueries);exit	;

		 $dataArr = [];
		 $count = 0;
		 foreach ($delegateVisitorEnqueries as $key => $value) {
		 	
		 	$stage = $value['CrmMeetingStatus']['name'];
		 	/*Created Date*/
		 	$createdDate = date_format(date_create($value['DelegateVisitorEnquiry']['created']),'jS M Y');

		 	$rating = (!empty($value['Finance'][0]['rating'])) ? $value['Finance'][0]['rating'] : '1';

		 	$followUpStatus = (!empty($value['CrmFollowup'])) ? $value['CrmFollowup']['0']['CrmStage']['name'] : 'initial';
		 	
		 	/*Assigned User*/
     $assignUserName = (!empty($value['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'])) ? $value['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'] : '###';
     
     /*Company Name*/
     $comapnyNmae = (!empty($value['VisitorDetail']['0']['company_name'])) ? $value['VisitorDetail']['0']['company_name'] : '';

     /*Country*/
     $countryName = (!empty($value['VisitorDetail']['0']['Country']['name'])) ? $value['VisitorDetail']['0']['Country']['name'] : '';                              
     
     /*City*/
     $cityName = (!empty($value['VisitorDetail']['0']['City']['name'])) ? $value['VisitorDetail']['0']['City']['name'] : '';

     /*Contact Person*/
     $contactPerson = (!empty($value['VisitorDetail']['0']['contact_name'])) ? $value['VisitorDetail']['0']['contact_name'] : '###';

     /*Email*/
     $contactEmail = (!empty($value['VisitorDetail']['0']['contact_email'])) ? $value['VisitorDetail']['0']['contact_email'] : '###';

     /*Mobile*/
     $contactNo = (!empty($value['VisitorDetail']['0']['mobile_no'])) ? $value['VisitorDetail']['0']['mobile_no'] : '###';
	
					/*Bussiness Type*/	     
					$busiinessType = Hash::extract($value, 'BussinessType.{n}.name');
					$busiinessType = implode(',',$busiinessType);

					// debug($busiinessType);

     $dataArr [] = [$stage,$createdDate,$rating,$value['DelegateVisitorEnquiry']['pre_enquiry_no'],$followUpStatus,$assignUserName,$comapnyNmae,$countryName,$cityName,$value['EnquirySourceType']['name'],$contactPerson,$contactNo,$contactEmail,$busiinessType]; 	

		 }

		 // debug($dataArr);exit;

		 $tableHeader[] = ['Stage','Created Date', 'Rating','Pre-Enquiry No.','Follow-Up Status','Assiend User','Company Name','Country','City','Source Name','Contact Person','Contact Number','Contact Email','Bussiness Type'];


		
		 $tableDate = array_merge($tableHeader,$dataArr);

		 /*Setup Export To Excel*/
		 $fileName = $conditionsQuery['fileName'];	
		 $this->export_to_excel($fileName,$tableDate);

 }

/*For User*/
 public function user_enqueries_excel_reports(){
 		$this->admin_enqueries_excel_reports();
 }

 public function all_enqueries(){
 			$responce = [];	
 			$currentDate = date('Y-m-d');
 			$fileName = 'Total-enquery_report-'.$currentDate;

 			$userDropDownValue = $UserEnquiries = $countryValue = $cityValue = $crmStage = $enquirySourceTypeValue = $ratingValue = $formDate = $toDate = $followupstatus = $followupCondition = $bussinessTypeValue = $bussinessTypeCondition = '';
 			/*Filter Conditoins Start Here*/
 			/*Assiend User Filter*/
 			if(isset($this->request->params['named']['DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id'])){
 				$fileName = 'User-wise-enquiry_report'.$currentDate;
 				 $assiendUserId = $userDropDownValue = $this->request->params['named']['DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id'];

 				 /*AssiendUserEnquiries*/
    	$AssiendEnquieries = $this->DelegateVisitorEnquiry->find('list', ['conditions' => ['( DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id IN (' .$assiendUserId .'))','CrmAssignedPreEnquiry.id !='=>null],'contain'=>['CrmAssignedPreEnquiry']]);

    	$AssiendEnquieries = array_filter(array_unique($AssiendEnquieries));
    	$delegateIds = implode(",", $AssiendEnquieries);
    	if(empty($delegateIds)){
    		$delegateIds = '0';
    	}
    	$UserEnquiries = " DelegateVisitorEnquiry.id IN (" . $delegateIds . ") AND ";  				

 			}

 			/*Date Range Filter*/
 			if(!empty($this->request->params['named']['DelegateVisitorEnquiry.created'])){
 						$fileName = 'Date-wise-enquiry_report'.$currentDate;
 						$formDate = $this->request->params['named']['DelegateVisitorEnquiry.created'][0]; 
							$toDate = $this->request->params['named']['DelegateVisitorEnquiry.created'][1];
 			}

 			/*CRM Followup Filter*/
 			if(isset($this->request->params['named']['DelegateVisitorEnquiry.status'])){
 				 $fileName = 'Followup-status-wise-enquiry_report'.$currentDate;
 					$followupstatus = $this->request->params['named']['DelegateVisitorEnquiry.status'];
 					
 					if($followupstatus == 1){
 							$crmFollowupId = $this->DelegateVisitorEnquiry->find('list', ['conditions' => ['CrmFollowup.id IS NULL'],'contain' => ['CrmFollowup'],'joins'=>[['type' => 'left','table' => 'crm_followups', 'alias' => 'CrmFollowup',
													'conditions'=> ['CrmFollowup.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']]]]);
 					}elseif($followupstatus == 2){
 								$crmFollowupId = $this->DelegateVisitorEnquiry->find('list', ['conditions' => ['CrmFollowup.id IS NOT NULL'],'contain' => ['CrmFollowup'],'joins'=>[['type' => 'left','table' => 'crm_followups', 'alias' => 'CrmFollowup',
													'conditions'=> ['CrmFollowup.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']]]]);
 					}

 					unset($this->request->params['named']['DelegateVisitorEnquiry.status']);
 				$crmFollowupId = array_filter(array_unique($crmFollowupId));
    	$delegateIds = implode(",", $crmFollowupId);
    	if(empty($delegateIds)){$delegateIds = '0';}
    	

    	/*FollowUP Conditions*/
    	$followupCondition = " DelegateVisitorEnquiry.id IN (" . $delegateIds . ") AND "; 


 			}

 			/*For Bussiness Type*/
 				// debug($this->request->params['named']);exit;
 			if(isset($this->request->params['named']['DelegateVisitorEnquiry.bussiness_type_id'])){
 							 $fileName = 'Bussiness-Type-wise-enquiry_report'.$currentDate;
 							 $bussinessTypeValue = $this->request->params['named']['DelegateVisitorEnquiry.bussiness_type_id'];
 							 unset($this->request->params['named']['DelegateVisitorEnquiry.bussiness_type_id']);
 							 // debug($bussinessTypeValue);exit;

 							 // unset($this->request->params['named']['bussiness_type_id']);

 							 $DelegateVisitorEnquiriesBussinessTypeData = $this->DelegateVisitorEnquiry->DelegateVisitorEnquiriesBussinessType->find('list',['conditions'=>['DelegateVisitorEnquiriesBussinessType.bussiness_type_id'=>$bussinessTypeValue],'fields'=>['delegate_visitor_enquiry_id']]);  	 


 							 $DelegateVisitorEnquiriesBussinessTypeData = array_filter(array_unique($DelegateVisitorEnquiriesBussinessTypeData));
    					$delegateIds = implode(",", $DelegateVisitorEnquiriesBussinessTypeData);
    					if(empty($delegateIds)){$delegateIds = '0';}

    					// debug($delegateIds);exit;

    					/*FollowUP Conditions*/
    					$bussinessTypeCondition = " DelegateVisitorEnquiry.id IN (" . $delegateIds . ") AND ";

 							 // $bussinessTypeConditions
 							 // debug($delegateIds);exit;
 			}


 			$options['joins'] = [
 						['type' => 'left','table' => 'visitor_details', 'alias' => 'VisitorDetail',
						'conditions'=> ['VisitorDetail.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],

						// ['type' => 'left','table' => 'finances', 'alias' => 'Finance',
						// 'conditions'=> ['Finance.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
 			];

 			$contain = ['Finance.rating','CrmFollowup'=>['crm_stage_id','order'=>['CrmFollowup.id'=>'DESC'],'limit'=>'1','CrmStage.name'],'VisitorDetail'=>['Country.name','City.name'],'EnquirySourceType.name','CrmAssignedPreEnquiry'=>['PreEnquiryAssignedToUser.name','order'=>'CrmAssignedPreEnquiry.id DESC','limit'=>1],'CrmMeetingStatus.name','BussinessType.name'];
 		
 			$conditions = [$bussinessTypeCondition.' '.$followupCondition.' '.$UserEnquiries.' '.'DelegateVisitorEnquiry.crm_meeting_status_id !='=>9];
 			$options['contain'] = $contain;
 			$options['fields'] = ['id','pre_enquiry_no','created','pre_enquiry_assigned_to_user_id','crm_meeting_status_id','enquiry_source_type_id'];
 			$options['group'] = ['DelegateVisitorEnquiry.id'];
 			$options['order'] = ['DelegateVisitorEnquiry.created'=>'ASC'];
 			$options['conditions'] = $this->Hetu->named_index($conditions);


 			/*Main Conditions*/
 		 $delegateVisitorEnqueries = $this->DelegateVisitorEnquiry->find('all',$options);

 		 // debug($delegateVisitorEnqueries);exit;

 		 $filterCondition =['DelegateVisitorEnquiry.crm_meeting_status_id !='=>9];
				$options1['conditions'] = $filterCondition;
				$options1['contain'] = $contain;
 			$options1['fields'] = ['id','pre_enquiry_no','created','pre_enquiry_assigned_to_user_id'];
 			$options1['group'] = ['DelegateVisitorEnquiry.id'];		 


 		 $allDataQuery = $this->DelegateVisitorEnquiry->find('all',$options1);

 		 // debug($allDataQuery);exit;
 		 /*User Drop Down*/
 			$assiendUserId = Hash::extract($allDataQuery,'{n}.DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id');
 			$assiendUserId = array_filter(array_unique($assiendUserId));

 			$userDropDown = (!empty($assiendUserId)) ? $this->User->find('list',['conditions'=>['User.id'=>$assiendUserId],'order'=>['User.name']]) : '';


 			$userDropDownValue = (isset($this->request->params['named']['DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id'])) ? $this->request->params['named']['DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id'] : '';

 			
 			/*Country DropDown*/
 			$countryId = Hash::extract($allDataQuery,'{n}.VisitorDetail.0.country_id');
 			$countryId =  array_filter(array_unique($countryId));
 			$countries = $this->User->Country->find('list',['conditions'=>['Country.id'=>$countryId]]);
 			if((isset($this->request->params['named']['VisitorDetail.country_id']))){
 					$fileName = 'Country-wise-enquiry_report'.$currentDate;
 					$countryValue = $this->request->params['named']['VisitorDetail.country_id'];
 			}

 			/*City DropDown*/
 			$cityId = Hash::extract($allDataQuery,'{n}.VisitorDetail.0.city_id');
 			$cityId =  array_filter(array_unique($cityId));
 			$cities = $this->User->City->find('list',['conditions'=>['City.id'=>	$cityId]]);
	 		if((isset($this->request->params['named']['VisitorDetail.city_id']))){
	 					$fileName = 'City-wise-enquiry_report'.$currentDate;
	 					$cityValue = $this->request->params['named']['VisitorDetail.city_id'];
	 			}

	 			/*Stages*/
 			$crmMeetingStatus = $this->DelegateVisitorEnquiry->CrmMeetingStatus->find('list',['conditions'=>['CrmMeetingStatus.id NOT IN (2,3,4,9)']]);
 			if((isset($this->request->params['named']['DelegateVisitorEnquiry.crm_meeting_status_id']))){
	 					$fileName = 'CRMStage-wise-enquiry_report'.$currentDate;
	 					$crmStage = $this->request->params['named']['DelegateVisitorEnquiry.crm_meeting_status_id'];
	 			}

	 		/*Source Type DropDown*/
	 		$enquirySourceTypes = $this->DelegateVisitorEnquiry->EnquirySourceType->find('list');
 			if((isset($this->request->params['named']['DelegateVisitorEnquiry.enquiry_source_type_id']))){
	 					$fileName = 'SourceType-wise-enquiry_report'.$currentDate;
	 					$enquirySourceTypeValue = $this->request->params['named']['DelegateVisitorEnquiry.enquiry_source_type_id'];
	 			}


	 			/*Rating Value*/
	 			if((isset($this->request->params['named']['Finance.rating']))){
	 					$fileName = 'Rating-wise-enquiry_report'.$currentDate;
	 					$ratingValue = $this->request->params['named']['Finance.rating'];
	 			}

	 			/*Bussiness Type*/
	 			$bussinessTypes = $this->DelegateVisitorEnquiry->BussinessType->find('list',['conditions'=>['BussinessType.active'=>true]]);
	 				if(!empty($bussinessTypeValue)){
	 					$this->request->params['named']['DelegateVisitorEnquiry.bussiness_type_id'] = $bussinessTypeValue;
	 			}

	 			/*Followup Status*/
	 			 if (!empty($followupstatus)) {
       $this->request->params['named']['DelegateVisitorEnquiry.status'] = $followupstatus;
   }	

 		 $responce = ['fileName'=>$fileName,'options'=>$options,'delegateVisitorEnqueries'=>$delegateVisitorEnqueries,'userDropDown'=>$userDropDown,'userDropDownValue'=>$userDropDownValue,'countries'=>$countries,'countryValue'=>$countryValue,'cities'=>$cities,'cityValue'=>$cityValue,'crmMeetingStatus'=>$crmMeetingStatus,'crmStage'=>$crmStage,'enquirySourceTypes'=>$enquirySourceTypes,'enquirySourceTypeValue'=>$enquirySourceTypeValue,'ratingValue'=>$ratingValue,'formDate'=>$formDate,'toDate'=>$toDate,'followupstatus'=>$followupstatus,'bussinessTypes'=>$bussinessTypes,'bussinessTypeValue'=>$bussinessTypeValue];

 		 return $responce;


 }

   /*Quotetion Given Reports*/
 public function admin_quotation_given_report(){
      $this->loadModel('DelegateVisitorEnquiry');  
      $this->layout = 'report';
      $options = $conditions = [];
      /*Load Conditions*/
        $conditionsQuery = $this->quoteGivenCondition();

       $options = $conditionsQuery['options']; 

       $this->DelegateVisitorEnquiry->find('all',$options);
							$this->paginate = $options;
							$this->set('enqueries', $this->paginate('DelegateVisitorEnquiry'));	

							/*Country DropDown*/
						$countries = $conditionsQuery['countries'];
						$countryValue = $conditionsQuery['countryValue'];


						/*Company DropDown*/
						$companies = $conditionsQuery['comapnies'];
						$CompanyValue = $conditionsQuery['companyValue'];


						/*CRM Stage*/
					$crmMeetingStatus = $conditionsQuery['crmMeetingStatus'];
						$crmStage = $conditionsQuery['crmStage'];

						/*Set Compact*/
						$this->set(compact('countries','countryValue','companies','CompanyValue','crmMeetingStatus','crmStage'));

 }

 /*Admin Quotetion Given Excel Report*/
 public function admin_quotetion_excelreport(){
 		 $this->autoRender = false;
      
     /*Load Conditions*/
      $conditionsQuery = $this->quoteGivenCondition(); 
      $delegateVisitorEnqueries = $conditionsQuery['delegateVisitorEnqueries']; 
      $dataArr = [];
      $count = 0;
      foreach ($delegateVisitorEnqueries as $key => $CrmQuoteRequestData) {
      		// debug($CrmQuoteRequestData);
      		$initialNo = (isset($CrmQuoteRequestData['CrmQuote'][0]['internal_reference_no'])) ? $CrmQuoteRequestData['CrmQuote'][0]['internal_reference_no'] : '';

      		$stage = $CrmQuoteRequestData['CrmMeetingStatus']['name'];

      		$quotetionType = (isset($CrmQuoteRequestData['CrmQuote'][0]['QuoteType']['name'])) ? $CrmQuoteRequestData['CrmQuote'][0]['QuoteType']['name'] : '';
      		$raiseBy = (isset($CrmQuoteRequestData['CrmQuoteRequest']['RequestByUser']['name'])) ? $CrmQuoteRequestData['CrmQuoteRequest']['RequestByUser']['name'] : '';
      		$updateBy = (isset($CrmQuoteRequestData['CrmQuote'][0]['User']['name'])) ? $CrmQuoteRequestData['CrmQuote'][0]['User']['name'] : '';
      		$companyName = (!empty($CrmQuoteRequestData['VisitorDetail'][0]['company_name'])) ? $CrmQuoteRequestData['VisitorDetail'][0]['company_name'] : '';

      		$contactPerson = (!empty($CrmQuoteRequestData['VisitorDetail'][0]['contact_name'])) ? $CrmQuoteRequestData['VisitorDetail'][0]['contact_name'] : '';

        $contactNo = (!empty($CrmQuoteRequestData['VisitorDetail'][0]['mobile_no'])) ? $CrmQuoteRequestData['VisitorDetail'][0]['mobile_no'] : '';

        $contactEmail = (!empty($CrmQuoteRequestData['VisitorDetail'][0]['contact_email'])) ? $CrmQuoteRequestData['VisitorDetail'][0]['contact_email'] : '';

        $country = (!empty($CrmQuoteRequestData['VisitorDetail'][0]['Country']['name'])) ? $CrmQuoteRequestData['VisitorDetail'][0]['Country']['name'] : ''; 

        $quoteDate = (isset($CrmQuoteRequestData['CrmQuote'][0]['quote_date'])) ? date_format(date_create($CrmQuoteRequestData['CrmQuote'][0]['quote_date']),'jS M Y') : '';

        $QupteAmt = $CrmQuoteRequestData['CrmQuote'][0]['Currency']['iso_code'].' '.number_format($CrmQuoteRequestData['CrmQuote'][0]['value_in_other_currency'],2);

        $inrValue = number_format($CrmQuoteRequestData['CrmQuote'][0]['value_in_inr'],2);

        $dataArr [] = [$initialNo,$stage,$quotetionType,$raiseBy,$updateBy,$companyName,$contactPerson,$contactNo,$contactEmail,$country,$quoteDate,$QupteAmt,$inrValue]; 

      }

      $tableHeader[] = ['Internal Reference No','Stage','Quotation Type','Raised By','Updated By','Company Name','Contact Person','Mobile','Email','Country','Quotation Date','Quotation Amount','Quotation Value In INR'];

        $tableDate = array_merge($tableHeader,$dataArr);

         /*Setup Export To Excel*/
       $fileName = $conditionsQuery['fileName'];   
       $this->export_to_excel($fileName,$tableDate);


 }

  public function quoteGivenCondition(){
  		$responce = [];	
 			$currentDate = date('Y-m-d');
 			$fileName = 'quotetion_given_report-'.$currentDate;

 			$countryValue = $companyValue = $crmStage = '';

 			/*Conditoins Joints*/
     $options['joins'] =[
        ['type' => 'left', 'table' => 'visitor_details', 'alias' => 'VisitorDetail', 'conditions' => ['VisitorDetail.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],

        ['type' => 'left', 'table' => 'crm_quotes', 'alias' => 'CrmQuote', 'conditions' => ['CrmQuote.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
       ];

      /*Contain*/
    $contain = ['CrmMeetingStatus'=>['id','name'],'VisitorDetail'=>['id','company_name','contact_name','mobile_no','contact_email','country_id','Country.name'],'CrmQuote' => ['internal_reference_no','quote_date','value_in_other_currency','value_in_inr','CrmQuoteContac.name','User.name','QuoteType.name','Currency.iso_code','order'=>'CrmQuote.id DESC'],'CrmQuoteRequest'=>['id','RequestByUser.name','order'=>'CrmQuoteRequest.id DESC'],'PreEnquiryAssignedToUser'=>['id','name']];


    /*Main Conditions*/   
 		$conditions = ['CrmQuoteRequest.is_quote_given IN (1) AND DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (5,6,7,8)'];
 		$options['contain'] = $contain;
 		$options['fields'] = ['id','pre_enquiry_no','created','pre_enquiry_assigned_to_user_id','crm_meeting_status_id','enquiry_source_type_id'];
   $options['group'] = ['DelegateVisitorEnquiry.id'];
   $options['order'] = ['DelegateVisitorEnquiry.id' => 'ASC'];
 		$options['conditions'] = $this->Hetu->named_index($conditions); 

 		/*Main Conditions*/
 		 $delegateVisitorEnqueries = $this->DelegateVisitorEnquiry->find('all',$options);

 		 $filterCondition =['CrmQuoteRequest.is_quote_given IN (1) AND DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (5,6,7,8)'];
				$options1['conditions'] = $filterCondition;
				$options1['contain'] = $contain;
 			$options1['fields'] = ['id','pre_enquiry_no','created','pre_enquiry_assigned_to_user_id'];
 			$options1['group'] = ['DelegateVisitorEnquiry.id'];		 


 		 $allDataQuery = $this->DelegateVisitorEnquiry->find('all',$options1);

 		 /*Country DropDown*/
 			$countryId = Hash::extract($allDataQuery,'{n}.VisitorDetail.0.country_id');
 			$countryId =  array_filter(array_unique($countryId));
 			$countries = $this->User->Country->find('list',['conditions'=>['Country.id'=>$countryId]]);
 			if((isset($this->request->params['named']['VisitorDetail.country_id']))){
 					$fileName = 'Country-wise-enquiry_report'.$currentDate;
 					$countryValue = $this->request->params['named']['VisitorDetail.country_id'];
 			}

 			/*Company Name*/
 			/*Country DropDown*/
 			$companyId = Hash::extract($allDataQuery,'{n}.VisitorDetail.0.id');
 			$companyId =  array_filter(array_unique($companyId));
 			$comapnies = $this->DelegateVisitorEnquiry->VisitorDetail->find('list',['conditions'=>['VisitorDetail.id'=>$companyId],'fields'=>['company_name']]);
 			if((isset($this->request->params['named']['VisitorDetail.id']))){
 					$fileName = 'Company-wise-enquiry_report'.$currentDate;
 					$companyValue = $this->request->params['named']['VisitorDetail.id'];
 			}

 		
 				/*Stages*/
 			$crmMeetingStatus = $this->DelegateVisitorEnquiry->CrmMeetingStatus->find('list',['conditions'=>['CrmMeetingStatus.id IN (5,6,7,8)']]);
 			if((isset($this->request->params['named']['DelegateVisitorEnquiry.crm_meeting_status_id']))){
	 					$fileName = 'CRMStage-wise-enquiry_report'.$currentDate;
	 					$crmStage = $this->request->params['named']['DelegateVisitorEnquiry.crm_meeting_status_id'];
	 			}

   $responce = ['options'=>$options,'delegateVisitorEnqueries'=>$delegateVisitorEnqueries,'fileName'=>$fileName,'countries'=>$countries,'countryValue'=>$countryValue,'comapnies'=>$comapnies,'companyValue'=>$companyValue,'crmMeetingStatus'=>$crmMeetingStatus,'crmStage'=>$crmStage];

 		return $responce;
  }


/*Enqueries Lost Report*/
public function admin_lost_report(){
			$this->loadModel('DelegateVisitorEnquiry');
			$this->layout = 'report';
			$options = $conditions = [];
			/*Load Conditions*/
   $conditionsQuery = $this->lostEnqueryCondition();

   // debug($conditionsQuery);exit;

   /*Lost Stage*/
   $crmMeetingStatus = $conditionsQuery['crmMeetingStatus'];
   $crmMeetingStatusValue = $conditionsQuery['crmStage'];

   /*Countries*/
   $countries = $conditionsQuery['countries'];
   $countryValue = $conditionsQuery['countryValue'];

   /*Cities*/
   $cities = $conditionsQuery['cities'];
   $cityValue = $conditionsQuery['cityValue'];


   /*Source type*/
   $enquirySourceTypes = $conditionsQuery['enquirySourceTypes'];
   $enquirySourceTypeValue = $conditionsQuery['enquirySourceTypeValue'];


   /*Lost Reason*/
   $lostReasons = $conditionsQuery['lostReasons'];
   $reasonValue = $conditionsQuery['reasonValue'];

   /*Rating*/
   $ratingValue = $conditionsQuery['ratingValue'];

   /*From And To Date*/
			$formDate = $conditionsQuery['formDate'];
			$toDate = $conditionsQuery['toDate'];

			/*DateRanges*/
   $dateRangeArr = ['1'=>'Daily','2'=>'Weekly','3'=>'15 days','4'=>'Monthly' ,'5'=>'Lasr Month','6'=>'Annualy','7'=>'Last Year'];
   $dateRangeId = $conditionsQuery['dateRangeId'];

   if(!empty($dateRangeId)){
   		$this->request->params['named']['DelegateVisitorEnquiry.date_range'] = $dateRangeId;
   }
   //$this->request->params['named']['DelegateVisitorEnquiry.date_range'] = (!empty($dateRangeId)) ? $dateRangeId : '';


   $options = $conditionsQuery['options']; 
   $this->DelegateVisitorEnquiry->find('all',$options);
		 $this->paginate = $options;
		 $this->set('enqueries', $this->paginate('DelegateVisitorEnquiry'));
   // debug($options);exit;

		 /*Set Compact*/
		 $this->set(compact('crmMeetingStatus','crmMeetingStatusValue','countries','countryValue','cityValue','cities','enquirySourceTypes','enquirySourceTypeValue','lostReasons','reasonValue','ratingValue','formDate','toDate','dateRangeArr','dateRangeId'));
}

/*Export Lost Report*/
public function admin_export_lost_report(){
			$this->autoRender = false;
			
			/*Load Conditions*/
		 $conditionsQuery = $this->lostEnqueryCondition();	

		 $delegateVisitorEnqueries = $conditionsQuery['delegateVisitorEnqueries'];	

		// debug($delegateVisitorEnqueries);exit;

		 $dataArr = [];
		 $count = 0;
		 foreach ($delegateVisitorEnqueries as $key => $value) {
		 			// debug($value);
		 			$lostStage = $value['DelegateVisitorEnquiry']['lost_stage'];

		 			/*Created Date*/
		 	 $LostDate = date_format(date_create($value['DelegateVisitorEnquiry']['moved_to_lost_date']),'jS M Y');

		 	 $rating = (!empty($value['Finance'][0]['rating'])) ? $value['Finance'][0]['rating'] : '1';

		 	 /*Assigned User*/
     $assignUserName = (!empty($value['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'])) ? $value['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'] : '###';

     /*Company Name*/
     $comapnyNmae = (!empty($value['VisitorDetail']['0']['company_name'])) ? $value['VisitorDetail']['0']['company_name'] : '';

     /*Country*/
     $countryName = (!empty($value['VisitorDetail']['0']['Country']['name'])) ? $value['VisitorDetail']['0']['Country']['name'] : '';                              
     
     /*City*/
     $cityName = (!empty($value['VisitorDetail']['0']['City']['name'])) ? $value['VisitorDetail']['0']['City']['name'] : '';

     /*Pre- Enquiry No*/
     $PreEnquiry = $value['DelegateVisitorEnquiry']['pre_enquiry_no'];

     /*Lost Reason*/
     $lostReasonId = $value['LostReason']['id'];
     $lostReason = $value['LostReason']['name'];

     /*Lost Over Competitor*/
     $lostCompetitor = $value['DelegateVisitorEnquiry']['lost_reason_competitor'];

     /*Rasone*/
     $reason = $value['DelegateVisitorEnquiry']['lost_reason'];

     $enquirySourceType = $value['EnquirySourceType']['name'];

      $dataArr [] = [$rating,$PreEnquiry,$lostStage,$LostDate,$lostReason,$lostCompetitor,$reason,$assignUserName,$comapnyNmae,$countryName,$cityName,$enquirySourceType]; 

		 }

		 // debug($dataArr);exit; 

		$tableHeader[] = ['Rating','Pre-Enquiry No.','Lost Stage','Lost Date','Lost Reason','Compitetor Name','Full Reason','Assiend User','Company Name','Country','City','Source Name'];

		$tableDate = array_merge($tableHeader,$dataArr);
		 
		 // debug($tableDate);exit;

		 /*Setup Export To Excel*/
		 $fileName = $conditionsQuery['fileName'];

		 // debug($fileName);exit;
		 $this->export_to_excel($fileName,$tableDate);

}


/*Lost Enqueries Conditions*/
public function lostEnqueryCondition(){
			$responce = [];	
 		$currentDate = date('Y-m-d');
 		$fileName = 'enquery_lost_report-'.$currentDate;
 			$enquiryType = 'LostEnquiry';

 		$countryValue = $companyValue = $cityValue = $crmStage = $enquirySourceTypeValue = $reasonValue =  $ratingValue = $formDate = $toDate = $dateRangeConditions = $dateRangeId = '';

 		/*From Date and To Date Filter*/
 			if(!empty($this->request->params['named']['DelegateVisitorEnquiry.moved_to_lost_date'])){
 						$fileName = 'Date-wise-enquiry_report'.$currentDate;
 						$formDate = $this->request->params['named']['DelegateVisitorEnquiry.moved_to_lost_date'][0]; 
							$toDate = $this->request->params['named']['DelegateVisitorEnquiry.moved_to_lost_date'][1];
 			}

 			/*Date Range Filter*/
 			if(isset($this->request->params['named']['DelegateVisitorEnquiry.date_range']) && !empty($this->request->params['named']['DelegateVisitorEnquiry.date_range'])){
 				
 				$dateRangeId = $this->request->params['named']['DelegateVisitorEnquiry.date_range'];
 				
 				// debug($dateRangeId);exit;

 				$dateRangeConditionsArr = $this->dateRangeFilter($dateRangeId,$enquiryType);
 				// debug($dateRangeConditionsArr);exit;

 				$fileName = $dateRangeConditionsArr['parameters'];

 				$startDate = $dateRangeConditionsArr['startDate'];
 				$endDate = $dateRangeConditionsArr['endDate'];


 				$dateRangeConditions = $dateRangeConditionsArr['conditions'];
 				// debug($dateRangeConditionsArr);exit;

 				unset($this->request->params['named']['DelegateVisitorEnquiry.date_range']);

 				// debug($dateRangeConditions);exit;


 			}


 		/*Conditoins Joints*/
   $options['joins'] =[
      ['type' => 'left', 'table' => 'visitor_details', 'alias' => 'VisitorDetail', 'conditions' => ['VisitorDetail.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
      
      // ['type' => 'left', 'table' => 'finances', 'alias' => 'Finance', 'conditions' => ['Finance.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
     ];

   /*Contain*/
   $contain = ['Finance.rating','CrmMeetingStatus'=>['id','name'],'VisitorDetail'=>['id','company_name','contact_name','mobile_no','contact_email','country_id','Country.name','City.name'],'LostReason'=>['name','color'],'EnquirySourceType.name','CrmAssignedPreEnquiry'=>['PreEnquiryAssignedToUser.name','order'=>'CrmAssignedPreEnquiry.id DESC','limit'=>1]];   

   /*Main Conditions*/   
 		$conditions = ['DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (7)'.' '.$dateRangeConditions];
 		$options['contain'] = $contain;
 		$options['fields'] = ['id','pre_enquiry_no','created','pre_enquiry_assigned_to_user_id','crm_meeting_status_id','enquiry_source_type_id','moved_to_lost_date','lost_reason_id','lost_reason_competitor','lost_stage','lost_reason'];
 		$options['group'] = ['DelegateVisitorEnquiry.id'];
   $options['order'] = ['DelegateVisitorEnquiry.id' => 'ASC'];
 		$options['conditions'] = $this->Hetu->named_index($conditions); 

 		/*Main Conditions*/
 		$delegateVisitorEnqueries = $this->DelegateVisitorEnquiry->find('all',$options);


 		// debug($delegateVisitorEnqueries);exit;

 		$options1['conditions'] = $conditions;
 		$options1['contain'] = $contain;
 		$options1['fields'] = ['id','pre_enquiry_no','created','pre_enquiry_assigned_to_user_id','crm_meeting_status_id','enquiry_source_type_id','moved_to_lost_date','lost_reason_id','lost_reason_competitor','lost_stage','lost_reason'];
 		$options1['group'] = ['DelegateVisitorEnquiry.id'];

 		$allDataQuery = $this->DelegateVisitorEnquiry->find('all',$options1);
 		
 		/*Country DropDown*/
 			$countryId = Hash::extract($allDataQuery,'{n}.VisitorDetail.0.country_id');
 			$countryId =  array_filter(array_unique($countryId));
 			$countries = $this->User->Country->find('list',['conditions'=>['Country.id'=>$countryId]]);	
 			if((isset($this->request->params['named']['VisitorDetail.country_id']))){
 					$fileName = 'Country-wise-enquiry_lost_report'.$currentDate;
 					$countryValue = $this->request->params['named']['VisitorDetail.country_id'];
 			}


 			/*City DropDown*/
 			$cityId = Hash::extract($allDataQuery,'{n}.VisitorDetail.0.city_id');
 			$cityId =  array_filter(array_unique($cityId));
 			$cities = $this->User->City->find('list',['conditions'=>['City.id'=>$cityId]]);	
 			if((isset($this->request->params['named']['VisitorDetail.city_id']))){
 					$fileName = 'City-wise-enquiry_lost_report'.$currentDate;
 					$cityValue = $this->request->params['named']['VisitorDetail.city_id'];
 			}

 		/*Source Type DropDown*/
	 		$enquirySourceTypes = $this->DelegateVisitorEnquiry->EnquirySourceType->find('list');
 			if((isset($this->request->params['named']['DelegateVisitorEnquiry.enquiry_source_type_id']))){
	 					$fileName = 'SourceType-wise-enquiry_report'.$currentDate;
	 					$enquirySourceTypeValue = $this->request->params['named']['DelegateVisitorEnquiry.enquiry_source_type_id'];
	 			}

	 			// debug($enquirySourceTypes);exit;

 		/*Stages*/
 		$crmMeetingStatus = $this->DelegateVisitorEnquiry->CrmMeetingStatus->find('all',['conditions'=>['CrmMeetingStatus.id IN (5,6,8)']]);

 		$crmMeetingStatusArr = [];
 		$counter = 0;
 		foreach ($crmMeetingStatus as $key => $value) {
 			$crmMeetingStatusArr[$value['CrmMeetingStatus']['name']] = $value['CrmMeetingStatus']['name'];
 			$counter++;
 		}

 		if((isset($this->request->params['named']['DelegateVisitorEnquiry.lost_stage']))){
 					$fileName = 'CRMStage-wise-lost_enquery_report'.$currentDate;
 					$crmStage = $this->request->params['named']['DelegateVisitorEnquiry.lost_stage'];
 			}

	 /*Lost Reasons*/			
	 $lostReasons = $this->DelegateVisitorEnquiry->LostReason->find('list',['conditions'=>['LostReason.active'=>true]]);
 	if((isset($this->request->params['named']['DelegateVisitorEnquiry.lost_reason_id']))){
					$fileName = 'LostReason-wise-lost_enquery_report'.$currentDate;
					$reasonValue = $this->request->params['named']['DelegateVisitorEnquiry.lost_reason_id'];
			}

			/*Rating*/
				/*Rating Value*/
	 			if((isset($this->request->params['named']['Finance.rating']))){
	 					$fileName = 'Rating-wise-enquiry_lost_report'.$currentDate;
	 					$ratingValue = $this->request->params['named']['Finance.rating'];
	 			}




 		$responce = ['options'=>$options,'delegateVisitorEnqueries'=>$delegateVisitorEnqueries,'crmMeetingStatus'=>$crmMeetingStatusArr,'crmStage'=>$crmStage,'countries'=>$countries,'countryValue'=>$countryValue,'cityValue'=>$cityValue,'cities'=>$cities,'enquirySourceTypes'=>$enquirySourceTypes,'enquirySourceTypeValue'=>$enquirySourceTypeValue,'lostReasons'=>$lostReasons,'reasonValue'=>$reasonValue,'ratingValue'=>$ratingValue,'formDate'=>$formDate,'toDate'=>$toDate,'fileName'=>$fileName,'dateRangeId'=>$dateRangeId];

 		return $responce;

}

/*Sale Reports*/
public function admin_sale_reports(){
	$this->loadModel('DelegateVisitorEnquiry');	
 $this->layout = 'report';
 $options = $conditions = [];
 
 /*Load Conditions*/
	$conditionsQuery = $this->saleReportsConditions();
	//debug($conditionsQuery);die;
	$options = $conditionsQuery['options']; 
	$this->DelegateVisitorEnquiry->find('all',$options);
	$this->paginate = $options;
	$this->set('enqueries', $this->paginate('DelegateVisitorEnquiry'));	
	//debug($conditionsQuery);

	//debug($this->request->params);	
	/*Rating Value*/
	$ratingValue = $conditionsQuery['ratingValue'];

	//debug($ratingValue);die;
	//debug($conditionsQuery['ratingValue'])	;die;
 /*Sale Upload*/
 $saleUploadValue = $conditionsQuery['saleUploadValue'];

 /*Assigne Users*/
 $userDropDown = $conditionsQuery['userDropDown'];
 $userDropDownValue = $conditionsQuery['userDropDownValue'];

 /*Country*/
	$countries = $conditionsQuery['countries'];
	$countryValue = $conditionsQuery['countryValue'];

	/*Cities*/
	$cities = $conditionsQuery['cities'];
	$cityValue = $conditionsQuery['cityValue'];

	/*Source Type*/
 $enquirySourceTypes = $conditionsQuery['enquirySourceTypes'];
	$enquirySourceTypeValue = $conditionsQuery['enquirySourceTypeValue'];


	/*Moved TO Sale Date*/
	$formDate = $conditionsQuery['formDate'];
	$toDate = $conditionsQuery['toDate'];


		/*DateRanges*/
  $dateRangeArr = ['1'=>'Daily','2'=>'Weekly','3'=>'15 days','4'=>'Monthly' ,'5'=>'Lasr Month','6'=>'Annualy','7'=>'Last Year'];
  $dateRangeId = $conditionsQuery['dateRangeId'];
  if(!empty($dateRangeId)){
   		$this->request->params['named']['DelegateVisitorEnquiry.date_range'] = $dateRangeId;
   }

	/*Set Compact*/
	$this->set(compact('ratingValue','saleUploadValue','userDropDown','userDropDownValue','countries','countryValue','cities','cityValue','enquirySourceTypes','enquirySourceTypeValue','formDate','toDate','dateRangeArr','dateRangeId'));

}

/*Export Lost Report*/
public function admin_export_sale_report(){
			$this->autoRender = false;
			
			/*Load Conditions*/
		 $conditionsQuery = $this->saleReportsConditions();	

		 $delegateVisitorEnqueries = $conditionsQuery['delegateVisitorEnqueries'];	

		// debug($delegateVisitorEnqueries);exit;

		 $dataArr = [];
		 $count = 0;
		 foreach ($delegateVisitorEnqueries as $key => $value) {
		 		

        //debug($value);

		 		$rating = (!empty($value['Finance'][0]['rating'])) ? $value['Finance'][0]['rating'] : '1';

		 		/*Sale Upload*/	
		 		$saleUpload = ((!empty($value['SaleUpload'])) && ($value['SaleUpload']['active'] == true)) ? 'Yes' : 'No';

		 		/*Pre- Enquiry No*/
     $PreEnquiry = $value['DelegateVisitorEnquiry']['pre_enquiry_no'];

     /*Sale Date*/
     $moveToSaleDate =  (!empty($value['DelegateVisitorEnquiry']['moved_to_sales_date'])) ? date_format(date_create($value['DelegateVisitorEnquiry']['moved_to_sales_date']),'jS M Y') : '---';

     /*Sale Month Year*/
     $saleDate = (!empty($value['SaleUpload']['sales_date'])) ? date_format(date_create($value['SaleUpload']['sales_date']),'jS M Y') : '';
						$saleMonthYear = '---';
						if(!empty($saleDate)){
						  $time=strtotime($saleDate);
						  $month=date("M",$time);
						  $year=date("Y",$time);
						  $saleMonthYear = $month .' - '.$year ;
						}

 $receviedSaleValue =$SaleValueTitle = $diffSaleValueColor = "";
 $SaleValuecolor = "green"; 
 $receviedSaleValueColor = "red";
 $diffSaleValueColor = "blue";
   $diffSaleValue = $SalesValue = 0;
      if(!empty($value['SaleUpload'])){
                         $SalesValue = (!empty($value['SaleUpload']['value_in_inr'])) ? $value['SaleUpload']['value_in_inr'] : 0;
                         $receviedSaleValue = (!empty($value['SaleUpload']['total_amt_rcd_inr'])) ? $value['SaleUpload']['total_amt_rcd_inr'] : 0;
                         $diffSaleValue = $SalesValue - $receviedSaleValue;
                         if($diffSaleValue < 0){
                           $diffSaleValue = $receviedSaleValue - $SalesValue;
                           $SalesValue =  $SalesValue + $diffSaleValue;
                           $receviedSaleValue =  $SalesValue - $diffSaleValue;
                         }

                         /*Recevied Value*/
                         if($receviedSaleValue == $SalesValue){
                           $receviedSaleValueColor = "green";
                           $SaleValueTitle = "Payment Done !";
                           
                         }elseif($receviedSaleValue != $SalesValue){
                           $SaleValuecolor = "red";
                           $SaleValueTitle = "INR ".number_format($diffSaleValue,2).' '."Is Amount Pending !";
                         }

                         /*Diffrence Value*/
                         if($diffSaleValue == 0){
                            $diffSaleValueColor = 'green';
                         }elseif($diffSaleValue < 0){

                         }

             }   

      /* Received Amount */       
      $receivedAmount = (!empty($receviedSaleValue)) ? "INR".' '.number_format($receviedSaleValue,2) : "INR".' '.'0';

      //debug($receivedAmount);

      /*Sales Amount*/
      $salesAmount = (!empty($SalesValue)) ? 
                    "INR".' '.number_format($SalesValue,2) : "INR".' '.'0';

      //debug($salesAmount);
      
      $diffAmount = (!empty($diffSaleValue)) ? "INR".' '.number_format($diffSaleValue,2) : "INR".' '.'0'; 

      //debug($diffAmount);

		 	 /*Company Name*/
     $comapnyNmae = (!empty($value['VisitorDetail']['0']['company_name'])) ? $value['VisitorDetail']['0']['company_name'] : '';

		 	 /*Country*/
     $countryName = (!empty($value['VisitorDetail']['0']['Country']['name'])) ? $value['VisitorDetail']['0']['Country']['name'] : '';                              
     
     /*City*/
     $cityName = (!empty($value['VisitorDetail']['0']['City']['name'])) ? $value['VisitorDetail']['0']['City']['name'] : '';

		 	 /*Assigned User*/
     $assignUserName = (!empty($value['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'])) ? $value['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'] : '###';

    
     $enquirySourceType = $value['EnquirySourceType']['name'];



     $dataArr [] = [$rating,$saleUpload,$PreEnquiry,$saleDate,$saleMonthYear,$receivedAmount,$diffAmount,$salesAmount,$comapnyNmae,$countryName,$cityName,$assignUserName,$enquirySourceType]; 

		 }

		 // debug($dataArr);exit;  <th class="">Rating</th>


		$tableHeader[] = ['Rating','Sale Upload','Pre-Enquiry No.','Sale Date','Sales Month & Year','Received Amount','Difference Amount','Sales Value','Company Name','Country','City','Assiend User','Source Name'];

		$tableDate = array_merge($tableHeader,$dataArr);
		 
		 // debug($tableDate);exit;

		 /*Setup Export To Excel*/
		 $fileName = $conditionsQuery['fileName'];

		 // debug($fileName);exit;
		 $this->export_to_excel($fileName,$tableDate);

}


/*Sale Reports Conditions*/
public function saleReportsConditions(){
			$responce = [];	
 		$currentDate = date('Y-m-d');
 		$fileName = 'Total-sale_report-'.$currentDate;

 		$enquiryType = 'SaleEnquiry';

 		$ratingValue = $saleUploadValue = $countryValue = $cityValue = $enquirySourceTypeValue = $formDate = $toDate = $dateRangeId = $dateRangeConditions = $DateConditions =  ''; 

					if(isset($this->request->params['named']['DelegateVisitorEnquiry.date_range']) && !empty($this->request->params['named']['DelegateVisitorEnquiry.date_range'])){
							 /*Date Range */					
								$dateRangeId = $this->request->params['named']['DelegateVisitorEnquiry.date_range'];
								
								$dateRangeConditionsArr = $this->dateRangeFilter($dateRangeId,$enquiryType);
								$fileName = $dateRangeConditionsArr['parameters'];
								$startDate = $dateRangeConditionsArr['startDate'];
								$endDate = $dateRangeConditionsArr['endDate'];

								// debug($endDate);

								$rangeConditions1 = $this->DelegateVisitorEnquiry->SaleUpload->find('list',['conditions'=>['SaleUpload.sales_date BETWEEN "'.$startDate.'" AND "'.$endDate.'"'],'contain'=>false,'fields'=>['id','delegate_visitor_enquiry_id']]);

							$rangeConditions1 = array_filter(array_unique($rangeConditions1));
							$rangeConditions1 = implode(',',$rangeConditions1);
							if(empty($rangeConditions1)){$rangeConditions1 = 0;}
					
							$dateRangeConditions = 	'DelegateVisitorEnquiry.id IN ('.$rangeConditions1.') AND ';						
							
								unset($this->request->params['named']['DelegateVisitorEnquiry.date_range']);
							
				}

				/*Moved To Sale Date Range Filter*/
 				if(!empty($this->request->params['named']['SaleUpload.sales_date'])){
 						$fileName = 'Date-wise-enquiry_report'.$currentDate;
 						$formDate = $this->request->params['named']['SaleUpload.sales_date'][0]; 
							$toDate = $this->request->params['named']['SaleUpload.sales_date'][1];
 			 	
							$DateConditions1 = $this->DelegateVisitorEnquiry->SaleUpload->find('list',['conditions'=>['SaleUpload.sales_date BETWEEN "'.$formDate.'" AND "'.$toDate.'"'],'contain'=>false,'fields'=>['id','delegate_visitor_enquiry_id']]);

							$DateConditions1 = array_filter(array_unique($DateConditions1));
							$DateConditions1 = implode(',',$DateConditions1);
							if(empty($DateConditions1)){$DateConditions1 = 0;}

							 $DateConditions = 'DelegateVisitorEnquiry.id IN ('.$DateConditions1.') AND ';
							// debug($DateConditions);exit;

 			 }


 		$options['joins'] = [
 						['type' => 'left','table' => 'visitor_details', 'alias' => 'VisitorDetail',
						'conditions'=> ['VisitorDetail.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],

						['type' => 'left','table' => 'finances', 'alias' => 'Finance',
						'conditions'=> ['Finance.delegate_visitor_enquiry_id = DelegateVisitorEnquiry.id']],
 			];

 		$contain = ['Finance.rating','VisitorDetail'=>['company_name','Country.name','City.name'],'EnquirySourceType.name','CrmAssignedPreEnquiry'=>['PreEnquiryAssignedToUser.name','order'=>'CrmAssignedPreEnquiry.id DESC','limit'=>1],'CrmMeetingStatus.name','SaleUpload'=>[
              'id',
              'sales_date',
              'value_in_inr',
              'total_diff_amt_inr',
              'total_amt_rcd_inr',
              'active'
            ]];

    //debug($contain);die;

 		$conditions = [$dateRangeConditions.' '.$DateConditions.' '.'DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (6)'];
 		$options['contain'] = $contain;
 		$options['fields'] = ['id','pre_enquiry_no','created','pre_enquiry_assigned_to_user_id','crm_meeting_status_id','enquiry_source_type_id','is_send_sales','is_pre_sale','moved_to_sales_date'];
 		$options['group'] = ['DelegateVisitorEnquiry.id'];
 		$options['order'] = ['DelegateVisitorEnquiry.modified'=>'DESC'];
 		$options['conditions'] = $this->Hetu->named_index($conditions);

 		/*Main Conditions*/
 		$delegateVisitorEnqueries = $this->DelegateVisitorEnquiry->find('all',$options);

 		 $filterCondition =['DelegateVisitorEnquiry.is_archive NOT IN (1) AND DelegateVisitorEnquiry.crm_meeting_status_id IN (6)'];
		  $options1['conditions'] = $filterCondition;
		  $options1['contain'] = $contain;
			 $options1['fields'] = ['id','pre_enquiry_no','created','pre_enquiry_assigned_to_user_id','crm_meeting_status_id','enquiry_source_type_id','is_send_sales','is_pre_sale','moved_to_sales_date'];
		  $options1['group'] = ['DelegateVisitorEnquiry.id'];	

		  $allDataQuery = $this->DelegateVisitorEnquiry->find('all',$options1);


		  
		  /*Assigne User DropDown*/
		  $assiendUserId = Hash::extract($allDataQuery,'{n}.DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id');
 			$assiendUserId = array_filter(array_unique($assiendUserId));
 			$userDropDown = (!empty($assiendUserId)) ? $this->User->find('list',['conditions'=>['User.id'=>$assiendUserId],'order'=>['User.name']]) : '';

 			$userDropDownValue = (isset($this->request->params['named']['DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id'])) ? $this->request->params['named']['DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id'] : '';

 			/*Country DropDown*/
 			$countryId = Hash::extract($allDataQuery,'{n}.VisitorDetail.0.country_id');
 			$countryId =  array_filter(array_unique($countryId));
 			$countries = $this->User->Country->find('list',['conditions'=>['Country.id'=>$countryId]]);
 			if((isset($this->request->params['named']['VisitorDetail.country_id']))){
 					$fileName = 'Country-wise-enquiry_report'.$currentDate;
 					$countryValue = $this->request->params['named']['VisitorDetail.country_id'];
 			}

 			/*City DropDown*/
 			$cityId = Hash::extract($allDataQuery,'{n}.VisitorDetail.0.city_id');
 			$cityId =  array_filter(array_unique($cityId));
 			$cities = $this->User->City->find('list',['conditions'=>['City.id'=>	$cityId]]);
	 		if((isset($this->request->params['named']['VisitorDetail.city_id']))){
	 					$fileName = 'City-wise-enquiry_report'.$currentDate;
	 					$cityValue = $this->request->params['named']['VisitorDetail.city_id'];
	 			}

 			/*Source Type DropDown*/
 		$enquirySourceTypes = $this->DelegateVisitorEnquiry->EnquirySourceType->find('list');
			if((isset($this->request->params['named']['DelegateVisitorEnquiry.enquiry_source_type_id']))){
 					$fileName = 'SourceType-wise-enquiry_report'.$currentDate;
 					$enquirySourceTypeValue = $this->request->params['named']['DelegateVisitorEnquiry.enquiry_source_type_id'];
 			}
 		
 		/*Rating Value*/
		if((isset($this->request->params['named']['Finance.rating']))){
				$fileName = 'Rating-wise-enquiry_report'.$currentDate;
				$ratingValue = $this->request->params['named']['Finance.rating'];
				
		}

		/*Sale Upload Value*/
		if((isset($this->request->params['named']['SaleUpload.active']))){
				$fileName = 'SaleUpload-wise-enquiry_report'.$currentDate;
				$saleUploadValue = $this->request->params['named']['SaleUpload.active'];
		}

		/*Moved To Sale Date Range Filter*/
 			if(!empty($this->request->params['named']['DelegateVisitorEnquiry.moved_to_sales_date'])){
 						$fileName = 'Date-wise-enquiry_report'.$currentDate;
 						$formDate = $this->request->params['named']['DelegateVisitorEnquiry.moved_to_sales_date'][0]; 
							$toDate = $this->request->params['named']['DelegateVisitorEnquiry.moved_to_sales_date'][1];
 			}
		

 		/*Responce*/
 		$responce = ['delegateVisitorEnqueries'=>$delegateVisitorEnqueries,'options'=>$options,'fileName'=>$fileName,'ratingValue'=>$ratingValue,'saleUploadValue'=>$saleUploadValue,'userDropDown'=>$userDropDown,'userDropDownValue'=>$userDropDownValue,'countries'=>$countries,'countryValue'=>$countryValue,'cities'=>$cities,'cityValue'=>$cityValue,'enquirySourceTypes'=>$enquirySourceTypes,'enquirySourceTypeValue'=>$enquirySourceTypeValue,'formDate'=>$formDate,'toDate'=>$toDate,'dateRangeId'=>$dateRangeId];
 		return $responce;
}


/*AMC Report*/
public function admin_amc_reports(){
			$this->layout = 'report';	
			$this->loadModel('CrmQuoteServiceValue');

			$options = [];
			$conditions = [];

			 /*Load Conditions*/
				$conditionsQuery = $this->amcReportsConditions();
				$options = $conditionsQuery['options']; 
				
				$this->CrmQuoteServiceValue->find('all',$options);
				$this->paginate = $options;

				$this->set('enqueries', $this->paginate('CrmQuoteServiceValue'));	

				/*Country DropDown*/
				$countryValue = $conditionsQuery['countryValue'];
				$countries = $conditionsQuery['countries'];

				 /*User DropDown*/
				 $userDropDown = $conditionsQuery['userDropDown'];
			 	$userDropDownValue = $conditionsQuery['userDropDownValue'];
				
			 	/*Company Detail*/
			 $companies = $conditionsQuery['companies'];
			 $companyValue = $conditionsQuery['companyValue'];	

			 /*City DropDown*/
			 $cities = $conditionsQuery['cities'];
			 $cityValue = $conditionsQuery['cityValue'];	

			 /*Source Type*/
			 $enquirySourceTypes = $conditionsQuery['enquirySourceTypes'];
			 $enquirySourceTypeValue = $conditionsQuery['enquirySourceTypeValue'];

			 /*AMC Period*/
		  $AmcPeriod = $conditionsQuery['AmcPeriod'];
			 $amcPeriodValue = $conditionsQuery['amcPeriodValue'];

			 /*Service*/
			 $services = $conditionsQuery['services'];
			 $serviceValue = $conditionsQuery['serviceValue'];



				/*Set Compact*/
				$this->set(compact('countries','countryValue','userDropDown','userDropDownValue','companies','companyValue','cities','cityValue','enquirySourceTypes','enquirySourceTypeValue','AmcPeriod','amcPeriodValue','services','serviceValue'));

}

/*Export AMC Report*/
public function admin_export_amc_report(){
		$this->autoRender = false;
		$dataArr = [];
		 $count = 0;
		$conditionsQuery = $this->amcReportsConditions();
		$enqueries = $conditionsQuery['enqueries'];	
		// debug($enqueries);exit;
	 foreach ($enqueries as $key => $value) {
	 		 	
	 		 /*Pre-enqueri*/	
	 		 $preEnquiryNo = $value['SaleUpload']['DelegateVisitorEnquiry']['pre_enquiry_no'];

	 		 /*Upcomin AMcMothYear*/
      $upComingAMCMonthYear = $value['CrmQuoteServiceValue']['maintenance_month'].'-'.$value['CrmQuoteServiceValue']['maintenance_year'];

      /*Service Name*/
      $serviceName = (!empty($value['QuotationService']['name'])) ? $value['QuotationService']['name'] : '---';

      /*Project Sale Date*/
      $projectSaleDate = (!empty($value['SaleUpload']['sales_date'])) ? date_format(date_create($value['SaleUpload']['sales_date']),'jS M Y') : '---';

      /*Project Start Date*/
      $projectStartDate = (!empty($value['SaleUpload']['date_of_project'])) ? date_format(date_create($value['SaleUpload']['date_of_project']),'jS M Y') : '---'; 

      /*AMC Period*/
      $AmcPeriod = (!empty($value['AmcPeriod']['name'])) ? $value['AmcPeriod']['name'] : '---';

      /*Company Name*/
      $comapnyNmae = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail']['0']['company_name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail']['0']['company_name'] : '';

      /*Country*/
      $countryName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail']['0']['Country']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail']['0']['Country']['name'] : ''; 

      /*City*/
      $cityName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail']['0']['City']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['VisitorDetail']['0']['City']['name'] : '';

      /*Assigned User*/
      $assigneUser = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['CrmAssignedPreEnquiry']['PreEnquiryAssignedToUser']['name'] : '---';

      /*Source Name*/
      $sourceName = (!empty($value['SaleUpload']['DelegateVisitorEnquiry']['EnquirySourceType']['name'])) ? $value['SaleUpload']['DelegateVisitorEnquiry']['EnquirySourceType']['name'] : '---'; 

       $dataArr [] = [$preEnquiryNo,$upComingAMCMonthYear,$serviceName,$projectSaleDate,$projectStartDate,$AmcPeriod,$comapnyNmae,$countryName,$cityName,$assigneUser,$sourceName]; 

	 }

	 	$tableHeader[] = ['Pre-Enuiry No.','Upcoming AMC Month & Year','Service Name','Sale Date Of Project','Start Date Of Project','Renewal Period','Company Name','Country','City','Assiend User','Source Name'];

	 	$tableDate = array_merge($tableHeader,$dataArr);


	 	/*Setup Export To Excel*/
		 $fileName = $conditionsQuery['fileName'];

		  $this->export_to_excel($fileName,$tableDate);
	 	// debug($tableDate);exit;

}

/*AMC Report Conditions*/
public function amcReportsConditions(){
			$responce = [];	
 		$currentDate = date('Y-m-d');
 		$fileName = 'Total-AMC_report-'.$currentDate;

 		$countryValue = $companyValue = $cityValue =  $enquirySourceTypeValue = $amcPeriodValue = $serviceValue = '';
 		$options['joins'] = [

			 ['type' => 'inner','table' => 'sale_uploads', 'alias' => 'Sales',
			'conditions'=> ['Sales.id = CrmQuoteServiceValue.sale_upload_id']],

			['type' => 'left','table' => 'delegate_visitor_enquiries', 'alias' => 'DelegateVisitorEnquiry',
				'conditions'=> ['DelegateVisitorEnquiry.id = Sales.delegate_visitor_enquiry_id']
		   ],

		   	['type' => 'left','table' => 'visitor_details', 'alias' => 'VisitorDetail',
				'conditions'=> ['VisitorDetail.delegate_visitor_enquiry_id = Sales.delegate_visitor_enquiry_id']
		   ],	
	
	 ];

 		$contain = [
  		'QuotationService','AmcServiceType','AmcPeriod',
  		'SaleUpload'=>[
  			'fields'=>['id','conversion_rate','sales_date','delegate_visitor_enquiry_id','date_of_project'],	
  			'DelegateVisitorEnquiry'=>[
  					'id','market_id','pre_enquiry_no','event_id','user_activation_detail_id',
  					'Event'=>['name','alias'],
					'CrmAssignedPreEnquiry'=>['fields'=>['id','pre_enquiry_assigned_to_user_id'],
	    			'PreEnquiryAssignedToUser.name','order'=>'CrmAssignedPreEnquiry.id DESC','limit'=>1],
		  			'EnquirySourceType.name',
					'UserActivationDetail'=>['user_id','User.name'],
					'VisitorDetail'=>['company_name',	'Country.name',	'City.name',],
					'DelegateVisitorEnquiryDetail' => ['id','user_activation_detail_id','UserActivationDetail.user_id' => ['User.name'],'User.name'],
					'PreEnquiryAssignedToUser.name',
  			  ],
  			]
  	];

 		$conditions  = ['CrmQuoteServiceValue.is_amc_applied'=>true,'CrmQuoteServiceValue.sale_upload_id !='=>Null];
 		$options['contain'] = $contain;
 		$options['group'] = ['CrmQuoteServiceValue.id'];
			$options['order'] = ['CrmQuoteServiceValue.id'=>'DESC'];
			$options['conditions'] = $this->Hetu->named_index($conditions);

			$enqueries = $this->DelegateVisitorEnquiry->SaleUpload->CrmQuoteServiceValue->find('all',$options);

			// debug($enqueries);exit;

			$filterCondition =['CrmQuoteServiceValue.is_amc_applied'=>true,'CrmQuoteServiceValue.sale_upload_id !='=>Null];
		  $options1['conditions'] = $filterCondition;
		  $options1['contain'] = $contain;
		  $options1['group'] = ['CrmQuoteServiceValue.id'];	
			 
			 $allDataQuery = $this->DelegateVisitorEnquiry->SaleUpload->CrmQuoteServiceValue->find('all',$options1);

			 /*Assigne User DropDown*/
		  $assiendUserId = Hash::extract($allDataQuery,'{n}.SaleUpload.DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id');
 			$assiendUserId = array_filter(array_unique($assiendUserId));
 			$userDropDown = (!empty($assiendUserId)) ? $this->User->find('list',['conditions'=>['User.id'=>$assiendUserId],'order'=>['User.name']]) : '';

 			$userDropDownValue = (isset($this->request->params['named']['DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id'])) ? $this->request->params['named']['DelegateVisitorEnquiry.pre_enquiry_assigned_to_user_id'] : '';


 			/*CompanyName*/
 				$companyId = Hash::extract($allDataQuery,'{n}.SaleUpload.DelegateVisitorEnquiry.VisitorDetail.0.id');
 				$companyId = array_filter(array_unique($companyId));
 				$companies = $this->DelegateVisitorEnquiry->VisitorDetail->find('list',['conditions'=>['VisitorDetail.id'=>$companyId],'fields'=>['company_name']]);
 				if((isset($this->request->params['named']['VisitorDetail.id']))){
 					$fileName = 'Company-wise-enquiry_report'.$currentDate;
 					$companyValue = $this->request->params['named']['VisitorDetail.id'];
 			}
 				// debug($companies);exit;


				/*Country DropDown*/
 			$countryId = Hash::extract($allDataQuery,'{n}.SaleUpload.DelegateVisitorEnquiry.VisitorDetail.0.country_id');
 			$countryId =  array_filter(array_unique($countryId));
 			$countries = $this->User->Country->find('list',['conditions'=>['Country.id'=>$countryId]]);
 			if((isset($this->request->params['named']['VisitorDetail.country_id']))){
 					$fileName = 'Country-wise-enquiry_report'.$currentDate;
 					$countryValue = $this->request->params['named']['VisitorDetail.country_id'];
 			}

 			/*City DropDown*/
 			$cityId = Hash::extract($allDataQuery,'{n}.SaleUpload.DelegateVisitorEnquiry.VisitorDetail.0.city_id');
 			$cityId =  array_filter(array_unique($cityId));
 			$cities = $this->User->City->find('list',['conditions'=>['City.id'=>	$cityId]]);
	 		if((isset($this->request->params['named']['VisitorDetail.city_id']))){
	 					$fileName = 'City-wise-enquiry_report'.$currentDate;
	 					$cityValue = $this->request->params['named']['VisitorDetail.city_id'];
	 			}

					/*Source Type DropDown*/
		 		$enquirySourceTypes = $this->DelegateVisitorEnquiry->EnquirySourceType->find('list');
					if((isset($this->request->params['named']['DelegateVisitorEnquiry.enquiry_source_type_id']))){
		 					$fileName = 'SourceType-wise-enquiry_report'.$currentDate;
		 					$enquirySourceTypeValue = $this->request->params['named']['DelegateVisitorEnquiry.enquiry_source_type_id'];
		 			}

			 /*AMC Periods*/
			 $AmcPeriod = $this->DelegateVisitorEnquiry->SaleUpload->CrmQuoteServiceValue->AmcPeriod->find('list');
			 	if((isset($this->request->params['named']['CrmQuoteServiceValue.amc_period_id']))){
		 					$fileName = 'AMC_period-wise-enquiry_report'.$currentDate;
		 					$amcPeriodValue = $this->request->params['named']['CrmQuoteServiceValue.amc_period_id'];
		 		}	

		 		// Service $services
		 		$services = $this->DelegateVisitorEnquiry->SaleUpload->CrmQuoteServiceValue->QuotationService->find('list');
		 		if((isset($this->request->params['named']['CrmQuoteServiceValue.quotation_service_id']))){
		 					$fileName = 'Service-wise-enquiry_report'.$currentDate;
		 					$serviceValue = $this->request->params['named']['CrmQuoteServiceValue.quotation_service_id'];
		 		}	

		 		// debug($services);exit;


			$responce = ['enqueries'=>$enqueries,'options'=>$options,'fileName'=>$fileName,'countries'=>$countries,'countryValue'=>$countryValue,'userDropDown'=>$userDropDown,'userDropDownValue'=>$userDropDownValue,'companies'=>$companies,'companyValue'=>$companyValue,'cities'=>$cities,'cityValue'=>$cityValue,'enquirySourceTypes'=>$enquirySourceTypes,'enquirySourceTypeValue'=>$enquirySourceTypeValue,'AmcPeriod'=>$AmcPeriod,'amcPeriodValue'=>$amcPeriodValue,'services'=>$services,'serviceValue'=>$serviceValue];


			return $responce;
}

/*Project Loss Vs Projects Won*/
public function admin_projects(){
		$this->loadModel('DelegateVisitorEnquiry');
		$this->layout = 'report';


		$options = $conditions = [];
		$enquiries = $this->DelegateVisitorEnquiry->find('all',['conditions'=>['DelegateVisitorEnquiry.is_archive NOT IN (1)','DelegateVisitorEnquiry.crm_meeting_status_id IN (6,7)'],'fields'=>['id','pre_enquiry_no','crm_meeting_status_id','moved_to_sales_date','moved_to_lost_date','is_archive','is_send_sales'],'contain'=>['SaleUpload.sales_date']]);

	$statistics = [];
	foreach ($enquiries as $enquiry) {
    $year = null;

    if ($enquiry['DelegateVisitorEnquiry']['crm_meeting_status_id'] == 7) {
        $date = $enquiry['DelegateVisitorEnquiry']['moved_to_lost_date'];
    } else {
        $date = $enquiry['SaleUpload']['sales_date'];
    }

    if ($date) {
        $year = date('Y', strtotime($date));
    }

    if ($year) {
        if (!isset($statistics[$year])) {
            $statistics[$year] = [
                'year' => $year,
                'won_count' => 0,
                'lost_count' => 0,
            ];
        }

        if ($enquiry['DelegateVisitorEnquiry']['crm_meeting_status_id'] == 7) {
            $statistics[$year]['lost_count']++;
        } else {
            $statistics[$year]['won_count']++;
        }
    }
}
$statistics = array_values($statistics);

// Define a custom sort function
function sortStatistics($a, $b) {
    return $a['year'] - $b['year'];
}

// Sort the array by year
usort($statistics, 'sortStatistics');

/*For Excel Reports DATA*/
$dataArr = [];
$srno = 0;
foreach ($statistics as $key => $enquery) {
	$srno++;
	$year = $enquery['year'];
	$won_count = $enquery['won_count'];
	$lost_count = $enquery['lost_count'];

	 $dataArr [] = [$srno,$year,$won_count,$lost_count]; 
}

$tableHeader[] = ['Sr No.','Year','Project Won.','Project Lost'];

$tableDate = array_merge($tableHeader,$dataArr);
$fileName = 'Project Loss Vs Projects Won';
	
// debug();exit;	
$action = $this->request->params['action'];
 if($action != 'admin_projects'){
		$this->export_to_excel($fileName,$tableDate);
 }

/*Set Compact*/
$this->set(compact('enquiries','statistics'));
}

/*Bussiness Type Enqueries*/
public function admin_bussiness_type_enqueries(){
	$this->loadModel('DelegateVisitorEnquiry');	
  $this->layout = 'report';
 $options = $conditions = [];

}


/*Admin Proejct Lost And Sale Export To Excel*/
public function admin_project_excel_report(){
	  $this->autoRender = false;
	  $this->admin_projects();
}




/*For DateRangeFilter*/
public function dateRangeFilter($dateRangeId,$enquiryType){

// debug($enquiryType);exit;

	/*Current Date*/
	$currentdate = date('Y-m-d');
	$current_year = date('Y');


	/*YesterdayDate*/
	$yesterday =  date('Y-m-d',strtotime($currentdate. '- 1 days'));

	/*Last 7 days*/
	$lastSevenDays = date('Y-m-d',strtotime($currentdate. '- 6 days'));

	/*Last 15 days*/
	$lastthirtyDays = date('Y-m-d',strtotime($currentdate. '- 14 days'));

	/*This Month */
	$currentMonthStartDate = date('Y-m-01');
	$currentMonthEndDate = date('Y-m-t');

	/*Last Month*/
	$first_day_of_current_month = strtotime($currentMonthStartDate);
 $last_day_of_last_month = strtotime(date('Y-m-d', $first_day_of_current_month) . ' - 1 day');
 $first_day_of_last_month = strtotime(date('Y-m-01', $last_day_of_last_month));
 $first_day_last_month = date('Y-m-d', $first_day_of_last_month);;
 $last_day_formatted = date('Y-m-d', $last_day_of_last_month); 

 /*Current Year Data*/
	$first_day_of_current_year = strtotime($current_year . '-01-01');
	$last_day_of_current_year = strtotime($current_year . '-12-31');
	// Format the dates as strings
	$first_day_formatted_year = date('Y-m-d', $first_day_of_current_year);
	$last_day_formatted_year = date('Y-m-d', $last_day_of_current_year);

	/*Last Year Date*/
 $first_day_of_last_year = strtotime(($current_year - 1) . '-01-01');
 $last_day_of_last_year = strtotime($current_year . '-01-01') - 86400;
 $first_day_formatted_last_year = date('Y-m-d', $first_day_of_last_year);
 $last_day_formatted_last_year = date('Y-m-d', $last_day_of_last_year);

 $filterField = ($enquiryType == 'SaleEnquiry') ? 'moved_to_sales_date' : 'moved_to_lost_date';


switch ($dateRangeId) {
case 1:
$conditions = 'AND (DelegateVisitorEnquiry.moved_to_lost_date BETWEEN "'.$currentdate.'" AND "'.$currentdate.'")';
$startDate = $currentdate;
$endDate = $currentdate;
$parameters = 'Daily';
break;

case 2:
$conditions = 'AND (DelegateVisitorEnquiry.moved_to_lost_date BETWEEN "'.$lastSevenDays.'" AND "'.$currentdate.'")';
$startDate = $lastSevenDays;
$endDate = $currentdate;
$parameters = 'weekly';
break;


case 3:
$conditions = 'AND (DelegateVisitorEnquiry.moved_to_lost_date BETWEEN "'.$lastthirtyDays.'" AND "'.$currentdate.'")';
$startDate = $lastthirtyDays;
$endDate = $currentdate;
$parameters = 'Last 15 Days';
break;

case 4:
$conditions = 'AND (DelegateVisitorEnquiry.moved_to_lost_date BETWEEN "'.$currentMonthStartDate.'" AND "'.$currentMonthEndDate.'")';
$startDate = $currentMonthStartDate;
$endDate = $currentMonthEndDate;
$parameters = 'Monthly';
break;

case 5:
$conditions = 'AND (DelegateVisitorEnquiry.moved_to_lost_date BETWEEN "'.$first_day_last_month.'" AND "'.$last_day_formatted.'")';
$startDate = $first_day_last_month;
$endDate = $last_day_formatted;
$parameters = 'Last Month';
break;

case 6:
$conditions = 'AND (DelegateVisitorEnquiry.moved_to_lost_date BETWEEN "'.$first_day_formatted_year.'" AND "'.$last_day_formatted_year.'")';
$startDate = $first_day_formatted_year;
$endDate = $last_day_formatted_year;
$parameters = 'Annualy';
break;

case 7:
$conditions = 'AND (DelegateVisitorEnquiry.moved_to_lost_date BETWEEN "'.$first_day_formatted_last_year.'" AND "'.$last_day_formatted_last_year.'")';
$startDate = $first_day_formatted_last_year;
$endDate = $last_day_formatted_last_year;
$parameters = 'Last Year';
break;

}
$responce = ['conditions'=>$conditions,'parameters'=>$parameters,'startDate'=>$startDate,'endDate'=>$endDate];
return $responce;

}




 /*Function For Download Excel File*/
 public function export_to_excel($filename,$tableDate){

  $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();

  // Get the active sheet
	 $sheet = $spreadsheet->getActiveSheet();

	 // Set the data into the sheet (assuming $data is an array of rows with 'name', 'age', and 'email' keys)
    foreach ($tableDate as $row => $rowData) {
       foreach ($rowData as $column => $value) {
           $sheet->setCellValueByColumnAndRow($column + 1, $row + 1, $value);
       }
   }

   // Create a writer to save the spreadsheet as an XLSX file
   $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

   $file = WWW_ROOT .'reports/xlsx/'.$filename.'.xlsx';
   $writer->save($file);

   // Optionally, force the download of the generated spreadsheet
   $this->response->file($file, array('download' => true));

 }


}