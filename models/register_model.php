<?php

class Register_Model extends Model
{
	public function __construct()
	{
		parent::__construct();
	}

	 public function runRegister($data) {

	    $sth = $this->db->prepare("SELECT * FROM users WHERE login = :login ");
		$sth->execute(array(
			 ':login' => $data['login']	
		));
		$data1 = $sth->fetch();
		$count =  $sth->rowCount();
		if ($count > 0) {	
			Session::init();
			Session::set('errorregister', 'Username already exists.');
			header('location: ../register');
		} 
		else 
		{
		 $this->db->insert('users', array(
            'REGION' => $data['region'],
            'WILAYA' => $data['wregion'],
            'STRUCTURE' => $data['station'],
            'login' => $data['login'],
			'role' => $data['role'],
            'password' => md5($data['password'])		
        ));
		header('location: ' . URL . 'login');
		}     
    }
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
}