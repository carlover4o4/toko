<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Menu</title>
</head>

<body>
    @include('temp.navbar')
    <div class="container mt-5 justify-content-center d-flex align-items-center">
        <div class="row">
            @foreach ($produk as $p)
                <div class="col-3 mt-5">
                    <div class="card">
                        <img src="{{ asset($p->foto) }}" alt="" class="card-img-top">
                        <div class="card-body">
                            <h4 class="card-title">{{ $p->name }}</h4>
                            <p class="card-text">Rp. {{ $p->price }}</p>
                            <a href="" class="btn btn-danger">Detail</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</html>
