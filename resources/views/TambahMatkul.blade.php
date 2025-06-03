<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Mata Kuliah</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card-form {
            border-radius: 10px;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .form-label {
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        .form-control {
            border-radius: 0.375rem;
            padding: 0.5rem 0.75rem;
        }
        .btn-submit {
            background-color: #28a745;
            border: none;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        .btn-submit:hover {
            background-color: #218838;
        }
        .cancel-link {
            color: #6c757d;
            text-decoration: none;
            font-weight: 500;
            margin-right: 1rem;
            align-self: center;
        }
        .cancel-link:hover {
            color: #5a6268;
        }
        .header {
            color: #212529;
            margin-bottom: 1.5rem;
            font-weight: 600;
        }
        .error-message {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
        .is-invalid {
            border-color: #dc3545;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-form">
                    <div class="card-body p-5">
                        <h2 class="header mb-4">Tambah Mata Kuliah</h2>
                        
                        <!-- Tampilkan error validasi -->
                        @if ($errors->any())
                            <div class="alert alert-danger mb-4">
                                <ul class="mb-0 ps-3">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form method="POST" action="/tambahMatkul">
                            @csrf

                            <!-- Kode Matkul -->
                            <div class="mb-4">
                                <label for="kode_matkul" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" id="kode_matkul" name="kode_matkul" 
                                       value="{{ old('kode_matkul') }}" 
                                       class="form-control @error('kode_matkul') is-invalid @enderror" required>
                                @error('kode_matkul')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Nama Matkul -->
                            <div class="mb-4">
                                <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
                                <input type="text" id="nama_matkul" name="nama_matkul" 
                                       value="{{ old('nama_matkul') }}" 
                                       class="form-control @error('nama_matkul') is-invalid @enderror" required>
                                @error('nama_matkul')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Ruang Kelas -->
                            <div class="mb-4">
                                <label for="ruang_kelas" class="form-label">Ruang Kelas</label>
                                <input type="text" id="ruang_kelas" name="ruang_kelas" 
                                       value="{{ old('ruang_kelas') }}" 
                                       class="form-control @error('ruang_kelas') is-invalid @enderror" required>
                                @error('ruang_kelas')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Dosen -->
                            <div class="mb-4">
                                <label for="dosen" class="form-label">Dosen Pengajar</label>
                                <input type="text" id="dosen" name="dosen" 
                                       value="{{ old('dosen') }}" 
                                       class="form-control @error('dosen') is-invalid @enderror" required>
                                @error('dosen')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- SKS -->
                            <div class="mb-4">
                                <label for="sks" class="form-label">SKS</label>
                                <input type="number" id="sks" name="sks" 
                                       value="{{ old('sks') }}" 
                                       class="form-control @error('sks') is-invalid @enderror" 
                                       min="1" max="6" required>
                                @error('sks')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Jadwal -->
                            <div class="mb-4">
                                <label for="jadwal" class="form-label">Jadwal</label>
                                <input type="text" id="jadwal" name="jadwal" 
                                       value="{{ old('jadwal') }}" 
                                       class="form-control @error('jadwal') is-invalid @enderror" required>
                                @error('jadwal')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ url('/dashboard') }}" class="cancel-link">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success btn-submit">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>