<?php
class ReservationsController extends AppController {

	var $name = 'Reservations';
	var $components = array('Email', 'Captcha');
	
	
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
		$this->set('captcha_form_url', $this->webroot.'messages/index'); //url for the form
		$this->set('captcha_image_url', $this->webroot.'messages/securimage/0'); //url for the captcha image
		
		$captcha_success_msg = 'Le code correspond';
		$captcha_error_msg = 'Le code entré ne correspond pas';
		
		if (empty($this->data)) {
			$this->set('error_captcha', ''); //error message displayed to user
			$this->set('success_captcha', ''); //success message displayed to user
		} else {
			$this->Reservation->create();
			if( $this->captcha->check($this->data['Reservation']['captcha_code']) == false )
			{
				//the code was incorrect - display an error message to user
				$this->set('error_captcha', $captcha_error_msg); //set error msg
				$this->set('success_captcha', ''); //set success msg
				$this->Session->setFlash(__('Veuillez remplir le formulaire entièrement et recopier correctement le code de sécurité', true));
				//$this->render(); //reload page
			}
			else
			{
				if($this->data['Reservation']['match_id']!=8)
					$conditions = array('Reservation.match_id'=>array($this->data['Reservation']['match_id'], 9) );
				else
					$conditions = array('Reservation.match_id'=>8 );
				
				$nombre = $this->Reservation->find('first', array('fields'=>array('SUM(Reservation.nombre_de_places) as nombre'), 'conditions'=>$conditions ) );
				$match = $this->Reservation->Match->read(null, $this->data['Reservation']['match_id']);
				$places_restantes= $match['Salle']['nombre_de_places'] - $nombre[0]['nombre'];
				
				if( ($places_restantes - $this->data['Reservation']['nombre_de_places'] ) >= 0 )
				{
					if ($this->Reservation->save($this->data)) {
						$this->Session->setFlash(__('Votre reservation a bien été enregistrée', true));
						$this->_envoiMailUtilisateur($this->Reservation->id);
						//$this->_envoiMailAdministrateur($this->Reservation->id);
						$this->Session->write('reservation_id', $this->Reservation->id);
						$this->redirect(array('action' => 'confirmation'));
					} else {
						$this->Session->setFlash(__('Votre réservation n\'a pas pu être enregistré. Veuillez réessayer.', true));
						$this->set('error_captcha', ''); //error message displayed to user
						$this->set('success_captcha', '');
						//$this->redirect($this->referer());
					}	
				}
				else
				{
					if($places_restantes==0)
						$this->Session->setFlash(__('Il ne reste plus assez de place à réserver pour cette rencontre', true));
					else
						$this->Session->setFlash(__('Il ne reste plus que '.$places_restantes.' disponibles pour ce match', true));
						
					$this->set('error_captcha', ''); //error message displayed to user
					$this->set('success_captcha', '');
				}
			}
		}
		
		/*if($match_id) {
			$this->data['Reservation']['match_id'] = $match_id;
		  }
		*/
		
		$this->set( 'match', $this->Reservation->Match->findById($match_id) );
	}
	
	
	function confirmation(){
		$reservation=$this->Reservation->findById( $this->Session->read('reservation_id') );
		
		$this->loadModel('Salle');
		
		$this->set('reservation', $reservation );
		$this->set('salle', $this->Salle->findById($reservation['Match']['salle_id']) );
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
	
	function _envoiMailUtilisateur($id) {
		$reservation = $this->Reservation->read(null,$id);
		
		$this->Email->delivery = 'debug';

		$this->Email->to = $reservation['Reservation']['email'];
		
		//$this->Email->bcc = array('secret@exemple.com');
		$this->Email->layout = 'default';
		$this->Email->subject = 'Confirmation de votre réservation';
		$this->Email->replyTo = Configure::read('site.adminEmail');
		$this->Email->from = 'Festival impro14 <'.Configure::read('site.adminEmail').'>';
		$this->Email->template = 'mail_utilisateur'; // notez l'absence de '.ctp'
		// Envoi en 'html', 'text' ou 'both' (par défaut c'est 'text')
		$this->Email->sendAs = 'both'; // parce que nous aimons envoyer de jolis emails
		// Positionner les variables comme d'habitude
		
		$this->loadModel('Salle');
		
		$this->set('reservation', $reservation );
		$this->set('salle', $this->Salle->findById($reservation['Match']['salle_id']) );
		// Ne passer aucun argument à send()
		$this->Email->send();
		
		//$reservation=$this->Reservation->findById( $id );
	}
	
	function _envoiMailAdministrateur($id){
		$reservation = $this->Reservation->read(null,$id);
		
		$conditions = array('Reservation.match_id'=>array($reservation['Match']['id'], 9) );
		
		$nombre = $this->Reservation->find('first', array('fields'=>array('SUM(Reservation.nombre_de_places) as nombre'), 'conditions'=>$conditions ) );
		$this->set('nombre_de_reservations', $nombre[0]['nombre']);
		$this->set('reservation', $reservation );
		
		$this->set( 'match', $this->Reservation->Match->read(null, $reservation['Match']['id']) );

				
		//$this->Email->delivery='debug';
		$this->Email->to = Configure::read('site.adminEmail');
		//$this->Email->bcc = array('secret@exemple.com');
		$this->Email->subject = 'R&eacute;servation pour : '.$reservation['Match']['date'];
		
		$this->Email->replyTo = Configure::read('site.adminEmail');
		$this->Email->from = 'Service de reservation <'.Configure::read('site.adminEmail').'>';
		$this->Email->template = 'mail_administrateur'; // notez l'absence de '.ctp'

		// Envoi en 'html', 'text' ou 'both' (par défaut c'est 'text')
		$this->Email->sendAs = 'both'; // parce que nous aimons envoyer de jolis emails
		// Positionner les variables comme d'habitude
		
		// Ne passer aucun argument à send()
		$this->Email->send();		
	}


	function securimage($random_number){
		$this->autoLayout = false; //a blank layout
	
		//override variables set in the component - look in component for full list
		$this->captcha->image_height = 75;
		$this->captcha->image_width = 350;
		$this->captcha->image_bg_color = '#ffffff';
		$this->captcha->line_color = '#cccccc';
		$this->captcha->arc_line_colors = '#999999,#cccccc';
		$this->captcha->code_length = 5;
		$this->captcha->font_size = 45;
		$this->captcha->text_color = '#000000';
	
		$this->set('captcha_data', $this->captcha->show()); //dynamically creates an image
	}
}
?>