<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="assets/images/logo.jpg" rel="icon">
    <link href="assets/images/logo.jpg" rel="apple-touch-icon">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{  asset('assets/css//login.css')}}">
    <link rel="stylesheet" href="{{  asset('assets/css//app.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 bg-dark">
                <img src="assets/images/homelogo.png" class="img-fluid homelogo" alt="">
            </div>
            <div class="col md-6 loginlogo bg-dark" style = "background-image: url('assets/images/loginlogo1.png');">
                <div class="dheight"></div>
                <br>
                <br>
                <br><br><br>
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-danger">
                                <div class="text-center ">
                                    <h1 class="customHeading  h1 fw-bold text-uppercase">Login</h1>
                                </div>
                            </div>
                            @if(Session::get('failed'))
                                <div class="alert alert-danger col text-center">
                                    {{ Session::get('failed') }}
                                </div>
                                <script>
                                $('div.alert').delay(3000).fadeOut(350);
                            </script>
                            @endif
                            <div class="p-3" id="formPanel">
                                <form action="/signin" method="post">
                                    @csrf
                                    <div class="custom-form-group text-center">
                                        <label class="text-uppercase" for="username">LRN: </label>
                                        <input type="text" Placeholder = "LRN" id="lrn" name="lrn" class="form-contol" /><span class="pb-1"><i class="fas fa-user"></i></span>
                                        @error('lrn')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="custom-form-group text-center mt-3">
                                        <label class="text-uppercase" for="password">Password</label>
                                        <input type="password"Placeholder = "Password" id="password" name="password" class="form-contol" /><span class="pb-1"><i id="showCursor" class="fas fa-eye-slash" onclick="showPassword(event)"></i></span>
                                        @error('pasword')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                    <p class="mt-2 text-center">Don't Have an Account? <a href="/signup">Sign-up</a></p>
                                    <div class="col text-center mt-4">
                                    <button  class="w-50 p-2 custom-btn text-dark fw-bold" >Login</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</body>
</html>