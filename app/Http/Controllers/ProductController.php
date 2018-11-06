<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddProductRequest;
use App\ProductType;
use App\ProductImages;
use Validator;
use Illuminate\Support\Facades\Redirect;
use App\Products;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(AddProductRequest $request)
    {
        $tenSP = $request->tenSP;
        $thuongHieu = (int)$request->thuongHieu;
        $gioiTinh = $request->gioiTinh;
        $loaiDay = (int)$request->loaiDay;
        $loaiVo = (int)$request->loaiVo;
        $trangThaiSP = (int)$request->trangThaiSP;
        $giaGoc = (int)$request->giaGoc;
        $giaSale = (int)$request->giaSale;
        $moTa = $request->moTa;
        $anhs = $request->anh->store('test');
        $post = $request->post;
        $status = 'thất bại';
        try{
            $product = new Products;
            $product->name = $tenSP;
            $product->id_type = $thuongHieu;
            $product->description = $moTa;
            $product->unit = 'chiếc';
            $product->unit_price = $giaGoc;
            $product->promotion_price = $giaSale;
            $product->case_material_id = $loaiVo;
            $product->strap_id = $loaiDay;
            $product->post = $post;
            $product->product_status_id = $trangThaiSP;
            $product->save();
            $id = $product->id;

            foreach ($anhs as $anh){
                $image = new ProductImages;
                $image->product_id = $id;
//                $image->name_image = $anh->getClientOriginalName();
                $image->name_image = 'abc';
                $image->save();
//                $anh->move('public/source/img/test', $anh->getClientOriginalName());
                $anh->store($anh->getClientOriginalName());
            }
            $status = 'thành công';
        }catch (Exception $exception){

        }
        return response()->json([
            'status' => $status,
            'url' => route('product'),
            'anh' => $anhs
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $sanPham = Products::where('id',$id)->first();
        if($sanPham != null){
             Products::where('id',$id)->delete();
        }
        return redirect()->route('product');
    }


}
