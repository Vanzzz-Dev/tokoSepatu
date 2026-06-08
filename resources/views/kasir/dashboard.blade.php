@extends('kasir.master')
@section('content')
    <style>
        :root {
            --bs-body-bg: #f8f9ff;
            --bs-body-color: #0b1c30;
            --primary-color: #002b85;
            --primary-container: #093fb4;
            --on-primary: #ffffff;
            --surface-container-low: #eff4ff;
            --surface-container-lowest: #ffffff;
            --surface-container: #e5eeff;
            --surface-container-highest: #d3e4fe;
            --outline-variant: #c4c5d6;
            --outline: #747685;
            --on-surface-variant: #434653;
            --secondary-container: #fe8438;
            --on-secondary-container: #652a00;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bs-body-bg);
            color: var(--bs-body-color);
        }

        .font-headline {
            font-family: 'Hanken Grotesk', sans-serif;
        }

        .font-mono {
            font-family: 'JetBrains Mono', monospace;
        }

        .product-card-shadow {
            box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .product-card-shadow:hover {
            border-color: rgba(0, 43, 133, 0.2);
            transform: translateY(-2px);
        }

        .zoom-img {
            transition: transform 0.5s ease;
        }

        .product-card-shadow:hover .zoom-img {
            transform: scale(1.08);
        }

        .btn-primary-custom {
            background-color: var(--primary-color);
            color: var(--on-primary);
            border: none;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-container);
            color: var(--on-primary);
        }

        .custom-select-wrapper {
            position: relative;
            min-width: 140px;
        }

        .custom-select {
            background-color: var(--surface-container);
            color: var(--on-surface-variant);
            border: 1px solid rgba(196, 197, 214, 0.3);
            padding: 8px 32px 8px 16px;
            border-radius: 50px;
            appearance: none;
            cursor: pointer;
            width: 100%;
            font-weight: 500;
            transition: all 0.2s;
        }

        @media (min-width: 992px) {
            .checkout-shadow {
                border-left: 1px solid var(--outline-variant);
                box-shadow: -4px 0 20px rgba(9, 63, 180, 0.04);
                position: sticky;
                top: 0;
                height: calc(100vh - 60px);
            }
        }

        @media (max-width: 991.98px) {
            .checkout-shadow {
                border-top: 1px solid var(--outline-variant);
                margin-top: 2rem;
                background: #ffffff;
            }
        }
    </style>

    <div class="d-flex flex-column flex-lg-row min-vh-100">

        <div class="flex-grow-1 p-3 p-md-4" style="background-color: var(--bs-body-bg);">


            {{-- GRID UTAMA PRODUK --}}
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 g-3 g-md-4">

                @foreach ($products as $product)
                    <div class="col">
                        <div
                            class="card h-100 product-card-shadow rounded-3 overflow-hidden bg-white d-flex flex-column border-0">

                            {{-- Image Produk --}}
                            <div class="position-relative p-3 d-flex align-items-center justify-content-center"
                                style="background-color: var(--surface-container-low); aspect-ratio: 4/3;">
                                @if($product->img)
                                    <img class="img-fluid zoom-img"
                                        style="mix-blend-mode: multiply; max-height: 140px; object-fit: contain;"
                                        src="{{ asset($product->img) }}" alt="{{ $product->name }}">
                                @else
                                    <img class="img-fluid zoom-img"
                                        style="mix-blend-mode: multiply; max-height: 140px; object-fit: contain;"
                                        src="{{ asset('images/default-product.png') }}" alt="No Image">
                                @endif
                            </div>

                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="font-headline h6 text-truncate mb-1 fw-bold" title="{{ $product->name }}">
                                        {{ $product->name }}
                                    </h3>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-auto">
                                    <span class="font-mono text-primary fw-bold fs-6 fs-sm-5">
                                        Rp {{ number_format($product->harga, 0, ',', '.') }}
                                    </span>

                                    <button
                                        class="btn btn-primary-custom d-flex align-items-center justify-content-center rounded-2 shadow-sm btn-add-to-cart"
                                        data-id="{{ $product->id }}" data-name="{{ $product->name }}"
                                        data-harga="{{ $product->harga }}"
                                        data-img="{{ $product->img ? asset($product->img) : asset('images/default-product.png') }}"
                                        style="width: 38px; height: 38px;">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>

        {{-- ASIDE / ORDER SUMMARY --}}
        <aside class="bg-white d-flex flex-column checkout-shadow flex-shrink-0"
            style="width: 100%; max-width: 100%; flex-basis: auto;">
            <div class="d-flex flex-column h-100" style="min-width: 100%;">
                <style>
                    @media (min-width: 992px) {
                        aside {
                            width: 380px !important;
                        }
                    }
                </style>

                <div class="p-4 border-bottom border-light-subtle">
                    <h2 class="font-headline h5 mb-0 fw-bold">Order Summary</h2>
                </div>

                {{-- CONTAINER KERANJANG BELANJA --}}
                <div id="cart-items-container" class="overflow-y-auto p-4 d-flex flex-column gap-3"
                    style="max-height: 400px; -webkit-overflow-scrolling: touch;">

                    {{-- State Awal Ketika Keranjang Kosong --}}
                    <div id="empty-cart-message" class="text-center text-muted my-4">
                        <i class="bi bi-basket2 fs-2 d-block mb-2"></i>
                        Keranjang masih kosong
                    </div>

                </div>

                <div class="p-4 border-top border-light-subtle d-flex flex-column gap-3 mt-auto"
                    style="background-color: var(--surface-container-low);">
                    <div class="d-flex flex-column gap-2">

                        <div
                            class="d-flex justify-content-between text-primary fw-bold pt-2 border-top border-light-subtle">
                            <span class="font-headline mb-0 fw-bold">Total</span>
                            <span class="font-mono fs-5" id="cart-total">Rp 0</span>
                        </div>
                    </div>
                    <form action="{{ route('checkout.proses') }}" method="POST" id="form-checkout">
                        @csrf
                        <input type="hidden" name="cart_data" id="cart-data-input">

                        <button type="submit"
                            class="btn btn-primary-custom w-100 py-2.5 rounded-2 fw-bold font-headline d-flex align-items-center justify-content-center gap-2 shadow">
                            Bayar Sekarang
                        </button>
                    </form>
                </div>
            </div>
        </aside>

    </div>

    {{-- LOGIKA JAVASCRIPT PERBAIKAN SECARA TOTAL --}}
    <script>
            document.addEventListener('DOMContentLoaded', function () {
                // 1. Array penampung keranjang belanja
                let cart = [];

                // 2. Binding elemen DOM berdasarkan ID
      const formCheckout = document.getElementById('form-checkout');
                const cartInput = document.getElementById('cart-data-input');
                const cartContainer = document.getElementById('cart-items-container');
                const emptyMessage = document.getElementById('empty-cart-message');
                const totalElement = document.getElementById('cart-total');

                // 3. Handler Submit Form Checkout
                if (formCheckout) {
                    formCheckout.addEventListener('submit', function (e) {
                        if (cart.length === 0) {
                            e.preventDefault();
                            alert('Keranjang belanja kamu masih kosong!');
                            return;
                        }
                        cartInput.value = JSON.stringify(cart);
                    });
                }

                // Helper format mata uang Rupiah
                function formatRupiah(number) {
                    return 'Rp ' + new Intl.NumberFormat('id-ID').format(number);
                }

                // 4. Fungsi Utama Update Tampilan Keranjang
                function updateCartUI() {
                    if (cart.length === 0) {
                        cartContainer.innerHTML = '';
                        cartContainer.appendChild(emptyMessage);
                        totalElement.innerText = 'Rp 0';
                        return;
                    }

                    let htmlContent = '';
                    let totalHarga = 0;

                    cart.forEach(item => {
                        let subTotalItem = item.harga * item.quantity;
                        totalHarga += subTotalItem;

                        htmlContent += `
                            <div class="d-flex gap-3 align-items-center bg-light p-2 rounded-3" data-id="${item.id}">
                                <div class="rounded-2 p-1 flex-shrink-0 d-flex align-items-center justify-content-center bg-white"
                                    style="width: 50px; height: 50px; border: 1px solid var(--outline-variant)">
                                    <img alt="${item.name}" class="img-fluid" style="mix-blend-mode: multiply; max-height: 100%; object-fit: contain;" src="${item.img}">
                                </div>
                                <div class="flex-grow-1 min-w-0">
                                    <div class="d-flex justify-content-between align-items-start mb-1">
                                        <h4 class="small fw-bold text-truncate mb-0" style="max-width: 140px;" title="${item.name}">${item.name}</h4>
                                        <span class="font-mono small fw-bold text-nowrap">${formatRupiah(subTotalItem)}</span>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <span class="text-muted small">${formatRupiah(item.harga)}</span>

                                        <div class="d-flex align-items-center gap-2 bg-white rounded-2 border border-light-subtle px-1">
                                            <button type="button" class="btn btn-sm p-0 text-danger btn-decrease" data-id="${item.id}" style="width: 20px; height: 20px;">-</button>
                                            <span class="fw-bold small px-1">${item.quantity}</span>
                                            <button type="button" class="btn btn-sm p-0 text-success btn-increase" data-id="${item.id}" style="width: 20px; height: 20px;">+</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `;
                    });

                    cartContainer.innerHTML = htmlContent;
                    totalElement.innerText = formatRupiah(totalHarga);

                    // Daftarkan ulang event listener tombol +/- di dalam keranjang setelah HTML di-render ulang
                    registerCartActionEvents();
                }

                // 5. Fungsi Mengubah Jumlah Kuantitas (+ / -) di Keranjang
                function registerCartActionEvents() {
                    // Tombol Tambah Kuantitas (+)
                    cartContainer.querySelectorAll('.btn-increase').forEach(button => {
                        button.addEventListener('click', function () {
                            const id = this.getAttribute('data-id');
                            const product = cart.find(item => item.id === id);
                            if (product) {
                                product.quantity += 1;
                                updateCartUI();
                            }
                        });
                    });

                    // Tombol Kurang Kuantitas (-)
                    cartContainer.querySelectorAll('.btn-decrease').forEach(button => {
                        button.addEventListener('click', function () {
                            const id = this.getAttribute('data-id');
                            const productIndex = cart.findIndex(item => item.id === id);
                            if (productIndex !== -1) {
                                if (cart[productIndex].quantity > 1) {
                                    cart[productIndex].quantity -= 1;
                                } else {
                                    // Jika kuantitas tinggal 1 dan dikurangi, hapus item dari list
                                    cart.splice(productIndex, 1);
                                }
                                updateCartUI();
                            }
                        });
                    });
                }

                // 6. Event Klik Tombol Tambah ke Keranjang (+ Cart Plus di Grid Produk)
                document.querySelectorAll('.btn-add-to-cart').forEach(button => {
                    button.addEventListener('click', function () {
                        const id = this.getAttribute('data-id');
                        const name = this.getAttribute('data-name');
                        const img = this.getAttribute('data-img');

                        // Ambil string harga asli & bersihkan dari karakter non-angka
                        let hargaRaw = this.getAttribute('data-harga'); 
                        let hargaClean = hargaRaw.replace(/[^0-9]/g, ''); 
                        const harga = parseInt(hargaClean) || 0;

                        const existingItem = cart.find(item => item.id === id);

                        if (existingItem) {
                            existingItem.quantity += 1;
                        } else {
                            cart.push({ id, name, harga, img, quantity: 1 });
                        }

                        updateCartUI();
                    });
                });
            });
        </script>
@endsection