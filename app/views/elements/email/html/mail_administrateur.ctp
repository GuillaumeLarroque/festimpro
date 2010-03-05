    <h3>Bonjour,</h3>
    Une réservation a été faite pour le festival, voici le récapitulatif :
    
    <ul>
        <li>Prenom : <?php echo $reservation['Reservation']['prenom']; ?></li>
        <li>Nom : <?php echo $reservation['Reservation']['nom']; ?></li>
        <li>Email : <?php echo $reservation['Reservation']['email']; ?></li>
        <li>Nombre de places : <?php echo $reservation['Reservation']['nombre_de_places'];?></li>
        <li>Tarif choisi : <?php echo $reservation['Tarif']['nom'];?></li>
        <li>Reservation pour : <?php echo $reservation['Match']['rencontre'].', '.$reservation['Match']['date']; ?></li>
    </ul>
    
    <p>
        Il reste désormais :
        <?php
        echo $match['Salle']['nombre_de_places']-$nombre_de_reservations.' pour '.$reservation['Match']['rencontre'].'('.$reservation['Match']['date'].') : '.$nombre_de_reservations.' places réservées sur '.$match['Salle']['nombre_de_places'];
        
        ?>
    </p>