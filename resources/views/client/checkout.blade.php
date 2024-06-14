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

  <div class="mt-5">
      <div class="container">
          <div class="row">
              <div class="col-md-6 mb-md-0">
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
                          <div class="col-md-4">
                              <label for="province" class="text-black">Tỉnh/Thành phố <span
                                      class="text-danger">*</span></label>
                              <select name="province" class="form-control" id="province">
                                  <option value="">Chọn tỉnh</option>
                              </select>
                          </div>
                          <div class="col-md-4">
                              <label for="district" class="text-black">Huyện/ Quận <span
                                      class="text-danger">*</span></label>
                              <select name="district" class="form-control" id="district">
                                  <option value="">Chọn Huyện/ Quận</option>
                              </select>
                          </div>
                          <div class="col-md-4">
                              <label for="ward" class="text-black">Phường/ Xã <span
                                      class="text-danger">*</span></label>
                              <select name="ward" class="form-control" id="ward">
                                  <option value="">Chọn Phường/ Xã</option>
                              </select>
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
        // tính tiền ship
          let address = jQuery('#ward').on('change', function() {
              let district_id = jQuery('#district').val();
              let to_ward_code = jQuery('#ward').val();

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
                      to_district_id: district_id,
                      to_ward_code: to_ward_code
                  },
                  success: function(response) {
                      if (response.data !== null) {
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
                      } else {
                        alert("Có lỗi xảy ra vui lòng thử lại sau!!")
                        window.location.reload()
                      }
                  }
              });
          })


          // lấy tỉnh
          jQuery.ajaxSetup({
              headers: {
                  'token': 'ed187595-1fec-11ef-a9c4-9e9a72686e07'
              }
          });

          let proviceHTML = '';
          jQuery.ajax({
              type: "POST",
              url: "https://online-gateway.ghn.vn/shiip/public-api/master-data/province",
              data: {
                  token: 'ed187595-1fec-11ef-a9c4-9e9a72686e07'
              },
              success: function(response) {
                  let result = response.data;

                  result.forEach(element => {
                      proviceHTML +=
                          `<option value=${element.ProvinceID}>${element.ProvinceName}</option>`;
                  });
                  jQuery('#province').html(proviceHTML)
              }
          });

          //   lấy huyện
          jQuery("#province").change(function() {
              jQuery.ajaxSetup({
                  headers: {
                      'token': 'ed187595-1fec-11ef-a9c4-9e9a72686e07'
                  }
              });
              let districtHTML = '';
              jQuery.ajax({
                  type: "GET",
                  url: "https://online-gateway.ghn.vn/shiip/public-api/master-data/district",
                  data: {
                      token: 'ed187595-1fec-11ef-a9c4-9e9a72686e07',
                      province_id: jQuery('#province').val()
                  },
                  // dataType: "dataType",
                  success: function(response) {
                      let result = response.data;
                      result.forEach(element => {
                          districtHTML +=
                              `<option value=${element.DistrictID}>${element.DistrictName}</option>`;
                      });
                      jQuery('#district').html(districtHTML)
                  }
              });
          })

          //   lấy xã phưỡng
          jQuery("#district").change(function() {
              jQuery.ajaxSetup({
                  headers: {
                      'token': 'ed187595-1fec-11ef-a9c4-9e9a72686e07'
                  }
              });
              let wardHTML = '';
              jQuery.ajax({
                  type: "GET",
                  url: "https://online-gateway.ghn.vn/shiip/public-api/master-data/ward",
                  data: {
                    //   token: 'ed187595-1fec-11ef-a9c4-9e9a72686e07',
                      district_id: jQuery('#district').val()
                  },
                  // dataType: "dataType",
                  success: function(response) {
                      let result = response.data;
                      result.forEach(element => {
                          wardHTML +=
                              `<option value=${element.WardCode}>${element.WardName}</option>`;
                      });
                      jQuery('#ward').html(wardHTML)
                  }
              });
          })
      });
  </script>
