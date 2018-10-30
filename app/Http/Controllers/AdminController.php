<?php

namespace App\Http\Controllers;

use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getIndex(){
    	return view('pages.admin');
    }

    public function getProductManager(){
    	$products = Products::paginate(10);
    	return view('pages.adminProductManager',['products'=>$products]);
    }

    public function getAddProduct(){
    	return view('pages.addProduct');
    }
}
