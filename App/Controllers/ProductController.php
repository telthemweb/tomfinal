<?php

namespace Ti\Cardfraudsm\App\Controllers;


use Ti\Cardfraudsm\Request;
use Ti\Cardfraudsm\Configuration;
use Ti\Cardfraudsm\SessionManager;
use Ti\Cardfraudsm\App\Models\Audit;
use Ti\Cardfraudsm\App\Models\Product;
use Ti\Cardfraudsm\App\Models\Category;
use Ti\Cardfraudsm\Middleware\AdministratorMiddleware;

class ProductController extends Controller{
    public function __construct(){
		(new AdministratorMiddleware())->redirectIfNotAuthenticated();
	}
/**
	 * @return mixed
	 */
	public function index() {
		$products =  Product::orderByDesc('created_at')->get();
		$categories =  Category::orderByDesc('created_at')->get();
		$this->view("administrator/products/index", "admindash", 'footer', [
			'products'=>$products,
			'categories'=>$categories
		]);
	}


	//getcategoryproducts

	public function getcategoryproducts($id) {
		$category =  Category::find($id);
		$products =  Product::where('category_Id',$category->id)->orderByDesc('created_at')->get();
		$this->view("administrator/products/filterprodbycategory", "admindash", 'footer', [
			'products'=>$products,
			'category'=>$category
		]);
	}


	public function addproduct()
	{
		try{
			$request = new Request;
			$session = new SessionManager();
			$product = new Product();

			if(!preg_match("/^[a-zA-Z]+$/",$request->input('name'))){
				$session->setFlash('error', 'Product name contain non characters please try again');
				$this->back();
			}

			if(!is_numeric($request->input('quantity'))){
				$session->setFlash('error', 'Quantity is not a numeric');
				$this->back();
			}
	
			$product_img = $request->fileinput('product_img'); 
			$imgext = pathinfo($product_img, PATHINFO_EXTENSION);
			$arryproduct_img = strtotime(date('YmdHis'));
			$timeproduct_img = base64_encode($arryproduct_img.random_int(1000,9999)).".".$imgext;
			$picproduct_img= "uploads/products/".$timeproduct_img;
			$product->category_Id = $request->input('category_Id');
			$product->name = $request->input('name');
			$product->description = $request->input('description');
			$product->price = $request->input('price');
			$product->quantity = $request->input('quantity');
			$product->expiry_date = $request->input('expiry_date');
			$product->weight = $request->input('weight');
			$product->product_img = $picproduct_img;
			$product->save();
			$session->setFlash('success', 'Product!!');
			move_uploaded_file($request->filetempinput('product_img'), $picproduct_img);
			$this->back();
			}catch(\Exception $ex){
				$session->setFlash('error', $ex->getMessage());
				$this->back();
			}

		}
		public function show($id) {
			$product =  Product::find($id);
			$categories =  Category::orderByDesc('created_at')->get();
			$this->view("administrator/products/edit", "admindash", 'footer', [
				'product'=>$product,
				'categories'=>$categories
			]);
		}


		public function update($id) {
			$request = new Request;
			$session = new SessionManager();
			$product = Product::findOrFail($id);
			$audit = new Audit();
			$audit->administrator_id=$_SESSION['admin_id'];
			$audit->entity='Ti\Cardfraudsm\App\Models\Product';
			$audit->oldvalue=$product->name;
			$audit->newvalue=$request->input('name');
			$audit->action="UPDATE_PRODUCT";
			$audit->save();
	
	
			$product->category_Id = $request->input('category_Id')==null?$product->category_Id: $request->input('category_Id');
			$product->name = $request->input('name');
			$product->description = $request->input('description');
			$product->price = $request->input('price');
			$product->quantity = $request->input('quantity');
			$product->expiry_date = $request->input('expiry_date');
			$product->weight = $request->input('weight');
			$product->update([$product]);
			$session->setFlash('success', 'Product updated successfully!!');
			Configuration::redirection('admin/products');
	
			
		}


		public function destroy($id) {
			$session = new SessionManager();
			$cat = Product::find($id);
				$audit = new Audit();
				$audit->administrator_id=$_SESSION['admin_id'];
				$audit->entity='Ti\Cardfraudsm\App\Models\Product';
				$audit->oldvalue=$cat->name;
				$audit->newvalue='No new value';
				$audit->action="DELETE_PRODUCT";
				$audit->save();
				$cat->delete();
				$session->setFlash('success', 'Product  deleted successfully');
				Configuration::redirection('admin/products');
		}

}