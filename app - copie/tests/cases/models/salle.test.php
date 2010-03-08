<?php
/* Salle Test cases generated on: 2010-02-23 10:02:57 : 1266916557*/
App::import('Model', 'Salle');

class SalleTestCase extends CakeTestCase {
	var $fixtures = array('app.salle');

	function startTest() {
		$this->Salle =& ClassRegistry::init('Salle');
	}

	function endTest() {
		unset($this->Salle);
		ClassRegistry::flush();
	}

}
?>