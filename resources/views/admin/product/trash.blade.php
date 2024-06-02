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

        @foreach ($ProductTrashed as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td><img style="" width="80px" src="/storage/images/products/{{ $item->image }}" alt=""></td>
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
                        <form class="mx-2" action="{{ route('restore.Product') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id_product  }}" name="idProduct">
                            <button type="submit" class="btn btn-info text-light">
                                <i class="fa-solid fa-rotate-left"></i>
                            </button>
                        </form>

                        <form class="mx-2" action="{{ route('forceDelete.Product') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id_product  }}" name="idProduct">
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

{{ $ProductTrashed->links('vendor.pagination.bootstrap-5') }}
