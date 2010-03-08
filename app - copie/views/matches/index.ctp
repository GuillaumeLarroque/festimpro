	<h2><?php __('Bienvenue sur le service de réservation en ligne du festival impro 14');?></h2>
	<p>La réservation est gratuite, le paiement s'effectuera sur place avant le match (pas de paiement en ligne nécessaire).
	<br/>Sélectionnez le match pour lequel vous souhaitez réserver et suivez simplement les instructions. L'opération prend seulement quelques secondes.</p>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
		<th><?php echo $this->Paginator->sort('rencontre');?></th>
		<th><?php echo $this->Paginator->sort('date');?></th>
		<th><?php echo $this->Paginator->sort('salle_id');?></th>
		<th class="actions"></th>
	</tr>
	<?php
	$i = 0;
	foreach ($matches as $match):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<tr<?php echo $class;?>>
		<td><?php echo $this->Html->link($match['Match']['rencontre'],array('controller'=>'reservations', 'action' => 'match', $match['Match']['id'])); ?>&nbsp;</td>
		<td><?php echo $match['Match']['date']; ?>&nbsp;</td>
		<td>
			<?php echo $match['Salle']['nom'] ?>
		</td>		
		<td class="actions">
			<?php
			/*
			if($match['Match']['id']==8)
				$action='gala';
			else if($match['Match']['id']==9)
				$action='pass';
			else*/
			$action='match';
				
			echo $this->Html->link(__('Reserver', true), array('controller'=>'reservations', 'action' => $action, $match['Match']['id'])); ?>
		</td>
	</tr>
	
<?php endforeach; ?>
</table>


