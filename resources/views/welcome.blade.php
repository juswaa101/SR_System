<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />

    {{-- <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" /> --}}
    <link rel="stylesheet" href="css/style.css" />

    <title>SR-SYSTEM</title>

    <style>
        /* body {
            background-image: url({{ asset('assets/images/bgtransparent.png') }});
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
        } */


        .container {
            max-width: 950px;
        }

        .icon {
            width: 50px;
            height: 50px;
        }

        .box {
            min-height: 180px;
        }
    </style>
</head>

<body>

<nav>
    <div class="bg-white py-3 ">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <div class=""><a href="#"> <img src="assets/images/logo.PNG?" alt=""
                            height="30" /></a>


                </div>
                <div class="d-flex align-items-center">
                    <!-- <div class="fw-bold me-4 text-secondary">Explore</div> -->
                    <div class="fw-bold text-primary">
                        <a href="/login"
                            class=" text-decoration-none btn btn-outline-primary smallTxt fw-bold round-1 px-3">
                            Login <i class="fas fa-sign-in-alt ms-2"></i>
                        </a>
                    </div>
                </div>


            </div>
        </div>
    </div>
</nav>

  
 

    <div class="container mt-5">
        <div class="row align-items-center  mb-5">
            <div class="col-md-6">
                <div class="animate__animated animate__fadeIn">
                    <img src="{{ asset('assets/images/bgtransparent.png') }}" style="object-fit: contain; width: 100%;"
                        alt="">
                </div>
            </div>
            <div class="col-md-6">
                <div class="p-2 animate__animated animate__fadeInRight">
                    <div class="display-4 fw-bolder text-info mt-md-5 mt-sm-0">A Great Place For Education.</div>
                    <div class="smallTxt mb-2 fst-italic text-secondary  ">-Virgil</div>
                    <div class="h6 text-secondary">
                        <span class="fw-bold">SR-System</span> is a web-based Online Lorem ipsum dolor sit, amet consectetur adipisicing elit. Provident nisi, repudiandae aut impedit illo voluptatem reprehenderit suscipit! Autem, corporis quis.
                    </div>
                </div>

            </div>

        </div>
    </div>
    <div class="bg-light">
        <div class="container">

            
        </div>
    </div>
   
<div style="height:100px">
</div>
    <footer>
        <div class="bg-light text-center p-2 py-3">
            <div class="smallTxt fw-light">Copyright &copy; 2023, RedArrowNationalHighSchool. All Rights Reserved.</div>
        </div>
    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    
</body>

</html>
