@extends('layout.app')
@section('content')
  <style>
    /* Custom Palette Variables & Typography mapping */
    :root {
      --primary: #002b85;
      --primary-container: #093fb4;
      --on-primary: #ffffff;
      --secondary: #9c4400;
      --secondary-container: #fe8438;
      --tertiary: #641a00;
      --on-secondary-container: #652a00;
      --on-surface-variant: #434653;
      --on-surface: #0b1c30;
      --background: #f8f9ff;
      --outline-variant: #c4c5d6;
      --surface-container-lowest: #ffffff;
      --surface-container: #e5eeff;

      --font-headline: 'Hanken Grotesk', sans-serif;
      --font-body: 'Inter', sans-serif;
      --font-mono: 'JetBrains Mono', monospace;
    }

    body {
      background-color: var(--background);
      font-family: var(--font-body);
      color: var(--on-surface);
      font-size: 14px;
      line-height: 20px;
    }

    /* Headline Styles */
    .headline-xl {
      font-family: var(--font-headline);
      font-size: 32px;
      line-height: 40px;
      letter-spacing: -0.02em;
      font-weight: 700;
    }

    .headline-md {
      font-family: var(--font-headline);
      font-size: 20px;
      line-height: 28px;
      font-weight: 600;
    }

    /* Custom Utilities */
    .text-on-surface-variant {
      color: var(--on-surface-variant);
    }

    .text-primary-custom {
      color: var(--primary);
    }

    .text-secondary-custom {
      color: var(--secondary);
    }

    .text-tertiary-custom {
      color: var(--tertiary);
    }

    .text-sandal-custom {
      color: var(--on-secondary-container);
    }

    .bg-primary-container {
      background-color: var(--primary-container);
      color: var(--on-primary);
    }

    .bg-surface-lowest {
      background-color: var(--surface-container-lowest);
    }

    .bg-surface-container {
      background-color: var(--surface-container);
    }

    .font-data-mono {
      font-family: var(--font-mono);
      font-size: 13px;
      font-weight: 500;
    }

    .material-symbols-outlined {
      font-variation-settings: "FILL" 0, "wght" 300, "GRAD" 0, "opsz" 24;
      display: inline-block;
      vertical-align: middle;
    }

    .shadow-level-1 {
      box-shadow: 0 4px 20px rgba(9, 63, 180, 0.04);
    }

    /* Hover Effects & Transitions */
    .category-card {
      border: 1px solid var(--outline-variant);
      transition: all 0.2s ease-in-out;
    }

    .category-card:hover {
      border-color: rgba(0, 43, 133, 0.3);
    }

    .icon-box {
      width: 48px;
      height: 48px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    /* Action Buttons inside Card */
    .btn-action-card {
      padding: 6px;
      color: var(--on-surface-variant);
      border: none;
      background: transparent;
      border-radius: 8px;
      transition: background-color 0.15s, color 0.15s;
    }

    .btn-action-card:hover {
      background-color: rgba(0, 43, 133, 0.05);
      color: var(--primary);
    }

    .btn-action-card.delete-btn:hover {
      background-color: rgba(186, 26, 26, 0.05);
      color: #ba1a1a;
    }

    /* MODAL TAMBAHAN STYLE (Sesuai Mockup Gambar Kategori) */
    .modal-rounded {
      border-radius: 16px;
    }

    .text-label-caps {
      font-size: 11px;
      font-weight: 700;
      letter-spacing: 0.05em;
      text-transform: uppercase;
      color: #5c6070;
    }

    .border-dashed-custom {
      border: 2px dashed var(--outline-variant);
      transition: border-color 0.2s ease;
      background-color: #fcfdff;
    }

    .dropzone-box:hover {
      border-color: var(--primary);
    }

    .cursor-pointer {
      cursor: pointer;
    }

    .object-contain {
      object-fit: contain;
    }

    .form-control-modal,
    .form-textarea-modal {
      border: 1px solid var(--outline-variant);
      border-radius: 8px;
      padding: 10px 14px;
      font-size: 14px;
      background-color: #ffffff;
    }

    .form-control-modal:focus,
    .form-textarea-modal:focus {
      border-color: var(--primary);
      box-shadow: 0 0 0 2px rgba(9, 63, 180, 0.15);
      outline: none;
    }
  </style>
  </head>

  <body>

    <main class="container p-3">
      <div class="container">

        {{-- Modal Add Category --}}
        <div class="modal fade" id="modalAddCategory" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
          aria-labelledby="modalAddCategoryLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg" style="max-width: 650px;">
            <div class="modal-content border-0 modal-rounded shadow-lg overflow-hidden bg-surface-lowest">

              <div class="modal-header border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-start">
                <div class="d-flex align-items-center gap-3">
                  <div class="icon-box bg-surface-container text-primary-custom">
                    <i class="ti ti-apps fs-4"></i>
                  </div>
                  <div>
                    <h5 class="modal-title headline-md text-on-surface mb-0" id="modalAddCategoryLabel">Tambah Kategori
                    </h5>
                    <p class="text-on-surface-variant small mb-0" style="font-size: 12px;">Buat pengelompokan produk baru
                      untuk inventaris Anda</p>
                  </div>
                </div>
                <button type="button" class="btn-close shadow-none m-0 p-2" data-bs-dismiss="modal"
                  aria-label="Close"></button>
              </div>

              <form action="#" method="POST" id="addCategoryForm" enctype="multipart/form-data">
                @csrf
                <div class="modal-body px-4 py-3">
                  <div class="row g-4">

                    <div class="col-12 col-md-5 d-flex flex-column">
                      <label class="text-label-caps mb-2">Ikon Kategori</label>
                      <div
                        class="dropzone-box border-dashed-custom rounded-3 d-flex flex-column align-items-center justify-content-center p-3 text-center position-relative flex-grow-1"
                        style="min-height: 180px;">
                        <input type="file" name="category_icon" id="categoryIconInput"
                          class="position-absolute w-100 h-100 top-0 start-0 opacity-0 cursor-pointer"
                          accept="image/jpeg,image/png,image/svg+xml">

                        <div
                          class="dropzone-preview d-none position-absolute w-100 h-100 top-0 start-0 p-2 bg-white rounded-3">
                          <img src="#" alt="Preview" class="w-100 h-100 object-contain">
                        </div>

                        <div class="dropzone-default-content">
                          <i class="ti ti-photo-plus text-on-surface-variant fs-1 opacity-50 mb-2 d-block"></i>
                          <p class="text-on-surface-variant mb-0" style="font-size: 13px;">Unggah Foto atau Ikon</p>
                        </div>
                      </div>
                      <span class="text-on-surface-variant opacity-75 mt-2" style="font-size: 11px;">JPG, PNG atau SVG.
                        Maks 2MB.</span>
                    </div>

                    <div class="col-12 col-md-7 d-flex flex-column gap-3">
                      <div>
                        <label for="categoryName" class="text-label-caps mb-1 d-block">Nama Kategori</label>
                        <input type="text" id="categoryName" name="name" class="form-control-modal w-100"
                          placeholder="Contoh: Sepatu Lari Pria" required>
                      </div>
                    </div>

                  </div>
                </div>

                <div class="modal-footer border-0 px-4 pb-4 pt-2 d-flex justify-content-end align-items-center gap-2">
                  <button type="button" class="btn text-primary-custom fw-semibold px-4 text-body-md border-0"
                    data-bs-dismiss="modal" style="background: none;">Batal</button>
                  <button type="submit"
                    class="btn bg-primary-container fw-semibold px-4 py-2 text-body-md border-0 shadow-level-1"
                    style="border-radius: 8px; min-width: 100px;">Tambah</button>
                </div>
              </form>

            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between align-items-end mb-4 pb-2">
          <div>
            <h2 class="headline-xl mb-1">Categories</h2>
            <p class="text-on-surface-variant fs-6 mb-0">Manage your shoe inventory classifications and hierarchy.</p>
          </div>
          <button
            class="btn bg-primary-container px-4 py-2 d-inline-flex align-items-center gap-2 fw-semibold border-0 shadow-level-1"
            data-bs-toggle="modal" data-bs-target="#modalAddCategory" style="height: 44px; border-radius: 8px;">
            <i class="ti ti-plus fs-3"></i>
            Add Category
          </button>
        </div>

        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 row-cols-xl-4 g-4">
          @foreach (range(1, 4) as $item)
            <div class="col">
              <div class="card h-100 p-4 rounded-3 bg-surface-lowest shadow-level-1 category-card">
                <div class="d-flex justify-content-between align-items-start mb-4">
                  <div class="icon-box" style="background-color: rgba(0, 43, 133, 0.05); color: var(--primary);">
                    <i class="ti ti-shoe"></i>
                  </div>
                  <div class="d-flex gap-1">
                    <button class="btn-action-card">
                      <i class="ti ti-pencil"></i> </button>
                    <button class="btn-action-card delete-btn">
                      <i class="ti ti-trash"></i> </button>
                  </div>
                </div>
                <div class="mt-auto">
                  <h3 class="headline-md mb-1">Sneakers</h3>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"></script>

    <script>
      // Micro-interactions active state (Mousedown scale effect)
      document.querySelectorAll("button, a, .card-dashed").forEach((elem) => {
        elem.addEventListener("mousedown", () => {
          elem.classList.add("scale-down");
          elem.style.transition = "transform 0.1s";
        });
        const removeScale = () => elem.classList.remove("scale-down");
        elem.addEventListener("mouseup", removeScale);
        elem.addEventListener("mouseleave", removeScale);
      });

      // Logika File Upload Preview Real-time
      document.addEventListener('DOMContentLoaded', function () {
        const fileInput = document.getElementById('categoryIconInput');
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