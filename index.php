<?php
ini_set('session.save_path', __DIR__ . '/tmp');
if (!is_dir(__DIR__ . '/tmp')) mkdir(__DIR__ . '/tmp', 0777, true);

session_start();
include 'config.php';

// ==========================
// LOGIN ADMIN
// ==========================
if (isset($_POST['login'])) {
  $user = trim($_POST['user']);
  $pass = trim($_POST['pass']);
  
  if ($user === 'admin' && $pass === 'admin123') {
    $_SESSION['admin'] = true;
    echo "<script>window.location='index.php?admin';</script>";
    exit;
  } else {
    echo "<script>alert('Username atau password salah!');</script>";
  }
}

// ==========================
// LOGOUT
// ==========================
if (isset($_GET['logout'])) {
  session_destroy();
  echo "<script>window.location='index.php';</script>";
  exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>PDCat Shop</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>

<!-- ===== HERO SECTION ===== -->
<div class="hero">
  <h1>🐱 PDCat Shop</h1>
  <p>Tempat adopsi kucing lucu dan menggemaskan — Siapa cepat dia dapat!</p>
  <?php if(!isset($_SESSION['admin'])): ?>
    <button class="btn btn-light fw-semibold" data-bs-toggle="modal" data-bs-target="#loginModal">👩‍💼 Admin</button>
  <?php endif; ?>
</div>

<!-- ===== MARQUEE ===== -->
<div class="container my-3">
  <div class="marquee"><span>✨ Promo hari ini: Diskon 10% untuk adopsi ke-2! 🐾 | Gratis mainan kucing untuk setiap pembelian! 🎁</span></div>
</div>

<!-- ===== SLIDESHOW ===== -->
<div id="catSlide" class="carousel slide container mb-4" data-bs-ride="carousel">
  <div class="carousel-inner rounded-4 shadow">
    <div class="carousel-item active">
      <img src="uploads/admin_slide.jpg?v=<?= time(); ?>" class="d-block w-100 rounded-4" alt="Foto Admin">
    </div>
    <div class="carousel-item">
      <img src="https://cdn.pixabay.com/photo/2016/02/10/16/37/cat-1192026_1280.jpg" class="d-block w-100 rounded-4" alt="Cat">
    </div>
    <div class="carousel-item">
      <img src="https://cdn.pixabay.com/photo/2017/02/20/18/03/cat-2083492_1280.jpg" class="d-block w-100 rounded-4" alt="Cat">
    </div>
  </div>
</div>

<?php
/* ============================================================
   UPLOAD FOTO SLIDESHOW ADMIN
   ============================================================ */
if (isset($_POST['upload_foto'])) {
  $targetDir = "uploads/";
  $targetFile = $targetDir . "admin_slide.jpg";

  if (!is_dir($targetDir)) mkdir($targetDir, 0777, true);
  if (file_exists($targetFile)) unlink($targetFile);
  move_uploaded_file($_FILES["foto_admin"]["tmp_name"], $targetFile);

  echo "<script>alert('Foto slideshow berhasil diubah!');location='?admin';</script>";
  exit;
}

/* ============================================================
   TAMBAH / EDIT / HAPUS DATA KUCING
   ============================================================ */
if (isset($_POST['tambah'])) {
  $file = '';
  if (!empty($_FILES['gambar']['name'])) {
    $dir = "uploads/";
    if (!is_dir($dir)) mkdir($dir, 0777, true);
    $namaFile = time() . "_" . basename($_FILES["gambar"]["name"]);
    $file = $dir . $namaFile;
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $file);
  }
  mysqli_query($conn, "INSERT INTO kucing (nama, usia, harga, gambar) VALUES ('{$_POST['nama']}', '{$_POST['usia']}', '{$_POST['harga']}', '$file')");
  echo "<script>location='?admin';</script>";
  exit;
}

if (isset($_POST['update'])) {
  $filePath = $_POST['gambar_lama'];
  if (!empty($_FILES['gambar']['name'])) {
    $dir = "uploads/";
    $namaFile = time() . "_" . basename($_FILES["gambar"]["name"]);
    $targetFile = $dir . $namaFile;
    move_uploaded_file($_FILES["gambar"]["tmp_name"], $targetFile);
    if (file_exists($filePath)) unlink($filePath);
    $filePath = $targetFile;
  }
  mysqli_query($conn, "UPDATE kucing SET nama='{$_POST['nama']}', usia='{$_POST['usia']}', harga='{$_POST['harga']}', gambar='$filePath' WHERE id={$_POST['id']}");
  echo "<script>location='?admin';</script>";
  exit;
}

if (isset($_GET['hapus_kucing'])) {
  mysqli_query($conn,"DELETE FROM kucing WHERE id=".$_GET['hapus_kucing']);
  echo "<script>location='?admin';</script>";
  exit;
}

if (isset($_GET['hapus_pembeli'])) {
  mysqli_query($conn,"DELETE FROM pembeli WHERE id=".$_GET['hapus_pembeli']);
  echo "<script>location='?admin';</script>";
  exit;
}

/* ============================================================
   PEMBELIAN
   ============================================================ */
