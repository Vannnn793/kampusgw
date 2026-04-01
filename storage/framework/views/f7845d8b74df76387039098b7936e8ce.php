<?php $__env->startSection('title', 'Formulir Pendaftaran'); ?>

<?php $__env->startSection('content'); ?>


<div class="relative py-20 md:py-32 lg:py-40 overflow-hidden">
    
    <div class="absolute inset-0">
        <img 
            src="https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?q=80&w=2049&auto=format&fit=crop" 
            class="w-full h-full object-cover object-center brightness-50"
            alt="Admissions Background"
        >
        <div class="absolute inset-0 bg-gradient-to-t from-slate-900 via-blue-900/60 to-transparent mix-blend-multiply"></div>
    </div>

    
    <div class="relative z-10 max-w-7xl mx-auto px-6 text-center">
        <h1 class="text-3xl md:text-5xl font-black text-white mb-4 leading-tight drop-shadow-xl">
            Registrasi Mahasiswa Baru
        </h1>
        <p class="text-sky-100 max-w-xl mx-auto font-medium text-lg">
            Isi data diri Anda dengan lengkap dan benar untuk memulai perjalanan akademik Anda bersama kami.
        </p>
    </div>
</div>


<section class="bg-slate-50 relative z-20 -mt-20 md:-mt-24 rounded-t-[3rem] min-h-screen pb-24">
    
    
    <div class="absolute top-0 left-0 w-full h-px bg-gradient-to-r from-transparent via-sky-200/50 to-transparent"></div>

    <div class="max-w-4xl mx-auto px-6 pt-16">

        
        <?php if(session('success')): ?>
            <div class="mb-8 p-6 rounded-2xl bg-emerald-50 border border-emerald-100 flex items-start gap-4 shadow-lg shadow-emerald-100/50 animate-fade-down">
                <div class="w-10 h-10 bg-emerald-100 text-emerald-600 rounded-full flex items-center justify-center shrink-0">
                    <i class="bi bi-check-lg text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-emerald-800">Registrasi Berhasil!</h4>
                    <p class="text-sm text-emerald-600 mt-1"><?php echo e(session('success')); ?></p>
                </div>
            </div>
        <?php endif; ?>

        <?php if($errors->any() || session('error')): ?>
            <div class="mb-8 p-6 rounded-2xl bg-rose-50 border border-rose-100 flex items-start gap-4 shadow-lg shadow-rose-100/50 animate-fade-down">
                <div class="w-10 h-10 bg-rose-100 text-rose-600 rounded-full flex items-center justify-center shrink-0">
                    <i class="bi bi-exclamation-triangle-fill text-xl"></i>
                </div>
                <div>
                    <h4 class="font-bold text-rose-800">Periksa Kembali Form</h4>
                    <ul class="text-sm text-rose-600 mt-1 list-disc list-inside">
                        <?php if(session('error')): ?> <li><?php echo e(session('error')); ?></li> <?php endif; ?>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            </div>
        <?php endif; ?>

        
        <div class="bg-white rounded-[2.5rem] shadow-xl shadow-slate-200/60 border border-slate-100 overflow-hidden relative">
            
            
            <div class="bg-slate-50 border-b border-slate-100 px-8 py-6 flex justify-between items-center">
                <span class="text-xs font-black uppercase tracking-widest text-slate-400">
                    Formulir Online
                </span>
                <span class="text-xs font-bold bg-sky-100 text-sky-600 px-3 py-1 rounded-full">
                    Tahun Akademik <?php echo e(date('Y')); ?>/<?php echo e(date('Y')+1); ?>

                </span>
            </div>

            <div class="p-8 md:p-12">
                <form method="POST" action="/admissions" class="space-y-8" id="admissionForm">
                    <?php echo csrf_field(); ?>

                    
                    <div>
                        <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-2">
                            <i class="bi bi-person-lines-fill text-sky-500"></i> Data Pribadi
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">
                            
                            
                            <div class="col-span-2">
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nama Lengkap</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-sky-500 transition-colors">
                                        <i class="bi bi-person"></i>
                                    </div>
                                    <input type="text" name="nama_lengkap" required placeholder="Sesuai ijazah terakhir"
                                           class="w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 font-medium focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition-all outline-none">
                                </div>
                            </div>

                            
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Alamat Email</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-sky-500 transition-colors">
                                        <i class="bi bi-envelope"></i>
                                    </div>
                                    <input type="email" name="email" required placeholder="nama@email.com"
                                           class="w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 font-medium focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition-all outline-none">
                                </div>
                            </div>

                            
                            <div>
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Nomor WhatsApp</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-sky-500 transition-colors">
                                        <i class="bi bi-whatsapp"></i>
                                    </div>
                                    <input type="tel" name="no_hp" required placeholder="0812xxxx"
                                           class="w-full pl-11 pr-4 py-4 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 font-medium focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition-all outline-none">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="w-full h-px bg-slate-100"></div>

                    
                    <div>
                        <h3 class="text-lg font-black text-slate-800 mb-6 flex items-center gap-2">
                            <i class="bi bi-mortarboard-fill text-sky-500"></i> Pilihan Akademik
                        </h3>
                        <div class="grid md:grid-cols-2 gap-6">

                            
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Fakultas</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-sky-500 transition-colors">
                                        <i class="bi bi-building"></i>
                                    </div>
                                    <select id="faculty" name="faculty_id" required 
                                            class="w-full pl-11 pr-10 py-4 bg-slate-50 border border-slate-200 rounded-xl text-slate-800 font-medium focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition-all outline-none appearance-none cursor-pointer">
                                        <option value="">Pilih Fakultas Tujuan</option>
                                        <?php $__currentLoopData = $faculties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $faculty): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($faculty->id); ?>"><?php echo e($faculty->name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                                        <i class="bi bi-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-span-2 md:col-span-1">
                                <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Program Studi</label>
                                <div class="relative group">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400 group-focus-within:text-sky-500 transition-colors">
                                        <i class="bi bi-book"></i>
                                    </div>
                                    <select id="prodi" name="prodi_id" required disabled
                                            class="w-full pl-11 pr-10 py-4 bg-slate-100 border border-slate-200 rounded-xl text-slate-400 font-medium focus:bg-white focus:border-sky-500 focus:ring-4 focus:ring-sky-500/10 transition-all outline-none appearance-none disabled:cursor-not-allowed">
                                        <option value="">Pilih Fakultas Terlebih Dahulu</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-slate-400">
                                        <i class="bi bi-chevron-down text-xs"></i>
                                    </div>
                                </div>
                            </div>

                            
                            <div class="col-span-2">
                            <label class="block text-xs font-bold text-slate-500 uppercase tracking-wider mb-2">Tahun Akademik</label>
                            
                            <?php
                                $bulanSekarang = now()->month;
                                $tahunSekarang = now()->year;
                                
                                // Asumsi tahun ajaran baru dimulai pada bulan Juli (bulan ke-7)
                                if ($bulanSekarang >= 7) {
                                    $tahunAkademik = $tahunSekarang . '/' . ($tahunSekarang + 1);
                                } else {
                                    $tahunAkademik = ($tahunSekarang - 1) . '/' . $tahunSekarang;
                                }
                            ?>

                            <div class="relative">
                                <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                                    <i class="bi bi-calendar-range"></i>
                                </div>
                                <input type="text" name="tahun_akademik" value="<?php echo e($tahunAkademik); ?>" readonly 
                                    class="w-full pl-11 pr-4 py-4 bg-slate-100 border border-slate-200 rounded-xl text-slate-500 font-bold cursor-not-allowed outline-none">
                            </div>
                        </div>
                        </div>
                    </div>

                    
                    <div class="pt-4">
                        <button type="submit" class="w-full group relative overflow-hidden bg-sky-600 text-white font-black text-sm uppercase tracking-widest py-5 rounded-xl hover:bg-sky-500 transition-all duration-300 shadow-xl shadow-sky-200 hover:shadow-sky-400/50 hover:-translate-y-1">
                            <span class="relative z-10 flex items-center justify-center gap-2">
                                Kirim Pendaftaran <i class="bi bi-arrow-right group-hover:translate-x-1 transition-transform"></i>
                            </span>
                        </button>
                        <p class="text-center text-[10px] text-slate-400 mt-4">
                            Dengan mengklik tombol di atas, Anda menyetujui syarat & ketentuan pendaftaran.
                        </p>
                    </div>

                </form>
            </div>
        </div>

    </div>
