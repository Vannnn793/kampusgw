@extends('admin.layout.main')
@section('title','Dashboard')

@section('content')

<h2 class="fw-bold mb-4">Admin Dashboard</h2>

<div class="row g-4">

    <div class="col-md-3">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="fw-bold text-info">
                    {{ $facultyCount }}
                </h3>
                <p class="text-secondary mb-0">Faculties</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="fw-bold text-primary">
                    {{ $prodiCount }}
                </h3>
                <p class="text-secondary mb-0">Prodi</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="fw-bold text-success">
                    {{ $alumniCount }}
                </h3>
                <p class="text-secondary mb-0">Alumni</p>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h3 class="fw-bold text-warning">
                    {{ $partnerCount }}
                </h3>
                <p class="text-secondary mb-0">Partners</p>
            </div>
        </div>
    </div>

</div>
<br>
<br>
<div class="col-lg-8">
        <div class="card bg-dark border-0 shadow-lg">
            <div class="card-body">
                <h5 class="fw-bold mb-4 text-primary">
                    <i class="bi bi-newspaper me-1"></i> Posts List
                </h5>

                <div class="table-responsive">
                    <table class="table table-dark table-hover align-middle">
                        <thead class="text-secondary">
                            <tr>
                                <th style="width:60px">#</th>
                                <th>Title</th>
                                <th>Kategori</th>
                                <th>Published</th>
                                <th class="text-end">Action</th>
                            </tr>
                            </thead>

                            <tbody>
                            @forelse($posts as $post)
                            <tr>
                                <td>
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/'.$post->thumbnail) }}"
                                            class="rounded"
                                            width="48" height="48"
                                            style="object-fit:cover">
                                    @else
                                        <span class="text-muted">—</span>
                                    @endif
                                </td>

                                <td class="fw-semibold">{{ $post->title }}</td>

                                <td>
                                    <span class="badge bg-primary bg-opacity-25 text-primary">
                                        {{ $post->category->name ?? '-' }}
                                    </span>
                                </td>

                                <td class="text-secondary">
                                    {{ $post->published_at?->format('d M Y') ?? 'Draft' }}
                                </td>

                                <td class="text-end">
                                    <a href="{{ route('admin.posts.edit',$post) }}"
                                    class="btn btn-sm btn-outline-info me-1">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.posts.destroy',$post) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Hapus post ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="text-center text-muted py-4">
                                    Belum ada berita 😴
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection
