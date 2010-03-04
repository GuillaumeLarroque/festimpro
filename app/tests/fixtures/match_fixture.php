<?php
/* Match Fixture generated on: 2010-02-16 10:02:05 : 1266310925 */
class MatchFixture extends CakeTestFixture {
	var $name = 'Match';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nom' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 250),
		'description' => array('type' => 'text', 'null' => false, 'default' => NULL),
		'nombre_de_places' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'tarif_id' => array('type' => 'integer', 'null' => false, 'default' => NULL),
		'type_de_match' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'nom' => 'Lorem ipsum dolor sit amet',
			'description' => 'Lorem ipsum dolor sit amet, aliquet feugiat. Convallis morbi fringilla gravida, phasellus feugiat dapibus velit nunc, pulvinar eget sollicitudin venenatis cum nullam, vivamus ut a sed, mollitia lectus. Nulla vestibulum massa neque ut et, id hendrerit sit, feugiat in taciti enim proin nibh, tempor dignissim, rhoncus duis vestibulum nunc mattis convallis.',
			'nombre_de_places' => 1,
			'tarif_id' => 1,
			'type_de_match' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>