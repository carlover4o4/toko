<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Checkout</title>
</head>

<body>
    @include('temp.navbar')
    <form action="{{ route('postcheckout', $detailtransaksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="container mt-5">
            <h5>Upload Your Payment Proof</h5>
            <hr>
            <div class="row">

                <div class="col-4">
                    <div class="card">
                        <img src="{{ asset('storage/' . $produk->foto) }}" alt="" class="card-img-top">
                    </div>
                </div>

                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">{{ $produk->name }}</h3>
                            <p class="card-text">Rp. {{ number_format($produk->price, 0, ',', '.') }}</p>
                            <p class="card-text">Rp. {{ number_format($detailtransaksi->totalprice, 0, ',', '.') }}</p>
                            <p class="card-text">Banyak: {{ $detailtransaksi->qty }}</p>
                            <hr>
                            <div class="mb-2">
                                <label for="" class="form-control"><b>Payment Proof</b></label>
                                <input name="bukti_transaksi" type="file" accept="image/*" required>
                            </div>
                            <hr>
                            <h5>Details: </h5>
                            <p>Please transfer to the following bank account and wait for our confirmation.</p>
                            <button class="btn btn-success">Upload</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</html>
