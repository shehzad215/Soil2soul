<?php
/**
 * Pura Helper
 *
 * Input Form manipulations: ...
 *
 */
App::uses('AppHelper', 'View/Helper');
App::uses('Sanitize', 'Utility');
App::uses('Hash', 'Utility');

/**
 * Bootstrap helper library.
 *
 * Text manipulations: Highlight, excerpt, truncate, strip of links, convert email addresses to mailto: links...
 *
 * @package       Cake.View.Helper
 * @property      HtmlHelper $Html
 * @link http://book.cakephp.org/2.0/en/core-libraries/helpers/text.html
 * @see String
 */
class PuraHelper extends AppHelper {

/**
 * helpers
 *
 * @var array
 */
    public $helpers = array('Html', 'Form', 'Session', 'Time', 'Bs');

/**
 * 
 *
 * @var array
 */
    public $options = array();

/**
 * 
 *
 * @var array
 */
    public $isLoggedIn = false;

/**
 * Constructor
 *
 * ### Settings:
 *
 * - `engine` Class name to use to replace String functionality.
 *            The class needs to be placed in the `Utility` directory.
 *
 * @param View $View the view object the helper is attached to.
 * @param array $settings Settings array Settings array
 * @throws CakeException when the engine class could not be found.
 */
    public function __construct(View $View, $settings = array()) {
        $settings = Hash::merge(array('engine' => 'String'), $settings);
        parent::__construct($View, $settings);
        list($plugin, $engineClass) = pluginSplit($settings['engine'], true);
        App::uses($engineClass, $plugin . 'Utility');
        if (class_exists($engineClass)) {
            $this->_engine = new $engineClass($settings);
        } else {
            throw new CakeException(__d('cake_dev', '%s could not be found', $engineClass));
        }
        
        $this->modalTarget = '#myModal';
        if ($this->request->is('ajax')) {
            $this->modalTarget = '#myModalAjax';
        }

        $this->isLoggedIn = $this->Session->check('Auth.User.id');
    }
    
    function addOrdinalNumberSuffix($num) {
        if (!in_array(($num % 100),array(11,12,13))){
            switch ($num % 10) {
                // Handle 1st, 2nd, 3rd
                case 1:  return $num.'st';
                case 2:  return $num.'nd';
                case 3:  return $num.'rd';
            }
        }
        return $num.'th';
    }
    
    public function formatRate($rate) {
		$strlen = strlen((int)$rate);
		$append = '';
		if($strlen > 3 && $strlen < 6) {
			$rate = round($rate / 1000, 2);
			$append = 'K';
        } else if($strlen > 5 && $strlen < 8) {
			$rate = round($rate / 100000, 2);
			$append = 'Lacs';
		} else if($strlen > 7) {
			$append = 'Cr';
			$rate = round($rate / 10000000, 2);
		}
		return $rate.' '.$append;
	}
    
    public function category_star($categoryName) {
        $html = '';
        if(preg_match('/star/i', $categoryName)) {
            preg_match('/[0-9]/i', $categoryName, $matches);
            $noOfStars = $matches[0];
            
            for($i=0; $i<$noOfStars; $i++) {
                $html .= $this->Html->image('star.png', array('style'=>'display:inline-block'));
            }
        } else {
            $html .= h($categoryName);
        }
        return $html;
    }

