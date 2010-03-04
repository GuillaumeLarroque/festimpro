<?php echo $this->Form->create('Message');?>
<fieldset>
	<legend><?php printf(__('Écrire sur le livre d\'or', true)); ?></legend>
<?php
	echo $this->Form->input('nom', array('label'=>'Votre nom'));
	echo $this->Form->input('texte', array('label'=>'Votre message'));
	echo $this->Form->input('email', array('label'=>'Votre adresse mail (facultatif)'));
?>
</fieldset>
<img src="<?php echo $captcha_image_url;?> " id="captcha" alt="CAPTCHA Image" />
<?php echo $this->Form->input('captcha_code' ,array('label'=>'Veuillez recopier le code ci-dessus pour envoyer votre message'));?>
<div><a href="#" onclick="document.getElementById('captcha').src = '<?php echo $this->webroot;?>messages/securimage/' + Math.random(); return false">Recharger l'image</a></div>
<div style="color:red;"><?php echo $error_captcha; ?></div>
<div style="color:green;"><?php echo $success_captcha; ?></div>
<?php echo $this->Form->end(__('Envoyer', true));?>
