<?php
/* Utilisateurs Test cases generated on: 2010-02-16 10:02:39 : 1266312339*/
App::import('Controller', 'Utilisateurs');

class TestUtilisateursController extends UtilisateursController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class UtilisateursControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.utilisateur', 'app.reservation', 'app.match', 'app.tarif');

	function startTest() {
		$this->Utilisateurs =& new TestUtilisateursController();
		$this->Utilisateurs->constructClasses();
	}

	function endTest() {
		unset($this->Utilisateurs);
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