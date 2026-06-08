@extends('layout.app')
@section('content')
  <style>
    :root {
      --color-primary: #002b85;
      --color-primary-container: #093fb4;
      --color-secondary: #9c4400;
      --color-secondary-container: #fe8438;
      --color-background: #f8f9ff;
      --color-surface: #f8f9ff;
      --color-surface-container: #e5eeff;
      --color-surface-container-low: #eff4ff;
      --color-surface-container-lowest: #ffffff;
      --color-surface-dim: #cbdbf5;
      --color-outline: #747685;
      --color-outline-variant: #c4c5d6;
      --color-on-surface: #0b1c30;
      --color-on-surface-variant: #434653;
      --color-on-background: #0b1c30;
      --color-on-primary: #ffffff;
      --color-on-primary-container: #a5b7ff;
      --color-error: #ba1a1a;
      --color-error-container: #ffdad6;
      --color-on-error-container: #93000a;
      --color-tertiary-container: #8b2700;
    }

    body {
      font-family: 'Inter', sans-serif;
      background-color: var(--color-background);
      color: var(--color-on-background);
    }

    .material-symbols-outlined {
      font-variation-settings: 'FILL' 0, 'wght' 300, 'GRAD' 0, 'opsz' 24;
      vertical-align: middle;
    }

    .text-headline-md {
      font-family: 'Hanken Grotesk', sans-serif;
      font-size: 20px;
      line-height: 28px;
      font-weight: 600;
    }

    .text-body-md {
      font-size: 14px;
      line-height: 20px;
    }

    .text-label-md {
      font-size: 12px;
      line-height: 16px;
      font-weight: 600;
    }

    .font-data-mono {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      font-weight: 500;
    }

    .text-primary-brand {
      color: var(--color-primary) !important;
    }

    .text-outline {
      color: var(--color-outline) !important;
    }

    .text-on-surface {
      color: var(--color-on-surface) !important;
    }

    .bg-surface-container {
      background-color: var(--color-surface-container) !important;
    }

    .stock-card-shadow {
      box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
    }

    .form-control,
    .form-select {
      border-color: var(--color-outline-variant);
      border-radius: .5rem;
      height: 44px;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: var(--color-primary);
      box-shadow: 0 0 0 .15rem rgba(44, 85, 201, .15);
    }

    .stock-table thead th {
      background-color: var(--color-surface-container-low);
      color: var(--color-outline);
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: .06em;
      border-bottom: 1px solid var(--color-outline-variant);
    }

    .badge-stock-in {
      background-color: #dcfce7;
      color: #15803d;
      font-size: 11px;
      font-weight: 700;
      border-radius: 999px;
      padding: .2rem .65rem;
    }

    .badge-stock-out {
      background-color: #ffedd5;
      color: #c2410c;
      font-size: 11px;
      font-weight: 700;
      border-radius: 999px;
      padding: .2rem .65rem;
    }

    .btn-primary-brand {
      background-color: var(--color-primary);
      color: #fff;
      border: none;
      border-radius: .5rem;
      font-weight: 600;
      height: 44px;
    }

    .btn-primary-brand:hover {
      background-color: #00236e;
      color: #fff;
    }

    tbody tr {
      opacity: 0;
      transform: translateY(10px);
      transition: all .4s ease forwards;
    }
  </style>

  {{-- Pop-Up Toast Alert Area --}}
  <div class="alret-PopUp">
    @if(session('store'))
      <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
        <div class="toast show border-0 text-white bg-success">
          <div class="d-flex align-items-center">
            <div class="toast-body d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none">
                <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                <path d="M9 12l2 2l4 -4" />
              </svg>
              {{ session('store') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      </div>
    @endif

    @if(session('delete'))
      <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
        <div class="toast show border-0 text-white bg-danger">
          <div class="d-flex align-items-center">
            <div class="toast-body d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="me-2" width="20" height="20" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" fill="none">
                <path d="M12 9v2m0 4v.01" />
                <path d="M5 19h14a2 2 0 0 0 1.84 -2.75l-7.1 -12.25a2 2 0 0 0 -3.5 0l-7.1 12.25a2 2 0 0 0 1.75 2.75" />
              </svg>
              {{ session('delete') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      </div>
    @endif
  </div>

  <main class="py-4">
    <div class="container-fluid px-4">
      <div class="row g-4">

        <div class="col-12 col-lg-4">
          <div class="bg-white rounded-3 p-4 stock-card-shadow border border-outline-variant h-100">
            <h3 class="text-headline-md text-primary-brand mb-4">Stock Movement</h3>

            <form action="{{ route('stock.store') }}" method="POST" class="d-flex flex-column gap-3">
              @csrf

              <div>
                <label class="d-block text-label-md text-outline mb-1">Select Product</label>
                <select class="form-select text-body-md" name="product_id" required>
                  <option value="" disabled selected hidden>Choose product...</option>
                  @if(isset($products) && count($products) > 0)
                    @foreach($products as $prod)
                      <option value="{{ $prod->id }}">{{ $prod->name }} </option>
                    @endforeach
                  @else
                    <option value="" disabled>Tidak ada produk tersedia</option>
                  @endif
                </select>
              </div>

              <div>
                <label class="d-block text-label-md text-outline mb-1">Movement Type</label>
                <div class="d-flex gap-3 mt-1">
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="typeIn" value="IN" checked>
                    <label class="form-check-label small fw-bold text-success" for="typeIn">STOCK IN (+)</label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="radio" name="type" id="typeOut" value="OUT">
                    <label class="form-check-label small fw-bold text-danger" for="typeOut">STOCK OUT (-)</label>
                  </div>
                </div>
              </div>

              <div>
                <label class="d-block text-label-md text-outline mb-1">Quantity</label>
                <input type="number" name="quantity" value="1" class="form-control text-body-md" min="1" required />
              </div>

              <div>
                <label class="d-block text-label-md text-outline mb-1">Date</label>
                <input type="date" name="date" class="form-control text-body-md" value="{{ date('Y-m-d') }}" required />
              </div>

              <button type="submit" class="btn btn-primary-brand w-100 mt-2">Confirm</button>
            </form>
          </div>
        </div>

        <div class="col-12 col-lg-8">
          <div class="bg-white rounded-3 stock-card-shadow border border-outline-variant overflow-hidden">

            <div class="px-4 py-4 border-bottom d-flex justify-content-between align-items-center bg-white"
              style="border-color: var(--color-outline-variant) !important;">
              <div>
                <h3 class="text-headline-md text-on-surface mb-0">Stock Activity History</h3>
                <p class="text-body-md text-outline mb-0">Real-time log of warehouse operations</p>
              </div>
            </div>

            <div class="table-responsive">
              <table class="table stock-table align-middle mb-0">
                <thead>
                  <tr>
                    <th class="px-4 py-3">Product</th>
                    <th class="px-4 py-3">Type</th>
                    <th class="px-4 py-3">Quantity</th>
                    <th class="px-4 py-3">Date</th>
                  </tr>
                </thead>
                <tbody>
                  @if(isset($movements) && count($movements) > 0)
                    @foreach($movements as $move)
                      <tr>
                        <td class="px-4 py-3">
                          <div class="d-flex align-items-center gap-3">
                            <div class="rounded-3 overflow-hidden flex-shrink-0 bg-surface-container"
                              style="width:40px;height:40px;">
                              <img src="{{ asset($move->product->img ?? 'uploads/products/default.png') }}"
                                class="w-100 h-100 object-fit-cover" alt="Product Image" />
                            </div>
                            <span
                              class="fw-semibold text-on-surface text-body-md">{{ $move->product->name ?? 'Deleted Product' }}</span>
                          </div>
                        </td>
                        <td class="px-4 py-3">
                          @if(strtoupper($move->type ?? '') === 'IN' || $move->quantity > 0)
                            <span class="badge-stock-in d-inline-flex align-items-center gap-1">STOCK IN</span>
                          @else
                            <span class="badge-stock-out d-inline-flex align-items-center gap-1">STOCK OUT</span>
                          @endif
                        </td>
                        <td class="px-4 py-3 font-data-mono text-on-surface">
                          {{ $move->quantity > 0 ? '+' . $move->quantity : $move->quantity }}
                        </td>
                        <td class="px-4 py-3 text-body-md text-outline">
                          {{ \Carbon\Carbon::parse($move->date)->format('M d, Y') }}
                        </td>
                      </tr>
                    @endforeach
                  @else
                    <tr>
                      <td colspan="4" class="text-center p-4 text-muted small">Belum ada riwayat mutasi stok.</td>
                    </tr>
                  @endif
                </tbody>
              </table>
            </div>

            <div class="p-4 d-flex justify-content-end bg-white border-top border-light-subtle">
              @if(isset($movements) && method_exists($movements, 'links'))
                {{ $movements->links('pagination::bootstrap-5') }}
              @endif
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      document.querySelectorAll('tbody tr').forEach((row, i) => {
        setTimeout(() => {
          row.style.opacity = '1';
          row.style.transform = 'translateY(0)';
        }, 100 * i);
      });
    });
  </script>
@endsection