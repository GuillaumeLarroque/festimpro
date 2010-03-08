<div class="messages form">
<?php echo $this->Form->create('Message');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Message', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('texte');
		echo $this->Form->input('email');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Supprimer ce message', true), array('action' => 'delete', $this->Form->value('Message.id')), null, sprintf(__('ætes vous sur de vouloir supprimer # %s?', true), $this->Form->value('Message.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('Liste des %s', true), __('Messages', true)), array('action' => 'index'));?></li>
	</ul>
</div>