
<div style='text-align:center; width:100%; margin:0;'>
	<?php echo $this->Form->create('Reservation');?>
	<fieldset style="width:500px; margin:0 auto; 	text-align:left;">
 		<legend><?php printf(__('Effectuer une r&eacute;servation', true)); ?></legend>
	<p>
		Vous souhaitez effectuer une réservation pour : <b><?php echo $match['Match']['rencontre'];  ?></b>, <?php echo $match['Match']['date']; ?>
		<br/>Veuillez compléter les champs ci-dessous puis validez.
	</p>
	
	<?php
		echo $this->Form->input('prenom');
		echo $this->Form->input('nom');
		echo $this->Form->input('email');
		
		echo $this->Form->hidden('match_id', array('value'=>$match['Match']['id']) );
			
		echo $this->Form->input('nombre_de_places', array('label'=>'Nombre de places désiré') );
		
		if($match['Match']['type']=='gala')
		{
			$tarif_par_defaut=3;
			$options=array(3=>'10€ : tarif unique');
		}
		else if($match['Match']['type']=='pass')
		{
			$tarif_par_defaut=4;
			$options=array(4=>'25€ : tarif unique pour tous les matchs du lundi au samedi (dimanche non compris)');
		}
		else
		{
			$tarif_par_defaut=1;
			$options=array(1=>'Tarif plein : 7€', 2=>'Tarif réduit : 5€ (étudiant, Mineur, Chomeur)');
		}
		
		echo $this->Form->radio( 'tarif_id', $options, array('legend'=>'Tarif*', 'value'=>$tarif_par_defaut) );
	?>
	<p>*Le prix sera à régler sur place</p>
	
	</fieldset>
	<?php echo $this->Form->end('Valider la réservation');?>
</div>

