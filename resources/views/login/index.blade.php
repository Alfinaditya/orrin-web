<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">


    <link rel="stylesheet" href="login.css">

</head>
<body>

    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade-show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade-show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="container d-flex justify-content-center align-items-center min-vh-100">

        <!----------------------- Login Container -------------------------->

        <div class="row border rounded-5 p-3 bg-white shadow box-area">

            <!--------------------------- Left Box ----------------------------->

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #ffffff;">
                <div class="featured-image mb-3">
                    <img src="Illustration.png" class="img-fluid" style="width: 250px;">
                </div>
            </div>

            <!-------------------- ------ Right Box ---------------------------->
            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4 text-center">
                        <h2 style="color: #6358DC; font-weight: 700;">Hello,Again</h2>
                        <p>We are happy to have you back.</p>
                    </div>
                    <form action="/login" method="post">
                        <div class="input-group mb-3">
                            @csrf
                            <input type="email" name="email" class="form-control form-control-lg bg-light fs-6 rounded-3" @error('email') is-invalid @enderror" id="email" placeholder="example@gmail.com" autofocus required value="{{ old('email') }}">
                        </div>
                        <div class="input-group mb-5">
                            <input type="password" name="password" class="form-control form-control-lg bg-light fs-6 rounded-3" placeholder="Password"><label for="password"></label>
                        </div>
                        <div class="input-group mb-3">
                            <button style="background-color: #6358DC; color: #ffffff; font-weight: 700;" type="submit" class="btn btn-lg w-100 fs-6">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row w-75 justify-content-center position-absolute top-50 start-50 translate-middle">
        <div class="col-md-8">
            <main class="form-signin">
                <img src="{{ $logo }}" alt="{{ $title }}" width="100" class="mb-3 position-relative mx-auto d-flex">
    <h1 class="h3 mb-3 fw-normal text-center">{{ $title }}</h1>
    <form action="/login" method="post">
        @csrf
        <div class="form-floating">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" autofocus required value="{{ old('email') }}">
            <label for="email">Email address</label>
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="form-floating">
            <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
            <label for="password">Password</label>
        </div>
        <button class="w-100 btn btn-lg btn-primary mb-3" type="submit">Login</button>
    </form>
    </main>

    </div>
    </div> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</body>
</html>
