<div class="salles form">
<?php echo $this->Form->create('Salle');?>
	<fieldset>
 		<legend><?php printf(__('Ajouter une %s', true), __('Salle', true)); ?></legend>
	<?php
		echo $this->Form->input('nom');
		echo $this->Form->input('adresse');
		echo $this->Form->input('nombre_de_places');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Envoyer', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Liste des %s', true), __('Salles', true)), array('action' => 'index'));?></li>
	</ul>
</div>