
    <?php echo $this->Form->create('Message'); ?>
    
    <div>Vérification :</div>
    <div>
        <img src="<?php echo $captcha_image_url;?> " id="captcha" alt="CAPTCHA Image" /> </div>
    <div>
    
    <?php echo $this->Form->input('captcha_code' ,array('label'=>'Veuillez recopier le code ci-dessus pour envoyer votre message'));
    //<input type="text" name="data[Message][captcha_code]" size="10" maxlength="6" value="" />
    ?>
    </div>
    <div><a href="#" onclick="document.getElementById('captcha').src = '<?php echo $this->webroot;?>messages/securimage/' + Math.random(); return false">Recharger l'image</a></div>
    <div style="color:red;"><?php echo $error_captcha; ?></div>
    <div style="color:green;"><?php echo $success_captcha; ?></div>
    
    
    <div><?php echo $this->Form->end('envoyer'); ?></div>
</form> 