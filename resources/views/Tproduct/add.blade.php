@extends('baseAdmin')
@section('content')
@include('adminHeader')
<div id="content-wrapper">
@include('errorValidate')
<div id="add-product-form">
   <div class="container crud-table">
      <div class="table-wrapper">
         <form action="{{ route('Tproduct.getadd') }}" method="post" enctype= "multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
            <div class="table-title">
               <div class="row">
                  <div class="col-sm-6">
                     <h2>Thêm danh mục</h2>
                  </div>
                  <div class="col-sm-6">
                     {{--<a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Thêm ảnh</span></a>--}}
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
                  <input type="text" class="form-control" id="inputCity" placeholder="Bắt buộc nhập" name="nameCategory" value="{{ old('nameCategory') }}">
               </div>
               <div class="form-group col-md-4">
                  <label for="inputState">Giới tính</label>
                  <select id="inputState" class="form-control" name="gioiTinh">
                     <option value="0">Nam</option>
                     <option value="1">Nữ</option>
                  </select>
               </div>
               <div class="form-group col-md-4">
                  <label for="inputAddress">Mô tả ngắn</label>
                  <input type="text" class="form-control" id="inputAddress" name="description" placeholder="Viết vào đây...">
               </div>
            </div>
            <div class="form-group">
               <label for="exampleFormControlFile1">Thêm ảnh</label>
               <input type="file" name="anh" multiple class="form-control-file" id="exampleFormControlFile1" required="true">
            </div>
            <button type="submit" class="btn btn-primary">Thêm</button>
         </form>
         <!-- TABLE TYPE PRODUCT -->
         <table class="table table-striped table-hover" style="margin-top: 50px;">
            <thead>
               <tr>
                  <th>Ảnh</th>
                  <th>Tên thương hiệu <a href=""><i class="fas fa-arrow-alt-circle-down"></i></a></th>
                  <th>Giới tính</th>
                  <th>Mô tả</th>
                  <th>Actions</th>
               </tr>
            </thead>
            <tbody>
               @foreach ($data as $items)
               <tr class="item{{$items['id']}}">
                  <td><img style="max-width: 100px;height: auto;" src="{{ url('/public/source/img/product').'/'.$items['image'] }}"></td>
                  <td>{!! $items['name'] !!}</td>
                  <!-- <td>{!! $items['name'] !!}</td> -->
                  <td>Nam</td>
                  <td>{!! $items['description'] !!}</td>
                  <td class="edit-delete-block">
                     <a href="{!! URL::route('Tproduct.getEdit',$items['id']) !!}" class="edit"><i class="material-icons" title="Edit">&#xE254;</i></a>
                     <a href="{!! URL::route('Tproduct.getDelete',$items['id']) !!}" class="delete"><i class="material-icons" title="Delete">&#xE872;</i></a>
                     <input type="hidden" name="name" value="">
                  </td>
               </tr>
               @endforeach
            </tbody>
         </table>
         <!-- Modal -->
         <!-- END TYPE PRODUCT --> 
         <!-- Edit Modal HTML -->
         </form>
      </div>
   </div>
   <!-- Sticky Footer -->
   <!-- @include('adminFooter') -->
</div>
@endsection