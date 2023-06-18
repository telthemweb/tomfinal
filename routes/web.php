<?php

use Ti\Cardfraudsm\Routers;
use Ti\Cardfraudsm\App\Controllers\DetectController;
use Ti\Cardfraudsm\App\Controllers\ProductController;
use Ti\Cardfraudsm\App\Controllers\WelcomeController;
use Ti\Cardfraudsm\App\Controllers\CategoryController;
use Ti\Cardfraudsm\App\Controllers\CustomerController;
use Ti\Cardfraudsm\App\Controllers\Admin\RoleController;
use Ti\Cardfraudsm\App\Controllers\AdministratorController;
use Ti\Cardfraudsm\App\Controllers\Admin\AnalysisController;
use Ti\Cardfraudsm\App\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
|            This file is part of the Telthemweb package.
|               
|--------------------------------------------------------------------------
|
|     For the full copyright and license information, please view the LICENSE
|       file that was distributed with this source code.
|
*/
$router = new Routers();
$router->get('/', WelcomeController::class, 'index', '');
$router->get('/login', WelcomeController::class, 'login', '');
$router->get('/register', WelcomeController::class, 'register', '');


$router->get('/admin/login', AdministratorController::class, 'index','');
$router->post('/admin/authenticate', AdministratorController::class, 'loginAdmin','');
$router->get('/dashboard', DashboardController::class, 'index','');
$router->get('/changepassword/userid/{id}', DashboardController::class, 'changepassword','');
$router->post('/changepassword/c/{id}', DashboardController::class, 'changepasswordpost','');

$router->get('/profile', DashboardController::class, 'getAdminProfile','');


$router->get('/users', DashboardController::class, 'users','');
$router->post('/user/register', DashboardController::class, 'store','');
$router->get('/user/v/{id}', DashboardController::class, 'showuser','');
$router->post('/user/u/{id}', DashboardController::class, 'updateuser','');
$router->get('/user/d/{id}', DashboardController::class, 'destroyuser','');



/*
|--------------------------------------------------------------------------
|                        ALL roles          
|--------------------------------------------------------------------------
|
|
*/
$router->get('/roles', RoleController::class, 'index','');
$router->post('/create', RoleController::class, 'store','');
$router->get('/role/rid/{id}', RoleController::class, 'show','');
$router->post('/role/update/{id}', RoleController::class, 'update','');
$router->get('/role/delete/{id}', RoleController::class, 'destroy','');



/*
|--------------------------------------------------------------------------
|                        ADMIN CATEGORY
|--------------------------------------------------------------------------
|
|
*/

$router->get('/admin/categories', CategoryController::class, 'index','');
$router->post('/admin/category/register', CategoryController::class, 'store','');
$router->get('/admin/category/update/{id}', CategoryController::class, 'show','');
$router->post('/admin/category/u/{id}', CategoryController::class, 'edit','');
$router->post('/admin/category/delete/{id}', CategoryController::class, 'destroy','');
$router->get('/admin/category/products/{id}', ProductController::class, 'getcategoryproducts','');

/*
|--------------------------------------------------------------------------
|                        ADMIN PRODUCTS
|--------------------------------------------------------------------------
|
|
*/
$router->get('/admin/products', ProductController::class, 'index','');
$router->post('/addproduct', ProductController::class, 'addproduct','');
$router->get('/admin/product/{id}', ProductController::class, 'show','');
$router->get('/admin/product/delete/{id}', ProductController::class, 'destroy','');
$router->post('/admin/product/update/{id}', ProductController::class, 'update','');







$router->get('/admin/customers', DashboardController::class, 'getallcustomers','');
$router->get('/admin/customer/bio/{id}', DashboardController::class, 'getcustomer','');


$router->get('/admin/bank/accounts', DashboardController::class, 'getcustomersAccounts','');
$router->get('/admin/bank/accounts/{id}', DashboardController::class, 'getAccountCreditcard','');
$router->get('/admin/bank/credits', DashboardController::class, 'getCreditcards','');
$router->get('/admin/bankcard/transaction-history/{id}', DashboardController::class, 'getCreditcardshistory','');
$router->get('/admin/customer/transaction-history/{id}', DashboardController::class, 'getCustomerTransactionhistory','');
$router->get('/admin/transactions', DashboardController::class, 'getallTransactionhistory','');

/*
|--------------------------------------------------------------------------
|                        ADMIN ANALYSIS
|--------------------------------------------------------------------------
|
|
*/
// $router->get('/admin/analysis', AnalysisController::class, 'AnalyiseTransaction','');

$router->get('/admin/analysis', AnalysisController::class, 'exportTransactioncsv','');

/*
|--------------------------------------------------------------------------
|                       CUSTOMERS
|--------------------------------------------------------------------------
|
|
*/

$router->post('/customer/authenticate', WelcomeController::class, 'authenticate','');
$router->post('/customer/register', WelcomeController::class, 'registeruser','');
$router->get('/my-account', CustomerController::class, 'getCustomerProfile','');


$router->get('/home', CustomerController::class, 'index','');
$router->get('/api/load', CustomerController::class, 'loadData','');
$router->get('/products', CustomerController::class, 'getproducts','');
$router->get('/product/{id}', CustomerController::class, 'fetchallproductbyid','');

$router->post('/cart', CustomerController::class, 'AddtoCart','');
$router->get('/viewcart', CustomerController::class, 'viewCart','');
$router->post('/order', CustomerController::class, 'placeOrder','');
$router->get('/view/order', CustomerController::class, 'getOrder','');
$router->get('/order/items/{id}', CustomerController::class, 'getOrderbyitems','');
$router->get('/order/{id}', CustomerController::class, 'getOrderbybyId','');
$router->get('/order/getpaymentform/{id}', CustomerController::class, 'getOrderbybyId','');
$router->post('/order/payment', CustomerController::class, 'Makepayment','');
$router->get('/payments', CustomerController::class, 'getpayments','');
$router->post('/products/search', CustomerController::class, 'searchproduct','');
$router->post('/addaccount', CustomerController::class, 'addCustomerAccountNumber','');
$router->get('/viewacreditcard/{accountid}', CustomerController::class, 'getAccountCreditcard','');
$router->get('/viewaccountcard/{accountid}', CustomerController::class, 'viewaccountcard','');
$router->post('/addcreditcard', CustomerController::class, 'addCustomerCredit','');
$router->get('/detectfraud', DetectController::class, 'DetectFraud','');
$router->get('/creditcard/h/{accountid}', CustomerController::class, 'getCreditcardshistory','');
$router->get('/transactions', CustomerController::class, 'getCustomerTransactionhistory','');


/*
|--------------------------------------------------------------------------
|                        AUDIT TRAY
|--------------------------------------------------------------------------
|
|
*/
$router->get('/audits', DashboardController::class, 'audittray','');
$router->get('/systemlogs', DashboardController::class, 'systemlogs','');







/*
|--------------------------------------------------------------------------
|                        ALL LOGOUTS            
|--------------------------------------------------------------------------
|
|
*/
$router->get('/admin/logout', DashboardController::class, 'logout','');
$router->get('/logout',CustomerController::class, 'logout','');



















































$router->run();
