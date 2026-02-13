@extends('admin.layout.main')
@section('content')
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <h6 class="fw-bold text-primary m-0">Kelola Halaman Statis</h6>
    </div>
    <div class="card-body">
        <table class="table">
            <thead>
                <tr>
                    <th>Judul Halaman</th>
                    <th>Slug</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pages as $page)
                <tr>
                    <td>{{ $page->title }}</td>
                    <td><code>/p/{{ $page->slug }}</code></td>
                    <td>
                        <a href="{{ route('admin.pages.edit', $page->id) }}" class="btn btn-sm btn-warning">Edit Isi</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection