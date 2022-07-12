<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />

        <!-- Bootstrap CSS -->
        {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous" /> --}}
        <link rel="stylesheet" href="/css/bootstrap-5.0.0-beta2-dist/css/bootstrap.min.css">

        <!-- my Style -->
        <link rel="stylesheet" href="/css/signin.css" />

        <title>Hikanime | Login</title>
    </head>
    <body class="bg-dark">
        <main class="form-signin">
            <form action="/hikamin/login" method="POST">
                @csrf
                <h1 class="h1 text-center text-primary mb-3">Hika<span class="text-white">nime</span></h1>
                <h1 class="h3 mb-3 fw-normal text-light">Login</h1>
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                    </div>
                @endif
            
                <div class="form-floating">
                    <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com" name="email" value="{{ old('email') }}" required>
                    <label for="floatingInput">Email address</label>
                </div>
                @error('email')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="password" required>
                    <label for="floatingPassword">Password</label>
                </div>
                @error('password')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            </form>
        </main>
        {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> --}}
        <script src="/css/bootstrap-5.0.0-beta2-dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
