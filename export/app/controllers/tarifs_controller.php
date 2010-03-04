<?php
class TarifsController extends AppController {

	var $name = 'Tarifs';

	function index() {
		$this->Tarif->recursive = 0;
		$this->set('tarifs', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid tarif', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('tarif', $this->Tarif->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Tarif->create();
			if ($this->Tarif->save($this->data)) {
				$this->Session->setFlash(__('The tarif has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tarif could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid tarif', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Tarif->save($this->data)) {
				$this->Session->setFlash(__('The tarif has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tarif could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Tarif->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for tarif', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Tarif->delete($id)) {
			$this->Session->setFlash(__('Tarif deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Tarif was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>