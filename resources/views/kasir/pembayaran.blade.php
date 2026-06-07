@extends('layout.app')
@section('content')
    <style>
        /* Variabel Warna Sesuai Desain Awal */
        :root {
            --primary-color: #002b85;
            --primary-container: #093fb4;
            --primary-fixed: #dce1ff;
            --background-color: #f8f9ff;
            --surface-lowest: #ffffff;
            --surface-low: #eff4ff;
            --surface-container: #e5eeff;
            --on-surface-variant: #434653;
            --outline-variant: #c4c5d6;
            --error-container: #ffdad6;
            --on-error-container: #93000a;
        }

        body {
            font-family: "Inter", sans-serif;
            background-color: var(--background-color);
            color: #0b1c30;
        }

        h1,
        h2,
        h3,
        .headline-font {
            font-family: "Hanken Grotesk", sans-serif;
            font-weight: 700;
        }

        .text-primary-custom {
            color: var(--primary-color);
        }

        .bg-primary-custom {
            background-color: var(--primary-color);
        }

        .bg-surface-low {
            background-color: var(--surface-low);
        }

        .card-shadow {
            box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
            border: 1px solid rgba(196, 197, 214, 0.3);
        }

        /* Gaya Tombol Metode Pembayaran */
        .payment-method {
            background: var(--surface-lowest);
            border: 2px solid var(--outline-variant);
            transition: all 0.2s ease;
        }

        .payment-method:hover {
            background-color: rgba(0, 43, 133, 0.05);
        }

        .payment-method.active {
            border-color: var(--primary-container) !important;
            background-color: rgba(9, 63, 180, 0.08) !important;
            outline: 2px solid var(--primary-container);
            outline-offset: 2px;
        }

        .payment-method.active .material-symbols-outlined {
            color: var(--primary-color) !important;
        }

        /* Kustomisasi Input Uang */
        .cash-input-container .currency-addon {
            position: absolute;
            left: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 10;
            font-family: "Hanken Grotesk", sans-serif;
            font-size: 1.5rem;
            color: #747685;
        }

        #cash-input {
            font-family: "Hanken Grotesk", sans-serif;
            font-size: 2rem;
            font-weight: 700;
            padding-left: 4rem;
            background-color: var(--surface-low);
            border: 2px solid transparent;
            border-radius: 12px;
        }

        #cash-input:focus {
            border-color: var(--primary-container);
            box-shadow: none;
            background-color: var(--surface-lowest);
        }

        /* Numpad & Scrollbar */
        .btn-numpad {
            background-color: var(--surface-low);
            font-family: "Hanken Grotesk", sans-serif;
            font-size: 1.5rem;
            font-weight: 600;
            border: none;
            padding: 20px;
            border-radius: 12px;
            transition: all 0.1s ease;
        }

        .btn-numpad:hidden-p {
            background-color: #dce9ff;
        }

        .btn-numpad:active {
            transform: scale(0.95);
        }

        .custom-scrollbar {
            max-height: 240px;
            overflow-y: auto;
        }

        .custom-scrollbar::-webkit-scrollbar {
            width: 4px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #e5eeff;
            border-radius: 10px;
        }

        .material-symbols-outlined {
            vertical-align: middle;
        }
    </style>
    </head>

    <body class="py-4">

        <main class="container-fluid px-4 style-container" style="max-w: 1200px; margin: 0 auto;">

            <div
                class="d-flex flex-column flex-sm-row align-items-start align-items-sm-end justify-content-between mb-4 gap-3">
                <div class="d-flex align-items-center gap-3">
                    <button onclick="goBack()"
                        class="btn bg-white card-shadow d-flex align-items-center justify-content-center"
                        style="width: 48px; height: 48px; border-radius: 12px;" title="Kembali">
                        <i class="ti ti-chevron-left"></i>                    </button>
                    <div>
                        <h1 class="text-primary-custom mb-0 h2">Pembayaran</h1>
                    </div>
                </div>
                <div class="text-sm-end">
                    <p class="text-uppercase text-muted small fw-bold mb-0" style="letter-spacing: 0.05em;">Total Tagihan
                    </p>
                    <p class="h2 mb-0 fw-bold">Rp 3.051.390</p>
                </div>
            </div>

            <div class="row g-4">

                <div class="col-12 col-lg-7">
                    <div class="d-flex flex-column gap-4">

                        <div class="card card-shadow border-0 bg-white p-4" style="border-radius: 16px;">
                            <h3 class="h5 mb-3">Metode Pembayaran</h3>
                            <div class="row g-3">
                                <div class="col-4">
                                    <button
                                        class="payment-method btn w-full d-flex flex-column align-items-center justify-content-center p-3 rounded-3 w-100"
                                        onclick="selectMethod(this)">
                                        <i class="ti ti-cash fs-3"></i>
                                        <span class="small fw-semibold text-dark">Tunai</span>
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button
                                        class="payment-method btn w-full d-flex flex-column align-items-center justify-content-center p-3 rounded-3 w-100"
                                        onclick="selectMethod(this)">
                                        <i class="ti ti-qrcode fs-3"></i>
                                        <span class="small fw-semibold text-dark">QRIS</span>
                                    </button>
                                </div>
                                <div class="col-4">
                                    <button
                                        class="payment-method btn w-full d-flex flex-column align-items-center justify-content-center p-3 rounded-3 w-100"
                                        onclick="selectMethod(this)">
                                        <i class="ti ti-credit-card fs-3"></i>
                                        <span class="small fw-semibold text-dark">Kartu</span>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="card card-shadow border-0 bg-white p-4" style="border-radius: 16px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="h5 mb-0">Jumlah Diterima</h3>
                                <span class="badge bg-light text-primary-custom px-3 py-2 rounded-pill border small">Mata
                                    Uang: IDR</span>
                            </div>

                            <div class="mb-3 position-relative cash-input-container">
                                <span class="currency-addon fw-bold">Rp</span>
                                <input type="text" class="form-control text-end" id="cash-input" value="0" readonly />
                            </div>

                            <div class="row g-2 mb-3">
                                <div class="col-6 col-md-3">
                                    <button class="btn btn-outline-secondary w-100 py-2 small fw-semibold"
                                        onclick="setAmount(3051390)">Uang Pas</button>
                                </div>
                                <div class="col-6 col-md-3">
                                    <button class="btn btn-outline-secondary w-100 py-2 small fw-semibold"
                                        onclick="setAmount(3100000)">Rp 3.1m</button>
                                </div>
                                <div class="col-6 col-md-3">
                                    <button class="btn btn-outline-secondary w-100 py-2 small fw-semibold"
                                        onclick="setAmount(3500000)">Rp 3.5m</button>
                                </div>
                                <div class="col-6 col-md-3">
                                    <button class="btn btn-outline-secondary w-100 py-2 small fw-semibold"
                                        onclick="setAmount(4000000)">Rp 4.0m</button>
                                </div>
                            </div>

                            <div class="row g-2">
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(1)">1</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(2)">2</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(3)">3</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(4)">4</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(5)">5</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(6)">6</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(7)">7</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(8)">8</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(9)">9</button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-numpad w-100 text-danger"
                                        style="background-color: var(--error-container); color: var(--on-error-container) !important;"
                                        onclick="clearInput()">C</button>
                                </div>
                                <div class="col-4"><button class="btn btn-numpad w-100" onclick="appendDigit(0)">0</button>
                                </div>
                                <div class="col-4">
                                    <button class="btn btn-numpad w-100 d-flex align-items-center justify-content-center"
                                        onclick="popDigit()">
                                        <i class="ti ti-backspace fs-2"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="d-flex flex-column gap-4 h-100">

                        <div class="card card-shadow border-0 bg-white p-4 flex-grow-1 d-flex flex-column"
                            style="border-radius: 16px;">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <h3 class="h5 mb-0">Ringkasan Pesanan</h3>
                                <span class="text-muted small fw-semibold">3 Items</span>
                            </div>

                            <div class="custom-scrollbar pe-1 d-flex flex-column gap-3 flex-grow-1">

                                <div class="d-flex gap-3 p-2 bg-light border rounded-3 align-items-center">
                                    <div class="bg-secondary-subtle rounded flex-shrink-0 overflow-hidden"
                                        style="width: 64px; height: 64px;">
                                        <img alt="Nike Red" class="w-100 h-100 object-fit-cover"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuAJqwv2lDmg6by3NnhRz8Q1RArfvqbi2EHOiOzsuLTfBmK8M4yVDLRmfUV-3q4U2239rU_I3ZYuWrGth4BFMIkY8KtC2e3QgJqERivyTPU7Haur0dy5Ku4Te2gfJ_5GDl0kIX0noAQi9q8PPAXJh6ro6cOgtYds2dGgZL53o9hG1qOz7ffKaHhT1wfKG4MxaEpkATL6bLkefghe3Ot-VMwnJAV1DjLvGdL0MaU54x9kRqyerRDytoPivCJnEZG-ypa7JCveJacwaw" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-bold small">Nike Air Zoom Pegasus 38</p>
                                        <p class="text-muted mb-1" style="font-size: 11px;">Ukuran: 42 • Warna: Crimson Red
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted" style="font-size: 11px;">1 x Rp 1.899.000</span>
                                            <span class="fw-bold small" style="font-family: 'JetBrains Mono';">Rp
                                                1.899.000</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-3 p-2 bg-light border rounded-3 align-items-center">
                                    <div class="bg-secondary-subtle rounded flex-shrink-0 overflow-hidden"
                                        style="width: 64px; height: 64px;">
                                        <img alt="Nike Pastel" class="w-100 h-100 object-fit-cover"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuDcBmZcn5YiV-4H3y-V5xp7m7dj6zj26cRFlKGBlhUzEOt5y1uLyMN-qa_kd5tg8WM9ufRe3Ks64_cgeQCsaVr3JRptS3XPRgrP_tQbRfJOVgYMib1MC7a8M-vI9RWCPtDitzVbkv5oxPRXJhCKs1NwivgGj2pbTQmNRz87zATxOwcKidwUu5USMmfBr8Sp_3S6zMmef1lLeiFVz1U4hZcg6QYAZkMecKodozTI23xb1YH2KtplORLTvG4EuapinNfMDppQg-2JgQ" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-bold small">Adidas Originals Stan Smith</p>
                                        <p class="text-muted mb-1" style="font-size: 11px;">Ukuran: 40 • Warna: White/Green
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted" style="font-size: 11px;">1 x Rp 999.000</span>
                                            <span class="fw-bold small" style="font-family: 'JetBrains Mono';">Rp
                                                999.000</span>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex gap-3 p-2 bg-light border rounded-3 align-items-center">
                                    <div class="bg-secondary-subtle rounded flex-shrink-0 overflow-hidden"
                                        style="width: 64px; height: 64px;">
                                        <img alt="Vans" class="w-100 h-100 object-fit-cover"
                                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuD4I5oveY4zmZKjvKGcuYOYA4IC1syFRFm-X-TUqs1h32SC5cOyYXaoDH_pNdpXMuPGYotDH7bVkQEHDtL2-fyhjKVhAtKtBfff8OC76H_wlXUNpDqH_eoaSVBPNXC8WRWddG_ZdToOXwjJi0CEe9skNZ9T0UHKhaGStivyVX9M7mv-7yrMBcXvePmIZXk_19rgf8yrXVNE-CldxkDTjfn3uaCGMOl757q3IDgEfZtqeiUllfHctWk-We6iRTIsTzbY_vzdQ8OT0w" />
                                    </div>
                                    <div class="flex-grow-1">
                                        <p class="mb-0 fw-bold small">Step Point Crew Socks</p>
                                        <p class="text-muted mb-1" style="font-size: 11px;">Ukuran: All Size • Warna: White
                                        </p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted" style="font-size: 11px;">2 x Rp 76.695</span>
                                            <span class="fw-bold small" style="font-family: 'JetBrains Mono';">Rp
                                                153.390</span>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="mt-4 pt-3 border-top border-secondary border-dashed border-1">
                                <div class="d-flex justify-content-between text-muted small mb-1">
                                    <span>Subtotal</span>
                                    <span>Rp 3.051.390</span>
                                </div>
                                <div class="d-flex justify-content-between text-muted small mb-2">
                                    <span>Diskon</span>
                                    <span class="text-danger">- Rp 0</span>
                                </div>
                                <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                    <span class="fw-bold text-dark">Total Tagihan</span>
                                    <span class="h4 mb-0 fw-bold text-primary-custom">Rp 3.051.390</span>
                                </div>
                            </div>
                        </div>

                        <div class="card border-0 text-white p-4 shadow-lg bg-primary-custom" style="border-radius: 16px;">
                            <div class="d-flex justify-content-between align-items-center mb-4">
                                <div>
                                    <p class="text-uppercase text-white-50 small fw-semibold mb-0"
                                        style="letter-spacing: 0.05em;">Kembalian</p>
                                    <p class="h1 mb-0 fw-bold headline-font" id="change-display">Rp 0</p>
                                </div>
                                <div class="rounded-circle d-flex align-items-center justify-content-center"
                                    style="width: 48px; height: 48px; background: rgba(255,255,255,0.2);">
                                    <i class="ti ti-wallet fs-4"></i>
                                </div>
                            </div>

                            <button class="btn btn-light text-primary-custom w-100 py-3 fw-bold h5 mb-3"
                                style="border-radius: 12px; transition: all 0.2s;" id="process-btn">
                                Proses Pembayaran
                            </button>
                        </div>

                    </div>
                </div>

            </div>
        </main>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            let currentInput = "0";
            const totalBill = 3051390;
            const inputDisplay = document.getElementById("cash-input");
            const changeDisplay = document.getElementById("change-display");

            function goBack() {
                if (document.referrer !== "") {
                    window.history.back();
                } else {
                    window.location.href = "index.html";
                }
            }

            function formatRupiah(number) {
                return new Intl.NumberFormat("id-ID", {
                    style: "currency",
                    currency: "IDR",
                    minimumFractionDigits: 0,
                })
                    .format(number)
                    .replace("Rp", "");
            }

            function updateUI() {
                const amount = parseInt(currentInput) || 0;
                inputDisplay.value = formatRupiah(amount).trim();

                const change = amount - totalBill;
                const processBtn = document.getElementById("process-btn");

                if (change >= 0) {
                    changeDisplay.innerText = "Rp " + formatRupiah(change).trim();
                    processBtn.disabled = false;
                    processBtn.classList.remove("opacity-50");
                } else {
                    changeDisplay.innerText = "Rp 0";
                    processBtn.disabled = true;
                    processBtn.classList.add("opacity-50");
                }
            }

            function appendDigit(digit) {
                if (currentInput === "0") currentInput = digit.toString();
                else currentInput += digit.toString();
                updateUI();
            }

            function clearInput() {
                currentInput = "0";
                updateUI();
            }

            function popDigit() {
                currentInput = currentInput.slice(0, -1);
                if (currentInput === "") currentInput = "0";
                updateUI();
            }

            function setAmount(amount) {
                currentInput = amount.toString();
                updateUI();
            }

            function selectMethod(el) {
                document.querySelectorAll(".payment-method").forEach((item) => {
                    item.classList.remove("active");
                });
                el.classList.add("active");
            }

            window.onload = () => {
                selectMethod(document.querySelector(".payment-method"));
                updateUI();
            };

            document.getElementById("process-btn").addEventListener("click", function () {
                const amount = parseInt(currentInput) || 0;
                if (amount < totalBill) {
                    alert("Jumlah pembayaran kurang dari total tagihan.");
                    return;
                }

                this.innerHTML = `<div class="spinner-border spinner-border-sm me-2" role="status"></div> Memproses...`;
                this.disabled = true;

                setTimeout(() => {
                    this.innerHTML = `<span class="material-symbols-outlined me-1">check_circle</span> Berhasil!`;
                    this.classList.replace("btn-light", "btn-success");
                    this.classList.add("text-white");

                    alert("Pembayaran Berhasil! Struk sedang dicetak.");
                    location.reload();
                }, 1500);
            });
        </script>
@endsection