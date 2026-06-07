@extends('layout.app')
@section('content')
  <style>
    /* Custom Palette & Typography matching your design system */
    :root {
      --primary: #002b85;
      --on-primary: #ffffff;
      --primary-fixed: #dce1ff;
      --secondary: #9c4400;
      --background: #f8f9ff;
      --on-surface: #0b1c30;
      --on-surface-variant: #434653;
      --outline-variant: #c4c5d6;
      --surface-container-low: #eff4ff;
      --surface-container-lowest: #ffffff;
      --surface-container-highest: #d3e4fe;
      --error-container: #ffdad6;
      --error: #ba1a1a;
      --tertiary-fixed: #ffdbd0;
      --tertiary: #641a00;
      --on-primary-container: #a5b7ff;
    }

    body {
      font-family: 'Inter', sans-serif;
      font-size: 14px;
      background-color: var(--background);
      color: var(--on-surface);
    }

    h2,
    h3 {
      font-family: 'Hanken Grotesk', sans-serif;
    }

    .font-mono {
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
    }

    /* Icons */
    .material-symbols-outlined {
      font-variation-settings: "FILL" 0, "wght" 400, "GRAD" 0, "opsz" 24;
      vertical-align: middle;
    }


    /* Custom Cards & Shadows */
    .custom-card {
      background-color: var(--surface-container-lowest);
      border: 1px solid var(--outline-variant);
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
      overflow: hidden;
    }

    /* Date Filter Custom Focus Interaction */
    .date-filter-box {
      background-color: var(--surface-container-lowest);
      border: 1px solid var(--outline-variant);
      transition: all 0.2s ease-in-out;
    }

    .date-filter-box:focus-within {
      border-color: var(--primary);
      box-shadow: 0 0 0 2px rgba(0, 43, 133, 0.2), 0 4px 10px rgba(0, 0, 0, 0.05);
    }

    .date-filter-box input {
      border: none;
      outline: none;
      background: transparent;
      color: var(--on-surface-variant);
      font-size: 14px;
      width: 175px;
    }

    /* Buttons styling */
    .btn-primary-custom {
      background-color: var(--primary);
      color: var(--on-primary);
      font-weight: 600;
      border: none;
      padding: 10px 20px;
      border-radius: 8px;
      transition: all 0.2s;
    }

    .btn-primary-custom:hover {
      opacity: 0.9;
      color: var(--on-primary);
    }

    .btn-primary-custom:active {
      transform: scale(0.98);
    }

    .btn-text-custom {
      color: var(--primary);
      font-weight: 600;
      background: transparent;
      border: none;
      padding: 6px 12px;
      border-radius: 8px;
      transition: all 0.2s;
    }

    .btn-text-custom:hover {
      background-color: rgba(0, 43, 133, 0.05);
    }

    .btn-outline-custom {
      border: 1px solid var(--primary);
      color: var(--primary);
      font-weight: 600;
      padding: 10px 20px;
      border-radius: 8px;
      background: transparent;
      transition: all 0.2s;
    }

    .btn-outline-custom:hover {
      background-color: rgba(0, 43, 133, 0.05);
    }

    /* Custom Table Adjustments */
    .table th {
      font-size: 12px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: #747685;
      background-color: rgba(239, 244, 255, 0.5);
      border-bottom: 1px solid var(--outline-variant);
      padding: 16px 24px;
    }

    .table td {
      padding: 16px 24px;
      vertical-align: middle;
      border-bottom: 1px solid var(--outline-variant);
    }

    .table tbody tr {
      transition: background-color 0.2s;
    }

    .table tbody tr:hover {
      background-color: rgba(239, 244, 255, 0.3) !important;
    }

    /* Status Badges */
    .status-dot {
      width: 6px;
      height: 6px;
      border-radius: 50%;
      display: inline-block;
      margin-right: 6px;
    }

    /* User Avatars */
    .avatar {
      width: 32px;
      height: 32px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: bold;
      font-size: 12px;
    }

    /* Custom Scrollbar */
    ::-webkit-scrollbar {
      width: 6px;
    }

    ::-webkit-scrollbar-track {
      background: transparent;
    }

    ::-webkit-scrollbar-thumb {
      background: #dce1ff;
      border-radius: 10px;
    }

    /* Responsive fix for Main area */
    @media (max-width: 991.98px) {
      main {
        margin-left: 0;
        padding: 16px;
      }
    }
  </style>
  </head>

  <body>

    <!-- Placeholder Side & Top Nav -->

    <!-- Main Content -->
    <main class="container mt-3">
      <!-- Header & Filters -->
      <div class="d-flex flex-col flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
          <h2 class="fw-bold text-dark mb-1" style="font-size: 32px; letter-spacing: -0.02em;">Transaction History</h2>
          <p class="text-muted mb-0">Review and manage all retail activities for Step Point.</p>
        </div>
      </div>

      <!-- Transactions Table Card -->
      <div class="custom-card">
        <div class="table-responsive">
          <table class="table mb-0 align-middle">
            <thead>
              <tr>
                <th>Date &amp; Time</th>
                <th>Customer Name</th>
                <th>Purchased Items</th>
                <th class="text-end">Total Payment</th>
                <th class="text-center">Status</th>
                <th class="text-end">Actions</th>
              </tr>
            </thead>
            <tbody>
              <!-- Row 1 -->
              <tr>
                <td>
                  <div class="fw-semibold text-dark">Oct 24, 2023</div>
                  <div class="text-muted" style="font-size: 12px;">14:22 PM</div>
                </td>
                <td>
                  <div class="d-flex align-items-center gap-2">
                    <div class="avatar" style="background-color: var(--primary-fixed); color: var(--primary);">AL</div>
                    <span class="fw-medium">Adrian Laurent</span>
                  </div>
                </td>
                <td>
                  <div class="d-flex align-items-center gap-1">
                    <span>Air Jordan 1 Retro (1)</span>
                    <span class="badge fw-bold"
                      style="background-color: var(--surface-container-highest); color: var(--primary); font-size: 10px;">+2
                      more</span>
                  </div>
                </td>
                <td class="text-end fw-bold font-mono text-primary">$425.00</td>
                <td>
                  <div class="d-flex justify-content-center">
                    <span
                      class="badge rounded-pill px-2.5 py-1.5 fw-bold d-flex align-items-center bg-success-subtle text-success"
                      style="font-size: 11px;">
                      <span class="status-dot bg-success"></span>Paid
                    </span>
                  </div>
                </td>
                <td class="text-end">
                  <button class="btn-text-custom" data-bs-toggle="modal" data-bs-target="#detailModal">View
                    Detail</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Pagination Footer -->
        <div class="pagination-container">
          <button class="pagination-item btn-nav" aria-label="Previous page">
            <i class="ti ti-chevron-left"></i>
          </button>

          <button class="pagination-item active">1</button>

          <button class="pagination-item">2</button>

          <button class="pagination-item btn-nav" aria-label="Next page">
            <i class="ti ti-chevron-right"></i>
          </button>
        </div>
        </div>
      </div>
    </main>

    <div class="modal fade" id="detailModal" tabindex="-1" aria-labelledby="detailModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden">

          <!-- Modal Header -->
          <div class="modal-header px-4 pt-4 pb-3 border-bottom border-light">
            <div>
              <h3 class="modal-title fw-bold" id="detailModalLabel" style="font-size: 24px; color: var(--on-surface);">
                Transaction Details</h3>
              <p class="text-muted mb-0" style="font-size: 12px; font-weight: 600;">ID: #TRX-984251-OP</p>
            </div>
            <button type="button" class="btn-close rounded-circle p-2" data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>

          <!-- Modal Body -->
          <div class="modal-body p-4 d-flex flex-column gap-4">
            <!-- Status & Date Banner -->
            <div class="d-flex justify-content-between align-items-start p-3 rounded-3"
              style="background-color: rgba(239, 244, 255, 0.5)">
              <div>
                <p class="text-muted uppercase fw-bold mb-1" style="font-size: 12px; letter-spacing: 0.05em;">Status</p>
                <span
                  class="badge rounded-pill px-3 py-1.5 fw-bold d-flex align-items-center bg-success-subtle text-success"
                  style="font-size: 12px;">
                  <span class="status-dot bg-success" style="width:8px; height:8px;"></span>Paid via Credit Card
                </span>
              </div>
              <div class="text-end">
                <p class="text-muted uppercase fw-bold mb-1" style="font-size: 12px; letter-spacing: 0.05em;">Processed
                  Date</p>
                <p class="fw-medium mb-0" style="color: var(--on-surface)">October 24, 2023 • 14:22 PM</p>
              </div>
            </div>

            <!-- Customer & Shipping Grid -->
            <div class="row g-4">
              <div class="col-md-6">
                <p class="text-muted uppercase fw-bold mb-2" style="font-size: 12px; letter-spacing: 0.05em;">Customer
                  Info</p>
                <div class="d-flex align-items-center gap-3">
                  <div class="avatar bg-primary-subtle text-primary fw-bold"
                    style="width: 48px; height: 48px; font-size: 18px;">AL</div>
                  <div>
                    <p class="fw-bold mb-0" style="font-size: 16px;">Adrian Laurent</p>
                    <p class="text-muted mb-0" style="font-size: 12px;">adrian.l@gmail.com</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <p class="text-muted uppercase fw-bold mb-2" style="font-size: 12px; letter-spacing: 0.05em;">Shipping To
                </p>
                <p class="fw-medium mb-0" style="color: var(--on-surface)">452 Fifth Avenue, New York, NY 10018</p>
              </div>
            </div>

            <!-- Ordered Items -->
            <div>
              <p class="text-muted uppercase fw-bold mb-2" style="font-size: 12px; letter-spacing: 0.05em;">Ordered Items
              </p>
              <div class="d-flex flex-column gap-2">
                <!-- Item 1 -->
                <div class="d-flex justify-content-between align-items-center p-3 border border-light rounded-3">
                  <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                      style="width:48px; height:48px; background-color: var(--surface-container);">
                      <span class="material-symbols-outlined text-muted">foot_bones</span>
                    </div>
                    <div>
                      <p class="fw-bold mb-0">Air Jordan 1 Retro High</p>
                      <p class="text-muted mb-0" style="font-size: 12px;">Size: 10.5 US • Qty: 1</p>
                    </div>
                  </div>
                  <p class="fw-bold font-mono mb-0">$175.00</p>
                </div>
                <!-- Item 2 -->
                <div class="d-flex justify-content-between align-items-center p-3 border border-light rounded-3">
                  <div class="d-flex align-items-center gap-3">
                    <div class="rounded-3 d-flex align-items-center justify-content-center"
                      style="width:48px; height:48px; background-color: var(--surface-container);">
                      <span class="material-symbols-outlined text-muted">foot_bones</span>
                    </div>
                    <div>
                      <p class="fw-bold mb-0">Nike Dunk Low 'Panda'</p>
                      <p class="text-muted mb-0" style="font-size: 12px;">Size: 9.0 US • Qty: 2</p>
                    </div>
                  </div>
                  <p class="fw-bold font-mono mb-0">$250.00</p>
                </div>
              </div>
            </div>

            <!-- Calculation Summary -->
            <div class="border-top border-light pt-3 d-flex flex-column gap-2">
              <div class="d-flex justify-content-between text-muted">
                <span>Subtotal</span>
                <span class="fw-medium">$425.00</span>
              </div>
              <div class="d-flex justify-content-between text-muted">
                <span>Tax (VAT 0%)</span>
                <span class="fw-medium">$0.00</span>
              </div>
              <div class="d-flex justify-content-between align-items-center pt-2">
                <span class="fw-bold" style="font-size: 16px;">Total Payment</span>
                <span class="fw-bold font-mono text-primary" style="font-size: 20px;">$425.00</span>
              </div>
            </div>
          </div>

          <!-- Modal Footer -->
          <div class="modal-footer px-4 py-3 border-top border-light d-flex justify-content-end gap-2"
            style="background-color: rgba(239, 244, 255, 0.2)">
            <button type="button" class="btn-outline-custom">Download Receipt</button>
            <button type="button" class="btn-primary-custom" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Bootstrap 5 Bundle with Popper JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/javascript.bundle.min.js"></script>

    <script>
      // Simple Micro-interaction for Date Filter focus
      const searchInput = document.getElementById("date-filter");
      if (searchInput) {
        searchInput.addEventListener("focus", () => {
          searchInput.parentElement.style.boxShadow = "0 4px 12px rgba(9, 63, 180, 0.08)";
        });
        searchInput.addEventListener("blur", () => {
          searchInput.parentElement.style.boxShadow = "none";
        });
      }
    </script>
@endsection