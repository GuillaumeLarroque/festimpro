    Une réservation a été faite pour le festival, voici le récapitulatif :
    
    <ul>
        <li>Prenom : <?php echo $reservation['Reservation']['prenom']; ?></li>
        <li>Nom : <?php echo $reservation['Reservation']['nom']; ?></li>
        <li>Email : <?php echo $reservation['Reservation']['email']; ?></li>
        <li>Nombre de places : <?php echo $reservation['Reservation']['nombre_de_places'];?></li>
        <li>Tarif choisi : <?php echo $reservation['Tarif']['nom'];?></li>
        <li>Reservation pour : <?php echo $reservation['Match']['rencontre'].', '.$reservation['Match']['date']; ?></li>
    </ul>
     <a href='<?php e( Configure::read('site.URL').'admin/reservations/view/'.$reservation['Reservation']['id'] );?>'>Accéder à cette réservation sur l'administration</a>
    
    </br>
    ---
    <br/>
    <p>
        Il reste désormais :
        <?php
        echo $match['Salle']['nombre_de_places']-$nombre_de_reservations.' pour '.$reservation['Match']['rencontre'].'('.$reservation['Match']['date'].') : '.$nombre_de_reservations.' places réservées sur '.$match['Salle']['nombre_de_places'];
        ?>
    </p>
    
    <a href="<?php e( Configure::read('site.URL').'admin/' );?>">Accéder à l'accueil de l'administration</a>