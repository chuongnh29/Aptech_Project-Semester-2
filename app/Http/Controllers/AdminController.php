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
    	$thuongHieu = DB::table('type_products')->groupBy('id_name')->get();
    	$gioiTinh = DB::table('type_products')->groupBy('type')->get();
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
    		$products = Products::paginate(5);
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
    	return view('pages.addProduct');
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
             ->join('type_products','products.id_type','=','type_products.id')
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
