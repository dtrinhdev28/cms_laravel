<form action="{{ route('password.email') }}" method="post">
    @csrf
    <input type="email" placeholder="Nhập địa chỉ email">
    <button type="submit">Gửi</button>
</form>
