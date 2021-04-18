<?php
//landing home page


 include "Controller/cntrCloud.php";

 $cloud = new cntrCloud();
 
 
 
 if(!isset($_REQUEST['flag'])){// first time landing page or Home button
	 
      $cloud->viewMenu();//show header menu
 }else{
	 
	 $cloud->actions($_REQUEST['flag']);
 }
 

?> 