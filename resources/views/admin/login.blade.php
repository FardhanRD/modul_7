<form action="{{ route('admin.login.submit') }}" method="POST">
    @csrf
    <input type="email" name="email" placeholder="Email Admin" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit">Login Admin</button>
</form>