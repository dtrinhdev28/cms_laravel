<!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
        .cascading-right {
            margin-right: -50px;
        }

        @media (max-width: 991.98px) {
            .cascading-right {
                margin-right: 0;
            }
        }
    </style>

    <!-- Jumbotron -->
    <div class="container py-4">
        <div class="row g-0 align-items-center">
            <div class=" col-lg-6 mb-5 mb-lg-0">
                <div class="rounded-2 card cascading-right"
                    style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
                    <div class="card-body shadow-5">
                        <h2 class="fw-bold">Đăng ký tài khoản</h2>
                        <form method="post" action="{{ route('signup') }}">
                            @csrf
                            <!-- 2 column grid layout with text inputs for the first and last names -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="name">Họ tên <span class="text-danger">*</span> </label>
                                <input type="text" name="name" id="name" class="form-control" />
                                @error('name')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="email">Email<span class="text-danger">*</span> </label>
                                <input type="email" name="email" id="email" class="form-control" />
                                @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="form3Example4">Mật khẩu <span class="text-danger">*</span> </label>
                                <input type="password" name="password" id="form3Example4" class="form-control" />
                                @error('password')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <div class="row">
                                 <!-- nghề nghiệp input -->
                            <div class="form-outline col-6 mb-4">
                                <label class="form-label" for="nghenghiep">Nghề nghiệp</label>
                                <input type="text" name="nghenghiep" id="nghenghiep" class="form-control" />
                                @error('nghenghiep')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>

                            <!-- địa chỉ input -->
                            <div class="form-outline col-6 mb-4">
                                <label class="form-label" for="diachi">Địa chỉ</label>
                                <input type="text" name="diachi" id="diachi" class="form-control" />
                                @error('diachi')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                            </div>
                            </div>

                            <!-- Submit button -->
                            <button type="submit" class="w-100 btn btn-primary btn-block mt-2 mb-4">
                                Đăng ký
                            </button>

                            Bạn đã có tài khoản?
                            <a href="{{route('login')}}">Đăng nhập ngay</a>


                            <!-- Register buttons -->
                            {{-- <div class="text-center">
                                <p>or sign up with:</p>
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
                            </div> --}}
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-5 mb-lg-0">
                <img src="https://image-us.samsung.com/SamsungUS/support/solutions/appliances/APPS_SA_PC_How-to-register-a-samsung-product-21.png" class="w-100 rounded-4 shadow-4" alt="" />
            </div>
        </div>
    </div>
    <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
