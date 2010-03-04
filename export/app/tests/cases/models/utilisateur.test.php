<?php
/* Utilisateur Test cases generated on: 2010-02-16 10:02:38 : 1266312338*/
App::import('Model', 'Utilisateur');

class UtilisateurTestCase extends CakeTestCase {
	var $fixtures = array('app.utilisateur', 'app.reservation', 'app.match', 'app.tarif');

	function startTest() {
		$this->Utilisateur =& ClassRegistry::init('Utilisateur');
	}

	function endTest() {
		unset($this->Utilisateur);
		ClassRegistry::flush();
	}

}
?>