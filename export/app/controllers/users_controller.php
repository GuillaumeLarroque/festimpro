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

    }
}
?>