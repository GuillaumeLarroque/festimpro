<?php
class UtilisateursController extends AppController {
	var $name = 'Utilisateurs';

	function index() {
		$this->Utilisateur->recursive = 0;
		$this->set('utilisateurs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid utilisateur', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('utilisateur', $this->Utilisateur->read(null, $id));
	}

	function add() {
	   if(!empty($this->data)) {
	      $this->Utilisateur->saveAll($this->data, array('validate'=>'first'));
	   }
	   $matches = $this->Utilisateur->Reservation->Match->find('list');
	   $this->set(compact('utilisateurs', 'matches'));
	}
	
	/*
		
	function add() {
		if (!empty($this->data)) {
			$this->Utilisateur->saveAll($this->data, array('validate'=>'first') );
			
			
				$this->Session->setFlash(__('Reservation enregistree', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Reservation impossible', true) );				
			}
		}
		//$matches = $this->Utilisateur->Reservation->Match->find('list');
		//$this->set(compact('utilisateurs', 'matches'));
	}*/
	
	
	/*
	function add() {
		if (!empty($this->data)) {
			$this->Utilisateur->create();
			if ($this->Utilisateur->save($this->data)) {
				$this->Session->setFlash(__('The utilisateur has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The utilisateur could not be saved. Please, try again.', true));
			}
		}
	}*/

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid utilisateur', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Utilisateur->save($this->data)) {
				$this->Session->setFlash(__('The utilisateur has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The utilisateur could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Utilisateur->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for utilisateur', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Utilisateur->delete($id)) {
			$this->Session->setFlash(__('Utilisateur deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Utilisateur was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>