<?php
/* Match Test cases generated on: 2010-02-16 10:02:05 : 1266310925*/
App::import('Model', 'Match');

class MatchTestCase extends CakeTestCase {
	var $fixtures = array('app.match', 'app.tarif');

	function startTest() {
		$this->Match =& ClassRegistry::init('Match');
	}

	function endTest() {
		unset($this->Match);
		ClassRegistry::flush();
	}

}
?>