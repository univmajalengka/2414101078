<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bukit Kanaga Hill - Majalengka</title>
    <meta name="description"
        content="Bukit Kanaga Hill — camping keluarga, sunrise terbaik Cikijing, spot foto instagramable, paket glamping & aktivitas outdoor." />
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
                        50: '#eef9ff',
                        100: '#cfefff',
                        200: '#9cdfff',
                        300: '#63c9ff',
                        400: '#2eabff',
                        500: '#148cef',
                        600: '#0b6ecd',
                        700: '#0e57a4',
                        800: '#104a85',
                        900: '#113b68'
                    },
                    navy: {
                        700: '#0c1b3a'
                    }
                }
            }
        }
    }
    </script>
    <style>
    :root {
        --navy: #0c1b3a;
    }

    body {
        font-family: 'Plus Jakarta Sans', system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
        background: var(--navy);
    }

    .card-edge {
        border-radius: 8px;
        border: 1px solid rgba(255, 255, 255, 0.06);
        box-shadow: 0 8px 30px rgba(2, 6, 23, 0.6);
    }

    .sharp-underline {
        height: 4px;
        width: 60px;
        background: linear-gradient(90deg, #2eabff, #148cef);
        border-radius: 4px
    }

    .smooth-scroll {
        scroll-behavior: smooth
    }
    </style>
</head>

<body class="text-slate-100 smooth-scroll">
    <!-- NAV / HEADER -->
    <header class="sticky top-0 z-50 bg-[rgba(4,10,25,0.6)] backdrop-blur-md border-b border-white/5">
        <div class="mx-auto max-w-6xl px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-4">
                <div class="text-lg font-semibold">Bukit Kanaga Hill - Majalengka</div>
                <div class="hidden sm:block text-sm text-slate-300">Menikmati Senja, Mengabadikan Kenangan.</div>
            </div>

            <nav class="flex items-center gap-3 text-sm">
                <a href="#beranda" class="px-3 py-2 rounded-full bg-white/5">Beranda</a>
                <a href="#about" class="px-3 py-2 rounded-full hover:bg-white/10">Tentang</a>
                <a href="#paket" class="px-3 py-2 rounded-full hover:bg-white/10">Paket</a>
                <a href="#pemesanan" class="px-3 py-2 rounded-full hover:bg-white/10">Pemesanan</a>
                <a href="#galeri" class="px-3 py-2 rounded-full hover:bg-white/10">Galeri</a>
            </nav>

            <div class="hidden sm:flex items-center gap-3">
                <a href="https://maps.app.goo.gl/8eR5TsRYRyzCoU3e9" target="_blank"
                    class="inline-flex items-center rounded-full border border-white/20 px-3 py-2">Maps</a>

                <a href="admin/login.php"
                    class="hidden md:inline-flex items-center rounded-full border border-white/15 bg-white/5 px-3 py-2 text-xs hover:bg-white/10">
                    Login
                </a>
            </div>
        </div>
    </header>

    <!-- HERO -->
    <section id="beranda" class="relative overflow-hidden py-10 md:py-16">
        <div class="mx-auto max-w-6xl px-6 grid md:grid-cols-2 gap-10 items-center">
            <div class="space-y-6">
                <p class="text-sm uppercase text-slate-300 tracking-wider">Cikijing · Majalengka</p>
                <h1 class="text-4xl md:text-5xl font-extrabold leading-tight">Bukit Kanaga Hill – Majalengka</h1>

                <p class="text-slate-300 max-w-xl">
                    Bukit Kanaga merupakan destinasi wisata alam di kaki Gunung Ciremai (±1300–1450 mdpl).
                    Nikmati pemandangan agraris, hutan pinus, kabut tipis, dan spot foto terbaik saat cuaca cerah.
                </p>

                <div class="flex flex-wrap gap-3">
                    <button type="button" data-open-booking
                        class="inline-flex items-center rounded-full bg-brand-500 px-5 py-3 font-semibold text-white hover:bg-brand-600">
                        Pesan Sekarang
                    </button>

                    <a href="#paket"
                        class="inline-flex items-center rounded-full border border-white/20 px-5 py-3 hover:bg-white/5">
                        Lihat Paket
                    </a>
                </div>

                <div class="text-sm text-slate-400">
                    Spot foto 12+ · Area camping & glamping · Cocok keluarga & komunitas
                </div>
            </div>

            <div class="w-full">
                <div class="aspect-video rounded-2xl overflow-hidden shadow-lg">
                    <iframe class="w-full h-full"
                        src="https://www.youtube-nocookie.com/embed/DIdxxO6PJEk?controls=1&modestbranding=1&rel=0"
                        title="Video Bukit Kanaga" frameborder="0"
                        allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </section>

    <main class="mx-auto max-w-6xl px-6 py-12 space-y-16">
        <!-- ABOUT -->
        <section id="about" class="rounded-2xl card-edge bg-[rgba(255,255,255,0.02)] p-6 md:p-10">
            <div class="md:grid md:grid-cols-2 gap-8 items-center">
                <div>
                    <h2 class="text-2xl font-bold">Tentang Bukit Kanaga Hill</h2>
                    <div class="sharp-underline my-4"></div>
                    <p class="text-slate-300">
                        Bukit Kanaga Hill adalah destinasi hillcamp di Cikijing, Majalengka dengan panorama sunrise &
                        sunset.
                        Tersedia area camping reguler, unit glamping sederhana, serta spot foto yang terawat.
                    </p>
                    <ul class="mt-4 grid grid-cols-1 sm:grid-cols-2 gap-2 text-slate-300">
                        <li>• Lokasi mudah dijangkau</li>
                        <li>• Fasilitas dasar lengkap</li>
                        <li>• Cocok kemah sekolah / syuting</li>
                        <li>• Event malam: BBQ & api unggun</li>
                    </ul>
                </div>
                <div class="grid grid-cols-2 gap-3">
                    <img src="./Foto/5735084730335227821-d.jpeg" alt="Bukit Kanaga"
                        class="w-full h-40 object-cover rounded-md" />
                    <img src="./Foto/2802305177583374352-d.jpeg" alt="Bukit Kanaga"
                        class="w-full h-40 object-cover rounded-md" />
                    <img src="./Foto/5317482083302372575-d.jpeg" alt="Bukit Kanaga"
                        class="w-full h-40 object-cover rounded-md" />
                    <img src="./Foto/2755730087334351228-d.jpeg" alt="Bukit Kanaga"
                        class="w-full h-40 object-cover rounded-md" />
                </div>
            </div>
        </section>

        <!-- PRICE LIST & PAKET -->
        <section id="paket" class="space-y-6">
            <div>
                <h3 class="text-xl font-bold">Price List & Paket</h3>
                <p class="text-slate-400">Pilih paket yang sesuai: Paket 2 dan Paket 4.</p>
            </div>

            <div class="grid gap-6 md:grid-cols-3">
                <!-- Price List -->
                <div class="p-4 card-edge border-l-4 border-brand-500 bg-[rgba(255,255,255,0.02)]">
                    <img src="./Foto/Pricelist/Pricelist.jpeg" alt="Price List"
                        class="w-full h-36 object-cover rounded-md mb-3" />
                    <h4 class="text-lg font-semibold">Price List</h4>
                    <p class="text-slate-300 text-sm mt-1">Sewa alat camping di lokasi. Pembayaran dilakukan di tempat.
                    </p>
                    <div class="mt-4 flex items-center justify-between gap-3">
                        <span class="font-semibold">Mulai 5K – 160K</span>
                        <button type="button"
                            class="inline-flex items-center rounded-full bg-brand-500 px-5 py-2.5 text-white font-semibold hover:bg-brand-600"
                            data-open-booking data-paket="Price List">Pesan</button>
                    </div>
                </div>

                <!-- Paket 2 -->
                <div class="p-4 card-edge border-l-4 border-brand-500 bg-[rgba(255,255,255,0.02)]">
                    <img src="./Foto/Pricelist/Paketan 2 orang.jpeg" alt="Paket 2"
                        class="w-full h-36 object-cover rounded-md mb-3" />
                    <h4 class="text-lg font-semibold">Paket 2</h4>
                    <p class="text-slate-300 text-sm mt-1">Untuk 2–3 orang. Pembayaran dilakukan saat pemesanan.</p>
                    <div class="mt-4 flex items-center justify-between gap-3">
                        <span class="font-semibold">Harga paket (flat)</span>
                        <button type="button"
                            class="inline-flex items-center rounded-full bg-brand-500 px-5 py-2.5 text-white font-semibold hover:bg-brand-600"
                            data-open-booking data-paket="Paket 2">Pesan</button>
                    </div>
                </div>

                <!-- Paket 4 -->
                <div class="p-4 card-edge border-l-4 border-brand-500 bg-[rgba(255,255,255,0.02)]">
                    <img src="./Foto/Pricelist/Paketan 4 orang.jpeg" alt="Paket 4"
                        class="w-full h-36 object-cover rounded-md mb-3" />
                    <h4 class="text-lg font-semibold">Paket 4</h4>
                    <p class="text-slate-300 text-sm mt-1">Untuk 4–5 orang. Pembayaran dilakukan saat pemesanan.</p>
                    <div class="mt-4 flex items-center justify-between gap-3">
                        <span class="font-semibold">Harga paket (flat)</span>
                        <button type="button"
                            class="inline-flex items-center rounded-full bg-brand-500 px-5 py-2.5 text-white font-semibold hover:bg-brand-600"
                            data-open-booking data-paket="Paket 4">Pesan</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- FOTO PRICELIST & PAKET -->
        <section id="foto-pricelist" class="space-y-6">
            <div>
                <h3 class="text-xl font-bold">Detail Price List & Paket</h3>
                <p class="text-slate-400 text-sm">Informasi lengkap harga dan fasilitas setiap paket</p>
            </div>

            <div class="grid gap-6 sm:grid-cols-2 md:grid-cols-3">
                <div class="card-edge overflow-hidden">
                    <div class="aspect-[3/5]">
                        <img src="Foto/Pricelist/Pricelist.jpeg" alt="Price List Alat Camping"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="p-3 text-center text-sm text-slate-300">Price List Alat Camping</div>
                </div>

                <div class="card-edge overflow-hidden">
                    <div class="aspect-[3/5]">
                        <img src="Foto/Pricelist/Paketan 2 orang.jpeg" alt="Paket 2 Orang"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="p-3 text-center text-sm text-slate-300">Paket 2 Orang</div>
                </div>

                <div class="card-edge overflow-hidden">
                    <div class="aspect-[3/5]">
                        <img src="Foto/Pricelist/Paketan 4 orang.jpeg" alt="Paket 4 Orang"
                            class="w-full h-full object-cover" />
                    </div>
                    <div class="p-3 text-center text-sm text-slate-300">Paket 4 Orang</div>
                </div>
            </div>
        </section>

        <!-- PEMESANAN -->
        <section id="pemesanan" class="rounded-2xl card-edge p-6">
            <div class="flex items-center justify-between gap-3 flex-wrap">
                <div>
                    <h3 class="text-xl font-bold">Form Pemesanan</h3>
                    <p class="text-slate-400 text-sm">Klik tombol “Pesan” pada paket atau “Pesan Sekarang” di beranda.
                    </p>
                </div>
                <button type="button" data-open-booking
                    class="inline-flex items-center rounded-full bg-brand-500 px-4 py-2 font-semibold text-white hover:bg-brand-600">
                    Buka Form
                </button>
            </div>

            <div class="sharp-underline my-4"></div>

            <div id="bookingWrap" class="hidden">
                <div class="md:grid md:grid-cols-2 gap-6">
                    <form id="bookingForm" action="booking.php" method="POST" class="space-y-4">
                        <div>
                            <label class="text-sm text-slate-300">Nama Lengkap</label>
                            <input type="text" name="nama"
                                class="w-full mt-1 rounded-md bg-[rgba(255,255,255,0.02)] border border-white/10 px-3 py-2"
                                required />
                        </div>

                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-sm text-slate-300">Tanggal Kedatangan</label>
                                <input type="date" name="tanggal"
                                    class="w-full mt-1 rounded-md bg-[rgba(255,255,255,0.02)] border border-white/10 px-3 py-2"
                                    required />
                            </div>

                            <div>
                                <label class="text-sm text-slate-300">Jumlah Tamu</label>
                                <input type="number" id="qty" name="tamu" min="1" max="3" value="2"
                                    class="w-full mt-1 rounded-md bg-[rgba(255,255,255,0.02)] border border-white/10 px-3 py-2"
                                    required />
                                <p id="limitInfo" class="text-xs text-slate-400 mt-1">Maks: 3 orang (Paket 2)</p>
                            </div>
                        </div>

                        <div>
                            <label class="text-sm text-slate-300">Paket</label>
                            <select id="paketSelect" name="paket"
                                class="w-full mt-1 rounded-md bg-[rgba(255,255,255,0.02)] border border-white/10 px-3 py-2"
                                required>
                                <option value="Price List">Price List</option>
                                <option value="Paket 2">Paket 2</option>
                                <option value="Paket 4">Paket 4</option>
                            </select>
                        </div>

                        <!-- Harga & Total (FLAT) -->
                        <div class="grid grid-cols-2 gap-3">
                            <div>
                                <label class="text-sm text-slate-300">Harga Paket</label>
                                <input type="text" id="harga_view"
                                    class="w-full mt-1 rounded-md bg-[rgba(255,255,255,0.02)] border border-white/10 px-3 py-2"
                                    value="Rp 0" readonly />
                                <input type="hidden" name="harga" id="harga" value="0" />
                            </div>

                            <div>
                                <label class="text-sm text-slate-300">Total</label>
                                <input type="text" id="total_view"
                                    class="w-full mt-1 rounded-md bg-[rgba(255,255,255,0.02)] border border-white/10 px-3 py-2"
                                    value="Rp 0" readonly />
                                <input type="hidden" name="total" id="total" value="0" />
                            </div>
                        </div>

                        <!-- Pembayaran -->
                        <div>
                            <label class="text-sm text-slate-300">Pembayaran</label>
                            <input type="text" id="pay_view"
                                class="w-full mt-1 rounded-md bg-[rgba(255,255,255,0.02)] border border-white/10 px-3 py-2"
                                value="-" readonly />
                            <input type="hidden" name="pay_type" id="pay_type" value="-" />
                            <input type="hidden" name="pay_status" id="pay_status" value="-" />
                        </div>

                        <div>
                            <label class="text-sm text-slate-300">Catatan</label>
                            <textarea name="catatan" rows="3"
                                class="w-full mt-1 rounded-md bg-[rgba(255,255,255,0.02)] border border-white/10 px-3 py-2"></textarea>
                        </div>

                        <button type="submit"
                            class="inline-flex items-center rounded-full bg-brand-500 px-5 py-3 font-semibold text-white hover:bg-brand-600">
                            Kirim Pemesanan
                        </button>
                    </form>

                    <div class="p-4 bg-[rgba(255,255,255,0.02)] rounded-md">
                        <h4 class="font-semibold">Info Pemesanan</h4>
                        <p class="text-slate-300 text-sm mt-2">
                            Setelah mengisi form, pesanan akan masuk ke sistem dan muncul di dashboard admin untuk
                            dikonfirmasi.
                        </p>
                        <ul class="mt-3 text-slate-300 text-sm space-y-2">
                            <li>• Gratis tiket parkir</li>
                            <li>• Check-in 16:00 — Check-out 11:00</li>
                            <li>• Pembatalan: refund 50% jika lebih dari 7 hari</li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

        <!-- GALERI -->
        <section id="galeri" class="space-y-6">
            <div class="flex items-center justify-between">
                <div>
                    <h3 class="text-xl font-bold">Galeri</h3>
                    <p class="text-slate-400">Kumpulan foto Bukit Kanaga Hill</p>
                </div>
            </div>

            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-3">
                <img src="./Foto/5735084730335227821-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/8715087543252302337-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/8805545127302723733-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/0583825325477012733-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/1777533853520422038-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/2802305177583374352-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/3335427830805275721-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/4753582730102357238-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/8338245372031257570-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/3377780521253453082-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/8013337273227085455-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
                <img src="./Foto/2755730087334351228-d.jpeg" alt="galeri" class="w-full h-40 object-cover rounded-md" />
            </div>
        </section>

        <!-- MAPS & CONTACT -->
        <section class="rounded-2xl card-edge p-6">
            <h3 class="text-xl font-bold">Lokasi & Kontak</h3>
            <div class="sharp-underline my-4"></div>
            <div class="md:grid md:grid-cols-2 gap-6">
                <div>
                    <p class="text-slate-300">Bukit Kanaga Hill — Desa Cikijing, Majalengka</p>
                    <p class="text-slate-300 mt-2">
                        Instagram: <a href="https://instagram.com/kanagahill_official" target="_blank"
                            class="text-brand-300">@kanagahill_official</a>
                    </p>
                </div>
                <div class="rounded-md overflow-hidden border border-white/10 bg-white/5">
                    <iframe title="Lokasi Bukit Kanaga Hill" class="w-full h-48" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        src="https://www.google.com/maps?q=Bukit%20Kanaga%20Hill%20Majalengka&output=embed"></iframe>
                </div>
            </div>
        </section>
    </main>

    <footer class="border-t border-white/10 bg-[rgba(2,6,23,0.6)] py-8">
        <div class="mx-auto max-w-6xl px-6 text-center text-slate-400">
            <p>&copy; 2025 Bukit Kanaga Hill - Majalengka</p>
            <p class="mt-2">Designed with Tailwind CSS • created by @pangkideswa</p>
        </div>
    </footer>

    <script>
    const wrap = document.getElementById("bookingWrap");
    const openBtns = document.querySelectorAll("[data-open-booking]");
    const paketSelect = document.getElementById("paketSelect");
    const qtyInput = document.getElementById("qty");
    const limitInfo = document.getElementById("limitInfo");

    const hargaView = document.getElementById("harga_view");
    const totalView = document.getElementById("total_view");
    const hargaHidden = document.getElementById("harga");
    const totalHidden = document.getElementById("total");

    const payView = document.getElementById("pay_view");
    const payType = document.getElementById("pay_type");
    const payStatus = document.getElementById("pay_status");

    // ✅ HARGA FLAT (tetap) per paket — UBAH DI SINI
    const hargaPaket = {
        "Price List": 0,
        "Paket 2": 280000,
        "Paket 4": 350000
    };

    const maxTamuByPaket = {
        "Price List": 100,
        "Paket 2": 3,
        "Paket 4": 5
    };

    const paymentRule = {
        "Price List": {
            type: "Bayar di tempat",
            status: "Bayar di lokasi"
        },
        "Paket 2": {
            type: "Langsung bayar",
            status: "Menunggu pembayaran"
        },
        "Paket 4": {
            type: "Langsung bayar",
            status: "Menunggu pembayaran"
        }
    };

    function rupiah(n) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR",
            maximumFractionDigits: 0
        }).format(n);
    }

    function openBooking(paket = "") {
        if (wrap && wrap.classList.contains("hidden")) wrap.classList.remove("hidden");
        if (paketSelect && paket) paketSelect.value = paket;
        syncAll();
        document.getElementById("pemesanan").scrollIntoView({
            behavior: "smooth"
        });
    }

    function applyLimit() {
        const paket = paketSelect?.value || "Paket 2";
        const maxTamu = maxTamuByPaket[paket] ?? 1;

        qtyInput.max = String(maxTamu);
        if (parseInt(qtyInput.value || "1", 10) > maxTamu) qtyInput.value = maxTamu;

        if (limitInfo) {
            if (paket === "Paket 2") limitInfo.textContent = "Maks: 3 orang (Paket 2)";
            else if (paket === "Paket 4") limitInfo.textContent = "Maks: 5 orang (Paket 4)";
            else limitInfo.textContent = "Jumlah tamu mengikuti pilihan kamu";
        }
    }

    // ✅ TOTAL = harga paket (FLAT), bukan dikali tamu
    function hitungHargaFlat() {
        const paket = paketSelect?.value || "Paket 2";
        const harga = hargaPaket[paket] ?? 0;
        const total = (paket === "Price List") ? 0 : harga;

        hargaView.value = rupiah(harga);
        totalView.value = rupiah(total);
        hargaHidden.value = harga;
        totalHidden.value = total;
    }

    function applyPaymentRule() {
        const paket = paketSelect?.value || "Paket 2";
        const rule = paymentRule[paket] || {
            type: "-",
            status: "-"
        };

        payView.value = `${rule.type} • ${rule.status}`;
        payType.value = rule.type;
        payStatus.value = rule.status;
    }

    function syncAll() {
        applyLimit();
        hitungHargaFlat();
        applyPaymentRule();
    }

    openBtns.forEach(btn => btn.addEventListener("click", () => openBooking(btn.dataset.paket || "")));
    paketSelect?.addEventListener("change", syncAll);
    qtyInput?.addEventListener("input", syncAll);

    syncAll();
    </script>
</body>

</html>