<div class="container mt-5">
    <div class="row">
        @foreach ($allProductByCategory as $item)
        <div class="col-md-6 col-lg-2 mb-5">
                <a class="product-item" href="/detail/{{ $item->slug }}">
                    <img src="/client/images/productsImage/{{ $item->image }}" onerror="this.src='/error/404.gif'"
                        class="__custom_image img-fluid product-thumbnail">
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
        {{ $allProductByCategory->links('vendor.pagination.bootstrap-5') }}

    </div>
</div>
