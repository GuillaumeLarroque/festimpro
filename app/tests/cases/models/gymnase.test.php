<?php
/* Gymnase Test cases generated on: 2010-02-23 10:02:39 : 1266916299*/
App::import('Model', 'Gymnase');

class GymnaseTestCase extends CakeTestCase {
	var $fixtures = array('app.gymnase');

	function startTest() {
		$this->Gymnase =& ClassRegistry::init('Gymnase');
	}

	function endTest() {
		unset($this->Gymnase);
		ClassRegistry::flush();
	}

}
?>