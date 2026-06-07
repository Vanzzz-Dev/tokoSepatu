@extends('layout.app')
@section('content')
  <main class="m-4">
    <div class="d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-stack-lg gap-3">
      <div>
        <h2 class="font-headline-xl text-headline-xl text-on-surface mb-1">Product Management</h2>
        <p class="text-on-surface-variant font-body-lg mb-0">Organize and monitor your premium footwear inventory.</p>
      </div>
      <button class="btn btn-primary-container d-inline-flex align-items-center gap-2 px-4 h-11 fw-semibold border-0"
        data-bs-toggle="modal" data-bs-target="#modalAddProduct">
        <span class="fs-5">+</span>
        Add Product
      </button>
    </div>

    {{-- Modal Add Product --}}
    <div class="modal fade" id="modalAddProduct" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
      aria-labelledby="modalAddProductLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 800px;">
        <div class="modal-content border-0 rounded-xl shadow-lg overflow-hidden bg-surface-container-lowest">

          <div
            class="modal-header border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-start bg-gradient-header">
            <div>
              <h5 class="modal-title text-headline-md text-primary mb-1" id="modalAddProductLabel">Tambah Produk Baru</h5>
            </div>
            <button type="button" class="btn-close shadow-none m-0 p-2" data-bs-dismiss="modal"
              aria-label="Close"></button>
          </div>

          <form action="#" method="POST" id="addProductForm" enctype="multipart/form-data">
            @csrf
            <div class="modal-body px-4 py-3">
              <div class="row g-4">

                <div class="col-12 col-md-5">
                  <label class="font-label-md text-on-surface-variant text-uppercase mb-2 d-block">Product Image</label>
                  <div
                    class="dropzone-area rounded-xl d-flex flex-column align-items-center justify-content-center p-4 text-center border-dashed-custom position-relative bg-background h-100 min-h-280">
                    <input type="file" name="product_image" id="productImageInput"
                      class="position-absolute w-100 h-100 top-0 start-0 opacity-0 cursor-pointer"
                      accept="image/jpeg,image/png,image/webp">
                    <div
                      class="dropzone-preview d-none position-absolute w-100 h-100 top-0 start-0 p-2 bg-background rounded-xl">
                      <img src="#" alt="Preview" class="w-100 h-100 object-contain rounded-lg">
                    </div>
                    <div class="dropzone-content">
                      <i class="ti ti-cloud-upload text-primary fs-1 mb-2 d-block"></i>
                      <p class="text-body-md text-on-surface mb-1">Drag and drop image here or <span
                          class="text-primary fw-bold text-decoration-underline">Browse</span></p>
                      <span class="text-outline text-xs">JPG, PNG, WEBP (MAX 2MB)</span>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-md-7 d-flex flex-column gap-3">
                  <div>
                    <label for="productName"
                      class="font-label-md text-on-surface-variant text-uppercase mb-1 d-block">Product Name</label>
                    <input type="text" id="productName" name="name"
                      class="form-control rounded-lg border-outline-variant text-body-md px-3 py-2"
                      placeholder="Enter product name..." required>
                  </div>

                  <div>
                    <label for="productPrice"
                      class="font-label-md text-on-surface-variant text-uppercase mb-1 d-block">Harga Jual</label>
                    <input type="text" id="productPrice" name="price"
                      class="form-control rounded-lg border-outline-variant text-body-md px-3 py-2"
                      placeholder="e.g. Step Point Premium" required>
                  </div>

                  <div class="bg-surface-container-low p-3 rounded-xl border border-outline-variant bg-opacity-50">
                    <div class="d-flex justify-content-between align-items-center mb-2">
                      <span class="text-label-md text-primary text-uppercase tracking-wider">Available Sizes</span>
                      <button type="button"
                        class="btn btn-sm text-primary fw-semibold p-0 border-0 d-flex align-items-center gap-1 text-xs"
                        style="background: none;"><span class="fs-6">+</span> Add Variant</button>
                    </div>
                    <div class="d-flex flex-wrap gap-2" id="sizeSelectionGroup">
                      <input type="checkbox" class="btn-check-custom-size" id="size40" name="sizes[]" value="40" checked>
                      <label class="size-pill-label" for="size40">40</label>

                      <input type="checkbox" class="btn-check-custom-size" id="size41" name="sizes[]" value="41" checked>
                      <label class="size-pill-label" for="size41">41</label>

                      <input type="checkbox" class="btn-check-custom-size" id="size42" name="sizes[]" value="42" checked>
                      <label class="size-pill-label" for="size42">42</label>

                      <input type="checkbox" class="btn-check-custom-size" id="size43" name="sizes[]" value="43">
                      <label class="size-pill-label" for="size43">43</label>

                      <input type="checkbox" class="btn-check-custom-size" id="size44" name="sizes[]" value="44">
                      <label class="size-pill-label" for="size44">44</label>
                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="modal-footer border-0 px-4 pb-4 pt-2 d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center gap-2 text-outline text-xs">
                <i class="ti ti-info-circle fs-6"></i>
                <span>Changes are saved locally as drafts</span>
              </div>
              <div class="d-flex align-items-center gap-2">
                <button type="button" class="btn text-primary fw-medium px-4 text-body-md rounded-lg"
                  data-bs-dismiss="modal" style="background: none;">Batal</button>
                <button type="submit"
                  class="btn btn-primary-container fw-semibold px-4 py-2 text-body-md rounded-lg border-0 shadow-sm">Simpan
                  Produk</button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>


    <div
      class="bg-surface-container-lowest rounded-xl p-3 border border-outline-variant d-flex flex-wrap gap-3 align-items-center mb-stack-md">
      <div class="flex-grow-1 min-w-240 relative position-relative">
        <i class="ti ti-search icon filter"></i>
        <input class="form-control form-control-custom bg-background border-outline-variant rounded-lg text-body-md"
          placeholder="Search by SKU or Name..." type="text" />
      </div>
      <div class="d-flex align-items-center gap-2">
        <span class="text-label-md text-outline whitespace-nowrap">Category:</span>
        <select
          class="form-select form-select-custom bg-background border-outline-variant rounded-lg text-body-md px-3 pe-5">
          <option>All Footwear</option>
          <option>Performance Running</option>
          <option>Classic Sneakers</option>
          <option>Luxury Formal</option>
          <option>All-Terrain Boots</option>
        </select>
      </div>
      <div class="d-flex align-items-center gap-2">
        <span class="text-label-md text-outline whitespace-nowrap">Sort by:</span>
        <select
          class="form-select form-select-custom bg-background border-outline-variant rounded-lg text-body-md px-3 pe-5">
          <option>Newest First</option>
          <option>Price: High to Low</option>
          <option>Stock Level: Low to High</option>
        </select>
      </div>
    </div>

    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden custom-shadow-l1">
      <div class="table-responsive">
        <table class="table table-custom align-middle text-start mb-0">
          <thead class="bg-surface-container-low border-bottom border-outline-variant">
            <tr>
              <th class="px-4 py-3 font-label-md text-on-surface-variant text-uppercase tracking-wider border-0">Product
              </th>
              <th class="px-4 py-3 font-label-md text-on-surface-variant text-uppercase tracking-wider border-0">Category
              </th>
              <th
                class="px-4 py-3 font-label-md text-on-surface-variant text-uppercase tracking-wider text-center border-0">
                Stock Level</th>
              <th class="px-4 py-3 font-label-md text-on-surface-variant text-uppercase tracking-wider border-0">Price
              </th>
              <th class="px-4 py-3 font-label-md text-on-surface-variant text-uppercase tracking-wider text-end border-0">
                Actions</th>
            </tr>
          </thead>
          <tbody class="table-group-divider border-0">
            @foreach (range(1, 5) as $item)
              <tr class="table-row-group">
                <td class="px-4 py-3 border-bottom border-outline-variant">
                  <div class="d-flex align-items-center gap-3">
                    <div
                      class="w-14 h-14 rounded-lg bg-surface-container-high overflow-hidden border border-outline-variant flex-shrink-0 table-img-container">
                      <img alt="Nike Red Runner" class="w-100 h-100 object-cover table-img"
                        src="https://lh3.googleusercontent.com/aida-public/AB6AXuBhV-o6ONbrzb-QWSH2r4mdXp1qbAri669Y4fAGPasSNTLO9G6hYLYVhdmCBuD_hFZ34O0pUIfHz2TFkhUPWLUd5K-T5piPBIFJ7GDHT1vZot2u8gggiRBDMO7ofToxl-YrdVcxgXkonE-g1Qu4_YyS-n30hsPcilUuCQuK9tJGJkTh_wdE99nZVSCkQEBrpq9_M-nuUWYJjRSlsfigLJ4Fp_dmHt9kouKJSybqcctY3o08lN47hhJ237uj2CbIEWyVe3T59EvlFw" />
                    </div>
                    <div>
                      <p class="fw-semibold text-on-surface mb-0">Vanguard Elite Runner</p>
                      <p class="font-data-mono text-outline text-xs mb-0">SKU: SP-77291-RD</p>
                    </div>
                  </div>
                </td>
                <td class="px-4 py-3 border-bottom border-outline-variant">
                  <span class="badge badge-custom bg-primary-light text-primary rounded-pill fw-semibold">Performance
                    Running</span>
                </td>
                <td class="px-4 py-3 border-bottom border-outline-variant">
                  <div class="d-flex flex-column align-items-center gap-1">
                    <div class="progress progress-custom bg-surface-container-high rounded-pill overflow-hidden">
                      <div class="progress-bar bg-secondary" style="width: 85%"></div>
                    </div>
                    <span class="font-data-mono text-xs text-on-secondary-container">124 Units</span>
                  </div>
                </td>
                <td class="px-4 py-3 fw-semibold text-on-surface border-bottom border-outline-variant">$189.00</td>
                <td class="px-4 py-3 text-end border-bottom border-outline-variant">
                  <div class="action-buttons d-flex justify-content-end gap-1">
                    <button class="btn btn-action text-primary p-2 border-0" title="Edit Product">
                      <i class="ti ti-pencil"></i>
                    </button>
                    <button class="btn btn-action text-error p-2 border-0" title="Delete Product">
                      <i class="ti ti-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

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
  </main>

  <style>
    /* --- Custom Variables & Styling Migrated from Tailwind --- */
    :root {
      --primary: #002b85;
      --primary-container: #093fb4;
      --primary-light: rgba(0, 43, 133, 0.08);
      --secondary: #9c4400;
      --secondary-light: rgba(156, 68, 0, 0.06);
      --on-secondary-container: #652a00;
      --on-secondary-light: rgba(101, 42, 0, 0.1);
      --background: #f8f9ff;
      --on-surface: #0b1c30;
      --on-surface-variant: #434653;
      --outline: #747685;
      --outline-variant: #c4c5d6;
      --error: #ba1a1a;
      --error-light: rgba(186, 26, 26, 0.1);
      --surface-container-lowest: #ffffff;
      --surface-container-low: #eff4ff;
      --surface-container-high: #dce9ff;
      --surface-container-highest: #d3e4fe;
    }

    /* KUSTOM BARU UNTUK SELEKSI UKURAN (SIZE PILLS) & DROPZONE */
    .border-dashed-custom {
      border: 2px dashed var(--outline-variant);
      transition: border-color 0.2s ease;
    }

    .dropzone-area:hover {
      border-color: var(--primary);
    }

    .cursor-pointer {
      cursor: pointer;
    }

    .min-h-280 {
      min-height: 280px;
    }

    .object-contain {
      object-fit: contain;
    }

    /* Input Checkbox Tersembunyi untuk Ukuran Sepatu */
    .btn-check-custom-size {
      position: absolute;
      clip: rect(0, 0, 0, 0);
      pointer-events: none;
    }

    .size-pill-label {
      display: inline-flex;
      align-items: center;
      justify-content: center;
      width: 38px;
      height: 38px;
      border-radius: 50%;
      border: 1px solid var(--outline-variant);
      background-color: var(--surface-container-lowest);
      color: var(--on-surface);
      font-size: 13px;
      font-family: "JetBrains Mono", monospace;
      font-weight: 600;
      cursor: pointer;
      user-select: none;
      transition: all 0.2s ease;
    }

    .btn-check-custom-size:checked+.size-pill-label {
      background-color: var(--primary);
      border-color: var(--primary);
      color: #ffffff;
    }

    /* --- Core Layout Custom Spacing --- */
    .ms-sidebar-width {
      margin-left: 260px;
    }

    .pt-navbar-height {
      padding-top: 72px;
    }

    .p-container-padding {
      padding: 32px;
    }

    .mb-stack-lg {
      margin-bottom: 24px;
    }

    .mb-stack-md {
      margin-bottom: 16px;
    }

    .mt-stack-lg {
      margin-top: 24px;
    }

    .min-w-240 {
      min-width: 240px;
    }

    .whitespace-nowrap {
      white-space: nowrap;
    }

    /* Width & Height Utilities */
    .w-12 {
      width: 3rem;
    }

    .h-12 {
      height: 3rem;
    }

    .w-14 {
      width: 3.5rem;
    }

    .h-14 {
      height: 3.5rem;
    }

    .progress-custom {
      width: 8rem;
      height: 0.375rem;
    }

    .left-3 {
      left: 1rem;
    }

    /* Colors Mapping */
    .bg-background {
      background-color: var(--background);
    }

    .bg-surface-container-lowest {
      background-color: var(--surface-container-lowest);
    }

    .bg-surface-container-low {
      background-color: var(--surface-container-low);
    }

    .bg-surface-container-high {
      background-color: var(--surface-container-high);
    }

    .bg-surface-highest {
      background-color: var(--surface-container-highest);
    }

    .bg-primary-light {
      background-color: var(--primary-light);
    }

    .bg-secondary-light {
      background-color: var(--secondary-light);
    }

    .bg-on-secondary-light {
      background-color: var(--on-secondary-light);
    }

    .bg-error-light {
      background-color: var(--error-light);
    }

    .bg-secondary {
      background-color: var(--secondary);
    }

    .bg-error {
      background-color: var(--error);
    }

    .text-primary {
      color: var(--primary) !important;
    }

    .text-secondary {
      color: var(--secondary) !important;
    }

    .text-error {
      color: var(--error) !important;
    }

    .text-on-surface {
      color: var(--on-surface);
    }

    .text-on-surface-variant {
      color: var(--on-surface-variant);
    }

    .text-on-secondary-container {
      color: var(--on-secondary-container);
    }

    .text-outline {
      color: var(--outline);
    }

    .border-outline-variant {
      border-color: var(--outline-variant) !important;
    }

    /* Buttons & Interactions */
    .btn-primary-container {
      background-color: var(--primary-container);
      color: #ffffff;
      transition: all 0.2s ease;
    }

    .btn-primary-container:hover {
      background-color: var(--primary-container);
      opacity: 0.9;
      color: #ffffff;
    }

    .btn-primary-container:active {
      transform: scale(0.98);
    }

    /* Input Custom Controls Focus style replacement */
    .form-control-custom:focus,
    .form-select-custom:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 2px rgba(0, 43, 133, 0.2);
    }

    .form-control-custom {
      height: 40px;
      padding-left: 2.5rem;
    }

    .form-select-custom {
      height: 40px;
    }

    /* Table Adjustments & Row Actions Trigger */
    .table-custom tbody tr {
      transition: background-color 0.2s ease;
    }

    .table-custom tbody tr:hover {
      background-color: var(--surface-container-low);
    }

    .action-buttons {
      opacity: 0;
      transition: opacity 0.2s ease;
    }

    .table-custom tbody tr:hover .action-buttons {
      opacity: 1;
    }

    .btn-action {
      border-radius: 0.5rem;
      transition: all 0.2s;
    }

    .btn-action.text-primary:hover {
      background-color: var(--primary-light);
    }

    .btn-action.text-error:hover {
      background-color: var(--error-light);
    }

    /* Images Zoom Effect */
    .table-img-container .table-img {
      transition: transform 0.5s ease;
    }

    .table-custom tbody tr:hover .table-img {
      transform: scale(1.1);
    }

    /* Pagination Buttons */
    .btn-pagination {
      width: 40px;
      height: 40px;
      padding: 0;
      transition: background-color 0.2s;
    }

    .btn-pagination:not(.btn-primary-container):hover {
      background-color: var(--surface-container-low);
    }

    /* Typography */
    .font-headline-xl {
      font-family: "Hanken Grotesk", sans-serif;
    }

    .text-headline-xl {
      font-size: 32px;
      line-height: 40px;
      letter-spacing: -0.02em;
      font-weight: 700;
    }

    .text-headline-md {
      font-size: 20px;
      line-height: 28px;
      font-weight: 600;
      font-family: "Hanken Grotesk", sans-serif;
    }

    .font-body-lg {
      font-family: "Inter", sans-serif;
      font-size: 16px;
      line-height: 24px;
      font-weight: 400;
    }

    .text-body-md {
      font-family: "Inter", sans-serif;
      font-size: 14px;
      line-height: 20px;
    }

    .font-label-md {
      font-family: "Inter", sans-serif;
      font-size: 12px;
      line-height: 16px;
      font-weight: 600;
    }

    .text-label-md {
      font-size: 12px;
      font-weight: 600;
    }

    .font-data-mono {
      font-family: "JetBrains Mono", monospace;
      font-size: 13px;
      font-weight: 500;
    }

    .text-xs {
      font-size: 12px;
    }

    .tracking-wider {
      letter-spacing: 0.05em;
    }

    /* Borders & Shadows */
    .rounded-xl {
      border-radius: 0.75rem;
    }

    .rounded-lg {
      border-radius: 0.5rem;
    }

    .custom-shadow-l1 {
      box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
    }

    .badge-custom {
      padding: 0.25rem 0.75rem;
      font-size: 12px;
    }

    .justify-center {
      justify-content: center;
    }

    /* Material Symbols Alignment */
    .material-symbols-outlined {
      font-variation-settings: "FILL" 0, "wght" 300, "GRAD" 0, "opsz" 24;
      display: inline-block;
      vertical-align: middle;
    }

    body {
      -webkit-font-smoothing: antialiased;
    }

    /* Responsive fixes */
    @media (max-width: 767.98px) {
      .ms-sidebar-width {
        margin-left: 0;
      }

      .p-container-padding {
        padding: 16px;
      }
    }
  </style>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const fileInput = document.getElementById('productImageInput');
      const previewContainer = document.querySelector('.dropzone-preview');
      const previewImg = previewContainer.querySelector('img');

      if (fileInput) {
        fileInput.addEventListener('change', function (e) {
          const file = e.target.files[0];
          if (file) {
            const reader = new FileReader();
            reader.onload = function (event) {
              previewImg.src = event.target.result;
              previewContainer.classList.remove('d-none');
            }
            reader.readAsDataURL(file);
          }
        });
      }
    });
  </script>
@endsection