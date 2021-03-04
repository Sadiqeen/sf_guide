@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-white">ตลาดผลไม้</h2>
    <div class="input-group">
        <input type="text" class="form-control" placeholder="ค้นหาสินค้า" aria-label="Recipient's username"
            aria-describedby="button-addon2">
        <div class="input-group-append">
            <button class="btn btn-light" type="button" id="button-addon2"><i
                    class="fas fa-search text-success"></i></button>
        </div>
    </div>

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
                        <tr>
                            <th scope="row">
                                <div class="row">
                                    <div class="col-3 col-sm-2">
                                        <img src="http://placeskull.com/120/120" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-9 col-sm-10">
                                        <a class="h4" href="#">ปลานิล 100 กก. (60 บาท/กก.) สงขลา</a><br />
                                        ปลานิลไซส์2-3ตัว/กิโล หาดใหญ่ สงขลาส่งฟรี ขายยก100กก.ขึ้นไป
                                    </div>
                                </div>
                            </th>
                            <td class="text-center font-weight-bold">
                                <span class="text-success">100</span><br />
                                <span class="text-muted">กก.</span>
                            </td>
                            <td class="text-center font-weight-bold">
                                <span class="text-success">21 ชั่วโมงที่แล้ว</span><br />
                                <span class="text-muted">2 ม.ค. 52</span>
                            </td>
                            <td class="text-center text-success font-weight-bold">Test User</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="d-flex justify-content-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination pagination-sm">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
@endsection
