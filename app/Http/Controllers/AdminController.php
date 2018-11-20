<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\Customer;
use App\BillStatus;
use App\ProductImages;
use DB;
use App\LoaiDay;
use App\LoaiVo;
use App\ProductType;
use App\TrangThaiSanPham;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Mockery\Exception;

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

    	$imagesName = [];
        $images = ProductImages::where('status_id',1)->get();
        foreach ($images as $image){
            $imagesName = array_add($imagesName,$image->product_id, $image->name_image);
        }
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
            'gioiTinh' => $gioiTinh,
            'imagesName'=>$imagesName
    	]);
    }

    public function getAddProduct($id = null){
        $loaiDay = LoaiDay::all();
        $loaiVo = LoaiVo::all();
        $trangThaiSanPham = TrangThaiSanPham::all();
        $thuongHieu = DB::table('product_types')->groupBy('name_id')->get();
        $gioiTinh = DB::table('product_types')->groupBy('type')->get();
        if($id == null){

            return view('pages.addProduct',[
                'loaiDay'=>$loaiDay,
                'loaiVo'=>$loaiVo,
                'trangThaiSP'=>$trangThaiSanPham,
                'thuongHieu'=>$thuongHieu,
                'gioiTinh'=>$gioiTinh,
                'type'=>'add'
            ]);
        } else {
            $product = DB::table('products')
                ->leftJoin('product_types','products.type_id','=','product_types.id')
                ->leftJoin('strap_types','products.strap_id','=','strap_types.id')
                ->leftJoin('case_material','products.case_material_id','=','case_material.id')
                ->leftJoin('product_status','products.product_status_id','=','product_status.id')
                ->select('products.id','products.name', 'products.type_id',
                    'products.image', 'products.unit_price','products.promotion_price','products.description','products.product_status_id',
                    'products.strap_id', 'products.case_material_id', 'product_types.type as gender')
                ->where('products.id', (int) $id)
                ->first();
            $anhSP = ProductImages::where([['product_id','=',(int) $id],['status_id','=', 2]])->get();
            $anhDaiDien = ProductImages::where([['product_id','=',(int) $id],['status_id','=', 1]])->first();
            return view('pages.editProduct',[
                'loaiDay'=>$loaiDay,
                'loaiVo'=>$loaiVo,
                'trangThaiSP'=>$trangThaiSanPham,
                'thuongHieu'=>$thuongHieu,
                'gioiTinh'=>$gioiTinh,
                'product'=>$product,
                'type'=>'edit',
                'anhDaiDien'=>$anhDaiDien,
                'anhSP'=>$anhSP
            ]);
        }
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

    public function getBills(Request $request){
        $url = $request->fullUrl();
        $dangCho = count(Bill::where('status_id', 1)->get());
        $daXacNhan = count(Bill::where('status_id', 2)->get());
        $dangXuLy = count(Bill::where('status_id', 3)->get());
        $daGiao = count(Bill::where('status_id', 4)->get());
        $daHuy = count(Bill::where('status_id', 5)->get());
        $trangThaiDonHang = BillStatus::all();
        $dieuKienTimKiem = $this->getSearchCondition($request);
        $ngayTaoDon = DB::table('bills')->select('bills.date_order')->groupBy('date_order')->get();
        $bills = DB::table('bills')
            ->leftJoin('bill_status','bills.status_id','=','bill_status.id')
            ->leftJoin('customer','bills.customer_id','=','customer.id')
            ->select('bills.id','customer.address','bills.date_order','bills.total', 'bill_status.bill_status_name','bills.note','customer.name as customer_name','customer.phone_number')
            ->where($dieuKienTimKiem)
            ->paginate(5);
        $bills->withPath($url);
        return view('pages.adminBills',[
            'Bills'=>$bills,
            'BillStatus'=>$trangThaiDonHang,
            'DateOrders'=>$ngayTaoDon,
            'dangCho' => $dangCho,
            'daXacNhan' =>$daXacNhan,
            'dangXuLy' => $dangXuLy,
            'daGiao' => $daGiao,
            'daHuy' => $daHuy
        ]);
    }

    public function getSearchCondition($request){
        $tenKhachHang = $request->tenKhachHang;
        $idDonHang = $request->idDonHang;
        $trangThaiDonHang = $request->trangThaiDonHang;
        $ngay = $request->ngay;
        $dieuKienTimKiem = [];
        if($tenKhachHang != null){
            $dieuKienTimKiem[] = ['customer.name','like','%'.$tenKhachHang.'%'];
        }
        if($trangThaiDonHang != null && $trangThaiDonHang != 'none'){
            $dieuKienTimKiem[] = ['bills.status_id','=', (int) $trangThaiDonHang];
        }
        if($ngay != null && $ngay != 'none'){
            $dieuKienTimKiem[] = ['bills.date_order','=', $ngay];
        }
        if($idDonHang != null){
            $dieuKienTimKiem[] = ['bills.id','=',$idDonHang];
        }

        return $dieuKienTimKiem;
    }

    public function getBillForm($id = null, Request $request){
        $trangThaiDonHang = BillStatus::all();
        $sanPham = Products::all();
        $type = 'add';
        $idBill = null;
        $tenKhachHang = '';
        $gioiTinh = '';
        $email = '';
        $soDienThoai = '';
        $ngayGiaoHang = '';
        $diaChi = '';
        $thanhToan = '';
        $note = '';
        $detailBill = null;
        $bill = null;
        $customer = null;
        $idTrangThaiDonHang = '';
        if($id != null){
            $type = 'edit';
            if(!$request->session()->has('bill')){
                $billSes = Bill::find((int)$id);
                $billDetailSes = BillDetail::where('bill_id', (int) $id)->get();
                $customerSes = Customer::find($billSes->customer_id);
                $request->session()->put([
                    'bill' => $billSes,
                    'customer' => $customerSes,
                    'billDetail' => $billDetailSes
                ]);
            }
            $idBill = $id;
            $bill = Bill::find((int)$idBill);
            $customer = Customer::find($bill->customer_id);
            $detailBill = DB::table('bill_detail')
                ->join('products','bill_detail.product_id','=','products.id')
                ->select('bill_detail.id','products.name','bill_detail.quantity','bill_detail.unit_price', 'bill_detail.product_id')
                ->where('bill_detail.bill_id',(int)$idBill)->get();
            $tenKhachHang = $customer->name;
            $gioiTinh = $customer->gender;
            $email = $customer->email;
            $soDienThoai = $customer->phone_number;
            $ngayGiaoHang  =$bill->date_order;
            $diaChi = $customer->address;
            $thanhToan = $bill->payment;
            $note = $bill->note;
            $idTrangThaiDonHang = $bill->status_id;
        }
        return view('pages.bill',[
            'type' => $type,
            'trangThaiDonHang'=>$trangThaiDonHang,
            'sanPham'=>$sanPham,
            'id'=>$idBill,
            'tenKhachHang' => $tenKhachHang,
            'gioiTinh' => $gioiTinh,
            'email' => $email,
            'soDienThoai'=> $soDienThoai,
            'ngayGiaoHang'=> $ngayGiaoHang,
            'diaChi'=>$diaChi,
            'thanhToan'=>$thanhToan,
            'idTrangThaiDonHang' => $idTrangThaiDonHang,
            'note' => $note,
            'detailBills' => $detailBill,
            'bill' => $bill
        ]);
    }

    public function getList()
    {
        return view('Tproduct.list');
    }

    public function getadd_type_product()
    {
        $data = ProductType::select('id','name_id','image','name','description')->orderby('id','DESC')->get()->toArray();
        return view('Tproduct.add',compact('data'));
    }

    public function postadd_type_product(Request $request)
    {
        $this->validate($request, [
            'anh' =>  'mimes:jpeg,bmp,png',
        ]);

        $tp = new ProductType;
        $file = $request->file('anh');
        $tp->name = $request->nameCategory;
        $tp->name_id = "NULL";
        $tp->type = 1;
        $tp->description = $request->description;
        $tp->image = $file->getClientOriginalName();
        $file->move('public/source/img/product', $file->getClientOriginalName());

        $tp->save();

        $request->session()->flash('status','Tạo danh mục thành công!');

        return redirect()->route('Tproduct.getadd');
    }


    public function delete_type_product($id,Request $request)
    {

        $delete = ProductType::find($id);
        $fileName= 'public/source/img/product/'.$delete->image;


        $delete->delete($id);
        if(file_exists($fileName)) unlink($fileName);

        $request->session()->flash('status','Xóa thành công');


        return redirect()->route('Tproduct.getadd');
    }

    public function getedit_type_product($id)
    {
        $data = ProductType::findOrFail($id);

        return view('Tproduct.edit',compact('data'));
    }

    public function postedit_type_product(Request $request,$id)
    {
        $this->validate($request, [
                'nameCategory' => 'required',
                'description' => 'required',
                'anh' => 'required'
        ]);

        $tp = ProductType::find($id);
        $file = $request->file('anh');
        $tp->name = $request->nameCategory;
        $tp->description = $request->description;
        $tp->image = $file->getClientOriginalName();
        $file->move('public/source/img/product', $file->getClientOriginalName());

        $tp->save();

        $request->session()->flash('status','Chỉnh sửa danh mục thành công');

        return redirect()->route('Tproduct.getadd');

    }

    public function getAdd_customer(){
        $data = Customer::select('id','name','gender','email','address','phone_number','note')->orderby('id','DESC')->get()->toArray();

        return view('customer.add',compact('data'));

    }

    public function postAdd_customer(Request $rq)
    {

        $this->validate($rq, [
            'note_customer' => 'required'
        ]);
 
        $cus = new Customer;
        $cus->name = $rq->name_customer;
        $cus->gender = $rq->sex_customer;
        $cus->email = $rq->email_customer;
        $cus->address = $rq->address_customer;
        $cus->phone_number = $rq->phone_customer;
        $cus->note =  $rq->note_customer;

        $cus->save();

        $rq->session()->flash('status','Thêm mới customer thành công!!');

        return redirect()->route('customer.getAdd');

    }

    public function getEdit_customer($id)
    {
        $data = Customer::findOrFail($id);

        return view('customer.edit',compact('data'));
    }

    public function postEdit_customer(Request $rq,$id)
    {
        $cus = Customer::find($id);

        $cus->name = $rq->name_customer;
        $cus->gender = $rq->sex_customer;
        $cus->email = $rq->email_customer;
        $cus->address = $rq->address_customer;
        $cus->phone_number = $rq->phone_customer;
        $cus->note =  $rq->note_customer;

        $cus->save();

        $rq->session()->flash('status','Update thành công');

        return redirect()->route('customer.getAdd');

    }

    public function getDelelte_customer(Request $rq,$id)
    {
        $cus = Customer::find($id);
        $cus->delete($id);

        $rq->session()->flash('status','Xóa thành công '.$cus->name);

        return redirect()->route('customer.getAdd');

    }
}
