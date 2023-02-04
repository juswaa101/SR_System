<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

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
                <br><br><br><br><br><br><br>   
                <div class="row justify-content-center">
                    <div class="col-md-8">
                        <div class="card ">
                            <div class="card-header bg-danger">
                                <div class="text-center">
                                    <h1 class="customHeading  h1 fw-bold text-uppercase">Sign up</h1>
                                </div>
                            </div>
                            @if(Session::get('success'))
                                <div class="alert alert-success col text-center">
                                    {{ Session::get('success') }}
                                </div>
                                <script>
                                $('div.alert').delay(3000).fadeOut(350);
                            </script>
                            @endif
                            <div class="p-4" id="">
                                <form action="/register" method="post">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="custom-form-group ">
                                                <label class="text-uppercase" for="username">Lastname: </label>
                                                <input type="text" id="Fullname"  Placeholder = "Last Name" name="lname" value ="{{old('lname')}}" class="form-contol" /><span class="pb-1"><i class="fas fa-user"></i></span>
                                                @error('lname')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="custom-form-group">
                                                <label class="text-uppercase" for="username">Given Name: </label>
                                                <input type="text" id="Fullname"  Placeholder = "Given Name" name="fname" value ="{{old('fname')}}" class="form-contol" /><span class="pb-1"><i class="fas fa-user"></i></span>
                                                @error('fname')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="custom-form-group">
                                                <label class="text-uppercase" for="username">Middle Name: </label>
                                                <input type="text" id="Fullname" name="mname"  Placeholder = "Middle Name" value ="{{old('mname')}}" class="form-contol" /><span class="pb-1"><i class="fas fa-user"></i></span>
                                                @error('mname')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="custom-form-group mt-2">
                                                <label class="text-uppercase" for="username">LRN: </label>
                                                <input type="text" id="lrn"  Placeholder = "LRN" name="lrn" value ="{{old('lrn')}}" class="form-contol" /><span class="pb-1"><i class="fas fa-user"></i></span>
                                                @error('lrn')
                                                <p class="text-danger">
                                                    {{$message}}
                                                </p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="custom-form-group mt-2">
                                                <label class="text-uppercase" for="username">Section: </label>
                                                <select class="form-select" name="section" aria-label="Default select example">
                                                    <option selected>Select Section</option>
                                                    <option value="Rizal">Rizal</option>
                                                    <option value="Quezon">Quezon</option>
                                                    <option value="Mabini">Mabini</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                   
                                    <div class="custom-form-group mt-2">
                                        <label class="text-uppercase" for="password">Password</label>
                                        <input type="password" id="password"  Placeholder = "Password" name="password" class="form-contol" /><span class="pb-1"><i id="showCursor" class="fas fa-eye-slash" onclick="showPassword(event)"></i></span>
                                        @error('password')
                                        <p class="text-danger">
                                            {{$message}}
                                        </p>
                                        @enderror
                                    </div>
                                    <div class="custom-form-group mt-2">
                                        <label class="text-uppercase" for="password">Re-enter Password</label>
                                        <input type="password"  Placeholder = "Re-enter Password" name="password_confirmation" id="password_confirmation" class="form-contol" /><span class="pb-1"><i id="showCursor" class="fas fa-eye-slash" onclick="showPassword(event)"></i></span>
                                    </div>
                                    <p class="mt-2 text-center">Already Have an Account? <a href="/">Sign-in</a></p>
                                    <div class="mt-5">
                                    <button class="w-100 p-2 d-block btn-danger custom-btn text-dark fw-bold" >Sign Up</button>
                                    </div>
                                    <br>
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