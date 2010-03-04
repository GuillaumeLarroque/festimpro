<h2>Accès Administrateur</h2>

<?php
$session->flash('Auth');

echo $this->Form->create('User');
echo $this->Form->input('login', array('label'=>'Identifiant : '));
echo $this->Form->input('password', array('label'=>'Mot de passe : '));
echo $this->Form->end("connexion");
?>
