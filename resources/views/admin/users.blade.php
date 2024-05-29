<div class="py-3 d-flex align-items-center justify-content-between">
    <a href="{{ route('createUser') }}" class="btn btn-primary">Create user</a>
    <a href="{{ route('trash.user') }}" class="btn btn-danger ">Xem thùng rác <i class="fa-solid fa-trash"></i></a>
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
                Name
            </th>
            <th>Email</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Roles</th>
            <th>Active</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($getAllUser as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>{{ $item->email }}</td>
                <td>{{ $item->address }}</td>
                <td>{{ $item->numberphone }}</td>
                <td>
                    @if ($item->role === '1')
                        <span class="badge text-bg-secondary">Client</span>
                        @elseif($item->role === '0')
                        <span class="badge text-light text-bg-info">Admin</span>
                    @endif
                </td>

                <td>
                    <a href="" class="btn btn-warning text-light">
                        <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                    <form action="{{ route('delete.user') }}" method="post">
                        @csrf
                        <input type="hidden" value="{{ $item->id }}" name="idUser">
                        <button type="submit" class="btn btn-danger text-light">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $getAllUser->links('vendor.pagination.bootstrap-5') }}

<script>
    function confirmDelete(id) {
        confirm("Bạn có muốn xóa tài khoản này không ?");
    }
</script>
