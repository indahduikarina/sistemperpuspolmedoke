@extends('layouts.app')

@section('content')
{{-- FontAwesome --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

<style>
    .form-container {
        max-width: 600px;
        margin: 2rem auto;
        padding: 2rem;
        border-radius: 16px;
        background: linear-gradient(135deg, #d0e7ff, #f3e8ff);
        box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        font-family: 'Poppins', sans-serif;
    }

    .form-container h2 {
        color: #4a3aff;
        margin-bottom: 1.5rem;
        font-weight: 700;
    }

    .form-group {
        margin-bottom: 1.25rem;
    }

    .form-group label {
        font-weight: 600;
        display: block;
        margin-bottom: 0.4rem;
        color: #333;
    }

    .form-group .icon-label {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #555;
    }

    .form-control {
        width: 100%;
        padding: 0.55rem 0.9rem;
        border-radius: 10px;
        border: 2px solid #ccc;
        transition: 0.3s;
    }

    .form-control:focus {
        border-color: #4a3aff;
        outline: none;
    }

    .form-actions {
        margin-top: 2rem;
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .btn-submit {
        background-color: #4a3aff;
        color: white;
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 8px;
    }

    .btn-cancel {
        background-color: #ccc;
        color: #333;
        padding: 0.6rem 1.5rem;
        border: none;
        border-radius: 8px;
    }

</style>

<div class="form-container">
    <h2><i class="fas fa-user-edit"></i> Edit Data Anggota</h2>

    <form action="{{ route('anggotas.update', $anggota->idanggota) }}" method="POST">
        @csrf
        @method('PUT')

        {{-- Nama --}}
        <div class="form-group">
            <label class="icon-label" for="nama">
                <i class="fas fa-id-badge" style="color:#4a3aff;"></i>
                Nama
            </label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $anggota->nama) }}" class="form-control" required>
        </div>

        {{-- Jenis Kelamin --}}
        <div class="form-group">
            <label class="icon-label" for="jeniskelamin">
                <i class="fas fa-venus-mars" style="color:#e67e22;"></i>
                Jenis Kelamin
            </label>
            <select name="jeniskelamin" id="jeniskelamin" class="form-control" required>
                <option value="">-- Pilih Jenis Kelamin --</option>
                <option value="Pria" {{ old('jeniskelamin', $anggota->jeniskelamin) == 'Pria' ? 'selected' : '' }}>Pria</option>
                <option value="Wanita" {{ old('jeniskelamin', $anggota->jeniskelamin) == 'Wanita' ? 'selected' : '' }}>Wanita</option>
            </select>
        </div>

        {{-- Alamat --}}
        <div class="form-group">
            <label class="icon-label" for="alamat">
                <i class="fas fa-map-marker-alt" style="color:#27ae60;"></i>
                Alamat
            </label>
            <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $anggota->alamat) }}" class="form-control" required>
        </div>

        {{-- Status --}}
        <div class="form-group">
            <label class="icon-label" for="status">
                <i class="fas fa-info-circle" style="color:#8e44ad;"></i>
                Status
            </label>
            <select name="status" id="status" class="form-control" required>
                <option value="">-- Pilih Status --</option>
                <option value="Meminjam" {{ old('status', $anggota->status) == 'Meminjam' ? 'selected' : '' }}>Meminjam</option>
                <option value="Tidak Meminjam" {{ old('status', $anggota->status) == 'Tidak Meminjam' ? 'selected' : '' }}>Tidak Meminjam</option>
            </select>
        </div>

        <div class="form-actions">
            <a href="{{ route('anggotas.index') }}" class="btn-cancel">
                <i class="fas fa-arrow-left"></i> Batal
            </a>
            <button type="submit" class="btn-submit">
                <i class="fas fa-save"></i> Update
            </button>
        </div>
    </form>
</div>
@endsection
