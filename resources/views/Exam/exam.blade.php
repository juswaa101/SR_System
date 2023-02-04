<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exam</title>

    <link href="assets/images/logo.jpg" rel="icon">
    <link href="assets/images/logo.jpg" rel="apple-touch-icon">
    <link rel="stylesheet" href="{{  asset('assets/css//nav.css')}}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{  asset('assets/css//login.css')}}">
    <link rel="stylesheet" href="{{  asset('assets/css//app.css')}}">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <style>
        body{
            background-image: url('assets/images/mainbg.jpg');
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-sm navbar-light" id="neubar" >
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/images/nobglogo1.png" height="60" />SR-SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span><i class="fa fa-bars text-light"></i></span>
            </button>
        
            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto ">
                <li class="nav-item">
                    <form action="" method="get">
                        <button  class="nav-link mx-2 active" name="stillexam" type="submit">Home</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="" method="get">
                        <button  class=" btn nav-link mx-2 text-light" name="stillexam" type="submit">STEM</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="" method="get">
                        <button  class=" btn nav-link mx-2 text-light" name="stillexam" type="submit">ABM</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="" method="get">
                        <button  class=" btn nav-link mx-2 text-light" name="stillexam" type="submit">HUMSS</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="" method="get">
                        <button  class=" btn nav-link mx-2 text-light" name="stillexam" type="submit">COOKERY</button>
                    </form>
                </li>
                <li class="nav-item">
                <!-- Button trigger modal -->
                    <form action="" method="get">
                        <button  class="nav-link mx-2 active btn" name="stillexam" type="submit">COOKERY</button>
                    </form>
                </li>
                <li class="nav-item">
                    <form action="" method="get">
                        <button  class="btn nav-link mx-2 text-light" name="stillexam" type="submit"><i class="fa fa-sign-out" style="font-size:30px;color:red"></i></button>
                    </form>
                </li>
            </ul>
            </div>
        </div>
    </nav>
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10 examform">
                    <form action="pass_exam" class="p-5"  method = "post" >
                        @csrf
                        @foreach($exam as $index => $item)
                        <div class="form-group">
                                <label for="{{$index}}" class="h3 text-dark"><span class="fw-bold">{{$index +=1}}.</span> {{$item -> question}}</label>
                                <div class="container-fluid fs-5">
                                    <div class="form-check">
                                        <input class="form-check-input" required type="radio" name="{{$item -> id}}" id="{{$item -> id}}" value="{{$item -> choice_a}}">
                                        <label class=" text-dark form-check-label" for="{{$item -> id}}">
                                            {{$item -> choice_a}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$item -> id}}" id="{{$item -> id}}" value="{{$item -> choice_b}}">
                                        <label class="text-dark form-check-label" for="{{$item -> id}}">
                                            {{$item -> choice_b}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$item -> id}}" id="{{$item -> id}}" value="{{$item -> choice_c}}">
                                        <label class="text-dark form-check-label" for="{{$item -> id}}">
                                            {{$item -> choice_c}}
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="{{$item -> id}}" id="{{$item -> id}}" value="{{$item -> choice_d}}">
                                        <label class="text-dark form-check-label" for="{{$item -> id}}">
                                            {{$item -> choice_d}}
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <br>
                        @endforeach
                        <div id="bottom"></div>
                        <div class="col text-center">
                            <button class="btn btn-primary  fs-5" type="submit">Submit</button>
                        </div>
                    </form>
                    <a class="btn btn-primary" href="#neubar" style="position:fixed;bottom:10px;right:180px;" role="button">Back to Top <i class="fa fa-level-up" style="font-size:20px"></i></a>
                    <a class="btn btn-success" href="#bottom" style="position:fixed;bottom:10px;right:320px;" role="button">Bottom <i class="fa fa-caret-square-o-down" style="font-size:20px"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php if(isset($_GET['stillexam'])){ ?>
        <script>
             $(window).on('load', function() {
                $('#exampleModal2').modal('show');
            });
        </script>
        <!-- Modal -->  
        <div class="modal fade mt-5" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <img src="/assets/images/warning.gif" class="img-thumbnail" alt="df">
            </div>
            <div class="modal-body">
                <p class="h3 text-center">You Need to Finish The exam First!</p>
            </div>
            <div class="modal-footer text-center">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
            </div>
            </div>
        </div>
        </div>
    <?php }?>
</body>
</html>