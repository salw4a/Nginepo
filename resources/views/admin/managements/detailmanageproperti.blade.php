@extends('admin.layouts.main')
@section('title', 'Detail Manajemen Properti - Nginepo')
@section('content')

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-transparent">
                    <h4 class="mb-0" style="color: #8b6f47;">Detail Penginapan</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <!-- Foto Properti -->
                        <div class="col-md-6 mb-4">
                            <div class="property-image">
                                @if($properti->foto)
                                    <img src="{{ asset('storage/' . $properti->foto) }}"
                                         alt="{{ $properti->nama_properti }}"
                                         class="img-fluid rounded shadow-sm">
                                @else
                                    <div class="placeholder-image d-flex align-items-center justify-content-center">
                                        <i class="fas fa-image fa-3x text-muted"></i>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <!-- Detail Properti -->
                        <div class="col-md-6">
                            <div class="property-details">
                                <!-- Nama Properti -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Nama Properti</label>
                                    <div class="form-control-plaintext bg-light rounded p-2">
                                        {{ $properti->nama_properti }}
                                    </div>
                                </div>

                                <!-- Lokasi -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Lokasi</label>
                                    <div class="form-control-plaintext bg-light rounded p-2">
                                        {{ $properti->lokasi }}
                                    </div>
                                </div>

                                <!-- Maksimum Tamu -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Maksimum Tamu</label>
                                    <div class="form-control-plaintext bg-light rounded p-2">
                                        {{ $properti->maksimum_tamu }} tamu
                                    </div>
                                </div>

                                <!-- Deskripsi -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Deskripsi</label>
                                    <div class="form-control-plaintext bg-light rounded p-2" style="min-height: 60px;">
                                        {{ $properti->deskripsi }}
                                    </div>
                                </div>

                                <!-- Harga -->
                                <div class="mb-3">
                                    <label class="form-label fw-bold">Harga</label>
                                    <div class="form-control-plaintext bg-light rounded p-2">
                                        {{ $properti->getFormattedHargaAttribute() }} per malam
                                    </div>
                                </div>

                                <!-- Status Properti -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Status Properti</label>
                                    <form id="statusForm" method="POST" action="{{ route('admin.properti.update-status', $properti->id_properti) }}">
                                        @csrf
                                        @method('PATCH')
                                        <select name="status" class="form-select" onchange="confirmStatusChange(this)">
                                            @foreach($statusProperti as $status)
                                                <option value="{{ $status->id_status_properti }}" {{ $properti->id_status_properti == $status->id_status_properti ? 'selected' : '' }}>
                                                    {{ ucfirst(str_replace('_', ' ', $status->nama_status_properti)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>

                                <!-- Verifikasi Properti -->
                                <div class="mb-4">
                                    <label class="form-label fw-bold">Status Verifikasi</label>
                                    <form id="verifikasiForm" method="POST" action="{{ route('admin.properti.update-verifikasi', $properti->id_properti) }}">
                                        @csrf
                                        @method('PATCH')
                                        <select name="verifikasi" class="form-select" onchange="confirmVerifikasiChange(this)">
                                            @foreach($verifikasiProperti as $verifikasi)
                                                <option value="{{ $verifikasi->id_verifikasi_properti }}" {{ $properti->id_verifikasi_properti == $verifikasi->id_verifikasi_properti ? 'selected' : '' }}>
                                                    {{ ucfirst(str_replace('_', ' ', $verifikasi->nama_verifikasi_properti)) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </form>
                                </div>

<script>
function confirmStatusChange(selectElement) {
    const selectedText = selectElement.options[selectElement.selectedIndex].text;
    if (confirm(`Apakah Anda yakin ingin mengubah status properti menjadi "${selectedText}"?`)) {
        document.getElementById('statusForm').submit();
    } else {
        // Reset to previous value
        selectElement.value = "{{ $properti->id_status_properti }}";
    }
}

function confirmVerifikasiChange(selectElement) {
    const selectedText = selectElement.options[selectElement.selectedIndex].text;
    if (confirm(`Apakah Anda yakin ingin mengubah status verifikasi menjadi "${selectedText}"?`)) {
        document.getElementById('verifikasiForm').submit();
    } else {
        // Reset to previous value
        selectElement.value = "{{ $properti->id_verifikasi_properti }}";
    }
}
</script>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="row mt-4">
                        <div class="col-12 d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.managements.manageproperti') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.property-image img {
    width: 100%;
    height: 250px;
    object-fit: cover;
}

.placeholder-image {
    width: 100%;
    height: 250px;
    background-color: #f8f9fa;
    border: 2px dashed #dee2e6;
    border-radius: 0.375rem;
}

.form-control-plaintext {
    border: 1px solid #e9ecef;
    background-color: #f8f9fa !important;
    padding: 0.5rem 0.75rem;
    margin-bottom: 0;
}

.btn-success {
    background-color: #28a745;
    border-color: #28a745;
}

.btn-danger {
    background-color: #dc3545;
    border-color: #dc3545;
}

.card {
    border: none;
    border-radius: 1rem;
}

.card-header {
    border-bottom: 1px solid #e9ecef;
    background-color: #fff !important;
    padding: 1.5rem;
}

.form-label {
    color: #495057;
    margin-bottom: 0.5rem;
}

.form-select {
    border-color: #d4a574;
}

.form-select:focus {
    border-color: #d4a574;
    box-shadow: 0 0 0 0.2rem rgba(212, 165, 116, 0.25);
}
</style>

<script>
function approveProperty() {
    if (confirm('Apakah Anda yakin ingin menyetujui properti ini?')) {
        // Implementasi approve property
        alert('Properti berhasil disetujui!');
    }
}
</script>

@endsection
