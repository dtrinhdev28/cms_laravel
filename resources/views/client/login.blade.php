

<section class="">
    <!-- Jumbotron -->
    <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%)">
        <div class="container">

            @if (session('alerts'))
    @foreach (session('alerts') as $type => $message)
        <div class="alert alert-{{ $type }}">
            {{ $message }}
        </div>
    @endforeach
@endif

            <div class="row gx-lg-5 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <h1 class="my-5 display-3 fw-bold ls-tight">
                        Mua bán điện thoại <br />
                        <span class="text-primary"></span>
                    </h1>
                    <p style="color: hsl(217, 10%, 50.8%)">
                        Đăng nhập để nhập nhiều điều bất ngờ
                    </p>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card">
                        <div class="card-body py-5 px-md-5">
                            <h2 class="fw-bold mb-5">Đăng nhập</h2>

                            <form action="/login" action="{{ route('loginAuth') }}" method="post">
                                @csrf
                                <!-- 2 column grid layout with text inputs for the first and last names -->
                                <!-- Email input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example3">Địa chỉ email</label>
                                    <input name="email" type="email" id="form3Example3" class="form-control" />
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>

                                <!-- Password input -->
                                <div data-mdb-input-init class="form-outline mb-4">
                                    <label class="form-label" for="form3Example4">Mật khẩu</label>
                                    <input name="password" type="password" id="form3Example4" class="form-control" />
                                    @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>


                                <!-- Submit button -->
                                <button type="submit" class="btn btn-primary btn-block mb-4 w-100">
                                    Đăng nhập
                                </button>

                                <!-- Register buttons -->
                                <div class="text-center">
                                    <p>hoặc đăng nhập với</p>
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
