@extends('baseAdmin')
@section('content')
    @include('adminHeader')
    <div id="content-wrapper">
        <div id="bills">
            @include('BillTable')
        </div>
        <!-- Sticky Footer -->
        @include('adminFooter')

    </div>
@endsection
