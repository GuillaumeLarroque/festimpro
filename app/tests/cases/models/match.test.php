<?php
/* Match Test cases generated on: 2010-02-23 10:02:47 : 1266916787*/
App::import('Model', 'Match');

class MatchTestCase extends CakeTestCase {
	var $fixtures = array('app.match', 'app.salle', 'app.tarif', 'app.reservation', 'app.utilisateur');

	function startTest() {
		$this->Match =& ClassRegistry::init('Match');
	}

	function endTest() {
		unset($this->Match);
		ClassRegistry::flush();
	}

}
?>