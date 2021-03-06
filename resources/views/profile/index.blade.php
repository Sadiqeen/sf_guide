@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <div class="row justify-content-center">
                <div class="col-12 mb-3">
                    <h1 class="text-center">โปรไฟล์</h1>
                    <hr>
                </div>
                <div class="col-md-3">
                    <img src="{{ isset($user) && $user->getFirstMediaUrl() ? $user->getFirstMediaUrl() : 'http://placeskull.com/120/120'}}"
                        class="w-100 rounded-circle border" width="250" height="250" style="object-fit: cover;" alt="">
                </div>
                <div class="col-md-6 mt-sm-0 mt-5">
                    <div class="row justify-content-center">
                        <div class="col-sm-4">
                            <h4 class="font-weight-bold">ชื่อผู้ใช้งาน</h4>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-muted">{{ $user->name ?? "-" }}</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-sm-4">
                            <h4 class="font-weight-bold">ชื่อ</h4>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-muted">{{ $user->firstname ?? "-" }}</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-sm-4">
                            <h4 class="font-weight-bold">นามสกุล</h4>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-muted">{{ $user->lastname ?? "-" }}</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-sm-4">
                            <h4 class="font-weight-bold">อีเมล</h4>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-muted">{{ $user->email ?? "-" }}</h5>
                        </div>
                    </div>
                    <div class="row justify-content-center mt-3">
                        <div class="col-sm-4">
                            <h4 class="font-weight-bold">เบอร์โทรศัพท์</h4>
                        </div>
                        <div class="col-sm-6">
                            <h5 class="text-muted">{{ $user->tel ?? "-" }}</h5>
                        </div>
                    </div>
                </div>

                @if ( isset($user) && $user->id == auth()->user()->id )
                <div class="col-12 mt-3 text-center">
                    <hr>
                    <a class="btn btn-outline-success" href="{{ route('profile.edit') }}">แก้ไขโปรไฟล์</a>
                    <a class="btn btn-danger" href="{{ route('logout') }}"
                        onclick="event.preventDefault();document.getElementById('logout-form').submit();">ออกจากระบบ</a>
                </div>
                @endif

            </div>
        </div>
    </div>

    @if ($products)
    <div class="card mt-4">
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
                                        <a class="h4" href="{{ route('product.show', $product) }}">{{ $product->title }}</a><br />
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
                                <a class="text-success font-weight-bold" href="{{ route('profile.index', $product->user) }}">{{ $product->user->name }}</a>
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
    @endif
</div>
@endsection
