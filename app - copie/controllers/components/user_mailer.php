<?php
App::import('Plugin', 'Mailer.mailer');

class UserMailerComponent extends MailerComponent {
    
	/**
	 * Définit les paramètres d'un email d'inscription
	 */
	function signup($user) {
            /*
		if (empty($user['User']['email'])) {
			return false;
		}
          */
		$this->from = 'do-not-reply@example.com';
		$this->to = 'guillaume@creagraphie.fr';
		$this->subject = "Welcome !";
		$this->Controller->set('user', $user);
	}
 
	/**
	 * Définit les paramètres communs pour les emails UserMailer
	 */
	function _prepare() {
		parent::_prepare();
		$this->sendAs = 'text';
	}
}
?>