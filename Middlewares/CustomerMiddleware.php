<?php
namespace Ti\Cardfraudsm\Middleware;

use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;



class CustomerMiddleware{
    public function __construct(){
        $this->redirectIfNotAuthenticated();
    }

    public function redirectIfNotAuthenticated()
    {
        
        if($_SESSION['customer_id'] == NULL || !isset($_SESSION['customer_id']))
        {
            $session = new SessionManager;
            $session->setFlash('error', 'You are not authorized to this Page. Please Login first!!');
            Configuration::redirection('login');     
        }
    }
}