if (isset($_POST['beli'])) {
  $cat = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM kucing WHERE id={$_POST['id_kucing']}"));
  mysqli_query($conn, "INSERT INTO pembeli (nama_pembeli, alamat, nama_kucing, harga) VALUES ('{$_POST['nama_pembeli']}', '{$_POST['alamat']}', '{$cat['nama']}', '{$cat['harga']}')");
  echo "<script>alert('Terima kasih sudah mengadopsi {$cat['nama']}!'); location='index.php';</script>";
  exit;
}
?>

<?php if (!isset($_SESSION['admin'])): ?>
<!-- ============================================================
     HALAMAN PEMBELI
     ============================================================ -->
<div class="container">
  <h3 class="text-center text-primary fw-bold mb-3">Daftar Kucing</h3>
  <div class="row">
    <?php
    $cats = mysqli_query($conn, "SELECT * FROM kucing");
    while ($cat = mysqli_fetch_assoc($cats)):
      $cek = mysqli_query($conn, "SELECT * FROM pembeli WHERE nama_kucing='{$cat['nama']}' LIMIT 1");
      $habis = mysqli_num_rows($cek) > 0;
    ?>
      <div class="col-md-4 mb-4">
        <div class="card cat-card shadow-sm position-relative">
          <img src="<?= $cat['gambar']; ?>" class="card-img-top <?= $habis ? 'opacity-50' : ''; ?>">
          <?php if ($habis): ?>
            <div class="position-absolute top-50 start-50 translate-middle bg-dark bg-opacity-75 text-white px-3 py-2 rounded-3 fw-semibold">
              💤 Sudah Diadopsi
            </div>
          <?php endif; ?>
          <div class="card-body text-center">
            <h5><?= $cat['nama']; ?></h5>
            <p><?= $cat['usia']; ?></p>
            <p class="text-primary fw-semibold">Rp <?= number_format($cat['harga'],0,',','.'); ?></p>
            <?php if ($habis): ?>
              <button class="btn btn-secondary btn-sm" disabled>Tidak Tersedia</button>
            <?php else: ?>
              <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#beliModal" 
                data-id="<?= $cat['id']; ?>" data-nama="<?= $cat['nama']; ?>" data-harga="<?= $cat['harga']; ?>">
                Adopsi Sekarang 🐾
              </button>
            <?php endif; ?>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<?php else: ?>
<!-- ============================================================
     DASHBOARD ADMIN
     ============================================================ -->
<div class="container my-5">
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h4>👩‍💻 Dashboard Admin</h4>
    <a href="?logout" class="btn btn-danger btn-sm">Logout</a>
  </div>

  <div class="row">
    <!-- Kolom Kiri -->
    <div class="col-md-5">
      <h5>Ubah Foto Slideshow Admin</h5>
      <form method="post" enctype="multipart/form-data" class="card p-3 shadow-sm mb-4">
        <input type="file" name="foto_admin" accept="image/*" class="form-control mb-2" required>
        <button type="submit" name="upload_foto" class="btn btn-primary w-100">Unggah Foto Baru</button>
      </form>

      <h5>Tambah Kucing</h5>
      <form method="post" enctype="multipart/form-data" class="card p-3 shadow-sm mb-4">
        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama kucing" required>
        <input type="text" name="usia" class="form-control mb-2" placeholder="Usia" required>
        <input type="number" name="harga" class="form-control mb-2" placeholder="Harga" required>
        <input type="file" name="gambar" class="form-control mb-2" accept="image/*" required>
        <button type="submit" name="tambah" class="btn btn-primary w-100">Tambah</button>
      </form>

      <h5>Data Kucing</h5>
      <table class="table table-bordered text-center">
        <thead class="table-light"><tr><th>Nama</th><th>Harga</th><th>Aksi</th></tr></thead>
        <tbody>
          <?php
          $k = mysqli_query($conn,"SELECT * FROM kucing");
          while($d=mysqli_fetch_assoc($k)){
            echo "<tr>
              <td>{$d['nama']}</td>
              <td>Rp ".number_format($d['harga'],0,',','.')."</td>
              <td>
                <button class='btn btn-warning btn-sm' data-bs-toggle='modal' data-bs-target='#editModal'
                  data-id='{$d['id']}' data-nama='{$d['nama']}' data-usia='{$d['usia']}'
                  data-harga='{$d['harga']}' data-gambar='{$d['gambar']}'>Edit</button>
                <a href='?hapus_kucing={$d['id']}' class='btn btn-danger btn-sm'>Hapus</a>
              </td></tr>";
          }
          ?>
        </tbody>
      </table>
    </div>

    <!-- Kolom Kanan -->
    <div class="col-md-7">
      <h5>Data Pembeli</h5>
      <table class="table table-bordered text-center">
        <thead class="table-light"><tr><th>Nama</th><th>Kucing</th><th>Harga</th><th>Aksi</th></tr></thead>
        <tbody>
          <?php
          $p = mysqli_query($conn,"SELECT * FROM pembeli");
          while($d=mysqli_fetch_assoc($p)){
            echo "<tr>
              <td>{$d['nama_pembeli']}</td>
              <td>{$d['nama_kucing']}</td>
              <td>Rp ".number_format($d['harga'],0,',','.')."</td>
              <td><a href='?hapus_pembeli={$d['id']}' class='btn btn-danger btn-sm'>Hapus</a></td>
            </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php endif; ?>

<?php include 'modal.php'; ?>
<footer>© 2025 PDCat Shop — By pangkideswa 🐾</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>
