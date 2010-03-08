<?php
class MatchesController extends AppController {

	var $name = 'Matches';

	function index() {
		$this->Match->recursive = 0;
		$this->set('matches', $this->paginate());
	}
	
	function reservations() {
		$this->Match->recursive = 0;
		$this->set('matches', $this->paginate());
	}

	function admin_view($id = null) {
		
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid match', true));
			$this->redirect(array('action' => 'index'));
		}
		
		if($id==8)
			$conditions = array('Reservation.match_id'=>8 );
		else if($id==9)
			$conditions = array('Reservation.match_id'=>9 );
		else
			$conditions = array('Reservation.match_id'=>array($id,9) );
		
		$nombre = $this->Match->Reservation->find('first', array('fields'=>array('SUM(Reservation.nombre_de_places) as nombre'), 'conditions'=>$conditions ) );
		$this->set('nombre_de_reservations', $nombre[0]['nombre']);
		
		$reservations= $this->Match->Reservation->find( 'all', array('conditions'=>array('Match.id'=>array($id,9) ) ) );
		$this->set('reservations',$reservations);
		$this->set( 'match', $this->Match->read(null, $id) );
	}

	function match_add() {
		if (!empty($this->data)) {
			$this->Match->create();
			if ($this->Match->save($this->data)) {
				$this->Session->setFlash(__('The match has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The match could not be saved. Please, try again.', true));
			}
		}
		$salles = $this->Match->Salle->find('list');
		$tarifs = $this->Match->Tarif->find('list');
		$this->set(compact('salles', 'tarifs'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid match', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Match->save($this->data)) {
				$this->Session->setFlash(__('Les modifications ont été enregistrées', true));
				$this->redirect(array('controller'=>'users', 'action' => 'home'));
			} else {
				$this->Session->setFlash(__('The match could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Match->read(null, $id);
		}
		$salles = $this->Match->Salle->find('list');
		$this->set(compact('salles'));
		$this->set('match', $this->Match->read('type', $id));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for match', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Match->delete($id)) {
			$this->Session->setFlash(__('Match deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Match was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>