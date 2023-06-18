<?php

namespace Ti\Cardfraudsm\App\Controllers\Admin;

use Ti\Cardfraudsm\Request;
use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;
use Ti\Cardfraudsm\App\Models\Role;
use Ti\Cardfraudsm\App\Controllers\Controller;
use Ti\Cardfraudsm\Middleware\AdministratorMiddleware;



class RoleController extends Controller{
    public function __construct(){
		(new AdministratorMiddleware())->redirectIfNotAuthenticated();
	}


    public function index() {
		$rols = new Role();
		$roles = $rols->all();
         $this->view("administrator/Roles/index", "admindash", 'footer', ['roles' => $roles,]);
	}

    public function store() {
		$request = new Request;
		$session = new SessionManager();
        $role = new Role();
		if(!preg_match("/^[a-zA-Z]+$/",$request->input('name'))){
			$session->setFlash('error', 'Role name contain non characters please try again');
			$this->back();
		}
        $role->name = $request->input('name');
        $role->level = $request->input('level');
        $role->save();
		$session->setFlash('success', 'New Role created successfully!!');
		$this->back();
	}

    public function show($id) {
		$role =  Role::find($id);
		$this->view("administrator/Roles/edit", "admindash", 'footer', ['role'=>$role]);
	}


    public function update($id) {
        $request = new Request;
		$session = new SessionManager();
		$role = Role::find($id);
        $role->name = $request->input('name');
        $role->level = $request->input('level');
		$role->update([$role]);
		$session->setFlash('success', 'Role updated successfully!!');
		Configuration::redirection('roles');
	}

    public function destroy($id) {
		$session = new SessionManager();
		$role = Role::find($id);
		 if(count($role->administrators)>0){
		 	 $session->setFlash('error', 'Role cant be deleted');
		 	 Configuration::redirection('roles');
		 }else{
		 	 $role->delete();
		 	 $session->setFlash('success', 'Role  deleted successfully');
		 	 Configuration::redirection('roles');
		 }
	}
}