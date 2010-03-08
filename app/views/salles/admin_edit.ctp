<div class="salles form">
<?php echo $this->Form->create('Salle');?>
	<fieldset>
 		<legend><?php printf(__('Edit %s', true), __('Salle', true)); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('nom');
		echo $this->Form->input('adresse');
		echo $this->Form->input('nombre_de_places');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $this->Form->value('Salle.id')), null, sprintf(__('Etes vous sur de vouloir supprimer # %s?', true), $this->Form->value('Salle.id'))); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('Liste des %s', true), __('Salles', true)), array('action' => 'index'));?></li>
	</ul>
</div>