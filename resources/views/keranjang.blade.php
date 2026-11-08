<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Cart</title>
</head>
<body>
    @include('temp.navbar')
    <div class="container mt-5">
        <h5>Cart</h5>
        <hr>
        @foreach ($detailtransaksi as $dt)
            <div class="card mt-5">
                <div class="row">

                    <div class="col-2 p-4">
                        <img src="{{ asset('storage/' .$dt->produk->foto) }}" alt="" class="img-thumbnail">
                    </div>

                    <div class="col-8">
                        <div class="card-body">
                            <h3 class="card-title">{{ $dt->produk->name }}</h3>
                            <p class="card-text">Price Rp. {{ number_format($dt->produk->price, 0, ',', '.') }}</p>
                            <input name="banyak" type="number" class="form-control" value="{{ $dt->qty }}" required>
                            <hr>
                            <p class="card-text">Total Price Rp. {{ number_format($dt->totalprice, 0, ',', '.') }}</p>
                        </div>
                    </div>

                    <div class="col-2 p-5">
                        <a href="{{ route('checkout', $dt->id) }}" class="btn btn-info">Pay</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</body>
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</html>