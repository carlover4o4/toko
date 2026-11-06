<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <title>Tambah</title>
</head>

<body>
    <div class="container mt-5 justify-content-center d-flex align-items-center">
        <form action="{{ route('posttambah') }}" method="POST" class="form-group" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="">Name</label>
                <input name="name" type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Price</label>
                <input name="price" type="number" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Quantity</label>
                <input name="qty" type="number" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Description</label>
                <input name="description" type="text" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Foto</label>
                <input name="foto" type="file" accept="image/*" class="form-control">
            </div>

            <div class="mb-3">
                <label for="">Kategori</label>
                <select name="kategori_id" id="" class="form-control">
                    @foreach ($kategori as $k)
                        <option value="{{ $k->id }}">{{ $k->name }}</option>
                    @endforeach
                </select>
            </div>

            <a href="{{ route('admin') }}" class="btn btn-secondary">Batalkan</a>
            <button type="submit" class="btn btn-primary">Add</button>
        </form>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $item)
                    <p>{{ $item }}</p>
                @endforeach
            </div>
        @endif
    </div>
</body>
<script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>

</html>
