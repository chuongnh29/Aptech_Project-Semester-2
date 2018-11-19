@extends('baseAdmin')
@section('content')
    @include('adminHeader')
    <div id="content-wrapper">
        <div id="bill-form">
            @include('billForm')
        </div>
        <!-- Sticky Footer -->
        @include('adminFooter')

    </div>
@endsection
