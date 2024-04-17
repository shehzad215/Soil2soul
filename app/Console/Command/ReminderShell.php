<?php
	class ReminderShell extends Shell { 
		
		var $tasks = array('Mail'); 
		
		function beforeFilter() { 
			parent::beforeFilter();
			//$this->set('enableAjax', true);
			$this->Auth->allow('mailschedule');
		}

		function main() { 
			/*App::import('Component','Auth'); 
	        $this->Auth = new AuthComponent(); */
		    $this->Mail->mailschedule(); 
		}
	}
?>