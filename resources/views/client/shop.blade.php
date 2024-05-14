  <!-- Start Hero Section -->
  <div class="hero">
      <div class="container">
          <div class="row justify-content-between">
              <div class="col-lg-5">
                  <div class="intro-excerpt">
                      <h1>Shop</h1>
                  </div>
              </div>
              <div class="col-lg-7">

              </div>
          </div>
      </div>
  </div>
  <!-- End Hero Section -->



  <div class="untree_co-section product-section before-footer-section">
      <div class="container">
          <div class="row">

              @foreach ($getAllProduct as $item)
                  <div class="col-12 col-md-4 col-lg-3 mb-5">
                      <a class="product-item" href="detail/{{ $item->slug }}">
                          <img src="{{ $item->image }}" class="img-fluid product-thumbnail">
                          <h3 class="product-title">{{ $item->name }}</h3>

                          @if ($item->price_promotion === null || $item->price_promotion === 0)
                              <strong class="product-price">{{ number_format($item->price, 0, '.', '.') }} VNĐ</strong>
                          @else
                              <del class="product-price">{{ number_format($item->price, 0, '.', '.') }} VNĐ</del>
                              <p class="fw-bold text-danger product-price">
                                  {{ number_format($item->price_promotion, 0, '.', '.') }} VNĐ</p>
                          @endif

                          <span class="icon-cross">
                              <img src="client/images/cross.svg" class="img-fluid">
                          </span>
                      </a>
                  </div>
              @endforeach



          </div>
      </div>
  </div>
