  <!-- Start Hero Section -->
  <div class="hero">
      <div class="container">
          <div class="row justify-content-between">
              <div class="col-lg-5">
                  <div class="intro-excerpt">
                      <h1>Cửa hàng</h1>
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
              <div class="col-2 col-md-2 col-lg-2 mb-5">
                  <form action="" method="get">
                      <select class="form-select" aria-label="Default select example">
                          @foreach ($getAllCategory as $item)
                              <option value="{{ $item->id }}">{{ $item->name_category }}</option>
                          @endforeach
                      </select>
                      <button type="submit" class="btn btn-primary w-100 mt-4">Tìm kiếm</button>
                  </form>
              </div>

              <div class="col-10 col-md-10 col-lg-10 ">
                  <div class="row">
                      @foreach ($getAllProduct as $item)
                          <div class="col-12 col-md-4 col-lg-3 mb-5">
                              <a class="product-item" href="detail/{{ $item->slug }}">
                                  <img src="/client/images/productsImage/{{ $item->image }}"
                                      onerror="this.src='/error/404.gif'" class="img-fluid product-thumbnail">
                                  <h3 class="product-title">{{ $item->name }}</h3>

                                  @if ($item->price_promotion === null || $item->price_promotion === 0)
                                      <strong class="product-price">{{ number_format($item->price, 0, '.', '.') }}
                                          VNĐ</strong>
                                  @else
                                      <del class="product-price">{{ number_format($item->price, 0, '.', '.') }}
                                          VNĐ</del>
                                      <p class="fw-bold text-danger product-price">
                                          {{ number_format($item->price_promotion, 0, '.', '.') }} VNĐ</p>
                                  @endif

                                  <span class="icon-cross">
                                      <img src="client/images/cross.svg" class="img-fluid">
                                  </span>
                              </a>
                          </div>
                      @endforeach
                      {{ $getAllProduct->links('vendor.pagination.bootstrap-5') }}
                  </div>

                  @if($user) 
                  <h4 class="mt-5 mb-4 text-black">Sản phẩm đã xem</h4>
                  <div class="row">
                      @foreach ($viewers as $item)
                          <div class="col-12 col-md-4 col-lg-3 mb-5">
                              <a class="product-item" href="detail/{{ $item->slug }}">
                                  <img src="/client/images/productsImage/{{ $item->image }}"
                                      onerror="this.src='/error/404.gif'" class="img-fluid product-thumbnail">
                                  <h3 class="product-title">{{ $item->name }}</h3>

                                  @if ($item->price_promotion === null || $item->price_promotion === 0)
                                      <strong class="product-price">{{ number_format($item->price, 0, '.', '.') }}
                                          VNĐ</strong>
                                  @else
                                      <del class="product-price">{{ number_format($item->price, 0, '.', '.') }}
                                          VNĐ</del>
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
                  @endif
              </div>

          </div>
      </div>
  </div>