    public function price_block($attraction, $userWishlistAttractionsList ,$wishlists = false, $slug = '') {
        $callPriceFunction = $this->prices($attraction);
        if(!empty($callPriceFunction['msg']) && $callPriceFunction['msg']=='Success') {
            $sellingPrice = $callPriceFunction['selling_price'];
            $discount_amount = $callPriceFunction['discount_amount'];
            $productPriceCount =  $callPriceFunction['productPriceCount'];
        }

        $html = '';
        $html .= $this->Html->div('price-block');

        if(!empty($discount_amount)) {
            // $html .= $this->Html->div('',
            //     __('Up to').
            //     $this->Html->tag('br').
            //     $this->Html->tag('span', $dicountPercentage.__('% off'), ['class'=>'textorange20']).
            //     $this->Html->tag('br').
            //     __('Starting from').' '
            // );
            $html .= '<span style="font-size: 12px;">Starting from</span>';
            $html .= $this->Html->div('textorange22boldprice currencydiv',
                $this->Html->tag('span', $discount_amount.' ', ['class'=>'textgray16medium']).
                '&nbsp;'.$sellingPrice
            );
        } else { 
            // if(!empty($productPriceCount) && $productPriceCount > 1) {
           // if(!empty($productPriceCount)) {
               
            //}else{
           // }

            if(!empty($sellingPrice)) {
                 $html .= '<span style="font-size: 12px;">Starting from</span>';
                $html .= $this->Html->div('textorange22boldprice currencydiv',
                    $sellingPrice
                );

                $html .= '';
            }
        }

        $html .= $this->Html->tag('/div');

        $html .= $this->Html->div('buttons mapViewButtonClass');

        $linkOpts = ['escape'=>false, 'class'=>'addtolistbtn shortlist-link'];
        if($this->isLoggedIn) { 
            $url = array('controller'=>'wishlists','user' =>false, $attraction[0]['attraction_id'], $this->Session->read('Auth.User.id'));
            $linkOpts['data-toggle'] = 'modal-manager';
        } else {
            $url = array('controller'=>'users', 'action'=>'login');
        }

        if(in_array($attraction[0]['attraction_id'], $userWishlistAttractionsList)) {
            $linkOpts['data-action'] = 'remove';
            $linkOpts['data-wishlist'] = ($wishlists === true) ? '1' : '0';
            $linkOpts['class'] .= ' active';

            if($this->isLoggedIn) { 
                $url['action'] = 'remove';
            }
            $html .= $this->Html->link( __('Remove From Wishlist'), $url, $linkOpts).' ';
        } else {
            $linkOpts['data-action'] = 'add';

            if($this->isLoggedIn) {
                $url['action'] = 'add';
            }
            $html .= $this->Html->link( __('Add to Wishlist'), $url, $linkOpts).' ';
        }

        $html .= $this->Bs->link(
            __('Read More'),
            ['controller'=>'attractions', 'action'=>'view','id' => $attraction[0]['attraction_id'],
    'attractionslug' => $slug,'user' =>false], 
            ['class'=>'learnmoretbtn readMoreHideClass']
        ); 

        $html .= $this->Html->tag('/div');

        return $html;
    }


    public function nearBy() {
        $html = '';
        $googleSearchPlaceLists = [
            'map-icon-school' => 'school',
            'map-icon-restaurant' => 'restaurant',
            'map-icon-hospital' => 'hospital',
            'map-icon-bus-station' => 'bus_station',
            'map-icon-parking' => 'park',
            'map-icon-bank' => 'bank',
            'map-icon-bar' => 'bar',
            'map-icon-movie-theater' => 'movie_theater',
            'map-icon-night-club' => 'night_club',
            'map-icon-zoo' => 'zoo',
            'map-icon-gym' => 'gym',
            'map-icon-atm' => 'atm',
            'map-icon-spa' => 'spa',
            'map-icon-airport' => 'airport',
            'map-icon-train-station' => 'train_station',
            'map-icon-shopping-mall' => 'shopping_mall',
            'map-icon-pharmacy' => 'pharmacy',
            'map-icon-police' => 'police',
        ];
        $g=1; 
        foreach ($googleSearchPlaceLists as $googleSearchPlaceKey => $googleSearchPlaceList) {
            $convertUnderscoreToSpace = str_replace('_', ' ', $googleSearchPlaceList);
            if($g%6==1){
                $html .= '<div class="row">';
            }
                $html .= '<div class="col-xs-6 col-md-2">';
                $html .= '<input type="checkbox" name="mytype" class="chkbox" id="'.$googleSearchPlaceKey.'"  value="'.$googleSearchPlaceList.'"/>';

                 $html .= '<label for="'.$googleSearchPlaceKey.'" >'.ucwords($convertUnderscoreToSpace).'</label></div>';
            if($g%6==0){
                $html .= '</div>';
            }
        $g++;
        }

        return $html;
    }
    
