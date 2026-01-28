@extends('admin.layout.main')
@section('title','Edit Fasilitas')
@section('content')
<!DOCTYPE html>
<html lang="id">
<head>
    <title>Edit Fasilitas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h3>Edit Fasilitas</h3>
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

            <form action="{{ route('facilities.update', $facility->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Nama Fasilitas</label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $facility->name) }}" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar Saat Ini</label>
                    <div class="mb-2">
                        @if($facility->image)
                            <img src="{{ asset('storage/' . $facility->image) }}" width="150" class="img-thumbnail">
                        @else
                            <span class="text-muted">Belum ada gambar</span>
                        @endif
                    </div>
                    <label class="form-label">Ganti Gambar (Opsional)</label>
                    <input type="file" class="form-control" name="image" accept="image/*">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="description" rows="4">{{ old('description', $facility->description) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Update Data</button>
                <a href="{{ route('facilities.index') }}" class="btn btn-secondary">Kembali</a>

            </form>
        </div>
    </div>
</div>

</body>
</html>
@endsection