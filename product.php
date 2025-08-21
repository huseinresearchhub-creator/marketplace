
<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';
if ($slug === '') { header('Location: /'); exit; }
$stmt = $pdo->prepare("SELECT id,nama,slug,deskripsi,harga,durasi FROM produk WHERE slug = :slug LIMIT 1");
$stmt->execute(['slug'=>$slug]);
$produk = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$produk) { http_response_code(404); echo 'Produk tidak ditemukan'; exit; }
$title = $produk['nama'] . ' - Marketplace Akun Digital';
$desc  = excerpt($produk['deskripsi'], 160);
$waNumber = '6281234567890'; // ganti ke nomor admin
$waMsg = rawurlencode('Halo Admin, saya ingin pesan: ' . $produk['nama'] . ' - ' . moneyIDR((int)$produk['harga']) . ' / ' . $produk['durasi'] . '.');
$waLink = 'https://wa.me/' . $waNumber . '?text=' . $waMsg;
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?= sanitize($title) ?></title>
<meta name="description" content="<?= sanitize($desc) ?>" />
<link rel="stylesheet" href="/marketplace/assets/style.css?v=3">
<link rel="canonical" href="/product/<?= sanitize($produk['slug']) ?>" />
<meta property="og:title" content="<?= sanitize($title) ?>">
<meta property="og:description" content="<?= sanitize($desc) ?>">
<meta property="og:type" content="product">
<meta property="og:url" content="/product/<?= sanitize($produk['slug']) ?>">
</head>
<body>
<header><div class="header-wrap"><div class="logo">Marketplace Akun Digital</div><nav><a href="/">Beranda</a></nav></div></header>
<main class="container"> <article class="produk-detail"> <h2><?= sanitize($produk['nama']) ?></h2> <p><strong>Harga:</strong> <?= moneyIDR((int)$produk['harga']) ?> / <?= sanitize($produk['durasi']) ?></p> <p><?= nl2br(sanitize($produk['deskripsi'])) ?></p> <a class="btn" href="<?= $waLink ?>" target="_blank" rel="noopener">Pesan via WhatsApp</a> </article> <section class="steps" aria-label="Cara Langganan Akun"> <h3 class="section-title">Cara Langganan Akun</h3> <div class="timeline" aria-hidden="true"></div> <div class="step-wrap"> <div class="step"><div class="bubble">01</div><h4>Pilih Layanan</h4><p>Isi data singkat.</p></div> <div class="step"><div class="bubble">02</div><h4>Pembayaran</h4><p>QRIS/e-wallet.</p></div> <div class="step"><div class="bubble">03</div><h4>Admin Konfirmasi</h4><p>Via WhatsApp.</p></div> <div class="step"><div class="bubble">04</div><h4>Akun Siap</h4><p>Langsung dipakai.</p></div> </div> </section> </main>
<footer class="footer"><div class="wrap">© 2025 Marketplace Akun Digital</div></footer>
</body></html>
