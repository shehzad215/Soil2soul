<?php
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
/**
 * ContactEnqueries Controller
 *
 * @property ContactEnquery $ContactEnquery
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class ContactEnqueriesController extends AppController {

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
	$this->Auth->allow('index','generateCaptcha');
}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$options = array();
		$conditions = array();
		$conditions = ['ContactEnquery.token !='=>null];
		$options['conditions'] = $this->Hetu->named_index($conditions);
		$options['contain'] = false;
		$this->ContactEnquery->recursive = 0;
		$this->paginate = $options;
		$this->set('contactEnqueries', $this->paginate('ContactEnquery'));
		$this->set('_serialize', array('contactEnqueries'));
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
		
		$contactEnqueries = $this->ContactEnquery->find('list', $options);
		$this->set('contactEnqueries', $contactEnqueries);
		$this->set('_serialize', array('contactEnqueries'));
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->ContactEnquery->exists($id)) {
			throw new NotFoundException(__('Invalid contact enquery'));
		}
		$conditions = array('ContactEnquery.' . $this->ContactEnquery->primaryKey => $id);
		$options['conditions'] = $conditions;
		$this->set('contactEnquery', $this->ContactEnquery->find('first', $options));
        $this->set('_serialize', array('contactEnquery'));
	}

/**
/*For Captach Generator*/
 public function generateCaptcha() {
    
    $random_num = md5(random_bytes(64));
    $captcha_code = substr($random_num, 0, 6);
    $this->Session->write('CAPTCHA_CODE', $captcha_code);


    // Create the image
    $layer = imagecreatetruecolor(160, 37);

  	//debug($layer);

    $captcha_bg = imagecolorallocate($layer, 247, 174, 71);
    imagefill($layer, 0, 0, $captcha_bg);
    $captcha_text_color = imagecolorallocate($layer, 0, 0, 0);
    imagestring($layer, 5, 55, 10, $captcha_code, $captcha_text_color);

    // Output the image
    header("Content-type: image/jpeg");
    imagejpeg($layer);
    imagedestroy($layer); // Clean up resources
    exit; // Stop further processing
}
/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		
		if ($this->request->is('post')) {
			$this->ContactEnquery->create();
			$this->request->data['ContactEnquery']['name'] = $this->request->data['ContactEnquery']['first_name'].' '.$this->request->data['ContactEnquery']['last_name']; 
			
			$email = $this->request->data['ContactEnquery']['email'];
			$enquiry = $this->request->data; 	
		
			/*Session Captcha Code*/	
			$captachSessinCode =  $this->Session->read('CAPTCHA_CODE');
			
			/*Added Captcha Code*/
			$captchaUserCode = $this->request->data['ContactEnquery']['token'];
			// debug($this->request->data);exit;	

			
			
		
		if($captachSessinCode == $captchaUserCode){

			if ($this->ContactEnquery->save($this->request->data)) {

					 $Email1 = new CakeEmail('default');
					 $Email1->template('feedback_contact')
					->viewVars(['data' => $enquiry])
	   					 ->emailFormat('html')
	  			    ->to($email)
	  			    // ->to('shehzad@puratech.in')
	   				 // ->to($email1)
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

					$this->flash = array('message'=>'Thank you, for your interest. Our team will contact you shortly !', 'class'=>'success');
					$this->redirect = true;
			}	
		} else {
				$this->flash = array('message'=>'The ContactEnquery could not be saved. Please, try again.', 'class'=>'danger');
			}
		
		}
	}

/**
/*for Frond-end*/
public function index(){
	$this->layout = 'home';
	$this->admin_add();
}
/**

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->ContactEnquery->exists($id)) {
			throw new NotFoundException(__('Invalid contact enquery'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->ContactEnquery->save($this->request->data)) {
				$this->flash = array('message'=>__('The contact enquery has been saved'), 'class'=>'success');
				$this->redirect = true;
			} else {
				$this->flash = array('message'=>__('The contact enquery could not be saved. Please, try again.'), 'class'=>'danger');
			}
		} else {
			$conditions = array('ContactEnquery.' . $this->ContactEnquery->primaryKey => $id);
			$options['conditions'] = $conditions;
			$this->request->data = $this->ContactEnquery->find('first', $options);
		}
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
