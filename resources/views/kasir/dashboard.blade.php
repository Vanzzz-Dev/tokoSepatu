@extends('layout.app')
@section('content')
    <style>
        /* Custom Color Palette & Variables based on your design */
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

        /* Layout Custom Scrollbars */
        .custom-scrollbar::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: var(--outline-variant);
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: var(--outline);
        }

        /* Custom Styles */
        .material-symbols-outlined {
            font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
            vertical-align: middle;
        }

        .product-card-shadow {
            box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
            transition: all 0.3s ease;
            border: 1px solid transparent;
        }

        .product-card-shadow:hover {
            border-color: rgba(0, 43, 133, 0.2);
        }

        .product-card-shadow:hover .zoom-img {
            transform: scale(1.1);
        }

        .zoom-img {
            transition: transform 0.5s ease;
        }

        .checkout-shadow {
            box-shadow: -4px 0 20px rgba(9, 63, 180, 0.04);
            border-left: 1px solid var(--outline-variant);
        }

        /* Utility Override Buttons */
        .btn-primary-custom {
            background-color: var(--primary-color);
            color: var(--on-primary);
            border: none;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-container);
            color: var(--on-primary);
        }

        /* Custom Dropdown Styling */
        .custom-select-wrapper {
            position: relative;
            min-width: 180px;
        }

        .custom-select {
            background-color: var(--surface-container);
            color: var(--on-surface-variant);
            border: 1px solid rgba(196, 197, 214, 0.3);
            padding: 8px 24px;
            border-radius: 50px;
            appearance: none;
            cursor: pointer;
            width: 100%;
            font-weight: 500;
            transition: all 0.2s;
        }

        .custom-select:hover {
            background-color: var(--surface-container-highest);
            color: var(--primary-color);
        }

        .custom-select:focus {
            outline: none;
            box-shadow: 0 0 0 4px rgba(0, 43, 133, 0.15);
        }
    </style>
    </head>

    <body class="overflow-hidden">

        <div class="d-flex vh-100 overflow-hidden">
            <main class="flex-grow-1 d-flex flex-column h-screen overflow-hidden">
                <div class="flex-grow-1 overflow-y-auto p-4 custom-scrollbar">

                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <div class="custom-select-wrapper">
                            <select class="custom-select">
                                <option value="all" selected>All Shoes</option>
                                <option value="running">Running</option>
                                <option value="casual">Casual</option>
                                <option value="sport">Sport</option>
                                <option value="formal">Formal</option>
                            </select>
                            <div
                                class="position-absolute end-0 top-50 translate-middle-y pe-3 pointer-events-none text-secondary">
                                <i class="ti ti-chevron-down"></i>                            </div>
                        </div>
                    </div>

                    <div class="row row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4 g-4 warp">

                        <div class="col">
                            <div
                                class="card h-100 product-card-shadow rounded-3 overflow-hidden bg-white d-flex flex-column border-0">
                                <div class="position-relative p-4 d-flex align-items-center justify-content-center"
                                    style="background-color: var(--surface-container-low); aspect-ratio: 1/1;">
                                    <img class="img-fluid zoom-img" style="mix-blend-mode: multiply;"
                                        data-alt="A high-performance crimson red athletic sneaker..."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBNkfm94EloqVPX6tqCIBbsXpkBkjH3jS5OUSCqzRQPJ3Lsucdjj9u5wyNTG03SrP1ZlBzEiI3DrxyJnda3judSeICUUyNpYQbbGuilyjcG3pPwzGjk-XqjSdiY9bR12nQsUm1ceYao9lWM4LvILjvSCGRhNvu6VYa_TFzZ89CdAnndL2-tIEx7Segh7oxNW2zf8odnrpTHKJYpr08uZmR99pgjNQnGFQVo2qtWKKhdLbPQJihzU1bOMp70OyE5WxRSOdqgGFfh8Q">
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <h3 class="font-headline h6 text-truncate mb-1 fw-bold">Speedster Pro Runner</h3>
                                        <p class="text-muted small mb-3">SKU: SP-2024-RED</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-auto">
                                        <span class="font-mono text-primary fw-bold fs-5">Rp 1.499.000</span>
                                        <button
                                            class="btn btn-primary-custom d-flex align-items-center justify-content-center rounded-2 shadow-sm"
                                            style="width: 40px; height: 40px;">
                                                     <i class="ti ti-shopping-cart"></i>                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div
                                class="card h-100 product-card-shadow rounded-3 overflow-hidden bg-white d-flex flex-column border-0">
                                <div class="position-relative p-4 d-flex align-items-center justify-content-center"
                                    style="background-color: var(--surface-container-low); aspect-ratio: 1/1;">
                                    <img class="img-fluid zoom-img" style="mix-blend-mode: multiply;"
                                        data-alt="A premium white and pastel-accented fashion sneaker..."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuAjvCa2N_ReHD4zPIp-pz6GgLALc7pnbdm6yuj2TDiVdaEMskXnA8ySRNqsszSQJiZGaNVfGbXBKa2DRmEd9o5woc0gvOoqjbS3t8MDiOlznIoOJg96glhUQNJ1Fu6GGiveKwBvBqNUQ0hukBoeDo1TaxXHsOF477fsUe8fujB4H480L0WMM6f-oTSh-_lP4ti5FVv6YOhVggnUjs4g06z5VqK4jH_aSQ82ULt7G0FfHvjfutZCQDj58WUse7WV46TIwkSlEG4BVQ">
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <h3 class="font-headline h6 text-truncate mb-1 fw-bold">Urban Cloud Walker</h3>
                                        <p class="text-muted small mb-3">SKU: SP-2024-WHT</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-auto">
                                        <span class="font-mono text-primary fw-bold fs-5">Rp 1.250.000</span>
                                        <button
                                            class="btn btn-primary-custom d-flex align-items-center justify-content-center rounded-2 shadow-sm"
                                            style="width: 40px; height: 40px;">
                                                     <i class="ti ti-shopping-cart"></i>                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div
                                class="card h-100 product-card-shadow rounded-3 overflow-hidden bg-white d-flex flex-column border-0">
                                <div class="position-relative p-4 d-flex align-items-center justify-content-center"
                                    style="background-color: var(--surface-container-low); aspect-ratio: 1/1;">
                                    <img class="img-fluid zoom-img" style="mix-blend-mode: multiply;"
                                        data-alt="A classic pair of black and white high-top canvas sneakers..."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBOuxc1TVxwct9FRuI9abaPWg8s9qo69HiIulhMy5Vg7uyC_R85YaPzAoRXVa5DVtLOUpL2nNqPhTAk-R6GDn8JCFuTt6iuSba1A_RRjB3EsaXBUM8IcuqEzTnaySvFSdOee9HGZyUAyUglMXzuwPMg_pVX-IWfBXjS9PL3CANCeyO_52hjgKdX5enI8Z4qb8VPd140AT0-uNIBBecgI6YaNYXiBJnlUnlUn1aUEuI2Aj4kH-GnnLbyMe4S1jj1IHyrjQgPrm95PA">
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <h3 class="font-headline h6 text-truncate mb-1 fw-bold">Retro Canvas High</h3>
                                        <p class="text-muted small mb-3">SKU: SP-2024-CLS</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-auto">
                                        <span class="font-mono text-primary fw-bold fs-5">Rp 899.000</span>
                                        <button
                                            class="btn btn-primary-custom d-flex align-items-center justify-content-center rounded-2 shadow-sm"
                                            style="width: 40px; height: 40px;">
                                                     <i class="ti ti-shopping-cart"></i>                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div
                                class="card h-100 product-card-shadow rounded-3 overflow-hidden bg-white d-flex flex-column border-0">
                                <div class="position-relative p-4 d-flex align-items-center justify-content-center"
                                    style="background-color: var(--surface-container-low); aspect-ratio: 1/1;">
                                    <img class="img-fluid zoom-img" style="mix-blend-mode: multiply;"
                                        data-alt="A vibrant lime green and black lightweight running shoe..."
                                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBPSbGgC9tnaXW-cehrEafzyOUvwZxQ7Z6MucqsZOXd1fComN-HJYkyKn7V7NfL0asaSxL-cKhNUEeQcAIrU6O08-S-7zhduIb243oIA_h5Co4QvKrAQKp72JXj7k2YCRQzjqoqt1tLP-OPJzQPoPC9b89WEoqFvNq-E3SECsd6eEZDd5zHRe7RcUziwdX6Cs1aY7EWlWYC42pBQybuOXmZDiXPBoGvLctsUY4DMO3w3x8yNOvNt8n6WI2lvaU5ywZGDxoNTGF7xw">
                                </div>
                                <div class="card-body p-3 d-flex flex-column justify-content-between">
                                    <div>
                                        <h3 class="font-headline h6 text-truncate mb-1 fw-bold">Volt Performance Fit</h3>
                                        <p class="text-muted small mb-3">SKU: SP-2024-GRN</p>
                                    </div>
                                    <div class="d-flex align-items-center justify-content-between mt-auto">
                                        <span class="font-mono text-primary fw-bold fs-5">Rp 1.625.000</span>
                                        <button
                                            class="btn btn-primary-custom d-flex align-items-center justify-content-center rounded-2 shadow-sm"
                                            style="width: 40px; height: 40px;">
                                                     <i class="ti ti-shopping-cart"></i>                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </main>

            <aside class="bg-white h-100 d-flex flex-column checkout-shadow z-3" style="width: 400px;">

                <div class="p-4 border-bottom border-light-subtle">
                        <h2 class="font-headline h4 mb-0 fw-bold">Order Summary</h2>
                </div>

                <div class="flex-grow-1 overflow-y-auto p-4 d-flex flex-column gap-4">

                    <div class="d-flex gap-3">
                        <div class="rounded-2 p-2 flex-shrink-0 d-flex align-items-center justify-content-center"
                            style="background-color: var(--surface-container-low); width: 64px; height: 64px;">
                            <img alt="item" class="img-fluid" style="mix-blend-mode: multiply;"
                                src="https://lh3.googleusercontent.com/aida-public/AB6AXuDZMt2mFLxv1mVXihYJ_p_j_XsIv5u7jgjYuNvIqrnEqlWHh6g1ul5lh4yAeYwzjLZzvpDmeGugRxDIXQJgbl08hgczyEkT3NHghBD516mAc47FhUMcX2N_9D37xiCX3E5nTxr1a7B958s43DJQjZlwVmlUjJswbFQYKcCjOMyAx8s8vFQqo43_cebZSmuvCASs3xh6qCeExf8bhDkMk5CvV44yHhifPk7ntpRjNAnVi8r0iqhObz2V6k06DZnQUNlGFDTnNKZ3kQ">
                        </div>
                        <div class="flex-grow-1 min-w-0">
                            <div class="d-flex justify-content-between align-items-start mb-1">
                                <h4 class="small fw-bold text-truncate mb-0" style="max-width: 180px;">Speedster Pro Runner
                                </h4>
                                <span class="font-mono small fw-bold">Rp 1.499.000</span>
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <span class="text-muted" style="font-size: 12px;">Size: 42</span>
                                <div
                                    class="d-flex align-items-center gap-2 bg-body rounded-2 px-2 py-1 border border-light-subtle">
                                    <button
                                        class="btn btn-link p-0 text-primary text-decoration-none d-flex align-items-center justify-content-center rounded"
                                        style="width: 20px; height: 20px;"><i class="ti ti-minus"></i>
                                    <span class="font-mono small text-center px-1" style="width: 16px;">1</span>
                                    <button
                                        class="btn btn-link p-0 text-primary text-decoration-none d-flex align-items-center justify-content-center rounded"
                                        style="width: 20px; height: 20px;"><i class="ti ti-plus"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="p-4 border-top border-light-subtle d-flex flex-column gap-3"
                    style="background-color: var(--surface-container-low);">
                    <div class="d-flex flex-column gap-2">
                        <div class="d-flex justify-content-between text-secondary small">
                            <span>Subtotal</span>
                            <span class="font-mono">Rp 2.749.000</span>
                        </div>
                        <div
                            class="d-flex justify-content-between text-primary fw-bold pt-2 border-top border-light-subtle">
                            <span class="font-headline h5 mb-0 fw-bold">Total</span>
                            <span class="font-mono fs-5">Rp 3.051.390</span>
                        </div>
                    </div>

                    <button
                        class="btn btn-primary-custom w-full py-3 rounded-2 fw-bold font-headline d-flex align-items-center justify-content-center gap-2 shadow"
                        style="font-size: 1.1rem;">
                        Bayar Sekarang
                    </button>
                </div>
            </aside>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            // Penyesuaian skrip interaksi input focus dengan Bootstrap
            const customSelect = document.querySelector('.custom-select');
            if (customSelect) {
                customSelect.addEventListener('focus', () => {
                    customSelect.parentElement.classList.add('focused');
                });
                customSelect.addEventListener('blur', () => {
                    customSelect.parentElement.classList.remove('focused');
                });
            }
        </script>
@endsection