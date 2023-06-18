<?php
namespace Ti\Cardfraudsm\Middleware;

use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;





class GuestMiddleware{
    public function __construct(){
        $this->AuthenticatedUserIdData();
    }

    public function AuthenticatedUserIdData()
    {
        
        if(isset($_SESSION['admin_id']))
        { 
            $session = new SessionManager;
             $session->setFlash('error', 'You are not authorized to this Page. Please Login first!!');
             Configuration::redirection('dashboard');
        }
        else{

        }
    }
}