
<?php $__env->startSection('title', 'Bagikan Cerita Alumni'); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-20 overflow-hidden">
    <div class="absolute inset-0">
        <img src="<?php echo e(asset('storage/images/kampusgw.jpg')); ?>" class="w-full h-full object-cover opacity-30 transform scale-105 animate-slow-zoom" alt="Background">
        <div class="absolute inset-0 bg-slate-900"></div>
        <div class="absolute inset-0 bg-gradient-to-b from-sky-500/10 to-transparent"></div>
    </div>

    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-3xl md:text-5xl font-black text-white mb-4 tracking-tight">
            Bagikan <span class="text-transparent bg-clip-text bg-gradient-to-r from-sky-400 to-blue-400">Inspirasi</span> Anda
        </h1>
        <p class="text-slate-400 max-w-xl mx-auto font-light">
            Cerita sukses Anda adalah motivasi bagi generasi penerus. Biarkan jejak Anda abadi di sini.
        </p>
    </div>
</div>


<section class="bg-slate-50 relative z-20 -mt-10 rounded-t-[3rem] pb-24">
    <div class="max-w-3xl mx-auto px-6 pt-16">
        
        
        <?php if(session('success')): ?>
        <div class="mb-8 p-4 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-center gap-3 text-emerald-700 animate-fade-up">
            <i class="bi bi-check-circle-fill text-xl"></i>
            <span class="font-medium"><?php echo e(session('success')); ?></span>
        </div>
        <?php endif; ?>

        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden" data-aos="fade-up">
            <div class="p-8 md:p-12">
                <form action="<?php echo e(route('careers.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                    <?php echo csrf_field(); ?>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        
                        <div class="md:col-span-2">
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Nama Lengkap</label>
                            <input type="text" name="nama" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none" placeholder="Contoh: John Doe, S.Kom" required>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">NIM</label>
                            <input type="text" name="nim" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none" placeholder="Contoh: 123456789" required>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Email</label>
                            <input type="email" name="email" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none" placeholder="Contoh: john.doe@example.com" required>
                        </div>
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">No. Telpon</label>
                            <input type="text" name="no_telpon" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none" placeholder="Contoh: 081234567890" required>
                        </div>
                        
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Fakultas</label>
                            <div class="relative">
                                <select name="faculty_id" id="faculty" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none appearance-none" required>
                                    <option value="">Pilih Fakultas</option>
                                    <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Program Studi</label>
                            <div class="relative">
                                <select name="prodi_id" id="prodi" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none appearance-none disabled:bg-slate-100 disabled:cursor-not-allowed" disabled required>
                                    <option value="">Pilih Fakultas Dulu</option>
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-4 text-slate-400">
                                    <i class="bi bi-chevron-down"></i>
                                </div>
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Tahun Lulus</label>
                            <input type="number" name="tahun_lulus" min="1900" max="<?php echo e(date('Y')); ?>" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none" placeholder="Contoh: 2023" required>
                        </div>

                        
                        <div>
                            <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Status Pekerjaan</label>
                            <select id="status_kerja" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none appearance-none">
                                <option value="tidak">Belum Berkerja / Mencari Kerja</option>
                                <option value="kerja">Sudah Bekerja</option>
                            </select>
                        </div>

                        
                        <div id="section_pekerjaan" class="hidden space-y-4 mt-4">
                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Perusahaan</label>
                                <input type="text" name="perusahaan" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none" placeholder="Tempat Bekerja">
                            </div>

                            
                            <div>
                                <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Jabatan</label>
                                <input type="text" name="jabatan" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none" placeholder="Posisi Sekarang">
                            </div>
                        </div>
                    </div>

                    
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2 uppercase tracking-wider">Pesan & Kesan</label>
                        <textarea name="pesan_kesan" rows="4" class="w-full px-5 py-4 bg-slate-50 border border-slate-200 rounded-2xl focus:ring-4 focus:ring-sky-500/10 focus:border-sky-500 transition-all outline-none" placeholder="Apa pengalaman paling berkesan selama kuliah?"></textarea>
                    </div>

                    
                    <div class="p-6 bg-sky-50 rounded-3xl border-2 border-dashed border-sky-200">
                        <label class="block text-sm font-bold text-sky-900 mb-2 uppercase tracking-wider text-center">Foto Profil Terupdate</label>
                        <input type="file" name="foto" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-sky-600 file:text-white hover:file:bg-sky-700 transition-all">
                        <p class="text-center text-[10px] text-sky-600 mt-3 font-medium uppercase tracking-widest">Format: JPG, PNG • Max: 2MB</p>
                    </div>

                    
                    <button type="submit" class="w-full py-5 bg-slate-900 text-white rounded-2xl font-bold text-lg hover:bg-sky-600 shadow-xl shadow-slate-200 hover:shadow-sky-200 transition-all duration-300 transform active:scale-[0.98]">
                        Kirim Cerita Saya <i class="bi bi-arrow-right ml-2"></i>
                    </button>
                </form>
            </div>
        </div>

        
        <p class="text-center text-slate-400 text-xs mt-8 font-medium uppercase tracking-[0.2em]">
            Data akan diverifikasi oleh Admin sebelum ditampilkan secara publik.
        </p>
    </div>
</section>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
    $('#faculty').on('change', function() {
        let facultyId = $(this).val();
        let prodiSelect = $('#prodi');

        prodiSelect.empty().append('<option value="">Memuat...</option>');
        prodiSelect.prop('disabled', true);

        if (facultyId) {
            $.ajax({
                url: '/get-prodi/' + facultyId, // Pastikan slash (/) di depan ada
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    prodiSelect.empty().append('<option value="">Pilih Prodi</option>');
                    
                    if(data.length > 0) {
                        $.each(data, function(key, value) {
                            prodiSelect.append('<option value="' + value.id + '">' + value.name + '</option>');
                        });
                        prodiSelect.prop('disabled', false);
                    } else {
                        prodiSelect.append('<option value="">Prodi tidak ditemukan</option>');
                    }
                },
                error: function(xhr, status, error) {
                    // Biar lu tau errornya apa, cek di Inspect Element -> Console
                    console.error("Error: " + error);
                    console.error("Status: " + status);
                    console.dir(xhr);
                    prodiSelect.empty().append('<option value="">Gagal memuat data</option>');
                }
            });
        } else {
            prodiSelect.empty().append('<option value="">Pilih Prodi</option>');
            prodiSelect.prop('disabled', true);
        }
    });
    });
</script>

<script>
    document.getElementById('status_kerja').addEventListener('change', function() {
        const sectionPekerjaan = document.getElementById('section_pekerjaan');
        
        if (this.value === 'kerja') {
            sectionPekerjaan.classList.remove('hidden');
            // Opsional: bikin inputan jadi required kalau muncul
            sectionPekerjaan.querySelectorAll('input').forEach(input => input.required = true);
        } else {
            sectionPekerjaan.classList.add('hidden');
            // Kosongkan value & hapus required kalau disembunyiin
            sectionPekerjaan.querySelectorAll('input').forEach(input => {
                input.value = '';
                input.required = false;
            });
        }
    });
</script>

<style>
    .animate-slow-zoom { animation: slowZoom 20s infinite alternate; }
    @keyframes slowZoom { 0% { transform: scale(1); } 100% { transform: scale(1.1); } }
</style>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/careers/alumnicreate.blade.php ENDPATH**/ ?>