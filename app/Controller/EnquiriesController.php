<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * Enquiries Controller
 *
 * @property Enquiry $Enquiry
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class EnquiriesController extends AppController {

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
		$this->set('enableAjax', true);
		$this->Auth->allow('add');
	}
/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = $conditions = array();
		$options['contain']=['OurJourny','TourCost','Currency','Country'];
		$conditions = ['Enquiry.our_journy_id !='=>0];
		$options['conditions'] = $this->Hetu->named_index($conditions);
		
		$this->Enquiry->recursive = 0;
		$this->paginate = $options;
		$this->set('enquiries', $this->paginate('Enquiry'));
		$this->set('_serialize', array('enquiries'));
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
		
		$enquiries = $this->Enquiry->find('list', $options);
		$this->set('enquiries', $enquiries);
		$this->set('_serialize', array('enquiries'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Enquiry->exists($id)) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		$conditions = array('Enquiry.' . $this->Enquiry->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('enquiry', $this->Enquiry->find('first', $options));
        $this->set('_serialize', array('enquiry'));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Enquiry->create();
			/*Country*/
			$country_id = $this->request->data['Enquiry']['country_id'];
			$country = $this->Enquiry->Country->find('first',['conditions'=>['Country.id'=>$country_id],'contain'=>false,'fields'=>'name']);
			$country = $country['Country']['name'];
			

			/*Our Journey*/
			$journeyId = $this->request->data['Enquiry']['our_journy_id'];
			
			$ourJourney = $this->Enquiry->OurJourny->find('first',['conditions'=>['OurJourny.id'=>$journeyId],'contain'=>false,'fields'=>['id','name']]);

			// debug($ourJourney);

			// $email = $this->request->data['Enquiry']['cust_email'];
			// $enquiry = $this->request->data;
			// //debug($email);die;
			
			/*Session Captcha Code*/	
			$captachSessinCode =  $this->Session->read('CAPTCHA_CODE');

			$token = $this->request->data['Enquiry']['token'];

			if($captachSessinCode == $token){

			if ($this->Enquiry->save($this->request->data)) {
			     $Email1 = new CakeEmail('default');
				 $Email1->template('enquiry_form')
				->viewVars(['enquiry' => $this->request->data,'country'=>$country,'ourJourney'=>$ourJourney])
   					 ->emailFormat('html')
  			    // ->to('shehzad@puratech.in')
  		    	  ->subject('New Enquiry');
  		     try{				
  			       	if ($Email1->send('Your message with the attachment.')) {
                    $this->flash = array('message'=>'We have recieved you Request our team will get back to you Shortly', 'class'=>'success');
                    $this->redirect = ['action'=>'thankyou'];	
                } else {
                     $this->flash = array('message'=>'Email sending failed.', 'class'=>'danger');
                	$this->redirect = true;	
                }
            }
            catch(Exception $e){
	                $error = $e->getMessage();
				 	$this->flash = array('message'=>$error, 'class'=>'danger');
	             	$this->redirect = true;	
            }
				$this->flash = array('message'=>'The enquiry has been saved', 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>'The enquiry could not be saved. Please, try again.', 'class'=>'danger');
			}
			}else {
				$this->flash = array('message'=>'The Enquiry could not be saved. Please, try again.', 'class'=>'danger');
			}
		}
		$ourJournies = $this->Enquiry->OurJourny->find('list');
		$tourCosts = $this->Enquiry->TourCost->find('list');
		$currencies = $this->Enquiry->Currency->find('list');
		$this->set(compact('ourJournies', 'tourCosts', 'currencies'));
	}

/**
*/
	public function add() {
	   $this->admin_add();
	}
/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Enquiry->exists($id)) {
			throw new NotFoundException(__('Invalid enquiry'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Enquiry->save($this->request->data)) {
				$this->flash = array('message'=>__('The enquiry has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The enquiry could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('Enquiry.' . $this->Enquiry->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->Enquiry->find('first', $options);
		}
		$ourJournies = $this->Enquiry->OurJourny->find('list');
		$tourCosts = $this->Enquiry->TourCost->find('list');
		$currencies = $this->Enquiry->Currency->find('list');
		$this->set(compact('ourJournies', 'tourCosts', 'currencies'));
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
