<form action="{{route('auth.register-affiliate-member.store')}}" method="POST">
    @csrf
    <div>
        <label>first_name1</label>
        <input name="first_name" type="text">
    </div>
    <div>
        <label>notification_status15</label>
        <input name="notification_status" type="radio" value="0">
        <input name="notification_status" type="radio" value="1">
    </div>
    <div>
        <label>last_name2</label>
        <input name="last_name" type="text">
    </div>
    <div>
        <label>email3</label>
        <input name="email" type="email">
    </div>
    <div>
        <label>password4</label>
        <input name="password" type="password">
    </div>
    <div>
        <label>bank_name6</label>
        <input name="bank_name" type="text">
    </div>
    <div>
        <label>branch7</label>
        <input name="branch" type="text">
    </div>
    <div>
        <label>account8</label>
        <input name="account" type="text">
    </div>
    <div>
        <label>account_number9</label>
        <input name="account_number" type="text">
    </div>
    <div>
        <label>phone10</label>
        <input name="phone" type="text">
    </div>
    <div>
        <label>postal_code11</label>
        <input name="postal_code" type="text">
    </div>
    <div>
        <label>prefecture12</label>
        <input name="prefecture" type="text">
    </div>
    <div>
        <label>city13</label>
        <input name="city" type="text">
    </div>
    <div>
        <label>address14</label>
        <input name="address" type="text">
    </div>
    <button type="submit">Login</button>
</form>