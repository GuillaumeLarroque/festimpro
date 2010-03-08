<?php $this->layout = 'accueil'; ?>

<?php
    $this->addScript('flash', $swfobject->create('/img/prechargeur.swf', 'anim', array('width' => 950, 'height' => 720, 'express' => '/img/expressInstall.swf')));
?>

	
<div id="anim">
	<p>TEXTE PRÉSENTATION RAPIDE : </p>
	<br/>
	<?php echo $this->Html->link('Réserver vos places', array('controller'=>'matches', 'action'=>'index') ); ?>
	<br/>
	<?php echo $this->Html->link('Accéder au livre d\'or', array('controller'=>'matches', 'action'=>'index') ); ?>
	<br/>
	<a 
</div>