@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row align-content-center" style="min-height: 80vh;">
        <div class="col-md-6 text-center mx-auto">
            <h1 class="font-weight-bolder">SEASON FRUIT</h1>
            <h1 class="font-weight-bolder text-success">GUIDE</h1>
            <h4 class="text-muted my-5">สามารถค้นหาผลไม้ตามฤดูกาลของสามจังหวัด ได้ใกล้คุณ</h4>
            <div class="input-group input-group-lg">
                <input type="text" class="form-control border border-success" placeholder="ค้นหาผลไม้"
                    aria-label="Recipient's username" aria-describedby="button-addon2">
                <div class="input-group-append">
                    <button class="btn btn-success" type="button" id="button-addon2"><i class="fas fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
