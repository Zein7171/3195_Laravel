@extends('layouts.admin') {{-- Sesuaikan dengan nama file layout admin utama kamu --}}

@section('content')
<div class="container-fluid px-4 py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Partner Baru</h1>
        <a href="{{ route('admin.partners.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('admin.partners.store') }}" method="POST">
                @csrf {{-- Wajib ada di Laravel untuk keamanan token --}}

                <div class="mb-3">
                    <label for="name" class="form-label">Nama Partner</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" placeholder="Masukkan nama instansi/perusahaan partner">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="logo_url" class="form-label">URL Logo Partner</label>
                    <input type="text" class="form-control @error('logo_url') is-invalid @enderror" id="logo_url" name="logo_url" value="{{ old('logo_url', 'https://placehold.co/200x200') }}" placeholder="Contoh: https://placehold.co/200x200">
                    @error('logo_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Simpan Data Partner</button>
            </form>
        </div>
    </div>
</div>
@endsection