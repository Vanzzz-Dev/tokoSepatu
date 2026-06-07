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

    /* ── Typography helpers ── */
    .text-headline-md {
      font-family: 'Hanken Grotesk', sans-serif;
      font-size: 20px;
      line-height: 28px;
      font-weight: 600;
    }

    .text-headline-lg {
      font-family: 'Hanken Grotesk', sans-serif;
      font-size: 24px;
      line-height: 32px;
      font-weight: 600;
    }

    .text-body-md {
      font-size: 14px;
      line-height: 20px;
    }

    .text-body-lg {
      font-size: 16px;
      line-height: 24px;
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

    /* ── Colour utilities ── */
    .text-primary-brand {
      color: var(--color-primary) !important;
    }

    .text-outline {
      color: var(--color-outline) !important;
    }

    .text-on-surface {
      color: var(--color-on-surface) !important;
    }

    .text-on-surface-var {
      color: var(--color-on-surface-variant) !important;
    }

    .bg-surface-container {
      background-color: var(--color-surface-container) !important;
    }

    .bg-surface-dim {
      background-color: var(--color-surface-dim) !important;
    }

    /* ── Card shadow ── */
    .stock-card-shadow {
      box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
    }

    /* ── Form ── */
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

    /* ── Table ── */
    .stock-table thead th {
      background-color: var(--color-surface-container-low);
      color: var(--color-outline);
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: .06em;
      border-bottom: 1px solid var(--color-outline-variant);
    }

    .stock-table tbody tr {
      border-color: rgba(196, 197, 214, .25);
    }

    .stock-table tbody tr:hover {
      background-color: #fdfdfd;
    }

    /* ── Badges ── */
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

    /* ── Btn overrides ── */
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

    .btn-outline-primary-brand {
      color: var(--color-primary);
      border: 1px solid var(--color-primary);
      border-radius: .5rem;
      background: transparent;
    }

    .btn-outline-primary-brand:hover {
      background-color: rgba(0, 43, 133, .05);
      color: var(--color-primary);
    }

    /* ── Row fade-in animation ── */
    tbody tr {
      opacity: 0;
      transform: translateY(10px);
      transition: all .4s ease forwards;
    }

    /* ── Image Upload Area ── */
    .upload-zone {
      border: 2px dashed var(--color-outline-variant);
      border-radius: 12px;
      height: 200px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      background-color: rgba(248, 249, 255, 0.5);
      transition: all 0.2s;
    }

    .upload-zone:hover {
      border-color: var(--color-primary);
      background-color: #eff4ff;
    }
  </style>

  <main class="py-4">
    <div class="container-fluid px-4">
      <div class="row g-4">
        <div class="col-12 col-lg-4">
          <div class="bg-white rounded-3 p-4 stock-card-shadow border border-outline-variant h-100">
            <h3 class="text-headline-md text-primary-brand mb-4">Stock Movement</h3>

            <form action="#" method="POST" class="d-flex flex-column gap-3">
              @csrf

              <!-- Select Product -->
              <div>
                <label class="d-block text-label-md text-outline mb-1">Select Product</label>
                <select class="form-select text-body-md" name="product_id" required>
                  <option value="" disabled selected hidden></option>
                  <option value="1">Nike Air Zoom Alpha</option>
                  <option value="2">Chelsea Heritage Boot</option>
                </select>
              </div>

              <!-- Quantity -->
              <div>
                <label class="d-block text-label-md text-outline mb-1">Quantity</label>
                <input type="number" name="quantity" value="1" class="form-control text-body-md" min="1" required />
              </div>

              <!-- Date (Tambahan Baru) -->
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
                  <tr>
                    <td class="px-4 py-3">
                      <div class="d-flex align-items-center gap-3">
                        <div class="rounded-3 overflow-hidden flex-shrink-0 bg-surface-container"
                          style="width:40px;height:40px;">
                          <img
                            src="https://lh3.googleusercontent.com/aida-public/AB6AXuBVZZiG0s0lCy7EErkVjzP6VYg2zjrIVEvLOhMntM_ClztqOW1mt0JhndAkRnhtFMghJWdl-HkMrIPdpurh9RUKjVIX4iQU-6oPJLABj1xuAJZI1I9S8l33LdT65htfeDNXH7IgyqC-7gZDkXiRCI9fXh7VZLKv5VXa6DMBFHlFl6rAICE6FxGOwhjEPbmIHgY9VLZuIzIKyH6eOnRQyFG6qLd1wc4uq5s4cViDFi0SizuIKpGOBJY1CcrcBX0zuyBFbVXnyp8u1w"
                            class="w-100 h-100 object-fit-cover" alt="Nike Air Zoom" />
                        </div>
                        <span class="fw-semibold text-on-surface text-body-md">Nike Air Zoom Alpha...</span>
                      </div>
                    </td>
                    <td class="px-4 py-3">
                      <span class="badge-stock-in d-inline-flex align-items-center gap-1">
                        <span class="material-symbols-outlined" style="font-size:13px;">south_west</span>STOCK IN
                      </span>
                    </td>
                    <td class="px-4 py-3 font-data-mono text-on-surface">+120</td>
                    <td class="px-4 py-3 text-body-md text-outline">Oct 24, 09:14 AM</td>
                  </tr>
                </tbody>
              </table>
            </div>

            <div class="p-4 d-flex justify-content-end bg-white border-top border-light-subtle">
              <nav class="d-flex gap-1">
                <button class="btn btn-light btn-sm border px-2 py-1"><i class="ti ti-chevron-left"></i></button>
                <button class="btn btn-primary btn-sm px-3 py-1"
                  style="background-color: var(--color-primary); border: none;">1</button>
                <button class="btn btn-light btn-sm border px-3 py-1">2</button>
                <button class="btn btn-light btn-sm border px-2 py-1"><i class="ti ti-chevron-right"></i></button>
              </nav>
            </div>

          </div>
        </div>
      </div>
    </div>
  </main>


  <div class="modal fade" id="modalTambahUser" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" style="max-width: 520px;">
      <div class="modal-content border-0 shadow" style="border-radius: 14px;">
        <div class="modal-header border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-start">
          <div>
            <h5 class="modal-title fw-bold h4 mb-1" style="color: #0b1c30;">Tambah User</h5>
            <p class="text-muted small m-0">Daftarkan personel baru ke dalam sistem.</p>
          </div>
          <button type="button" class="btn-close shadow-none m-0" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST">
          @csrf
          <div class="modal-body px-4 py-2">
            <div class="mb-3">
              <label class="form-label text-on-surface-var small fw-semibold mb-1">Full Name</label>
              <div class="input-group align-items-center position-relative">
                <span class="position-absolute ps-3 text-muted z-3"><i class="ti ti-user fs-5"></i></span>
                <input type="text" name="name" class="form-control" placeholder="Masukkan nama lengkap"
                  style="padding-left: 42px; font-size: 14px;" required>
              </div>
            </div>
            <div class="row g-3 mb-3">
              <div class="col-7">
                <label class="form-label text-on-surface-var small fw-semibold mb-1">Email Address</label>
                <div class="input-group align-items-center position-relative">
                  <span class="position-absolute ps-3 text-muted z-3"><i class="ti ti-mail fs-5"></i></span>
                  <input type="email" name="email" class="form-control" placeholder="contoh@mail.com"
                    style="padding-left: 42px; font-size: 14px;" required>
                </div>
              </div>
              <div class="col-5">
                <label class="form-label text-on-surface-var small fw-semibold mb-1">Role</label>
                <div class="input-group align-items-center position-relative">
                  <span class="position-absolute ps-3 text-muted z-3"><i class="ti ti-id fs-5"></i></span>
                  <select name="role" class="form-select" style="padding-left: 42px; font-size: 14px;" required>
                    <option value="" disabled selected>Pilih Peran</option>
                    <option value="admin">Admin</option>
                    <option value="warehouse">Warehouse</option>
                  </select>
                </div>
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label text-on-surface-var small fw-semibold mb-1">Password</label>
              <div class="input-group align-items-center position-relative">
                <span class="position-absolute ps-3 text-muted z-3"><i class="ti ti-lock fs-5"></i></span>
                <input type="password" name="password" class="form-control" placeholder="Minimal 8 karakter"
                  style="padding-left: 42px; padding-right: 40px; font-size: 14px;" required>
                <span class="position-absolute end-0 pe-3 text-muted z-3" style="cursor: pointer;"><i
                    class="ti ti-eye fs-5"></i></span>
              </div>
            </div>
            <div class="form-check d-flex gap-2 align-items-center mb-2 mt-3">
              <input class="form-check-input mt-0 shadow-none" type="checkbox" id="sendActivation" name="send_activation">
              <label class="form-check-label text-on-surface-var small" for="sendActivation">Kirim email aktivasi ke user
                ini segera setelah disimpan.</label>
            </div>
          </div>
          <div class="modal-footer border-0 px-4 pb-4 pt-3 d-flex justify-content-end align-items-center gap-2">
            <button type="button" class="btn btn-link text-decoration-none text-muted p-0 me-3 fw-medium"
              data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn text-white fw-semibold px-4"
              style="background-color: var(--color-primary); border-radius: 8px;">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalTambahProduk" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 750px;">
      <div class="modal-content border-0 shadow" style="border-radius: 14px;">
        <div class="modal-header border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-start">
          <h5 class="modal-title fw-bold h4" style="color: #0b1c30;">Tambah Produk Baru</h5>
          <button type="button" class="btn-close shadow-none m-0" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body px-4 py-3">
            <div class="row g-4">
              <div class="col-12 col-md-5">
                <label class="form-label text-muted small fw-bold mb-1">Product Image</label>
                <div class="upload-zone">
                  <i class="ti ti-cloud-upload fs-1 text-primary-brand mb-2"></i>
                  <p class="m-0 text-center small text-dark fw-medium">Drag and drop image here or <span
                      class="text-primary-brand fw-bold">Browse</span></p>
                  <p class="text-muted" style="font-size: 10px; margin-top: 4px;">JPG, PNG, WEBP (MAX 2MB)</p>
                  <input type="file" name="product_image" class="d-none" id="productImageFile">
                </div>
              </div>
              <div class="col-12 col-md-7 d-flex flex-column gap-3">
                <div>
                  <label class="form-label text-muted small fw-bold mb-1">Product Name</label>
                  <input type="text" name="product_name" class="form-control" placeholder="Enter product name..."
                    style="font-size: 14px;" required>
                </div>
                <div>
                  <label class="form-label text-muted small fw-bold mb-1">Harga Jual</label>
                  <input type="text" name="price" class="form-control" placeholder="e.g. Step Point Premium"
                    style="font-size: 14px;" required>
                </div>
                <div class="p-3 rounded-3" style="background-color: #f1f5ff;">
                  <div class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-label-md text-primary-brand tracking-wide">AVAILABLE SIZES</span>
                    <button type="button" class="btn p-0 text-primary-brand small fw-bold border-0 bg-transparent"
                      style="font-size: 13px;">+ Add Variant</button>
                  </div>
                  <div class="d-flex flex-wrap gap-2">
                    <button type="button"
                      class="btn btn-sm text-white rounded-circle d-flex align-items-center justify-content-center"
                      style="width: 32px; height: 32px; background-color: var(--color-primary); font-size:12px;">40</button>
                    <button type="button"
                      class="btn btn-sm text-white rounded-circle d-flex align-items-center justify-content-center"
                      style="width: 32px; height: 32px; background-color: var(--color-primary); font-size:12px;">41</button>
                    <button type="button"
                      class="btn btn-sm text-white rounded-circle d-flex align-items-center justify-content-center"
                      style="width: 32px; height: 32px; background-color: var(--color-primary); font-size:12px;">42</button>
                    <button type="button"
                      class="btn btn-sm btn-light border rounded-circle d-flex align-items-center justify-content-center bg-white text-dark"
                      style="width: 32px; height: 32px; font-size:12px;">43</button>
                    <button type="button"
                      class="btn btn-sm btn-light border rounded-circle d-flex align-items-center justify-content-center bg-white text-dark"
                      style="width: 32px; height: 32px; font-size:12px;">44</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 px-4 pb-4 pt-3 d-flex justify-content-between align-items-center">
            <span class="text-muted small d-flex align-items-center gap-1"><i class="ti ti-info-circle"></i> Changes are
              saved locally as drafts</span>
            <div class="d-flex gap-2">
              <button type="button" class="btn btn-link text-decoration-none text-muted fw-medium"
                data-bs-dismiss="modal">Batal</button>
              <button type="submit" class="btn text-white fw-semibold px-4"
                style="background-color: var(--color-primary); border-radius: 8px;">Simpan Produk</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


  <div class="modal fade" id="modalTambahKategori" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 680px;">
      <div class="modal-content border-0 shadow" style="border-radius: 14px;">
        <div class="modal-header border-0 pt-4 px-4 pb-1 d-flex align-items-start gap-3">
          <div class="p-2 rounded bg-light d-flex align-items-center justify-content-center"
            style="width: 44px; height: 44px;">
            <i class="ti ti-category fs-4 text-primary-brand"></i>
          </div>
          <div class="flex-grow-1">
            <h5 class="modal-title fw-bold h4 mb-1" style="color: #0b1c30;">Tambah Kategori</h5>
            <p class="text-muted small m-0">Buat pengelompokan produk baru untuk inventaris Anda.</p>
          </div>
          <button type="button" class="btn-close shadow-none m-0" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="#" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="modal-body px-4 py-3">
            <div class="row g-4">
              <div class="col-12 col-md-4">
                <label class="form-label text-muted small fw-bold mb-2 tracking-wide">IKON KATEGORI</label>
                <div class="upload-zone" style="height: 154px;">
                  <i class="ti ti-photo-plus fs-3 text-muted mb-2"></i>
                  <p class="m-0 text-center text-muted" style="font-size: 12px;">Unggah Foto atau Ikon</p>
                </div>
                <p class="text-muted mt-2 mb-0" style="font-size: 11px;">JPG, PNG atau SVG. Maks 2MB.</p>
              </div>
              <div class="col-12 col-md-8 d-flex flex-column gap-3">
                <div>
                  <label class="form-label text-muted small fw-bold mb-1 tracking-wide">NAMA KATEGORI</label>
                  <input type="text" name="category_name" class="form-control" placeholder="Contoh: Sepatu Lari Pria"
                    style="font-size: 14px;" required>
                </div>
                <div>
                  <label class="form-label text-muted small fw-bold mb-1 tracking-wide">DESKRIPSI (OPSIONAL)</label>
                  <textarea name="description" class="form-control" rows="3"
                    placeholder="Jelaskan detail kategori ini untuk mempermudah pencarian..."
                    style="font-size: 14px; height: auto;"></textarea>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer border-0 px-4 pb-4 pt-2 d-flex justify-content-end align-items-center gap-2">
            <button type="button" class="btn btn-link text-decoration-none text-muted fw-medium"
              data-bs-dismiss="modal">Batal</button>
            <button type="submit" class="btn text-white fw-semibold px-5"
              style="background-color: var(--color-primary); border-radius: 8px;">Tambah</button>
          </div>
        </form>
      </div>
    </div>
  </div>

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