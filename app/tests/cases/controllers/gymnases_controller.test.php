<?php
/* Gymnases Test cases generated on: 2010-02-23 10:02:39 : 1266916299*/
App::import('Controller', 'Gymnases');

class TestGymnasesController extends GymnasesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class GymnasesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.gymnase');

	function startTest() {
		$this->Gymnases =& new TestGymnasesController();
		$this->Gymnases->constructClasses();
	}

	function endTest() {
		unset($this->Gymnases);
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