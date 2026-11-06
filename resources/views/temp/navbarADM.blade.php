<nav class="nav bg-secondary">
    <form action="{{ route('logout') }}" method="POST" class="ms-auto d-inline">
        @csrf
        <button type="submit" class="btn btn-danger">Logout</button>
    </form>
</nav>
