<?php

namespace Ti\Cardfraudsm\App\Controllers\Admin;

use Ti\Cardfraudsm\Request;
use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;
use Ti\Cardfraudsm\App\Models\Role;
use Ti\Cardfraudsm\App\Models\Audit;
use Ti\Cardfraudsm\App\Models\Account;
use Ti\Cardfraudsm\App\Models\Customer;
use Ti\Cardfraudsm\App\Models\Creditcard;
use Ti\Cardfraudsm\App\Models\Systemlogs;
use Ti\Cardfraudsm\App\Models\Transaction;
use Ti\Cardfraudsm\App\Models\Administrator;
use Ti\Cardfraudsm\App\Controllers\Controller;
use Ti\Cardfraudsm\App\Models\Category;
use Ti\Cardfraudsm\App\Models\Product;
use Ti\Cardfraudsm\Middleware\AdministratorMiddleware;


class DashboardController extends Controller{
    public function __construct(){
		(new AdministratorMiddleware())->redirectIfNotAuthenticated();
	}

	public function index() {
		$countcust=Customer::count();
		$countAccount=Account::count();
		$countCreditcard=Creditcard::count();
		$countTransaction=Transaction::count();
		$countCategory=Category::count();
		$countProduct=Product::count();
		$this->view("administrator/Dashboard", "admindash", 'footer', [
			'totalcustom'=>$countcust,
			'countAccount'=>$countAccount,
			'countCreditcard'=>$countCreditcard,
			'countTransaction'=>$countTransaction,
			'countCategory'=>$countCategory,
			'countProduct'=>$countProduct
		]);
	  
	  }

	  public function changepassword($id) {
		$admin = Administrator::find($id);
		$this->view("administrator/changepassword", "admindash", 'footer', ['administrators' => $admin,]);
	  
	  }

	  public function users()
    {
		$session = new SessionManager();
        $dataemp =  Administrator::orderByDesc('created_at')->get();
		$role = new Role();
		$roles = $role->all();
         $this->view("administrator/Users/index","admindash",'footer',[
            'administrators' => $dataemp,
			'roles' => $roles
        ]);
    }


    public function store() {
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

		$audit = new Audit();
		$audit->administrator_id=$_SESSION['admin_id'];
		$audit->entity='Ti\Cardfraudsm\App\Models\Administrator';
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
	
	public function showuser($id) {
		$role = new Role();
		$roles = $role->all();
		$admin =  Administrator::find($id);
		$this->view("administrator/Users/edit", "admindash", 'footer', ['administrator'=>$admin,'roles'=>$roles]);
    
	}

	public function updateuser($id) {
		$request = new Request;
		$admin = Administrator::find($id);
		$session = new SessionManager();
		$olddata = array();
		$olddata['name'] = $admin->name;
		$olddata['surname'] = $admin->surname;
		$olddata['role_Id'] = $admin->role_Id;
		$olddata['username'] = $admin->username;
		$olddata['address'] = $admin->address;
		$olddata['gender'] = $admin->gender;
		$olddata['email'] = $admin->email;
		$olddata['phone'] = $admin->phone;
		$olddata['city'] = $admin->city;
		$myolddata = json_encode($olddata);

		$newdata = array();
		$newdata['name'] = $request->input('name');
		$newdata['surname'] = $request->input('surname');
		$newdata['role_Id'] = $request->input('role_Id')==null?$admin->role_Id:$request->input('role_Id');
		$newdata['role_status'] = $request->input('role_Id')==null?"Not changed":"Role Changed  ".$admin->role->name;
		$newdata['username'] = $request->input('username');
		$newdata['address'] = $request->input('address');
		$newdata['gender'] = $request->input('gender');
		$newdata['email'] = $request->input('email');
		$newdata['phone'] = $request->input('phone');
		$newdata['city'] = $request->input('city');
		$mydata = json_encode($newdata);

		$audit = new Audit();
		$audit->administrator_id=$_SESSION['admin_id'];
		$audit->entity='Ti\Cardfraudsm\App\Models\Administrator';
		$audit->oldvalue = $myolddata;
		$audit->newvalue=$mydata;
		$audit->action="UPDATE_USER";
		$audit->save();


	$options = [
				'cost' => 12,
			];
			$encrypetedpass = $request->input('password')==null?$admin->password:password_hash($request->input('password'), PASSWORD_BCRYPT, $options);
			$admin->name = $request->input('name');
			$admin->surname = $request->input('surname');
			$admin->role_Id = $request->input('role_Id')==null?$admin->role_Id:$request->input('role_Id');
			$admin->username = $request->input('username');
			$admin->password =$encrypetedpass;
			$admin->address = $request->input('address');
			$admin->gender = $request->input('gender')==null?$admin->gender: $request->input('gender');
			$admin->email = $request->input('email');
			$admin->phone = $request->input('phone');
			$admin->city = $request->input('city');
			$admin->update([$admin]);
			$session->setFlash('success', 'User updated successfully!!');
			Configuration::redirection('users');
	}

	public function destroy($id) {
		$admin = Administrator::find($id);
		$newdata = array();
		$newdata['name'] = $admin->name;
		$newdata['surname'] = $admin->surname;
		$newdata['role_Id'] = $admin->role_Id;
		$newdata['username'] = $admin->username;
		$newdata['address'] = $admin->address;
		$newdata['gender'] = $admin->gender;
		$newdata['country'] = $admin->country;
		$newdata['email'] = $admin->email;
		$newdata['phone'] = $admin->phone;
		$newdata['province'] = $admin->province;
		$newdata['city'] = $admin->city;
		$myolddata = json_encode($newdata);
		$audit = new Audit();
		$audit->administrator_id=$_SESSION['admin_id'];
		$audit->entity='Ti\Cardfraudsm\App\Models\Administrator';
		$audit->oldvalue = $myolddata;
		$audit->newvalue = 'N/A';
		$audit->action="DELETE_USER";
		$audit->save();
	}

    public function changepasswordpost(){
        $admin_id =$_SESSION['admin_id'];
        

		$request = new Request;
		$session = new SessionManager();
		$admin = Administrator::find($admin_id);
		$newpassword =$request->input('newpassword');
		$cnewpassword =$request->input('cnewpassword');
		$olddata = array();
		$olddata['name'] = $admin->name;
		$olddata['surname'] = $admin->surname;
		$olddata['role_Id'] = $admin->role_Id;
		$olddata['username'] = $admin->username;
		$olddata['address'] = $admin->address;
		$olddata['gender'] = $admin->gender;
		$olddata['email'] = $admin->email;
		$olddata['phone'] = $admin->phone;
		$olddata['password'] = $admin->password;
		$olddata['city'] = $admin->city;
		$myolddata = json_encode($olddata);

		$newdata = array();
		$newdata['new password'] = $newpassword;
		$options = [
			'cost' => 12,
		];
		$encrypetedpassd = password_hash($newpassword, PASSWORD_BCRYPT, $options);
		$newdata['token'] = base64_encode($encrypetedpassd);
		$mynewdata = json_encode($newdata);
		

		  $audit = new Audit();
			$audit->administrator_id=$_SESSION['admin_id'];
			$audit->entity='Ti\Cardfraudsm\App\Models\Administrator';
			$audit->oldvalue = $myolddata;
			$audit->newvalue = $mynewdata;
			$audit->action="CHANGE_PASSWORD";
			$audit->save();

		
		if($newpassword !=$cnewpassword){
			$session->setFlash('error', 'Password do not match');
		}
		else{
			$options = [
				'cost' => 12,
			];
			$encrypetedpass = password_hash($newpassword, PASSWORD_BCRYPT, $options);
			$admin->password = $encrypetedpass;
			$admin->update([$admin]);
			$session->setFlash('success', 'Password  changed successfully please login with new password');
			Configuration::redirection('admin/logout');
		}
    }

	public function getAdminProfile(){
        $admin_id =$_SESSION['admin_id'];
        $administrator= Administrator::find($admin_id);
        return $this->view("administrator/profile","admindash",'footer',[
            'admin' => $administrator,]);
    }
	public function audittray(){
		$audits = Audit::orderByDesc('created_at')->get();
		$this->view("administrator/Audit/audit", "admindash", 'footer', ['audits'=>$audits]);
    
	}
	public function systemlogs(){
		$logs = Systemlogs::orderByDesc('created_at')->get();
		$this->view("administrator/Audit/systemlogs", "admindash", 'footer', ['logs'=>$logs]);
    
	}



    //get all customer

	public function getallcustomers()
	{
		$customers = Customer::orderByDesc('created_at')->get();
		$this->view("administrator/customer/index", "admindash", 'footer', ['customers'=>$customers]);
	}

	public function getcustomer($id)
	{
		$customer = Customer::find($id);
		$creditcards = Creditcard::where('customer_Id',$customer->id)->get();
		$accounts = Account::where('customer_Id',$customer->id)->get();
		$this->view("administrator/customer/customerprofile", "admindash", 'footer', [
			'customer'=>$customer,
			'creditcards'=>$creditcards,
			'accounts'=>$accounts,
		]);
	}


	public function getcustomersAccounts()
	{
		$accounts = Account::orderByDesc('created_at')->get();
		$this->view("administrator/accounts/index", "admindash", 'footer', [
			'accounts'=>$accounts,
		]);
	}

	public function getAccountCreditcard($id)
	{
		$account = Account::find($id);
		$creditcard = Creditcard::where('account_Id',$account->id)->get();
		$this->view("administrator/accounts/credit", "admindash", 'footer', [
			'account'=>$account,
			'creditcard'=>$creditcard,
		]);
	}

	public function getCreditcards()
	{
		$creditcards = Creditcard::orderByDesc('created_at')->get();
		$this->view("administrator/accounts/creditcards", "admindash", 'footer', [
			'creditcards'=>$creditcards,
		]);
	}

	public function getCreditcardshistory($id)
	{
		$creditcard = Creditcard::find($id);
		$transactions = Transaction::where('creditcard_Id',$creditcard->id)->orderByDesc('created_at')->get();
		$this->view("administrator/transactions/index", "admindash", 'footer', [
			'creditcard'=>$creditcard,
			'transactions'=>$transactions,
		]);
	}


	public function getCustomerTransactionhistory($id)
	{
		$customer = Customer::find($id);
		$transactions = Transaction::where('customer_Id',$customer->id)->orderByDesc('created_at')->get();
		$this->view("administrator/transactions/customertransactionhistory", "admindash", 'footer', [
			'customer'=>$customer,
			'transactions'=>$transactions,
		]);
	}

public function getallTransactionhistory()
	{
		$transactions = Transaction::orderByDesc('created_at')->get();
		$this->view("administrator/transactions/transaction", "admindash", 'footer', [
			'transactions'=>$transactions,
		]);
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
}
