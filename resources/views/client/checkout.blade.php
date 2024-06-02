  <!-- Start Hero Section -->
  <div class="hero">
      <div class="container">
          <div class="row justify-content-between">
              <div class="col-lg-5">
                  <div class="intro-excerpt">
                      <h1>Checkout</h1>
                  </div>
              </div>
              <div class="col-lg-7">

              </div>
          </div>
      </div>
  </div>
  <!-- End Hero Section -->

  <div class="untree_co-section">
      <div class="container">
          <div class="row">
              <div class="col-md-6 mb-5 mb-md-0">
                  <h2 class="h3 mb-3 text-black">Hóa đơn chi tiết</h2>
                  <div class="p-3 p-lg-5 border bg-white">
                      <div class="form-group row">
                          <div class="col-md-12">
                              <label for="c_fname" class="text-black">Full Name <span
                                      class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="c_fname" name="c_fname">
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-12">
                              <label for="c_address" class="text-black">Address <span
                                      class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="c_address" name="c_address"
                                  placeholder="Street address">
                          </div>
                      </div>

                      <div class="form-group row">
                          <div class="col-md-6">
                              <label for="c_email_address" class="text-black">Email Address <span
                                      class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="c_email_address" name="c_email_address">
                          </div>
                          <div class="col-md-6">
                              <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                              <input type="text" class="form-control" id="c_phone" name="c_phone"
                                  placeholder="Phone Number">
                          </div>
                      </div>

                      <div class="form-group">
                          <label for="c_order_notes" class="text-black">Ghi chú</label>
                          <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control"
                              placeholder="Write your notes here..."></textarea>
                      </div>

                  </div>
              </div>
              <div class="col-md-6">

                  <div class="row mb-5">
                  </div>

                  <div class="row mb-5">
                      <div class="col-md-12">
                          <h2 class="h3 mb-3 text-black">Đơn hàng của bạn</h2>
                          <div class="p-3 p-lg-5 border bg-white">
                              <table class="table site-block-order-table mb-5">
                                  <thead>
                                      <th>Product</th>
                                      <th>Total</th>
                                  </thead>
                                  <tbody>

                                      @php
                                          $total = 0;
                                      @endphp
                                      @foreach ($getcheckoutbyuser as $item)
                                          <tr>
                                              <td class="text-black font-weight-bold"><strong>{{ $item->name }} x
                                                      {{ $item->quantity }} </strong></td>
                                              <input type="hidden" id=""
                                                  value="{{ $total += $item->price * $item->quantity }}">
                                              <td class="text-black font-weight-bold"><strong>
                                                      {{ number_format($item->price * $item->quantity, 0, '.', '.') }}
                                                      đ</strong></td>
                                          </tr>
                                      @endforeach

                                      <tr>
                                          <td class="text-black font-weight-bold"><strong>Phí vận chuyển:</strong></td>
                                          <td class="text-black font-weight-bold"><strong><span id="total_ship">0
                                                      VNĐ</span></strong>
                                          </td>
                                      </tr>
                                      <tr>
                                          <td class="text-black font-weight-bold"><strong>Tổng tiền:</strong></td>
                                          <td class="text-black font-weight-bold"><strong><span id="total_order">0
                                                      VNĐ</span></strong>
                                          </td>
                                      </tr>
                                  </tbody>
                              </table>

                              <div class="border p-3 mb-3">
                                  <h3 class="h6 mb-0 w-100">Phương thức thanh toán</h3>
                              </div>

                              <div class="border p-3 mb-3">
                                  <h3 class="h6 mb-0"><a class="d-block" data-bs-toggle="collapse"
                                          href="#collapsecheque" role="button" aria-expanded="false"
                                          aria-controls="collapsecheque">Tiền mặt</a></h3>

                                  <div class="collapse" id="collapsecheque">
                                      <div class="py-2">
                                          <p class="mb-0">Thực hiện thanh toán trực tiếp vào tài khoản ngân hàng của
                                              chúng tôi. Vui lòng
                                              sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn đặt
                                              hàng của bạn sẽ không được vận chuyển
                                              cho đến khi tiền đã vào tài khoản của chúng tôi. Hãy thanh toán trực tiếp
                                              vào tài khoản ngân hàng của chúng tôi. Vui lòng
                                              sử dụng ID đơn hàng của bạn làm tài liệu tham khảo thanh toán. Đơn đặt
                                              hàng của bạn sẽ không được vận chuyển
                                              cho đến khi tiền đã được xóa trong tài khoản của chúng tôi.</p>
                                      </div>
                                  </div>
                              </div>

                              <div class="form-group">
                                  <button class="btn btn-primary" onclick="window.location='thankyou.html'">Tiến hành
                                      thanh toán</button>
                              </div>

                          </div>
                      </div>
                  </div>

              </div>
          </div>
          <!-- </form> -->
      </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script>
      jQuery(document).ready(function() {
          let address = jQuery('#c_address').on('change', function() {
              let value_address = jQuery(this).val();

              let price_total = @php echo $total @endphp;

              jQuery.ajaxSetup({
                  headers: {
                      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                  }
              });
              jQuery.ajax({
                  type: "post",
                  url: `https://cms.laravel.dangtrinh/calculate-shipping-fee`,
                  data: {
                      to_district_id: value_address
                  },
                  success: function(response) {
                      if (response) {
                          let shipping = response.data;

                          let ship = shipping.total.toLocaleString('vi-VN', {
                              style: 'currency',
                              currency: 'VND'
                          })

                          let total_order = price_total - shipping.total

                          jQuery('#total_order').html(total_order.toLocaleString(
                              'vi-VN', {
                                  style: 'currency',
                                  currency: 'VND'
                              }));

                          jQuery('#total_ship').html(ship);
                      }
                  }
              });

          })
      });
  </script>
