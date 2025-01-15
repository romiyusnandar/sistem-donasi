<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Donasi Kita</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('halaman_auth/images/icons/favicon.ico') }}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/css/util.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('halaman_auth/css/main.css')}}">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        .container-login100 {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }
        .login100-form {
            padding: 50px;
        }
        .login100-form-title {
            font-size: 24px;
            color: #333;
            margin-bottom: 30px;
        }
        .wrap-input100 {
            margin-bottom: 20px;
        }
        .input100 {
            border-radius: 25px;
        }
        .login100-form-btn {
            border-radius: 25px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            transition: all 0.3s ease;
        }
        .login100-form-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        .login100-form-social-item {
            border-radius: 50%;
            transition: all 0.3s ease;
        }
        .login100-form-social-item:hover {
            transform: scale(1.1);
        }
    </style>
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form action="{{route('login.submit')}}" class="login100-form validate-form" method="POST">
                    @csrf
                    <span class="login100-form-title">
                        <i class="fas fa-user-circle fa-3x mb-3"></i><br>
                        Login untuk melanjutkan
                    </span>

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $item)
                                    <li>{{$item}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{Session::get('success')}}
                        </div>
                    @endif

                    <div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
                        <input class="input100" type="text" name="email" value="{{old('email')}}">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Email</span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100"></span>
                        <span class="label-input100">Password</span>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit">
                            Login
                        </button>
                    </div>

                    <div class="text-center p-t-46 p-b-20">
                        <span class="txt2">
                            Belum punya akun? <a href="{{route('register')}}" class="text-primary">Register</a>
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
</body>
</html>