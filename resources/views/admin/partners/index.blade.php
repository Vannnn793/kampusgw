@extends('admin.layout.main')
@section('title','Mitra')

@section('content')
<h2 class="fw-bold mb-4">Mitra Kampus</h2>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <form method="POST" action="{{ route('admin.partners.store') }}" enctype="multipart/form-data">
                    @csrf

                    <input name="name" class="form-control mb-3" placeholder="Nama Mitra">

                    <input type="file" name="logo" class="form-control mb-3">

                    <button class="btn btn-primary w-100">Tambah Mitra</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-8">
        <div class="card bg-dark border-0 shadow">
            <div class="card-body">
                <table class="table table-dark align-middle">
                    <thead>
                        <tr>
                            <th>Logo</th>
                            <th>Nama</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mitras as $m)
                        <tr>
                            <td width="80">
                                @if($m->logo)
                                <img src="{{ asset('storage/'.$m->logo) }}" class="img-fluid rounded">
                                @endif
                            </td>
                            <td>{{ $m->name }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
