Une réservation a été faite pour le festival, voici le récapitulatif :

Prenom : <?php echo $reservation['Reservation']['prenom']; ?>

Nom : <?php echo $reservation['Reservation']['nom']; ?>

Email : <?php echo $reservation['Reservation']['email']; ?>

Nombre de places : <?php echo $reservation['Reservation']['nombre_de_places'];?>

Tarif choisi : <?php echo $reservation['Tarif']['nom'];?>

Reservation pour : <?php echo $reservation['Match']['rencontre'].', '.$reservation['Match']['date']; ?>


Accéder à cette réservation sur l'administration : <?php e( Configure::read('site.URL').'admin/reservations/view/'.$reservation['Reservation']['id'] );?>



---


Il reste désormais : <?php echo $match['Salle']['nombre_de_places']-$nombre_de_reservations.' pour '.$reservation['Match']['rencontre'].'('.$reservation['Match']['date'].') : '.$nombre_de_reservations.' places réservées sur '.$match['Salle']['nombre_de_places'];
?>


Accéder à l'accueil de l'administration : <?php e( Configure::read('site.URL').'admin/' );?>