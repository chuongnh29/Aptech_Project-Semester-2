<?php

namespace App\Http\Controllers;

use DB;
use App\Products;
use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getIndex(){

    	return view('pages.admin');
    }

    public function getProductManager(Request $request){
    	$type = (int) $request->input('searchType','0');
    	$url = $request->fullUrl();
    	// $productType = ProductType::groupBy('name')->get();
    	// $paginateURL = $request;
    	$textSearch = $request->input('textSearch');
    	$products = null;
    	switch ($type) {
    		case 1:
    			$products = DB::table('products')
    			->join('type_products','products.id_type','=','type_products.id')
    			->select('products.*','type_products.name as name_type')
    			->where('products.name','like','%'.$textSearch.'%')
    			->paginate(5);
    			break;
    		case 2:
    			$products = DB::table('products')
    			->join('type_products','products.id_type','=','type_products.id')
    			->select('products.*','type_products.name as name_type')
    			->where('type_products.name','like','%'.$textSearch.'%')
    			->paginate(5);
    			break;
			case 3:
				# code...
				break;
    		default:
    			# code...
    			break;
    	}
    	if($products == null){
    		$products = Products::paginate(5);
    	}
    	$products->withPath($url);
    	return view('pages.adminProductManager',[
    		'products'=>$products, 
    		'type'=>$type,
    		// 'productType'=>$productType
    	]);
    }

    public function getAddProduct(){
    	return view('pages.addProduct');
    }
}