    public function prices($attraction = [] , $booking = '', $bookingAddPage = '', $attractionView = '') {
        if(!empty($attraction)) {
            //debug($attraction);exit;
            if(!empty($attraction[0])){
                $attractionfinal = $attraction;
            }else{
                $attractionfinal[] = $attraction;
            }
            //debug($attractionfinal);
            if(Hash::get($attractionfinal, '0.AttractionProductPriceGroup.0.AttractionProductPrice.0')) {
                foreach ($attractionfinal as $key => &$attractionProduct) {
                    //debug($attractionProduct);
                    foreach ($attractionProduct['AttractionProductPriceGroup'] as $attractionProductPriceGroupkey => $attractionProductPriceGroup){
                        //debug($attractionProductPriceGroup);
                        foreach ($attractionProductPriceGroup['AttractionProductPrice'] as $attractionProductPriceskey => $attractionProductPrice) {

                            //check if festival rates
                            if(Hash::get($attractionProductPriceGroup, 'AttractionProductPriceFestival.0.id')){

                                //check if festival set for supplier
                                $festivalSupplierID = $attractionProductPriceGroup['AttractionProductPriceFestival'][0]['supplier_id'];

                                if($festivalSupplierID){
                                    $supplierID = $attractionProductPrice['supplier_id'];
                                    if($festivalSupplierID === $supplierID){
                                        $festivalArray = $attractionProductPriceGroup['AttractionProductPriceFestival'][0];
                                        // $arrayToinsert = [

                                        //     'selling_price_before_festival_price' => $attractionProductPrice['selling_price'],
                                        //     'selling_price' => $festivalArray['selling_price'],
                                        //     'festival_price' => $festivalArray['selling_price'],
                                        //     'is_festival_price' => 'Yes',
                                        //     'festival_name' => $festivalArray['title']

                                        //     ];

                                        //     $attractionfinal = array_merge(Hash::insert($attractionfinal, ''.$key.'.AttractionProductPriceGroup.'.$attractionProductPriceGroupkey.'.AttractionProductPrice'.$attractionProductPriceskey.'', $arrayToinsert));
                                        $attractionfinal = Hash::insert($attractionfinal, ''.$key.'.AttractionProductPriceGroup.'.$attractionProductPriceGroupkey.'.AttractionProductPrice.'.$attractionProductPriceskey.'.selling_price_before_festival_price', $attractionProductPrice['selling_price']);

                                        $attractionfinal = Hash::insert($attractionfinal, ''.$key.'.AttractionProductPriceGroup.'.$attractionProductPriceGroupkey.'.AttractionProductPrice.'.$attractionProductPriceskey.'.selling_price', $festivalArray['selling_price']);

                                        $attractionfinal = Hash::insert($attractionfinal, ''.$key.'.AttractionProductPriceGroup.'.$attractionProductPriceGroupkey.'.AttractionProductPrice.'.$attractionProductPriceskey.'.festival_price', $festivalArray['selling_price']);

                                        $attractionfinal = Hash::insert($attractionfinal, ''.$key.'.AttractionProductPriceGroup.'.$attractionProductPriceGroupkey.'.AttractionProductPrice.'.$attractionProductPriceskey.'.is_festival_price', 'Yes');

                                        $attractionfinal = Hash::insert($attractionfinal, ''.$key.'.AttractionProductPriceGroup.'.$attractionProductPriceGroupkey.'.AttractionProductPrice.'.$attractionProductPriceskey.'.festival_name', $festivalArray['title']);

                                    }
                                } 

                            }else{
                                //check if weekend rates set
                                
                                if($attractionProductPrice['original_price'] != 0){
                                    
                                    if( isset($attractionProductPrice['today_special_price']) && $attractionProductPrice['today_special_price'] == 'Yes' && empty($booking)){
                                        $weekendRatesarray = $attractionProductPrice;
                                        unset($attractionfinal[$key]['AttractionProductPriceGroup'][$attractionProductPriceGroupkey]['AttractionProductPrice']);
                                        Hash::insert($attractionfinal, ''.$key.'.AttractionProductPriceGroup.'.$attractionProductPriceGroupkey.'.AttractionProductPrice.0', $weekendRatesarray);
                                    }else{
                                        if(Hash::get($attractionProductPrice, 'WeekDay.0.id') && empty($booking)){
                                            unset($attractionfinal[$key]['AttractionProductPriceGroup'][$attractionProductPriceGroupkey]['AttractionProductPrice'][$attractionProductPriceskey]);
                                        }

                                    }
                                }else{
                                   unset($attractionfinal[$key]['AttractionProductPriceGroup'][$attractionProductPriceGroupkey]);
                                }
                                

                            }

                            
                        }
                    }
                    if(empty($bookingAddPage) && !empty($attractionView)){
                        //$attractionfinal[$key]['AttractionProductPriceGroup'][$attractionProductPriceGroupkey]['AttractionProductPrice'] = $this->subval_sort($attractionProductPriceGroup['AttractionProductPrice'][$attractionProductPriceskey],'selling_price');
                    }
                }

                if($booking){
                    return $attractionfinal;
                }
                //debug($attractionfinal);
                $sortProductDisplayPrice = '';
                $extractOfferPrice = Hash::extract($attractionfinal, '{n}.AttractionProductPriceGroup.{n}.AttractionProductPrice.{n}');
                
                    $adultArray = [];
                    $otherArray = [];
                    foreach ($extractOfferPrice as $adultkey => $adultvalue) {
                        if(preg_match('(Adult)', $adultvalue['AttractionProductPriceGroup']['title'])) {
                            $adultArray [] = $adultvalue;
                        }else{
                            $otherArray[] = $adultvalue;
                        }
                    }
                    if($adultArray){
                        $sortProductDisplayPrice1 = Hash::sort($adultArray, '{n}.selling_price', 'ASC');
                        if($sortProductDisplayPrice1)
                        $sortProductDisplayPrice = $sortProductDisplayPrice1[0];
                    }else{
                        $sortProductDisplayPrice1 = Hash::sort($otherArray, '{n}.selling_price', 'ASC');
                        if($sortProductDisplayPrice1)
                        $sortProductDisplayPrice = $sortProductDisplayPrice1[0];
                    }
                    $sortProductDisplayPrice = $sortProductDisplayPrice;
                
               
                //debug($sortProductDisplayPrice);exit;
                if(!empty($sortProductDisplayPrice)) {
                    //getting the current array from sort
                    //$getCurrentArray = current($sortProductDisplayPrice);
                    $getCurrentArray = $sortProductDisplayPrice;
                    $selling_price = $getCurrentArray['selling_price'];
                    $discount_amount = 0;
                    if($getCurrentArray['discount_amount']){
                        $discount_amount = $this->getPriceTitle($getCurrentArray['discount_amount']);
                    }
                    $selling_priceTitle = $this->getPriceTitle($selling_price);
                    return $response = [
                        'msg' => 'Success',                        
                        'selling_price' => $selling_priceTitle,
                        'selling_price_view' => $this->getPriceTitle($selling_price, true),
                        'discount_amount' => $discount_amount,
                        'productPriceCount' => count($extractOfferPrice),
                    ];
                }

            }
        }

    }



