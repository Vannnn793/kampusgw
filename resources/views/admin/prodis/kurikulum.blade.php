@extends('admin.layout.main')
@section('title','Kurikulum')

@section('content')
<h2 class="fw-bold mb-4">Manage Kurikulum</h2>

@if(session('success'))
<div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-md-5">
        <div class="card bg-dark border-0">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Tambah Kurikulum</h5>

                <form method="POST" action="{{ route('admin.prodis.update', $prodi->id) }}">
                @csrf
                @method('PUT')
                <select name="prodi_id" class="form-select mb-3">
                    @foreach($prodis as $p)
                        <option value="{{ $p->id }}">{{ $p->name }}</option>
                    @endforeach
                </select>

                @for($s=1;$s<=8;$s++)
                <div class="card mb-3">
                    <div class="card-header fw-bold">Semester {{ $s }}</div>
                    <div class="card-body" id="semester-{{ $s }}">
                        <div class="d-flex gap-2 mb-2">
                            <input name="courses[{{ $s }}][0][name]"
                                class="form-control"
                                placeholder="Nama Matkul">
                            <input name="courses[{{ $s }}][0][sks]"
                                class="form-control"
                                placeholder="SKS">
                        </div>

                        <button type="button"
                                class="btn btn-sm btn-secondary"
                                onclick="addCourse({{ $s }})">
                            + Matkul
                        </button>
                    </div>
                </div>
                @endfor

                <button class="btn btn-info w-100 fw-bold">Simpan</button>
                </form>

            </div>
        </div>
    </div>

    <div class="col-md-7">
        @foreach($curriculums as $cur)
            <div class="card mb-3">
                <div class="card-body">
                    <h6 class="fw-bold">
                        {{ $cur->prodi->name }} – Semester {{ $cur->semester }}
                    </h6>
                    <ul class="mb-0">
                        @foreach($cur->courses as $c)
                            <li>{{ $c->name }} ({{ $c->sks }} SKS)</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
let counter = {};

function addCourse(semester) {
    counter[semester] = counter[semester] ?? 1;

    document.getElementById(`semester-${semester}`)
        .insertAdjacentHTML('beforeend',
        `<div class="d-flex gap-2 mb-2">
            <input name="courses[${semester}][${counter[semester]}][name]"
                   class="form-control"
                   placeholder="Nama Matkul">
            <input name="courses[${semester}][${counter[semester]}][sks]"
                   class="form-control"
                   placeholder="SKS">
        </div>`);

    counter[semester]++;
}
</script>

@endsection
