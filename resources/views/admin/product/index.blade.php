<div class="py-3 d-flex align-items-center justify-content-between">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">Thêm sản phẩm</button>
    <a href="{{ route('trash.Category') }}" class="btn btn-danger ">Xem thùng rác <i class="fa-solid fa-trash"></i></a>
</div>

@if (session('alerts'))
    @foreach (session('alerts') as $type => $message)
        <div class="alert alert-{{ $type }}">
            {{ $message }}
        </div>
    @endforeach
@endif

<div class="table-responsive">
<table class="table datatable">
    <thead>
        <tr>
            <th>
                Tên
            </th>
            <th>Hình ảnh</th>
            <th>Mô tả</th>
            <th>Lượt xem</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Giá khuyến mãi</th>
            <th>Loại</th>
            <th>Ẩn/Hiện</th>
            <th>Đặc biệt</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($allProducts as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td><img style="" width="80px" src="/client/images/productsImage/{{ $item->image }}" alt=""></td>
                <td>{!!$item->description !!}</td>
                <td>{{ $item->views }}</td>
                <td>{{ $item->stock }}</td>
                <td>{{ number_format($item->price, 0, '.', '.') }} VNĐ</td>
                <td>{{ number_format($item->price_promotion, 0, '.', '.') }} VNĐ</td>
                <td>{{ $item->name_category }}</td>
                <td>{{ $item->hidden }}</td>
                <td>{{ $item->special }}</td>

                <td>
                    <div class="d-flex">
                        <a href="{{ route('edit.Product', $item->id_product ) }}" class="btn btn-warning text-light">
                            <i class="fa-solid fa-pen-to-square"></i>
                        </a>

                        <form class="mx-2" action="{{ route('delete.Product') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id_product  }}" name="idCategory">
                            <button type="submit" class="btn btn-danger text-light">
                                <i class="fa-solid fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>

{{ $allProducts->links('vendor.pagination.bootstrap-5') }}

{{-- modal --}}
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Thêm sản phẩm</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('Store.Category') }}" method="post">
                <div class="modal-body">
                    @csrf
                    <div class="mb-3">
                        <label for="danhmuc" class="form-label">Tên danh mục</label>
                        <input type="text" class="form-control" id="danhmuc" name="name_category">
                    </div>
                    <div class="mb-3 d-flex">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" value="0" name="hidden"
                                id="an">
                            <label class="form-check-label" for="an">
                                Ẩn
                            </label>
                        </div>
                        <div class="form-check mx-3">
                            <input class="form-check-input" type="radio" value="1" name="hidden"
                                id="hien" checked>
                            <label class="form-check-label" for="hien">
                                Hiện
                            </label>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Xác nhận</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- modal --}}

<script>
    function confirmDelete() {
        confirm("Bạn có muốn xóa danh mục này không ?");
    }
</script>
