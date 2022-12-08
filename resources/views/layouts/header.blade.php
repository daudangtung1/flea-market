<header>
    <nav style="display: flex; align-items: center; justify-content: space-between">
        <div>Fleamarket</div>
        <div>
            @if(Auth::check())
            <a href="#">Dashboard</a>
            <form action="{{route('auth.logout')}}" method="POST">
                @csrf
                <button type="submit">Logout</button>
            </form>
            @else
            <a href="{{route('auth.login')}}">Login</a>
            <a href="{{route('auth.register')}}">Register</a>
            @endif
        </div>
    </nav>
</header>