@extends('baseAdmin')
@section('content')
@include('adminHeader')

<div id="content-wrapper">

		<div id="add-product-form">
        		<div class="container crud-table">
  <div class="table-wrapper">
      <form action="{{ route('Tproduct.postEdit', $data['id'])}}" method="post" enctype= "multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="_token" value="{!! csrf_token() !!}">
    <div class="table-title">
      <div class="row">
        <div class="col-sm-6">
          <h2>Sửa danh mục {{ $data['name'] }}</h2>
        </div>
        <div class="col-sm-6">
          
          <!-- {{--<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm ảnh</span></a>--}} -->
          <!-- <a href="#deleteEmployeeModal" class="btn btn-danger" data-toggle="modal"><i class="material-icons">&#xE15C;</i> <span>Delete</span></a>  -->                       
        </div>
      </div>
    </div>

          @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
   <div class="form-row">
       <div class="form-group col-md-4">
           <label for="inputCity">Tên danh mục</label>
           <input type="text" class="form-control" id="inputCity" placeholder="Bắt buộc nhập" name="nameCategory" value="{{  $data->name }}">
       </div>

       <div class="form-group col-md-4">
        <label for="inputState">Giới tính</label>
        <select id="inputState" class="form-control" name="sex">
            <option value="0">Nam</option>
            <option value="1">Nữ</option>
        </select>
      </div>

       <div class="form-group col-md-4">
           <label for="inputAddress">Mô tả ngắn</label>
           <input type="text" class="form-control" id="inputAddress" name="description" placeholder="Viết vào đây..." value=" {{ $data->description }} " > 
       </div>
   </div>
      <div class="form-group">
          <label for="exampleFormControlFile1">Thêm ảnh</label>
          <input type="file" name="anh" multiple class="form-control-file" id="exampleFormControlFile1" required="true" value=" {{ $data->image }}">
      </div>
      <div class="" >
      		<img style="width: 200px; height: 200px;" src="{{ URL::to('/public/source/img/Hublot.jpg') }}">;
      </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
</form>  

</div>

@endsection