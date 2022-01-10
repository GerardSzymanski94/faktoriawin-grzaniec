@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.headers.cards')

    <div class="container-fluid">
        <div class="row mt-5">
            <div class="col-xl-12 mb-5 mb-xl-0">
                <registers-list></registers-list>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
