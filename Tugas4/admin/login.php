<?php
session_start();

// GANTI INI (biar aman)
$ADMIN_USER = "pangkiaja";
$ADMIN_PASS = "2414101078";

$error = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $u = trim($_POST["username"] ?? "");
  $p = trim($_POST["password"] ?? "");

  if ($u === $ADMIN_USER && $p === $ADMIN_PASS) {
    $_SESSION["is_admin"] = true;
    header("Location: admin.php");
    exit;
  } else {
    $error = "Username atau password salah.";
  }
}
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    brand: {
                        500: "#148cef",
                        600: "#0b6ecd"
                    }
                }
            }
        }
    }
    </script>
</head>

<body class="min-h-screen bg-[#0c1b3a] text-slate-100 flex items-center justify-center p-6">
    <div class="w-full max-w-md rounded-2xl border border-white/10 bg-white/5 backdrop-blur p-6 shadow-xl">
        <div class="mb-5">
            <h1 class="text-2xl font-bold">Login Admin</h1>
            <p class="text-sm text-slate-300">Bukit Kanaga Hill — Dashboard Pesanan</p>
        </div>

        <?php if ($error): ?>
        <div class="mb-4 rounded-lg border border-red-400/30 bg-red-500/10 px-4 py-3 text-red-200 text-sm">
            <?= htmlspecialchars($error) ?>
        </div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label class="text-sm text-slate-300">Username</label>
                <input name="username" required
                    class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 outline-none focus:border-brand-500" />
            </div>

            <div>
                <label class="text-sm text-slate-300">Password</label>
                <input name="password" type="password" required
                    class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 outline-none focus:border-brand-500" />
            </div>

            <button type="submit" class="w-full rounded-xl bg-brand-500 hover:bg-brand-600 px-4 py-3 font-semibold">
                Masuk
            </button>

            <a href="../index.php" class="block text-center text-sm text-slate-300 hover:text-white">
                ← Kembali ke website
            </a>
        </form>
    </div>
</body>

</html>