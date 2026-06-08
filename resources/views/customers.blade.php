@extends('layout.app')

@section('content')
    <div class="container-fluid p-4">
        <div class="mb-4 d-flex flex-column flex-md-row align-items-md-end justify-content-between gap-3">
            <div>
                <h2 class="h2 text-dark fw-bold mb-1" style="font-family: 'Hanken Grotesk', sans-serif;">Customer Management
                </h2>
                <p class="text-muted m-0" style="font-family: 'Inter', sans-serif;">Monitor, track and manage your retail
                    customer relationships and purchase history.</p>
            </div>

            {{-- Button Trigger Modal Add --}}
            <button class="btn d-inline-flex align-items-center gap-2 px-4 fw-semibold border-0 text-white"
                style="height: 44px; background-color: #0d3ba1; border-radius: 8px; transition: all 0.2s;"
                data-bs-toggle="modal" data-bs-target="#modalAddCustomer">
                <span class="fs-5">+</span>
                Add Customer
            </button>
        </div>

        {{-- Modal Add Customer --}}
        <div class="modal fade" id="modalAddCustomer" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="modalAddCustomerLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" style="max-width: 550px;">
                <div class="modal-content border-0 shadow-lg bg-white" style="border-radius: 16px; overflow: hidden;">
                    <div class="modal-header border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-start">
                        <div>
                            <h5 class="modal-title fw-bold text-dark h4 mb-1" id="modalAddCustomerLabel"
                                style="font-family: 'Inter', sans-serif;">Tambah Pelanggan</h5>
                            <p class="text-muted small m-0">Lengkapi data untuk mendaftarkan pelanggan baru.</p>
                        </div>
                        <button type="button" class="btn-close shadow-none m-0 p-2" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <form action="{{ route('customers.store') }}" method="POST" id="addCustomerForm">
                        @csrf
                        <div class="modal-body px-4 py-3">
                            <div class="mb-3">
                                <label for="customerName" class="form-label fw-medium text-dark small mb-1"
                                    style="color: #434653 !important;">Nama Lengkap Pelanggan</label>
                                <div class="input-group align-items-center position-relative">
                                    <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                            class="ti ti-user fs-5"></i></span>
                                    <input type="text" id="customerName" name="name"
                                        class="form-control py-2 border-light-subtle bg-light bg-opacity-25"
                                        placeholder="Name"
                                        style="padding-left: 42px; font-size: 14px; border-radius: 10px;" required
                                        value="{{ old('name') }}">
                                </div>
                            </div>

                            <div class="row g-3 mb-3">
                                <div class="col-12 col-sm-6">
                                    <label for="phoneNumber" class="form-label fw-medium text-dark small mb-1"
                                        style="color: #434653 !important;">Nomor Telepon</label>
                                    <div class="input-group align-items-center position-relative">
                                        <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                class="ti ti-phone fs-5"></i></span>
                                        <input type="text" id="phoneNumber" name="phone"
                                            class="form-control py-2 border-light-subtle bg-light bg-opacity-25"
                                            placeholder="0812xxxxxxxx"
                                            style="padding-left: 42px; font-size: 14px; border-radius: 10px;" required
                                            value="{{ old('phone') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <label for="emailAddress" class="form-label fw-medium text-dark small mb-1"
                                        style="color: #434653 !important;">Alamat Email</label>
                                    <div class="input-group align-items-center position-relative">
                                        <span class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                class="ti ti-mail fs-5"></i></span>
                                        <input type="email" id="emailAddress" name="email"
                                            class="form-control py-2 border-light-subtle bg-light bg-opacity-25"
                                            placeholder="nama@email.com"
                                            style="padding-left: 42px; font-size: 14px; border-radius: 10px;" required
                                            value="{{ old('email') }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div
                            class="modal-footer border-0 px-4 pb-4 pt-2 d-flex justify-content-end align-items-center gap-2">
                            <button type="button"
                                class="btn btn-light fw-medium px-4 text-secondary border border-light-subtle"
                                data-bs-dismiss="modal"
                                style="font-size: 14px; border-radius: 10px; background-color: #ffffff;">Batal</button>
                            <button type="submit" class="btn fw-semibold px-4 text-white"
                                style="font-size: 14px; background-color: #0d3ba1; border: none; border-radius: 10px; padding-top: 8px; padding-bottom: 8px;">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        {{-- Tabel Data --}}
        <div class="table-responsive">
            <table class="table align-middle mb-0 text-start table-hover">
                <thead class="table-light text-muted small fw-semibold">
                    <tr>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Customer Name</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Phone Number</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle">Email</th>
                        <th class="px-4 py-3 border-bottom border-light-subtle text-end">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-dark">
                    @forelse($customers as $customer)
                        <tr>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center gap-3">
                                    {{-- Inisial Nama Otomatis --}}
                                    <div class="d-flex align-items-center justify-content-center rounded-circle bg-primary bg-opacity-10 text-primary fw-bold small"
                                        style="width: 36px; height: 36px;">
                                        {{ strtoupper(substr($customer->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <p class="fw-semibold m-0" style="font-size: 14px;">{{ $customer->name }}</p>
                                        <p class="text-muted small m-0" style="font-size: 12px;">{{ $customer->email }}</p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-dark text-opacity-75"
                                    style="font-family: 'JetBrains Mono', monospace; font-size: 13px;">{{ $customer->phone }}</span>
                            </td>
                            <td class="px-4 py-3">
                                <span class="text-dark text-opacity-75"
                                    style="font-family: 'JetBrains Mono', monospace; font-size: 13px;">{{ $customer->email }}</span>
                            </td>
                            <td class="px-4 py-3 text-end">
                                <div class="d-flex justify-content-end gap-1">
                                    {{-- Tombol Edit --}}
                                    <button class="btn btn-light btn-sm border-0 text-primary p-2 d-flex align-items-center"
                                        title="Edit" data-bs-toggle="modal"
                                        data-bs-target="#modalEditCustomer{{ $customer->id }}">
                                        <i class="ti ti-pencil"></i>
                                    </button>

                                    {{-- Tombol Trigger Modal Delete --}}
                                    <button type="button"
                                        class="btn btn-light btn-sm border-0 text-danger p-2 d-flex align-items-center"
                                        title="Delete" data-bs-toggle="modal"
                                        data-bs-target="#modalDeleteCustomer{{ $customer->id }}">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>

                        {{-- Modal Edit Customer --}}
                        <div class="modal fade" id="modalEditCustomer{{ $customer->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 550px;">
                                <div class="modal-content border-0 shadow-lg bg-white"
                                    style="border-radius: 16px; overflow: hidden;">
                                    <div
                                        class="modal-header border-0 pt-4 px-4 pb-2 d-flex justify-content-between align-items-start">
                                        <div>
                                            <h5 class="modal-title fw-bold text-dark h4 mb-1"
                                                style="font-family: 'Inter', sans-serif;">Ubah Pelanggan</h5>
                                            <p class="text-muted small m-0">Perbarui data informasi pelanggan.</p>
                                        </div>
                                        <button type="button" class="btn-close shadow-none m-0 p-2" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>

                                    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                                        @csrf
                                        @method('PUT')
                                        <div class="modal-body px-4 py-3">
                                            <div class="mb-3">
                                                <label class="form-label fw-medium text-dark small mb-1"
                                                    style="color: #434653 !important;">Nama Lengkap Pelanggan</label>
                                                <div class="input-group align-items-center position-relative">
                                                    <span
                                                        class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                            class="ti ti-user fs-5"></i></span>
                                                    <input type="text" name="name"
                                                        class="form-control py-2 border-light-subtle bg-light bg-opacity-25"
                                                        style="padding-left: 42px; font-size: 14px; border-radius: 10px;"
                                                        required value="{{ $customer->name }}">
                                                </div>
                                            </div>

                                            <div class="row g-3 mb-3">
                                                <div class="col-12 col-sm-6">
                                                    <label class="form-label fw-medium text-dark small mb-1"
                                                        style="color: #434653 !important;">Nomor Telepon</label>
                                                    <div class="input-group align-items-center position-relative">
                                                        <span
                                                            class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                                class="ti ti-phone fs-5"></i></span>
                                                        <input type="text" name="phone"
                                                            class="form-control py-2 border-light-subtle bg-light bg-opacity-25"
                                                            style="padding-left: 42px; font-size: 14px; border-radius: 10px;"
                                                            required value="{{ $customer->phone }}">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-6">
                                                    <label class="form-label fw-medium text-dark small mb-1"
                                                        style="color: #434653 !important;">Alamat Email</label>
                                                    <div class="input-group align-items-center position-relative">
                                                        <span
                                                            class="position-absolute ps-3 text-muted z-3 d-flex align-items-center"><i
                                                                class="ti ti-mail fs-5"></i></span>
                                                        <input type="email" name="email"
                                                            class="form-control py-2 border-light-subtle bg-light bg-opacity-25"
                                                            style="padding-left: 42px; font-size: 14px; border-radius: 10px;"
                                                            required value="{{ $customer->email }}">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div
                                            class="modal-footer border-0 px-4 pb-4 pt-2 d-flex justify-content-end align-items-center gap-2">
                                            <button type="button"
                                                class="btn btn-light fw-medium px-4 text-secondary border border-light-subtle"
                                                data-bs-dismiss="modal"
                                                style="font-size: 14px; border-radius: 10px; background-color: #ffffff;">Batal</button>
                                            <button type="submit" class="btn fw-semibold px-4 text-white"
                                                style="font-size: 14px; background-color: #0d3ba1; border: none; border-radius: 10px; padding-top: 8px; padding-bottom: 8px;">Simpan
                                                Perubahan</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        {{-- Modal Delete Customer --}}
                        <div class="modal fade" id="modalDeleteCustomer{{ $customer->id }}" data-bs-backdrop="static"
                            data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered" style="max-width: 420px;">
                                <div class="modal-content border-0 shadow-lg bg-white"
                                    style="border-radius: 16px; overflow: hidden;">
                                    <div class="modal-body p-4 text-center">
                                        {{-- Ikon Peringatan Elegan --}}
                                        <div class="d-inline-flex align-items-center justify-content-center bg-danger bg-opacity-10 text-danger rounded-circle mb-3"
                                            style="width: 60px; height: 60px;">
                                            <i class="ti ti-trash fs-2"></i>
                                        </div>
                                        <h5 class="fw-bold text-dark mb-2" style="font-family: 'Inter', sans-serif;">Hapus
                                            Pelanggan?</h5>
                                        <p class="text-muted small mb-4">Apakah Anda yakin ingin menghapus pelanggan
                                            <strong>{{ $customer->name }}</strong>? Tindakan ini tidak dapat dibatalkan.</p>

                                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <div class="d-flex justify-content-center gap-2">
                                                <button type="button"
                                                    class="btn btn-light fw-medium w-50 border border-light-subtle text-secondary"
                                                    data-bs-dismiss="modal"
                                                    style="font-size: 14px; border-radius: 10px; height: 40px; background-color: #ffffff;">
                                                    Batal
                                                </button>
                                                <button type="submit"
                                                    class="btn btn-danger fw-semibold w-50 border-0 text-white"
                                                    style="font-size: 14px; border-radius: 10px; height: 40px;">
                                                    Ya, Hapus
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-4 text-muted">Belum ada data pelanggan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection