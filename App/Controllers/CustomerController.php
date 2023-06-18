<?php

namespace Ti\Cardfraudsm\App\Controllers;

use Phpml\Classification\Ensemble\RandomForest;
use Ti\Cardfraudsm\App\Models\Alert;
use Ti\Cardfraudsm\Request;
use Ti\Cardfraudsm\API\Geolation;
use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;
use Ti\Cardfraudsm\App\Models\Cart;
use Ti\Cardfraudsm\App\Models\Order;
use Ti\Cardfraudsm\App\Models\Account;
use Ti\Cardfraudsm\App\Models\Payment;
use Ti\Cardfraudsm\App\Models\Product;
use Ti\Cardfraudsm\App\Models\Category;
use Ti\Cardfraudsm\App\Models\Customer;
use Ti\Cardfraudsm\App\Models\Orderitem;
use Ti\Cardfraudsm\App\Models\Creditcard;
use Ti\Cardfraudsm\App\Models\Transaction;
use Ti\Cardfraudsm\Middleware\CustomerMiddleware;

// use DB;
class CustomerController extends Controller
{

    public function __construct()
    {
        (new CustomerMiddleware())->redirectIfNotAuthenticated();
    }

    /**
     * @return mixed
     */
    public function index()
    {
        $alertscount = Alert::where('customer_Id', $_SESSION['customer_id'])->count();
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $countAccount = Account::wherecustomer_id($_SESSION['customer_id'])->sum('balance');
        $countCreditcard = Creditcard::wherecustomer_id($_SESSION['customer_id'])->get();
        $lastTransaction = Transaction::wherecustomer_id($_SESSION['customer_id'])->latest()->take(1)->first();

        $this->view("customer/index", "customer", 'footer', [
            'countAccount' => $countAccount,
            'countcart' => $countcart,
            'countCreditcard' => $countCreditcard,
            'lastTransaction' => $lastTransaction,
            'alertscount' => $alertscount
        ]);
    }

    public function loadData()
    {

        $transactions = Transaction::wherecustomer_id($_SESSION['customer_id'])->orderBy('created_at', 'asc')->get();
        echo json_encode($transactions);
    }

    public function getproducts()
    {
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $products =  Product::orderByDesc('created_at')->get();
        $categories =  Category::orderByDesc('created_at')->get();
        $this->view("customer/custoproductsdash", "customer", 'footer', [
            'products' => $products,
            'countcart' => $countcart,
            'categories' => $categories
        ]);
    }

    public function fetchallproductbyid($id)
    {
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $product =  Product::find($id);
        $this->view("customer/productdetail", "customer", 'footer', ['countcart' => $countcart, 'product' => $product]);
    }

    public function AddtoCart()
    {
        $request = new Request;
        $session = new SessionManager();
        $cart = new Cart();

        $product_Id = $request->input('product_Id');
        $customer_Id = $_SESSION['customer_id'];
        $quantity = $request->input('quantity');



        $checkcart = Cart::where('customer_Id', $customer_Id)->where('product_Id', $product_Id)->first();
        if ($checkcart == null) {
            $cart->product_Id = $product_Id;
            $cart->customer_Id = $customer_Id;
            $cart->quantity = $quantity;
            $cart->save();
            $session->setFlash('success', 'Product added');
            $_SESSION['customer_id'];
            Configuration::redirection('products');
        } else {
            $session->setFlash('error', 'This product is already added in the cart!!');
            $this->back();
        }
    }


    public function viewCart()
    {

        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");

        $carts =  Cart::where('customer_Id', $_SESSION['customer_id'])->get();
        $products =  Product::orderByDesc('created_at')->get();
        $totalquntity =  Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $total = 0;
        foreach ($carts as $cart) {
            $total = $total + $cart->product->price * $cart->quantity;
        }


        $this->view("customer/viewcart", "customer", 'footer', [
            'countcart' => $countcart,
            'carts' => $carts,
            'products' => $products,
            'carttotlamout' => $total,
            'totalquntity' => $totalquntity
        ]);
    }

    public function placeOrder()
    {
        $request = new Request;
        $session = new SessionManager();

        $id = Order::create([
            'customer_Id' => $_SESSION['customer_id'],
            'quantity' => $request->input('totalquntity'),
            'total_amt' => $request->input('total_amt'),
            'ispaid' => 0,
            'ordernumber' => 'Trk-' . rand(00000000, 99999999),
            'status' => "Pending",
        ])->id;


        for ($i = 0; $i < count($request->input('productName')); $i++) {
            Orderitem::create([
                'order_Id' => $id,
                'product_Id' => $request->input('product_Id')[$i],
                'quantity' => $request->input('quantity')[$i],
                'price' => $request->input('price')[$i],
                'total_amt' => $request->input('quantity')[$i] * $request->input('price')[$i]
            ]);
            $product = Product::find($request->input('product_Id')[$i]);
            $product->quantity -= $request->input('quantity')[$i];
            $product->update([$product]);
        }

        $session->setFlash('success', 'Order has been placed!!');
        Configuration::redirection('home');

        $carts = Cart::where('customer_Id', $_SESSION['customer_id'])->get();
        foreach ($carts as $cart) {
            $cart->delete();
        }
    }

