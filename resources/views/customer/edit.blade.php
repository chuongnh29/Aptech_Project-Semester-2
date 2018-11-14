@extends('baseAdmin')
@section('content')
@include('adminHeader')

<div class="container crud-table"">
	<div class="table-wrapper">
      <div class="table-title">
         <div class="row">
            <div class="col-sm-6">
               <h2> Update customer {{ $data['name']  }} </h2>
            </div>
            <div class="col-sm-6">
            </div>
         </div>
      </div>
      <div class="errors">
         @include('errorValidate')
      </div>
      <form action="{{ route('customer.postEdit',$data['id']) }}" method="post">
         <div class="form-row">
             {{ csrf_field() }}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
           <div class="form-group col-md-4">
               <label for="inputEmail4">Tên Customer</label>
               <input type="text" class="form-control" value="{{isset($data['name'])?$data['name']: old('name_customer') }}" id="name_customer" name="name_customer" placeholder="Bắt buộc nhập">
            </div>
            <input type="hidden" name="productID" value="">
            <div class="form-group col-md-4">
               <label for="inputPassword4">Giới tính</label>
               <select id="sex_customer" class="form-control" name="sex_customer" >
               		<option value="Nam" {{ ($data['gender']=='Nam')?"Selected":"" }} > Nam </option>
               		<option value="Nữ" {{ ($data['gender']=='Nữ')?"Selected":"" }} > Nữ </option>
               </select>
            </div>
            <div class="form-group col-md-4">
               <label for="inputState">Email</label>
               <input type="email" name="email_customer" id="email_customer" class="form-control" value="{{ isset($data['email'])?$data['email'] :old('email_customer')  }}" required="true">
            </div>
         </div>
         <div class="form-row">
            <div class="form-group col-md-4">
               <label for="inputPassword4">Address</label>
               <input type="" name="address_customer" id="address_customer" class="form-control" value=" {{ isset($data['address'])?$data['address']:old(address_customer) }} ">
            </div>
            <div class="form-group col-md-4">
               <label for="inputPassword4">Phone number</label>
               <input type="" name="phone_customer" id="phone_customer" class="form-control" required="true" value=" {{ isset($data['phone_number'])?$data['phone_number']:old(phone_customer) }} ">
            </div>
            <div class="form-group col-md-4">
               <label for="inputCity">Chú ý từ khách hàng</label>
               <input type="text" class="form-control"  value=" {{ isset($data['note'])?$data['note']:old(note_customer) }} " id="note_customer" placeholder="" name="note_customer">
            </div>
         </div>
         <div class="form-row">
         </div>
         <button class="btn btn-primary save" id="click_add">Update</button>
      </form>
   </div>
</div>

@include('adminFooter')
@endsection