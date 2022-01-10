@extends('admin.layouts.app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <user-detail v-bind:userid="{{ $user->id }}"></user-detail>
            </div>
        </div>
        @include('admin.layouts.footers.auth')
    </div>
@endsection
