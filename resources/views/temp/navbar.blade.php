<nav class="nav bg-danger">
    <a href="#" class="nav-link active text-white" aria-current="page">BakeryOs</a>
    <a href="" class="nav-link active text-white">Home</a>
    <a href="{{ route('menu') }}" class="nav-link active text-white">Plushie</a>
    <a href="" class="nav-link active text-white">Keranjang</a>
    <a href="" class="nav-link active text-white">Checkout</a>

    <form action="{{ route('logout') }}" method="POST" class="ms-auto d-inline">
        @csrf
        <button type="submit" class="btn nav-link text-white">Logout</button>
    </form>
</nav>
