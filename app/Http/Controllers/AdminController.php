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
                ->join('product_types','products.type_id','=','product_types.id')
                ->join('strap_types','products.strap_id','=','strap_types.id')
                ->join('case_material','products.case_material_id','=','case_material.id')
                ->join('product_status','products.product_status_id','=','product_status.id')
                ->select('products.id','products.name', 'type_products.name as name_type',
                    'products.image', 'products.unit_price','products.promotion_price','products.description','product_status.product_status_name as product_status',
                    'strap_types.strap_name as loai_day', 'case_material.material_name as loai_vo', 'type_products.type as gender')->paginate(5);
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
            $dieuKienTim[] = ['type_products.id','=', $thuongHieu];
        }
        $gioiTinh = $request->input('gioiTinh', null);
        if($gioiTinh != 'none'){
            $dieuKienTim[] = ['type_products.type','=', $gioiTinh];
        }
        $loaiDay = $request->input('loaiDay');
        if($loaiDay != 'none'){
            $dieuKienTim[] = ['loai_day_models.id','=', $loaiDay];
        }
        $loaiVo = $request->input('loaiVo');
        if($loaiVo != 'none'){
            $dieuKienTim[] = ['loai_vo_models.id','=', $loaiVo];
        }
        $trangThai = $request->input('trangThaiSP');
        if($trangThai != 'none'){
            $dieuKienTim[] = ['trang_thai_san_pham_models.id','=', $trangThai];
        }
         $products = DB::table('products')
             ->join('product_types','products.id_type','=','type_products.id')
             ->join('loai_day_models','products.id_loai_day','=','loai_day_models.id')
             ->join('loai_vo_models','products.id_loai_vo','=','loai_vo_models.id')
             ->join('trang_thai_san_pham_models','products.id_trang_thai','=','trang_thai_san_pham_models.id')
             ->select('products.id','products.name', 'type_products.name as name_type',
                 'products.image', 'products.unit_price','products.promotion_price','products.description','trang_thai_san_pham_models.ten_trang_thai as product_status',
                 'loai_day_models.ten_loai_day as loai_day', 'loai_vo_models.ten_loai_vo as loai_vo', 'type_products.type as gender')
             ->where($dieuKienTim)->paginate(5);

        return $products;
    }
}
