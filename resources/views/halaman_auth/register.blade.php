<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrasi Donasi Kita</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('halaman_auth/images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/css/main.css')}}">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .container-login100 {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .wrap-login100 {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login100-form-title {
            font-size: 24px;
            color: #333;
            text-align: center;
            padding-bottom: 10px;
            margin-top: -60px;
        }
        .input100 {
            border-radius: 5px;
        }
        .login100-form-btn {
            border-radius: 5px;
            background-color: #4e73df;
            transition: all 0.3s ease;
        }
        .login100-form-btn:hover {
            background-color: #2e59d9;
        }
        .txt2 {
            color: #666;
        }
        .alert {
            border-radius: 5px;
        }
    </style>
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form action="{{route('register.submit')}}" class="login100-form validate-form" method="POST" enctype="multipart/form-data">
                @csrf
                <span class="login100-form-title">
                    Registrasi Akun
                </span>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $item)
                                <li>{{$item}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if (Session::get('success'))
                    <div class="alert alert-success alert-dismissible fade show">
                        <ul>
                            <li>{{Session::get('success')}}</li>
                        </ul>
                    </div>
                @endif

                <div class="wrap-input100 validate-input" data-validate="Nama lengkap diperlukan">
                    <input class="input100" type="text" name="fullname">
                    <span class="focus-input100"></span>
                    <span class="label-input100"><i class="fas fa-user"></i> Nama Lengkap</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Email valid diperlukan: ex@abc.xyz">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100"></span>
                    <span class="label-input100"><i class="fas fa-envelope"></i> Email</span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Password diperlukan">
                    <input class="input100" type="password" name="password">
                    <span class="focus-input100"></span>
                    <span class="label-input100"><i class="fas fa-lock"></i> Password</span>
                </div>

                <div class="form-group mt-4">
                    <label for="gambar" class="mb-2" style="color: #666;">Foto Profil</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="gambar" id="gambar">
                        <label class="custom-file-label" for="gambar">Pilih file</label>
                    </div>
                </div>

                <div class="container-login100-form-btn mt-4">
                    <button class="login100-form-btn" type="submit">
                        Daftar
                    </button>
                </div>

                <div class="text-center p-t-46 p-b-20">
                    <span class="txt2">
                        Sudah punya akun? <a href="{{route('login')}}" class="text-primary font-weight-bold">Login</a>
                    </span>
                </div>
            </form>

            <div class="login100-more" style="background-image: url('https://digitalmama.id/wp-content/uploads/2024/03/Ilustrasi-open-donasi.webp');">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="{{ asset('halaman_auth/js/main.js') }}"></script>
<script>
    // Custom file input
    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
</script>

</body>
</html>