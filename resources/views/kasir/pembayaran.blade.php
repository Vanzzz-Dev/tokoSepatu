@extends('kasir.master')
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

    <main class="container-fluid px-4 style-container"
        style="max-width: 1200px; margin: 0 auto; padding-top: 1.5rem; padding-bottom: 1.5rem;">

        <div class="d-flex flex-column flex-sm-row align-items-start align-items-sm-end justify-content-between mb-4 gap-3">
            <div class="d-flex align-items-center gap-3">
                <button onclick="goBack()" class="btn bg-white card-shadow d-flex align-items-center justify-content-center"
                    style="width: 48px; height: 48px; border-radius: 12px;" title="Kembali">
                    <i class="ti ti-chevron-left"></i>
                </button>
                <div>
                    <h1 class="text-primary-custom mb-0 h2">Pembayaran</h1>
                </div>
            </div>
            <div class="text-sm-end">
                <p class="text-uppercase text-muted small fw-bold mb-0" style="letter-spacing: 0.05em;">Total Tagihan</p>
                <p class="h2 mb-0 fw-bold text-primary-custom">Rp {{ number_format($total, 0, ',', '.') }}</p>
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
                                    class="payment-method btn d-flex flex-column align-items-center justify-content-center p-3 rounded-3 w-100"
                                    type="button" onclick="selectMethod(this, 'Tunai')">
                                    <i class="ti ti-cash fs-3"></i>
                                    <span class="small fw-semibold text-dark">Tunai</span>
                                </button>
                            </div>
                            <div class="col-4">
                                <button
                                    class="payment-method btn d-flex flex-column align-items-center justify-content-center p-3 rounded-3 w-100"
                                    type="button" onclick="selectMethod(this, 'QRIS')">
                                    <i class="ti ti-qrcode fs-3"></i>
                                    <span class="small fw-semibold text-dark">QRIS</span>
                                </button>
                            </div>
                            <div class="col-4">
                                <button
                                    class="payment-method btn d-flex flex-column align-items-center justify-content-center p-3 rounded-3 w-100"
                                    type="button" onclick="selectMethod(this, 'Kartu')">
                                    <i class="ti ti-credit-card fs-3"></i>
                                    <span class="small fw-semibold text-dark">Kartu</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <div class="card card-shadow border-0 bg-white p-4" style="border-radius: 16px;">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h3 class="h5 mb-0">Jumlah Diterima</h3>
                            <span class="badge bg-light text-primary-custom px-3 py-2 rounded-pill border small">Mata Uang:
                                IDR</span>
                        </div>

                        <div class="mb-3 position-relative cash-input-container">
                            <span class="currency-addon fw-bold">Rp</span>
                            <input type="text" class="form-control text-end" id="cash-input" value="0" readonly />
                        </div>

                        <div class="row g-2 mb-3">
                            <div class="col-6 col-md-3">
                                <button class="btn btn-outline-secondary w-100 py-2 small fw-semibold" type="button"
                                    onclick="setAmount({{ $total }})">Uang Pas</button>
                            </div>
                            <div class="col-6 col-md-3">
                                <button class="btn btn-outline-secondary w-100 py-2 small fw-semibold" type="button"
                                    onclick="setAmount(Math.ceil({{ $total }} / 50000) * 50000)">Pembulatan</button>
                            </div>
                            <div class="col-6 col-md-3">
                                <button class="btn btn-outline-secondary w-100 py-2 small fw-semibold" type="button"
                                    onclick="setAmount(50000)">Rp 50rb</button>
                            </div>
                            <div class="col-6 col-md-3">
                                <button class="btn btn-outline-secondary w-100 py-2 small fw-semibold" type="button"
                                    onclick="setAmount(100000)">Rp 100rb</button>
                            </div>
                        </div>

                        <div class="row g-2">
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(1)">1</button></div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(2)">2</button></div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(3)">3</button></div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(4)">4</button></div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(5)">5</button></div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(6)">6</button></div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(7)">7</button></div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(8)">8</button></div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(9)">9</button></div>
                            <div class="col-4">
                                <button class="btn btn-numpad w-100 text-danger" type="button"
                                    style="background-color: var(--error-container); color: var(--on-error-container) !important;"
                                    onclick="clearInput()">C</button>
                            </div>
                            <div class="col-4"><button class="btn btn-numpad w-100" type="button"
                                    onclick="appendDigit(0)">0</button></div>
                            <div class="col-4">
                                <button class="btn btn-numpad w-100 d-flex align-items-center justify-content-center"
                                    type="button" onclick="popDigit()">
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
                            <span class="text-muted small fw-semibold">{{ count($cart) }} Jenis Produk</span>
                        </div>

                        <div class="custom-scrollbar pe-1 d-flex flex-column gap-3 flex-grow-1">
                            @forelse ($cart as $item)
                                <div class="d-flex gap-3 p-2 bg-light border rounded-3 align-items-center">
                                    <div class="bg-secondary-subtle rounded flex-shrink-0 overflow-hidden d-flex align-items-center justify-content-center p-1"
                                        style="width: 64px; height: 64px; background-color: var(--surface-low);">
                                        <img alt="{{ $item['name'] }}" class="img-fluid"
                                            style="mix-blend-mode: multiply; max-height: 100%; object-fit: contain;"
                                            src="{{ $item['img'] }}" />
                                    </div>
                                    <div class="flex-grow-1 min-w-0">
                                        <p class="mb-0 fw-bold small text-truncate" title="{{ $item['name'] }}">
                                            {{ $item['name'] }}</p>
                                        <p class="text-muted mb-1" style="font-size: 11px;">ID Produk: {{ $item['id'] }}</p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="text-muted" style="font-size: 11px;">{{ $item['quantity'] }} x Rp
                                                {{ number_format($item['harga'], 0, ',', '.') }}</span>
                                            <span class="fw-bold small" style="font-family: 'JetBrains Mono', monospace;">
                                                Rp {{ number_format($item['harga'] * $item['quantity'], 0, ',', '.') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center my-auto py-5 text-muted">
                                    <i class="ti ti-shopping-cart-x fs-1 mb-2"></i>
                                    <p class="mb-0 small">Tidak ada item di keranjang.</p>
                                </div>
                            @endforelse
                        </div>

                        <div class="mt-4 pt-3 border-top border-secondary border-dashed border-1">
                            <div class="d-flex justify-content-between text-muted small mb-1">
                                <span>Subtotal</span>
                                <span>Rp {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                            <div class="d-flex justify-content-between text-muted small mb-2">
                                <span>Diskon</span>
                                <span class="text-danger">- Rp 0</span>
                            </div>
                            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                <span class="fw-bold text-dark">Total Tagihan</span>
                                <span class="h4 mb-0 fw-bold text-primary-custom">Rp
                                    {{ number_format($total, 0, ',', '.') }}</span>
                            </div>
                        </div>
                    </div>

                    <form action="{{ route('transaction.store') }}" method="POST" id="payment-form">
                        @csrf
                        <input type="hidden" name="total_tagihan" value="{{ $total }}">
                        <input type="hidden" name="jumlah_diterima" id="hidden-jumlah-diterima" value="0">
                        <input type="hidden" name="kembalian" id="hidden-kembalian" value="0">
                        <input type="hidden" name="metode_pembayaran" id="hidden-metode-pembayaran" value="Tunai">

                        <div class="card card-shadow border-0 text-white p-4 bg-primary-custom"
                            style="border-radius: 16px;">
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

                            <button class="btn btn-light text-primary-custom w-100 py-3 fw-bold h5 mb-0" type="submit"
                                style="border-radius: 12px; transition: all 0.2s;" id="process-btn">
                                Proses Pembayaran
                            </button>
                        </div>
                    </form>

                </div>
            </div>

        </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        let currentInput = "0";
        const totalBill = {{ $total }};
        const inputDisplay = document.getElementById("cash-input");
        const changeDisplay = document.getElementById("change-display");

        // Target element input hidden form
        const hiddenJumlahDiterima = document.getElementById("hidden-jumlah-diterima");
        const hiddenKembalian = document.getElementById("hidden-kembalian");
        const hiddenMetodePembayaran = document.getElementById("hidden-metode-pembayaran");

        function goBack() {
            if (document.referrer !== "") {
                window.history.back();
            } else {
                window.location.href = "{{ route('kasir-dahsboard') }}";
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

            // Sinkronkan nilai ke input hidden form
            hiddenJumlahDiterima.value = amount;

            if (change >= 0) {
                changeDisplay.innerText = "Rp " + formatRupiah(change).trim();
                hiddenKembalian.value = change;
                processBtn.disabled = false;
                processBtn.classList.remove("opacity-50");
            } else {
                changeDisplay.innerText = "Rp 0";
                hiddenKembalian.value = 0;
                processBtn.disabled = true;
                processBtn.classList.add("opacity-50");
            }
        }

        function appendDigit(digit) {
            if (currentInput === "0") currentInput = digit.toString();
            else currentInput += digit.toString();
            updateUI();
        }

        // Fitur otomatis ganti nominal untuk metode QRIS & KARTU agar langsung pas tanpa numpad
        function autoSetAmountForCashless() {
            const currentMethod = hiddenMetodePembayaran.value;
            if (currentMethod === 'QRIS' || currentMethod === 'Kartu') {
                setAmount(totalBill);
            }
        }

        function clearInput() {
            currentInput = "0";
            updateUI();
        }

        document.addEventListener('keydown', function (event) {
            if (event.key >= '0' && event.key <= '9') {
                appendDigit(event.key);
            } else if (event.key === 'Backspace') {
                popDigit();
            } else if (event.key === 'Escape' || event.key.toLowerCase() === 'c') {
                clearInput();
            } else if (event.key === 'Enter') {
                event.preventDefault();
                const amount = parseInt(currentInput) || 0;
                if (amount >= totalBill) {
                    document.getElementById("payment-form").submit();
                }
            }
        });

        function popDigit() {
            currentInput = currentInput.slice(0, -1);
            if (currentInput === "") currentInput = "0";
            updateUI();
        }

        function setAmount(amount) {
            currentInput = amount.toString();
            updateUI();
        }

        function selectMethod(el, methodName) {
            document.querySelectorAll(".payment-method").forEach((item) => {
                item.classList.remove("active");
            });
            el.classList.add("active");

            // Simpan metode pilihan ke input hidden form
            hiddenMetodePembayaran.value = methodName;
            autoSetAmountForCashless();
        }

        window.onload = () => {
            selectMethod(document.querySelector(".payment-method"), 'Tunai');
            updateUI();
        };

        // Event Handling Submit Form Asli
        document.getElementById("payment-form").addEventListener("submit", function (e) {
            const amount = parseInt(currentInput) || 0;
            if (amount < totalBill) {
                e.preventDefault(); // Gagalkan kirim data jika kurang uang
                alert("Jumlah pembayaran kurang dari total tagihan.");
                return;
            }

            const btn = document.getElementById("process-btn");
            btn.innerHTML = `<div class="spinner-border spinner-border-sm me-2" role="status"></div> Menyimpan Transaksi...`;
            btn.disabled = true;
        });
    </script>
@endsection