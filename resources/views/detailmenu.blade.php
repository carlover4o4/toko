<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Detail Menu</title>
</head>

<body>
    @include('temp.navbar')
    <div class="container mt-5">
        <form action="{{ route('postkeranjang', $produk->id) }}" method="POST" class="form-group">
            @csrf

            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('storage/' .$produk->foto) }}" alt="" class="card-img-top">
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $produk->name }}</h3>
                            <p class="card-text">{{ $produk->description }}</p>
                            <p class="card-text">Rp. {{ number_format($produk->price, 0, ',', '.') }}</p>
                            <input type="number" name="banyak" class="form-control" required>
                            <hr>
                            <h5>Keterangan: </h5>
                            <p>Ini merupakan detail dari barang.</p>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <h5>Kategori: {{ $produk->kategori->name }}</h5>
                            <img src="" alt="" class="card-img-top">
                        </div>
                    </div>
                    <button class="btn btn-success mt-3 form-control">Buy</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</html>
