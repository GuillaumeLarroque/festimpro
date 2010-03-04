<div class="tarifs form">
<?php echo $this->Form->create('Tarif');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Tarif', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('prix');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Delete', true), array('action' => 'delete', $this->Form->value('Tarif.id')), null, sprintf(__('Are you sure you want to delete # %s?', true), $this->Form->value('Tarif.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Tarifs', true)), array('action' => 'index'));?></li>
		<li><?php echo $this->Html->link(sprintf(__('List %s', true), __('Matches', true)), array('controller' => 'matches', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('New %s', true), __('Match', true)), array('controller' => 'matches', 'action' => 'add')); ?> </li>
	</ul>
</div>