    // public function subval_sort($a,$subkey) {
    //     foreach($a as $k=>$v) {
    //         $b[$k] = strtolower($v[$subkey]);
    //     }
    //     asort($b);
    //     foreach($b as $key=>$val) {
    //         $c[] = $a[$key];
    //     }
    //     return $c;
    // }


    public function getPriceTitle($value = '', $signRequired = '') {

        if(CakeSession::check('Currency.id')) {
            $sessionCurrency['Currency'] = CakeSession::read('Currency');
            $isoCode = $sessionCurrency['Currency']['sign'];
            if($sessionCurrency['Currency']['iso_code']!='INR'){
                $isoCode = $sessionCurrency['Currency']['iso_code'];
            }
        }
        
        if(!empty($value)){
             $value = $this->numberformat($value);
        }else{
            $value = '';
        }
       
       if($signRequired){
            return ($sessionCurrency['Currency']['blank'] == true) ? 
                $value: 
                $value;
       }else{
            return ($sessionCurrency['Currency']['blank'] == true) ? 
                $isoCode.' '.$value: 
                $isoCode.$value;
       }
       
    }

    public function attractionClosedDays($data = array()) {
        if($data) {
            $daysOfWeekDisabled = Hash::extract($data, '{n}.week_day_id');
            $daysOfWeekDisabled = array_map(function($val) {return $val-1;}, $daysOfWeekDisabled);
            $days = [0,1,2,3,4,5,6];
            $daytodisabled = [];
            foreach($days as $day) {
                $key = array_search($day, $daysOfWeekDisabled);
                if(empty($key) && $key !== 0){
                    $daytodisabled[] = $day;
                }
            }
            $daysOfWeekDisabledStr = implode(',',$daytodisabled);
            return $daysOfWeekDisabledStr;
        }
    }





