<div class="matches view">
<h2><?php  __(sprintf('Détails sur %s', $match['Match']['rencontre'] ),false);?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $match['Match']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Rencontre'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $match['Match']['rencontre']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Date'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $match['Match']['date']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Salle'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $this->Html->link($match['Salle']['nom'], array('controller' => 'salles', 'action' => 'view', $match['Salle']['id'])); ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Type de tarif'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $match['Match']['type']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Capacité'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $match['Salle']['nombre_de_places']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Réservé'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $nombre_de_reservations; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Reste'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo ($match['Salle']['nombre_de_places']-$nombre_de_reservations)  ?>
			&nbsp;
		</dd>
		<dt>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Liste des matchs', true)), array('controller'=>'users', 'action' => 'home')); ?></li>
		<li><?php echo $this->Html->link(sprintf(__('Modifier ces informations', true)), array('action' => 'edit',$match['Match']['id'] )); ?></li>
	</ul>
</div>
<div class="related">
	<br/>
	<h3><?php printf(__('Liste des réservations pour ce match', true));?></h3>
	<?php if (!empty($match['Reservation'])):?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th>Id</th>
		<th>Prenom</th>
		<th>Nom</th>
		<th>Email</th>
		<th>Nombre de places</th>
		<th>Tarif</th>
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
			<td><?php echo $reservation['Reservation']['id'];?></td>
			<td><?php echo $reservation['Reservation']['prenom'];?></td>
			<td><?php echo $reservation['Reservation']['nom'];?></td>
			<td><?php echo $reservation['Reservation']['email'];?></td>
			<td><?php echo $reservation['Reservation']['nombre_de_places'];?></td>
			<td><?php echo $reservation['Tarif']['nom'];?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('Détails', true), array('controller' => 'reservations', 'action' => 'view', $reservation['Reservation']['id'])); ?>
				<?php echo $this->Html->link(__('Modifier', true), array('controller' => 'reservations', 'action' => 'edit', $reservation['Reservation']['id'])); ?>
				<?php echo $this->Html->link(__('Supprimer', true), array('controller' => 'reservations', 'action' => 'delete', $reservation['Reservation']['id']), null, sprintf(__('Etes vous sur de vouloir suprimer # %s?', true), $reservation['Reservation']['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>
</div>
