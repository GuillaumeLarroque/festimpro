<?php
	echo $this->Form->create('Utilisateur');

	echo $this->Form->input('nom');
	echo $this->Form->input('prenom');
	echo $this->Form->input('email');
	
	echo $this->Form->input('Reservation.0.match_id');
	echo $this->Form->input('Reservation.0.nombre_de_places');
	
	echo $this->Form->end(__('Confirmer la reservation', true));
?>