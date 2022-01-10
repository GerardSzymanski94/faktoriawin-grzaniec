@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <order-detail v-bind:orderid="{{ $order->id }}" v-bind:userid="{{ auth()->user()->id }}"></order-detail>
            </div>
        </div>
    </div>
@endsection
