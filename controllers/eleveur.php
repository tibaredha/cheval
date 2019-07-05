<?php

class Eleveur extends Controller {
     
	public $controleur="Eleveur";
	
	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: ../login');
			exit;
		}
		$this->view->js = array($this->controleur.'/js/default.js');	
	}
	
	function index() 
	{
	    $this->view->title = 'dashboard';
		$this->view->render($this->controleur.'/index');
	}
	
	
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search cheval';
	    $this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp =$url1[2]; // parametre 2 page                     limit 2,3
		$this->view->userListviewl =10     ; // parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ; // parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/index');
	}
	
	function nouveau() 
	{
	    $this->view->title = 'dashboard';
		$this->view->render($this->controleur.'/nouveau');
	}
	
	public function create() 
	{
		$data = array();
		$data['Datesigna']  = $_POST['Datesigna'];
		$data['NomP']       = $_POST['NomP'];
		$data['wil']        = $_POST['wil'];
		$data['com']        = $_POST['com'];
		$data['adresse']    = $_POST['adresse'];
		$data['secteur']    = $_POST['secteur'];
		$data['telphone']   = $_POST['telphone'];
		$data['region']     = $_POST['region'];
		$data['wregion']    = $_POST['wregion'];
		$data['station']    = $_POST['station'];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$last_id=$this->model->create($data);  
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	public function delete($id)
	{
	$this->model->delete($id);       
	header('location: ' . URL .$this->controleur.'/search/0/10?o=NomP&q=');
	}
	
	public function view($id) 
	{
	    $this->view->title = 'view';
		$this->view->user =$this->model->userSingleList($id);
		$this->view->render($this->controleur.'/view');  
	}
	
	public function edit($id) 
	{
        $this->view->title = 'Edit';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/edit');
	}
	
	public function editSave($id)
	{
		$data = array();
		$data['Datesigna']  = $_POST['Datesigna'];
		$data['NomP']       = $_POST['NomP'];
		$data['wil']        = $_POST['wil'];
		$data['com']        = $_POST['com'];
		$data['adresse']    = $_POST['adresse'];
		$data['secteur']    = $_POST['secteur'];
		$data['telphone']   = $_POST['telphone'];
		$data['region']     = $_POST['region'];
		$data['wregion']    = $_POST['wregion'];
		$data['station']    = $_POST['station'];
		$data['id']         = $id;
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->editSave($data);
		header('location: ' . URL .$this->controleur.'/search/0/10?o=id&q='.$id.'');
	}
	
	
}