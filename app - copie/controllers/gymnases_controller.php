<?php
class GymnasesController extends AppController {

	var $name = 'Gymnases';

	function index() {
		$this->Gymnase->recursive = 0;
		$this->set('gymnases', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid gymnase', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('gymnase', $this->Gymnase->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Gymnase->create();
			if ($this->Gymnase->save($this->data)) {
				$this->Session->setFlash(__('The gymnase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gymnase could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid gymnase', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Gymnase->save($this->data)) {
				$this->Session->setFlash(__('The gymnase has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The gymnase could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Gymnase->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for gymnase', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Gymnase->delete($id)) {
			$this->Session->setFlash(__('Gymnase deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Gymnase was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>