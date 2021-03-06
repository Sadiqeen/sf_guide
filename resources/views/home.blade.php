@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-white">ตลาดผลไม้</h2>
    <form action="{{ route('home') }}" method="get">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="ค้นหาสินค้า" aria-label="Recipient's username"
                name="search" aria-describedby="button-addon2" value="{{ request()->query('search') }}">
            <div class="input-group-append">
                <button class="btn btn-light" type="submit" id="button-addon2"><i
                        class="fas fa-search text-success"></i></button>
            </div>
        </div>
    </form>

    <div class="card mt-3">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table" style="min-width: 1000px;">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="w-50">รายการ</th>
                            <th scope="col" class="text-center">ปริมาณ</th>
                            <th scope="col" class="text-center">ลงวันที่</th>
                            <th scope="col" class="text-center">ผู้ประกาศ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                        <tr>
                            <th scope="row">
                                <div class="row">
                                    <div class="col-3 col-sm-2">
                                        <img src="{{ $product->getFirstMediaUrl() }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-9 col-sm-10">
                                        <a class="h4"
                                            href="{{ route('product.show', $product) }}">{{ $product->title }}</a><br />
                                        {{ $product->additional_information }}
                                    </div>
                                </div>
                            </th>
                            <td class="text-center font-weight-bold">
                                <span class="text-success">{{ $product->quantity }}</span><br />
                                <span class="text-muted">{{ $product->quantity_unit }}</span>
                            </td>
                            <td class="text-center font-weight-bold">
                                <span class="text-success">{{ $product->diff_for_humans }}</span><br />
                                <span class="text-muted">{{ $product->public_date }}</span>
                            </td>
                            <td class="text-center">
                                <a class="text-success font-weight-bold"
                                    href="{{ route('profile.index', $product->user) }}">{{ $product->user->name }}</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4" class="text-center">
                                <p>ไม่มีข้อมูล</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                {{ $products->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
