<div class="matches form">
<?php echo $this->Form->create('Match');?>
	<fieldset>
 		<legend><?php printf(__('Modifier	 %s', true), __('Match', true)); ?></legend>
	<?php
		
		echo $this->Form->input('id');
		echo $this->Form->input('rencontre');
		echo $this->Form->input('date');
		echo $this->Form->input('salle_id');
				
		$options=array('match'=>'Match normal (PAF 5 et 7)', 'gala'=>'Match de gala (tarif unique 10€)', 'pass'=>'Pass Festimpro (25€ pour tous les matchs)');
		echo $this->Form->radio('type', $options, array('legend'=>'Type de tarif', 'value'=>$match['Match']['type']) );
		
	?>
	</fieldset>
<?php echo $this->Form->end(__('Enregistrer', true));?>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Liste des matchs', true)), array('controller'=>'users', 'action' => 'home')); ?></li>
	</ul>
</div>