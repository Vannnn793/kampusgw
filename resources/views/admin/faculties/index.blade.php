@extends('admin.layout.main')
@section('title','Faculties')

@section('content')

<h2 class="fw-bold mb-4">Manage Faculties</h2>

<div class="row g-4">

    <div class="col-lg-4">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Add Faculty</h5>

                <form method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label" style="color: whitesmoke"><h5>Faculty Name</h5></label>
                        <input name="name" class="form-control bg-dark text-light border-secondary">
                    </div>

                    <div class="mb-3">
                        <label class="form-label" style="color: whitesmoke"><h5>Description</h5></label>
                        <textarea name="description" class="form-control bg-dark text-light border-secondary"></textarea>
                    </div>

                    <button class="btn btn-info w-100 fw-bold">
                        Save Faculty
                    </button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <h5 class="fw-bold mb-3">Faculty List</h5>

                <table class="table table-dark table-hover align-middle">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($faculties as $faculty)
                        <tr>
                            <td class="fw-semibold">{{ $faculty->name }}</td>
                            <td class="text-secondary">{{ $faculty->description }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

</div>

@endsection
