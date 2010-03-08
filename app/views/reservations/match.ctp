
<div style='text-align:center; width:100%; margin:0;'>
	<?php echo $this->Form->create('Reservation', array('action'=>'match/'.$match['Match']['id'] ));?>
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
			$options=array(3=>'10€ (pas de réduction pour cette rencontre)');
		}
		else if($match['Match']['type']=='pass')
		{
			$tarif_par_defaut=4;
			$options=array(4=>'25€ : participation unique pour tous les matchs du lundi au samedi (dimanche non compris)');
		}
		else
		{
			$tarif_par_defaut=1;
			$options=array(1=>'Normal :  7€', 2=>'Réduit : 5€ (étudiant, Mineur, Chomeur)');
		}
		
		echo $this->Form->radio( 'tarif_id', $options, array('legend'=>'Participation aux frais (Le prix sera à régler sur place)', 'value'=>$tarif_par_defaut) );
	?>
	
	
	<img src="<?php echo $captcha_image_url;?> " id="captcha" alt="CAPTCHA Image" />
	<a href="#" style="margin:0;padding:0;" onclick="document.getElementById('captcha').src = '<?php echo $this->webroot;?>messages/securimage/' + Math.random(); return false">
	Recharger l'image
	</a>
	<?php echo $this->Form->input('captcha_code' ,array('label'=>'Veuillez recopier le code ci-dessus pour valider votre réservation'));?>
		
	<div style="color:red;margin:0;padding:0;"><?php echo $error_captcha; ?></div>
	<div style="color:green;margin:0;padding:0;"><?php echo $success_captcha; ?></div>
	</fieldset>
	<?php echo $this->Form->end('Valider la réservation');?>
</div>

