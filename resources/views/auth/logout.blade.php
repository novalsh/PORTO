<form action="{{ route('logout') }}" method="POST">
    {{ csrf_field() }}
    <button type="submit">Logout</button>
</form>
