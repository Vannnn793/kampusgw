@extends('admin.layout.main')

@section('content')

{{-- STYLE WARNA CUSTOM --}}
<style>
    /* Card umum */
    .custom-card {
        background: #1f2937;
        border: 1px solid #374151;
        color: #e5e7eb;
    }

    /* Header card */
    .custom-header-form {
        background: linear-gradient(90deg,#2563eb,#1e40af);
        color: white;
    }

    .custom-header-table {
        background: linear-gradient(90deg,#0f172a,#1e293b);
        color: white;
    }

    /* Input */
    .custom-card input,
    .custom-card select,
    .custom-card textarea {
        background-color: #111827;
        border: 1px solid #374151;
        color: #e5e7eb;
    }

    .custom-card input:focus,
    .custom-card select:focus,
    .custom-card textarea:focus {
        background-color: #111827;
        border-color: #2563eb;
        box-shadow: none;
        color: white;
    }

    /* Table */
    .custom-table thead {
        background-color: #1e293b;
        color: white;
    }

    .custom-table tbody tr {
        background-color: #111827;
        color: #e5e7eb;
    }

    .custom-table tbody tr:hover {
        background-color: #1f2937;
    }

    /* Button */
    .btn-custom {
        background: linear-gradient(90deg,#2563eb,#1d4ed8);
        border: none;
    }

    .btn-custom:hover {
        opacity: 0.9;
    }
</style>


<div class="container-fluid">
    <div class="row">

        {{-- FORM INPUT --}}
        <div class="col-md-5">

            <div class="card shadow custom-card">
                <div class="card-header custom-header-form">
                    Tambah Alumni
                </div>

                <div class="card-body">

                    <form action="{{ route('admin.alumni.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label>Nama Alumni</label>
                            <input type="text" name="nama" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label>Fakultas</label>
                            <select name="faculty_id" id="faculty" class="form-control" required>
                                <option value="">-- Pilih Fakultas --</option>
                                @foreach ($faculties as $faculty)
                                    <option value="{{ $faculty->id }}">
                                        {{ $faculty->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Prodi</label>
                            <select name="prodi_id" id="prodi" class="form-control" required>
                                <option value="">-- Pilih Prodi --</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label>Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Jabatan</label>
                            <input type="text" name="jabatan" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label>Pesan & Kesan</label>
                            <textarea name="pesan_kesan" class="form-control" rows="3"></textarea>
                        </div>

                        <div class="mb-3">
                            <label>Foto Alumni</label>
                            <input type="file" name="foto" class="form-control">
                        </div>

                        <button type="submit" class="btn btn-custom w-100 text-white">
                            Simpan Alumni
                        </button>

                    </form>

                </div>
            </div>

        </div>


        {{-- TABEL --}}
        <div class="col-md-7">

            <div class="card shadow custom-card">
                <div class="card-header custom-header-table">
                    Data Alumni
                </div>

                <div class="card-body table-responsive">

                    <table class="table table-bordered custom-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Fakultas</th>
                                <th>Prodi</th>
                                <th>Perusahaan</th>
                                <th>Jabatan</th>
                                <th>Foto</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach ($alumni as $a)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $a->nama }}</td>
                                <td>{{ $a->faculty->name ?? '-' }}</td>
                                <td>{{ $a->prodi->name ?? '-' }}</td>
                                <td>{{ $a->perusahaan }}</td>
                                <td>{{ $a->jabatan }}</td>
                                <td>
                                    @if($a->foto)
                                        <img src="{{ asset('storage/'.$a->foto) }}" width="60">
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

        </div>

    </div>
</div>


{{-- AJAX PRODI --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$('#faculty').change(function() {

    let faculty_id = $(this).val();

    $('#prodi').html('<option>Loading...</option>');

    $.get('/admin/get-prodi/' + faculty_id, function(data) {

        let option = '<option value="">-- Pilih Prodi --</option>';

        data.forEach(function(item) {
            option += `<option value="${item.id}">${item.name}</option>`;
        });

        $('#prodi').html(option);

    });

});
</script>

@endsection
