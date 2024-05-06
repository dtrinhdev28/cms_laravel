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
      <div class="col-lg-6 mb-5 mb-lg-0">
        <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
          <div class="card-body p-5 shadow-5">
            <h2 class="fw-bold mb-5">Sign up</h2>
            <form method="post" action="/register-new">
              <!-- 2 column grid layout with text inputs for the first and last names -->
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example1">Full name</label>
                    <input type="text" name="fullname" id="form3Example1" class="form-control" />
                  </div>
                <!-- <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <label class="form-label" for="form3Example2">Last name</label>
                    <input type="text" id="form3Example2" class="form-control" />
                  </div>
                </div> -->

              <!-- Email input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3">Email address</label>
                <input type="email" name="email" id="form3Example3" class="form-control" />
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4">Password</label>
                <input type="password" name="password" id="form3Example4" class="form-control" />
              </div>

              <!-- Submit button -->
              <button type="submit" class="w-100 btn btn-primary btn-block mt-2 mb-4">
                Sign up
              </button>

              <!-- Register buttons -->
              <div class="text-center">
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
              </div>
            </form>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mb-5 mb-lg-0">
        <img src="/clients/images/banner/banner_register.jpg" class="w-100 rounded-4 shadow-4" alt="" />
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->