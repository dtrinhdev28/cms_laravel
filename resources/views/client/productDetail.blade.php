<div class="hero pt-4 pb-5">
    <div class="container">
        <nav class="d-flex">
            <h6 class="mb-0">
                <a href="" class="text-white-50">Home</a>
                <span class="text-white-50 mx-2"> > </span>
                <a href="/shop" class="text-white-50">Shop</a>
                <span class="text-white-50 mx-2"> > </span>
                <a href="" class="text-white"><u>Data</u></a>
            </h6>
        </nav>
    </div>
</div>
<section class="py-5 mb-5">
    <div class="container">
        <div class="row">
            <aside class="col-lg-6">

                <div class="border rounded-4 mb-3 d-flex justify-content-center">
                    <span data-fslightbox="mygalley" class="rounded-4" target="_blank" data-type="image">
                        <img style="max-width: 100%; height:500px ;max-height: 100vh; margin: auto;"
                            class="rounded-4 fit" src="/storage/images/products/{{ $productBySlug->image }}" />
                    </span>
                </div>
                <div class="d-flex justify-content-center mb-3">

                    @if ($imageAray !== [''])
                        @foreach ($imageAray as $item)
                            <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="" data-type="image"
                                href="" class="item-thumb">
                                <img width="60" height="60" class="rounded-2"
                                    src="/storage/images/products/{{ $item }}" />
                            </a>
                        @endforeach
                    @endif
                </div>
            </aside>


            <main class="col-lg-6">
                <div class="ps-lg-3">
                    <h4 class="title text-dark">
                        {{ $productBySlug->name }}
                    </h4>
                    <div class="d-flex flex-row my-3">
                        <div class="text-warning mb-1 me-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fas fa-star-half-alt"></i>
                            <span class="ms-1">
                                4.5
                            </span>
                        </div>
                        <span class="text-muted"><i class="fas fa-shopping-basket fa-sm mx-1"></i>154 orders</span>
                        <span class="text-success ms-2">In stock</span>
                    </div>

                    <div class="mb-3 p-4 rounded" style="background-color: #FAFAFA;">

                        @if ($productBySlug->price_promotion === null || $productBySlug->price_promotion === 0)
                            <span class="h6 text-dark">
                                {{ $productBySlug->price }}
                            </span> &nbsp;
                        @else
                            <del class="product-price">{{ number_format($productBySlug->price, 0, '.', '.') }} VNĐ</del>
                            <span class="fw-bold text-danger product-price">
                                {{ number_format($productBySlug->price_promotion, 0, '.', '.') }} VNĐ</span>
                        @endif

                        <span class="badge p-2 bg-danger">
                            {{ floor((($productBySlug->price - $productBySlug->price_promotion) / $productBySlug->price) * 100) }}
                            %
                        </span>

                    </div>

                    <p>
                        <strong>Mô tả sản phẩm:</strong>
                        {!! $productBySlug->description !!}
                    </p>

                    <div class="row">
                        <dt class="col-3">Danh mục:</dt>
                        <dd class="col-9">{{ $productBySlug->name_category }}</dd>

                        <dt class="col-3">Lượt xem:</dt>
                        <dd class="col-9">{{ $productBySlug->views }} <i class="fa-solid fa-eye"></i></dd>

                        {{-- <dt class="col-3">Brand</dt>
                        <dd class="col-9">Reebook</dd> --}}
                        <hr>
                    </div>
                    <form method="POST" action="{{ route('add.to.cart') }}">
                        <div class="row">
                            <div class="col-3">Số lượng:</div>
                            <div class="col-9">
                                <div class="input-group mb-4">
                                    {{-- <span class="input-group-text" id="basic-addon1">-</span>
                                    <input type="text" name="quantitybuy" value="1"
                                        class="text-center __text-input" placeholder="1">
                                    <span class="input-group-text" id="basic-addon1">+</span> --}}

                                    <div class="input-group quantity-container">
                                        <div class="input-group-prepend">
                                            <button class="input-group-text decrease" type="button">&minus;</button>
                                        </div>

                                        <input type="text" name="quantitybuy"
                                            class="__text-input text-center quantity-amount" value="1"
                                            placeholder="" aria-label="Example text with button addon"
                                            aria-describedby="button-addon1">
                                        <div class="input-group-append">

                                            <button class="input-group-text increase" type="button">&plus;</button>
                                        </div>
                                    </div>
                                    <span class="d-flex align-items-center ms-3">{{ $productBySlug->stock }} sản phẩm
                                        có
                                        sẵn</span>
                                </div>


                            </div>
                        </div>
                        @csrf

                        @php
                            if ($productBySlug->price_promotion === null || $productBySlug->price_promotion === 0) {
                                $price_buy = $productBySlug->price;
                            } else {
                                $price_buy = $productBySlug->price_promotion;
                            }

                        @endphp

                        <input type="hidden" name="id_product" value="{{ $productBySlug->id_product }}">
                        <input type="hidden" name="price" value="{{ $price_buy }}">

                        <button class="btn btn-primary shadow-0">
                            <i class="me-1 fa fa-shopping-basket"></i>
                            Add to cart
                        </button>
                    </form>
                    {{-- <a href="#" class="btn btn-primary text-primary shadow-0 mx-3"
                        style="background-color: #3b5d5033;">Buy now</a> --}}
                </div>
            </main>
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

<!-- Demo styles -->
<style>
    .swiper {}

    .swiper-slide {
        text-align: center;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .swiper-slide img {
        height: 200px;
        width: 100%;
    }

    .product-item {
        box-shadow: rgba(100, 100, 111, 0.1) 0px 7px 29px 0px;
    }

    .product-item:hover {
        transition: 0.3s linear;
        box-shadow: rgba(100, 100, 111, 0.4) 0px 7px 29px 0px;
    }

</style>

<div class="container">
    <div class="row">

        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                @foreach ($productsType as $item)
                    <div class="swiper-slide col-12 col-md-2 col-md-3 col-lg-3 mb-5">
                        <a class="product-item" href="/detail/{{ $item->slug }}">
                            <img src="/storage/images/products/{{ $item->image }}"
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
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>

    </div>
</div>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 6,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        autoplay: {
            delay: 2500,
            disableOnInteraction: false,
        },
    });
</script>
