<?php
App::uses('AppController', 'Controller');
/**
 * Packages Controller
 *
 * @property Package $Package
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PackagesController extends AppController {

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
$this->Auth->allow('index','view');
}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$conditions = array();
		$options['conditions'] = $this->Hetu->named_index($conditions);
		$options['contain'] = false;
		$this->Package->recursive = 0;
		$this->paginate = $options;
		$this->set('packages', $this->paginate('Package'));
		$this->set('_serialize', array('packages'));
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
		
		$packages = $this->Package->find('list', $options);
		$this->set('packages', $packages);
		$this->set('_serialize', array('packages'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Package->exists($id)) {
			throw new NotFoundException(__('Invalid package'));
		}
		$conditions = array('Package.' . $this->Package->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('package', $this->Package->find('first', $options));
        $this->set('_serialize', array('package'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		$this->set('enableAjax',false);
		if ($this->request->is('post')) {
			$this->Package->create();
			if ($this->Package->save($this->request->data)) {
				$this->flash = array('message'=>'The package has been saved', 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>'The package could not be saved. Please, try again.', 'class'=>'danger');
			}
		}

	   $package = $this->Package->find('first',['contain'=>false,'fields' => ['MAX(Package.id)']]);
	   $packageId = $package['0']['MAX(`Package`.`id`)'];
	   $packageId = (empty($packageId)) ? 0 + 1 : $packageId + 1;

	   $this->set(compact('packageId'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		$this->set('enableAjax',false);
		if (!$this->Package->exists($id)) {
			throw new NotFoundException(__('Invalid package'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Package->save($this->request->data)) {
				$this->flash = array('message'=>__('The package has been saved'), 'class'=>'success');
				$this->redirect = ['action'=>'index'];
			} else {
				$this->flash = array('message'=>__('The package could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Package.' . $this->Package->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Package->find('first', $options);
		}

		$packageId = $id;

		$this->set(compact('packageId'));

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
	}

/*Package Index page*/
public function index(){
	$this->layout = 'home';
	$this->loadModel('Country');
	$currentDate = date('Y-m-d');

	// debug($currentDate);exit;

	$options = $conditions = [];
	$options['conditions'] = ['OurJourny.active'=>true];
	$options['contain'] = [
		'Package',
        'TourCost' => ['conditions' => ['TourCost.active' => true,'OR'=>['TourCost.date' => $currentDate,'TourCost.date >=' => $currentDate]],'order'=>['TourCost.date'=>'ASC']],
        'JourneyImage' => ['conditions' => ['JourneyImage.active' => true,'JourneyImage.its_main_image'=>true],'limit'=>'1'],
        'OurScholarDetail' => ['conditions' => ['OurScholarDetail.active' => true],'OurTeam']
    ];


    // $options['order'] = ['OurJourny.package_id'=>'ASC'];
	$this->OurJourny->recursive = 0;
	$this->paginate = $options;
	$this->set('ourJournies', $this->paginate('OurJourny'));
	$this->set('_serialize', array('ourJournies'));	
	

	$faqs = $this->Package->OurJourny->Faq->find('all',['conditions'=>['Faq.active'=>true,'Faq.faq_type_id'=>'1'],'contain'=>false]);

	$countries = $this->Country->find('list',['conditions'=>['Country.active'=>true]]);
	/*Set Compact*/
	$this->set(compact('faqs','countries'));
}

/*package front-end detail page*/
public function view(){
	$this->layout = 'home';
	$this->loadModel('Country');
	$currentDate = date('Y-m-d');

	/*Slug*/
	$slug = (isset($this->request->params['pacakage_slug'])) ? $this->request->params['pacakage_slug'] : '';



	/*Package Details*/
	$package = $this->Package->find('first',['conditions'=>['Package.page_slug'=>$slug],'contain'=>['OurJourny'=>['conditions'=>['OurJourny.active'=>true]]]]);

	if (empty($package)) {
	    // Redirect to 404 error page
	    throw new NotFoundException();
	}

	/*Journey Ids*/
	$journeyIds = hash::extract($package,'OurJourny.{n}.id');

	$ourJournies = $this->Package->OurJourny->find('all',[
    'conditions' => ['OurJourny.active' => true,'OurJourny.id'=>$journeyIds],
    'contain' => [
        'TourCost' => ['conditions' => ['TourCost.active' => true,'OR'=>['TourCost.date' => $currentDate,'TourCost.date >=' => $currentDate]]],
         'JourneyImage' => ['conditions' => ['JourneyImage.active' => true,'JourneyImage.its_main_image'=>true],'limit'=>'1'],
        'OurScholarDetail' => ['conditions' => ['OurScholarDetail.active' => true],'OurTeam']
    ]
	]);

	// debug($ourJournies);exit;


	/*Related Packages*/
	$pacakageDetails = $this->Package->find('all',['conditions'=>['Package.active'=>true,'Package.id !='=>$package['Package']['id']],'contain'=>['OurJourny.id'],'limit'=>'4']);


		/*Countries*/
	$countries = $this->Country->find('list',['conditions'=>['Country.active'=>true]]);
	// debug($pacakageDetails);exit;

	/*Set Compact*/
	$this->set(compact('package','ourJournies','pacakageDetails','countries'));

}

	/*For Display Review of Active*/
public function admin_is_active(){
	$this->autoRender = false;

	$packageid = trim($this->request->data['packageid']);

	// debug($serviceId);exit;

	 if (!empty($packageid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Package->id = $packageid;
       	 if ($this->Package->saveField('active',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}

	/*For Display Review of Display*/
public function admin_is_display(){
	$this->autoRender = false;

	$packageid = trim($this->request->data['packageid']);

	// debug($serviceId);exit;

	 if (!empty($packageid)){
       	$action = $this->request->data['checkedid'];
       	$value= ($action == "true") ? 1 : 0;
       	/*debug($value);*/
       	$this->Package->id = $packageid;
       	 if ($this->Package->saveField('display_on_homepage',$value)) {
                echo 'Active';
           }else{
               echo 'Something Error';
           } 
      }
}




}
