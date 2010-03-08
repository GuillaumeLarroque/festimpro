<?php

class AppController extends Controller
{
    var $components = array('AppAuth', 'Session');
    var $helpers = array('Html', 'Form', 'Javascript', 'Session', 'Swfobject');
    
    
    function beforeRender()
    {
        
        if( !empty($this->params['prefix']) )
           {
               $this->layout = $this->params['prefix'];
           }
    }
}

?>
