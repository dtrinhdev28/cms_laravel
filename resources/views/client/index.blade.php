<!-- Start Hero Section -->
<div class="hero">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-5">
                <div class="intro-excerpt">
                    <h1>Xiaomi Ultra <span clsas="d-block">Smart phone</span></h1>
                    <p class="mb-4">Trả góp 0% cho mọi đơn hàng</p>
                    <p><a href="" class="btn btn-secondary me-2">Sản phẩm</a><a href="#"
                            class="btn btn-white-outline">Khám phá</a></p>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="hero-img-wrap">
                    <img src="/client/banner/Thiết kế chưa có tên.png" class="img-fluid">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Hero Section -->

<!-- Start Product Section -->
<div class="product-section">
    <div class="container">
        <div class="row">

            <!-- Start Column 1 -->
            <div class="col-md-12 col-lg-3 mb-5 mb-lg-0">
                <h2 class="mb-4 section-title">Được chế tạo bằng kiệt tác huyền thoại.</h2>
                <p class="mb-4">Deal giá sốc unlock điện thoại xịn. </p>
                <p><a href="shop.html" class="btn">Khám phá</a></p>
            </div>
            <!-- End Column 1 -->

            @foreach ($products as $item)
                <div class="col-12 col-md-4 col-lg-3 mb-5 mb-md-0">
                    <a class="product-item" href="detail/{{ $item->slug }}">
                        <img src="/client/images/productsImage/{{ $item->image }}" onerror="this.src='/error/404.gif'"
                            class="img-fluid product-thumbnail">
                        <h3 class="product-title">{{ $item->name }}</h3>

                        @if ($item->price_promotion === null || $item->price_promotion === 0)
                            <strong class="product-price">{{ number_format($item->price, 0, '.', '.') }}
                                VNĐ</strong>
                        @else
                            <del class="product-price">{{ number_format($item->price, 0, '.', '.') }} VNĐ</del>
                            <p class="fw-bold text-danger product-price">
                                {{ number_format($item->price_promotion, 0, '.', '.') }} VNĐ</p>
                        @endif

                        <span class="icon-cross">
                            <img src="/client/images/cross.svg" class="img-fluid">
                        </span>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Product Section -->

<!-- Start Why Choose Us Section -->
<div class="why-choose-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-lg-6">
                <h2 class="section-title">Tại sao chọn chúng tôi?</h2>
                <p>Furni là đơn vị cung cấp thiết bị điện tử, smart phone hiện đại với giá cả phải chăng. Với tôn chỉ
                    hoạt động "Xây dựng chất lượng".</p>

                <div class="row my-5">
                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/client/images/truck.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Vận chuyển nhanh & miễn phí</h3>
                            <p>Giúp bạn giao hàng đến người nhận nhanh hơn 6 tiếng so với các đơn vị vận chuyển khác..
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/client/images/bag.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Dễ dàng mua sắm</h3>
                            <p>Dễ dàng thuận lợi mua hàng. Cửa hàng có mặt nhiều nơi.
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/client/images/support.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Hỗ trợ 24/7</h3>
                            <p>Dịch vụ 24 7 mang lại nhiều lợi ích cho cả doanh nghiệp và khách hàng.
                            </p>
                        </div>
                    </div>

                    <div class="col-6 col-md-6">
                        <div class="feature">
                            <div class="icon">
                                <img src="/client/images/return.svg" alt="Image" class="imf-fluid">
                            </div>
                            <h3>Dễ dàng đổi trả</h3>
                            <p>
                            </p>
                        </div>
                    </div>

                </div>
            </div>

            <div class="col-lg-5">
                <div class="img-wrap">
                    <img src="/client/images/why-choose-us-img.jpg" alt="Image" class="img-fluid">
                </div>
            </div>

        </div>
    </div>
</div>
<!-- End Why Choose Us Section -->

