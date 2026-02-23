
<?php $__env->startSection('title', 'Tambah Tagline'); ?>

<?php $__env->startSection('content'); ?>


<?php
    $icons = [
        'bi bi-wifi', 'bi bi-snow', 'bi bi-p-square-fill', 'bi bi-cup-hot-fill', 'bi bi-shop',
        'bi bi-building', 'bi bi-hospital', 'bi bi-bank', 'bi bi-cash-coin', 'bi bi-tree-fill',
        'bi bi-people-fill', 'bi bi-broadcast-pin', 'bi bi-telephone-fill', 'bi bi-geo-alt', 'bi bi-rocket-takeoff',
        'bi bi-stars', 'bi bi-lightbulb-fill', 'bi bi-gear-fill', 'bi bi-tools', 'bi bi-wrench-adjustable-circle-fill',
        'bi bi-briefcase-fill', 'bi bi-calendar-check-fill', 'bi bi-alarm-fill', 'bi bi-bell-fill', 'bi bi-chat-dots-fill',
        'bi bi-envelope-fill', 'bi bi-flag-fill', 'bi bi-globe2', 'bi bi-headset', 'bi bi-key-fill', 'bi bi-lock-fill',
        'bi bi-megaphone-fill', 'bi bi-mic-fill', 'bi bi-phone-fill', 'bi bi-printer-fill', 'bi bi-shield-lock-fill',
        'bi bi-telephone-fill', 'bi bi-tv-fill', 'bi bi-umbrella-fill', 'bi bi-briefcase-medical-fill',
        'bi bi-bandaid-fill', 'bi bi-heart-pulse-fill', 'bi bi-hospital-fill', 'bi bi-journal-medical',
        'bi bi-patch-check-fill', 'bi bi-prescription2', 'bi bi-stethoscope', 'bi bi-thermometer-half',
        'bi bi-activity', 'bi bi-bar-chart-fill', 'bi bi-calculator', 'bi bi-cash-stack', 'bi bi-graph-up-arrow',
        'bi bi-pie-chart-fill', 'bi bi-piggy-bank-fill', 'bi bi-shop-window', 'bi bi-wallet-fill',
        'bi bi-airplane-fill', 'bi bi-bus-front-fill', 'bi bi-car-front-fill', 'bi bi-ferry-fill',
        'bi bi-geo-fill', 'bi bi-map-fill', 'bi bi-subway-fill', 'bi bi-train-front-fill', 'bi bi-truck-front-fill',
        'bi bi-archive-fill', 'bi bi-bag-fill', 'bi bi-box-seam', 'bi bi-card-checklist', 'bi bi-cart-fill',
        'bi bi-cash-fill', 'bi bi-gift-fill', 'bi bi-glasses', 'bi bi-hammer', 'bi bi-headphones',
        'bi bi-lightning-fill', 'bi bi-magic', 'bi bi-music-note-fill', 'bi bi-phone-vibrate', 'bi bi-speaker-fill',
        'bi bi-tools', 'bi bi-tv','bi bi-trash', 'bi bi-watch', 'bi bi-apple', 'bi bi-bandaid', 'bi bi-bell', 'bi bi-bookmark-fill',
        'bi bi-book-fill', 'bi bi-mortarboard-fill', 'bi bi-laptop', 'bi bi-projector-fill',
        'bi bi-pencil-fill', 'bi bi-journal-bookmark-fill', 'bi bi-award-fill', 'bi bi-easel-fill',
        'bi bi-pc-display', 'bi bi-gpu-card', 'bi bi-motherboard', 'bi bi-robot', 'bi bi-code-slash',
        'bi bi-flask-fill', 'bi bi-virus', 'bi bi-hdd-network-fill', 'bi bi-globe',
        'bi bi-controller', 'bi bi-dribbble', 'bi bi-music-note-beamed', 'bi bi-camera-reels-fill',
        'bi bi-bicycle', 'bi bi-scooter', 'bi bi-water', 'bi bi-brightness-high-fill',
        'bi bi-shield-check', 'bi bi-camera-video-fill', 'bi bi-clock-history', 'bi bi-geo-alt-fill',
        'bi bi-star-fill', 'bi bi-heart-fill', 'bi bi-check-circle-fill', 'bi bi-lightning-charge-fill'
    ];
