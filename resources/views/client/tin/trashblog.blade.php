<style>
    .__custom_image {
        width: 100%;
        height: 300px;
        object-fit: cover;
    }
</style>
<!-- Start Hero Section -->
    <div class="hero">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-lg-5">
                    <div class="intro-excerpt">
                        <h1>Bài viết</h1>
                        <p class="mb-4">Bài viết được viết ở đây!!!!!!!!!!!!!!</p>
                        <p><a href="" class="btn btn-secondary me-2">Cửa hàng</a><a href="#"
                                class="btn btn-white-outline">Khám phá</a></p>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="hero-img-wrap">
                        <img src="client/images/couch.png" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Hero Section -->



    <!-- Start Blog Section -->
    <div class="blog-section">
        <div class="container">
            <div class="d-flex justify-content-between">
                <a href="{{route('themtin')}}" style="width:180px" class="mb-4 btn btn-primary">Trở về</a>
            </div>
            <div class="row">
                @foreach ($blogs as $item)
                    <div class="col-12 col-sm-6 col-md-4 mb-5">
                        <div class="post-entry">
                            <a href="{{ route('blog', ['id' => $item->id]) }}" class="post-thumbnail"><img src="/storage/images/{{ $item->urlHinh }}" alt="Image"
                                    class="img-fluid __custom_image"></a>
                            <div class="post-content-entry">
                                <h3><a href="#">{{ $item->tieuDe }}</a></h3>
                                <div class="meta">
                                    <span>by <a href="#">Đăng Trình</a></span> <span>on <a
                                            href="#">{{ date('d-m-Y', strtotime($item->ngayDang)) }}</a></span>
                                    <span>Views: {{ $item->xem }}</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{route('khoiphuc', $item->id)}}" class="btn btn-info">Khôi phục</a>
                    </div>
                @endforeach
                {{ $blogs->links('vendor.pagination.bootstrap-5') }}

            </div>
        </div>
    </div>
    <!-- End Blog Section -->