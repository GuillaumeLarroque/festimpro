<h1>Bienvenue sur l'interface d'aministration du site de réservations</h1>

<table cellpadding="0" cellspacing="0">
    <tr>
            <td>Match</td>
            <td>réservé</td>
            <td>total</td>
            <td>restantes</td>
            <td></td>
    </tr>
        <?php
            foreach($matches as $match):
            $match_id=$match['Match']['id'];
        ?>
        
        <tr>
            <td>
                <?php
                    echo $this->Html->link($match['Match']['rencontre'], array('controller'=>'matches', 'admin'=>'true', 'action'=>'view', $match['Match']['id'])); 
                ?>
            </td>
            <td><?php echo $resultats[$match_id]['nombre'] ?></td>
            <td><?php echo $match['Salle']['nombre_de_places'] ?></td>
            <td><?php echo ( $match['Salle']['nombre_de_places']-$resultats[$match_id]['nombre']) ?></td>
            <td class='actions'>
                <?php echo $this->Html->link('Voir le détail', array('controller'=>'matches', 'admin'=>'true', 'action'=>'view', $match['Match']['id'])); ?>
                <?php echo $this->Html->link('Voir les réservations', array('controller'=>'reservations', 'admin'=>'true', 'action'=>'liste', $match_id) ); ?>
            </td>
        </tr>
        <?php endforeach; ?>
</table>
