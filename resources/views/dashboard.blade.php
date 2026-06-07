@extends('layout.app')
@section('content')
  <main>
      <div class="container mt-3 mb-3">
        <div class="row g-4 mb-4">
          <div class="col-12 col-md-6 col-lg-3">
            <div class="bg-surface-container-lowest p-4 rounded-4 custom-shadow border border-white-40">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="p-3 bg-primary-5 rounded-3 text-primary-custom">
                  <i class="ti ti-archive"></i>
                </div>
              </div>
              <p class="text-on-surface-variant text-label-md fw-bold text-uppercase tracking-wider mb-0">Total Products</p>
              <h3 class="font-headline-lg text-on-surface mt-1 mb-0">1284</h3>

            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="bg-surface-container-lowest p-4 rounded-4 custom-shadow border border-white-40">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="p-3 bg-secondary-5 rounded-3 text-secondary-custom">
                  <i class="ti ti-users-group"></i>
                </div>
              </div>
              <p class="text-on-surface-variant text-label-md fw-bold text-uppercase tracking-wider mb-0">Total Customers</p>
              <h3 class="font-headline-lg text-on-surface mt-1 mb-0">8,432</h3>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="bg-surface-container-lowest p-4 rounded-4 custom-shadow border border-white-40">
              <div class="d-flex justify-content-between align-items-start mb-3">
                <div class="p-3 bg-tertiary-5 rounded-3 text-tertiary-custom">
                  <i class="ti ti-receipt"></i>
                </div>
              </div>
              <p class="text-on-surface-variant text-label-md fw-bold text-uppercase tracking-wider mb-0">Transactions</p>
              <h3 class="font-headline-lg text-on-surface mt-1 mb-0">42,910</h3>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3">
            <div class="bg-primary-custom text-on-primary p-4 rounded-4 custom-shadow position-relative overflow-hidden">
              <div class="position-relative z-1">
                <div class="d-flex justify-content-between align-items-start mb-3">
                  <div class="p-3 bg-white-20 rounded-3 backdrop-blur">
                    <i class="ti ti-cash"></i>
                  </div>
                </div>
                <p class="text-white-70 text-label-md fw-bold text-uppercase tracking-wider mb-0">Daily Revenue</p>
                <h3 class="font-headline-lg mt-1 mb-0">$12,450.00</h3>
              </div>
              <div class="position-absolute decoration-circle"></div>
            </div>
          </div>
        </div>

        <div class="row g-4 mb-4">
          <div class="col-12">
            <div class="bg-surface-container-lowest p-4 p-md-5 rounded-4 custom-shadow border border-white-40">
              <div class="d-flex justify-content-between align-items-center mb-4">
                <div>
                  <h4 class="font-headline-md text-on-surface mb-1">Monthly Sales Performance</h4>
                </div>
              </div>

              <div class="chart-container d-flex align-items-end justify-content-between px-2 position-relative">
                <div class="position-absolute inset-0 d-flex flex-column justify-content-between pe-none z-0">
                  <div class="border-bottom-outline w-100"></div>
                  <div class="border-bottom-outline w-100"></div>
                  <div class="border-bottom-outline w-100"></div>
                  <div class="border-bottom-outline w-100"></div>
                </div>

                @php
                  $currentMonthNumber = date('n'); 
                @endphp

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 1 ? 'active' : '' }}"
                  style="height: 60%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 1 ? 'active' : '' }}">
                    $14k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 2 ? 'active' : '' }}"
                  style="height: 45%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 2 ? 'active' : '' }}">
                    $11k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 3 ? 'active' : '' }}"
                  style="height: 85%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 3 ? 'active' : '' }}">
                    $19k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 4 ? 'active' : '' }}"
                  style="height: 70%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 4 ? 'active' : '' }}">
                    $16k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 5 ? 'active' : '' }}"
                  style="height: 50%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 5 ? 'active' : '' }}">
                    $12k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 6 ? 'active' : '' }}"
                  style="height: 95%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 6 ? 'active' : '' }}">
                    $22k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 7 ? 'active' : '' }}"
                  style="height: 75%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 7 ? 'active' : '' }}">
                    $15k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 8 ? 'active' : '' }}"
                  style="height: 40%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 8 ? 'active' : '' }}">
                    $10k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 9 ? 'active' : '' }}"
                  style="height: 60%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 9 ? 'active' : '' }}">
                    $14k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 10 ? 'active' : '' }}"
                  style="height: 80%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 10 ? 'active' : '' }}">
                    $18k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 11 ? 'active' : '' }}"
                  style="height: 55%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 11 ? 'active' : '' }}">
                    $13k</div>
                </div>

                <div class="chart-bar position-relative flex-grow-1 rounded-top {{ $currentMonthNumber == 12 ? 'active' : '' }}"
                  style="height: 90%">
                  <div
                    class="chart-tooltip position-absolute bg-on-surface text-white rounded py-1 px-2 {{ $currentMonthNumber == 12 ? 'active' : '' }}">
                    $21.4k</div>
                </div>
              </div>

              <div
                class="d-flex justify-content-between mt-3 fs-10 fw-bold text-on-surface-variant text-uppercase tracking-tighter">
                <span class="{{ $currentMonthNumber == 1 ? 'text-primary-custom fw-black fs-11' : '' }}">Jan</span>
                <span class="{{ $currentMonthNumber == 2 ? 'text-primary-custom fw-black fs-11' : '' }}">Feb</span>
                <span class="{{ $currentMonthNumber == 3 ? 'text-primary-custom fw-black fs-11' : '' }}">Mar</span>
                <span class="{{ $currentMonthNumber == 4 ? 'text-primary-custom fw-black fs-11' : '' }}">Apr</span>
                <span class="{{ $currentMonthNumber == 5 ? 'text-primary-custom fw-black fs-11' : '' }}">May</span>
                <span class="{{ $currentMonthNumber == 6 ? 'text-primary-custom fw-black fs-11' : '' }}">Jun</span>
                <span class="{{ $currentMonthNumber == 7 ? 'text-primary-custom fw-black fs-11' : '' }}">Jul</span>
                <span class="{{ $currentMonthNumber == 8 ? 'text-primary-custom fw-black fs-11' : '' }}">Aug</span>
                <span class="{{ $currentMonthNumber == 9 ? 'text-primary-custom fw-black fs-11' : '' }}">Sep</span>
                <span class="{{ $currentMonthNumber == 10 ? 'text-primary-custom fw-black fs-11' : '' }}">Oct</span>
                <span class="{{ $currentMonthNumber == 11 ? 'text-primary-custom fw-black fs-11' : '' }}">Nov</span>
                <span class="{{ $currentMonthNumber == 12 ? 'text-primary-custom fw-black fs-11' : '' }}">Dec</span>
              </div>
            </div>
          </div>  </div>

        <section class="bg-surface-container-lowest rounded-4 custom-shadow border border-white-40 overflow-hidden">
          <div class="px-4 py-4 px-md-5 border-bottom flex-between-center">
            <div>
              <h4 class="font-headline-md text-on-surface mb-1">Recent Transactions</h4>
              <p class="text-body-md text-on-surface-variant mb-0">Detailed log of the last 10 activities</p>
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-custom align-middle">
              <thead>
                <tr>
                  <th class="px-4 px-md-5 py-3">Customer</th>
                  <th class="px-4 py-3">Product Ref</th>
                  <th class="px-4 py-3">Date</th>
                  <th class="px-4 py-3 text-end">Amount</th>
                  <th class="px-4 py-3 text-center">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr class="table-row-hover">
                  <td class="px-4 px-md-5 py-3">
                    <div class="d-flex align-items-center gap-3">
                      <div class="w-9 h-9 rounded-circle bg-primary-10 d-flex align-items-center justify-center text-primary-custom fw-bold fs-xs">JD</div>
                      <div>
                        <p class="text-body-md fw-bold text-on-surface mb-0">Jane Doe</p>
                        <p class="fs-11 text-on-surface-variant mb-0">jane.doe@example.com</p>
                      </div>
                    </div>
                  </td>
                  <td class="px-4 py-3 font-data-mono text-on-surface-variant">#SPD-2041-N</td>
                  <td class="px-4 py-3 text-body-md text-on-surface">Oct 24, 2024</td>
                  <td class="px-4 py-3 text-end font-data-mono fw-bold text-on-surface">$189.00</td>
                  <td class="px-4 py-3 text-center">
                    <span class="badge rounded-pill text-emerald bg-emerald-light font-badge-bold">Completed</span>
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
        </section>
      </div>
    </main>

    <style>
      /* --- Tema Warna & Konfigurasi Desain Global --- */
      :root {
        --primary: #002b85;
        --primary-container: #093fb4;
        --secondary: #9c4400;
        --tertiary-container: #8b2700;
        --on-surface: #0b1c30;
        --on-surface-variant: #434653;
        --surface-container-low: #eff4ff;
        --surface-container-lowest: #ffffff;
        --surface-container: #e5eeff;
        --outline-variant: rgba(196, 197, 214, 0.3);
        --error: #ba1a1a;
        --error-container: #ffdad6;
      }

      body {
        background-color: #f8f9ff;
        font-family: 'Inter', sans-serif;
      }

      /* --- Tipografi --- */
      .font-headline-xl { font-family: 'Hanken Grotesk', sans-serif; font-size: 32px; font-weight: 700; letter-spacing: -0.02em; line-height: 40px; }
      .font-headline-lg { font-family: 'Hanken Grotesk', sans-serif; font-size: 24px; font-weight: 600; letter-spacing: -0.01em; line-height: 32px; }
      .font-headline-md { font-family: 'Hanken Grotesk', sans-serif; font-size: 20px; font-weight: 600; line-height: 28px; }
      .text-body-md { font-size: 14px; line-height: 20px; }
      .text-label-md { font-size: 12px; line-height: 16px; }
      .font-data-mono { font-family: 'JetBrains Mono', monospace; font-size: 13px; font-weight: 500; }
      .font-badge-bold { font-weight: 700 !important; }
      .tracking-wider { letter-spacing: 0.05em; }
      .tracking-tighter { letter-spacing: -0.05em; }
      .fs-10 { font-size: 10px; }
      .fs-11 { font-size: 11px; }
      .fs-xs { font-size: 0.75rem; }
      .h-11 { height: 2.75rem; }
      .w-12 { width: 3rem; }
      .h-12 { height: 3rem; }

      /* --- Pemetaan Warna Utilitas --- */
      .text-on-surface { color: var(--on-surface); }
      .text-on-surface-variant { color: var(--on-surface-variant); }
      .bg-surface-container-lowest { background-color: var(--surface-container-lowest); }
      .bg-surface-container-low { background-color: var(--surface-container-low); }
      .bg-surface-container { background-color: var(--surface-container); }
      .text-primary-custom { color: var(--primary); }
      .text-secondary-custom { color: var(--secondary); }
      .text-tertiary-custom { color: var(--tertiary-container); }
      .bg-primary-custom { background-color: var(--primary); }
      .bg-primary-5 { background-color: rgba(0, 43, 133, 0.05); }
      .bg-primary-10 { background-color: rgba(0, 43, 133, 0.1); }
      .bg-secondary-5 { background-color: rgba(156, 68, 0, 0.05); }
      .bg-secondary-10 { background-color: rgba(156, 68, 0, 0.1); }
      .bg-tertiary-5 { background-color: rgba(139, 39, 0, 0.1); }
      .text-on-primary { color: #ffffff; }

      /* Muted & Status Color Tokens */
      .text-emerald { color: #059669; }
      .bg-emerald-5 { background-color: #ecfdf5; }
      .bg-emerald-light { background-color: #d1fae5; }
      .text-amber { color: #d97706; }
      .bg-amber-light { background-color: #fef3c7; }
      .text-danger-custom { color: var(--error); }
      .bg-error-container { background-color: var(--error-container); }
      .bg-error-10 { background-color: rgba(186, 26, 26, 0.1); }
      .text-white-70 { color: rgba(255, 255, 255, 0.7); }
      .text-white-60 { color: rgba(255, 255, 255, 0.6); }
      .bg-white-20 { background-color: rgba(255, 255, 255, 0.2); }
      .border-white-40 { border-color: rgba(255, 255, 255, 0.4) !important; }

      /* --- Custom Elements --- */
      .custom-shadow { box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04); }
      .backdrop-blur { backdrop-filter: blur(8px); }
      .pe-none { pointer-events: none; }
      .inset-0 { top: 0; right: 0; bottom: 0; left: 0; }
      .flex-between-center { display: flex; justify-content: space-between; align-items: center; }

      /* Buttons */
      .btn-outline-custom {
        border-color: var(--primary);
        color: var(--primary);
        transition: all 0.2s ease;
      }
      .btn-outline-custom:hover {
        background-color: rgba(0, 43, 133, 0.05);
        border-color: var(--primary);
        color: var(--primary);
      }
      .btn-primary-custom {
        background-color: var(--primary);
        color: #fff;
        transition: all 0.2s ease;
      }
      .btn-primary-custom:hover {
        background-color: var(--primary-container);
        box-shadow: 0 8px 16px rgba(0, 43, 133, 0.2);
        color: #fff;
      }
      .btn-primary-custom:active {
        transform: scale(0.98);
      }
      .btn-icon {
        background: none;
        border: none;
        border-radius: 50%;
      }
      .btn-icon:hover {
        color: var(--primary) !important;
        background-color: var(--surface-container-low);
      }

      /* Card Design Decoration */

      /* Form Select */
      .form-select-custom {
        padding: 0 1rem;
        border: none;
        outline: none;
        cursor: pointer;
        transition: all 0.2s ease;
      }
      .form-select-custom:focus {
        box-shadow: 0 0 0 1px var(--primary);
      }

      /* --- Grafik Batang (Simulasi CSS) --- */
      .chart-container { height: 16rem; }
      .border-bottom-outline { border-bottom: 1px solid var(--outline-variant); height: 0; }
      .chart-bar {
        background-color: rgba(0, 43, 133, 0.2);
        margin: 0 2px;
        transition: all 0.2s ease;
        cursor: pointer;
        z-index: 1;
      }
      .chart-bar:hover, .chart-bar.active {
        background-color: var(--primary);
      }
      .chart-tooltip {
        top: -40px;
        left: 50%;
        transform: translateX(-50%);
        font-size: 10px;
        opacity: 0;
        transition: opacity 0.2s ease;
        white-space: nowrap;
        z-index: 2;
      }
      .chart-bar:hover .chart-tooltip, .chart-tooltip.active {
        opacity: 1;
      }

      /* --- Table Custom --- */
      .table-custom thead th {
        background-color: var(--surface-container-low);
        color: var(--on-surface-variant);
        font-size: 11px;
        font-weight: 700;
        text-uppercase: true;
        letter-spacing: 0.05em;
        border-bottom: none;
      }
      .table-custom tbody tr {
        border-bottom: 1px solid var(--outline-variant);
        cursor: pointer;
        transition: background-color 0.2s ease;
      }
      .table-row-hover:hover {
        background-color: rgba(239, 244, 255, 0.5);
      }
    </style>
@endsection