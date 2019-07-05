<?php

class Ca extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('ca/index');
	}
	
	function run()
	{
	$this->model->run();
	}
	

}