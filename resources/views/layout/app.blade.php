<!doctype html>
<html lang="en">
<!--begin::Head-->

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Dashboard</title>
  <link rel="shortcut icon" href="{{ asset('Soucre/src/assets/img/Logo.png') }}" type="image/x-icon">
  <!--begin::Accessibility Meta Tags-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <link rel="preload" href="{{ asset('Soucre/dist/css/adminlte.css') }}" as="style" />
  <!--end::Accessibility Features-->
  <!--begin::Third Party Plugin(OverlayScrollbars)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css"
    crossorigin="anonymous" />
  <!--end::Third Party Plugin(OverlayScrollbars)-->
  <!--begin::Third Party Plugin(Bootstrap Icons)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
  <!--end::Third Party Plugin(Bootstrap Icons)-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/dist/tabler-icons.min.css">
  <!--begin::Required Plugin(AdminLTE)-->
  <link rel="stylesheet" href="{{ asset('Soucre/dist/css/adminlte.css') }}" />
  <link rel="stylesheet" href="{{ asset('Soucre/dist/css/main.css') }}" />

  {{-- =================== style css ============= --}}
  <link rel="stylesheet" href="{{ asset('Soucre/dist/css/produk.css') }}">
  <!--end::Required Plugin(AdminLTE)-->
</head>
<!--end::Head-->
<!--begin::Body-->

<body class="layout-fixed sidebar-expand-lg sidebar-mini bg-body-tertiary">
  <div class="app-wrapper">
    @include('layout.navbar')
    @include('layout.sidebar')
    <!--begin::App Main-->
    <main>
      @yield('content')
    </main>
    <!--end::App Main-->

  </div>
  @if(session('store'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
      <div class="toast show custom-toast border-0 text-white bg-success">
        <div class="d-flex align-items-center">
          <div class="toast-body">
            {{ session('store') }}
          </div>

          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast">
          </button>
        </div>
      </div>
    </div>
  @endif
  
  @if(session('update'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
      <div class="toast show custom-toast border-0 text-white bg-primary">
        <div class="d-flex align-items-center">
          <div class="toast-body">
            {{ session('update') }}
          </div>

          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast">
          </button>
        </div>
      </div>
    </div>
  @endif
  
  @if(session('delete'))
    <div class="position-fixed top-0 end-0 p-3" style="z-index:9999">
      <div class="toast show custom-toast border-0 text-white bg-danger">
        <div class="d-flex align-items-center">
          <div class="toast-body">
            {{ session('delete') }}
          </div>

          <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast">
          </button>
        </div>
      </div>
    </div>
  @endif


  <script>
    setTimeout(() => {
      document.querySelectorAll('.toast').forEach(toast => {
        toast.remove();
      });
    }, 3000);

    document.addEventListener('DOMContentLoaded', function () {

        setTimeout(() => {
          document.querySelectorAll('.custom-toast').forEach(toast => {

            toast.classList.add('hide');

            setTimeout(() => {
              toast.remove();
            }, 3000);

          });
        }, 100);
      });
  </script>
  <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"
    crossorigin="anonymous"></script>
  <!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Required Plugin(popperjs for Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    crossorigin="anonymous"></script>
  <!--end::Required Plugin(popperjs for Bootstrap 5)--><!--begin::Required Plugin(Bootstrap 5)-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js" crossorigin="anonymous"></script>
  <!--end::Required Plugin(Bootstrap 5)--><!--begin::Required Plugin(AdminLTE)-->
  <script src="{{ asset('Soucre/dist/js/adminlte.js') }}"></script>
  <!--end::Required Plugin(AdminLTE)--><!--begin::OverlayScrollbars Configure-->
  {{-- ============ script JS ========= --}}
  <script>
    $(document).ready(function () {
      var currentUrl = window.location.protocol + '//' + window.location.host + window.location.pathname;

      if (currentUrl.endsWith('/') && currentUrl !== window.location.protocol + '//' + window.location.host + '/') {
        currentUrl = currentUrl.slice(0, -1);
      }

      $('#navigation .nav-item').each(function () {
        var linkUrl = $(this).find('a').attr('href');

        if (linkUrl && linkUrl.endsWith('/') && linkUrl !== window.location.protocol + '//' + window.location.host + '/') {
          linkUrl = linkUrl.slice(0, -1);
        }
        if (currentUrl === linkUrl) {
          $('#navigation .nav-item').removeClass('current');
          $(this).addClass('current');
        }
      });

      $('#navigation .nav-item').on('click', function () {
        $('#navigation .nav-item').removeClass('current');
        $(this).addClass('current');
      });
    });

    const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
    const Default = {
      scrollbarTheme: 'os-theme-light',
      scrollbarAutoHide: 'leave',
      scrollbarClickScroll: true,
    };
    document.addEventListener('DOMContentLoaded', function () {
      const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);
      if (sidebarWrapper && OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined) {
        OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
          scrollbars: {
            theme: Default.scrollbarTheme,
            autoHide: Default.scrollbarAutoHide,
            clickScroll: Default.scrollbarClickScroll,
          },
        });
      }
    });
  </script>
  <!--end::OverlayScrollbars Configure-->
  <!--end::Script-->
</body>
<!--end::Body-->

</html>