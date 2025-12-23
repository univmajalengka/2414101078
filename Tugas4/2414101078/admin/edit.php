<?php
session_start();
if (empty($_SESSION["is_admin"])) { header("Location: login.php"); exit; }

require_once "../db.php";

$id = (int)($_GET["id"] ?? 0);
if ($id < 1) { http_response_code(400); exit("ID tidak valid"); }

$stmt = $conn->prepare("SELECT * FROM orders WHERE id=?");
$stmt->bind_param("i", $id);
$stmt->execute();
$order = $stmt->get_result()->fetch_assoc();

if (!$order) { http_response_code(404); exit("Data tidak ditemukan"); }

$allowed = ["pending","confirmed","cancelled"];
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Edit Pesanan #<?= (int)$order["id"] ?></title>
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
    <div class="mx-auto max-w-2xl px-6 py-10">
        <div class="flex items-center justify-between gap-3">
            <div>
                <h1 class="text-2xl font-bold">Edit Pesanan</h1>
                <p class="text-sm text-slate-300">ID: #<?= (int)$order["id"] ?></p>
            </div>
            <a href="admin.php" class="rounded-xl border border-white/15 bg-white/5 px-4 py-2 hover:bg-white/10">
                ← Kembali
            </a>
        </div>

        <div class="mt-6 rounded-2xl border border-white/10 bg-white/5 p-6">
            <form method="POST" action="update.php" class="space-y-4">
                <input type="hidden" name="id" value="<?= (int)$order["id"] ?>">

                <div>
                    <label class="text-sm text-slate-300">Nama</label>
                    <input name="nama" required value="<?= htmlspecialchars($order["nama"]) ?>"
                        class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 outline-none focus:border-brand-500" />
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <label class="text-sm text-slate-300">Tanggal</label>
                        <input type="date" name="tanggal" required value="<?= htmlspecialchars($order["tanggal"]) ?>"
                            class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 outline-none focus:border-brand-500" />
                    </div>
                    <div>
                        <label class="text-sm text-slate-300">Jumlah Tamu</label>
                        <input type="number" min="1" name="tamu" required value="<?= (int)$order["tamu"] ?>"
                            class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 outline-none focus:border-brand-500" />
                    </div>
                </div>

                <div>
                    <label class="text-sm text-slate-300">Paket</label>
                    <select name="paket" required
                        class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 outline-none focus:border-brand-500">
                        <?php
              $paketList = ["Paket 2","Paket 4","Price List"];
              foreach ($paketList as $p):
            ?>
                        <option value="<?= htmlspecialchars($p) ?>" <?= $order["paket"]===$p ? "selected":"" ?>>
                            <?= htmlspecialchars($p) ?>
                        </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="text-sm text-slate-300">Catatan</label>
                    <textarea name="catatan" rows="4"
                        class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 outline-none focus:border-brand-500"><?= htmlspecialchars($order["catatan"] ?? "") ?></textarea>
                </div>

                <div>
                    <label class="text-sm text-slate-300">Status</label>
                    <select name="status" required
                        class="mt-1 w-full rounded-xl bg-white/5 border border-white/10 px-4 py-3 outline-none focus:border-brand-500">
                        <?php foreach ($allowed as $s): ?>
                        <option value="<?= $s ?>" <?= $order["status"]===$s ? "selected":"" ?>><?= $s ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="flex flex-wrap gap-3 pt-2">
                    <button type="submit" class="rounded-xl bg-brand-500 hover:bg-brand-600 px-5 py-3 font-semibold">
                        Simpan Perubahan
                    </button>
                    <a href="admin.php"
                        class="rounded-xl border border-white/15 bg-white/5 px-5 py-3 hover:bg-white/10">
                        Batal
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>