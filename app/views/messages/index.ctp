<div class="messages index">
	<h2><?php __('Livre d\'or');?></h2>
	
	<?php
	$i = 0;
	foreach ($messages as $message):
		$class = null;
		if ($i++ % 2 == 0) {
			$class = ' class="altrow"';
		}
	?>
	
	<div class="LO_conteneur">
		
		<div class="LO_titre">
			<h1>
				<?php echo $message['Message']['nom'].' :';?>
			</h1>
		</div>
		
		<div class="LO_message">
		<p><?php echo $message['Message']['texte'] ?></p>
		</div>
		<div class="LO_pied">
			<?php echo 'écrit par '.$message['Message']['nom'];
			if($message['Message']['email']!=null)
				echo ' ('.$message['Message']['email'].')';
			
			?>
			, le <?php echo strftime("%d %B %Y à %H:%M", strtotime($message['Message']['created'] ) );?>
		</div>
	</div>
	
<?php endforeach; ?>	
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page %page% sur %pages%', true)
	));
	?>	</p>

	<div class="paging">
		<?php echo $this->Paginator->prev('<< '.__('Précédente', true), array(), null, array('class'=>'disabled'));?>
	 | 	<?php echo $this->Paginator->numbers();?>
 |
		<?php echo $this->Paginator->next(__('Suivante	', true).' >>', array(), null, array('class' => 'disabled'));?>
	</div>
</div>
<div class="actions">
	<ul>
		<li><?php echo $this->Html->link(sprintf(__('Ecrire un  %s', true), __('message', true)), array('action' => 'add')); ?></li>
	</ul>
</div>