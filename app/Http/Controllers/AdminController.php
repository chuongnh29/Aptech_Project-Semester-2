<?php

namespace App\Http\Controllers;

use DB;
use App\LoaiDay;
use App\LoaiVo;
use App\ProductType;
use App\TrangThaiSanPham;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function getIndex(){

    	return view('pages.admin');
    }

    public function getProductManager(Request $request){
    	$type = $request->input('type','0');
    	$url = $request->fullUrl();
    	$loaiDay = LoaiDay::all();
    	$loaiVo = LoaiVo::all();
    	$trangThaiSanPham = TrangThaiSanPham::all();
    	$thuongHieu = DB::table('product_types')->groupBy('name_id')->get();
    	$gioiTinh = DB::table('product_types')->groupBy('type')->get();
    	// $paginateURL = $request;
    	$products = null;

    	switch ($type){
            case 'timKiem':
                $products = $this->timKiemSanPham($request);
//                print_r($products);
//                return;
                break;
            default:
                break;
        }

    	if($products == null){
            $products = DB::table('products')
                ->leftJoin('product_types','products.type_id','=','product_types.id')
                ->leftJoin('strap_types','products.strap_id','=','strap_types.id')
                ->leftJoin('case_material','products.case_material_id','=','case_material.id')
                ->leftJoin('product_status','products.product_status_id','=','product_status.id')
                ->select('products.id','products.name', 'product_types.name as name_type',
                    'products.image', 'products.unit_price','products.promotion_price','products.description','product_status.product_status_name as product_status',
                    'strap_types.strap_name as loai_day', 'case_material.material_name as loai_vo', 'product_types.type as gender')->paginate(5);
    	}
    	$products->withPath($url);

    	return view('pages.adminProductManager',[
    		'products'=>$products,
    		'loaiVo' => $loaiVo,
            'loaiDay' => $loaiDay,
            'trangThaiSP' => $trangThaiSanPham,
            'thuongHieu' => $thuongHieu,
            'gioiTinh' => $gioiTinh
    	]);
    }

    public function getAddProduct(){
        $loaiDay = LoaiDay::all();
        $loaiVo = LoaiVo::all();
        $trangThaiSanPham = TrangThaiSanPham::all();
        $thuongHieu = DB::table('product_types')->groupBy('name_id')->get();
        $gioiTinh = DB::table('product_types')->groupBy('type')->get();
    	return view('pages.addProduct',[
    	    'loaiDay'=>$loaiDay,
            'loaiVo'=>$loaiVo,
            'trangThaiSP'=>$trangThaiSanPham,
            'thuongHieu'=>$thuongHieu,
            'gioiTinh'=>$gioiTinh
        ]);
    }

    public function timKiemSanPham($request){
        $dieuKienTim = [];
        $tenCanTim = $request->input('textSearch');
        if($tenCanTim != ''){
            $dieuKienTim[] = ['products.name','like','%'.$tenCanTim.'%'];
        }
        $thuongHieu = $request->input('thuongHieu');
        if($thuongHieu != 'none'){
            $dieuKienTim[] = ['product_types.id','=', $thuongHieu];
        }
        $gioiTinh = $request->input('gioiTinh', null);
        if($gioiTinh != 'none'){
            $dieuKienTim[] = ['product_types.type','=', $gioiTinh];
        }
        $loaiDay = $request->input('loaiDay');
        if($loaiDay != 'none'){
            $dieuKienTim[] = ['strap_types.id','=', $loaiDay];
        }
        $loaiVo = $request->input('loaiVo');
        if($loaiVo != 'none'){
            $dieuKienTim[] = ['case_material.id','=', $loaiVo];
        }
        $trangThai = $request->input('trangThaiSP');
        if($trangThai != 'none'){
            $dieuKienTim[] = ['product_status.id','=', $trangThai];
        }

        $products = DB::table('products')
            ->leftJoin('product_types','products.type_id','=','product_types.id')
            ->leftJoin('strap_types','products.strap_id','=','strap_types.id')
            ->leftJoin('case_material','products.case_material_id','=','case_material.id')
            ->leftJoin('product_status','products.product_status_id','=','product_status.id')
            ->select('products.id','products.name', 'product_types.name as name_type',
                'products.image', 'products.unit_price','products.promotion_price','products.description','product_status.product_status_name as product_status',
                'strap_types.strap_name as loai_day', 'case_material.material_name as loai_vo', 'product_types.type as gender')
            ->where($dieuKienTim)
            ->paginate(5);

        return $products;
    }
}
