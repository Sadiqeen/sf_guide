@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">ราคาเฉลี่ย{{ request()->fruit }}ย้อนหลัง 15 วัน</h1>
            <hr>
            <div class="">
                {!! $chart->container() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
@endpush
