<?php


include "View/siteMenuView.php";


class cntrCloud {

    public $model, $view;
	
	function __construct() {	
	}
	
	function viewMenu(){		
		
		$this->view = new siteMenu();
	}	
	
	function actions($flag) {	
	
	    $this->viewMenu();		
		
		if($flag=="register"){
		   include "View/addUserView.html";
		}  
		
		include "Model/modelCloud.php";
			$this->model = new modelCloud();
		
		if($flag=="registerUser"){		  		  
		  		  
		  $this->model->registerUser ($_REQUEST['email'], $_REQUEST['password'], $_REQUEST['firstname'], $_REQUEST['lastname']);		  
		}

		if($flag=="userLogin"){
		   include "View/userLoginView.html";
		}

		
		if($flag=="loginUser"){		  		  
		  		  
		  $this->model->loginUser ($_REQUEST['email'], $_REQUEST['password']);		  
		}

		
		if($flag=="employeeLogin"){
		   include "View/employeeLoginView.html";
		}

		
		if($flag=="loginEmployee"){		  		  
		  		  
		  $this->model->loginEmployee ($_REQUEST['username'], $_REQUEST['password']);		  
		}
		
	}
}	
?>