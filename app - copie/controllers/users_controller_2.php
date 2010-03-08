<?php

class UsersController extends AppController
{    
    function login()
    {
        
    }
    
    function logout()
    {
        $this->redirect($this->AppAuth->logout());
    }
    
   
    function admin_home()
    {
        $this->loadModel('Match');
        $this->loadModel('Reservation');
        
        $matches = $this->Match->find('all');
        
        
        $nombre_resas=0;
        foreach($matches as $match)
        {
            $conditions = array('Reservation.match_id'=>array($match['Match']['id'],9) );
             
            $reservations = $this->Reservation->find('all', array('fields'=>array('Reservation.match_id', 'SUM(Reservation.nombre_de_places) as nombre'), 'conditions'=>$conditions ) ); 
            
            $resultats[$match['Match']['id']] = array('id'=>$reservations[0]['Reservation']['match_id'], 'nombre'=>$reservations[0][0]['nombre'] );
        }              
       
        //$reservations = $this->Reservation->find('all', array('fields'=>array('Reservation.id', 'SUM(Reservation.nombre_de_places) as nombre'), 'conditions'=>$conditions ) );
        
        $this->set('resultats', $resultats);
        
        $this->set('nombre_matches', count($matches) );
        
        $this->set( 'matches', $this->Match->find('all') );
        
    }
}

?>
    