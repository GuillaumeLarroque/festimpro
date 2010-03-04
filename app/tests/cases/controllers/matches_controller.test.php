<?php
/* Matches Test cases generated on: 2010-02-23 10:02:17 : 1266916937*/
App::import('Controller', 'Matches');

class TestMatchesController extends MatchesController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MatchesControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.match', 'app.salle', 'app.tarif', 'app.reservation', 'app.utilisateur');

	function startTest() {
		$this->Matches =& new TestMatchesController();
		$this->Matches->constructClasses();
	}

	function endTest() {
		unset($this->Matches);
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