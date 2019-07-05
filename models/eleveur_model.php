<?php

class Eleveur_Model extends Model {

    public  $db_host="localhost"; 
	public  $db_name="cheval";
	public  $db_tbl="eleveur"; 
	public  $db_user="root";
	public  $db_pass="";
    
	
	public function __construct() {
		parent::__construct();
	}
	
	public function userSearch($o, $q, $p, $l) {
	    $station = Session::get('station');
		return $this->db->select("SELECT * FROM $this->db_tbl where $o like '$q%' and station=$station order by NomP limit $p,$l  ");
    }
    public function userSearch1($o, $q) {
        $station = Session::get('station');
		return $this->db->select("SELECT * FROM $this->db_tbl where $o like '$q%' and station=$station order by NomP ");
    }
	 public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->db_tbl WHERE id = :id", array(':id' => $id));
    }
	
	public function create($data)
	{
		$this->db->insert($this->db_tbl, array(
			  'Datesigna' => $this->dateFR2US($data['Datesigna']),
			  'NomP' => $data['NomP'],
			  'secteur' => $data['secteur'],
			  'wil' => $data['wil'],
			  'com' => $data['com'],
			  'adresse' => $data['adresse'],
			  'telphone' => $data['telphone'],
              'region' => $data['region'],
			  'wregion' => $data['wregion'],
			  'station' => $data['station']	  
		));
		return $last_id = $this->db->lastInsertId();
		// echo '<pre>';print_r ($data);echo '<pre>';  
	}
	
	public function delete($id) { 
	$this->db->delete($this->db_tbl, "id = '$id'");
        // $this->db->delete('cheval', "id = '$id'");
		// $this->db->deletem('vaccination', "idcheval = '$id'");
		// $this->db->deletem('saillie', "idcheval = '$id'");
		// $this->db->deletem('saillie', "jument = '$id'");
		
    }

public function editSave($data) {
        $postData = array(
              'Datesigna' => $this->dateFR2US($data['Datesigna']),
			  'NomP' => $data['NomP'],
			  'secteur' => $data['secteur'],
			  'wil' => $data['wil'],
			  'com' => $data['com'],
			  'adresse' => $data['adresse'],
			  'telphone' => $data['telphone'],
              'region' => $data['region'],
			  'wregion' => $data['wregion'],
			  'station' => $data['station']	 
		);
		// echo '<pre>';print_r ($postData);echo '<pre>'; 
        $this->db->update($this->db_tbl, $postData, "id =" . $data['id'] . "");
    }























	
}