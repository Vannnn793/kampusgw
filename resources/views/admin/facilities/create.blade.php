@extends('admin.layout.main')
@section('title','Tambah Fasilitas')
@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Tambah Fasilitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Tambah Fasilitas Baru</h3>
        </div>
        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('admin.facilities.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="mb-3">
                    <label for="name" class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Gambar (Opsional)</label>
                    <input type="file" class="form-control" id="image" name="image" accept="image/*">
                    <small class="text-muted">Format: jpg, png, jpeg. Maksimal 2MB.</small>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data</button>
                <a href="{{ url()->previous() }}" class="btn btn-secondary">Batal</a>

            </form>
            </div>
    </div>
</div>

</body>
</html>
@endsection