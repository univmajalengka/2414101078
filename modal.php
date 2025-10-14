<?php
/* ============================================================
   SISTEM LOGIN / LOGOUT (DIPERBAIKI UNTUK HOSTING)
   ============================================================ */
if (isset($_POST['login'])) {
  $user = trim($_POST['user']);
  $pass = trim($_POST['pass']);

  // Pastikan login hanya admin/admin123
  if ($user === 'admin' && $pass === 'admin123') {
    $_SESSION['admin'] = true;
    echo "<script>window.location='index.php?admin';</script>";
    exit;
  } else {
    echo "<script>alert('Username atau password salah!');</script>";
  }
}

if (isset($_GET['logout'])) {
  session_destroy();
  echo "<script>window.location='index.php';</script>";
  exit;
}
?>

<!-- ============================================================
     MODAL LOGIN ADMIN
     ============================================================ -->
<div class="modal fade" id="loginModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Login Admin</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <form method="post">
          <div class="mb-3">
            <label class="form-label">Username</label>
            <input type="text" name="user" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Password</label>
            <input type="password" name="pass" class="form-control" required>
          </div>
          <button type="submit" name="login" class="btn btn-primary w-100">Login</button>
        </form>
      </div>
    </div>
  </div>
</div>
