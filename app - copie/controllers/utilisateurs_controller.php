<?php
class UtilisateursController extends AppController {
 var $name = 'Utilisateurs';
 var $components = array('Email');
 
	 function reserver($match_id = null) {
	   if(!empty($this->data)) {
	      $this->Utilisateur->saveAll($this->data, array('validate'=>'first', 'atomic'=>'false'));
	   }
	   $matches = $this->Utilisateur->Reservation->Match->find('list');
	   $this->set(compact('utilisateurs', 'matches'));
	}
	
	function admin_index()
	{
		$this->Utilisateur->recursive = 0;
		$this->set('utilisateurs', $this->paginate());
	}
	
	function admin_view($id = null){
		if(!$id){
			$this->Session->setFlash(__('Utilisateur inconnu', true));
			$this->redirect(array('controller'=>'reservations','action'=>'index'));
		}
		$this->set('utilisateur', $this->Utilisateur->read(null, $id) );
	}
	
	function admin_edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Utilisateur incorrect', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Utilisateur->save($this->data)) {
				$this->Session->setFlash(__('Les informations sur l\'utilisateur ont ete mises a jour', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('Les informations sur l\'utilisateur n\'ont pas pu etre mises a jour', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Utilisateur->read(null, $id);
		}
	}
}	
?>