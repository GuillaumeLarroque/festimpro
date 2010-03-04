<div class="reservations form">
<?php echo $this->Form->create('Reservation');?>
	<fieldset>
 		<legend><?php printf(__('Modification : %s', true), __('Réservation', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('prenom');
		echo $this->Form->input('nom');
		echo $this->Form->input('email');
		echo $this->Form->input('match_id');
		echo $this->Form->input('nombre_de_places');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Supprimer cette %s', true), __('Reservation', true)), array('action' => 'delete', $reservation['Reservation']['id']), null, sprintf(__('Êtes vous sur de vouloir supprimer # %s?', true), $reservation['Reservation']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Retour aux réservations', true)), array('Controller'=>'reservations', 'action' => 'liste', $reservation['Match']['id'])); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('Liste des matchs', true)), array('controller'=>'users', 'action' => 'home')); ?></li>
	</ul>
</div>