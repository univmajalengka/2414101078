<!doctype html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Pesanan Berhasil</title>

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    sans: ['"Plus Jakarta Sans"', 'ui-sans-serif', 'system-ui']
                },
                colors: {
                    brand: {
                        500: '#148cef',
                        600: '#0b6ecd'
                    },
                    navy: {
                        900: '#071226',
                        800: '#0c1b3a'
                    }
                },
                boxShadow: {
                    'adv-card': '0 10px 30px rgba(2,6,23,0.6)'
                }
            }
        }
    }
    </script>

    <style>
    body {
        background: #0c1b3a;
    }

    .card-edge {
        border-radius: 16px;
        border: 1px solid rgba(255, 255, 255, 0.08);
        box-shadow: 0 10px 30px rgba(2, 6, 23, 0.6);
    }
    </style>
</head>

<body class="min-h-screen text-slate-100 font-sans">
    <!-- background glow -->
    <div class="pointer-events-none fixed inset-0 opacity-60">
        <div class="absolute -top-24 -left-24 w-80 h-80 rounded-full bg-brand-500/20 blur-3xl"></div>
        <div class="absolute -bottom-24 -right-24 w-80 h-80 rounded-full bg-white/10 blur-3xl"></div>
    </div>

    <main class="relative mx-auto max-w-3xl px-6 py-16">
        <div class="card-edge bg-white/5 backdrop-blur p-6 md:p-10">
            <div class="flex flex-col md:flex-row md:items-center gap-6">
                <!-- icon -->
                <div class="shrink-0">
                    <div
                        class="w-16 h-16 rounded-2xl bg-emerald-500/15 border border-emerald-400/20 flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-9 h-9 text-emerald-200" viewBox="0 0 24 24"
                            fill="none">
                            <path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>

                <!-- text -->
                <div class="flex-1">
                    <h1 class="text-2xl md:text-3xl font-extrabold">
                        Pesanan berhasil dikirim ✅
                    </h1>
                    <p class="mt-2 text-slate-300">
                        Terima kasih! Admin akan mengonfirmasi <b>ketersediaan</b> dan <b>pembayaran</b> melalui kontak
                        yang tersedia.
                    </p>

                    <div class="mt-5 grid gap-3 sm:grid-cols-3">
                        <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                            <div class="text-xs text-slate-400">Status</div>
                            <div class="mt-1 font-semibold text-amber-200">Pending</div>
                        </div>
                        <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                            <div class="text-xs text-slate-400">Check-in</div>
                            <div class="mt-1 font-semibold">16:00</div>
                        </div>
                        <div class="rounded-xl border border-white/10 bg-white/5 p-3">
                            <div class="text-xs text-slate-400">Check-out</div>
                            <div class="mt-1 font-semibold">11:00</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- buttons -->
            <div class="mt-8 flex flex-wrap gap-3">
                <a href="index.php#pemesanan"
                    class="inline-flex items-center rounded-full bg-brand-500 hover:bg-brand-600 px-5 py-3 font-semibold text-white">
                    Kembali ke Website
                </a>

                <a href="admin/login.php"
                    class="inline-flex items-center rounded-full border border-white/15 bg-white/5 hover:bg-white/10 px-5 py-3 font-semibold">
                    Ke Admin
                </a>

                <a href="index.php"
                    class="inline-flex items-center rounded-full border border-white/15 bg-white/5 hover:bg-white/10 px-5 py-3 font-semibold">
                    Beranda
                </a>
            </div>

            <!-- small note -->
            <p class="mt-6 text-sm text-slate-400">
                Jika ada perubahan jadwal, silakan hubungi admin melalui WhatsApp/Instagram pada menu kontak di website.
            </p>
        </div>

        <footer class="mt-8 text-center text-slate-500 text-sm">
            &copy; 2025 Bukit Kanaga Hill - Majalengka
        </footer>
    </main>
</body>

</html>