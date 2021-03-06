@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <h1 class="text-center">ราคาเฉลี่ย{{ request()->fruit }}ย้อนหลัง 15 วัน</h1>

            <ul class="nav nav-pills  flex-column flex-sm-row mb-3" id="pills-tab" role="tablist">
                <li class="flex-sm-fill text-sm-center  nav-item" role="presentation">
                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#graph" role="tab"
                        aria-controls="graph" aria-selected="true">กราฟ</a>
                </li>
                <li class="flex-sm-fill text-sm-center  nav-item" role="presentation">
                    <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#table" role="tab"
                        aria-controls="table" aria-selected="false">ตาราง</a>
                </li>
            </ul>
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="graph" role="tabpanel" aria-labelledby="pills-home-tab">
                    <div class="">
                        {!! $chart->container() !!}
                    </div>
                </div>
                <div class="tab-pane fade" id="table" role="tabpanel" aria-labelledby="pills-profile-tab">
                    <div class="table-responsive">
                        <table class="table table-striped  table-sm">
                            <thead class="thead-dark text-center">
                                <tr>
                                    <th>วันที่</th>
                                    <th>ราคาเฉลี่ย</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (array_reverse($dataset['collection']) as $item)
                                <tr>
                                    <td class="text-center" scope="row">{{ $item['label'] }}</td>
                                    <td class="text-center">{{ $item['price'] }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
@endpush
