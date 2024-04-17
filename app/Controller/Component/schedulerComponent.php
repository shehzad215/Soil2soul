<?php
App::uses('Component','Controller');
  //App::uses('AppController','Controller');
  // App::uses('CakeEmail', 'Network/Email');
class schedulerComponent extends Component{
  function beforeFilter() {
    parent::beforeFilter();
    $this->set('enableAjax', true);
    //$this->Auth->allow('debug_email');
  }

  public function mail_scheduler($date=null,$time=null){
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
?>