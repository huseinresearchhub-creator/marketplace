
<?php
require_once __DIR__ . '/includes/config.php';
require_once __DIR__ . '/includes/functions.php';
$stmt = $pdo->prepare("SELECT id,nama,slug,deskripsi,harga,durasi FROM produk ORDER BY id DESC");
$stmt->execute();
$produk_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
$title = 'Marketplace Akun Digital - Jual Beli & Sewa Akun Streaming';
$desc  = 'Temukan akun digital pilihan. Proses cepat: Pilih Layanan → Bayar → Admin Konfirmasi → Akun Siap.';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?= sanitize($title) ?></title>
<meta name="description" content="<?= sanitize($desc) ?>" />
<link rel="stylesheet" href="/marketplace/assets/style.css?v=3">
<link rel="canonical" href="/" />
</head>
<body>
<header>
  <div class="header-wrap"><div class="logo">Marketplace Akun Digital</div><nav><a href="/">Beranda</a></nav></div>
</header>
<section class="hero">
  <h1>Transaksi Akun Digital Aman & Cepat</h1>
  <p>Langkah sederhana: Pilih Layanan → Pembayaran → Admin Konfirmasi via WhatsApp → Akun Siap Digunakan.</p>
  <a class="cta" href="#produk">Jelajahi Produk</a>
</section>
<main>
  <section class="steps" aria-label="Cara Langganan Akun">
    <h2 class="section-title">Cara Langganan Akun</h2>
    <div class="timeline" aria-hidden="true"></div>
    <div class="step-wrap">
      <div class="step"><div class="bubble">01</div><h4>Pilih Layanan</h4><p>Isi data pesanan singkat.</p></div>
      <div class="step"><div class="bubble">02</div><h4>Lakukan Pembayaran</h4><p>Via QRIS/e-wallet.</p></div>
      <div class="step"><div class="bubble">03</div><h4>Admin Konfirmasi</h4><p>Melalui WhatsApp.</p></div>
      <div class="step"><div class="bubble">04</div><h4>Akun Siap</h4><p>Aktif dan bisa dipakai.</p></div>
    </div>
  </section>
  <h2 id="produk" class="section-title">Produk Akun Digital</h2>
  <div class="grid">
    <?php foreach ($produk_list as $p): ?>
      <article class="card">
        <h3><a href="/product/<?= sanitize($p['slug']) ?>"><?= sanitize($p['nama']) ?></a></h3>
        <div class="price"><?= moneyIDR((int)$p['harga']) ?> / <?= sanitize($p['durasi']) ?></div>
        <div class="meta"><?= sanitize(excerpt($p['deskripsi'], 120)) ?></div>
        <a class="btn" href="/product/<?= sanitize($p['slug']) ?>">Lihat Detail</a>
      </article>
    <?php endforeach; ?>
  </div>
</main>
<footer class="footer"><div class="wrap">© 2025 Marketplace Akun Digital</div></footer>
</body></html>
