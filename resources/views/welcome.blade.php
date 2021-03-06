@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-content-center" style="min-height: 80vh;">
        <div class="col-md-6 text-center mx-auto">
            <h1 class="font-weight-bolder">SEASON FRUIT</h1>
            <h1 class="font-weight-bolder text-success">GUIDE</h1>
            <h4 class="text-muted my-5">สามารถค้นหาผลไม้ตามฤดูกาลของสามจังหวัด ได้ใกล้คุณ</h4>
            <form action="{{ route('home') }}" method="get">
            <div class="input-group input-group-lg">
                <input type="text" class="form-control border border-success" placeholder="ค้นหาสินค้า"
                    aria-label="Recipient's username" name="search" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="submit" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
            </form>
            <h4 class="text-muted mt-5">ราคาเฉลี่ยย้อนหลัง</h4>
            <a name="" id="" class="btn btn-primary" href="{{ route('chart', 'มังคุด') }}" role="button">มังคุด</a>
            <a name="" id="" class="btn btn-primary" href="{{ route('chart', 'ทุเรียน') }}" role="button">ทุเรียน</a>
            <a name="" id="" class="btn btn-primary" href="{{ route('chart', 'ลองกอง') }}" role="button">ลองกอง</a>
            <a name="" id="" class="btn btn-primary" href="{{ route('chart', 'เงาะ') }}" role="button">เงาะ</a>
            <a name="" id="" class="btn btn-primary" href="{{ route('chart', 'ลางสาด') }}" role="button">ลางสาด</a>
        </div>
    </div>
</div>
@endsection
