<?php
/* Reservations Test cases generated on: 2010-02-23 11:02:20 : 1266919460*/
App::import('Controller', 'Reservations');

class TestReservationsController extends ReservationsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ReservationsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.reservation', 'app.match', 'app.salle', 'app.tarif');

	function startTest() {
		$this->Reservations =& new TestReservationsController();
		$this->Reservations->constructClasses();
	}

	function endTest() {
		unset($this->Reservations);
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