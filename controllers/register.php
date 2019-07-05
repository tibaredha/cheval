<?php

class Register extends Controller {

	function __construct() {
		parent::__construct();	
	}
	
	function index() 
	{	
		$this->view->render('register/index');
	}
	
    function Registerrun()
	{
		$data = array();
		$data['region']    = $_POST['region'];
		$data['wregion']   = $_POST['wregion'];
		$data['station']   = $_POST['station'];
		$data['login']     = $_POST['login'];
		$data['password']  = $_POST['password'];
		$data['role']      = $_POST['role'];
		$this->model->runRegister($data); 	
	}
}