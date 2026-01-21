<div class="card h-100 shadow-sm border-0">
    <img src="{{ asset('storage/'.$post->thumbnail) }}" class="card-img-top">

    <div class="card-body">
        <small class="text-muted">
            {{ $post->created_at->format('d M Y') }}
        </small>

        <h5 class="fw-semibold mt-2">
            {{ Str::limit($post->title, 60) }}
        </h5>

        <a href="#" class="stretched-link text-decoration-none"></a>
    </div>
</div>
