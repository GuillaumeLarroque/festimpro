<div style='text-align:center; width:100%; margin:0;'>
	<?php echo $this->Form->create('Message');?>
	<fieldset style="width:500px; margin:0 auto; 	text-align:left;">
	<legend><?php printf(__('Écrire sur le livre d\'or', true)); ?></legend>
<?php
	echo $this->Form->input('nom', array('label'=>'Votre nom'));
	echo $this->Form->input('texte', array('label'=>'Votre message'));
	echo $this->Form->input('email', array('label'=>'Votre adresse e-mail (facultatif)'));
?>

<img src="<?php echo $captcha_image_url;?> " id="captcha" alt="CAPTCHA Image" />
	<a href="#" style="margin:0;padding:0;" onclick="document.getElementById('captcha').src = '<?php echo $this->webroot;?>messages/securimage/' + Math.random(); return false">
	Recharger l'image
	</a>
<?php echo $this->Form->input('captcha_code' ,array('label'=>'Veuillez recopier le code ci-dessus pour envoyer votre message'));?>
	
<div style="color:red;margin:0;padding:0;"><?php echo $error_captcha; ?></div>
<div style="color:green;margin:0;padding:0;"><?php echo $success_captcha; ?></div>
</fieldset>

<?php echo $this->Form->end(__('Envoyer', true));?>
