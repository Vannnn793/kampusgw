@extends('admin.layout.main')
@section('title','Admin Admissions')

@section('content')

<h2 class="fw-bold mb-4">Data Pendaftar Mahasiswa Baru</h2>

{{-- SUCCESS ALERT --}}
@if(session('success'))
    <div class="alert alert-success shadow-sm">
        {{ session('success') }}
    </div>
@endif

<div class="card bg-dark border-0 shadow">
    <div class="card-body table-responsive">

        <table class="table table-dark table-hover align-middle mb-0">
            <thead class="table-secondary text-dark">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Fakultas</th>
                    <th>Prodi</th>
                    <th>Tahun Akademik</th>
                </tr>
            </thead>
            <tbody>
                @forelse($admissions as $a)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td class="fw-semibold text-info">{{ $a->nama_lengkap }}</td>
                    <td>{{ $a->email }}</td>
                    <td>
                        <span class="badge bg-info text-dark">
                            {{ $a->no_hp }}
                        </span>
                    </td>
                    <td>{{ $a->faculty->name }}</td>
                    <td>{{ $a->prodi->name }}</td>
                    <td>
                        <span class="badge bg-warning text-dark">
                            {{ $a->tahun_akademik }}
                        </span>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center text-secondary py-4">
                        Belum ada pendaftar
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>

    </div>
</div>

@endsection
