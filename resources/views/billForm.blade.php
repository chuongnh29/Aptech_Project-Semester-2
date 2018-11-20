<div class="container crud-table">
    <div class="table-wrapper">

        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Đơn hàng</h2>
                </div>
                <div class="col-sm-6">

                </div>
            </div>
        </div>
        @include('errorValidate')
        {{--<div class="form-row">--}}
            {{--<div class="form-group col-md-4">--}}
                {{--<label for="inputCity">Tên khách hàng</label>--}}
                {{--<input type="text" class="form-control" value="" id="inputCity" placeholder="Bắt buộc nhập" name="giaGoc">--}}
            {{--</div>--}}

            {{--<div class="form-group col-md-4">--}}
                {{--<label for="inputAddress">Số điện thoại</label>--}}
                {{--<input type="text" class="form-control" value="" id="inputAddress" placeholder="Bắt buộc nhập" name="giaSale">--}}
            {{--</div>--}}

            {{--<div class="form-group col-md-4">--}}
                {{--<label for="inputAddress">Địa chỉ giao hàng</label>--}}
                {{--<input type="text" class="form-control" name="moTa" id="inputAddress" placeholder="Viết vào đây...">--}}
            {{--</div>--}}
            {{--<div class="form-group col-md-4">--}}
                {{--<label for="inputAddress">Ngày giao hàng</label>--}}
                {{--<input type="text" class="form-control" name="moTa" id="inputAddress" placeholder="Viết vào đây...">--}}
            {{--</div>--}}
            {{--<div class="form-group col-md-4">--}}
                {{--<label for="inputAddress">Phương thức thanh toán</label>--}}
                {{--<input type="text" class="form-control" name="moTa" id="inputAddress" placeholder="Viết vào đây...">--}}
            {{--</div>--}}
            {{--<div class="form-group col-md-4">--}}
                {{--<label for="exampleFormControlTextarea1">Note</label>--}}
                {{--<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>--}}
            {{--</div>--}}
        {{--</div>--}}

        <form @isset($id) action="{{ route('billDetail',['id'=>$id, 'type'=>$type]) }}" @else action="{{ route('billDetail', ['type' => $type]) }}" @endisset method="post" class="form-horizontal">
            {{ csrf_field() }}
        <div class="card-body">
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Tên khách hàng</label>
                    <div class="col-sm-4">
                        <input type="text" name="tenKhachHang" @isset($tenKhachHang) value="{{ $tenKhachHang }}" @endisset class="form-control">
                    </div>
                    <label class="col-sm-2 form-control-label">Giới tính</label>
                    <div class="col-sm-4">
                        <select name="gioiTinh" id="" class="form-control">
                            <option value="Nam" @isset($gioiTinh) @if($gioiTinh == 'Nam') selected @endif @endisset>Nam</option>
                            <option value="Nữ" @isset($gioiTinh) @if($gioiTinh == 'Nữ') selected @endif @endisset>Nữ</option>
                        </select>
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">

                    <label class="col-sm-2 form-control-label">Email</label>
                    <div class="col-sm-4">
                        <input type="text" name="email" class="form-control" @isset($email) value="{{ $email }}" @endisset>
                    </div>
                    <label class="col-sm-2 form-control-label">Số điện thoại</label>
                    <div class="col-sm-4">
                        <input type="text" name="soDienThoai" class="form-control" @isset($soDienThoai) value="{{ $soDienThoai }}" @endisset>
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">

                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Ngày giao hàng</label>
                    <div class="col-sm-4">
                        <input type="text" name="ngayGiaoHang" class="form-control" @isset($ngayGiaoHang) value="{{ $ngayGiaoHang }}" @endisset>
                    </div>
                    <label class="col-sm-2 form-control-label">Địa chỉ giao hàng</label>
                    <div class="col-sm-4">
                        <input type="text" name="diaChi" class="form-control" @isset($diaChi) value="{{ $diaChi }}" @endisset>
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Phương thức thanh toán</label>
                    <div class="col-sm-4">
                        <input type="text" name="thanhToan" class="form-control"  @isset($thanhToan) value="{{ $thanhToan }}" @endisset>
                    </div>
                    <label class="col-sm-2 form-control-label">Trạng thái đơn hàng</label>
                    <div class="col-sm-4 mb-3">
                        <select name="trangThaiDonHang" class="form-control">
                            @foreach($trangThaiDonHang as $trangThai)
                                <option @isset($idTrangThaiDonHang) @if($idTrangThaiDonHang == $trangThai->id) selected @endif @endisset value="{{ $trangThai->id }}">{{ $trangThai->bill_status_name }}></option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="line"></div>
                <div class="form-group row">

                </div>
                <div class="form-group row">
                    <label class="col-sm-2 form-control-label">Note</label>
                    <div class="col-sm-10">
                        <textarea name="note" id="" cols="30" rows="5" class="form-control">@isset($note) {{$note}} @endisset</textarea>
                    </div>
                </div>
                <div class="line"></div>
                <div id="bill-table">
                    @include('bilSmallTable')
                </div>
                <div class="line"></div>
                <div class="form-group row">
                    <div class="col-sm-7">
                        <a href="#addEmployeeModal" class="btn btn-success" data-toggle="modal"><span>Thêm sản phẩm và lưu</span></a>
                        @isset($id)
                            @if($id != null)
                            <a href="{{ route('bills') }}" class="btn btn-danger"><span>Quay lại</span></a>
                            @endif

                        @else
                            <a href="{{ route('bills') }}" class="btn btn-danger"><span>Quay lại</span></a>
                        @endisset

                    </div>
                </div>
        </div>


    <div id="addEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">

                    <div class="modal-header">
                        <h4 class="modal-title">Thêm sản phẩm</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Sản phẩm</label>
                            <select id="chosen-without-empty" name="idSanPham" class="chosen">
                                @foreach($sanPham as $mau)
                                <option value="{{ $mau->id }}">{{ $mau->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        @foreach($sanPham as $mau)
                            <input type="hidden" name="{{ $mau->id }}" value="{{ $mau->promotion_price }}">
                        @endforeach
                        <div class="form-group">
                            <label>Số lượng</label>
                            <input type="text" name="soLuong" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Hủy">
                        <input type="submit" class="btn btn-success btn-add-product" value="Lưu">
                    </div>
            </div>
        </div>
    </div>

    </form>
    <!-- Edit Modal HTML -->
    <!-- <div id="editEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Edit Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <textarea class="form-control" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" class="form-control" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-info" value="Save">
                    </div>
                </form>
            </div>
        </div>
      </div> -->
    <!-- Delete Modal HTML -->
    <!-- <div id="deleteEmployeeModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form>
                    <div class="modal-header">
                        <h4 class="modal-title">Delete Employee</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" class="btn btn-danger" value="Delete">
                    </div>
                </form>
            </div>
        </div>
      </div> -->








