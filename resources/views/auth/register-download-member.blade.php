<form action="{{route('auth.register-download-member.store')}}" method="POST">
    @csrf
    <div>
        <label>First name</label>
        <input name="first_name" type="text">
    </div>
    <div>
        <label>Last name</label>
        <input name="last_name" type="text">
    </div>
    <div>
        <label>メールアドレス </label>
        <input name="email" type="email">
    </div>
    <div>
        <label>メールマガジン</label>
        <input name="notification_status" type="radio" value="0">
        <input name="notification_status" type="radio" value="1">
    </div>
    <div>
        <label>パスワード </label>
        <input name="password" type="password">
    </div>
    <button type="submit">
        Submit
    </button>
</form>