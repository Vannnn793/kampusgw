@extends('admin.layout.main')
@section('title','Add Akreditasi')
@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Akreditasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Akreditasi Baru</h3>
        </div>
        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.accreditations.store') }}" method="POST">
                @csrf
                
                <div class="mb-3">
                    <label class="form-label">Nama Program Studi</label>
                    <select class="form-control" name="program_name" required>
                        <option value="">Pilih Program Studi</option>
                        @foreach ($prodi as $item)
                            <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Peringkat Akreditasi</label>
                        <input type="text" class="form-control" name="level" value="{{ old('level') }}" placeholder="Contoh: A, Unggul, Baik Sekali" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Diterbitkan Oleh</label>
                        <input type="text" class="form-control" name="issued_by" value="{{ old('issued_by') }}" placeholder="Contoh: BAN-PT, LAM-INFOKOM">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Nomor SK / Sertifikat</label>
                        <input type="text" class="form-control" name="certificate_number" value="{{ old('certificate_number') }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Berlaku Sampai</label>
                        <input type="date" class="form-control" name="valid_until" value="{{ old('valid_until') }}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="{{ route('dashboard') }}" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
@endsection