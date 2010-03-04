<div class="reservations form">
<?php echo $this->Form->create('Reservation');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Reservation', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('utilisateur_id');
		echo $this->Form->input('match_id');
		echo $this->Form->input('nombre_de_places');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Reservation.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Reservation.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Reservations', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Utilisateurs', true)), array('controller' => 'utilisateurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Utilisateur', true)), array('controller' => 'utilisateurs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Matches', true)), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Match', true)), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>