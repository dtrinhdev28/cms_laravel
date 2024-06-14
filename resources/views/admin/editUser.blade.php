@if (session('alerts'))
    @foreach (session('alerts') as $type => $message)
        <div class="alert alert-{{ $type }}">
            {{ $message }}
        </div>
    @endforeach
@endif


<form method="post" action="{{ route('userupdate') }}" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label for="name" class="form-label">Họ tên</label>
        <input name="id" type="hidden" class="form-control" value="{{ $getUserById->id }}">
        <input name="name" type="text" class="form-control" id="name" value="{{ $getUserById->name }}">
        @error('name')
            <span style="font-size: 14px" class="mt-2 text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="email" value="{{ $getUserById->email }}">
        @error('email')
            <span style="font-size: 14px" class="mt-2 text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="numberphone" class="form-label">Số điện thoại</label>
        <input name="numberphone" type="number" class="form-control" id="numberphone"
            value="{{ $getUserById->numberphone }}">
        @error('numberphone')
            <span style="font-size: 14px" class="mt-2 text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="address" class="form-label">Địa chỉ</label>
        <input name="address" type="text" class="form-control" id="address" value="{{ $getUserById->address }}">
    </div>
    <div class="col-md-6">
        <label for="role" class="form-label">Vai trò</label>
        <select class="form-control" name="roles" id="role">
            <option {{ $getUserById->roles == 1 ? 'selected' : '' }} value="1">User</option>
            <option {{ $getUserById->roles == 0 ? 'selected' : '' }} value="1">Admin</option>
        </select>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Cập nhật tài khoản</button>
    </div>
</form>
