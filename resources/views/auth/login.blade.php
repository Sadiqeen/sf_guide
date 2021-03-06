<div class="modal" tabindex="-1" id="loginModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">เข้าสู่ระบบ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group">
                        <label for="email" class="text-muted"> อีเมลล์ของคุณ </label>

                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password" class="text-muted">รหัสผ่าน</label>

                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>

                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-block">
                            เข้าสู่ระบบ
                        </button>

                        @if (Route::has('register'))
                        <a class="btn btn-link btn-block" href="{{ route('register') }}">ลงทะเบียน</a>
                        @endif

                        @if (Route::has('password.request'))
                        <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                            ลืมรหัสผ่าน
                        </a>
                        @endif

                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@push('script')
@if ($errors->any() || request()->get('NeedLogIn') == 'true')
<script>
    $('#loginModal').modal('toggle')
</script>
@endif
@endpush
