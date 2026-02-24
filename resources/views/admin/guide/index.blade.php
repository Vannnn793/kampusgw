@extends('admin.layout.main')

@section('title', 'Panduan Lengkap Administrator')

@section('content')
<div class="container-fluid px-4">
    {{-- HEADER --}}
    <div class="d-flex align-items-center mb-4 mt-2">
        <div class="bg-primary text-white p-3 rounded-4 me-3 shadow-sm">
            <i class="bi bi-book-half fs-3"></i>
        </div>
        <div>
            <h3 class="fw-bold mb-0 text-dark">Pusat Bantuan & Dokumentasi</h3>
            <p class="text-muted mb-0">Panduan teknis operasional portal {{ $profile->campus_name }}</p>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="row g-0">
                {{-- NAVIGASI KIRI --}}
                <div class="col-md-3 bg-light border-end">
                    <div class="nav flex-column nav-pills p-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                        <button class="nav-link active text-start py-3 mb-2 fw-bold" id="tab-akademik" data-bs-toggle="pill" data-bs-target="#content-akademik" type="button" role="tab">
                            <i class="bi bi-building-fill me-2"></i> 1. Data Akademik
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-visual" data-bs-toggle="pill" data-bs-target="#content-visual" type="button" role="tab">
                            <i class="bi bi-palette-fill me-2"></i> 2. Visual & Identity
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-marketing" data-bs-toggle="pill" data-bs-target="#content-marketing" type="button" role="tab">
                            <i class="bi bi-newspaper me-2"></i> 3. Berita & Artikel
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-pmb" data-bs-toggle="pill" data-bs-target="#content-pmb" type="button" role="tab">
                            <i class="bi bi-people-fill me-2"></i> 4. PMB & Mahasiswa
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-alumni" data-bs-toggle="pill" data-bs-target="#content-alumni" type="button" role="tab">
                        <i class="bi bi-people-fill me-2"></i> 5. Data Alumni
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-fakultas" data-bs-toggle="pill" data-bs-target="#content-fakultas" type="button" role="tab">
                        <i class="bi bi-building-fill me-2"></i> 6. Fakultas
                        <button class="nav-link text-start py-3 mb-2 fw-bold"id="tab-prodi"data-bs-toggle="pill"data-bs-target="#content-prodi"type="button"role="tab">
                            <i class="bi bi-journal-bookmark-fill me-2"></i> 7. Program Studi
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold"id="tab-akreditasi"data-bs-toggle="pill"data-bs-target="#content-akreditasi"type="button"role="tab">
                            <i class="bi bi-patch-check-fill me-2"></i> 8. Akreditasi
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold"id="tab-struktur"data-bs-toggle="pill"data-bs-target="#content-struktur"type="button"role="tab">
                            <i class="bi bi-diagram-3-fill me-2"></i> 9. Struktur Organisasi
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold"id="tab-profile"data-bs-toggle="pill"data-bs-target="#content-profile"type="button"role="tab">
                            <i class="bi bi-building-fill me-2"></i> 10. Profile Kampus
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold"id="tab-mitra"data-bs-toggle="pill"data-bs-target="#content-mitra"type="button"role="tab">
                            <i class="bi bi-globe2 me-2"></i> 11. Mitra & Patner
                        </button>
                         <button class="nav-link text-start py-3 mb-2 fw-bold"id="tab-fasilitas"data-bs-toggle="pill"data-bs-target="#content-fasilitas"type="button"role="tab">
                            <i class="bi bi-building-gear me-2"></i> 12. Fasilitas
                        </button>
                         <button class="nav-link text-start py-3 mb-2 fw-bold"id="tab-badge"data-bs-toggle="pill"data-bs-target="#content-badge"type="button"role="tab">
                            <i class="bi bi-award me-2"></i> 13. Gelar & Slogan
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-tagline" data-bs-toggle="pill" data-bs-target="#content-tagline" type="button" role="tab">
                            <i class="bi bi-stars me-2"></i> 14. Tagline & Icon
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-dokumen" data-bs-toggle="pill" data-bs-target="#content-dokumen" type="button" role="tab">
                            <i class="bi bi-file-earmark-arrow-down me-2"></i> 15. Dokumen Download
                        </button>
                        <button class="nav-link text-start py-3 mb-2 fw-bold" id="tab-panduan" data-bs-toggle="pill" data-bs-target="#content-panduan" type="button" role="tab">
                            <i class="bi bi-gear-fill me-2"></i> 16. Panduan vidio & pdf
                        </button>
                    </div>
                </div>

                {{-- KONTEN KANAN --}}
                <div class="col-md-9 bg-white">
                    <div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
                        
                        {{-- 1. AKADEMIK --}}
                        <div class="tab-pane fade show active" id="content-akademik" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">Pengelolaan Data Akademik</h4>
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark"><i class="bi bi-check2-circle text-primary me-2"></i>Fakultas & Program Studi</h6>
                                <p class="text-muted">Untuk mengatur struktur pendidikan. Pada kolom <b>Fasilitas</b>, wajib gunakan <b>tombol Enter</b> untuk memisahkan item agar muncul sebagai list di website depan.</p>
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark"><i class="bi bi-check2-circle text-primary me-2"></i>Akreditasi</h6>
                                <p class="text-muted">Pilih prodi dan input status (Unggul/A/B/C). Data ini akan otomatis tampil di badge profil prodi.</p>
                            </div>
                        </div>

                        {{-- 2. VISUAL --}}
                        <div class="tab-pane fade" id="content-visual" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">Visual & Identity Website</h4>
                            <div class="table-responsive">
                                <table class="table table-hover border">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Fitur</th>
                                            <th>Rekomendasi Size</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Slider Banner</td>
                                            <td>1920 x 820 px (High Res)</td>
                                        </tr>
                                        <tr>
                                            <td>Thumbnail Berita</td>
                                            <td>800 x 600 px (Rasio 4:3)</td>
                                        </tr>
                                        <tr>
                                            <td>Ikon Fitur</td>
                                            <td>Gunakan kode <a href="https://icons.getbootstrap.com/" target="_blank">Bootstrap Icons</a></td>
                                        </tr>
                                        Gunakan gambar dengan format JPG/PNG dan ukuran maksimal 2MB untuk memastikan tampilan website tetap cepat dan profesional. Pastikan setiap gambar yang diupload memiliki resolusi yang sesuai dengan rekomendasi agar tampil optimal di berbagai perangkat.
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        {{-- 3. MARKETING --}}
                        <div class="tab-pane fade" id="content-marketing" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">Berita & Artikel</h4>
                            <p class="text-muted">Posting berita secara berkala untuk meningkatkan SEO. Pastikan setiap berita memiliki <b>Kategori</b> agar pengunjung mudah mencari informasi prestasi atau kegiatan kampus.</p>
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Judul Berita
                                </h6>
                                <p class="text-muted">
                                    Masukkan <b>judul berita</b> yang menarik dan informatif.
                                    Contoh: <i>Mahasiswa Raih Juara 1 Kompetisi Nasional</i>.
                                    Judul ini akan tampil sebagai headline utama pada halaman berita.
                                </p>
                            </div>

                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Kategori
                                </h6>
                                <p class="text-muted">
                                    Pilih kategori berita pada opsi <b>-- Pilih Kategori --</b>.
                                    Kategori membantu pengunjung dalam memfilter dan mencari informasi
                                    seperti Prestasi, Kegiatan Kampus, Pengumuman, atau Akademik.
                                </p>
                            </div>

                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Thumbnail Berita
                                </h6>
                                <p class="text-muted">
                                    Upload gambar thumbnail dengan format <b>JPG/PNG</b>
                                    dan ukuran maksimal <b>2MB</b>.
                                    Gunakan gambar yang relevan dan berkualitas agar tampilan
                                    berita terlihat profesional di halaman utama.
                                </p>
                            </div>

                            <div>
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Isi Berita
                                </h6>
                                <p class="text-muted">
                                    Tuliskan isi berita secara lengkap dan jelas.
                                    serta bahasa yang informatif
                                    agar mudah dipahami oleh pembaca.
                                </p>
                            </div>
                        </div>

                        {{-- 4. PMB --}}
                        <div class="tab-pane fade" id="content-pmb" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">PMB & Data Mahasiswa</h4>
                            <p class="text-muted">Data pendaftar online masuk ke menu <b>Pendaftar Baru</b>
                                {{-- . Anda bisa melakukan export Excel di pojok kanan atas tabel pendaftar untuk keperluan berkas fisik. --}}
                            </p>
                        </div>

                    {{-- 5. ALUMNI --}}
                    <div class="tab-pane fade" id="content-alumni" role="tabpanel">
                        <h4 class="fw-bold text-primary mb-4">Pengelolaan Data Alumni</h4>

                        <div class="mb-4">
                            <h6 class="fw-bold text-dark">
                                <i class="bi bi-check2-circle text-primary me-2"></i>
                                Data Profil Alumni
                            </h6>
                            <p class="text-muted">
                                Tambahkan data alumni seperti <b>nama, tahun lulus, program studi, pekerjaan, dan instansi</b>.
                                Data ini akan ditampilkan pada halaman Alumni di website utama.
                            </p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-dark">
                                <i class="bi bi-check2-circle text-primary me-2"></i>
                                Foto Alumni
                            </h6>
                            <p class="text-muted">
                                Upload foto alumni dengan format JPG/PNG.
                                Pastikan ukuran gambar proporsional agar tampil rapi pada halaman depan.
                            </p>
                        </div>

                        <div class="mb-4">
                            <h6 class="fw-bold text-dark">
                                <i class="bi bi-check2-circle text-primary me-2"></i>
                                Testimoni Alumni
                            </h6>
                            <p class="text-muted">
                                Masukkan testimoni atau pengalaman alumni selama kuliah dan setelah lulus.
                                Testimoni ini akan membantu meningkatkan kepercayaan calon mahasiswa.
                            </p>
                        </div>
                        </div>

                        {{-- 6. FAKULTAS --}}
                        <div class="tab-pane fade" id="content-fakultas" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">Pengelolaan Data Fakultas</h4>

                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Data Fakultas
                                </h6>
                                <p class="text-muted">
                                    Tambahkan data fakultas seperti <b>nama fakultas, deskripsi, visi, dan misi</b>.
                                    Informasi ini akan ditampilkan pada halaman Fakultas di website utama.
                                </p>
                            </div>

                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Gambar / Cover Fakultas
                                </h6>
                                <p class="text-muted">
                                    Upload gambar representatif fakultas dengan format JPG/PNG.
                                    Gunakan gambar berkualitas tinggi agar tampilan website terlihat profesional.
                                </p>
                            </div>

                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Program Studi
                                </h6>
                                <p class="text-muted">
                                    Setiap fakultas dapat memiliki beberapa <b>Program Studi (Prodi)</b>.
                                    Pastikan prodi sudah ditambahkan agar otomatis muncul di halaman detail fakultas.
                                </p>
                            </div>
                        </div>

                        {{-- 7. PROGRAM STUDI --}}
                            <div class="tab-pane fade" id="content-prodi" role="tabpanel">
                                <h4 class="fw-bold text-primary mb-4">Pengelolaan Data Program Studi (Prodi)</h4>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Pilih Fakultas
                                    </h6>
                                    <p class="text-muted">
                                        Pilih fakultas yang sesuai sebelum menambahkan program studi.
                                        Prodi yang dibuat akan otomatis terhubung dengan fakultas tersebut
                                        dan ditampilkan pada halaman detail fakultas di website.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Nama Program Studi
                                    </h6>
                                    <p class="text-muted">
                                        Masukkan <b>nama lengkap program studi</b> dengan benar.
                                        Contoh: Teknik Informatika, Manajemen, Ilmu Hukum.
                                        Nama ini akan tampil sebagai judul utama pada halaman prodi.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Deskripsi, Tujuan & Visi
                                    </h6>
                                    <p class="text-muted">
                                        Isi bagian <b>deskripsi</b> untuk menjelaskan gambaran umum prodi.
                                        Tambahkan juga <b>tujuan</b> dan <b>visi</b> program studi agar calon mahasiswa
                                        memahami arah dan target pengembangan akademik prodi tersebut.
                                    </p>
                                </div>

                                <div>
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Upload Foto Prodi
                                    </h6>
                                    <p class="text-muted">
                                        Upload foto representatif untuk program studi (format JPG/PNG).
                                        Gunakan gambar yang jelas dan profesional karena foto ini akan
                                        tampil di halaman detail prodi pada website utama.
                                    </p>
                                </div>
                            </div>
                            {{-- 8. AKREDITASI --}}
                            <div class="tab-pane fade" id="content-akreditasi" role="tabpanel">
                                <h4 class="fw-bold text-primary mb-4">Pengelolaan Data Akreditasi</h4>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Pilih Program Studi
                                    </h6>
                                    <p class="text-muted">
                                        Pilih program studi yang akan diberikan data akreditasi.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Peringkat Akreditasi
                                    </h6>
                                    <p class="text-muted">
                                        Masukkan peringkat akreditasi seperti Unggul, A, B, atau C.
                                    </p>
                                </div>

                                <div>
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Nomor SK, Diterbitkan Oleh & Berlaku Sampai
                                    </h6>
                                    <p class="text-muted">
                                        Isi nomor SK, lembaga penerbit (BAN-PT/LAM),
                                        serta tanggal berlaku sampai.
                                    </p>
                                </div>
                            </div>
                            {{-- 9. STRUKTUR ORGANISASI --}}
                            <div class="tab-pane fade" id="content-struktur" role="tabpanel">
                                <h4 class="fw-bold text-primary mb-4">Pengelolaan Struktur Organisasi</h4>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Jabatan & Nama Pejabat
                                    </h6>
                                    <p class="text-muted">
                                        Tambahkan data seperti <b>nama pejabat dan jabatan</b>.
                                        Contoh: Rektor, Wakil Rektor, Dekan, Ketua Program Studi.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Foto Pejabat
                                    </h6>
                                    <p class="text-muted">
                                        Upload foto resmi dengan format JPG/PNG.
                                        Gunakan background formal agar tampilan struktur organisasi terlihat profesional.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Urutan Tampil
                                    </h6>
                                    <p class="text-muted">
                                        Tentukan urutan jabatan agar struktur organisasi tampil sesuai hierarki,
                                        mulai dari pimpinan tertinggi hingga unit pendukung.
                                    </p>
                                </div>
                            </div>

                                                
                        {{-- PROFILE KAMPUS --}}
                        <div class="tab-pane fade" id="content-profile" role="tabpanel">

                            <h4 class="fw-bold text-primary mb-4">Panduan Penggunaan Profile Kampus</h4>

                            {{-- Umum --}}
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-info-circle text-primary me-2"></i>
                                    Petunjuk Umum
                                </h6>
                                <p class="text-muted">
                                    Halaman <b>Profile Kampus</b> digunakan untuk mengelola seluruh informasi utama
                                    yang akan ditampilkan pada website resmi kampus.
                                    Pastikan data yang diinput lengkap, akurat, dan diperbarui secara berkala.
                                </p>
                            </div>

                            {{-- Identitas & Statistik --}}
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-bar-chart-line text-primary me-2"></i>
                                    Identitas Visual & Statistik
                                </h6>
                                <p class="text-muted">
                                    Isi informasi seperti <b>logo kampus, nama kampus, tagline, foto gedung utama,
                                    serta data statistik (jumlah prodi, alumni, dosen, dan mahasiswa aktif)</b>.
                                    Data ini akan ditampilkan pada halaman utama sebagai informasi ringkas kampus.
                                </p>
                            </div>

                            {{-- Sambutan Rektor --}}
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-person-badge text-primary me-2"></i>
                                    Sambutan Rektor
                                </h6>
                                <p class="text-muted">
                                    Masukkan <b>nama rektor, foto rektor, dan isi sambutan resmi</b>.
                                    Sambutan ini akan ditampilkan pada halaman profil untuk memberikan
                                    gambaran visi kepemimpinan kampus kepada pengunjung.
                                </p>
                            </div>

                            {{-- Sejarah & Video --}}
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-clock-history text-primary me-2"></i>
                                    Sejarah & Video Profil
                                </h6>
                                <p class="text-muted">
                                    Tuliskan <b>sejarah singkat kampus</b> mulai dari berdiri hingga perkembangan saat ini.
                                    Tambahkan juga <b>link video profil (YouTube)</b> agar pengunjung dapat melihat
                                    gambaran visual tentang kampus.
                                </p>
                            </div>

                            {{-- Visi & Misi --}}
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-bullseye text-primary me-2"></i>
                                    Visi & Misi
                                </h6>
                                <p class="text-muted">
                                    Isi bagian <b>Visi</b> dan <b>Misi</b> kampus sesuai dokumen resmi.
                                    Pastikan penulisan jelas dan sesuai dengan arah pengembangan institusi.
                                </p>
                            </div>

                            {{-- Kontak & Lokasi --}}
                            <div>
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-geo-alt text-primary me-2"></i>
                                    Kontak & Lokasi
                                </h6>
                                <p class="text-muted">
                                    Masukkan <b>alamat lengkap, email resmi, nomor telepon, dan link Google Maps</b>.
                                    Informasi ini akan memudahkan calon mahasiswa dan pengunjung
                                    untuk menghubungi atau menemukan lokasi kampus.
                                </p>
                            </div>

                        </div>

                        {{--MITRA & PARTNER --}}
                        <div class="tab-pane fade" id="content-mitra" role="tabpanel">

                            <h4 class="fw-bold text-primary mb-4">Pengelolaan Data Mitra & Partner</h4>

                            {{-- Nama Mitra --}}
                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-building text-primary me-2"></i>
                                    Nama Mitra / Partner
                                </h6>
                                <p class="text-muted">
                                    Masukkan <b>nama instansi, perusahaan, atau lembaga</b> yang bekerja sama
                                    dengan kampus. Pastikan penulisan nama sesuai dengan nama resmi mitra
                                    untuk menjaga profesionalitas dan kredibilitas institusi.
                                </p>
                            </div>

                            {{-- Upload Logo --}}
                            <div>
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-image text-primary me-2"></i>
                                    Upload Logo Mitra
                                </h6>
                                <p class="text-muted">
                                    Upload <b>logo resmi mitra</b> dengan format JPG/PNG (maksimal 2MB).
                                    Gunakan logo dengan kualitas baik dan background transparan (PNG)
                                    agar tampilan pada website terlihat rapi dan profesional.
                                </p>
                            </div>
                        </div>

                        {{-- FASILITAS --}}
                        <div class="tab-pane fade" id="content-fasilitas" role="tabpanel">
                            <h4 class="fw-bold text-primary mb-4">Pengelolaan Data Fasilitas</h4>

                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Nama Fasilitas
                                </h6>
                                <p class="text-muted">
                                    Masukkan <b>nama fasilitas</b> yang akan ditampilkan pada website.
                                    Contoh: Laboratorium Komputer, Perpustakaan Digital, Studio Multimedia.
                                </p>
                            </div>

                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Kategori Fasilitas
                                </h6>
                                <p class="text-muted">
                                    Pilih kategori fasilitas apakah termasuk <b>Fasilitas Umum</b> (digunakan seluruh mahasiswa)
                                    atau <b>Fasilitas Berdasarkan Jurusan/Prodi</b>.
                                    Jika memilih berdasarkan jurusan, pastikan program studi sudah tersedia agar dapat dipilih.
                                </p>
                            </div>

                            <div class="mb-4">
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Upload Gambar Fasilitas
                                </h6>
                                <p class="text-muted">
                                    Upload gambar fasilitas dengan format <b>JPG/PNG</b> (maksimal 2MB).
                                    Gunakan foto dengan resolusi tinggi dan pencahayaan baik agar tampilan website terlihat profesional.
                                </p>
                            </div>

                            <div>
                                <h6 class="fw-bold text-dark">
                                    <i class="bi bi-check2-circle text-primary me-2"></i>
                                    Deskripsi Fasilitas
                                </h6>
                                <p class="text-muted">
                                    Isi deskripsi fasilitas secara singkat dan jelas.
                                    Jelaskan fungsi, keunggulan, serta manfaat fasilitas bagi mahasiswa.
                                    Deskripsi ini akan tampil pada halaman Fasilitas di website utama.
                                </p>
                            </div>
                        </div>

                            {{-- GELAR & SLOGAN --}}
                            <div class="tab-pane fade" id="content-badge" role="tabpanel">
                                <h4 class="fw-bold text-primary mb-4">Panduan Pengelolaan Gelar & Slogan (Badge)</h4>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Dashboard Badge
                                    </h6>
                                    <p class="text-muted">
                                        Menu ini digunakan untuk mengelola seluruh <b>badge, gelar, atau slogan kampus</b> 
                                        yang ditampilkan pada halaman utama website. Badge berfungsi sebagai 
                                        identitas pencapaian, keunggulan, dan nilai promosi institusi.
                                    </p>
                                    <p class="text-muted mb-0">
                                        Pada halaman dashboard, administrator dapat melihat jumlah badge, 
                                        status aktif/nonaktif, serta melakukan pengelolaan data.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Menambahkan Badge / Gelar Baru
                                    </h6>
                                    <p class="text-muted">
                                        Klik tombol <b>Tambah Baru</b> untuk menambahkan badge baru. 
                                        Isi kolom <b>Nama Badge / Gelar</b> dengan kalimat singkat yang 
                                        merepresentasikan pencapaian atau keunggulan kampus.
                                    </p>
                                    <p class="text-muted mb-0">
                                        Contoh:
                                        <i>“Terakreditasi Unggul”</i>,
                                        <i>“Dipercaya Lebih dari 1000 Alumni”</i>, atau
                                        <i>“Kampus Berbasis Industri Digital”</i>.
                                    </p>
                                </div>

                                <div>
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Mengelola Daftar Badge
                                    </h6>
                                    <p class="text-muted">
                                        Semua badge yang telah dibuat akan tampil pada tabel daftar badge. 
                                        Administrator dapat:
                                    </p>
                                    <ul class="text-muted">
                                        <li>Mengubah nama badge melalui fitur <b>Edit</b></li>
                                        <li>Menghapus badge yang tidak digunakan</li>
                                        <li>Mengatur <b>Status Aktif / Nonaktif</b></li>
                                    </ul>
                                    <p class="text-muted mb-0">
                                        Hanya badge dengan status <b>Aktif</b> yang akan ditampilkan 
                                        pada halaman utama website.
                                    </p>

                                    <div class="table-responsive mt-3">
                                        <table class="table table-bordered align-middle">
                                            <thead class="table-light">
                                                <tr>
                                                    <th width="60">No</th>
                                                    <th>Nama Badge</th>
                                                    <th width="120">Status</th>
                                                    <th width="120">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>1</td>
                                                    <td>Terakreditasi Unggul</td>
                                                    <td><span class="badge bg-success">Aktif</span></td>
                                                    <td>Edit | Hapus</td>
                                                </tr>
                                                <tr>
                                                    <td>2</td>
                                                    <td>Dipercaya lebih dari 1000 Alumni</td>
                                                    <td><span class="badge bg-success">Aktif</span></td>
                                                    <td>Edit | Hapus</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <p class="text-muted small mb-0">Contoh tampilan daftar badge aktif</p>
                                    </div>
                                </div>
                            </div>

                            {{-- TAGLINE & ICON --}}
                            <div class="tab-pane fade" id="content-tagline" role="tabpanel">
                                <h4 class="fw-bold text-primary mb-4">Manajemen Tagline & Icon Fasilitas</h4>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Pilih Icon
                                    </h6>
                                    <p class="text-muted">
                                        Pilih icon yang akan digunakan untuk mewakili fasilitas. Anda dapat memilih dari beberapa icon yang telah tersedia 
                                        di sistem. Setiap icon akan tampil di halaman fasilitas pada website.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Tambahkan Nama Icon / Tagline
                                    </h6>
                                    <p class="text-muted">
                                        Masukkan <b>nama icon</b> atau <b>tagline singkat</b> yang menjelaskan fasilitas tersebut. 
                                        Contoh: "Laboratorium Lengkap", "Ruang Belajar Nyaman", "WiFi Gratis".  
                                        Nama ini akan muncul di bawah icon pada halaman fasilitas.
                                    </p>
                                </div>

                                <div class="mb-4">
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Hubungkan ke Fasilitas
                                    </h6>
                                    <p class="text-muted">
                                        Setelah memilih icon dan menambahkan nama, Anda dapat mengaitkannya ke fasilitas tertentu. 
                                        Fasilitas yang sudah diberi icon akan muncul di halaman edit fasilitas, sehingga dapat dicentang (checked) 
                                        untuk ditampilkan di website.
                                    </p>
                                </div>

                                <div>
                                    <h6 class="fw-bold text-dark">
                                        <i class="bi bi-check2-circle text-primary me-2"></i>
                                        Tampilkan di Halaman Fasilitas
                                    </h6>
                                    <p class="text-muted">
                                        Pada halaman fasilitas, admin dapat mencentang icon/tagline mana yang ingin ditampilkan. 
                                        Hanya icon yang dicentang akan muncul di website, sehingga admin memiliki kontrol penuh atas tampilan fasilitas.
                                    </p>
                                </div>
                            </div>
{{-- DOKUMEN DOWNLOAD --}}
<div class="tab-pane fade" id="content-dokumen" role="tabpanel">
    <h4 class="fw-bold text-primary mb-4">Panduan Penggunaan Dokumen Download</h4>

    {{-- Form Upload --}}
    <div class="mb-4">
        <h6 class="fw-bold text-dark">
            <i class="bi bi-check2-circle text-primary me-2"></i>
            Form Upload Dokumen
        </h6>
        <p class="text-muted">
            Gunakan form ini untuk mengunggah dokumen yang nantinya dapat diunduh oleh pengguna di website. 
            Pastikan semua <b>field wajib</b> terisi agar dokumen tampil dengan benar.
        </p>
    </div>

    {{-- Judul Dokumen --}}
    <div class="mb-4">
        <h6 class="fw-bold text-dark">
            <i class="bi bi-check2-circle text-primary me-2"></i>
            Judul Dokumen *
        </h6>
        <p class="text-muted">
            Masukkan <b>judul dokumen</b> yang jelas dan mudah dikenali. 
            Contoh: <i>Kalender Akademik 2025-2026</i>.
        </p>
    </div>

    {{-- Kategori --}}
    <div class="mb-4">
        <h6 class="fw-bold text-dark">
            <i class="bi bi-check2-circle text-primary me-2"></i>
            Kategori Dokumen *
        </h6>
        <p class="text-muted">
            Pilih kategori dokumen, misalnya <b>Umum</b> atau kategori lain yang sudah tersedia. 
            Kategori membantu pengguna memfilter dokumen yang relevan.
        </p>
    </div>

    {{-- File Dokumen --}}
    <div class="mb-4">
        <h6 class="fw-bold text-dark">
            <i class="bi bi-check2-circle text-primary me-2"></i>
            File Dokumen *
        </h6>
        <p class="text-muted">
            Upload dokumen yang bisa diunduh. Format umum: <b>PDF, DOCX, XLSX</b>. 
            Pastikan ukuran file tidak melebihi batas maksimum.
        </p>
    </div>

    {{-- Keterangan Opsional --}}
    <div class="mb-4">
        <h6 class="fw-bold text-dark">
            <i class="bi bi-check2-circle text-primary me-2"></i>
            Keterangan (Opsional)
        </h6>
        <p class="text-muted">
            Tambahkan deskripsi singkat atau catatan agar pengguna memahami isi dokumen sebelum mengunduh.
        </p>
    </div>

    {{-- Dokumen Terbaru --}}
    <div>
        <h6 class="fw-bold text-dark">
            <i class="bi bi-check2-circle text-primary me-2"></i>
            Dokumen Terbaru
        </h6>
        <p class="text-muted">
            Dokumen yang baru diupload akan muncul di tabel ini. Admin dapat melihat <b>nama file, kategori, tanggal upload</b>, serta melakukan aksi <b>edit atau hapus</b>. 
            Semua dokumen ini akan muncul di <b>footer website</b> untuk dapat diunduh pengguna.
        </p>
    </div>
