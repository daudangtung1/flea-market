<form action="{{route('auth.register-upload-member.store')}}" method="POST">
    @csrf
    <div>
        <label>first_name1</label>
        <input name="first_name" type="text">
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
        <label>username5</label>
        <input name="username" type="text">
    </div>
    <div>
        <label>description6</label>
        <input name="description" type="text">
    </div>
    <div>
        <label>homepage_url7</label>
        <input name="homepage_url" type="text">
    </div>
    <div>
        <label>fb_url8</label>
        <input name="fb_url" type="text">
    </div>
    <div>
        <label>twitter_url9</label>
        <input name="twitter_url" type="text">
    </div>
    <div>
        <label>blog_url10</label>
        <input name="blog_url" type="text">
    </div>
    <div>
        <label>country11</label>
        <input name="country" type="text">
    </div>
    <div>
        <label>bank_name12</label>
        <input name="bank_name" type="text">
    </div>
    <div>
        <label>branch13</label>
        <input name="branch" type="text">
    </div>
    <div>
        <label>account14</label>
        <input name="account" type="text">
    </div>
    <div>
        <label>account_number15</label>
        <input name="account_number" type="text">
    </div>
    <div>
        <label>phone16</label>
        <input name="phone" type="text">
    </div>
    <div>
        <label>postal_code17</label>
        <input name="postal_code" type="text">
    </div>
    <div>
        <label>prefecture18</label>
        <input name="prefecture" type="text">
    </div>
    <div>
        <label>city19</label>
        <input name="city" type="text">
    </div>
    <div>
        <label>address20</label>
        <input name="address" type="text">
    </div>
    <button type="submit">Login</button>
</form>