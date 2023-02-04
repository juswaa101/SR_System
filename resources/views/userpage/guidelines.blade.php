<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <link href="assets/images/logo.jpg" rel="icon">
    <link href="assets/images/logo.jpg" rel="apple-touch-icon">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{  asset('assets/css//nav.css')}}">

    <link rel="stylesheet" href="{{  asset('assets/css//login.css')}}">
    <link rel="stylesheet" href="{{  asset('assets/css//app.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <script type="text/javascript">
      google.charts.load("current", {packages:['corechart']});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ["Stand", "Percentage", { role: "style" } ],
          ["STEM",{{$stem}} , "green"],
          ["ABM", {{$abm}}, "yellow"],
          ["COOKERY", {{$cookery}}, "blue"],
          ["HUMSS", {{$humss}}, "color: red"]
        ]);

        var view = new google.visualization.DataView(data);
        view.setColumns([0, 1,
                        { calc: "stringify",
                          sourceColumn: 1,
                          type: "string",
                          role: "annotation" },
                        2]);

        var options = {
          title: "USER EXAM DETAILS",
          width: 600,
          height: 400,
          bar: {groupWidth: "95%"},
          legend: { position: "none" },
        };
        var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
        chart.draw(view, options);
      }
    </script>

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
                <a class="nav-link mx-2 active" aria-current="/teacherhomepage" href="/landingpage">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mx-2 text-light" aria-current="/teacherhomepage" href="#stem">STEM</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mx-2 text-light" aria-current="/teacherhomepage" href="#abm">ABM</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mx-2 text-light" aria-current="/teacherhomepage" href="#humss">HUMSS</a>
                </li>
                <li class="nav-item">
                <a class="nav-link mx-2 text-light" aria-current="/teacherhomepage" href="#cookery">COOKERY</a>
                </li>
                <li class="nav-item">
                <!-- Button trigger modal -->
                <button type="button" class="nav-link mx-2 active btn " data-bs-toggle="modal" data-bs-target="#exampleModal">
                <i class="fa fa-user" style="font-size:20px;color:black"></i>
                </button>
                </li>
                <li class="nav-item">
                <a class="nav-link mx-2 text-light mt-1" href="/logout"><i class="fa fa-sign-out" style="font-size:30px;color:red"></i> </a>
                </li>
            </ul>
            </div>
        </div>
    </nav>
    <br><br>
    
    <!-- STEM -->
    <section id="stem" class="m-2">
        <div class="container-fluid bg-light rounded p-3">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <p class="h1 text-center fw-bold">
                            (STEM) SCIENCE, TECHNOLOGY, ENGINEERING, & MATHEMATICS
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="assets/images/stem.png" alt="" class="img-thumbnail mt-3">
                            </div>
                            <div class="col-md-7 mt-2">
                                <div class="row">
                                    <ul>
                                        <li>
                                            <p class="h3">WHAT IS STEM?</p>
                                            <ul>
                                                <li>
                                                    <p class="fs-5">
                                                        The Science, Technology, Engineering, and Mathematics (stem)
                                                        Strand is an approach to learning  and development that integrates
                                                        the areas of science, technology, engineering, and mathematics. The 
                                                        difference of the STEM curriculum with the other strand and tracks is
                                                        the focus on adcance concept and topics.
                                                    </p>
                                                </ol>
                                            </ul>
                                        </li>
                                        <br>
                                        <li>
                                            <p class="h3">PROGRAM OUTCOMES: </p>
                                            <ul>
                                                <li>
                                                    <p  class="fs-5">
                                                        Uder the STEM STRAND, you can become a pilot, an architect, an astrophysicist,
                                                        a biologist, a chemist, an engineer,adentist, a nutritionist, a nurse, adoctor,
                                                        and a lot more. Those who are alo intersted in Marine Engineering should take this
                                                        track.
                                                    </p>
                                                </ol>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                <ul>
                                    <li>
                                        <p class="h3">SAMPLE WORK </p>
                                    </li>
                                </ul>
                                    <div class="col-md-3">
                                        <img src="assets/images/pilot.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/archi.webp"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/nurse.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/astro.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/dentist.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/doctor.jfif"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/engr.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/bio.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                </div>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ABM -->
    <br>
    <section id="abm" style="position :relative;">
        <div class="container-fluid  rounded p-3">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <p class="h1 text-center fw-bold">
                            (ABM) ACCOUNTANCY, BUSINESS & MANAGEMENT
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            <div class="col-md-4 text-center">
                                <img src="assets/images/abms.png" alt="" class="img-thumbnail mt-3">
                            </div>
                            <div class="col-md-4  p-5">
                                <div class="row">
                                    <ul>
                                        <li>
                                            <p class="h3">WHAT IS ABM?</p>
                                            <ul>
                                                <li>
                                                    <p class="fs-5">
                                                        The Accountancy, Business, and Management(ABM) Strand focuses on the
                                                        basic concept of financial management, corporate operations, and all
                                                        things that are accounted for.
                                                    </p>
                                                </li>
                                            </ul>
                                        </li>
                                        <br>
                                        <li>
                                            <p class="h3">PROGRAM OUTCOMES: </p>
                                            <ul class="fs-5">
                                                <li>Sales Manager</li>
                                                <li>Human Resources</li>
                                                <li>Marketing Director</li>
                                                <li>Project Officer</li>
                                                <li>Bookkeeper</li>
                                                <li>Accounting Clerk</li>
                                                <li>Internal Auditor</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                           <div class="col-md-4">
                            <p class="h3 text-center"> SAMPLE WORK</p>
                            <div class="row">
                                <div class="col-md-6">
                                    <img src="assets/images/po.jpg" alt="" class="img-thumbnail mt-3">
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/images/ia.jfif" alt="" style="height:78%; width:100%;" class="img-thumbnail mt-3">
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/images/hr.jpg" alt="" class="img-thumbnail mt-3" style="height:78%; width:100%;">
                                </div>
                                <div class="col-md-6">
                                    <img src="assets/images/bk.jpg" alt="" style="height:78%; width:100%;" class="img-thumbnail mt-3">
                                </div>
                            </div>
                           </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- COOKERY -->
     <br>
     <section id="cookery" class="m-2">
        <div class="container-fluid bg-light rounded p-3">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <p class="h1 text-center fw-bold">
                            (HE) HOME ECONOMICS / COOKERY
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col-md-5 mt-2 p-5">
                                <div class="row">
                                    <ul>
                                        <li>
                                            <p class="h3">WHAT IS HE / COOKERY?</p>
                                            <ul>
                                                <li>
                                                    <p class="fs-5">
                                                        The HE / Cookery Strand offers various specializations that can lead to livelihood
                                                        projects at home. This strand aims to give you job-ready skills that can help you to
                                                        finding the right employee. it generally prepares you to meet the standard requirement 
                                                        and competency-based assessment of TESDA as well as hone your readiness in taking up a
                                                        college degree related  to Entrepreneurship, Hospitability, Business, Food Management,
                                                        Nutrition, Culinary arts, Food technology, Tourism, Fashin Management, And Interior Design.
                                                    </p>
                                                </ol>
                                            </ul>
                                        </li>
                                        <br>
                                        <li>
                                            <p class="h3">PROGRAM OUTCOMES: </p>
                                            <ul>
                                                <li>
                                                    <p class="fs-5">
                                                        Among the included subjects in the SHS curriculum for the HE / COOKERY Strand 
                                                        are courses on bartending, cookery, bread ang pastry, food and beverage, house keeping
                                                        , caregiving, beauty care, tourism, handicraft, and more! This is the SHS track 
                                                        that fits you if you wish to make a career as a Baker, Barista, Stylist, Tour Guide,
                                                        Therapist, or perhaps set up business related to the aforementioned area of expertise.
                                                    </p>
                                                </ol>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-2 mt-2">
                                <div class="col-md-12 mt-2">
                                    <img src="assets/images/bt.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                </div>
                                <div class="col-md-12 mt-1">
                                    <img src="assets/images/baker.webp"  alt="" class="img-thumbnail" style="height:100%;">
                                </div>
                                <div class="col-md-12 mt-1">
                                    <img src="assets/images/cheff.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img src="assets/images/he.png" alt="" class="img-thumbnail mt-3" style="height:90%;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- HUMSS -->
      <br>
     <section id="humss" class="m-2">
        <div class="container-fluid bg-light rounded p-3">
            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <p class="h1 text-center fw-bold">
                            (HUMMS) HUMANITIES & SOCIAL SCIENCES
                        </p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7 mt-2 p-5">
                                <div class="row">
                                    <ul>
                                        <li>
                                            <p class="h3">WHAT IS HUMSS?</p>
                                            <ul>
                                                <li>
                                                    <p class="fs-5">
                                                        The Humanities and Social Sciences or HUMSS strand is design for those
                                                        who are ready to take on the world and talk to a lot of people, This is
                                                        for you if you are considering talking up journalism, communication arts,
                                                        liberal arts, education, and other social sciences-related courses in college.
                                                    </p>
                                                </ol>
                                            </ul>
                                        </li>
                                        <br>
                                        <li>
                                            <p class="h3">PROGRAM OUTCOMES: </p>
                                            <ul>
                                                <li>
                                                    <p class="fs-5">
                                                        If you take this strand, you could be looking forward to becoming a teacher
                                                        , pyschologist, a lawyer, a writer, a social worker, or a reporter someday.
                                                        This strand basically focuses on improving your communication skills.
                                                    </p>
                                                </ol>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                                <div class="row">
                                <ul>
                                    <li>
                                        <p class="h3">SAMPLE WORK </p>
                                    </li>
                                </ul>
                                    <div class="col-md-3">
                                        <img src="assets/images/pilot.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/archi.webp"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/nurse.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/astro.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/dentist.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/doctor.jfif"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/engr.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                    <div class="col-md-3">
                                        <img src="assets/images/bio.jpg"  alt="" class="img-thumbnail" style="height:100%;">
                                    </div>
                                </div>
                            </div>  
                            <div class="col-md-5">
                                <img src="assets/images/humss.png" alt="" class="img-thumbnail mt-3">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">User Info</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style = "background-image: url('assets/images/mainbg.png');">
            <input type="hidden" name="myid" value="{{Session::get('id')}}">
            <div class="col-text-center">
              <p class="h3 text-center text-warning">
                RECOMMENDED STRAND: <span class="bg-info text-dark" style="padding:0 20px;border-radius:25px;">{{$recomended}} </span>
              </p>
            </div>
            <div class="row mt-2">
                <div class="col-md-5 ">
                <div class="form-group rounded text-center" style ="background-color:rgba(114, 114, 114, 1);">
                    <label for="" class="text-center mt-1 text-light h5">Fullname</label>
                    <input type="text" name="Fullname" class="form-control text-center fw-bold" value="{{$fullname}}">
                    @error('Fullname')
                    <p class="text-danger">
                    {{$message}}
                    </p>
                    <script>
                        $(window).on('load', function() {
                                $('#exampleModal').modal('show');
                            });
                        </script>
                    </script>
                    @enderror
                </div>

                <div class="form-group mt-2 rounded text-center" style ="background-color:rgba(114, 114, 114, 1);">
                    <label for="" class="text-center mt-1 text-light h5">LRN: </label>
                    <input type="text" name="lrn" class="form-control text-center fw-bold" value="{{$lrn}}">
                    @error('lrn')
                    <p class="text-danger">
                    {{$message}}
                    </p>
                    <script>
                        $(window).on('load', function() {
                                $('#exampleModal').modal('show');
                            });
                        </script>
                    </script>
                    @enderror
                </div>
                <div class="form-group mt-2 rounded text-center" style ="background-color:rgba(114, 114, 114, 1);">
                <label for="" class="h5 mt-1 text-center text-light fw-bold">Section: </label>
                <div class="custom-form-group mt-2">
                    <select class="form-select text-center" name="section" aria-label="Default select example">
                        <option selected>{{$section}}</option>
                    </select>
                </div>
              </div>
                <div class="form-group mt-2 rounded text-center" style ="background-color:rgba(114, 114, 114, 1);">
                    <label for="" class="text-center mt-1 text-light h5">MATH GRADE: </label>
                    <input type="number" name="math" class="form-control text-center fw-bold" value="{{$math}}">
                    @error('lrn')
                    <p class="text-danger">
                    {{$message}}
                    </p>
                    <script>
                        $(window).on('load', function() {
                                $('#exampleModal').modal('show');
                            });
                        </script>
                    </script>
                    @enderror
                </div>

                <div class="form-group mt-2 rounded text-center" style ="background-color:rgba(114, 114, 114, 1);">
                    <label for="" class="text-center mt-1 text-light h5">SCIENCE GRADE: </label>
                    <input type="number" name="science" class="form-control text-center fw-bold" value="{{$science}}">
                    @error('lrn')
                    <p class="text-danger">
                    {{$message}}
                    </p>
                    <script>
                        $(window).on('load', function() {
                                $('#exampleModal').modal('show');
                            });
                        </script>
                    </script>
                    @enderror
                </div>
                </div>
                <div class="col-md-7" id="columnchart_values">
                </div>
            </div>
            </div>
        <div class="modal-footer bg-secondary">
            <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Close</button>
        </div>
        </div>
    </div>
    </div>

    
    
</body>
</html>