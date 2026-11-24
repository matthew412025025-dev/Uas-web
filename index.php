<?php
require_once 'data.php';

function e($text) {
    return htmlspecialchars((string)$text, ENT_QUOTES, 'UTF-8');
}

$credit_foto = $profile['photo_credit'] ?? 'Credit foto: Dokumen CV Matthew Javier Surya';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= e($profile['brand']) ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css?v=5">
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- HEADER BIRU MUDA (TANPA BINGKAI/GARIS) -->
    <nav class="navbar navbar-expand-md bg-biru-muda py-3">
        <div class="container">
            <a class="navbar-brand fw-bold text-black nav-menu" href="#" data-page="tentang">
                <?= e($profile['brand']) ?>
            </a>

            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSimple">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSimple">
                <ul class="navbar-nav ms-auto gap-md-3">
                    <li class="nav-item">
                        <a class="nav-link text-black nav-menu fw-bold text-decoration-underline" href="#" data-page="tentang">Tentang Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black nav-menu" href="#" data-page="biodata">Biodata</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black nav-menu" href="#" data-page="proyek">Proyek</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black nav-menu" href="#" data-page="teknologi">Teknologi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black nav-menu" href="#" data-page="pengalaman">Pengalaman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-black nav-menu" href="#" data-page="credit">Credit</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- KONTEN UTAMA (BERSIH TANPA BINGKAI, KOTAK, ATAU TABEL) -->
    <div class="container my-5 flex-grow-1">

        <!-- 1. HALAMAN PERTAMA: TENTANG SAYA -->
        <div id="page-tentang" class="halaman">
            <h2 class="h3 fw-bold text-black mb-1"><?= e($profile['name']) ?></h2>
            <p class="text-black small mb-4"><?= e($profile['role']) ?> &bull; <?= e($profile['location']) ?></p>

            <h3 class="h5 fw-bold text-black mb-2"><?= e($profile['about_title']) ?></h3>
            <p class="text-black mb-4" style="max-width: 720px;"><?= e($profile['about_desc']) ?></p>

            <p class="small text-black mb-4">
                <strong>Surel:</strong> <?= e($profile['email']) ?><br>
                <strong>Lokasi:</strong> <?= e($profile['location']) ?>
            </p>

            <button type="button" class="btn btn-dark btn-sm me-2 nav-menu" data-page="biodata">
                Lihat Biodata
            </button>
            <button type="button" class="btn btn-link text-black text-decoration-underline btn-sm nav-menu p-0" data-page="proyek">
                Lihat Proyek
            </button>
        </div>

        <!-- 2. HALAMAN KEDUA: BIODATA (TANPA TABEL & TANPA BINGKAI) -->
        <div id="page-biodata" class="halaman" style="display: none;">
            <h2 class="h3 fw-bold text-black mb-4">Biodata</h2>

            <div class="mb-4" style="max-width: 650px;">
                <?php foreach ($resume_specs as $k => $v): ?>
                    <div class="row py-2">
                        <div class="col-4 fw-bold text-black"><?= e($k) ?></div>
                        <div class="col-8 text-black">: <?= e($v) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <button type="button" class="btn btn-sm tombol-hiasan">
                <i class="bi bi-file-earmark-text ikon-satu-warna"></i> Berkas CV Saya
            </button>
        </div>

        <!-- 3. PROYEK -->
        <div id="page-proyek" class="halaman" style="display: none;">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-2 mb-4">
                <h2 class="h3 fw-bold text-black mb-0">Daftar Proyek</h2>
                <div>
                    <button type="button" class="btn btn-sm btn-dark btn-filter" data-filter="all">Semua</button>
                    <button type="button" class="btn btn-sm btn-link text-black text-decoration-none btn-filter" data-filter="php">PHP</button>
                    <button type="button" class="btn btn-sm btn-link text-black text-decoration-none btn-filter" data-filter="web">Situs Web</button>
                    <button type="button" class="btn btn-sm btn-link text-black text-decoration-none btn-filter" data-filter="permainan">Permainan</button>
                </div>
            </div>

            <div class="row g-4">
                <?php foreach ($projects as $proj): ?>
                    <div class="col-md-4 item-project" data-category="<?= e($proj['category']) ?>">
                        <div class="py-2">
                            <div class="small fw-bold text-black mb-1">[<?= e($proj['badge']) ?>]</div>
                            <h5 class="fs-6 fw-bold text-black mb-2"><?= e($proj['title']) ?></h5>
                            <p class="small text-black mb-2"><?= e($proj['summary']) ?></p>
                            <div class="small text-black">
                                <strong>Teknologi:</strong> <?= e(implode(', ', $proj['tech'])) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 4. TEKNOLOGI & ALUR KERJA -->
        <div id="page-teknologi" class="halaman" style="display: none;">
            <h2 class="h3 fw-bold text-black mb-4">Teknologi &amp; Alur Kerja</h2>

            <div class="row g-4 mb-5">
                <?php foreach ($tech_stack as $tech): ?>
                    <div class="col-md-4 col-6">
                        <div class="fw-bold text-black"><?= e($tech['name']) ?></div>
                        <div class="small text-black"><?= e($tech['desc']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>

            <h3 class="h5 fw-bold text-black mb-3">Alur Pengerjaan</h3>
            <div class="row g-4">
                <?php foreach ($workflow as $wf): ?>
                    <div class="col-md-3 col-6">
                        <div class="fw-bold small text-black mb-1">Tahap <?= e($wf['step']) ?> &mdash; <?= e($wf['title']) ?></div>
                        <div class="small text-black"><?= e($wf['desc']) ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 5. PENGALAMAN & PENDIDIKAN -->
        <div id="page-pengalaman" class="halaman" style="display: none;">
            <h2 class="h3 fw-bold text-black mb-4">Pengalaman &amp; Pendidikan</h2>
            <div class="row g-4">
                <?php foreach ($experiences as $exp): ?>
                    <div class="col-md-4">
                        <div class="small fw-bold text-black mb-1"><?= e($exp['type']) ?> &bull; <?= e($exp['period']) ?></div>
                        <h5 class="fs-6 fw-bold text-black mb-2"><?= e($exp['title']) ?></h5>
                        <p class="small text-black mb-0"><?= e($exp['detail']) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- 6. HALAMAN TERAKHIR: CREDIT (BEKAS BERANDA + FOTO PROFIL) -->
        <div id="page-credit" class="halaman" style="display: none;">
            <h2 class="h3 fw-bold text-black mb-4">Credit</h2>

            <div class="row align-items-center g-4">
                <div class="col-md-4 text-center">
                    <!-- Codingan foto profil tetap dipertahankan -->
                    <img src="profile.jpg" alt="Foto Profil <?= e($profile['name']) ?>" class="foto-profil mx-auto mb-2 d-block">

                    <small class="d-block text-black mb-2" style="font-size: 11.5px;">
                        <?= e($credit_foto) ?>
                    </small>

                    <p class="small text-black mb-3">
                        <i class="bi bi-geo-alt-fill ikon-satu-warna"></i> <?= e($profile['location']) ?>
                    </p>

                    <!-- Tombol hiasan satu warna hitam -->
                    <div class="d-flex justify-content-center gap-2 flex-wrap">
                        <button type="button" class="btn btn-sm tombol-hiasan">
                            <i class="bi bi-linkedin ikon-satu-warna"></i> LinkedIn
                        </button>
                        <button type="button" class="btn btn-sm tombol-hiasan">
                            <i class="bi bi-instagram ikon-satu-warna"></i> Instagram
                        </button>
                        <button type="button" class="btn btn-sm tombol-hiasan">
                            <i class="bi bi-github ikon-satu-warna"></i> GitHub
                        </button>
                        <button type="button" class="btn btn-sm tombol-hiasan">
                            <i class="bi bi-file-earmark-text ikon-satu-warna"></i> CV
                        </button>
                    </div>
                </div>

                <div class="col-md-8">
                    <p class="fw-bold small text-black mb-1"><?= e($profile['role']) ?></p>
                    <h3 class="h2 fw-bold text-black mb-3">Halo, Saya <?= e($profile['name']) ?></h3>
                    <p class="text-black mb-4"><?= e($profile['tagline']) ?></p>

                    <button type="button" class="btn btn-dark btn-sm me-2 nav-menu" data-page="tentang">
                        Kembali ke Tentang Saya
                    </button>
                    <button type="button" class="btn btn-link text-black text-decoration-underline btn-sm nav-menu p-0" data-page="biodata">
                        Biodata
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- FOOTER BIRU MUDA (TANPA BINGKAI/GARIS) -->
    <footer class="bg-biru-muda py-3 mt-auto">
        <div class="container d-flex justify-content-between align-items-center flex-wrap gap-2">
            <div>
                <small class="text-black fw-bold d-block">&copy; <?= date('Y') ?> <?= e($profile['name']) ?></small>
                <small class="text-black" style="font-size: 11px;"><?= e($credit_foto) ?></small>
            </div>
            <div class="d-flex gap-2 flex-wrap">
                <button type="button" class="btn btn-sm tombol-hiasan">
                    <i class="bi bi-linkedin ikon-satu-warna"></i> LinkedIn
                </button>
                <button type="button" class="btn btn-sm tombol-hiasan">
                    <i class="bi bi-instagram ikon-satu-warna"></i> Instagram
                </button>
                <button type="button" class="btn btn-sm tombol-hiasan">
                    <i class="bi bi-github ikon-satu-warna"></i> GitHub
                </button>
                <button type="button" class="btn btn-sm tombol-hiasan">
                    <i class="bi bi-file-earmark-text ikon-satu-warna"></i> CV
                </button>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script.js?v=5"></script>
</body>
</html>