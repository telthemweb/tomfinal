<?php

namespace Ti\Cardfraudsm\App\Controllers;

use Ti\Cardfraudsm\Request;
use Ti\Cardfraudsm\App\Models\Audit;
use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;
use Ti\Cardfraudsm\App\Models\Systemlogs;
use Ti\Cardfraudsm\App\Models\Administrator;
use Ti\Cardfraudsm\Middleware\AuthAdminMiddleware;



class AdministratorController extends Controller{

    public function index() {
		(new AuthAdminMiddleware())->AuthenticatedUserIdData();
        $this->view("administrator/login", "admin", 'footer', []);
	}

    public function home()
    {
        return $this->view("administrator/Dashboard", "admin", 'footer', []);
    }
    public function loginAdmin(){
        $log = new  Systemlogs();
       $request = new Request;
       $session = new SessionManager();
       $username = $request->input('username');
       $password = $request->input('password');
       $check= str_starts_with($username, "TRX");
       if($check==false){
           $session->setFlash('error', 'Username is incorrect format please contact Administrator username start with Ewc');
           Configuration::redirection('admin/login');
       }
       else{
        //    $admin = (new User())->findBy('username="'.$username.'"');
           $admin = Administrator::whereusername($username)->first();
           if($admin != NULL){
                   $veryfypass = password_verify($password, $admin->password);
                   if($veryfypass==true){
                       $_SESSION['admin_id'] = $admin->id;
                       $_SESSION['name'] = $admin->name;
                       $_SESSION['surname'] = $admin->surname;
                       $_SESSION['email'] = $admin->email;
                       $_SESSION['phone'] = $admin->phone;
                       $_SESSION['username'] = $admin->username;
                       $_SESSION['gender'] = $admin->gender;
                       $_SESSION['city'] = $admin->city;
                       $_SESSION['role_Id'] = $admin->role_Id;
                       $_SESSION['role_name'] = $admin->role->name;
                       $_SESSION['address'] = $admin->address;
                       Configuration::redirection('dashboard');
                       $session->setFlash('success', 'Welcome '.$admin->name.' '.$admin->surname);
                       //add logs
                       $log->administrator_id =$admin->id;
                       $log->timein=date('H:i:s');
                       $log->ipaddress=$_SERVER['REMOTE_ADDR'];
                       $log->geolocationap="";
                       $log->useaccountname= $admin->name .' '.$admin->surname;
                       $log->timeout="Pending";
                       $log->save();
                   }else{
                       
                       Configuration::redirection('admin/login');
                      $session->setFlash('error', 'Incorrect password please try again !!');
                       exit();
                   }
               
               
       
           }else{	
               Configuration::redirection('admin/login');
               $session->setFlash('error', 'Incorrect credentials please contact Administrator for account Activation !!');
               exit();
           }
           
       }
    }
       public function logout()
       {
           $log = Systemlogs::wheretimeout('Pending')->wherestatus('Pending')->whereadministrator_id($_SESSION['admin_id'])->first();
           //add logs
           $log->administrator_id =$_SESSION['admin_id'];
           $log->ipaddress=$_SERVER['REMOTE_ADDR'];
           $log->geolocationap="";
           $log->status="Logged out";
           $log->useaccountname = $_SESSION['name'] . ' ' . $_SESSION['surname'];
           $log->timeout=date('H:i:s');;
           $log->update([$log]);
   
           unset($_SESSION['admin_id']);
           unset($_SESSION['name']);
           unset($_SESSION['surname']);
           unset($_SESSION['email']);
           unset($_SESSION['phone']);
           unset($_SESSION['username']);
           unset($_SESSION['gender']);
           unset($_SESSION['country']);
           unset($_SESSION['province']);
           unset($_SESSION['city']);
           unset($_SESSION['city']);
           unset($_SESSION['address']);
           
           session_destroy();
           Configuration::redirection('admin/login');
       }


       public function storeapi() {
		$session = new SessionManager();
		// if($this->hasPermission('CREATE_EMPLOYEE')==true){
		$request = new Request;
		$admin = new Administrator();

		$data = array();
		$newdata = array();
		$data['name'] = $request->input('name');
		$data['surname'] = $request->input('surname');
		$data['role_Id'] = $request->input('role_Id');
		$data['username'] = $request->input('username');
		$data['address'] = $request->input('address');
		$data['gender'] = $request->input('gender');
		$data['email'] = $request->input('email');
		$data['phone'] = $request->input('phone');
		$data['city'] = $request->input('city');
		$mydata = json_encode($data);

		$audit = new Audit;
		$audit->administrator_id=$_SESSION['admin_id'];
		$audit->entity='Ti\Buyers\Tellibs\App\Models\Administrator';
		$audit->oldvalue = 'N/A';
		$audit->newvalue=$mydata;
		$audit->action="CREATE_USER";
		$audit->save();




        $options = [
            'cost' => 12,
        ];
        $encrypetedpass = password_hash($request->input('password'), PASSWORD_BCRYPT, $options);
        $admin->name = $request->input('name');
        $admin->surname = $request->input('surname');
        $admin->role_Id = $request->input('role_Id');
        $admin->username = $request->input('username');
        $admin->password =$encrypetedpass;
        $admin->address = $request->input('address');
        $admin->gender = $request->input('gender');
        $admin->email = $request->input('email');
        $admin->phone = $request->input('phone');
        $admin->city = $request->input('city');
        $admin->save();
        $this->back();
        $session->setFlash('success', $admin->name.' '.$admin->surname .'created successfully !!"');
	}
   
}