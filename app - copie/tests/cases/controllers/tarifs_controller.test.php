<?php
/* Tarifs Test cases generated on: 2010-02-16 10:02:16 : 1266310936*/
App::import('Controller', 'Tarifs');

class TestTarifsController extends TarifsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class TarifsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.tarif', 'app.match');

	function startTest() {
		$this->Tarifs =& new TestTarifsController();
		$this->Tarifs->constructClasses();
	}

	function endTest() {
		unset($this->Tarifs);
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