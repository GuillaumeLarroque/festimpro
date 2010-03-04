<div class="utilisateurs form">
<?php echo $this->Form->create('Utilisateur');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Utilisateur', true)); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('prenom');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Utilisateurs', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Reservations', true)), array('controller' => 'reservations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Reservation', true)), array('controller' => 'reservations', 'action' => 'add')); ?> </li>
	</ul>
</div>