<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<form action="{{route('Store.Product')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" name="id" value="{{ $ProductID->id_product }}">

    <div class="row mb-3">
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="">Tên sản phẩm</label>
            <input type="text" name="name" class="form-control" value="{{ $ProductID->name }}">
        </div>
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="">Lượt xem</label>
            <input type="text" name="views" class="form-control" value="{{ $ProductID->views }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="type_product">Loại sản phẩm</label>
            <select name="category_id" class="form-control" id="type_product">
                @foreach ($categorys as $category)
                    <option {{ $ProductID->category_id == $category->id ? 'selected' : '' }}
                        value="{{ $category->id }}">{{ $category->name_category }}</option>
                @endforeach
            </select>
        </div>
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="">Số lượng sản phẩm</label>
            <input type="text" name="stock" class="form-control" value="{{ $ProductID->stock }}">
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 col-md-6 col-xl-6 ">
            <label class="form-label" for="">Giá sản phẩm</label>
            <div class="input-group">
                <input type="text" name="price" class="form-control" value="{{ $ProductID->price }}">
                <span class="input-group-text" id="basic-addon2">VNĐ</span>
            </div>
        </div>
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="">Giá khuyến mãi</label>
            <div class="input-group">
                <input type="text" name="price_promotion" class="form-control"
                    value="{{ $ProductID->price_promotion }}">
                <span class="input-group-text" id="basic-addon2">VNĐ</span>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="">Sản phẩm đặc biệt</label>
            <select name="special" class="form-control" id="">
                <option {{ $ProductID->special == 0 ? 'selected' : '' }} value="0">Bình thường</option>
                <option {{ $ProductID->special == 1 ? 'selected' : '' }} value="1">Đặc biệt</option>
            </select>
        </div>
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="">Ẩn/hiện sản phẩm </label>
            <select name="hidden" class="form-control" id="">
                <option {{ $ProductID->hidden == 0 ? 'selected' : '' }} value="0">Ẩn</option>
                <option {{ $ProductID->hidden == 1 ? 'selected' : '' }} value="1">Hiện</option>
            </select>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-12 col-md-12 col-xl-12">
            <label for="content">Mô tả sản phẩm</label>
            <textarea class="form-control" name="description" id="content" style="height: 100px">{{ $ProductID->description }}</textarea>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="">Hình ảnh sản phẩm</label>
            <input class="form-control" id="hinhanh" type="file" name="image" value="{{ $ProductID->image }}">
            <img class="mt-3" id="imageProduct" width="120" src="/client/images/productsImage/{{ $ProductID->image }}" alt="">
        </div>
        <div class="col-sm-6 col-md-6 col-xl-6">
            <label class="form-label" for="">Thumbnail sản phẩm</label>

            <input class="form-control picture-box" type="file" multiple name="image_products[]">

        </div>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
</form>

<script>
    const hinhanh = document.getElementById('hinhanh');
    const imagePreview = document.getElementById('imagePreview');
    const imageBlog = document.getElementById('imageProduct');

    hinhanh.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                imageBlog.src = this.result;
            });

            reader.readAsDataURL(file);
        } else {
            imageBlog.src = '';
            imageBlog.alt = 'No image selected';
        }
    });

    // toolbar
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
