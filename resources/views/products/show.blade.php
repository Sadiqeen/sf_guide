@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3 p-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 co-12 mb-md-0 mb-4 d-flex">
                    <h4 class="mx-md-0 mx-auto">ขาย <a href="{{ route('chart', $product->name) }}" class="text-success"><u>{{ $product->name }}</u></a></h4>
                </div>
                <div class="col-md-2 col-4 text-center">
                    <h6 class="text-muted">ปริมาณ</h6>
                    <h5 class="text-success">{{ $product->quantity }} {{ $product->quantity_unit }}</h5>
                </div>
                <div class="col-md-2 col-4 text-center">
                    <h6 class="text-muted">แหล่งผลิต</h6>
                    <h6 class="text-success">{{ $product->province }}</h6>
                </div>
                <div class="col-md-2 col-4 text-center">
                    <h6 class="text-muted">วันที่โพส</h6>
                    <h6 class="text-success">{{ $product->public_date }}</h6>
                </div>
            </div>
            <hr>
            <p class="h2">{{ $product->additional_information }}</p>
            @foreach ($product->getMedia() as $image)
            <a href="{{ $image->getUrl() }}" class="image-link">
                <img src="{{ $image->getUrl() }}" class="img-thumbnail rounded" width="100" alt="">
            </a>
            @endforeach
            <hr>
            <div class="row mt-3">
                <div class="col-lg-1 col-sm-3 d-flex">
                    <img src="{{ $product->user->getFirstMediaUrl() }}" class="img-fluid rounded-circle mx-auto" alt="">
                </div>
                <div class="col-lg-11 col-sm-9">
                    <a class="text-success h5" href="{{ route('profile.index', $product->user) }}">{{ $product->user->name }}</a><br />
                    <a class="text-muted h5 mr-3" href="tel:{{ $product->user->tel }}">โทร :
                        {{ $product->user->tel ?? '-' }}</a>
                    <a class="text-muted h5" href="mail:{{ $product->user->email }}">อีเมล :
                        {{ $product->user->email ?? '-' }}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-3">
        <div class="card-body">
            @comments(['model' => $product])
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
$(document).ready(function() {
  $('.image-link').magnificPopup({type:'image'});
});
</script>
@endpush
