@extends('admin.layout.main')
@section('title','PMB')

@section('content')
<div class="container-fluid p-4">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Informasi PMB</h4>
            <small class="text-muted">Kelola jalur & informasi penerimaan mahasiswa baru</small>
        </div>
        <a href="{{ route('admin.pmb-info.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Tambah PMB
        </a>
    </div>

    {{-- CARD --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="80">Poster</th>
                            <th>Judul</th>
                            <th width="150">Tanggal</th>
                            <th width="120">Status</th>
                            <th width="150" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse ($pmbInfos as $pmb)
                        <tr>
                            <td>
                                <img src="{{ asset('storage/'.$pmb->image) }}"
                                     class="rounded shadow-sm"
                                     width="60"
                                     height="80"
                                     style="object-fit:cover">
                            </td>

                            <td>
                                <div class="fw-semibold">{{ $pmb->judul }}</div>
                                <small class="text-muted">
                                    {{ Str::limit($pmb->deskripsi, 60) }}
                                </small>
                            </td>

                            <td>
                                {{ \Carbon\Carbon::parse($pmb->tanggal)->format('d M Y') }}
                            </td>

                            <td>
                                @if($pmb->is_active === 1)
                                    <span class="badge bg-success">Aktif</span>
                                @else
                                    <span class="badge bg-secondary">Nonaktif</span>
                                @endif
                            </td>

                            <td class="text-center">
                                <a href="{{ route('admin.pmb-info.edit', $pmb->id) }}"
                                   class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>

                                <form action="{{ route('admin.pmb-info.destroy', $pmb->id) }}"
                                      method="POST"
                                      class="d-inline"
                                      onsubmit="return confirm('Yakin hapus data PMB ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                Belum ada data PMB
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
