@extends('admin.layout.main')
@section('title','Prodi')

@section('content')

<h2 class="fw-bold mb-4">Manage Prodi</h2>

<div class="row g-4">

    {{-- Form --}}
    <div class="col-lg-4">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Add Prodi</h5>

                <form method="POST"
                      action="{{ route('admin.prodis.store') }}"
                      enctype="multipart/form-data">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label text-light fw-semibold">Faculty</label>
                        <select name="faculty_id"
                                class="form-select bg-dark text-light border-secondary"
                                required>
                            <option value="">-- Choose Faculty --</option>
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}">
                                    {{ $faculty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light fw-semibold">Prodi Name</label>
                        <input name="name"
                               class="form-control bg-dark text-light border-secondary"
                               required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light fw-semibold">Description</label>
                        <textarea name="description"
                                  class="form-control bg-dark text-light border-secondary"
                                  rows="2"></textarea>
                    </div>

                    <div class="mb-3">
                        <label class="form-label text-light fw-semibold">Goal</label>
                        <textarea name="goal"
                                  class="form-control bg-dark text-light border-secondary"
                                  rows="2"></textarea>
                    </div>

                    {{-- <div class="mb-3">
                        <label class="form-label text-light fw-semibold">Curriculum</label>
                        <textarea name="curriculum"
                                  class="form-control bg-dark text-light border-secondary"
                                  rows="2"></textarea>
                    </div> --}}

                    <div class="mb-3">
                        <label class="form-label text-light fw-semibold">Image</label>
                        <input type="file"
                               name="image"
                               class="form-control bg-dark text-light border-secondary">
                    </div>

                    <button class="btn btn-info w-100 fw-bold">
                        Save Prodi
                    </button>
                </form>
            </div>
        </div>
    </div>

    {{-- Table --}}
    <div class="col-lg-8">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Prodi List</h5>

                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Prodi</th>
                            <th>Faculty</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($prodis as $prodi)
                        <tr>
                            <td class="fw-semibold">{{ $prodi->name }}</td>
                            <td class="text-info">{{ $prodi->faculty->name }}</td>
                            <td>
                                @if($prodi->image)
                                    <img src="{{ asset('storage/'.$prodi->image) }}"
                                         width="60"
                                         class="rounded">
                                @else
                                    <span class="text-muted">-</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.prodis.edit', $prodi->id) }}" class="btn btn-sm btn-info">
                                    Kurikulum
                                </a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3" class="text-center text-muted">
                                No prodi data
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection
