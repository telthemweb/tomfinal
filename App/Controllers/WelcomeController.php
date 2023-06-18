<?php

namespace Ti\Cardfraudsm\App\Controllers;

use Ti\Cardfraudsm\Middleware\GuestMiddleware;
use Ti\Cardfraudsm\Request;
use Ti\Cardfraudsm\SessionManager;
use Ti\Cardfraudsm\App\Models\Customer;
use Ti\Cardfraudsm\Configuration;

class WelcomeController extends Controller
{
	public function __construct()
	{
		(new GuestMiddleware())->AuthenticatedUserIdData();
	}
	public function index()
	{
		$this->view("welcome", 'app', 'footer', []);
	}

	public function login()
	{
		$this->view("login", 'app', 'footer', []);
	}

	public function register()
	{
		$this->view("register", 'app', 'footer', []);
	}

	public function authenticate()
	{
		$request = new Request;
		$session = new SessionManager();
		$email = $request->input('email');
		$password = $request->input('password');
		
		$customer = Customer::whereemail($email)->first();
		if ($customer != null) {
			$veryfypass = password_verify($password, $customer->password);
			if ($veryfypass == true) {
				$_SESSION['customer_id'] = $customer->id;
				$_SESSION['name'] = $customer->name;
				$_SESSION['surname'] = $customer->surname;
				$_SESSION['email'] = $customer->email;
				$_SESSION['phone'] = $customer->phone;
				$_SESSION['username'] = $customer->username;
				$_SESSION['gender'] = $customer->gender;
				$_SESSION['city'] = $customer->city;
				$_SESSION['country'] = $customer->country;
				$_SESSION['province'] = $customer->province;
				$_SESSION['district'] = $customer->district;
				$_SESSION['address'] = $customer->address;
				Configuration::redirection('home');
				$session->setFlash('success', 'Welcome ' . $customer->name . ' ' . $customer->surname);
			} else {

				Configuration::redirection('login');
				$session->setFlash('error', 'Incorrect password please try again !!');
				exit();
			}
		} else {
			Configuration::redirection('login');
			$session->setFlash('error', 'Incorrect credentials please contact Administrator for account Activation !!');
			exit();
		}
	}

	public function registeruser()
	{
		$request = new Request;
		$session = new SessionManager();

		$customer = new Customer();
		$name = $request->input('name');
		$surname = $request->input('surname');
		$city = $request->input('city');
		$address = $request->input('address');
		$gender = $request->input('gender');
		$province = $request->input('province');
		$district = $request->input('district');
		$phone = $request->input('phonenumber');
		$email = $request->input('email');
		if(!preg_match("/^[a-zA-Z]+$/",$name)){
			$session->setFlash('error', 'Name contain non characters please try again');
			$this->back();
		}
		else if(!preg_match("/^[a-zA-Z]+$/",$surname)){
			$session->setFlash('error', 'Surname contain non characters please try again');
			$this->back();
		}
		else if(!preg_match("/^[a-zA-Z]+$/",$surname)){
			$session->setFlash('error', 'Surname contain non characters please try again');
			$this->back();
		}

		else if(!preg_match("/^[a-zA-Z]+$/",$district)){
			$session->setFlash('error', 'District contain non characters please try again');
			$this->back();
		}

		else if(!preg_match("/^[a-zA-Z]+$/",$city)){
			$session->setFlash('error', 'City contain non characters please try again');
			$this->back();
		}
		
		
		$options = [
			'cost' => 12,
		];
		$password = password_hash($request->input('password'), PASSWORD_BCRYPT, $options);
		$nameCheck =  Customer::where('name', $name)->count();
		$emailCheck =  Customer::where('email', $email)->count();
		$phonenumberCheck =  Customer::where('phone', $phone)->count();
		if ($nameCheck > 0) {
			$session->setFlash('error', 'Name already exist!!');
			$this->back();
		} else if ($emailCheck > 0) {
			$session->setFlash('error', 'Email already exist. Please find another email!!');
			$this->back();
		} else if ($phonenumberCheck > 0) {
			$session->setFlash('error', 'Phone number already exist. Please find another phone number!!');
			$this->back();
		}

		$encrypetedpass = $password;


		$customer->name = $name;
		$customer->surname = $surname;
		$customer->city = $city;
		$customer->address = $address;
		$customer->province = $province;
		$customer->district = $district;
		$customer->gender = $gender;
		$customer->phone = $phone;
		$customer->password = $encrypetedpass;
		$customer->email = $email;
		$customer->save();
		$session->setFlash('success', 'Account created successfully!!');
		Configuration::redirection('login');
	}
}
