<nav class="nav bg-secondary">
    <a href="{{ route('menu') }}" class="nav-link active text-white" aria-current="page">Store</a>
    <a href="{{ route('menu') }}" class="nav-link active text-white">Home</a>
    <a href="{{ route('keranjang') }}" class="nav-link active text-white">Cart</a>

    <form action="{{ route('logout') }}" method="POST" class="ms-auto d-inline">
        @csrf
        <button type="submit" class="btn nav-link text-white">Logout</button>
    </form>
</nav>
