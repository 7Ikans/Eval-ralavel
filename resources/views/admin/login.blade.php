<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Admin - Evaluasi BPSDMD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .login-card {
            width: 100%;
            max-width: 400px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="card shadow">
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <img src="{{ asset('img/jawa.png') }}" alt="Logo" height="80">
                    <h4 class="mt-2">Admin Panel</h4>
                    <p class="text-muted">Evaluasi BPSDMD Provinsi Jawa Tengah</p>
                </div>

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form method="POST" action="{{ route('admin.login.post') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" 
                               placeholder="Masukkan username" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" name="password" class="form-control" 
                               placeholder="Masukkan password" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
        <p class="text-center text-muted mt-3">
            &copy; BPSDMD Provinsi Jawa Tengah
        </p>
    </div>
</body>
</html>