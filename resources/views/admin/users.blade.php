<div class="py-3">
    <a href="{{ route('createUser') }}" class="btn btn-primary">Create user</a>

</div>

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
                        <i class="bi bi-pencil-fill"></i>
                    </a>
                    <bnt href="" onclick="confirm({{ $item->id }})" class="btn btn-danger text-light">
                        <i class="bi bi-trash-fill"></i>
                    </bnt>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $getAllUser->links('vendor.pagination.bootstrap-5') }}

<script>
    function confirm(id) {
        console.log(id);
    }
</script>