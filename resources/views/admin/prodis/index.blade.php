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

                <form method="POST" action="{{ route('admin.prodis.store') }}">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" style="color: whitesmoke"><h5>Faculty</h5></label>
                        <select name="faculty_id" class="form-select bg-dark text-light border-secondary">
                            @foreach($faculties as $faculty)
                                <option value="{{ $faculty->id }}">
                                    {{ $faculty->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3" style="color: whitesmoke">
                        <label class="form-label"><h5>Prodi Name</h5></label>
                        <input name="name" class="form-control bg-dark text-light border-secondary">
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

                <table class="table table-dark table-hover">
                    <thead>
                        <tr>
                            <th>Prodi</th>
                            <th>Faculty</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($prodis as $prodi)
                        <tr>
                            <td class="fw-semibold">{{ $prodi->name }}</td>
                            <td class="text-info">{{ $prodi->faculty->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection
