@extends('layout.app')
@section('content')

  <style>
    .table-img-container {
      width: 60px !important;
      height: 60px !important;
    }

    .table-img {
      width: 100%;
      height: 100%;
      object-fit: cover;
    }
  </style>

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

          <form action="{{ route('product.store') }}" method="POST" id="addProductForm" enctype="multipart/form-data">
            @csrf
            <div class="modal-body px-4 py-3">
              <div class="row g-4">

                <div class="col-12 col-md-5">
                  <label class="font-label-md text-on-surface-variant text-uppercase mb-2 d-block">Product Image</label>
                  <div
                    class="dropzone-area rounded-xl d-flex flex-column align-items-center justify-content-center p-4 text-center border-dashed-custom position-relative bg-background h-100 min-h-280">
                    <input type="file" name="product_image" id="productImageInput"
                      class="position-absolute w-100 h-100 top-0 start-0 opacity-0 cursor-pointer"
                      accept="image/jpeg,image/png,image/webp" required>
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
                    <input type="number" id="productPrice" name="price"
                      class="form-control rounded-lg border-outline-variant text-body-md px-3 py-2"
                      placeholder="e.g. 150000" required>
                  </div>

                  <div>
                    <label for="productCategory"
                      class="font-label-md text-on-surface-variant text-uppercase mb-1 d-block">Category</label>
                    <select id="productCategory" name="category_id"
                      class="form-select rounded-lg border-outline-variant text-body-md px-3 py-2" required>
                      <option value="" disabled selected>Pilih Kategori...</option>
                      @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

              </div>
            </div>

            <div class="modal-footer border-0 px-4 pb-4 pt-2 d-flex justify-content-between align-items-center">
              <div class="d-flex align-items-center gap-2 text-outline text-xs">
                <i class="ti ti-info-circle fs-6"></i>
                <span>Stock otomatis diatur ke 0 saat disimpan</span>
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

    {{-- Filter Section --}}
    <div
      class="bg-surface-container-lowest rounded-xl p-3 border border-outline-variant d-flex flex-wrap gap-3 align-items-center mb-stack-md">
      <div class="flex-grow-1 min-w-240 relative position-relative">
        <input class="form-control form-control-custom bg-background border-outline-variant rounded-lg text-body-md"
          placeholder="Search by SKU or Name..." type="text" />
      </div>
      <div class="d-flex align-items-center gap-2">
        <span class="text-label-md text-outline whitespace-nowrap">Category:</span>
        <select
          class="form-select form-select-custom bg-background border-outline-variant rounded-lg text-body-md px-3 pe-5">
          @foreach($categories as $category)
            <option>{{ $category->name }}</option>
          @endforeach
        </select>
      </div>
    </div>

    {{-- Table Data --}}
    <div class="bg-surface-container-lowest rounded-xl border border-outline-variant overflow-hidden custom-shadow-l1">
      <div class="table-responsive">
        <table class="table table-custom align-middle text-start mb-0">
          <thead class="bg-surface-container-low border-bottom border-outline-variant">
            <tr>
              <th class="px-4 py-3 font-label-md text-on-surface-variant text-uppercase tracking-wider border-0"
                style="width: 90px;">Image</th>
              <th class="px-4 py-3 font-label-md text-on-surface-variant text-uppercase tracking-wider border-0">Product
                Details</th>
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
            @forelse ($products as $item)
              <tr class="table-row-group">
                {{-- 1. Kolom Image Terpisah --}}
                <td class="px-4 py-3 border-bottom border-outline-variant">
                  <div
                    class="rounded-lg bg-surface-container-high overflow-hidden border border-outline-variant flex-shrink-0 table-img-container">
                    <img alt="{{ $item->name }}" class="table-img" src="{{ asset($item->img) }}" />
                  </div>
                </td>

                {{-- Kolom Info Nama & ID Produk --}}
                <td class="px-4 py-3 border-bottom border-outline-variant">
                  <div>
                    <p class="fw-semibold text-on-surface mb-0">{{ $item->name }}</p>
                  </div>
                </td>

                <td class="px-4 py-3 border-bottom border-outline-variant">
                  <span class="badge badge-custom bg-primary-light text-primary rounded-pill fw-semibold">
                    {{ $item->category ? $item->category->name : 'Kategori ID ' . $item->category_id . ' Tidak Ada' }}
                  </span>           </td>
                <td class="px-4 py-3 border-bottom border-outline-variant">
                  <div class="d-flex flex-column align-items-center gap-1">
                    <div class="progress progress-custom bg-surface-container-high rounded-pill overflow-hidden">
                      <div class="progress-bar {{ $item->stock == 0 ? 'bg-danger' : 'bg-secondary' }}"
                        style="width: {{ $item->stock == 0 ? '10%' : '100%' }}"></div>
                    </div>
                    <span class="font-data-mono text-xs text-on-secondary-container">{{ $item->stock }}</span>
                  </div>
                </td>
                <td class="px-4 py-3 fw-semibold text-on-surface border-bottom border-outline-variant">
                  Rp {{ number_format($item->harga, 0, ',', '.') }}
                </td>
                <td class="px-4 py-3 text-end border-bottom border-outline-variant">
                  <div class="action-buttons d-flex justify-content-end gap-1">
                    {{-- Edit Trigger Button --}}
                    <button class="btn btn-action text-primary p-2 border-0" title="Edit Product" data-bs-toggle="modal"
                      data-bs-target="#modalEditProduct{{ $item->id }}">
                      <i class="ti ti-pencil"></i>
                    </button>

                    {{-- 3. Tombol Trigger Modal Hapus (Pengganti Confirm) --}}
                    <button type="button" class="btn btn-action text-error p-2 border-0" title="Delete Product"
                      data-bs-toggle="modal" data-bs-target="#modalDeleteProduct{{ $item->id }}">
                      <i class="ti ti-trash"></i>
                    </button>
                  </div>
                </td>
              </tr>

              {{-- Modal Edit --}}
              <div class="modal fade" id="modalEditProduct{{ $item->id }}" data-bs-backdrop="static"
                data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 800px;">
                  <div class="modal-content border-0 rounded-xl shadow-lg overflow-hidden bg-surface-container-lowest">
                    <div
                      class="modal-header border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-start bg-gradient-header">
                      <h5 class="modal-title text-headline-md text-primary mb-1">Edit Produk</h5>
                      <button type="button" class="btn-close shadow-none m-0 p-2" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                    </div>
                    <form action="{{ route('product.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="modal-body px-4 py-3">
                        <div class="row g-4">
                          <div class="col-12 col-md-5">
                            <label class="font-label-md text-on-surface-variant text-uppercase mb-2 d-block">Product
                              Image</label>
                            <div
                              class="dropzone-area rounded-xl d-flex flex-column align-items-center justify-content-center p-4 text-center border-dashed-custom position-relative bg-background h-100 min-h-280">
                              <input type="file" name="product_image"
                                class="edit-image-input position-absolute w-100 h-100 top-0 start-0 opacity-0 cursor-pointer"
                                accept="image/jpeg,image/png,image/webp">
                              <div
                                class="dropzone-preview position-absolute w-100 h-100 top-0 start-0 p-2 bg-background rounded-xl">
                                <img src="{{ asset($item->img) }}" alt="Preview"
                                  class="w-100 h-100 object-contain rounded-lg">
                              </div>
                            </div>
                          </div>
                          <div class="col-12 col-md-7 d-flex flex-column gap-3">
                            <div>
                              <label class="font-label-md text-on-surface-variant text-uppercase mb-1 d-block">Product
                                Name</label>
                              <input type="text" name="name" value="{{ $item->name }}"
                                class="form-control rounded-lg border-outline-variant text-body-md px-3 py-2" required>
                            </div>
                            <div>
                              <label class="font-label-md text-on-surface-variant text-uppercase mb-1 d-block">Harga
                                Jual</label>
                              <input type="number" name="price" value="{{ $item->harga }}"
                                class="form-control rounded-lg border-outline-variant text-body-md px-3 py-2" required>
                            </div>
                            <div>
                              <label
                                class="font-label-md text-on-surface-variant text-uppercase mb-1 d-block">Category</label>
                              <select name="category_id"
                                class="form-select rounded-lg border-outline-variant text-body-md px-3 py-2" required>
                                @foreach ($categories as $category)
                                  <option value="{{ $category->id }}" {{ $item->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                @endforeach
                              </select>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="modal-footer border-0 px-4 pb-4 pt-2 d-flex justify-content-end align-items-center gap-2">
                        <button type="button" class="btn text-primary fw-medium px-4 text-body-md rounded-lg"
                          data-bs-dismiss="modal" style="background: none;">Batal</button>
                        <button type="submit"
                          class="btn btn-primary-container fw-semibold px-4 py-2 text-body-md rounded-lg border-0 shadow-sm">Perbarui
                          Produk</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>

              {{-- 3. Modal Konfirmasi Hapus Data --}}
              <div class="modal fade" id="modalDeleteProduct{{ $item->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-sm" style="max-width: 400px;">
                  <div class="modal-content border-0 rounded-xl shadow-lg bg-surface-container-lowest">
                    <div class="modal-body p-4 text-center">
                      <div class="text-danger mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-circle" width="48"
                          height="48" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                          stroke-linecap="round" stroke-linejoin="round">
                          <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                          <path d="M3 12a9 9 0 1 0 18 0a9 9 0 1 0 -18 0" />
                          <path d="M12 8v4" />
                          <path d="M12 16h.01" />
                        </svg>
                      </div>
                      <h5 class="fw-bold text-on-surface mb-2">Hapus Produk?</h5>
                      <p class="text-on-surface-variant text-sm mb-4">Apakah kamu yakin ingin menghapus produk
                        <strong>"{{ $item->name }}"</strong>? Tindakan ini tidak dapat dibatalkan.
                      </p>
                      <div class="d-flex justify-content-center gap-2">
                        <button type="button" class="btn text-secondary fw-medium px-4 rounded-lg border-0"
                          data-bs-dismiss="modal" style="background:none;">Batal</button>
                        <form action="{{ route('product.destroy', $item->id) }}" method="POST">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger fw-semibold px-4 rounded-lg border-0 shadow-sm">Ya,
                            Hapus</button>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

            @empty
              <tr>
                <td colspan="6" class="text-center py-4 text-outline">Tidak ada data produk tersedia.</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
  </main>

  {{-- 2. Tempat Penempatan Alert Pop-Up (Toast) di dalam Layout Content --}}
  <div class="alert-PopUp">
    @if(session('store'))
      <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
        <div class="toast show custom-toast border-0 text-white bg-success">
          <div class="d-flex align-items-center">
            <div class="toast-body d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-circle-check me-2" width="20"
                height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
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

    @if(session('update'))
      <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
        <div class="toast show custom-toast border-0 text-white bg-primary">
          <div class="d-flex align-items-center">
            <div class="toast-body d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil me-2" width="20"
                height="20" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 20h4l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4" />
                <path d="M13.5 6.5l4 4" />
              </svg>
              {{ session('update') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      </div>
    @endif

    @if(session('delete'))
      <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
        <div class="toast show custom-toast border-0 text-white bg-danger">
          <div class="d-flex align-items-center">
            <div class="toast-body d-flex align-items-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash me-2" width="20" height="20"
                viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M4 7l16 0" />
                <path d="M10 11l0 6" />
                <path d="M14 11l0 6" />
                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
              </svg>
              {{ session('delete') }}
            </div>
            <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
          </div>
        </div>
      </div>
    @endif
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      // Preview Gambar Modal Add
      const fileInput = document.getElementById('productImageInput');
      const previewContainer = document.querySelector('.dropzone-preview');
      const previewImg = previewContainer ? previewContainer.querySelector('img') : null;

      if (fileInput && previewContainer) {
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

      // Preview Gambar Modal Edit secara Real-Time
      const editInputs = document.querySelectorAll('.edit-image-input');
      editInputs.forEach(input => {
        input.addEventListener('change', function (e) {
          const file = e.target.files[0];
          if (file) {
            const imgPreview = this.closest('.dropzone-area').querySelector('.dropzone-preview img');
            const reader = new FileReader();
            reader.onload = function (event) {
              imgPreview.src = event.target.result;
            }
            reader.readAsDataURL(file);
          }
        });
      });
    });
  </script>
@endsection