@extends('baseAdmin')
@section('content')
@include('adminHeader')
<div class="container crud-table">
   <div class="table-wrapper">
      <div class="table-title">
         <div class="row">
            <div class="col-sm-6">
               <h2> Thêm customer </h2>
            </div>
            <div class="col-sm-6">
            </div>
         </div>
      </div>
      <div class="errors">
         @include('errorValidate')
      </div>
      <form action="{{ route('customer.postAdd') }}" method="post">
         <div class="form-row">
             {{ csrf_field() }}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
           <div class="form-group col-md-4">
               <label for="inputEmail4">Tên Customer</label>
               <input type="text" class="form-control" value="" id="name_customer" name="name_customer" placeholder="Bắt buộc nhập">
            </div>
            <input type="hidden" name="productID" value="">
            <div class="form-group col-md-4">
               <label for="inputPassword4">Giới tính</label>
               <select id="sex_customer" class="form-control" name="sex_customer" >
               		<option value="Nam"> Nam </option>
               		<option value="Nữ"> Nữ </option>
               </select>
            </div>
            <div class="form-group col-md-4">
               <label for="inputState">Email</label>
               <input type="email" name="email_customer" id="email_customer" class="form-control" value="" required="true">
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-4">
               <label for="inputPassword4">Address</label>
               <input type="" name="address_customer" id="address_customer" class="form-control">
            </div>
            <div class="form-group col-md-4">
               <label for="inputPassword4">Phone number</label>
               <input type="" name="phone_customer" id="phone_customer" class="form-control" required="true">
            </div>
            <div class="form-group col-md-4">
               <label for="inputCity">Chú ý từ khách hàng</label>
               <input type="text" class="form-control" value="" id="note_customer" placeholder="" name="note_customer">
            </div>
         </div>
         <div class="form-row">
         </div>
         <button class="btn btn-primary save" id="click_add">Thêm mới</button>
      </form>
   </div>


   <!-- TABLE  -->

    <table class="table table-striped table-hover" style="margin-top: 50px;">
        <thead>
            <tr>

                <th>STT</th>
                <th>Tên <a href=""><i class="fas fa-arrow-alt-circle-down"></i></a></th>
                <th>Giới tính</th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Chú ý</th>
               	<th>Action</th>
            </tr>
        </thead>
        <tbody>
           	 <?php $count =0; ?>
           	@foreach($data as $items)
           	<?php $count++; ?>
	       		<tr>	
	       				<td>{{ $count }}</td>

	       				<td>{{ $items['full_name'] }}</td>

	       				<td>{{ $items['gender'] }}</td>

	       				<td>{{ $items['email'] }}</td>

	       				<td>{{ $items['address'] }}</td>

	       				<td>{{ $items['phone_number'] }} </td>

	       				<td>{{ $items['note'] }}</td>

	       				<td class="edit-delete-block">
		                     <a href="{!! URL::route('customer.getEdit',$items['id']) !!}" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
		                     <a href="{!! URL::route('customer.getDelete',$items['id']) !!}" class="delete"><i class="material-icons" title="Delete">&#xE872;</i></a>
		                     <input type="hidden" name="name" value="">
                  		</td>

	       		</tr>
           	@endforeach

        </tbody>
    </table>


</div>
@include('AdminFooter')
@endsection
