@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-body">
            <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="d-flex my-4">
                            <img src="{{ isset($user) && $user->getFirstMediaUrl() ? $user->getFirstMediaUrl() : 'http://placeskull.com/120/120'}}"
                                class="rounded-circle m-auto border" width="250" height="250" style="object-fit: cover;" alt="">
                        </div>
                        <div class="form-group">
                            <label for="">
                                รูปโปรไฟล์
                            </label>
                            <div class="custom-file">
                                <input type="file" accept="image/x-png,image/jpeg" class="custom-file-input"
                                    name="product_image" id="product_image">
                                <label class="custom-file-label" for="product_image">เลือกรูป</label>
                            </div>
                            @error('product_image')
                            <small class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </small>
                            @enderror
                        </div>
                        <div class="form-group">
                            @php
                            $name = '';
                            if (old('name')) {
                            $name = old('name');
                            } elseif (isset($user)) {
                            $name = $user->name;
                            }
                            @endphp
                            <label for="">ชื่อผู้ใช้งาน <span class="text-danger">*</span></label>
                            <input type="text" name="name" id="name" value="{{ $name ?? '' }}"
                                class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @php
                            $firstname = '';
                            if (old('firstname')) {
                            $firstname = old('firstname');
                            } elseif (isset($user)) {
                            $firstname = $user->firstname;
                            }
                            @endphp
                            <label for="">ชื่อ</label>
                            <input type="text" name="firstname" id="firstname" value="{{ $firstname ?? '' }}"
                                class="form-control @error('firstname') is-invalid @enderror" placeholder="">
                            @error('firstname')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @php
                            $lastname = '';
                            if (old('lastname')) {
                            $lastname = old('lastname');
                            } elseif (isset($user)) {
                            $lastname = $user->lastname;
                            }
                            @endphp
                            <label for="">นามสกุล</label>
                            <input type="text" name="lastname" id="lastname" value="{{ $lastname ?? '' }}"
                                class="form-control @error('lastname') is-invalid @enderror" placeholder="">
                            @error('lastname')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @php
                            $email = '';
                            if (old('email')) {
                            $email = old('email');
                            } elseif (isset($user)) {
                            $email = $user->email;
                            }
                            @endphp
                            <label for="">อีเมล <span class="text-danger">*</span></label>
                            <input type="email" name="email" id="email" value="{{ $email ?? '' }}"
                                class="form-control @error('email') is-invalid @enderror" placeholder="">
                            @error('email')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            @php
                            $tel = '';
                            if (old('tel')) {
                            $tel = old('tel');
                            } elseif (isset($user)) {
                            $tel = $user->tel;
                            }
                            @endphp
                            <label for="">เบอร์โทรศัพท์ <span class="text-danger">*</span></label>
                            <input type="text" name="tel" id="tel" value="{{ $tel ?? '' }}"
                                class="form-control @error('tel') is-invalid @enderror" placeholder="">
                            @error('tel')
                            <span class=" invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success">บันทึก</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(document).ready(function () {
    bsCustomFileInput.init()
});
</script>
@endpush
