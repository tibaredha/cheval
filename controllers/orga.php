<?php

class Orga extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('orga/index');
	}
	
	function run()
	{
	$this->model->run();
	}
	

}