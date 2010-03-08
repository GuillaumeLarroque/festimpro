<div class="salles index">
	<h2><?php __('Salles');?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('nom');?></th>
			<th><?php echo $this->Paginator->sort('adresse');?></th>
			<th><?php echo $this->Paginator->sort('nombre_de_places');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($salles as $salle):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $salle['Salle']['id']; ?>&nbsp;</td>
		<td><?php echo $salle['Salle']['nom']; ?>&nbsp;</td>
		<td><?php echo $salle['Salle']['adresse']; ?>&nbsp;</td>
		<td><?php echo $salle['Salle']['nombre_de_places']; ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Détails', true), array('action' => 'view', $salle['Salle']['id'])); ?>
			<?php echo $this->Html->link(__('Modifier', true), array('action' => 'edit', $salle['Salle']['id'])); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $salle['Salle']['id']), null, sprintf(__('Êtes vous sur de vouloir supprimer # %s?', true), $salle['Salle']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% of %pages%, showing %current% records out of %count% total, starting on record %start%, ending on %end%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('previous', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('next', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Nouvelle %s', true), __('Salle', true)), array('action' => 'add')); ?></li>
	</ul>
</div>