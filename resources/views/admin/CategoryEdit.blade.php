<form method="post" action="{{route('Store.Category')}}">
    @csrf
    <div class="mb-3">
        <input type="hidden" class="form-control" id="tendanhmuc" name="id" value="{{ $categoryById->id }}">
      <label for="tendanhmuc" class="form-label">Tên danh mục</label>
      <input type="text" class="form-control" id="tendanhmuc" name="name_category" value="{{ $categoryById->name_category }}">
    </div>

    <div class="mb-3 d-flex">
        <div class="form-check">
            <input class="form-check-input" type="radio" {{ ($categoryById->hidden == 0) ? 'checked' : '' }} value="0" name="hidden"
                id="an">
            <label class="form-check-label" for="an">
                Ẩn
            </label>
        </div>
        <div class="form-check mx-3">
            <input class="form-check-input" type="radio" {{ ($categoryById->hidden == 1) ? 'checked' : '' }} value="1" name="hidden"
                id="hien">
            <label class="form-check-label" for="hien">
                Hiện
            </label>
        </div>
    </div>

    <button type="submit" class="btn btn-primary">Cập nhật</button>
  </form>
