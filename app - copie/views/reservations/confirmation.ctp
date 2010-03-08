<h1>Merci!</h1>
<p>

   <?php echo $reservation['Reservation']['prenom'].' '.$reservation['Reservation']['nom']; ?>, Nous vous remercions d'avoir effectué votre réservation en ligne!
   Voici un récapitulatif de votre réservation :
   <ul>
    <li>
        <?php echo $reservation['Match']['rencontre'].', le '.$reservation['Match']['date'].' ('.$salle['Salle']['nom'].')';?>
    </li>
    <li>
        <?php echo $reservation['Reservation']['nombre_de_places'].' places à '.$reservation['Tarif']['prix'].'€ (soit '.($reservation['Reservation']['nombre_de_places']*$reservation['Tarif']['prix']).'€ en tout )'; ?>
    </li>
    </ul>
    <br/>
    <p>
    Nous vous rappelons que le règlement s'effectue sur place. Merci de préparer la somme de :
    <?php echo ($reservation['Reservation']['nombre_de_places']*$reservation['Tarif']['prix']) ;?> € (paiement par chèque ou espèces).
    <br/>
    
    Rendez-vous le <?php echo $reservation['Match']['date'];?> à partir de 19h, coup de sifflet à 20h!

    </p>
    <br/>
    Rappel : le match aura lieu à l'adresse suivante :
    <br/>
    <?php echo $salle['Salle']['nom']; ?>
    <br/>
    <?php echo $salle['Salle']['adresse']; ?>
    <br/>
    <br/>
    Ces informations viennent également de vous être envoyées par email. <br/>  
    Si vous souhaitez modifier ou annuler cette réservation merci d'envoyer un email à l'adresse suivante : <?php echo $this->Html->link('admin@impro14.com','mailto:admin@impro14.com');?>
    <br/><br/>
    Merci et à très bientôt!
    
    <?php $this->Html->link('Retour à l\'accueil du site', array('controller'=>'pages','action'=>'index') ); ?>
</p>
