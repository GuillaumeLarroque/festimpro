<div class="salles view">
<h2><?php  __('Salle');?></h2>
	<dl><?php $i = 0; $class = ' class="altrow"';?>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Id'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salle['Salle']['id']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nom'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salle['Salle']['nom']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Adresse'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salle['Salle']['adresse']; ?>
			&nbsp;
		</dd>
		<dt<?php if ($i % 2 == 0) echo $class;?>><?php __('Nombre De Places'); ?></dt>
		<dd<?php if ($i++ % 2 == 0) echo $class;?>>
			<?php echo $salle['Salle']['nombre_de_places']; ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Modifier cette %s', true), __('Salle', true)), array('action' => 'edit', $salle['Salle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Supprimer cette %s', true), __('Salle', true)), array('action' => 'delete', $salle['Salle']['id']), null, sprintf(__('ætes vous sur de vouloir supprimer # %s?', true), $salle['Salle']['id'])); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Liste des %s', true), __('Salles', true)), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(sprintf(__('Nouvelle %s', true), __('Salle', true)), array('action' => 'add')); ?> </li>
	</ul>
</div>
