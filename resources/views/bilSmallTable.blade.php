<table class="table table-striped table-hover" style="margin-top: 50px;">
    <thead>
    <tr>
        <th>
                    <span class="custom-checkbox">
                        <input type="checkbox" id="selectAll">
                        <label for="selectAll"></label>
                    </span>
        </th>
        <th>Tên sản phẩm</th>
        <th>Số lượng</th>
        <th>Đơn giá</th>
        <th style="width: 8rem;">Thành tiền</th>
        <th>Thao tác</th>
    </tr>
    </thead>
    <tbody id="bill-table">
    @isset($detailBills)
        @foreach($detailBills as $detail)
    <tr>
        <td>
                        <span class="custom-checkbox">
                            <input type="checkbox" id="checkbox1" name="options[]" value="{{ $detail->id }}">
                            <label for="checkbox1"></label>
                        </span>
        </td>
        <td><a href="{{ route('editProductForm',['id' => $detail->product_id]) }}">{{ $detail->name }}</a></td>
        <td>{{ $detail->quantity }}</td>
        <td>{{ $detail->unit_price }}</td>
        <td>{{ (int)($detail->quantity) * (int)($detail->unit_price) }} USD</td>
        <td class="edit-delete-block">
            <a href="" class="delete"><i class="material-icons" title="Xóa">&#xE872;</i></a>
            <input type="hidden" name="name" value="">
        </td>
    </tr>
    @endforeach
        <tr>
            <td colspan="4">Tổng tiền</td>
            @isset($bill)
            <td>{{ $bill->total }} USD</td>
            @endisset
            <td></td>
        </tr>
    @endisset
    </tbody>
</table>
