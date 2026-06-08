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

                    <form action="{{ route('users.store') }}" method="POST" id="addUserForm">
                        @csrf
                        <div class="modal-body px-4 py-3">
                            {{-- Full Name --}}
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

                            {{-- Email Address --}}
                            <div class="mb-3">
                                <label for="emailAddress" class="form-label fw-medium text-dark small mb-1">Email
                                    Address</label>
                                <div class="input-group align-items-center position-relative">
                                    <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                            class="ti ti-mail fs-5"></i></span>
                                    <input type="email" id="emailAddress" name="email"
                                        class="form-control rounded-3 py-2-5 border-light-subtle bg-light bg-opacity-25"
                                        placeholder="contoh@mail.com" style="padding-left: 42px; font-size: 14px;" required>
                                </div>
                            </div>

                            {{-- Role & Password (Sejajar) --}}
                            <div class="row g-3 mb-4">
                                <div class="col-12 col-sm-6">
                                    <label for="userRole" class="form-label fw-medium text-dark small mb-1">Role</label>
                                    <div class="input-group align-items-center position-relative">
                                        <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                class="ti ti-id fs-5"></i></span>
                                        <select id="userRole" name="role"
                                            class="form-select rounded-3 py-2-5 border-light-subtle bg-light bg-opacity-25"
                                            style="padding-left: 42px; font-size: 14px;" required>
                                            <option value="" disabled selected>Pilih Peran</option>
                                            <option value="admin">Admin</option>
                                            <option value="kasir">Kasir</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="userPassword"
                                        class="form-label fw-medium text-dark small mb-1">Password</label>
                                    <div class="input-group align-items-center position-relative">
                                        <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                class="ti ti-lock fs-5"></i></span>
                                        <input type="password" id="userPassword" name="password"
                                            class="form-control rounded-3 py-2-5 border-light-subtle bg-light bg-opacity-25 password-field"
                                            placeholder="Minimal 8 karakter" minlength="8"
                                            style="padding-left: 42px; padding-right: 42px; font-size: 14px;" required>
                                        <button type="button"
                                            class="position-absolute end-0 border-0 bg-transparent pe-3 text-muted z-3 h-100 d-flex align-items-center shadow-none toggle-password-btn">
                                            <i class="ti ti-eye fs-5 toggle-password-icon"></i>
                                        </button>
                                    </div>
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

        {{-- MODAL GLOBAL CONFIRMATION DELETE --}}
        <div class="modal fade" id="modalConfirmDelete" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 400px;">
                <div class="modal-content border-0 rounded-4 shadow-lg bg-white overflow-hidden">
                    <div class="modal-body p-4 text-center">
                        <div class="text-danger mb-3">
                            <i class="ti ti-trash fs-1" style="font-size: 3.5rem !important;"></i>
                        </div>
                        <h5 class="fw-bold text-dark mb-2" style="font-family: 'Inter', sans-serif;">Hapus User?</h5>
                        <p class="text-muted small mb-4">Apakah Anda yakin ingin menghapus <span id="deleteUserName"
                                class="fw-bold text-dark"></span>? Tindakan ini tidak dapat dibatalkan.</p>

                        <div class="d-flex justify-content-center gap-2">
                            <button type="button" class="btn btn-light fw-medium border-0 px-4 rounded-3 text-secondary"
                                data-bs-dismiss="modal" style="font-size: 14px;">Batal</button>
                            <form action="" method="POST" id="formDeleteUser" class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger fw-semibold px-4 rounded-3"
                                    style="font-size: 14px;">Ya, Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- TABLE DATA --}}
        <div class="table-responsive">
            <table class="table align-middle mb-0 text-start table-hover">
                <thead class="table-light text-muted small fw-semibold">
                    <tr>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Admin Name</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Email Address</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Role</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @foreach ($users as $user)
                        <tr>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary fw-bold small"
                                        style="width: 36px; height: 36px;">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="fw-semibold m-0" style="font-size: 14px;">{{ $user->name }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3" style="font-size: 14px;">{{ $user->email }}</td>
                            <td class="px-4 py-3">
                                <span class="badge bg-success bg-opacity-10 text-success fw-semibold">
                                    {{ $user->role }}
                                </span>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    {{-- Button Edit --}}
                                    <button class="btn btn-light btn-sm border-0 text-primary p-2 d-flex align-items-center"
                                        data-bs-toggle="modal" data-bs-target="#editModal{{ $user->id }}">
                                        <i class="ti ti-pencil"></i>
                                    </button>

                                    {{-- Button Trigger Konfirmasi Delete --}}
                                    <button type="button"
                                        class="btn btn-light btn-sm border-0 text-danger p-2 d-flex align-items-center btn-trigger-delete"
                                        data-id="{{ $user->id }}" data-name="{{ $user->name }}"
                                        data-url="{{ route('users.destroy', $user->id) }}">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Edit --}}
                        <div class="modal fade" id="editModal{{ $user->id }}" tabindex="-1">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content rounded-4 border-0 shadow-lg bg-white">
                                    <form action="{{ route('users.update', $user->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-header border-0 pt-4 px-4 pb-2">
                                            <h5 class="modal-title fw-bold text-dark" style="font-family: 'Inter', sans-serif;">
                                                Edit User</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                        </div>
                                        <div class="modal-body px-4 py-2">
                                            <div class="mb-3">
                                                <label class="form-label small fw-medium text-dark mb-1">Nama</label>
                                                <input type="text" name="name" class="form-control rounded-3"
                                                    value="{{ $user->name }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-medium text-dark mb-1">Email</label>
                                                <input type="email" name="email" class="form-control rounded-3"
                                                    value="{{ $user->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label small fw-medium text-dark mb-1">Role</label>
                                                <select name="role" class="form-select rounded-3" required>
                                                    <option value="Super Admin" {{ $user->role == 'Super Admin' ? 'selected' : '' }}>Super Admin</option>
                                                    <option value="Admin" {{ $user->role == 'Admin' ? 'selected' : '' }}>Admin
                                                    </option>
                                                    <option value="Kasir" {{ $user->role == 'Kasir' ? 'selected' : '' }}>Kasir
                                                    </option>
                                                </select>
                                            </div>
                                            <div class="mb-2">
                                                <label class="form-label small fw-medium text-dark mb-1">Password Baru
                                                    (Kosongkan jika tidak diganti)</label>
                                                <div class="input-group align-items-center position-relative">
                                                    <span
                                                        class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                            class="ti ti-lock fs-5"></i></span>
                                                    <input type="password" name="password"
                                                        class="form-control rounded-3 password-field"
                                                        placeholder="Minimal 8 karakter"
                                                        style="padding-left: 42px; padding-right: 42px;">
                                                    <button type="button"
                                                        class="position-absolute end-0 border-0 bg-transparent pe-3 text-muted z-3 h-100 d-flex align-items-center shadow-none toggle-password-btn">
                                                        <i class="ti ti-eye fs-5 toggle-password-icon"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer border-0 px-4 py-3">
                                            <button type="button"
                                                class="btn btn-light fw-medium border-0 px-4 rounded-3 text-secondary"
                                                data-bs-dismiss="modal">Batal</button>
                                            <button type="submit" class="btn btn-primary fw-semibold px-4 rounded-3"
                                                style="background-color: #0d3ba1; border: none;">Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
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
            // LOGIKA GLOBAL SHOW/HIDE PASSWORD BERDASARKAN CLASS
            const toggleButtons = document.querySelectorAll('.toggle-password-btn');

            toggleButtons.forEach(btn => {
                btn.addEventListener('click', function () {
                    // Mencari elemen input group pembungkus terdekat
                    const inputGroup = this.closest('.input-group');
                    // Menemukan input password dan icon mata di dalam input group tersebut
                    const passwordInput = inputGroup.querySelector('.password-field');
                    const togglePasswordIcon = inputGroup.querySelector('.toggle-password-icon');

                    if (passwordInput && togglePasswordIcon) {
                        const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                        passwordInput.setAttribute('type', type);

                        if (type === 'password') {
                            togglePasswordIcon.className = 'ti ti-eye fs-5 toggle-password-icon';
                        } else {
                            togglePasswordIcon.className = 'ti ti-eye-off fs-5 toggle-password-icon';
                        }
                    }
                });
            });

            // LOGIKA DINAMIS MODAL DELETE CONFIRMATION
            const deleteButtons = document.querySelectorAll('.btn-trigger-delete');
            const confirmModal = new bootstrap.Modal(document.getElementById('modalConfirmDelete'));
            const deleteForm = document.getElementById('formDeleteUser');
            const deleteNameSpan = document.getElementById('deleteUserName');

            deleteButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const url = this.getAttribute('data-url');
                    const name = this.getAttribute('data-name');

                    deleteForm.setAttribute('action', url);
                    deleteNameSpan.textContent = name;
                    confirmModal.show();
                });
            });
        });
    </script>
@endsection