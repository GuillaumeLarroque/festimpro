<?php
class ReservationsController extends AppController {

	var $name = 'Reservations';

	function index() {
		$this->Reservation->recursive = 0;
		$this->set('reservations', $this->paginate());
	}
	
	function admin_index() {
		$this->Reservation->recursive = 0;
		$this->set('reservations', $this->paginate());
	}
	
	function admin_liste($match_id) {
		$this->Reservation->recursive = 0;
		
		$conditions=array('Reservation.match_id'=>array($match_id,9) );
		$this->set('reservations', $this->paginate('Reservation', array($conditions) ) );
	}
	
	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid reservation', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('reservation', $this->Reservation->read(null, $id));
	}
	
	function match($match_id=null) {
		if (!empty($this->data)) {
			$this->Reservation->create();
			if ($this->Reservation->save($this->data)) {
				$this->Session->setFlash(__('Votre reservation a bien ete enregistree', true));
				$this->Session->write('reservation_id', $this->Reservation->id);
				$this->redirect(array('action' => 'confirmation'));
			} else {
				$this->Session->setFlash(__('The reservation could not be saved. Please, try again.', true));
			}
		}
		$this->set('match', $this->Reservation->Match->findById($match_id));
	}
	
	
	function confirmation(){
		$reservation=$this->Reservation->findById( $this->Session->read('reservation_id') );
		
		$this->loadModel('Salle');
		
		$this->set('reservation', $reservation );
		$this->set('salle', $this->Salle->findById($reservation['Match']['salle_id']) );
	}
	
	function gala($match_id=null) {
		if (!empty($this->data)) {
			$this->Reservation->create();
			if ($this->Reservation->save($this->data)) {
				$this->Session->setFlash(__('Votre reservation a bien ete enregistree', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reservation could not be saved. Please, try again.', true));
			}
		}
		$this->set('match', $this->Reservation->Match->findById($match_id));
	}
	function pass($match_id=null) {
		if (!empty($this->data)) {
			$this->Reservation->create();
			if ($this->Reservation->save($this->data)) {
				$this->Session->setFlash(__('Votre reservation a bien ete enregistree', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reservation could not be saved. Please, try again.', true));
			}
		}
		$this->set('match', $this->Reservation->Match->findById($match_id));
	}
	
		
	function nouvelle($match_id=null) {
		if (!empty($this->data)) {
			$this->Reservation->create();
			if ($this->Reservation->save($this->data)) {
				$this->Session->setFlash(__('The reservation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reservation could not be saved. Please, try again.', true));
			}
		}
		$this->set('match', $this->Reservation->Match->findById($match_id));
	}
	
	function add() {
		if (!empty($this->data)) {
			$this->Reservation->create();
			if ($this->Reservation->save($this->data)) {
				$this->Session->setFlash(__('The reservation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The reservation could not be saved. Please, try again.', true));
			}
		}
		$matches = $this->Reservation->Match->find('list');
		$this->set(compact('matches'));
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid reservation', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Reservation->save($this->data)) {
				$this->Session->setFlash(__('Les changements ont bien été enregistrés', true));
				$this->redirect( array('action' => 'liste', $this->data['Reservation']['match_id']) );
			} else {
				$this->Session->setFlash(__('The reservation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Reservation->read(null, $id);
		}
		$matches = $this->Reservation->Match->find('list');
		$this->set(compact('matches'));
		$this->set('reservation', $this->Reservation->read(null, $id));
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for reservation', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Reservation->delete($id)) {
			$this->Session->setFlash(__('Reservation supprimée', true));
			$this->redirect($this->referer());
		}
		$this->Session->setFlash(__('La réservation n\'a pas pu être supprimée', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>