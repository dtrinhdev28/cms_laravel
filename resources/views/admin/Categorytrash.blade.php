<div class="py-3 d-flex align-items-center justify-content-between">
    <a href="{{ route('create.Category') }}" class="btn btn-primary">Create Category</a>
    <a href="{{ route('trash.Category') }}" class="btn btn-danger ">Xem thùng rác <i class="fa-solid fa-trash"></i></a>
</div>

@if (session('alerts'))
    @foreach (session('alerts') as $type => $message)
        <div class="alert alert-{{ $type }}">
            {{ $message }}
        </div>
    @endforeach
@endif

<table class="table datatable">
    <thead>
        <tr>
            <th>
                Tên danh mục
            </th>
            <th>Thứ tự</th>
            <th>Ẩn hiện</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($getAllcategory as $item)
            <tr>
                <td>{{ $item->name_category }}</td>
                <td>{{ $item->order }}</td>
                <td>{{ $item->hidden }}</td>

                <td>
                    <div class="d-flex">
                        <form action="{{ route('restore.Category') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="idCategory">
                            <button type="submit" class="btn btn-info text-light">
                                <i class="bi bi-reply"></i>
                            </button>
                        </form >
                        <form class="mx-2" action="{{ route('forceDelete.Category') }}" method="post">
                            @csrf
                            <input type="hidden" value="{{ $item->id }}" name="idCategory">
                            <button type="submit" class="btn btn-danger text-light">
                                <i class="bi bi-trash"></i>
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $getAllcategory->links('vendor.pagination.bootstrap-5') }}

<script>
    function confirmDelete() {
        confirm("Bạn có muốn xóa danh mục này không ?");
    }
</script>
