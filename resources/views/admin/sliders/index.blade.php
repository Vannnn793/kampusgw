@extends('admin.layout.main')

@section('content')
<div class="container mt-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Pengaturan Headline Slider</h5>
        </div>
        
        <div class="card-body">
            <form action="{{ route('admin.sliders.update',1) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-light">
                            <tr>
                                <th width="5%" class="text-center">Aktif</th>
                                <th width="10%">Thumbnail</th>
                                <th width="30%">Judul Asli Berita</th>
                                <th>Judul Headline (Custom)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr class="{{ $post->is_slider ? 'table-warning' : '' }}">
                                
                                <td class="text-center">
                                    <input type="checkbox" 
                                           name="sliders[{{ $post->id }}][active]" 
                                           class="form-check-input p-2"
                                           style="cursor: pointer;"
                                           {{ $post->is_slider ? 'checked' : '' }}>
                                </td>

                                <td>
                                    @if($post->thumbnail)
                                        <img src="{{ asset('storage/'.$post->thumbnail) }}" width="60" class="rounded">
                                    @else
                                        <span class="text-muted text-xs">No img</span>
                                    @endif
                                </td>

                                <td>
                                    <small class="text-muted">Original:</small><br>
                                    {{ $post->title }}
                                </td>

                                <td>
                                    <input type="text" 
                                           name="sliders[{{ $post->id }}][title]" 
                                           class="form-control"
                                           placeholder="Tulis headline singkat di sini..."
                                           value="{{ $post->slider_title }}">
                                    <small class="text-muted" style="font-size: 10px;">
                                        *Kosongkan jika ingin menggunakan judul asli
                                    </small>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end mt-3">
                    <button type="submit" class="btn btn-primary px-5">
                        <i class="fas fa-save"></i> Simpan Perubahan Slider
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection