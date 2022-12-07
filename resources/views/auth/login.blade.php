<form action="{{route('auth.login.login')}}" method="POST">
    @csrf
    <div>
        <label>email</label>
        <input type="email" name="email">
    </div>
    <div>
        <label>password</label>
        <input type="password" name="password">
    </div>
    <button type="submit">Login</button>
</form>