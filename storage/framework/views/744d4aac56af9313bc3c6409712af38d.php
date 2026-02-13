<?php $__env->startSection('title', 'Manajemen Alumni'); ?>

<?php $__env->startSection('content'); ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-4 border-bottom">
    <div>
        <h1 class="h2 fw-bold">Data Alumni</h1>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                <li class="breadcrumb-item active" aria-current="page">Alumni</li>
            </ol>
        </nav>
    </div>
</div>

<div class="row">
    
    
    <div class="col-lg-4 mb-4">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3">
                <h6 class="m-0 fw-bold text-primary"><i class="bi bi-person-plus-fill me-2"></i>Tambah Alumni Baru</h6>
            </div>
            
            <div class="card-body">
                
                
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger p-2 small">
                        <ul class="mb-0 ps-3">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>

                <form action="<?php echo e(route('admin.alumni.store')); ?>" method="POST" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-person"></i></span>
                            <input type="text" name="nama" class="form-control" placeholder="Nama Alumni" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Fakultas</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-building"></i></span>
                            <select name="faculty_id" id="faculty" class="form-select" required>
                                <option value="">-- Pilih Fakultas --</option>
                                <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Program Studi</label>
                        <div class="input-group">
                            <span class="input-group-text bg-light"><i class="bi bi-mortarboard"></i></span>
                            <select name="prodi_id" id="prodi" class="form-select" required>
                                <option value="">-- Pilih Fakultas Dulu --</option>
                            </select>
                        </div>
                    </div>

                    <div class="row g-2 mb-3">
                        <div class="col-6">
                            <label class="form-label small fw-bold text-muted">Perusahaan</label>
                            <input type="text" name="perusahaan" class="form-control form-control-sm" placeholder="PT...">
                        </div>
                        <div class="col-6">
                            <label class="form-label small fw-bold text-muted">Jabatan</label>
                            <input type="text" name="jabatan" class="form-control form-control-sm" placeholder="Posisi">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-bold text-muted">Testimoni / Pesan</label>
                        <textarea name="pesan_kesan" class="form-control" rows="3" placeholder="Kesan selama kuliah..."></textarea>
                    </div>

                    <div class="mb-4">
                        <label class="form-label small fw-bold text-muted">Foto Profil</label>
                        <input type="file" name="foto" class="form-control">
                        <div class="form-text small">Format: JPG, PNG. Max: 2MB.</div>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">
                        <i class="bi bi-save me-1"></i> Simpan Data
                    </button>
                </form>
            </div>
        </div>
    </div>

    
    <div class="col-lg-8">
        
        
        <?php if(session('success')): ?>
            <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                <i class="bi bi-check-circle me-2"></i> <?php echo e(session('success')); ?>

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 fw-bold text-primary"><i class="bi bi-people me-2"></i>Daftar Alumni</h6>
                <div class="card-tools">
                    <input type="text" class="form-control form-control-sm" placeholder="Cari alumni...">
                </div>
            </div>

            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-3" width="5%">#</th>
                                <th width="35%">Alumni</th>
                                <th width="30%">Karir</th>
                                <th width="20%">Akademik</th>
                                <th width="10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__empty_1 = true; $__currentLoopData = $alumni; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td class="ps-3"><?php echo e($loop->iteration); ?></td>
                                
                                
                                <td>
                                    <div class="d-flex align-items-center">
                                        
                                        <div class="me-3">
                                            <?php if($a->foto): ?>
                                                <img src="<?php echo e(asset('storage/'.$a->foto)); ?>" 
                                                     class="rounded-circle object-fit-cover border" 
                                                     width="45" height="45" alt="Avatar">
                                            <?php else: ?>
                                                <div class="bg-secondary-subtle text-secondary rounded-circle d-flex align-items-center justify-content-center" style="width: 45px; height: 45px;">
                                                    <i class="bi bi-person-fill fs-5"></i>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                        <div>
                                            <div class="fw-bold text-dark"><?php echo e($a->nama); ?></div>
                                            <small class="text-muted fst-italic">"<?php echo e(Str::limit($a->pesan_kesan, 20)); ?>"</small>
                                        </div>
                                    </div>
                                </td>

                                
                                <td>
                                    <div class="fw-semibold text-dark"><?php echo e($a->perusahaan ?? '-'); ?></div>
                                    <div class="small text-muted"><?php echo e($a->jabatan ?? 'Belum bekerja'); ?></div>
                                </td>

                                
                                <td>
                                    <div class="small text-dark"><?php echo e($a->prodi->name ?? '-'); ?></div>
                                    <div class="small text-secondary" style="font-size: 0.75rem;"><?php echo e($a->faculty->name ?? '-'); ?></div>
                                </td>

                                
                                <td>
                                    <div class="btn-group">
                                        
                                        <form action="#" method="POST" onsubmit="return confirm('Hapus?');" class="d-inline">
                                            <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                                            <button class="btn btn-sm btn-light text-danger" title="Hapus">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                    Belum ada data alumni.
                                </td>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#faculty').change(function() {
            let faculty_id = $(this).val();
            let prodiSelect = $('#prodi');

            // Reset dan Loading
            prodiSelect.html('<option value="">Loading...</option>');
            prodiSelect.prop('disabled', true);

            if(faculty_id) {
                $.get('/admin/get-prodi/' + faculty_id, function(data) {
                    let option = '<option value="">-- Pilih Prodi --</option>';
                    
                    if(data.length > 0) {
                        data.forEach(function(item) {
                            option += `<option value="${item.id}">${item.name}</option>`;
                        });
                    } else {
                        option = '<option value="">Tidak ada prodi</option>';
                    }

                    prodiSelect.html(option);
                    prodiSelect.prop('disabled', false);
                }).fail(function() {
                    prodiSelect.html('<option value="">Gagal memuat prodi</option>');
                });
            } else {
                prodiSelect.html('<option value="">-- Pilih Fakultas Dulu --</option>');
                prodiSelect.prop('disabled', true);
            }
        });
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/alumni/index.blade.php ENDPATH**/ ?>