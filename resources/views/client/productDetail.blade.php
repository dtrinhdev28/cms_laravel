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
                        <img style="max-width: 100%; max-height: 100vh; margin: auto;" class="rounded-4 fit"
                            src="{{ $productBySlug->image }}" />
                    </span>
                </div>
                {{-- <div class="d-flex justify-content-center mb-3">
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                        href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp"
                        class="item-thumb">
                        <img width="60" height="60" class="rounded-2"
                            src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big1.webp" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                        href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp"
                        class="item-thumb">
                        <img width="60" height="60" class="rounded-2"
                            src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big2.webp" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                        href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp"
                        class="item-thumb">
                        <img width="60" height="60" class="rounded-2"
                            src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big3.webp" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                        href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp"
                        class="item-thumb">
                        <img width="60" height="60" class="rounded-2"
                            src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big4.webp" />
                    </a>
                    <a data-fslightbox="mygalley" class="border mx-1 rounded-2" target="_blank" data-type="image"
                        href="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp"
                        class="item-thumb">
                        <img width="60" height="60" class="rounded-2"
                            src="https://mdbcdn.b-cdn.net/img/bootstrap-ecommerce/items/detail1/big.webp" />
                    </a>
                    </div> --}}
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
                            {{ floor((($productBySlug->price - $productBySlug->price_promotion) / $productBySlug->price) * 100) }} %
                        </span>

                    </div>

                    <p>
                        <strong>Mô tả sản phẩm:</strong>
                        {{ $productBySlug->description }}
                    </p>

                    <div class="row">
                        <dt class="col-3">Danh mục:</dt>
                        <dd class="col-9">{{ $productBySlug->name_category }}</dd>

                        <dt class="col-3">Màu sắc:</dt>
                        <dd class="col-9">{{ $productBySlug->colors }}</dd>

                        {{-- <dt class="col-3">Brand</dt>
                        <dd class="col-9">Reebook</dd> --}}
                        <hr>
                        <div class="col-3">Số lượng:</div>
                        <div class="col-9">
                            <div class="input-group mb-4">
                                <span class="input-group-text" id="basic-addon1">-</span>
                                <input type="text" value="1" class="text-center __text-input" placeholder="1">
                                <span class="input-group-text" id="basic-addon1">+</span>
                                <span class="d-flex align-items-center ms-3">{{ $productBySlug->stock }} sản phẩm có sẵn</span>
                            </div>

                        </div>
                    </div>
                    <form method="POST" action=""  class="btn btn-primary shadow-0"> 
                        @csrf

                        <i class="me-1 fa fa-shopping-basket"></i>
                        Add to
                        cart
                    </form>
                    {{-- <a href="#" class="btn btn-primary text-primary shadow-0 mx-3"
                        style="background-color: #3b5d5033;">Buy now</a> --}}
                </div>
            </main>
        </div>
    </div>
</section>
