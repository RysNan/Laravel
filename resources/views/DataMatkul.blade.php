<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mata Kuliah</title>
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
            background-color: #0d6efd;
            border: none;
            padding: 0.5rem 1.5rem;
            font-weight: 500;
        }
        .btn-submit:hover {
            background-color: #0b5ed7;
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
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card card-form">
                    <div class="card-body p-5">
                        <h2 class="header mb-4">Edit Mata Kuliah</h2>
                        
                        <form method="POST" action="{{ url('/prosesUpdate/' . $matkul->id) }}">
                            @csrf
                            @method('PUT')

                            <!-- Kode Matkul (disabled) -->
                            <div class="mb-4">
                                <label for="kode_matkul" class="form-label">Kode Mata Kuliah</label>
                                <input type="text" id="kode_matkul" name="kode_matkul" 
                                       value="{{ $matkul->kode_matkul }}" 
                                       class="form-control bg-light" disabled>
                            </div>

                            <!-- Nama Matkul -->
                            <div class="mb-4">
                                <label for="nama_matkul" class="form-label">Nama Mata Kuliah</label>
                                <input type="text" id="nama_matkul" name="nama_matkul" 
                                       value="{{ old('nama_matkul', $matkul->nama_matkul) }}" 
                                       class="form-control" required>
                            </div>

                            <!-- Ruang Kelas -->
                            <div class="mb-4">
                                <label for="ruang_kelas" class="form-label">Ruang Kelas</label>
                                <input type="text" id="ruang_kelas" name="ruang_kelas" 
                                       value="{{ old('ruang_kelas', $matkul->ruang_kelas) }}" 
                                       class="form-control" required>
                            </div>

                            <!-- Dosen -->
                            <div class="mb-4">
                                <label for="dosen" class="form-label">Dosen Pengajar</label>
                                <input type="text" id="dosen" name="dosen" 
                                       value="{{ old('dosen', $matkul->dosen) }}" 
                                       class="form-control" required>
                            </div>

                            <!-- SKS -->
                            <div class="mb-4">
                                <label for="sks" class="form-label">SKS</label>
                                <input type="number" id="sks" name="sks" 
                                       value="{{ old('sks', $matkul->sks) }}" 
                                       class="form-control" min="1" max="6" required>
                            </div>

                            <!-- Jadwal -->
                            <div class="mb-4">
                                <label for="jadwal" class="form-label">Jadwal</label>
                                <input type="text" id="jadwal" name="jadwal" 
                                       value="{{ old('jadwal', $matkul->jadwal) }}" 
                                       class="form-control" required>
                            </div>

                            <!-- Action Buttons -->
                            <div class="d-flex justify-content-end mt-4">
                                <a href="{{ url('/dashboard') }}" class="cancel-link">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary btn-submit">
                                    <i class="fas fa-save me-1"></i> Update
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