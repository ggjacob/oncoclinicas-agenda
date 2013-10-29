<?php
App::uses('AppModel', 'Model');
/**
 * Appointment Model
 *
 * @property Agenda $Agenda
 */
class Appointment extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Agenda' => array(
			'className' => 'Agenda',
			'foreignKey' => 'agenda_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
