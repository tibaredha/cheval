<?php
// SELECT j.nom nom_jeu, p.prenom prenom_proprietaire
// FROM proprietaires p
// INNER JOIN jeux_video j
// ON j.ID_proprietaire = p.ID
// WHERE j.console = 'PC'
// ORDER BY prix DESC
// LIMIT 0, 10
class Model {

	function __construct() {
		$this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
	}

}