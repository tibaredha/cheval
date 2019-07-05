<?php

class Dashboard_Model extends Model {

    public  $db_host="localhost"; 
	public  $db_name="cheval";
	public  $db_tbl="cheval"; 
	public  $db_user="root";
	public  $db_pass="";

	public function __construct() {
		parent::__construct();
	}
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }
	public function userList() {
        return $this->db->select('SELECT * FROM  users order by id desc ');
        // return $this->db->select('SELECT * FROM don   order byid DINS   limit 50    ');
    }
	
	//********************************************************** search cheval**********************************************************************//
	
	public function userSearch($o, $q, $p, $l) {
	    $station = Session::get('station');
		return $this->db->select("SELECT * FROM cheval where $o like '$q%' and station=$station order by Datesigna,NomA limit $p,$l  ");
    }
    public function userSearch1($o, $q) {
        $station = Session::get('station');
		return $this->db->select("SELECT * FROM cheval where $o like '$q%' and station=$station order by Datesigna,NomA ");
    }
	//**********************************************************ajout equidé**********************************************************************//
	public function create($data)
	{
		$this->db->insert('cheval', array(
			'Datesigna' => $this->dateFR2US($data['Datesigna']),
			'Sexe' => $data['Sexe'],
			'NomA' => $data['NomA'],  
			'N' => $data['N'],
            'Dns' => $this->dateFR2US($data['Dns']),
			'Race' => $data['Race'],
			'Nobo' => $data['Nobo'],
            'NPPRODUIT' => $data['NPPRODUIT'],
			'Pere' => $data['Pere'],
			'NPere' => $data['NPere'],
			'DnsPere' => $this->dateFR2US($data['DnsPere']),
			'RacePere' => $data['RacePere'],
			'CouleurPere' => $data['CouleurPere'],
			'NPPERE' => $data['NPPERE'],
			'mere' => $data['mere'],
			'NMere' => $data['NMere'],
			'DnsMere' => $this->dateFR2US($data['DnsMere']),
			'RaceMere' => $data['RaceMere'],
			'CouleurMere' => $data['CouleurMere'],
			'NPMERE' => $data['NPMERE'],	
			'ideleveur' => $data['ideleveur'],	  
		    'idnaisseur' => $data['idnaisseur'],    
			'Tete' => $data['Tete'],
			'AG' => $data['AG'],
			'AD' => $data['AD'],
			'PG' => $data['PG'],
			'PD' => $data['PD'],
			'MARQUES' => $data['MARQUES'],
            'aprouve' => $data['aprouve'],
			'DateAprouve' => $this->dateFR2US($data['DateAprouve']),
			'stataprouv' => $data['stataprouv'],
			'Origine' => $data['Origine'],
			'Typedetravail' => $data['Typedetravail'],
			'Typedecheval' => $data['Typedecheval'],
			'Prix' => $data['Prix'],
			'region' => $data['region'],
			'wregion' => $data['wregion'],
			'station' => $data['station']
            //38			
		));
		return $last_id = $this->db->lastInsertId();
		// echo '<pre>';print_r ($data);echo '<pre>';  
	}
	public function createx($data)
	{
		$this->db->insert('cheval', array(
			'Datesigna' => $this->dateFR2US($data['Datesigna']),
			'Sexe' => $data['Sexe'],  
            'NomA' => $data['NomA'],
            'N' => $data['N'],  
            'Dns' => $this->dateFR2US($data['Dns']),
			'Race' => $data['Race'],
			'Nobo' => $data['Nobo'],
			'NPPRODUIT' => $data['NPPRODUIT'], 
			'idpere' => $data['Pere'], // SI ORIGINE CONNU
			'NPere' => $this->nbrtostring('cheval','id',$data['Pere'],'N'),
			'Pere' => $this->nbrtostring('cheval','id',$data['Pere'],'NomA'),
			'DnsPere' => $this->nbrtostring('cheval','id',$data['Pere'],'Dns'),
			'RacePere' => $this->nbrtostring('cheval','id',$data['Pere'],'Race'),
			'CouleurPere' => $this->nbrtostring('cheval','id',$data['Pere'],'Nobo'),
			'NPPERE' => $this->nbrtostring('cheval','id',$data['Pere'],'NPPRODUIT'),
			'idmere' => $data['mere'],// SI ORIGINE CONNU
			'NMere' => $this->nbrtostring('cheval','id',$data['mere'],'N'),
			'mere' => $this->nbrtostring('cheval','id',$data['mere'],'NomA'),
			'DnsMere' => $this->nbrtostring('cheval','id',$data['mere'],'Dns'),
			'RaceMere' => $this->nbrtostring('cheval','id',$data['mere'],'Race'),
			'CouleurMere' => $this->nbrtostring('cheval','id',$data['mere'],'Nobo'),
			'NPMERE' => $this->nbrtostring('cheval','id',$data['mere'],'NPPRODUIT'),  
			'ideleveur' => $data['ideleveur'],
			'idnaisseur' => $data['idnaisseur'],
            'Tete' => $data['Tete'],
			'AG' => $data['AG'],
			'AD' => $data['AD'],
			'PG' => $data['PG'],
			'PD' => $data['PD'],
			'MARQUES' => $data['MARQUES'],
			'aprouve' => $data['aprouve'],
			'DateAprouve' => $this->dateFR2US($data['DateAprouve']),
			'stataprouv' => $data['stataprouv'],
			'Origine' => $data['Origine'],
			'Typedetravail' => $data['Typedetravail'],
			'Typedecheval' => $data['Typedecheval'],
			'Prix' => $data['Prix'],
			'region' => $data['region'],
			'wregion' => $data['wregion'],
			'station' => $data['station']
            //40			
		));
		return $last_id = $this->db->lastInsertId();
		 // echo '<pre>';print_r ($data);echo '<pre>'; 
	  
	}
	public function createy($data)
	{
		// $this->db->insert('cheval', array(
			// 'N' => $data['N'],
			// 'Datesigna' => $data['Datesigna'],
			// 'NomP' => $this->nbrtostring('cheval','id',$data['mere'],'NomP'),      
			// 'wil' => $this->nbrtostring('cheval','id',$data['mere'],'wil'),       
			// 'com' => $this->nbrtostring('cheval','id',$data['mere'],'com'),       
			// 'adresse' => $this->nbrtostring('cheval','id',$data['mere'],'adresse'), 
			// 'NomA' => $data['NomA'],
			// 'Dns' => $data['Dns'],
			// 'Race' => $data['Race'],
			// 'Nobo' => $data['Nobo'],
			// 'NPPRODUIT' => $data['NPPRODUIT'],
			// 'Sexe' => $data['Sexe'], 
			// 'Pere' => $this->nbrtostring('cheval','id',$data['Pere'],'NomA'),
			// 'NPere' => $this->nbrtostring('cheval','id',$data['Pere'],'N'),
			// 'DnsPere' => $this->nbrtostring('cheval','id',$data['Pere'],'Dns'),
			// 'RacePere' => $this->nbrtostring('cheval','id',$data['Pere'],'Race'),
			// 'CouleurPere' => $this->nbrtostring('cheval','id',$data['Pere'],'Nobo'),
			// 'NPPERE' => $this->nbrtostring('cheval','id',$data['Pere'],'NPPRODUIT'),
			// 'mere' => $this->nbrtostring('cheval','id',$data['mere'],'NomA'),
			// 'NMere' => $this->nbrtostring('cheval','id',$data['mere'],'N'),
			// 'DnsMere' => $this->nbrtostring('cheval','id',$data['mere'],'Dns'),
			// 'RaceMere' => $this->nbrtostring('cheval','id',$data['mere'],'Race'),
			// 'CouleurMere' => $this->nbrtostring('cheval','id',$data['mere'],'Nobo'),
			// 'NPMERE' => $this->nbrtostring('cheval','id',$data['mere'],'NPPRODUIT'),
			// 'Tete' => $data['Tete'],
			// 'AG' => $data['AG'],
			// 'AD' => $data['AD'],
			// 'PG' => $data['PG'],
			// 'PD' => $data['PD'],
			// 'MARQUES' => $data['MARQUES'],
			// 'region' => $data['region'],
			// 'wregion' => $data['wregion'],
			// 'station' => $data['station'],
			// 'aprouve' => $data['aprouve'],
			// 'secteur' => $this->nbrtostring('cheval','id',$data['mere'],'secteur'),
			// 'telphone' => $this->nbrtostring('cheval','id',$data['mere'],'telphone'),
		    // 'Taille' => $data['Taille'],	
		    // 'Naisseur' => $data['Naisseur'],
			
			
            // 'Origine' => $data['Origine'],
		    // 'ANaisseur' => $data['ANaisseur'],
		    // 'idpere' => $data['Pere'],
		    // 'idmere' => $data['mere']
		// ));
		  // $last_id = $this->db->lastInsertId();
		echo '<pre>';print_r ($data);echo '<pre>'; 
		// $postData = array(
            // 'poulin' => $last_id ,
			// 'dateresultas'=> $data['Dns']
		// );
		// $this->db->update('saillie', $postData, "id =".$data['idsailli']."");
		// echo '<pre>';print_r ($postData);echo '<pre>'; 
		return $last_id ;
	}
	//********************************************************** modifier  equidé**********************************************************************//
	 public function editSave($data) {
        $postData = array( 
			'Datesigna' => $this->dateFR2US($data['Datesigna']),
			'Sexe' => $data['Sexe'],
			'NomA' => $data['NomA'],  
			'N' => $data['N'],
            'Dns' => $this->dateFR2US($data['Dns']),
			'Race' => $data['Race'],
			'Nobo' => $data['Nobo'],
            'NPPRODUIT' => $data['NPPRODUIT'],
			'Pere' => $data['Pere'],
			'NPere' => $data['NPere'],
			'DnsPere' => $this->dateFR2US($data['DnsPere']),
			'RacePere' => $data['RacePere'],
			'CouleurPere' => $data['CouleurPere'],
			'NPPERE' => $data['NPPERE'],
			'mere' => $data['mere'],
			'NMere' => $data['NMere'],
			'DnsMere' => $this->dateFR2US($data['DnsMere']),
			'RaceMere' => $data['RaceMere'],
			'CouleurMere' => $data['CouleurMere'],
			'NPMERE' => $data['NPMERE'],	
			'ideleveur' => $data['ideleveur'],	  
		    'idnaisseur' => $data['idnaisseur'],    
			'Tete' => $data['Tete'],
			'AG' => $data['AG'],
			'AD' => $data['AD'],
			'PG' => $data['PG'],
			'PD' => $data['PD'],
			'MARQUES' => $data['MARQUES'],
            'aprouve' => $data['aprouve'],
			'DateAprouve' => $this->dateFR2US($data['DateAprouve']),
			'stataprouv' => $data['stataprouv'],
			'Origine' => $data['Origine'],
			'Typedetravail' => $data['Typedetravail'],
			'Typedecheval' => $data['Typedecheval'],
			'Prix' => $data['Prix'],
			'region' => $data['region'],
			'wregion' => $data['wregion'],
			'station' => $data['station']  
		);
		echo '<pre>';print_r ($postData);echo '<pre>';
		// idpere  si = 0 cest bon  si non il faut trouver  idpere  
		// idmere  si = 0 cest bon  si non il faut trouver  idmere  
        // $this->db->update('cheval', $postData, "id =" . $data['id'] . "");
    }
	//********************************************************** supprimer  equidé**********************************************************************//
	public function delete($id) {       
        $this->db->delete('cheval', "id = '$id'");
		$this->db->deletem('vaccination', "idcheval = '$id'");
		$this->db->deletem('saillie', "idcheval = '$id'");
		$this->db->deletem('saillie', "jument = '$id'");
		
    }	
	
	
	
	
	
	public function Aprouve($data) {
        $postData = array(
			'aprouve' => $data['aprouve']	
		);
        $this->db->update('cheval', $postData, "id =" . $data['id'] . "");
		//echo '<pre>';print_r ($postData);echo '<pre>'; 
    }
	
	
	public function liste() {
        return $this->db->select('SELECT * FROM  cheval order by id desc ');
        // return $this->db->select('SELECT * FROM don   order byid DINS   limit 50    ');
    }
	
	 public function userSingleList($id) {
        return $this->db->select('SELECT * FROM cheval WHERE id = :id', array(':id' => $id));
    }
	
	public function createvaccin($data)
	{
		$this->db->insert('vaccination', array(
			'datevaccination' => $data['datevaccination'],
			'wil' => $data['wil'],
			'com' => $data['com'],
			'adresse' => $data['adresse'],
			'vaccin' => $data['vaccin'],
			'veterinaire' => $data['veterinaire'],
			'idcheval' => $data['id']
		));
		return $last_id = $this->db->lastInsertId();
		echo '<pre>';print_r ($data);echo '<pre>';  
	}
	public function createsaillie($data)
	{
		$this->db->insert('saillie', array(
			'datemonte' => $data['datemonte'],
			'region' => $data['region'],
			'wregion' => $data['wregion'],
			'station' => $data['station'],
			'typemonte' => $data['typemonte'],
			'jument' => $data['jument'],
			'veterinaire' => $data['veterinaire'],
			'SommeRecu'=> $data['SommeRecu'],
			'datemonte1'=> $data['datemonte1'],
			'datemonte2'=> $data['datemonte2'],
			'datemonte3'=> $data['datemonte3'],
			'daterevue'=> $data['daterevue'],
			'idcheval'=> $data['id']
		));
		return $last_id = $this->db->lastInsertId();
		//echo '<pre>';print_r ($data);echo '<pre>';  
	}
	public function listevac($id) {
        return $this->db->select('SELECT * FROM  vaccination WHERE idcheval = :idcheval  order by id ', array(':idcheval' => $id));
    }
	public function listebilan($id) {
        return $this->db->select('SELECT * FROM  bilan WHERE idcheval = :idcheval  order by id ', array(':idcheval' => $id));
    }
	
	public function createbilan($data)
	{
		$this->db->insert('bilan', array(
			'datebilan' => $this->dateFR2US($data['datebilan']),
			'wil' => $data['wil'],
			'com' => $data['com'],
			'adresse' => $data['adresse'],
			'bilan' => $data['bilan'],
			'veterinaire' => $data['veterinaire'],
			'idcheval' => $data['id']
		));
		return $last_id = $this->db->lastInsertId();
		//echo '<pre>';print_r ($data);echo '<pre>';  
	}
	public function deletebilan($id) {       
        $this->db->delete('bilan', "id = '$id'");	
    }	
	
	 public function userSinglesaillie($id) {
        return $this->db->select('SELECT * FROM saillie WHERE id = :id', array(':id' => $id));
    }
	
	
	public function listesaillie($id) {
        return $this->db->select('SELECT * FROM  saillie WHERE idcheval = :idcheval  order by datemonte ', array(':idcheval' => $id));
    }
	public function listesaillie1($id) {
        return $this->db->select('SELECT * FROM  saillie WHERE jument = :idcheval  order by datemonte ', array(':idcheval' => $id));
    }
	public function deletevac($id) {       
        $this->db->delete('vaccination', "id = '$id'");	
    }	
	public function deletemonte($id,$id1) 
	{       
        
		if ($id1!== '0' ) {
		$this->db->delete('saillie', "id = '$id'");	
		$this->db->delete('cheval', "id = '$id1'");
		// echo 'ok !== 0';
		}
		else
		{
		$this->db->delete('saillie', "id = '$id'");	
		// echo 'ok == 0';
		}
		
    }
    public function editSaveresultasmonte($data) {
        $postData = array(
            'Resultas' => $data['Resultas'],
			'dateresultas' => $data['dateresultas']
	        //'poulin' => $data['poulin'],
	   );
       
	   // echo '<pre>';print_r ($postData);echo '<pre>';  
	   $this->db->update('saillie', $postData, "id =" . $data['id'] . "");
    }

	public function approuveSave($data) {
        $postData = array(
            'N' => $data['N'],
			'Datesigna' => $data['Datesigna'],
			'NomP' => $data['NomP'],
			'wil' => $data['wil'],
			'com' => $data['com'],
			'adresse' => $data['adresse'],
			'NomA' => $data['NomA'],
			'Dns' => $data['Dns'],
			'Race' => $data['Race'],
			'Nobo' => $data['Nobo'],
			'NPPRODUIT' => $data['NPPRODUIT'],
			'Sexe' => $data['Sexe'],
			'Pere' => $data['Pere'],
			'DnsPere' => $data['DnsPere'],
			'RacePere' => $data['RacePere'],
			'CouleurPere' => $data['CouleurPere'],
			'NPPERE' => $data['NPPERE'],
			'mere' => $data['mere'],
			'DnsMere' => $data['DnsMere'],
			'RaceMere' => $data['RaceMere'],
			'CouleurMere' => $data['CouleurMere'],
			'NPMERE' => $data['NPMERE'],
			'Tete' => $data['Tete'],
			'AG' => $data['AG'],
			'AD' => $data['AD'],
			'PG' => $data['PG'],
			'PD' => $data['PD'],
			'MARQUES' => $data['MARQUES'],
			'region' => $data['region'],
			'wregion' => $data['wregion'],
			'station' => $data['station']
        );
        $this->db->update('cheval', $postData, "id =" . $data['id'] . "");
    }
	public function listeSale($id) {
        return $this->db->select('SELECT * FROM  sale WHERE idcheval = :idcheval  order by datesale ', array(':idcheval' => $id));
    }
	public function createSale($data)
	{
		$this->db->insert('sale', array(
			'datesale' => $this->dateFR2US($data['datesale']),
			'ideleveur' => $data['ideleveur'],
			'payssale' => $data['payssale'],
			'idcheval' => $data['id']	
		));
		
		//echo '<pre>';print_r ($data);echo '<pre>';  
	}
	public function SaleSave($data)
	{
	     $postData = array(
			'ideleveur' => $data['ideleveur']
	      );
	    $this->db->update('cheval', $postData, "id =" . $data['id'] . "");	
		// echo '<pre>';print_r ($data);echo '<pre>';  
	}
	public function deleteSale($id) {       
        $this->db->delete('sale', "id = '$id'");
		
    }

    public function userSave($data) {
        $postData = array(
		    'REGION' => $data['region'],
            'WILAYA' => $data['wregion'],
            'STRUCTURE' => $data['station'],
            'login' => $data['login'],
			'password' => $data['password']
        );
		echo '<pre>';print_r ($postData);echo '<pre>'; 
        $this->db->update('users', $postData, "id =" . $data['id'] . "");
    }

    //****************************************************************************//
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
		if (is_numeric($colonevalue) and $colonevalue!=='-1') 
		{ 
		$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	    $db  = mysql_select_db($this->db_name,$cnx) ;
		$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
		$row=mysql_fetch_object($result);
		$resultat=$row->$resultatstring;
		return $resultat;
		}
        else
        {
		return $resultat2='??????';
		}		
	}
	//***************************************************************************//
	public function xhrInsert() 
	{
		$text = $_POST['text'];
		
		$this->db->insert('data', array('text' => $text));
		
		$data = array('text' => $text, 'id' => $this->db->lastInsertId());
		echo json_encode($data);
	}
	public function xhrGetListings()
	{
		$result = $this->db->select("SELECT * FROM data");
		echo json_encode($result);
	}
	public function xhrDeleteListing()
	{
		$id = (int) $_POST['id'];
		$this->db->delete('data', "id = '$id'");
	}
}