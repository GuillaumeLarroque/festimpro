<?php
/* Reservation Fixture generated on: 2010-02-16 10:02:54 : 1266312294 */
class ReservationFixture extends CakeTestFixture {
	var $name = 'Reservation';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'utilisateur_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'match_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'nombre_de_places' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'utilisateur_id' => 1,
			'match_id' => 1,
			'nombre_de_places' => 1
		),
	);
}
?>