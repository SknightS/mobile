<?php

class pages extends MY_Controller {


	  

	function __construct()
	{
		parent::__construct();

	}
	
	function aboutus()
	{
			$this->view_data['selected_page']="aboutus";
			$this->view_data['title']="About US | Mera Mobile";
		
	}

	function home()
	{
			$this->view_data['selected_page']="home";
			$this->view_data['title']="Welcome to Mera Mobile | Mera Mobile";
		
	}

	
	


}