<?php
	echo  $this->Form->create('Utilisateur');
	
	echo  $this->Form->input('Utilisateur.nom');
	echo  $this->Form->input('Utilisateur.prenom');
	echo  $this->Form->input('Utilisateur.email');
	
	echo  $this->Form->input('Reservation.0.match_id');
	echo  $this->Form->input('Reservation.0.nombre_de_places');
	
	echo  $this->Form->input('Reservation.1.match_id');
	echo  $this->Form->input('Reservation.1.nombre_de_places');
	
	echo  $this->Form->end(__('Confirmer la reservation', true));
?>