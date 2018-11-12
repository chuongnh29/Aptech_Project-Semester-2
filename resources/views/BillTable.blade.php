<div class="container crud-table">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2><b>Đơn hàng</b></h2>
                </div>
                <div class="col-sm-6 d-flex justify-content-end">
                    <form action="{{ route('bills') }}" method="get" class="form-inline">
                        <label class="sr-only" for="inlineFormInputName2">Name</label>
                        <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2" name="idDonHang" placeholder="Mã đơn hàng">

                        <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>

                        <button type="submit" class="btn btn-primary mb-2">Tìm kiếm</button>
                    </form>
                </div>

            </div>

        </div>
        <div class="row" style="margin-top: 1rem; margin-bottom: 1rem;">
            <div class="col-md-7"><a href="" style="color: #566787;">Tất cả ({{ count($Bills) }})</a> | <a href="" style="color: #566787;">Đang chờ ({{ $dangCho }})</a> | <a href="" style="color: #566787;">Đã xác nhận ({{ $daXacNhan }})</a> | <a
                    href="" style="color: #566787;">Đang xử lý ({{ $dangXuLy }})</a> | <a
                    href="" style="color: #566787;">Đã giao ({{ $daGiao }})</a> | <a href="" style="color: #566787;">Đã hủy ({{ $daHuy }})</a>
            </div>
        </div>
        <form action="{{ route('bills') }}" method="get" style="margin-bottom: 2rem;">
            <input type="hidden" name="type" value="timKiem">
            <div class="form-row">
                <div class=""></div>
                <div class="form-group col-md-4">
                    <label for="inputEmail4">Tên khách hàng</label>
                    <input type="textSearch" class="form-control" id="inputEmail4" placeholder="Nhập tên khách hàng" name="tenKhachHang">

                </div>
                <div class="form-group col-md-4">
                    <label for="inputCity">Trạng thái đơn hàng</label>
                    <select id="inputState" class="form-control" name="trangThaiDonHang">
                        <option value="none">Tất cả</option>
                        @foreach($BillStatus as $status)
                            <option value="{{ $status->id }}">{{ $status->bill_status_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="inputCity">Thời gian</label>
                    <select id="inputState" class="form-control" name="ngay">
                        <option value="none" selected>Tất cả các ngày</option>
                        @foreach($DateOrders as $date)
                            <option value="{{ $date->date_order }}">{{ $date->date_order }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-row">
                <button type="submit" class="btn btn-success" style="margin-left: 0.5rem;">Lọc</button>
            </div>
        </form>

        <form action="{{ route('editBillsStatus') }}" method="post" class="form-inline" style="margin-top: 0.5rem;">
            {{ csrf_field() }}
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
                </th>
                <th>Mã đơn hàng</th>
                <th>Tên khách hàng</th>
                <th>Số điện thoại</th>
                <th>Địa chỉ giao hàng</th>
                <th>Ngày tạo đơn hàng</th>
                <th>Tổng cộng</th>
                <th>Note</th>
                <th>Trạng thái hàng</th>
                <th>Thao tác</th>
            </tr>
            </thead>
            <tbody>
            @foreach($Bills as $bill)
                <tr>
                    <td>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="checkbox1" name="id[]" value="{{ $bill->id }}">
                        <label for="checkbox1"></label>
                    </span>
                    </td>
                    <td><a href="">{{ $bill->id }}</a></td>
                    <td>{{ $bill->customer_name }}</td>
                    <td>{{ $bill->phone_number }}</td>
                    <td>{{ $bill->address }}</td>
                    <td>{{ $bill->date_order }}</td>
                    <td>{{ $bill->total }}</td>
                    <td>{{ $bill->note }}</td>
                    <td>{{ $bill->bill_status_name }}</td>
                    <td class="edit-delete-block">
                        <a href="" class="edit"><i class="material-icons" title="Sửa">&#xE254;</i></a>
                        <a href="" class="delete"><i class="material-icons" title="Xóa">&#xE872;</i></a>
                        <input type="hidden" name="name" value="">
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
            <select class="form-control form-control-sm" name="capNhatTrangThai">
                @foreach($BillStatus as $status)
                <option value="{{ $status->id }}">{{ $status->bill_status_name }}</option>
                @endforeach
            </select>

            <button type="submit" class="btn btn-primary form-control-sm" style="margin-left: 0.5rem;">Áp dụng</button>
        </form>
        <div class="clearfix">
            {{ $Bills->links() }}

        </div>
    </div>
</div>
<!-- Edit Modal HTML -->
<!-- <div id="addEmployeeModal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <form>
                <div class="modal-header">
                    <h4 class="modal-title">Add Employee</h4>
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
                    <input type="submit" class="btn btn-success" value="Add">
                </div>
            </form>
        </div>
    </div>
</div> -->
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
