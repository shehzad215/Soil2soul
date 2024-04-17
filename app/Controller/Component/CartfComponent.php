<?php
App::uses('Component', 'Controller');
App::uses('AppController', 'Controller');
class CartfComponent extends Component {
	public $components = array('Session', 'RequestHandler', 'Auth', 'Cache');
	
	public function start() {
		$cart = ClassRegistry::init('Cart');
		$cart->recursive = 2;
		if($this->Session->check('cart.id')) {
			$current = $cart->find('first', [
				'conditions'=>['Cart.session' => $this->Session->read('cart.id')]
			]);
			if(isset($current['Cart']))
				return $current;
			}
		$cart->create();
		$data = array();
		$sessionCart = md5($_SERVER['REMOTE_ADDR']+time());
		$data['Cart']['session'] = $sessionCart;
		$this->Session->write('cart.id', $sessionCart);
		$cart->save($data);
		$id = $cart->getLastInsertId();
		return $cart->find('first', ['conditions'=>['Cart.id' => $id]]);
	}
	
	public function get() {
		$cart = ClassRegistry::init('Cart');
		if($this->Session->check('cart.id')) {
			$cart->recursive = 2;
			
			$current = $cart->find('first', [
			//	'Cart.user_id'=>$this->Auth->user('id'),
				'conditions'=>[
			        'Cart.session'=>$this->Session->read('cart.id')
				],
				'contain'=>[
					'CartItem'=>[
						'conditions' => ['CartItem.is_buy_now' => false],
						'TempOrderComboProduct',
						'Attraction'=>[
							'AttractionProductApiMap',
							'AttractionImage'=>[
                                'fields' =>['id', 'title', 'image_file', 'is_cover_image', 'is_thumbnail_image','active'],
                                'conditions' =>  [
                                    'AttractionImage.active' => true ,
                                    'OR' => array(
                                        'AttractionImage.is_thumbnail_image' => true,
                                    'AttractionImage.is_cover_image' => true, 
                                    )

                                ],
                                'order' => ['AttractionImage.is_thumbnail_image' => 'DESC'],
                                'limit' => 1,
							]
						],
						'AttractionProduct'=>[
							'AttractionProductCombo' => ['AttractionProduct' => ['fields' => ['title']]]
						], 
						'CartItemDetail'=>[
							'AttractionProductPriceGroup', 
							'AttractionProductPrice'=>['Currency'], 
						],
						'Nationality', 
						'AttractionProductTimeSlot'
					]
				]
			]);

			if($current){
				$this->AppController = new AppController();
				$todayDate = date('Y-m-d');
				foreach ($current['CartItem'] as $cartItemkey => $cartItem) {
					$hotelBedsactivityDataFeeds = '';
					if($cartItem['CartItemDetail'][0]['AttractionProductPrice']['supplier_id'] == hotelbeds_api_supplier_id){
						if(Hash::get($cartItem, 'Attraction.AttractionProductApiMap.0')){
							//check if Attraction Product cache is set
							$checkAttractionProductCache = Cache::read($cartItem['attraction_product_id'].$cartItem['created'], 'hotelbedsmodalitycache');
							if(empty($checkAttractionProductCache)) {
								$hotelBedsactivityDataFeeds = $this->AppController->hotel_beds_detail_simple_with_activity_and_modality_Url($cartItem['Attraction']['AttractionProductApiMap'][0]['code'], $cartItem['AttractionProduct']['code'], $cartItem['travel_date'], date('Y-m-d', strtotime($cartItem['travel_date'] . ' +1 day')));

								if($hotelBedsactivityDataFeeds && Hash::get($hotelBedsactivityDataFeeds, 'activity.type')){
									Cache::write($cartItem['attraction_product_id'].$cartItem['created'], $hotelBedsactivityDataFeeds, 'hotelbedsmodalitycache');
								}else{
									//delete Attraction from cart if error from HotelBeds API
									$cart->CartItem->deleteAll(
										['CartItem.id' => $cartItem['id'], 'CartItem.attraction_id' => $cartItem['Attraction']['id']], true, false
										);
									unset($current['CartItem'][$cartItemkey]);
								}

							}
						}else{
							//delete Attraction from cart if error from HotelBeds API
							$cart->CartItem->deleteAll(
								['CartItem.id' => $cartItem['id'], 'CartItem.attraction_id' => $cartItem['Attraction']['id']], true, false
								);
							unset($current['CartItem'][$cartItemkey]);
						}
					}
				}
				//hotel beds API start here
				return $current;
			}	
		}
		return null;
	}
	
	function delete() {
		$current = $this->get();
		$cart = ClassRegistry::init('Cart');
		$cart->del($current['Cart']['id']);
		$this->Session->del('cart.id');
	}
	
}