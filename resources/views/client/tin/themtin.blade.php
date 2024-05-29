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
    <form action="{{ route('taotin') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="tieude" class="form-label">Tiêu đề</label>
            <input type="text" name="tieuDe" class="form-control" id="tieude">
        </div>
        <div class="mb-3">
            <label for="tomtat" class="form-label">Tóm tắt</label>
            <input type="text" name="tomTat" class="form-control" id="tomtat">
        </div>
        <div class="mb-3">
            <label for="hinhanh" class="form-label">Hình ảnh</label>
            <input type="file" name="file" class="form-control" id="hinhanh">
        </div>

        <div class="mb-3">
            <select name="idLT" id="" class="form-control">
                <option value="">Loại tin</option>
                @foreach ($loaitin as $item)
                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="content">Nội dung</label>
            <textarea name="noidung" id="content" height="400px" class="form-control"></textarea>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Tạo tin mới</button>
        </div>

    </form>
</div>

<script>
    ClassicEditor
        .create(document.querySelector('#content'))
        .catch(error => {
            console.error(error);
        });
</script>
