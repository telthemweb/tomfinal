<?php

namespace Ti\Cardfraudsm\App\Controllers;

use Ti\Cardfraudsm\Request;
use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;
use Ti\Cardfraudsm\App\Models\Audit;
use Ti\Cardfraudsm\App\Models\Category;
use Ti\Cardfraudsm\Middleware\AdministratorMiddleware;




class CategoryController extends Controller
{
	public function __construct(){
		(new AdministratorMiddleware())->redirectIfNotAuthenticated();
	}
    
	/**
	 * @return mixed
	 */
	public function index() {
		$categories =  Category::orderByDesc('created_at')->get();
		$this->view("administrator/category/index", "admindash", 'footer', ['categories'=>$categories]);
	}
	
	/**
	 * @return mixed
	 */
	public function create() {
	}
	
	/**
	 * @return mixed
	 */
	public function store() {
		$request = new Request;
		$session = new SessionManager();
        $cat = new Category();
		$audit = new Audit();
        $cat->name = $request->input('name');
		if(!preg_match("/^[a-zA-Z]+$/",$request->input('name'))){
			$session->setFlash('error', 'Category name contain non characters please try again');
			$this->back();
		}
		$audit->administrator_id=$_SESSION['admin_id'];
		$audit->entity='Ti\Cardfraudsm\App\Models\Category';
		$audit->oldvalue='New Category';
		$audit->newvalue=$request->input('name');
		$audit->action="CREATE_CATEGORY";
		$audit->save([$audit]);
        $cat->save();
		$session->setFlash('success', 'Category created successfully!!');
		$this->back();
	}
	
	/**
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function show($id) {
		//echo $_SESSION['admin_id'];
		$cats =  Category::find($id);
		$this->view("administrator/category/edit", "admindash", 'footer', ['category'=>$cats]);
	}
	
	/**
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function edit($id) {
		$request = new Request;
		$session = new SessionManager();
		$cat = Category::findOrFail($id);
		$audit = new Audit();
		$audit->administrator_id=$_SESSION['admin_id'];
		$audit->entity='Ti\Cardfraudsm\App\Models\Category';
		$audit->oldvalue=$cat->name;
		$audit->newvalue=$request->input('name');
		$audit->action="UPDATE_CATEGORY";
		$audit->save();


		$cat->name = $request->input('name');
		$cat->update([$cat]);
		$session->setFlash('success', 'Category updated successfully!!');
		Configuration::redirection('admin/categories');

		
	}
	
	/**
	 * @return mixed
	 */
	public function update() {
		
	}
	
	/**
	 *
	 * @param mixed $id
	 * @return mixed
	 */
	public function destroy($id) {
		//$request = new Request;
		$session = new SessionManager();
		$cat = Category::find($id);
		 if(count($cat->products)>0){
		 	 $session->setFlash('error', 'Category cant be deleted');
		 	 Configuration::redirection('admin/categories');
		 }else{
			$audit = new Audit();
			$audit->administrator_id=$_SESSION['admin_id'];
			$audit->entity='Ti\Cardfraudsm\App\Models\Category';
			$audit->oldvalue=$cat->name;
			$audit->newvalue='No new value';
			$audit->action="DELETE_CATEGORY";
			$audit->save();
		 	 $cat->delete();
		 	 $session->setFlash('success', 'Category  deleted successfully');
		 	 Configuration::redirection('admin/categories');
		 }
	}
}