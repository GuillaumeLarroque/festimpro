<?php
/* Tarif Test cases generated on: 2010-02-16 10:02:14 : 1266310934*/
App::import('Model', 'Tarif');

class TarifTestCase extends CakeTestCase {
	var $fixtures = array('app.tarif', 'app.match');

	function startTest() {
		$this->Tarif =& ClassRegistry::init('Tarif');
	}

	function endTest() {
		unset($this->Tarif);
		ClassRegistry::flush();
	}

}
?>