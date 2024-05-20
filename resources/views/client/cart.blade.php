  <div class="untree_co-section before-footer-section">
      <div class="container">
          <div class="row mb-5">
              {{-- <form class="col-md-12" method="post"> --}}
              <div class="site-blocks-table">

                  @if (session('alerts'))
                      @foreach (session('alerts') as $type => $message)
                          <div class="alert alert-{{ $type }}">
                              {{ $message }}
                          </div>
                      @endforeach
                  @endif

                  <table class="table">
                      <thead>
                          <tr>
                              <th class="product-thumbnail">Image</th>
                              <th class="product-name">Product</th>
                              <th class="product-price">Price</th>
                              <th class="product-quantity">Quantity</th>
                              <th class="product-total">Total</th>
                              <th class="product-remove">Remove</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($getcartbyuser as $item)
                              <tr>
                                  <td class="product-thumbnail">
                                      <a href="detail/{{ $item->slug }}"> <img
                                              src="/client/images/productsImage/{{ $item->image }}"
                                              style="height: 100px" alt="Image" class="img-fluid"></a>
                                  </td>
                                  <td class="product-name">
                                      <h2 class="h5 text-black">{{ $item->name }}</h2>
                                  </td>
                                  <td> {{ number_format($item->price, '0', '.', '.') }} VNĐ</td>
                                  <td>
                                      <div class="input-group mb-3 d-flex align-items-center quantity-container"
                                          style="max-width: 120px;">
                                          <div class="input-group-prepend">
                                              <button class="btn btn-primary decrease" type="button">&minus;</button>
                                          </div>
                                          <input type="text" class="form-control text-center quantity-amount"
                                              value="{{ $item->quantity }}" placeholder=""
                                              aria-label="Example text with button addon"
                                              aria-describedby="button-addon1">
                                          <div class="input-group-append">
                                              <button class="btn btn-primary increase" type="button">&plus;</button>
                                          </div>
                                      </div>
                                  </td>
                                  <td>{{ number_format($item->price * $item->quantity, '0', '.', '.') }} VNĐ</td>
                                  <td>
                                      <form method="POST" action="{{ route('delete.cart') }}">
                                          {{ csrf_field() }}
                                          <input type="hidden" name="cart_id" value="{{ $item->cart }}">
                                          <button class="btn btn-black btn-sm">X</button>
                                      </form>
                                  </td>
                              </tr>
                          @endforeach

                      </tbody>
                  </table>
              </div>
              {{-- </form> --}}
          </div>

          <div class="row">
              <div class="col-md-6">
                  <div class="row mb-5">
                      <div class="col-md-6">
                          <button class="btn btn-outline-primary btn-sm btn-primary">Continue Shopping</button>
                      </div>
                  </div>
                  <div class="row">

                      <form id="vourcher" action="">
                          <div class="col-md-12">
                              <label class="text-black h4" for="coupon">Coupon</label>
                              <p>Enter your coupon code if you have one.</p>
                          </div>
                          <div class="col-md-8 mb-3 mb-md-0">
                              <input type="text" name="coupon" class="form-control py-3" id="coupon"
                                  placeholder="Coupon Code">
                              <p id="messageVourcher"></p>
                          </div>
                          <div class="col-md-4">
                              <button type="button" id="btnCoupon" class="btn btn-primary">Apply Coupon</button>
                          </div>
                      </form>

                  </div>
              </div>
              <div class="col-md-6 pl-5">
                  <div class="row justify-content-end">
                      <div class="col-md-7">
                          <div class="row">
                              <div class="col-md-12 text-right border-bottom mb-5">
                                  <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                              </div>
                          </div>
                          <div class="row mb-2">
                              <div class="col-md-6">
                                  <span class="text-black">Subtotal</span>
                              </div>

                              @php
                                  $sum = 0;
                                  foreach ($getcartbyuser as $item) {
                                      $sum += $item->price * $item->quantity;
                                  }
                              @endphp

                              <div class="col-md-6 text-right">
                                  <strong class="text-black">{{ number_format($sum, '0', '.', '.') }} VNĐ</strong>
                              </div>
                          </div>

                          <div class="row">
                              <div class="col-md-12">
                                  <button class="btn btn-primary btn-lg mt-3 btn-block"
                                      onclick="window.location='checkout'">Proceed To Checkout</button>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>

  {{-- handler Ajax coupon start --}}

  @if (isset($config['jquery']))
      <script src="{{ $config['jquery'] }}"></script>
  @endif

  {{-- <script>
      $(document).ready(function() {
        $('#btnCoupon').click(function(e) {
            e.preventDefault();
        })
      });
  </script> --}}
  {{-- handler Ajax coupon end --}}
