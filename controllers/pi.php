<?php

class pi extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('pi/index');
	}
	
	function run()
	{
	$this->model->run();
	}
	

}