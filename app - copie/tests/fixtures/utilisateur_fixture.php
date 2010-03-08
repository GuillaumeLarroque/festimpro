<?php
/* Utilisateur Fixture generated on: 2010-02-16 10:02:38 : 1266312338 */
class UtilisateurFixture extends CakeTestFixture {
	var $name = 'Utilisateur';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'nom' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150),
		'prenom' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150),
		'email' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 150),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'MyISAM')
	);

	var $records = array(
		array(
			'id' => 1,
			'nom' => 'Lorem ipsum dolor sit amet',
			'prenom' => 'Lorem ipsum dolor sit amet',
			'email' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>