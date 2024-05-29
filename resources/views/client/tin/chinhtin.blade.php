<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>

@if (session('alerts'))
    @foreach (session('alerts') as $type => $message)
        <div class="alert alert-{{ $type }}">
            {{ $message }}
        </div>
    @endforeach
@endif

<div class="container">
    <h2 class="btn btn-primary mt-4">Thêm tin mới</h2>
    <form action="{{ route('update.Blog') }}" method="post" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="id" class="form-control" value="{{ $blog['id'] }}" id="id">
        <div class="mb-3">
            <label for="tieude" class="form-label">Tiêu đề</label>
            <input type="text" name="tieuDe" class="form-control" value="{{ $blog['tieuDe'] }}" id="tieude">
        </div>
        <div class="mb-3">
            <label for="tomtat" class="form-label">Tóm tắt</label>
            <input type="text" name="tomTat" value="{{ $blog['tomTat'] }}" class="form-control" id="tomtat">
        </div>
        <div class="mb-3">
            <div>
                <label for="hinhanh" class="form-label" style="width:80px">Hình ảnh</label>
                <label for="hinhanh"><i class="btn btn-primary fa-solid fa-upload"></i></label>
            </div>
            
            <input type="file" name="file" class="form-control d-none" id="hinhanh">

            @if ($blog['urlHinh'] !== '')
                <img id="imageBlog" class="mt-2" width="300" height="300" src="/storage/images/{{ $blog['urlHinh'] }}"
                    alt="">
            @else
                <div class="image-preview" id="imagePreview">No image selected</div>
            @endif
        </div>

        <div class="mb-3">
            <select name="idLT" id="" class="form-control">
                <option value="">Loại tin</option>
                @foreach ($loaitin as $item)
                    <option {{ $item->id == $blog['idLT'] ? 'selected' : '' }} value="{{ $item->id }}">
                        {{ $item->ten }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content">Nội dung</label>
            <textarea name="noidung" id="content" height="400px" class="form-control">{{ $blog['noiDung'] }}</textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Cập nhật tin</button>
        </div>

    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });

    const hinhanh = document.getElementById('hinhanh');
    const imagePreview = document.getElementById('imagePreview');
    const imageBlog = document.getElementById('imageBlog');

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
</script>
</script>