    public function getOrder()
    {
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $orders =  Order::where('customer_Id', $_SESSION['customer_id'])->orderByDesc('created_at')->get();
        $this->view("customer/vieworder", "customer", 'footer', [
            'orders' => $orders,
            'countcart' => $countcart,
        ]);
    }

    public function getOrderbyitems($id)
    {
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $order =  Order::find($id);
        $orderitems =  Orderitem::where('order_Id', $id)->get();
        $this->view("customer/vieworderitems", "customer", 'footer', [
            'orderitems' => $orderitems,
            'order' => $order,
            'countcart' => $countcart,
        ]);
    }

    public function getpayments()
    {
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $payments =  Payment::where('customer_Id', $_SESSION['customer_id'])->get();
        $this->view("customer/payments", "customer", 'footer', ['countcart' => $countcart, 'payments' => $payments]);
    }

    //credit card payment

    public function Makepayment()
    {
        $request = new Request;
        $session = new SessionManager();
        $payment = new Payment();
        $alert = new Alert();
        $transaction =  new Transaction;

        $geolation = new Geolation;
        $ip_address   = file_get_contents('https://api.ipify.org');
        $latitudedata = $geolation->getCurrentClientLocation($ip_address);

        // $data = array();
        // $erro_da=array();
        $paymentmode = $request->input('card_type');
        $order_Id = $request->input('order_Id');
        $customer_Id = $request->input('customer_Id');
        $total_amt = $request->input('total_amt');
        $cardnumber = $request->input('cardnumber');
        $ccheckbalance  =  Account::where('customer_Id', $customer_Id)->first();
        $creditcard  =  Creditcard::where('ac_number', $cardnumber)->first();

        if ($total_amt > $ccheckbalance->balance && $total_amt <= $ccheckbalance->balance_limit) {
            $session->setFlash('error', "You have insufficient amount in your account");
            $this->back();
            
        } else if ($total_amt > $ccheckbalance->balance && $total_amt > $ccheckbalance->balance_limit) {
            $alert->creditcard_Id = $creditcard->id;
            $alert->customer_Id =   $customer_Id;
            $alert->amount =        $total_amt;
            $alert->save();
            $transaction->customer_Id = $customer_Id;
            $transaction->account_Id = $creditcard->account_Id;
            $transaction->creditcard_Id = $creditcard->id;
            $transaction->order_Id = $order_Id;
            $transaction->amount = $total_amt;
            $transaction->status = 1;
            $transaction->country = $latitudedata['country_name'];
            $transaction->city    = $latitudedata['city'];
            $transaction->ipaddress = $latitudedata["ip"];
            $transaction->timetransaction = date('H:i:s');
            $transaction->save();
            
            $session->setFlash('error', "Fraud Detected!!");
            $this->back();
        } else {
            $payment->paymentmode = $paymentmode;
            $payment->order_Id = $order_Id;
            $payment->customer_Id = $customer_Id;
            $payment->amount_paid = $total_amt;
            $payment->payment_referencecode = $cardnumber;
            $payment->save();
            $session->setFlash('success', "Payment added successfully");
            $this->back();
            


            $transaction->customer_Id = $customer_Id;
            $transaction->account_Id = $creditcard->account_Id;
            $transaction->creditcard_Id = $creditcard->id;
            $transaction->order_Id = $order_Id;
            $transaction->amount = $total_amt;
            $transaction->status = 1;
            $transaction->country = $latitudedata['country_name'];
            $transaction->city    = $latitudedata['city'];
            $transaction->ipaddress = $latitudedata["ip"];
            $transaction->timetransaction = date('H:i:s');
            $transaction->save();

            $account =  Account::find($creditcard->account_Id);
            $account->balance -= $total_amt;
            $account->update([$account]);

            $order =  Order::find($order_Id);
            $order->ispaid = 1;
            $order->update([$order]);
        }



        // $data['response'] = true;
        // $data['success_message'] = "Payment added successfully";

        // $data['error_message']=$erro_da;
        // echo json_encode($data);

        //train





    }

    public function getOrderbybyId($id)
    {
        $order = Order::find($id);
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $this->view("customer/getpaymentform", "customer", 'footer', ['countcart' => $countcart, 'order' => $order]);
    }


    //add your account