<!-- Start We Help Section -->
{{-- <div class="we-help-section">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-7 mb-5 mb-lg-0">
                    <div class="imgs-grid">
                        <div class="grid grid-1"><img src="/client/images/img-grid-1.jpg" alt="Untree.co"></div>
                        <div class="grid grid-2"><img src="/client/images/img-grid-2.jpg" alt="Untree.co"></div>
                        <div class="grid grid-3"><img src="/client/images/img-grid-3.jpg" alt="Untree.co"></div>
                    </div>
                </div>
                <div class="col-lg-5 ps-lg-5">
                    <h2 class="section-title mb-4">Chúng tôi giúp bạn lựa chọn điện thoại dễ dàng</h2>
                    <p></p>

                    <ul class="list-unstyled custom-list my-4">
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                        <li>Donec vitae odio quis nisl dapibus malesuada</li>
                    </ul>
                    <p><a herf="#" class="btn">Explore</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End We Help Section -->

    <!-- Start Popular Product -->
    <div class="popular-product">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="/client/images/product-1.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Nordic Chair</h3>
                            <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                            <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="/client/images/product-2.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Kruzo Aero Chair</h3>
                            <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                            <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mb-4 mb-lg-0">
                    <div class="product-item-sm d-flex">
                        <div class="thumbnail">
                            <img src="/client/images/product-3.png" alt="Image" class="img-fluid">
                        </div>
                        <div class="pt-3">
                            <h3>Ergonomic Chair</h3>
                            <p>Donec facilisis quam ut purus rutrum lobortis. Donec vitae odio </p>
                            <p><a href="#">Read More</a></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Popular Product -->

    <!-- Start Testimonial Slider -->
    <div class="testimonial-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 mx-auto text-center">
                    <h2 class="section-title">Testimonials</h2>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="testimonial-slider-wrap text-center">

                        <div id="testimonial-nav">
                            <span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
                            <span class="next" data-controls="next"><span
                                    class="fa fa-chevron-right"></span></span>
                        </div>

                        <div class="testimonial-slider">

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                                                    odio
                                                    quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                                    vulputate
                                                    velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
                                                    tristique senectus et netus et malesuada fames ac turpis egestas.
                                                    Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="/client/images/person-1.png" alt="Maria Jones"
                                                        class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                                                    odio
                                                    quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                                    vulputate
                                                    velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
                                                    tristique senectus et netus et malesuada fames ac turpis egestas.
                                                    Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="/client/images/person-1.png" alt="Maria Jones"
                                                        class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                            <div class="item">
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 mx-auto">

                                        <div class="testimonial-block text-center">
                                            <blockquote class="mb-5">
                                                <p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
                                                    odio
                                                    quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
                                                    vulputate
                                                    velit imperdiet dolor tempor tristique. Pellentesque habitant morbi
                                                    tristique senectus et netus et malesuada fames ac turpis egestas.
                                                    Integer convallis volutpat dui quis scelerisque.&rdquo;</p>
                                            </blockquote>

                                            <div class="author-info">
                                                <div class="author-pic">
                                                    <img src="/client/images/person-1.png" alt="Maria Jones"
                                                        class="img-fluid">
                                                </div>
                                                <h3 class="font-weight-bold">Maria Jones</h3>
                                                <span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <!-- END item -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<!-- End Testimonial Slider -->


<style>
    .__custom_image {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }
</style>

<!-- Start Blog Section -->
<div class="blog-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-6">
                <h2 class="section-title">Tin tức</h2>
            </div>
            <div class="col-md-6 text-start text-md-end">
                <a href="{{ route('blogs') }}" class="more">Xem tất cả</a>
            </div>
        </div>

        <div class="row">
            @foreach ($blogs as $item)
                <div class="col-12 col-sm-6 col-md-4 mb-4 mb-md-0">
                    <div class="post-entry">
                        <a href="blog/{{ $item->id }}" class="post-thumbnail"><img class="__custom_image"
                                src="/client/images/{{ $item->urlHinh }}" alt="Image" class="img-fluid"></a>
                        <div class="post-content-entry">
                            <h3><a href="#">{{ $item->tieuDe }}</a></h3>
                            <div class="meta">
                                <span>{{ date('Y-m-d', strtotime($item->ngayDang)) }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
<!-- End Blog Section -->
