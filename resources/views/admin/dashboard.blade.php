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

@endsection
