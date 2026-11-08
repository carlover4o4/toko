<nav class="nav bg-secondary">
    <form action="{{ route('logout') }}" method="POST" class="ms-auto d-inline">
        @csrf
        <button type="submit" class="btn nav-link text-white">Logout</button>
    </form>
</nav>
