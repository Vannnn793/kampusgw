@extends('admin.layout.main')
@section('title','Edit Post')

@section('content')
<h2 class="fw-bold mb-4">Edit Post</h2>

<div class="card bg-dark border-0 shadow-lg col-lg-8">
    <div class="card-body">
        <form action="{{ route('admin.posts.update',$post) }}"
              method="POST"
              enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input name="title"
                   value="{{ $post->title }}"
                   class="form-control mb-3">

            <input type="file" name="thumbnail" class="form-control mb-3">

            <textarea name="content"
                      rows="6"
                      class="form-control mb-4">{{ $post->content }}</textarea>

            <button class="btn btn-primary">
                Update
            </button>
        </form>
    </div>
</div>
@endsection
