@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mt-3">
        <div class="card-body">
            <h2 class="text-center">ประกาศซื้อขาย</h2>
            <hr>
            <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                @include('products.form')
            </form>
        </div>
    </div>
</div>
@endsection
