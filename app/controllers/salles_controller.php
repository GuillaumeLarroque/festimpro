<?php
class SallesController extends AppController {

	var $name = 'Salles';

	function admin_index() {
		$this->Salle->recursive = 0;
		$this->set('salles', $this->paginate());
	}

	function admin_view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid salle', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('salle', $this->Salle->read(null, $id));
	}

	function admin_add() {
		if (!empty($this->data)) {
			$this->Salle->create();
			if ($this->Salle->save($this->data)) {
				$this->Session->setFlash(__('The salle has been saved', true));
				$this->redirect(array('action'=>'index'));
			} else {
				$this->Session->setFlash(__('The salle could not be saved. Please, try again.', true));
			}
		}
	}

	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid salle', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Salle->save($this->data)) {
				$this->Session->setFlash(__('Les informations sur la salle ont été modifiés', true));
				$this->redirect(array('controller'=>'users','action'=>'home' ));
			} else {
				$this->Session->setFlash(__('The salle could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Salle->read(null, $id);
		}
	}

	function admin_delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for salle', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Salle->delete($id)) {
			$this->Session->setFlash(__('Salle deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Salle was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>