@extends('admin.layout.main')
@section('title','Edit Faculty')

@section('content')

<form action="{{ route('admin.faculties.update', $faculty->id) }}" method="POST" enctype="multipart/form-data">
@csrf
@method('PUT')
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Edit Faculty</h5>

                <div class="mb-3">
                <label class="form-label" style="color: whitesmoke"><h5>Nama Fakultas</h5></label>
                <input type="text" name="name" class="form-control bg-dark text-light border-secondary" value="{{ $faculty->name }}">
                </div>

                <div class="mb-3">
                <label class="form-label" style="color: whitesmoke"><h5>Gambar Fakultas</h5></label>
                <input type="file" name="image" class="form-control bg-dark text-light border-secondary">
                @if($faculty->image)
                    <img src="{{ asset('storage/'.$faculty->image) }}" class="img-fluid mt-2 rounded" style="max-height:150px">
                @endif
                </div>

                <div class="mb-3">
                <label class="form-label" style="color: whitesmoke"><h5>Description</h5></label>
                <textarea name="description" class="form-control bg-dark text-light border-secondary">{{ $faculty->description }}</textarea>
                </div>

                <div class="mb-3">
                <label class="form-label" style="color: whitesmoke"><h5>Visi</h5></label>
                <textarea name="vision" class="form-control bg-dark text-light border-secondary" rows="3">{{ $faculty->vision }}</textarea>
                </div>

                <div class="mb-3">
                <label class="form-label" style="color: whitesmoke"><h5>Misi</h5></label>
                <textarea name="mission" class="form-control bg-dark text-light border-secondary" rows="3">{{ $faculty->mission }}</textarea>
                </div>

                <div class="mb-3">
                <label class="form-label" style="color: whitesmoke"><h5>Fasilitas</h5></label>
                <textarea name="facilities" class="form-control bg-dark text-light border-secondary" rows="3">{{ $faculty->facilities }}</textarea>
                <small class="text-muted">pisahin pake koma</small>
                </div>

                <button class="btn btn-primary px-4">Simpan</button>

            </div>
        </div>
    </div>
</div>
</form>
@endsection