    public function numberformat($value) {
        if($value) {
            return round($value,0);
        }

        return 0;
    }

    public function buildMenu($menuLinks, $menuOptions = array()) {
        $op = '';
        $marketName = $this->Session->read('User.Market.name');

        foreach($menuLinks as $menuLink) {
            
            $menuLinkUrl = ['controller'=>'attractions', 'action'=>'index', 'list', 'AttractionsCategory.category_id'=>$menuLink['Category']['id']];
            //$this->getUrl($menuLink['Category']['link']);
            
            if(!empty($menuLink['Category']['attributes'])) {
                $options = json_decode($menuLink['Category']['attributes'], true);
            } else {
                $options = array();
            }
            
            if(!empty($menuLink['Category']['icon'])) {
                $options['icon'] = $menuLink['Category']['icon'];
            }
            
            if(empty($menuLink['children'])) {
                $op .= $this->Bs->menuLink($menuLink['Category']['name'], $menuLinkUrl, $options);
            } else {
                $subMenu = $this->buildMenu($menuLink['children']);
                $options = array_merge($options, array('tabindex'=>"-1", 'class'=>"has-sub", 'sub-menu'=>$subMenu));
                
                $subControllers = ['controller'=>'attractions', 'action'=>'index', $marketName, $menuLink['Category']['id']];
                $op .= $this->Bs->sideMenuTopLevelLink($menuLink['Category']['name'], $subControllers, $options,array('parentLiClass'=>'has-sub', 'parentChildUlClass'=>''));
            }
        }
        return $op;
    }

    public function convert_number_to_words($number) {
        $hyphen      = '-';
        $conjunction = ' and ';
        $separator   = ', ';
        $negative    = 'negative ';
        $decimal     = ' point ';
        $dictionary  = array(
            0                   => 'zero',
            1                   => 'one',
            2                   => 'two',
            3                   => 'three',
            4                   => 'four',
            5                   => 'five',
            6                   => 'six',
            7                   => 'seven',
            8                   => 'eight',
            9                   => 'nine',
            10                  => 'ten',
            11                  => 'eleven',
            12                  => 'twelve',
            13                  => 'thirteen',
            14                  => 'fourteen',
            15                  => 'fifteen',
            16                  => 'sixteen',
            17                  => 'seventeen',
            18                  => 'eighteen',
            19                  => 'nineteen',
            20                  => 'twenty',
            30                  => 'thirty',
            40                  => 'fourty',
            50                  => 'fifty',
            60                  => 'sixty',
            70                  => 'seventy',
            80                  => 'eighty',
            90                  => 'ninety',
            100                 => 'hundred',
            1000                => 'thousand',
            1000000             => 'million',
            1000000000          => 'billion',
            1000000000000       => 'trillion',
            1000000000000000    => 'quadrillion',
            1000000000000000000 => 'quintillion'
            );

        if (!is_numeric($number)) {
            return false;
        }

        if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
            trigger_error(
                'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
                E_USER_WARNING
                );
            return false;
        }
        if ($number < 0) {
            return $negative . convert_number_to_words(abs($number));
        }

        $string = $fraction = null;

        if (strpos($number, '.') !== false) {
            list($number, $fraction) = explode('.', $number);
        }

        switch (true) {
            case $number < 21:
            $string = $dictionary[$number];
            break;
            case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
            case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . $this->convert_number_to_words($remainder);
            }
            break;
            default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = $this->convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= $this->convert_number_to_words($remainder);
            }
            break;
        }

        if (null !== $fraction && is_numeric($fraction)) {
            $string .= $decimal;
            $words = array();
            foreach (str_split((string) $fraction) as $number) {
                $words[] = $dictionary[$number];
            }
            $string .= implode(' ', $words);
        }

        return $string;
    }
}
