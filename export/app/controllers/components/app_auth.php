<?php
App::import('Component', 'Auth');

class AppAuthComponent extends AuthComponent
{
    
    var $defaults = array(
        'userModel'     =>  'Users',
        'userScope'     =>  null,
        'fields'        =>  null,
        'loginAction'   =>  null,
        'loginRedirect' =>  null,
        'logoutRedirect'=>  null,
        'autoRedirect'  =>  true,
        'loginError'    =>  'Identifiants ou mot de passe incorrects.',
        'authError'     =>  'Vous n\'avez pas acc�s � cette page'  
    );
    
    /**
     * Configurations possibles en fonction du pr�fixe de la route
     *
     * @var array
     */
    var $configs = array(
            'admin' => array(
                    'userModel'      => 'User',
                    'userScope'      => array('User.disabled' => 0),
                    'fields'         => array('username' => 'login', 'password' => 'password'),
                    'loginAction'    => array('controller' => 'users', 'action' => 'login', 'admin' => false),
                    'loginRedirect'  => array('controller' => 'users', 'action' => 'home', 'admin' => true),
                    'logoutRedirect' => array('controller' => 'users', 'action' => 'login', 'admin' => false),
            ),
            'membres' => array(
                    'userModel'      => 'Member',
                    'userScope'      => array('Member.disabled' => 0),
                    'fields'         => array('username' => 'email', 'password' => 'password'),
                    'loginAction'    => array('controller' => 'members', 'action' => 'login', 'membres' => false),
                    'loginRedirect'  => array('controller' => 'members', 'action' => 'home', 'membres' => true),
                    'logoutRedirect' => array('controller' => 'members', 'action' => 'login', 'membres' => false),
            ),
    );
    
    
    /**
     * D�marrage du composant.
     * Autorisation si pas de pr�fixe dans la Route qui a conduit ici.
     *
     * @param object $controller Le contr�leur qui a appel� le composant.
     */
    function startup($controller)
    {
        $prefix = null;
        
        if( empty($controller->params['prefix']) )
        {
            $this->allow();
        }
        else
        {
            $prefix = $controller->params['prefix'];            
        }
        
        // Cas sp�cial des actions de login et logout, pour lesquelles le pr�fixe n'existe pas
        if(in_array($controller->action, array('login', 'logout')) )
        {
            switch($controller->name)
            {
                case 'Users':
                    $prefix = 'admin';
                    break;
                
                case 'Members':
                    $prefix = 'members';
                    break;                
            }
        }
        
        $this->_setup($prefix);
        parent::startup($controller);
    }
    
    /**
    * D�finition des variables de config en fonction d'un pr�fixe
    *
    * @param string $prefix
    */
    function _setup($prefix)
    {
        $settings = $this->defaults;
        
        if( array_key_exists($prefix, $this->configs) )
        {
            $settings = array_merge($settings, $this->configs[$prefix]);
        }
        
        $this->_set($settings);
    }


}

?>
