<?php
class Reservation extends AppModel {
	var $name = 'Reservation';
	var $validate = array(
		'prenom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ce champs doit être rempli',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nom' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				'message' => 'Ce champs doit être rempli',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'Veuillez entrer une adresse mail au format dupont@boitemail.fr',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'match_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Veuillez entrer un nombre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'nombre_de_places' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Veuillez entrer un nombre',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		)
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	
	var $belongsTo = array(
		'Match' => array(
			'className' => 'Match',
			'foreignKey' => 'match_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Tarif'	=> array(
			'className'	=> 'Tarif',
			'foreignKey'	=> 'tarif_id',
		)
	);
}
?>