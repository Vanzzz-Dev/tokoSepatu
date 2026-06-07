@extends('layout.app')
@section('content')
    <div class="container-fluid p-4">
        <div class="mb-4 d-flex flex-column flex-md-row align-items-md-end justify-content-between mb-stack-lg gap-3">
            <div>
                <h2 class="h2 text-dark fw-bold mb-1" style="font-family: 'Hanken Grotesk', sans-serif;">Admin Management
                </h2>
                <p class="text-muted m-0" style="font-family: 'Inter', sans-serif;">Monitor, track, and manage administrator
                    accounts and their access permissions.</p>
            </div>
            <button class="btn btn-primary-container d-inline-flex align-items-center gap-2 px-4 h-11 fw-semibold border-0"
                data-bs-toggle="modal" data-bs-target="#modalAddUser">
                <span class="fs-5">+</span>
                Add User
            </button>
        </div>

        {{-- Modal Add User --}}
        <div class="modal fade" id="modalAddUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalAddUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 550px;">
                <div class="modal-content border-0 rounded-4 shadow-lg overflow-hidden bg-white">

                    <div class="modal-header border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="modal-title fw-bold text-dark h4 mb-1" id="modalAddUserLabel"
                                style="font-family: 'Inter', sans-serif;">Tambah User</h5>
                            <p class="text-muted small m-0">Daftarkan personel baru ke dalam sistem.</p>
                        </div>
                        <button type="button" class="btn-close shadow-none m-0 p-2" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form action="#" method="POST" id="addUserForm">
                        @csrf
                        <div class="modal-body px-4 py-3">

                            <div class="mb-3">
                                <label for="fullName" class="form-label fw-medium text-dark small mb-1">Full Name</label>
                                <div class="input-group align-items-center position-relative">
                                    <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                            class="ti ti-user fs-5"></i></span>
                                    <input type="text" id="fullName" name="name"
                                        class="form-control rounded-3 py-2-5 border-light-subtle bg-light bg-opacity-25"
                                        placeholder="Masukkan nama lengkap" style="padding-left: 42px; font-size: 14px;"
                                        required>
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12 col-sm-6">
                                    <label for="emailAddress" class="form-label fw-medium text-dark small mb-1">Email
                                        Address</label>
                                    <div class="input-group align-items-center position-relative">
                                        <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                class="ti ti-mail fs-5"></i></span>
                                        <input type="email" id="emailAddress" name="email"
                                            class="form-control rounded-3 py-2-5 border-light-subtle bg-light bg-opacity-25"
                                            placeholder="contoh@mail.com" style="padding-left: 42px; font-size: 14px;"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="userRole" class="form-label fw-medium text-dark small mb-1">Role</label>
                                    <div class="input-group align-items-center position-relative">
                                        <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                class="ti ti-id fs-5"></i></span>
                                        <select id="userRole" name="role"
                                            class="form-select rounded-3 py-2-5 border-light-subtle bg-light bg-opacity-25"
                                            style="padding-left: 42px; font-size: 14px;" required>
                                            <option value="" disabled selected>Pilih Peran</option>
                                            <option value="Super Admin">Super Admin</option>
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="userPassword" class="form-label fw-medium text-dark small mb-1">Password</label>
                                <div class="input-group align-items-center position-relative">
                                    <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                            class="ti ti-lock fs-5"></i></span>
                                    <input type="password" id="userPassword" name="password"
                                        class="form-control rounded-3 py-2-5 border-light-subtle bg-light bg-opacity-25"
                                        placeholder="Minimal 8 karakter" minlength="8"
                                        style="padding-left: 42px; padding-right: 42px; font-size: 14px;" required>
                                    <button type="button"
                                        class="position-absolute end-0 border-0 bg-transparent pe-3 text-muted z-3 h-100 d-flex align-items-center shadow-none"
                                        id="togglePasswordBtn">
                                        <i class="ti ti-eye fs-5" id="togglePasswordIcon"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div
                            class="modal-footer border-top border-light-subtle px-4 py-3 d-flex justify-content-end align-items-center gap-2">
                            <button type="button" class="btn btn-light fw-medium border-0 px-4 rounded-3 text-secondary"
                                data-bs-dismiss="modal" style="font-size: 14px;">Batal</button>
                            <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3"
                                style="font-size: 14px; background-color: #0d3ba1; border: none;">Simpan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>


        <div class="table-responsive">
            <table class="table align-middle mb-0 text-start table-hover">
                <thead class="table-light text-muted small fw-semibold">
                    <tr>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Admin Name</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Phone Number</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Role</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    <tr>
                        <td class="px-4 py-3">
                            <div class="d-flex align-items-center gap-3">
                                <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary fw-bold small"
                                    style="width: 36px; height: 36px;">MA</div>
                                <div>
                                    <p class="fw-semibold m-0" style="font-size: 14px;">Main Admin</p>
                                    <p class="text-muted small m-0" style="font-size: 12px;">main.admin@email.com</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-3">
                            <span class="text-dark text-opacity-75"
                                style="font-family: 'JetBrains Mono', monospace; font-size: 13px;">+62 812-3456-7890</span>
                        </td>
                        <td class="px-4 py-3">
                            <span class="badge bg-success bg-opacity-10 text-success fw-semibold">Super Admin</span>
                        </td>
                        <td class="px-4 py-3 text-end">
                            <div class="d-flex justify-content-end gap-1">
                                <button class="btn btn-light btn-sm border-0 text-primary p-2 d-flex align-items-center"
                                    title="Edit">
                                    <i class="ti ti-pencil"></i>
                                </button>
                                <button class="btn btn-light btn-sm border-0 text-danger p-2 d-flex align-items-center"
                                    title="Delete">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="pagination-container mt-4">
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

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const passwordInput = document.getElementById('userPassword');
            const togglePasswordBtn = document.getElementById('togglePasswordBtn');
            const togglePasswordIcon = document.getElementById('togglePasswordIcon');

            if (togglePasswordBtn) {
                togglePasswordBtn.addEventListener('click', function () {
                    const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                    passwordInput.setAttribute('type', type);

                    // Ganti icon class Tabler-Icons nya
                    if (type === 'password') {
                        togglePasswordIcon.className = 'ti ti-eye fs-5';
                    } else {
                        togglePasswordIcon.className = 'ti ti-eye-off fs-5';
                    }
                });
            }
        });
    </script>
@endsection