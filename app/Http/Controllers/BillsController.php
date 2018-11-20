<?php

namespace App\Http\Controllers;

use App\Bill;
use App\BillDetail;
use App\BillStatus;
use App\Customer;
use App\Http\Requests\BillRequest;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class BillsController extends Controller
{
    public function editBillsStatus(Request $request){
        $ids = collect($request->id);
        $status = $request->capNhatTrangThai;
        foreach ($ids as $id){
            $bill = Bill::find((int)$id);
            $bill->status_id = (int) $status;
            $bill->save();
        }

        return redirect()->route('bills');
    }

    public function billDetail($type, $id = null, BillRequest $request){
        $tenKhachHang = $request->tenKhachHang;
        $gioiTinh = $request->gioiTinh;
        $email = $request->email;
        $idSanPham = $request->idSanPham;
        $soDienThoai = $request->soDienThoai;
        $ngayGiaoHang = $request->ngayGiaoHang;
        $diaChi = $request->diaChi;
        $thanhToan = $request->thanhToan;
        $soLuong = $request->soLuong;
        $idTrangThaiDonHang = $request->trangThaiDonHang;
        $note = $request->note;
        $bill = null;
        $idBill = null;
        $detailBill = null;
        $product =  Products::all();
        $trangThaiDonHang = BillStatus::all();
        if($id != null){
            $idBill = $id;
            $isUpdate = false;
            $detailBill = BillDetail::where('bill_id', (int)$idBill)->get();


            foreach ($detailBill as $detail){
                if($detail->product_id == (int)$idSanPham){
                    $isUpdate = true;
                    $item = BillDetail::find($detail->id);
                    $item->quantity = $soLuong;
                    $item->save();
                    break;
                }
            }
            if($isUpdate == false){
                $detail = new BillDetail;
                $detail->bill_id = $idBill;
                $detail->product_id = $idSanPham;
                $detail->unit_price = Products::find((int)$idSanPham)->promotion_price;
                $detail->quantity = $soLuong;
                $detail->save();
            }

        }else{
            $customer = new Customer;
            $customer->full_name = $tenKhachHang;
            $customer->gender = $gioiTinh;
            $customer->email = $email;
            $customer->address = $diaChi;
            $customer->phone_number = $soDienThoai;
            $customer->note = $note;
            $customer->save();
            $idCustomer = $customer->id;
            $newBill = new Bill;
            $newBill->customer_id = $idCustomer;
            $newBill->date_order = $ngayGiaoHang;
            $newBill->total = 0;
            $newBill->payment = $thanhToan;
            $newBill->note = $note;
            $newBill->status_id = (int)$idTrangThaiDonHang;
            $newBill->shipper_code = 22222;
            $newBill->save();
            $idBill = $newBill->id;
            $newDetailBill = new BillDetail;
            $newDetailBill->bill_id = $idBill;
            $newDetailBill->product_id = $idSanPham;
            $newDetailBill->quantity = (int)$soLuong;
            $donGia = Products::find($idSanPham)->promotion_price;
            $newDetailBill->unit_price = $donGia;
            $newDetailBill->save();
        }


        $detailBill = DB::table('bill_detail')
            ->join('products','bill_detail.product_id','=','products.id')
            ->select('bill_detail.id','products.name','bill_detail.quantity','bill_detail.unit_price', 'bill_detail.product_id')
            ->where('bill_detail.bill_id',(int)$idBill)->get();

        $bill = Bill::find((int)$idBill);
        $bill->date_order = $ngayGiaoHang;
        $bill->payment = $thanhToan;
        $bill->note = $note;
        $bill->status_id = $idTrangThaiDonHang;
        $bill->shipper_code = 22222;
        $tongTien = 0;
        foreach ($detailBill as $billDetail){
            $tongTien += ((int)$billDetail->quantity) * ((int)$billDetail->unit_price);
        }
        $bill->total = $tongTien;
        $bill->save();

        return view('pages.bill',[
            'type'=>$type,
            'id'=>$idBill,
            'tenKhachHang' => $tenKhachHang,
            'gioiTinh' => $gioiTinh,
            'email' => $email,
            'soDienThoai'=> $soDienThoai,
            'ngayGiaoHang'=> $ngayGiaoHang,
            'diaChi'=>$diaChi,
            'thanhToan'=>$thanhToan,
            'idTrangThaiDonHang' => $idTrangThaiDonHang,
            'trangThaiDonHang' => $trangThaiDonHang,
            'note' => $note,
            'detailBills' => $detailBill,
            'sanPham' => $product,
            'bill' => $bill
        ]);
    }

    public function deleteAllBill($id){
        $bill = Bill::find($id);
        $customer_id = $bill->customer_id;
        Customer::find((int)$customer_id)->delete();
        BillDetail::where('bill_id', $id)->delete();
        $bill->delete();
    }

    public function backBill($type, $id = null, Request $request){
        if($type == 'add') {
            if($id != null){
                $this->deleteAllBill((int)$id);
            }
        }else if($type == 'edit'){
            $customer = $request->session()->pull('customer');
            $bill = $request->session()->pull('bill');
            $billDetail = $request->session()->pull('billDetail');

            $newCustomer = new Customer;
            $newCustomer->full_name = $customer->full_name;
            $newCustomer->gender = $customer->gender;
            $newCustomer->email = $customer->email;
            $newCustomer->address = $customer->address;
            $newCustomer->phone_number = $customer->phone_number;
            $newCustomer->note = $customer->note;
            $newCustomer->id = $customer->id;



            $newBill = new Bill;
            $newBill->customer_id = $bill->id;
            $newBill->date_order = $bill->date_order;
            $newBill->total = $bill->total;
            $newBill->payment = $bill->payment;
            $newBill->note = $bill->note;
            $newBill->status_id = $bill->status_id;
            $newBill->shipper_code = $bill->shipper_code;
            $newBill->id = $bill->id;

            $newDetailBills = [];
            foreach ($billDetail as $item){
                $newDetailBill = new BillDetail;
                $newDetailBill->bill_id = $item->bill_id;
                $newDetailBill->product_id = $item->product_id;
                $newDetailBill->quantity = $item->quantity;
                $newDetailBill->unit_price = $item->unit_price;
                $newDetailBill->id = $item->id;

                $newDetailBills = array_add($newDetailBills, $newDetailBill->id, $newDetailBill);
            }

            $this->deleteAllBill((int) $id);


            $newCustomer->save();
            $newBill->save();
            foreach ($newDetailBills as $item){
                $item->save();
            }
        }

        return redirect()->route('bills');
    }
}
