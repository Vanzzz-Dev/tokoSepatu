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

            .font-headline { font-family: 'Hanken Grotesk', sans-serif; }
            .font-mono { font-family: 'JetBrains Mono', monospace; }

            .product-card-shadow {
                box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
                transition: all 0.3s ease;
                border: 1px solid transparent;
            }

            .product-card-shadow:hover {
                border-color: rgba(0, 43, 133, 0.2);
                transform: translateY(-2px);
            }

            .zoom-img { transition: transform 0.5s ease; }
            .product-card-shadow:hover .zoom-img { transform: scale(1.08); }

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

            /* MODIFIKASI: Border Kiri Checkout hanya muncul di Desktop (Layar besar) */
            @media (min-width: 992px) {
                .checkout-shadow {
                    border-left: 1px solid var(--outline-variant);
                    box-shadow: -4px 0 20px rgba(9, 63, 180, 0.04);
                    position: sticky;
                    top: 0;
                    height: calc(100vh - 60px);
                }
            }

            /* MODIFIKASI: Jarak atas checkout jika menumpuk di Mobile/Tablet */
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

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="custom-select-wrapper">
                        <select class="custom-select">
                            <option value="all" selected>All Shoes</option>
                            <option value="running">Running</option>
                            <option value="casual">Casual</option>
                            <option value="sport">Sport</option>
                            <option value="formal">Formal</option>
                        </select>
                        <div class="position-absolute end-0 top-50 translate-middle-y pe-3 pointer-events-none text-secondary">
                            <i class="bi bi-chevron-down"></i>
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-xl-3 g-3 g-md-4">

                    <div class="col">
                        <div class="card h-100 product-card-shadow rounded-3 overflow-hidden bg-white d-flex flex-column border-0">
                            <div class="position-relative p-3 d-flex align-items-center justify-content-center" style="background-color: var(--surface-container-low); aspect-ratio: 4/3;">
                                <img class="img-fluid zoom-img" style="mix-blend-mode: multiply; max-height: 140px; object-fit: contain;" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBNkfm94EloqVPX6tqCIBbsXpkBkjH3jS5OUSCqzRQPJ3Lsucdjj9u5wyNTG03SrP1ZlBzEiI3DrxyJnda3judSeICUUyNpYQbbGuilyjcG3pPwzGjk-XqjSdiY9bR12nQsUm1ceYao9lWM4LvILjvSCGRhNvu6VYa_TFzZ89CdAnndL2-tIEx7Segh7oxNW2zf8odnrpTHKJYpr08uZmR99pgjNQnGFQVo2qtWKKhdLbPQJihzU1bOMp70OyE5WxRSOdqgGFfh8Q" alt="Product">
                            </div>
                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="font-headline h6 text-truncate mb-1 fw-bold">Speedster Pro Runner</h3>
                                    <p class="text-muted small mb-3">SKU: SP-2024-RED</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-auto">
                                    <span class="font-mono text-primary fw-bold fs-6 fs-sm-5">Rp 1.499.000</span>
                                    <button class="btn btn-primary-custom d-flex align-items-center justify-content-center rounded-2 shadow-sm" style="width: 38px; height: 38px;">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 product-card-shadow rounded-3 overflow-hidden bg-white d-flex flex-column border-0">
                            <div class="position-relative p-3 d-flex align-items-center justify-content-center" style="background-color: var(--surface-container-low); aspect-ratio: 4/3;">
                                <img class="img-fluid zoom-img" style="mix-blend-mode: multiply; max-height: 140px; object-fit: contain;" src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjvCa2N_ReHD4zPIp-pz6GgLALc7pnbdm6yuj2TDiVdaEMskXnA8ySRNqsszSQJiZGaNVfGbXBKa2DRmEd9o5woc0gvOoqjbS3t8MDiOlznIoOJg96glhUQNJ1Fu6GGiveKwBvBqNUQ0hukBoeDo1TaxXHsOF477fsUe8fujB4H480L0WMM6f-oTSh-_lP4ti5FVv6YOhVggnUjs4g06z5VqK4jH_aSQ82ULt7G0FfHvjfutZCQDj58WUse7WV46TIwkSlEG4BVQ" alt="Product">
                            </div>
                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="font-headline h6 text-truncate mb-1 fw-bold">Urban Cloud Walker</h3>
                                    <p class="text-muted small mb-3">SKU: SP-2024-WHT</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-auto">
                                    <span class="font-mono text-primary fw-bold fs-6 fs-sm-5">Rp 1.250.000</span>
                                    <button class="btn btn-primary-custom d-flex align-items-center justify-content-center rounded-2 shadow-sm" style="width: 38px; height: 38px;">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100 product-card-shadow rounded-3 overflow-hidden bg-white d-flex flex-column border-0">
                            <div class="position-relative p-3 d-flex align-items-center justify-content-center" style="background-color: var(--surface-container-low); aspect-ratio: 4/3;">
                                <img class="img-fluid zoom-img" style="mix-blend-mode: multiply; max-height: 140px; object-fit: contain;" src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOuxc1TVxwct9FRuI9abaPWg8s9qo69HiIulhMy5Vg7uyC_R85YaPzAoRXVa5DVtLOUpL2nNqPhTAk-R6GDn8JCFuTt6iuSba1A_RRjB3EsaXBUM8IcuqEzTnaySvFSdOee9HGZyUAyUglMXzuwPMg_pVX-IWfBXjS9PL3CANCeyO_52hjgKdX5enI8Z4qb8VPd140AT0-uNIBBecgI6YaNYXiBJnlUnlUn1aUEuI2Aj4kH-GnnLbyMe4S1jj1IHyrjQgPrm95PA" alt="Product">
                            </div>
                            <div class="card-body p-3 d-flex flex-column justify-content-between">
                                <div>
                                    <h3 class="font-headline h6 text-truncate mb-1 fw-bold">Retro Canvas High</h3>
                                    <p class="text-muted small mb-3">SKU: SP-2024-CLS</p>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mt-auto">
                                    <span class="font-mono text-primary fw-bold fs-6 fs-sm-5">Rp 899.000</span>
                                    <button class="btn btn-primary-custom d-flex align-items-center justify-content-center rounded-2 shadow-sm" style="width: 38px; height: 38px;">
                                        <i class="bi bi-cart-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <aside class="bg-white d-flex flex-column checkout-shadow flex-shrink-0" style="width: 100%; max-width: 100%; flex-basis: auto;">
                <div class="d-flex flex-column h-100" style="min-width: 100%;">
                    <style>
                        @media (min-width: 992px) {
                            aside { width: 380px !important; }
                        }
                    </style>

                    <div class="p-4 border-bottom border-light-subtle">
                        <h2 class="font-headline h5 mb-0 fw-bold">Order Summary</h2>
                    </div>

                    <div class="overflow-y-auto p-4 d-flex flex-column gap-3" style="max-height: 400px; -webkit-overflow-scrolling: touch;">
                        <div class="d-flex gap-3 align-items-center">
                            <div class="rounded-2 p-2 flex-shrink-0 d-flex align-items-center justify-content-center" style="background-color: var(--surface-container-low); width: 60px; height: 60px;">
                                <img alt="item" class="img-fluid" style="mix-blend-mode: multiply;" src="https://lh3.googleusercontent.com/aida-public/AB6AXuDZMt2mFLxv1mVXihYJ_p_j_XsIv5u7jgjYuNvIqrnEqlWHh6g1ul5lh4yAeYwzjLZzvpDmeGugRxDIXQJgbl08hgczyEkT3NHghBD516mAc47FhUMcX2N_9D37xiCX3E5nTxr1a7B958s43DJQjZlwVmlUjJswbFQYKcCjOMyAx8s8vFQqo43_cebZSmuvCASs3xh6qCeExf8bhDkMk5CvV44yHhifPk7ntpRjNAnVi8r0iqhObz2V6k06DZnQUNlGFDTnNKZ3kQ">
                            </div>
                            <div class="flex-grow-1 min-w-0">
                                <div class="d-flex justify-content-between align-items-start mb-1">
                                    <h4 class="small fw-bold text-truncate mb-0" style="max-width: 150px;">Speedster Pro Runner</h4>
                                    <span class="font-mono small fw-bold text-nowrap">Rp 1.499.000</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="text-muted small">Size: 42</span>
                                    <div class="d-flex align-items-center gap-2 bg-light rounded-2 px-2 py-1 border border-light-subtle">
                                        <button class="btn btn-link p-0 text-primary text-decoration-none d-flex align-items-center justify-content-center" style="width: 20px; height: 20px;"><i class="bi bi-minus"></i></button>
                                        <span class="font-mono small text-center px-1" style="width: 16px;">1</span>
                                        <button class="btn btn-link p-0 text-primary text-decoration-none d-flex align-items-center justify-content-center" style="width: 20px; height: 20px;"><i class="bi bi-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="p-4 border-top border-light-subtle d-flex flex-column gap-3 mt-auto" style="background-color: var(--surface-container-low);">
                        <div class="d-flex flex-column gap-2">
                            <div class="d-flex justify-content-between text-secondary small">
                                <span>Subtotal</span>
                                <span class="font-mono">Rp 2.749.000</span>
                            </div>
                            <div class="d-flex justify-content-between text-primary fw-bold pt-2 border-top border-light-subtle">
                                <span class="font-headline mb-0 fw-bold">Total</span>
                                <span class="font-mono fs-5">Rp 3.051.390</span>
                            </div>
                        </div>
                        <button class="btn btn-primary-custom w-100 py-2.5 rounded-2 fw-bold font-headline d-flex align-items-center justify-content-center gap-2 shadow">
                            Bayar Sekarang
                        </button>
                    </div>
                </div>
            </aside>

        </div>
@endsection