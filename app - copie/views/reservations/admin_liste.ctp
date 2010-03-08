<div class="reservations index">
	<h2><?php $reservation['Match']['rencontre'];?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id');?></th>
			<th><?php echo $this->Paginator->sort('prenom');?></th>
			<th><?php echo $this->Paginator->sort('nom');?></th>
			<th><?php echo $this->Paginator->sort('email');?></th>
			<th><?php echo $this->Paginator->sort('match_id');?></th>
			<th><?php echo $this->Paginator->sort('nombre_de_places');?></th>
			<th><?php echo $this->Paginator->sort('Creation');?></th>
			<th class="actions"><?php __('Actions');?></th>
	</tr>
	<?php
	$i = 0;
	foreach ($reservations as $reservation):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	<tr<?php echo $class;?>>
		<td><?php echo $reservation['Reservation']['id']; ?>&nbsp;</td>
		<td><?php echo $reservation['Reservation']['prenom']; ?>&nbsp;</td>
		<td><?php echo $reservation['Reservation']['nom']; ?>&nbsp;</td>
		<td><?php echo $reservation['Reservation']['email']; ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($reservation['Match']['type'], array('controller' => 'matches', 'action' => 'view', $reservation['Match']['id'])); ?>
		</td>
		<td><?php echo $reservation['Reservation']['nombre_de_places']; ?>&nbsp;</td>
		<td><?php echo strftime("%d %B %Y à %H:%M", strtotime($reservation['Reservation']['created']) ); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Détails', true), array('action' => 'view', $reservation['Reservation']['id'])); ?>
			<?php echo $this->Html->link(__('Modifier', true), array('action' => 'edit', $reservation['Reservation']['id'])); ?>
			<?php echo $this->Html->link(__('Supprimer', true), array('action' => 'delete', $reservation['Reservation']['id']), null, sprintf(__('Êtes-vous sur de vouloir suprimer # %s?', true), $reservation['Reservation']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% sur %pages%, affichage de  %current% sur %count% au total, débute à l\'enregistrement %start%, termine à %end%', true)
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
		<li><?php echo $this->Html->link(sprintf(__('Liste des matchs', true)), array('controller'=>'users', 'action' => 'home')); ?></li>
	</ul>
</div>