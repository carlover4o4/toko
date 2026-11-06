<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/dataTables.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <script src="https://cdn.datatables.net/3.1.5/js/dataTables.min.js"></script>
    <title></title>
</head>

<body>
    @include('temp.navbarADM')
    <div class="container mt-5">
        <a href="{{ route('tambah') }}" method="GET" class="btn btn-success">Add</a>
        <table class="table" id="tabelpemantapan">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Foto</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $p)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ asset('storage/' .$p->foto) }}" style="height: 100px;" alt=""></td>
                        <td>{{ $p->name }}</td>
                        <td>Rp. {{ $p->price }}</td>
                        <td>{{ $p->description }}</td>
                        <td>{{ $p->qty }}</td>
                        <td>
                            <a href="" class="btn btn-warning">Edit</a>
                            <a href="{{ route('hapus', $p->id) }}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
<script>new DataTable('#tabelpemantapan')</script>
</html>
