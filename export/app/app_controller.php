<?php

class AppController extends Controller
{
    var $components = array('AppAuth', 'Session');
    
    function before_render()
    {
        if( !empty($this->params['prefix']) )
           {
                $this->layout = $this->params['prefix'];
           }
    }
}

?>
