<?php
session_start();
if (empty($_SESSION["is_admin"])) {
  header("Location: login.php");
  exit;
}

require_once "../db.php";

$q = trim($_GET["q"] ?? "");
$status = trim($_GET["status"] ?? "");

$sql = "SELECT * FROM orders WHERE 1=1";
$params = [];
$types = "";

if ($q !== "") {
  $sql .= " AND (nama LIKE ? OR paket LIKE ? OR catatan LIKE ?)";
  $like = "%{$q}%";
  $params = array_merge($params, [$like, $like, $like]);
  $types .= "sss";
}

$allowed = ["pending","confirmed","cancelled"];
if ($status !== "" && in_array($status, $allowed, true)) {
  $sql .= " AND status = ?";
  $params[] = $status;
  $types .= "s";
}

$sql .= " ORDER BY created_at DESC";

$stmt = $conn->prepare($sql);
if (!empty($params)) $stmt->bind_param($types, ...$params);
$stmt->execute();
$result = $stmt->get_result();

$stats = $conn->query("
  SELECT
    COUNT(*) total,
    SUM(status='pending') pending,
    SUM(status='confirmed') confirmed,
    SUM(status='cancelled') cancelled
  FROM orders
")->fetch_assoc();

function badgeClass($s) {
  return match($s) {
    "confirmed" => "bg-emerald-500/15 text-emerald-200 border-emerald-400/20",
    "cancelled" => "bg-rose-500/15 text-rose-200 border-rose-400/20",
    default     => "bg-amber-500/15 text-amber-200 border-amber-400/20",
  };
}
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Admin - Pesanan</title>
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

<body class="min-h-screen bg-[#0c1b3a] text-slate-100">
    <div class="mx-auto max-w-6xl px-6 py-8">
        <!-- Header -->
        <div class="flex flex-wrap items-center justify-between gap-3">
            <div>
                <h1 class="text-2xl font-bold">Dashboard Pesanan</h1>
                <p class="text-sm text-slate-300">Kelola pesanan (status & data) dari website</p>
            </div>
            <div class="flex gap-2">
                <a href="../index.php" target="_blank"
                    class="rounded-full border border-white/15 bg-white/5 px-4 py-2 text-sm hover:bg-white/10">
                    Buka Website
                </a>
                <a href="logout.php"
                    class="rounded-full border border-white/15 bg-white/5 px-4 py-2 text-sm hover:bg-white/10">
                    Logout
                </a>
            </div>
        </div>

        <!-- Stats -->
        <div class="mt-6 grid gap-4 sm:grid-cols-2 lg:grid-cols-4">
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <div class="text-sm text-slate-300">Total</div>
                <div class="text-2xl font-extrabold"><?= (int)$stats["total"] ?></div>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <div class="text-sm text-slate-300">Pending</div>
                <div class="text-2xl font-extrabold"><?= (int)$stats["pending"] ?></div>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <div class="text-sm text-slate-300">Confirmed</div>
                <div class="text-2xl font-extrabold"><?= (int)$stats["confirmed"] ?></div>
            </div>
            <div class="rounded-2xl border border-white/10 bg-white/5 p-4">
                <div class="text-sm text-slate-300">Cancelled</div>
                <div class="text-2xl font-extrabold"><?= (int)$stats["cancelled"] ?></div>
            </div>
        </div>

        <!-- Filter -->
        <div class="mt-6 rounded-2xl border border-white/10 bg-white/5 p-4">
            <form method="GET" class="flex flex-wrap items-center gap-3">
                <input name="q" value="<?= htmlspecialchars($q) ?>" placeholder="Cari nama / paket / catatan..."
                    class="w-full sm:w-80 rounded-xl bg-white/5 border border-white/10 px-4 py-2 outline-none focus:border-brand-500" />

                <select name="status"
                    class="rounded-xl bg-white/5 border border-white/10 px-4 py-2 outline-none focus:border-brand-500">
                    <option value="">Semua status</option>
                    <option value="pending" <?= $status==="pending"?"selected":"" ?>>pending</option>
                    <option value="confirmed" <?= $status==="confirmed"?"selected":"" ?>>confirmed</option>
                    <option value="cancelled" <?= $status==="cancelled"?"selected":"" ?>>cancelled</option>
                </select>

                <button type="submit" class="rounded-xl bg-brand-500 hover:bg-brand-600 px-4 py-2 font-semibold">
                    Filter
                </button>

                <a href="index.php" class="rounded-xl border border-white/15 bg-white/5 px-4 py-2 hover:bg-white/10">
                    Reset
                </a>
            </form>
        </div>

        <!-- Table -->
        <div class="mt-6 overflow-hidden rounded-2xl border border-white/10 bg-white/5">
            <div class="overflow-x-auto">
                <table class="min-w-[1000px] w-full text-sm">
                    <thead class="bg-white/5 text-slate-300">
                        <tr>
                            <th class="px-4 py-3 text-left">ID</th>
                            <th class="px-4 py-3 text-left">Nama</th>
                            <th class="px-4 py-3 text-left">Tanggal</th>
                            <th class="px-4 py-3 text-left">Tamu</th>
                            <th class="px-4 py-3 text-left">Paket</th>
                            <th class="px-4 py-3 text-left">Catatan</th>
                            <th class="px-4 py-3 text-left">Status</th>
                            <th class="px-4 py-3 text-left">Waktu</th>
                            <th class="px-4 py-3 text-left">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-white/10">
                        <?php while($r = $result->fetch_assoc()): ?>
                        <tr class="hover:bg-white/5">
                            <td class="px-4 py-3"><?= (int)$r["id"] ?></td>
                            <td class="px-4 py-3 font-medium"><?= htmlspecialchars($r["nama"]) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($r["tanggal"]) ?></td>
                            <td class="px-4 py-3"><?= (int)$r["tamu"] ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($r["paket"]) ?></td>
                            <td class="px-4 py-3 text-slate-300"><?= nl2br(htmlspecialchars($r["catatan"] ?? "")) ?>
                            </td>
                            <td class="px-4 py-3">
                                <div class="inline-flex items-center gap-2">
                                    <span class="rounded-full border px-3 py-1 text-xs <?= badgeClass($r["status"]) ?>">
                                        <?= htmlspecialchars($r["status"]) ?>
                                    </span>
                                    <form method="POST" action="update_status.php" class="flex items-center gap-2">
                                        <input type="hidden" name="id" value="<?= (int)$r["id"] ?>">
                                        <select name="status"
                                            class="rounded-xl bg-white/5 border border-white/10 px-3 py-2 outline-none focus:border-brand-500">
                                            <option value="pending" <?= $r["status"]==="pending"?"selected":"" ?>>
                                                pending</option>
                                            <option value="confirmed" <?= $r["status"]==="confirmed"?"selected":"" ?>>
                                                confirmed</option>
                                            <option value="cancelled" <?= $r["status"]==="cancelled"?"selected":"" ?>>
                                                cancelled</option>
                                        </select>
                                        <button type="submit"
                                            class="rounded-xl bg-brand-500 hover:bg-brand-600 px-3 py-2 font-semibold">
                                            Simpan
                                        </button>
                                    </form>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-slate-300"><?= htmlspecialchars($r["created_at"]) ?></td>
                            <td class="px-4 py-3">
                                <div class="flex items-center gap-2">
                                    <a href="edit.php?id=<?= (int)$r["id"] ?>"
                                        class="rounded-xl border border-white/15 bg-white/5 px-3 py-2 hover:bg-white/10">
                                        Edit
                                    </a>

                                    <form method="POST" action="delete.php"
                                        onsubmit="return confirm('Hapus pesanan ini?')">
                                        <input type="hidden" name="id" value="<?= (int)$r["id"] ?>">
                                        <button type="submit"
                                            class="rounded-xl border border-rose-400/20 bg-rose-500/10 px-3 py-2 text-rose-200 hover:bg-rose-500/15">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>

                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</body>

</html>