    public function addCustomerAccountNumber()
    {
        $request = new Request;
        $account = new Account;
        $data = array();
        $customer_id = $_SESSION['customer_id'];
        $bank = strtoupper($request->input('bank'));
        $accountnumber = $request->input('accountnumber');
        $balance = $request->input('balance');
        $branchname = $request->input('branchname');
        $location = $request->input('location');
        $country = $request->input('country');

        $check_accountIsAvailable = Account::wherecustomer_id($customer_id)->where('bank', $bank)->where('accountnumber', $accountnumber)->first();
        if ($check_accountIsAvailable != null) {
            $data['response'] = false;
            $data['error_message'] = "Account added already";
            exit();
        }
        $account->customer_id = $customer_id;
        $account->bank = $bank;
        $account->accountnumber = $accountnumber;
        $account->balance = $balance;
        $account->balance_limit = $balance * 0.75;
        $account->branchname = $branchname;
        $account->location = $location;
        $account->country = $country;
        $account->save();
        $data['response'] = true;
        $data['success_message'] = "Account added successfully";
        echo json_encode($data);
    }
    public function getAccountCreditcard($id)
    {
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $account = Account::find($id);
        $creditcard = Creditcard::where('account_Id', $account->id)->get();
        $this->view("customer/credit", "customer", 'footer', [
            'account' => $account,
            'creditcard' => $creditcard,
            'countcart' => $countcart
        ]);
    }

    public function getCreditcardshistory($id)
    {
        $creditcard = Creditcard::find($id);
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $transactions = Transaction::where('creditcard_Id', $creditcard->id)->orderByDesc('created_at')->get();
        $this->view("customer/transacth", "customer", 'footer', [
            'creditcard' => $creditcard,
            'transactions' => $transactions,
            'countcart' => $countcart
        ]);
    }
    public function getCustomerTransactionhistory()
    {
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $transactions = Transaction::where('customer_Id', $_SESSION['customer_id'])->orderByDesc('created_at')->get();
        $this->view("customer/transactionhistory", "customer", 'footer', [
            'countcart' => $countcart,
            'transactions' => $transactions,
        ]);
    }
    public function viewaccountcard($accountid)
    {
        $creditcard = Creditcard::find($accountid);
        //$creditcard = Creditcard::where('account_Id', $account->id)->first();
        $data = array();
        $data["accountid"] = $creditcard->account_Id;
        $data["accountnumber"] = $creditcard->account->accountnumber;
        $data["cardtype"] = $creditcard->name;
        $data["cardnumber"] = $creditcard->ac_number;
        $data["enddate"] = $creditcard->expiry_date;
        $data["cardholder"] = $creditcard->customer->name . ' ' . $creditcard->customer->surname;
        $data["bank"] = $creditcard->account->bank;
        $data["ccv"] = $creditcard->cvv;
        echo json_encode($data);
    }
    //add your account

    public function addCustomerCredit()
    {
        $request = new Request;
        $creditcard = new Creditcard;
        $account_Id = $request->input('account_Id');
        $data = array();
        $customer_id = $_SESSION['customer_id'];
        $name = strtoupper($request->input('name'));
        $ac_number = $request->input('ac_number');
        $cvv = $request->input('cvv');
        $expiry_date = $request->input('expiry_date');
        $pin = $request->input('pin');
        $check_accountIsAvailable = Creditcard::wherecustomer_id($customer_id)->where('account_Id', $account_Id)->first();
        if ($check_accountIsAvailable != null) {
            $data['response'] = false;
            $data['error_message'] = "Credit card added already";
            exit();
        }
        $creditcard->account_Id = $account_Id;
        $creditcard->customer_id = $customer_id;
        $creditcard->name = $name;
        $creditcard->ac_number = $ac_number;
        $creditcard->cvv = $cvv;
        $creditcard->expiry_date = $expiry_date;
        $creditcard->pin = $pin;
        $creditcard->save();
        $data['response'] = true;
        $data['success_message'] = "Credit card added successfully";
        echo json_encode($data);
    }

    public function changepassword($id)
    {
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        $this->view("customer/index", "customer", 'footer', ['countcart' => $countcart]);
    }


    public function getCustomerProfile()
    {
        $customer_id = $_SESSION['customer_id'];
        $customer = Customer::find($customer_id);
        $creditcards = Creditcard::where('customer_Id', $customer->id)->get();
        $accounts = Account::where('customer_Id', $customer->id)->get();
        $countcart = Cart::where('customer_Id', $_SESSION['customer_id'])->sum("quantity");
        return $this->view("customer/profile", "customer", 'footer', [
            'customer' => $customer,
            'countcart' => $countcart,
            'creditcards' => $creditcards,
            'accounts' => $accounts,
        ]);
    }








    public function logout()
    {
        $session = new SessionManager();
        unset($_SESSION['customer_id']);
        unset($_SESSION['name']);
        unset($_SESSION['surname']);
        unset($_SESSION['email']);
        unset($_SESSION['phone']);
        unset($_SESSION['district']);
        unset($_SESSION['gender']);
        unset($_SESSION['country']);
        unset($_SESSION['province']);
        unset($_SESSION['city']);
        unset($_SESSION['address']);

        session_destroy();
        Configuration::redirection('login');
    }
}