?>

<div class="container-fluid p-4">
    
    
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-0">Tambah Tagline Fasilitas</h4>
            <small class="text-muted">Kelola fitur unggulan yang akan tampil di halaman depan</small>
        </div>
        <a href="<?php echo e(route('admin.taglines.index')); ?>" class="btn btn-sm btn-outline-secondary">
            <i class="bi bi-arrow-left me-1"></i> Kembali
        </a>
    </div>

    <div class="row">
        <div class="col-lg-8">
            
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <form action="<?php echo e(route('admin.taglines.store')); ?>" method="POST">
                        <?php echo csrf_field(); ?>

                        
                        <div class="mb-4">
                            <label class="form-label fw-bold text-dark small uppercase tracking-wider">Nama Fitur / Fasilitas</label>
                            <input type="text" name="name" class="form-control form-control-lg border-light bg-light focus-ring" 
                                   placeholder="Contoh: High Speed WiFi" required autofocus>
                        </div>

                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <label class="form-label fw-bold text-dark small mb-0">PILIH ICON</label>
                                <div class="input-group input-group-sm w-50">
                                    <span class="input-group-text bg-light border-light"><i class="bi bi-search"></i></span>
                                    <input type="text" id="searchIcon" class="form-control bg-light border-light" placeholder="Cari icon...">
                                </div>
                            </div>

                            
                            <div class="icon-picker-container border border-light rounded-3 bg-light p-3">
                                <div class="row g-2 overflow-auto" id="iconGrid" style="max-height: 300px;">
                                    <?php $__currentLoopData = $icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="col-3 col-sm-2 col-md-1 icon-option" onclick="selectIcon('<?php echo e($icon); ?>', this)">
                                        <div class="card h-100 border-0 shadow-none text-center py-2 cursor-pointer transition-all hover-icon-card">
                                            <i class="<?php echo e($icon); ?> fs-4 text-muted mb-1 icon-target"></i>
                                            <span class="d-block text-truncate small text-muted px-1" style="font-size: 10px;">
                                                <?php echo e(str_replace('bi bi-', '', $icon)); ?>

                                            </span>
                                            <div class="check-indicator position-absolute top-0 end-0 p-1 d-none">
                                                <i class="bi bi-check-circle-fill text-primary"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <div id="noResult" class="col-12 text-center py-4 d-none">
                                        <span class="text-muted italic small">Icon tidak ditemukan...</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        
                        <div class="mb-4">
                            <div class="d-flex justify-content-between">
                                <label class="form-label fw-bold text-dark small uppercase tracking-wider">Kode Bootstrap Icon</label>
                                <a href="https://icons.getbootstrap.com/" target="_blank" class="text-decoration-none small">
                                    Cari kode lainnya <i class="bi bi-box-arrow-up-right ms-1"></i>
                                </a>
                            </div>
                            <div class="input-group shadow-sm">
                                <span class="input-group-text bg-white border-end-0 text-muted"><i class="bi bi-terminal"></i></span>
                                <input type="text" name="icon" id="iconInput" 
                                       class="form-control border-start-0 ps-0 font-monospace" 
                                       placeholder="Contoh: bi bi-rocket-takeoff" 
                                       required>
                                <button type="button" onclick="resetSelection()" class="btn btn-light border" title="Reset">
                                    <i class="bi bi-x-circle text-danger"></i>
                                </button>
                            </div>
                            <div class="form-text x-small mt-2 italic text-muted">
                                <i class="bi bi-info-circle me-1"></i> Lu bisa pilih dari kotak di atas <b>atau</b> ketik manual kodenya (awali dengan <code>bi bi-...</code>).
                            </div>
                        </div>

                        <hr class="text-light my-4">

                        
                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-primary px-4 py-2 rounded-3 fw-bold">
                                <i class="bi bi-save me-1"></i> SIMPAN TAGLINE
                            </button>
                            <button type="reset" class="btn btn-light px-4 py-2 rounded-3" onclick="resetSelection()">
                                RESET
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-4 mt-4 mt-lg-0">
            <div class="card shadow-sm border-0 rounded-4 sticky-top" style="top: 20px;">
                <div class="card-body p-4 text-center">
                    <h6 class="fw-bold text-muted small mb-4">LIVE PREVIEW</h6>
                    <div class="preview-box bg-light rounded-4 py-5 mb-3 d-flex flex-column align-items-center">
                        <div class="icon-circle bg-white shadow-sm rounded-circle d-flex align-items-center justify-content-center mb-3" style="width: 80px; height: 80px;">
                            <i id="bigPreview" class="bi bi-stars fs-1 text-primary transition-all"></i>
                        </div>
                        <h5 id="namePreview" class="fw-black text-dark mb-0 italic">Nama Fasilitas</h5>
                    </div>
                    <p class="text-muted x-small">Tampilan ini adalah gambaran bagaimana tagline muncul di halaman depan.</p>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .cursor-pointer { cursor: pointer; }
    .focus-ring:focus {
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.1);
        border-color: #0d6efd !important;
    }
    .hover-icon-card:hover {
        background-color: #fff;
        transform: translateY(-3px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .hover-icon-card:hover i { color: #0d6efd !important; }
    .selected-icon-card {
        background-color: #fff !important;
        border: 2px solid #0d6efd !important;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.1) !important;
    }
    .selected-icon-card i { color: #0d6efd !important; }
    .x-small { font-size: 11px; }
    
    /* Custom Scrollbar */
    #iconGrid::-webkit-scrollbar { width: 5px; }
    #iconGrid::-webkit-scrollbar-track { background: transparent; }
    #iconGrid::-webkit-scrollbar-thumb { background: #dee2e6; border-radius: 10px; }
</style>


<script>
    const iconInput = document.getElementById('iconInput');
    const bigPreview = document.getElementById('bigPreview');
    const searchInput = document.getElementById('searchIcon');
    const noResult = document.getElementById('noResult');
    const nameInput = document.querySelector('input[name="name"]');
    const namePreview = document.getElementById('namePreview');

    function selectIcon(iconClass, element) {
        iconInput.value = iconClass;
        bigPreview.className = iconClass + ' fs-1 text-primary';
        
        // Reset and Apply Selection
        document.querySelectorAll('.icon-option .card').forEach(card => {
            card.classList.remove('selected-icon-card');
            card.querySelector('.check-indicator').classList.add('d-none');
        });
        
        const card = element.querySelector('.card');
        card.classList.add('selected-icon-card');
        card.querySelector('.check-indicator').classList.remove('d-none');
    }

    searchInput.addEventListener('input', function() {
        const filter = this.value.toLowerCase();
        let hasResult = false;
        document.querySelectorAll('.icon-option').forEach(opt => {
            const text = opt.innerText.toLowerCase();
            if (text.includes(filter)) {
                opt.classList.remove('d-none');
                hasResult = true;
            } else {
                opt.classList.add('d-none');
            }
        });
        noResult.classList.toggle('d-none', hasResult);
    });

    nameInput.addEventListener('input', function() {
        namePreview.innerText = this.value || 'Nama Fasilitas';
    });

    function resetSelection() {
        iconInput.value = '';
        bigPreview.className = 'bi bi-stars fs-1 text-muted opacity-25';
        namePreview.innerText = 'Nama Fasilitas';
        document.querySelectorAll('.icon-option .card').forEach(card => {
            card.classList.remove('selected-icon-card');
            card.querySelector('.check-indicator').classList.add('d-none');
        });
    }
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.main', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\kampus_anda\resources\views/admin/tagline/create.blade.php ENDPATH**/ ?>