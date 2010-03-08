<?php
/* Salles Test cases generated on: 2010-02-23 10:02:57 : 1266916557*/
App::import('Controller', 'Salles');

class TestSallesController extends SallesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class SallesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.salle');

	function startTest() {
		$this->Salles =& new TestSallesController();
		$this->Salles->constructClasses();
	}

	function endTest() {
		unset($this->Salles);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>