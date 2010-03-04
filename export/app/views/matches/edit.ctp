<div class="matches form">
<?php echo $this->Form->create('Match');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Match', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('description');
		echo $this->Form->input('nombre_de_places');
		echo $this->Form->input('tarif_id');
		echo $this->Form->input('type_de_match');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Match.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Match.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Matches', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Tarifs', true)), array('controller' => 'tarifs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Tarif', true)), array('controller' => 'tarifs', 'action' => 'add')); ?> </li>
	</ul>
</div>