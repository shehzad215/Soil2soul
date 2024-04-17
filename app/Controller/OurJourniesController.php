<?php
App::uses('AppController', 'Controller');
/**
 * OurJournies Controller
 *
 * @property OurJourny $OurJourny
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class OurJourniesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session', 'Flash');

/*
* beforeFilter method
*/
function beforeFilter() {
	parent::beforeFilter();
	$this->set('enableAjax', false);
	$this->Auth->allow('index','view','admin_Journeyordervalue');
}

/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$journyid = trim($this->request->data['journyid']);

	// debug($serviceId);exit;

	 if (!empty($journyid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->OurJourny->id = $journyid;
       	 if ($this->OurJourny->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}

/*Display On Home*/
public function admin_is_dispaly_home(){
	$this->autoRender = false;
	$journyid = trim($this->request->data['journyid']);

	if (!empty($journyid)){
   		$action = $this->request->data['checkedid'];
   		$value= ($action == "true") ? 1 : 0;
   	   	$this->OurJourny->id = $journyid;
	   	 if ($this->OurJourny->saveField('display_on_home_page',$value)) {
	            echo 'Active';
	       }else{
	           echo 'Something Error';
	       } 
  }

}
/*
*/
	public function admin_Journeyordervalue() {
		$this->autoRender = false;

		$responce = [];
		$status = $statusText = '';
		$order = $this->request->data['order'];
		$journeyid = $this->request->data['journeyid'];

		if(!empty($order)){	
				$this->OurJourny->id = $journeyid;
				$this->OurJourny->saveField('order', $order);
				$status = 2;
				$statusText = 'Order Number Updated!';
			}	
		else{
			$status = 1;
			$statusText = 'Please Add Order Number';
		}

		$responce = ['status'=>$status,'statusText'=>$statusText];
		

	    return json_encode($responce);

	}

/**
 * admin_index method
 *
 * @return void
 */
public function admin_index() {

	/*Package Id*/
	$package_id = (isset($this->request->params['named']['OurJourny.package_id'])) ? $this->request->params['named']['OurJourny.package_id'] : '';

	$options = array();
	$conditions = array();
	$options['conditions'] = $this->Hetu->named_index($conditions);
	$options['contain'] = ['Package.name','OurTeam.id'];
	$this->OurJourny->recursive = 0;
	$this->paginate = $options;
	$this->set('ourJournies', $this->paginate('OurJourny'));
	$this->set('_serialize', array('ourJournies'));



	$packages = $this->OurJourny->Package->find('list',['conditions'=>['Package.active'=>true]]);	
	//debug($packages);die;
	$packageValue = (isset($this->request->params['named']['OurJourny.package_id'])) ? $this->request->params['named']['OurJourny.package_id'] : '';

	$journies = (!empty($package_id)) ? $this->OurJourny->find('list',['conditions'=>['OurJourny.package_id'=>$package_id]]) : $this->OurJourny->find('list');
	$journeyValue = (isset($this->request->params['named']['OurJourny.id'])) ? $this->request->params['named']['OurJourny.id'] : '';

	$packageValue = (isset($this->request->params['named']['OurJourny.package_id'])) ? $this->request->params['named']['OurJourny.package_id'] : '';


	$activeValue = (isset($this->request->params['named']['OurJourny.active'])) ? $this->request->params['named']['OurJourny.active'] : '';

	/*Set Compact*/
	$this->set(compact('package_id','packages','packageValue','journies','journeyValue','activeValue'));
}

/*For Front-end page*/
public function index(){
$this->loadModel('Country');
$this->layout = 'home';

$currentDate = date('Y-m-d');

// debug($currentDate);exit;


$ourJournies = $this->OurJourny->find('all',[
    'conditions' => ['OurJourny.active' => true],
    'contain' => [
        'TourCost' => ['conditions' => ['TourCost.active' => true,'OR'=>['TourCost.date' => $currentDate,'TourCost.date >=' => $currentDate]]],
        'JourneyImage' => ['conditions' => ['JourneyImage.active' => true]],
        'OurTeam' => ['conditions' => ['OurTeam.active' => true]]
    ]
]);

// debug($ourJournies);exit;

$faqs = $this->OurJourny->Faq->find('all',['conditions'=>['Faq.active'=>true,'Faq.faq_type_id'=>'2'],'contain'=>false]);

/*Countries*/
$countries = $this->Country->find('list',['conditions'=>['Country.active'=>true]]);

// debug($countries);exit;

$this->set(compact('ourJournies','faqs','countries'));

}


/**
 * admin_lists method
 *
 * @return void
 */
	public function admin_lists() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$ourJournies = $this->OurJourny->find('list', $options);
		$this->set('ourJournies', $ourJournies);
		$this->set('_serialize', array('ourJournies'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->OurJourny->exists($id)) {
			throw new NotFoundException(__('Invalid our journy'));
		}
		$conditions = array('OurJourny.' . $this->OurJourny->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('ourJourny', $this->OurJourny->find('first', $options));
        $this->set('_serialize', array('ourJourny'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->loadModel('OurTeam');
			/*Package Id*/
	$package_id = (isset($this->request->params['named']['OurJourny.package_id'])) ? $this->request->params['named']['OurJourny.package_id'] : '';

		$this->set('enableAjax',false);
		if ($this->request->is('post')) {
			$this->OurJourny->create();
			if ($this->OurJourny->saveAll($this->request->data,['deep'=>true])) {
				$this->flash = array('message'=>'The our journy has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'edit',$this->OurJourny->id];
			} else {
				$this->flash = array('message'=>'The our journy could not be saved. Please, try again.', 'class'=>'danger');
			}
		}


	   $ourJourney = $this->OurJourny->find('first',['contain'=>false,'fields' => ['MAX(OurJourny.id)']]);
	   $ourJourneyId = $ourJourney['0']['MAX(`OurJourny`.`id`)'];
	   $ourJourneyId = (empty($ourJourneyId)) ? 0 + 1 : $ourJourneyId + 1;

		$currencies = $this->OurJourny->Currency->find('list',['conditions'=>['Currency.active'=>true]]);
		$amenities = $this->OurJourny->Amenity->find('list',['conditions'=>['Amenity.active'=>true]]);

		/*Our Teams*/
		$ourTeamId = $this->OurTeam->OurTeamsOurTeamType->find('list',['conditions'=>['OurTeamsOurTeamType.our_team_type_id'=>2],'fields'=>['our_team_id']]);
		$ourTeamId = array_filter((array_unique($ourTeamId)));

		/*debug($ourTeamId);die;*/
		
		$ourTeams = $this->OurTeam->find('list', ['conditions' => ['OurTeam.active' => true,'OurTeam.id'=>$ourTeamId],
	    'contain' => false,
	]);
		/*$ourTeams = $this->OurJourny->OurTeam->find('list',['conditions'=>['OurTeam.active'=>true,['OurTeam.its_scholar'=>true]]]);*/

		$packages =  $this->OurJourny->Package->find('list',['conditions'=>['Package.active'=>true]]);

		$this->set(compact('currencies', 'amenities', 'ourTeams','ourJourneyId','packages','package_id'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->loadModel('OurTeam');
		if (!$this->OurJourny->exists($id)) {
			throw new NotFoundException(__('Invalid our journy'));
		}

		$package_id = (isset($this->request->params['named']['OurJourny.package_id'])) ? $this->request->params['named']['OurJourny.package_id'] : '';

		if ($this->request->is(array('post', 'put'))) {
			if ($this->OurJourny->save($this->request->data)) {
				$this->flash = array('message'=>__('The our journy has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The our journy could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('OurJourny.' . $this->OurJourny->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->OurJourny->find('first', $options);
		}
		$ourJourneyId = $id;
		$currencies = $this->OurJourny->Currency->find('list');
		$amenities = $this->OurJourny->Amenity->find('list');
		/*Our Teams*/
		$ourTeamId = $this->OurTeam->OurTeamsOurTeamType->find('list',['conditions'=>['OurTeamsOurTeamType.our_team_type_id'=>2],'fields'=>['our_team_id']]);
		$ourTeamId = array_filter((array_unique($ourTeamId)));

		/*debug($ourTeamId);die;*/
		
		$ourTeams = $this->OurTeam->find('list', ['conditions' => ['OurTeam.active' => true,'OurTeam.id'=>$ourTeamId],
	    'contain' => false,
	]);

		$ourTeams = $this->OurJourny->OurTeam->find('list',['conditions'=>['OurTeam.its_scholar'=>true]]);
		$packages =  $this->OurJourny->Package->find('list',['conditions'=>['Package.active'=>true]]);

		$this->set(compact('currencies', 'amenities', 'ourTeams','id','ourJourneyId','packages','package_id'));
	}

/*Our journey Details page*/
public function view(){
	$this->layout = 'home';
	$this->loadModel('Country');
	$this->loadModel('SocialMedia');
	$this->loadModel('BookingFacility');
	
	$currentDate = date('Y-m-d');
	$currencyId = $this->Session->read('Currency.id');

	// debug($currencyId);exit;

	$options = array();
	$conditions = array();

	// debug($this->request->params['page_slug']);exit;

	/*Journey Id*/
	$pageSlug = (isset($this->request->params['page_slug'])) ? $this->request->params['page_slug'] : ''; 

	$journeyId = $this->OurJourny->find('list',['conditions'=>['OurJourny.page_slug'=>$pageSlug],'fields'=>['id']]);

// Redirect to 404 if $journeyId is empty
if (empty($journeyId)) {
    // Redirect to 404 error page
    throw new NotFoundException();
}

	/*Contain*/		
	$options['contain'] = ['Package','JourneyImage'=>['conditions'=>['JourneyImage.active'=>true,'JourneyImage.its_main_image !='=>true]],'OurTeam'=>['conditions'=>['OurTeam.active'=>true],'order'=>['OurTeam.order'=>'ASC']],'Currency'=>['conditions'=>['Currency.active'=>true]]];
	$options['conditions'] = ['OurJourny.id'=>$journeyId];



	/*Main Conditions*/
	$ourJourny = $this->OurJourny->find('first',$options);

	// debug($ourJourny);exit;

	$tourGlimpses = $this->OurJourny->TourGlimpse->find('all',['conditions'=>['TourGlimpse.our_journy_id'=>$journeyId,'TourGlimpse.active'=>true],'contain'=>'Amenity']);

	$journeyItenaries = $this->OurJourny->OurJourneyItenery->find('all',['conditions'=>['OurJourneyItenery.our_journy_id'=>$journeyId,'OurJourneyItenery.active'=>true],'contain'=>false]);

		

	$tourCosts = $this->OurJourny->TourCost->find('all',['conditions'=>['TourCost.our_journy_id'=>$journeyId,'TourCost.active'=>true,'TourCost.date >='=>$currentDate],'contain'=>['TourCostDetail'=>['conditions'=>['TourCostDetail.active'=>true,'TourCostDetail.currency_id'=>$currencyId],'TourCostType.name']],'order'=>['TourCost.date'=>'ASC']]);

	// debug($tourCosts);exit;


	$tourCostTypes = $this->OurJourny->TourCost->TourCostDetail->TourCostType->find('all',['conditions'=>['TourCostType.active'=>true],'contain'=>false]);

	//debug($tourCostTypes);exit;
	

	$closest_price  = $tourCostTypeName = $closest_date = $tourCostId =  '';
	
	foreach ($tourCosts as $key => $tourCost) {
		$tour_date = $tourCost['TourCost']['date'];
		
		// Parsing dates as DateTime objects for proper comparison
		 // $currentDateObj = new DateTime($currentDate);
		 // $tourDateObj = new DateTime($tour_date);
		$currentDateObj = strtotime($currentDate);
		$tourDateObj = strtotime($tour_date);

	

		 if ($tourDateObj >= $currentDateObj && (!$closest_date || $tourDateObj > $closest_date)) {
			 $closest_date = $tour_date;
			// debug($closest_date);
			 foreach ($tourCost['TourCostDetail'] as $detail) {
			 	 if ($detail['tour_cost_type_id'] == 1) {
			 	 	$tourCostId = 	$detail['tour_cost_id'];
	                $closest_price = $detail['price'];
	                $tourCostTypeName = $detail['TourCostType']['name'];
	                break; // No need to continue if we found the price for id = 1
	            }
			 }
		}
	}

	// debug($tourCostId);exit;


	$ourJourneyExclusions = $this->OurJourny->OurJourneyExlusion->find('all',['conditions'=>['OurJourneyExlusion.our_journy_id'=>$journeyId,'OurJourneyExlusion.active'=>true],'contain'=>false]);

	$ourJourneyInclusions = $this->OurJourny->OurJourneyInclusion->find('all',['conditions'=>['OurJourneyInclusion.our_journy_id'=>$journeyId,'OurJourneyInclusion.active'=>true],'contain'=>false]);

	$ourJournyTestimonials = $this->OurJourny->Testimonial->find('all',['conditions'=>['Testimonial.our_journy_id'=>$journeyId],['Testimonial.active'=>true]]);

	//debug($ourJournyTestimonials);die;
	$journeyHotels = $this->OurJourny->OurJourneyHotel->find('all',['conditions'=>['OurJourneyHotel.our_journy_id'=>$journeyId],['OurJourneyHotel.active'=>true]]);

	/*debug($journeyHotels);die;*/

	 $faqs = $this->OurJourny->Faq->find('all',['conditions'=>['Faq.our_journy_id'=>$journeyId,'Faq.active'=>true],'contain'=>false]);

	 $countries = $this->Country->find('list',['conditions'=>['Country.active'=>true]]);

	 $socialMedias = $this->SocialMedia->find('all',['conditions'=>['SocialMedia.active'=>true]]);
	
	 /*Booking Facilities*/
	 $bookingFacilities = $this->BookingFacility->find('all',['conditions'=>['BookingFacility.active'=>true]]);

	
	 $otherTrails = $this->OurJourny->find('all',['conditions'=>['OurJourny.active'=>true,'OurJourny.id !='=>$journeyId,'OurJourny.package_id'=>$ourJourny['OurJourny']['package_id']],'contain'=>false]);

	/*Tour Cost type*/	 	
	$this->loadModel('TourCostType');
	$roomTypes = $this->TourCostType->find('list',['conditions'=>['TourCostType.active'=>true]]);

	// debug($roomTypes);exit;


	/*Set Compact*/
	$this->set(compact('ourJourny','tourGlimpses','ourJourneyExclusions','ourJourneyInclusions','journeyItenaries','tourCosts','journeyHotels','faqs','currentDate','countries','socialMedias','bookingFacilities','otherTrails','roomTypes','ourJournyTestimonials','closest_price','tourCostTypeName','closest_date','tourCostId','tourCostTypes'));
}


/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null, $confirm = null) {
		parent::delete($id, $confirm);
	}}
