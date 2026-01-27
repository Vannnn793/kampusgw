@extends('admin.layout.main')
@section('title','Posts')

@section('content')
<h2 class="fw-bold mb-4">Manage Posts</h2>

<div class="row g-4">

    {{-- FORM CREATE POST --}}
    <div class="col-lg-4">
        <div class="card bg-dark border-0 shadow-lg h-100">
            <div class="card-body">
                <h5 class="fw-bold mb-4 text-primary">
                    <i class="bi bi-pencil-square me-1"></i> Add Post
                </h5>

                <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <label class="form-label text-secondary">Judul Berita</label>
                    <input name="title" class="form-control mb-3" placeholder="Masukkan judul berita" required>

                    <label class="form-label text-secondary">Kategori</label>
                    <select name="category_id" class="form-control mb-3" required>
                        <option value="">-- Pilih Kategori --</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>


                    <label class="form-label text-secondary">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control mb-3">

                    <label class="form-label text-secondary">Isi Berita</label>
                    <textarea name="content" rows="6" class="form-control mb-4" placeholder="Tulis isi berita..." required></textarea>

                    <button class="btn btn-primary w-100">
                        <i class="bi bi-send me-1"></i> Publish
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- LIST POSTS --}}
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
