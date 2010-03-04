<div class="reservations form">
<?php echo $this->Form->create('Reservation');?>
	<fieldset>
 		<legend><?php printf(__('Add %s', true), __('Reservation', true)); ?></legend>
	<p>
		vous effetuez une reservation pour : <?php echo $match['Match']['rencontre'];  ?>
	</p>
	<?php
		echo $match['Match']['id'];
		echo $this->Form->input('prenom');
		echo $this->Form->input('nom');
		echo $this->Form->input('email');
		//echo $this->Form->input('match_id');
		echo $this->Form->hidden('match_id', array('value'=>$match['Match']['id']) );
		echo $this->Form->input('nombre_de_places');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Reservations', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Matches', true)), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Match', true)), array('controller' => 'matches', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Utilisateurs', true)), array('controller' => 'utilisateurs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Utilisateur', true)), array('controller' => 'utilisateurs', 'action' => 'add')); ?> </li>
	</ul>
</div>