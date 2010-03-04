<div class="reservations form">
<?php echo $this->Form->create('Reservation');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Reservation', true)); ?></legend>
	<?php
		echo $this->Form->input('Utilisateur.0.nom');
		echo $this->Form->input('Utilisateur.0.prenom');
		echo $this->Form->input('Utilisateur.0.email');
		//echo $this->Form->input('utilisateur_id');
		echo $this->Form->input('Reservation.match_id');
		echo $this->Form->input('Reservation.nombre_de_places');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Reservations', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Utilisateurs', true)), array('controller' => 'utilisateurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Utilisateur', true)), array('controller' => 'utilisateurs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Matches', true)), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Match', true)), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>