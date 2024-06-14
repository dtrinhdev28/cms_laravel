@if (session('alerts'))
    @foreach (session('alerts') as $type => $message)
        <div class="alert alert-{{ $type }}">
            {{ $message }}
        </div>
    @endforeach
@endif


<form method="post" action="{{ route('userStore') }}" class="row g-3">
    @csrf
    <div class="col-md-6">
        <label for="name" class="form-label">Họ tên</label>
        <input name="name" type="text" class="form-control" id="name" value="{{old('name')}}">
        @error('name')
            <span style="font-size: 14px" class="mt-2 text-danger">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-md-6">
        <label for="email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control" id="email" value="{{old('email')}}">
        @error('email')
    <span style="font-size: 14px" class="mt-2 text-danger">{{ $message }}</span>
@enderror
    </div>
    <div class="col-md-6">
        <label for="numberphone" class="form-label">Số điện thoại</label>
        <input name="numberphone" type="number" class="form-control" id="numberphone" value="{{old('numberphone')}}">
        @error('numberphone')
    <span style="font-size: 14px" class="mt-2 text-danger">{{ $message }}</span>
@enderror
    </div>
    <div class="col-md-6">
        <label for="password" class="form-label">Mật khẩu</label>
        <input name="password" type="password" class="form-control" id="password" value="{{old('password')}}">
        @error('password')
    <span style="font-size: 14px" class="mt-2 text-danger">{{ $message }}</span>
@enderror
    </div>
    <div class="col-md-6">
        <label for="address" class="form-label">Địa chỉ</label>
        <input name="address" type="text" class="form-control" id="address" value="{{old('address')}}">
    </div>
    <div class="col-md-6">
        <label for="avatar" class="form-label">Hình ảnh</label>
        <input name="avatar" type="file" class="form-control" id="avatar">
    </div>
    <div class="col-md-6">
        <label for="role" class="form-label">Vai trò</label>
        <select class="form-control" name="role" id="role">
            <option value="1">User</option>
            <option value="0">Admin</option>
        </select>
    </div>

    <div class="col-12">
        <button class="btn btn-primary" type="submit">Tạo user</button>
    </div>
</form>
