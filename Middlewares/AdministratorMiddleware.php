<?php
namespace Ti\Cardfraudsm\Middleware;

use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;





class AdministratorMiddleware{
    public function __construct(){
        $this->redirectIfNotAuthenticated();
    }

    public function redirectIfNotAuthenticated()
    {
        
        if($_SESSION['admin_id'] == NULL || !isset($_SESSION['admin_id']))
        {
            $session = new SessionManager;
            $session->setFlash('error', 'You are not authorized to this Page. Please Login first!!');
            Configuration::redirection('admin/login');     
        }
    }
}