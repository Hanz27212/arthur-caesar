<!DOCTYPE html>
<html>

<head>
    <title>Daftar Pengguna</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background: #f1f3f6;
        }

        .card {
            border-radius: 12px;
        }

        h2,
        h4 {
            font-weight: 600;
        }

        .table td,
        .table th {
            vertical-align: middle;
        }

        .btn-sm {
            padding: 5px 10px;
        }
    </style>
</head>

<body>

    <div class="container mt-5">

        <!-- HEADER -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2>Daftar Pengguna</h2>
            <form action="/logout" method="POST" style="display:inline;">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- ALERT -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- FORM TAMBAH -->
        <div class="card shadow-sm mb-4">
            <div class="card-body">
                <h4 class="mb-3">Tambah Pengguna</h4>

                <form action="/tambah_pengguna" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Masukkan email"
                                required>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Password</label>
                            <input type="text" name="password" class="form-control" placeholder="Masukkan password"
                                required>
                        </div>
                    </div>

                    <button class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>

        <!-- TABLE -->
        <div class="card shadow-sm">
            <div class="card-body">
                <h4 class="mb-3">Data Pengguna</h4>

                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead class="table-dark text-center">
                            <tr>
                                <th style="width: 60px;">No</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td class="text-center">********</td>
                                    <td class="text-center">
                                        <a href="/edit/{{ $user->id_pengguna }}" class="btn btn-warning btn-sm">Edit</a>
                                        <a href="/delete/{{ $user->id_pengguna }}" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Yakin mau hapus?')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

            </div>
        </div>

    </div>

</body>

</html>