</div>

<div class="tab-pane fade" id="content-panduan" role="tabpanel">
    <h4 class="fw-bold text-primary mb-4">Panduan Penggunaan Video & PDF</h4>

    <div class="mb-4">
        <h6 class="fw-bold text-dark">
            <i class="bi bi-check2-circle text-primary me-2"></i>
            Buku panduan Video & PDF
        </h6>
        <p class="text-muted">
            Silahkan buka tautan ini untuk mengunduh buku panduan lengkap dalam format PDF yang berisi langkah-langkah detail penggunaan fitur video dan PDF di dashboard admin.
             <a href="https://drive.google.com/drive/folders/1isq0Zu3cG-9oNt3OotxeiEE03dybQO4O" target="_blank" class="text-primary">Download Buku Panduan PDF</a>
        </p>
    </div>
</div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .nav-pills .nav-link {
        color: #495057;
        border-radius: 10px;
        transition: all 0.2s;
    }
    .nav-pills .nav-link.active {
        background-color: #0d6efd;
        color: white;
        box-shadow: 0 4px 12px rgba(13, 110, 253, 0.2);
    }
    .nav-pills .nav-link:hover:not(.active) {
        background-color: #e9ecef;
    }
    .tab-content h4 {
        border-bottom: 2px solid #f1f1f1;
        padding-bottom: 15px;
    }
    .rounded-4 { border-radius: 1rem !important; }
</style>
@endsection