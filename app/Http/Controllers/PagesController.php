<?php

namespace App\Http\Controllers;

use App\Products;
use App\ProductType;
use App\Slide;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function getIndex()
    {
        $slide = Slide::all();
        $loai_sp_nam = ProductType::where('type', 0)->get();
        $new_product = Products::where('new', 1)->paginate(8);
        $featured_product = Products::where('new', 1)->paginate(4);
        return view('pages.home', compact('slide', 'loai_sp_nam', 'new_product', 'featured_product'));
    }

    public function getMenWatch()
    {
        $sp_nam = Products::all();
        $loai_sp_nam = ProductType::where('type', 0)->get();
        return view('pages.men_watch', compact('sp_nam', 'loai_sp_nam'));
    }

    public function getWomenWatch()
    {
        $sp_nu = Products::all();
        $loai_sp_nu = ProductType::where('type', 1)->get();
        return view('pages.women_watch', compact('sp_nu', 'loai_sp_nu'));
    }

    public function getProductType($type)
    {
        $sp_theoloai = Products::where('id_type', $type)->get();
//        $loai_sp_nam = ProductType::where('type', 0)->get();
        return view('pages.product_type', compact('sp_theoloai'));
    }

    public function getProductDetail(Request $req)
    {
        $sanpham = Products::where('id', $req->id)->first();
        return view('pages.product_detail', compact('sanpham'));
    }

    public function getAbout()
    {
        return view('pages.about');
    }

    public function getContact()
    {
        return view('pages.contact');
    }

    public function getLogin()
    {
        return view('pages.login');
    }

    public function getRegister()
    {
        return view('pages.register');
    }

    public function getCheckOut()
    {
        return view('pages.shopping_cart');
    }
}