</section>




<style>
    .animate-fade-down { animation: fadeDown 0.5s ease-out forwards; }
    @keyframes fadeDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const faculties = <?php echo json_encode($faculties, 15, 512) ?>;
        const facultySelect = document.getElementById('faculty');
        const prodiSelect = document.getElementById('prodi');

        facultySelect.addEventListener('change', function () {
            // Reset Prodi
            prodiSelect.innerHTML = '<option value="">Pilih Program Studi</option>';
            prodiSelect.disabled = true;
            prodiSelect.classList.remove('bg-slate-50', 'text-slate-800');
            prodiSelect.classList.add('bg-slate-100', 'text-slate-400');

            if (this.value) {
                const selectedFaculty = faculties.find(f => f.id == this.value);
                
                if (selectedFaculty && selectedFaculty.prodis.length > 0) {
                    // Enable Select
                    prodiSelect.disabled = false;
                    prodiSelect.classList.remove('bg-slate-100', 'text-slate-400');
                    prodiSelect.classList.add('bg-slate-50', 'text-slate-800');

                    // Populate Options
                    selectedFaculty.prodis.forEach(p => {
                        const option = document.createElement('option');
                        option.value = p.id;
                        option.textContent = p.name;
                        prodiSelect.appendChild(option);
                    });
                } else {
                    const option = document.createElement('option');
                    option.textContent = "Tidak ada program studi";
                    prodiSelect.appendChild(option);
                }
            }
        });

        // Auto Hide Alert
        const alerts = document.querySelectorAll('.animate-fade-down');
        if(alerts.length > 0) {
            setTimeout(() => {
                alerts.forEach(el => {
                    el.style.transition = "opacity 0.5s ease";
                    el.style.opacity = "0";
                    setTimeout(() => el.remove(), 500);
                });
            }, 5000);
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views\admissions\index.blade.php ENDPATH**/ ?>