@extends('admin.layout.main')
@section('title','Posts')
@section('content')
<h2 class="fw-bold mb-4">Manage Posts</h2>

<div class="row g-4">

    <div class="col-lg-4">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Add Faculty</h5>


                    <form action="{{ route('admin.posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <input name="title" class="form-control mb-3" placeholder="Judul Berita">

                    <input type="file" name="thumbnail" class="form-control mb-3">

                    <textarea name="content" rows="6" class="form-control mb-3" placeholder="Isi berita"></textarea>

                    <button class="btn btn-primary">Publish</button>
                    </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Posts List</h5>

                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Title</th>
                            <th>Published At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td class="fw-semibold">{{ $post->title }}</td>
                            <td class="text-secondary">
                                {{ $post->published_at ? $post->published_at->format('d M Y') : 'Draft' }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection