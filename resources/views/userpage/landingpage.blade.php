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
                <a class="nav-link mx-2 active" aria-current="/teacherhomepage" href="#">Home</a>
                
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

    <?php if(isset($_GET['takeexam'])){ ?>
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
                <p class="h3 text-center">Are you ready to take the exam?</p>
            </div>
            <div class="modal-footer">
                <a class='btn btn-secondary' href='/landingpage' role='button'>NO</a>
                <?php echo "<a class='btn btn-success' href='/exam' role='button'>YES</a>"; ?>
                
            </div>
            </div>
        </div>
        </div>
    <?php }?>

    <div class="containerfluid">
        <div class="col text-center">
            <img src="assets/images/nobglogo.png" class="img-thumnail col-3" alt="">
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3">
                <div class="card" style="background-color:rgba(0, 0, 0, 0);">
                    <div class="card-header text-center">
                      @if($taken_exam == 0)	
                        <form action="" method="get">
                          <button type="submit" name="takeexam" class="btn ">
                            <img src="assets/images/exam.png"   class ="img-button img-fluid edging" alt="">
                            <p class="h3 mt-1  buttonselection rounded p-1">Take Exam</p>
                          </button>
                        </form>
                      @elseif($taken_exam == 1)	
                        <a class="btn" href="/examtaken" role="button">
                            <img src="assets/images/exam.png"  class ="img-button img-fluid edging" alt="">
                            <p class="h3 mt-1  buttonselection rounded p-1">Take Exam</p>
                        </a>
                      @endif
                    
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color:rgba(0, 0, 0, 0);">
                    <div class="card-header text-center">
                      <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal4">
                      <img src="assets/images/forum.png" class ="img-button img-fluid edging" alt="">
                            <p class="h3 mt-1  buttonselection rounded p-1">Forum</p>
                      </button>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color:rgba(0, 0, 0, 0);">
                    <div class="card-header text-center">
                      @if($taken_survey == 0)	
                      <button type="button" class="btn " data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <img src="assets/images/survey.jfif" class ="img-button img-fluid edging" alt="">
                        <p class="h3 mt-1  buttonselection rounded p-1">Survey</p>
                      </button>
                      @elseif($taken_survey == 1)	
                        <a class="btn" href="/surveytaken" role="button">
                            <img src="assets/images/survey.jfif" class ="img-button img-fluid edging" alt="">
                            <p class="h3 mt-1  buttonselection rounded p-1">Survey</p>
                        </a>
                      @endif
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="background-color:rgba(0, 0, 0, 0);">
                    <div class="card-header text-center">
                        <a class="btn" href="/guidelines" role="button">
                            <img src="assets/images/gd.png" class ="img-button img-fluid edging" alt="">
                            <p class="h3 mt-1  buttonselection rounded p-1">Guidelines</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<!-- Modal -->
<form action="/takesurvey" method ="post">
  @csrf
  <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
        <div class="container " > 
            <div class="row bg-info" style ="border-radius:20px;">
                <div class="col-4 text-end">
                </div>
                <div class="col-4">
                    <p class="display-4 fw-bold text-light text-center">Take Survey</p>
                </div>
                <div class="col-md-4 mt-4 text-end">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fa fa-times " style="font-size:24px:"></i>
                    </button>
                </div>
            </div>
        </div>
          <div class="conatainer-fluid" style ="height:60vh">
              <div class="row rounded surveyrow m-2 p-2" id="first">
                @foreach($take_survey as $number => $item)
                <div class="form-group mt-2  rounded survey">
                  <label for="" class="text-dark" ><span class="fw-bold">{{$number += 1}}. </span>{{$item -> survey_question	}}</label>
                  <input type="text" class="form-control" placeholder="Answer" name = "{{$item -> id}}" value="{{old('1')}}">
                  @error('{{$item -> id	}}')
                    <p class="text-danger">This field is Required</p>
                    <script>
                       $(window).on('load', function() {
                            $('#exampleModal2').modal('show');
                        });
                    </script>
                  @enderror
                </div>
                @endforeach
              </div>
              
          </div>
              
        </div>
        <div class="modal-footer">
              <button type="submit" class="btn btn-info text-dark">Submit Survey</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>

<form action="/addforum" method ="post">
  @csrf
  <div class="modal fade" id="exampleModal4" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
      <div class="modal-content">
        <div class="modal-body">
        <section>
        <div class="container " > 
            <div class="row bg-info" style ="border-radius:20px;">
                <div class="col-4 text-end">
                </div>
                <div class="col-4">
                    <p class="display-4 fw-bold text-light text-center">Forum</p>
                </div>
                <div class="col-md-4 mt-4 text-end">
                    <button type="button" data-bs-dismiss="modal" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#add">
                        <i class="fa fa-times " style="font-size:24px:"></i>
                    </button>
                </div>
            </div>
        </div>
        <br>
        <div class="container border" style ="height:50vh;overflow-x: hidden;overflow-y: auto; background-color:rgba(255, 255, 255, 0.96);border-radius:50px;">
            <div class="wrapper">
                <div class="form">
                  @foreach($forums as $item)
                  <div class="bot-inbox inbox ">
                        <div class="row">
                            <div class="col-1">
                                <img class= "mt-2 img-fluid" src="https://th.bing.com/th/id/OIP.WOZKI0uQD-lA_7mQCs3zZQHaHa?pid=ImgDet&rs=1"alt="">
                            </div>
                            <div class="col-6 mt-2 fs-5 p-2 w-auto bg-info " style = border-radius:20px;>
                              {{$item -> 	youcomment}}
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-1">
                            </div>
                            <div class="col-6 " >
                            {{$item -> 	date}} / &nbsp;{{$item -> 	time}}
                            </div>
                        </div>
                    </div>
                  @endforeach
                </div>
            </div>
        </div>
        @if($taken_forum == 1)
        <div class="container">
            <div class="input-group mb-3 mt-2">
            <input type="text" id="data" name="mycomment" class="form-control" placeholder="Enter comment here.." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button id="send-btn" class="btn btn-info" type="submit" disabled id="button-addon2">Submit</button>
            </div>
        </div>
        @elseif($taken_forum == 0)
        <div class="container">
            <div class="input-group mb-3 mt-2">
            <input type="text" id="data" name="mycomment" class="form-control" placeholder="Enter comment here.." aria-label="Recipient's username" aria-describedby="button-addon2">
            <button id="send-btn" class="btn btn-info" type="submit" id="button-addon2">Submit</button>
            </div>
        </div>
        @endif
        
    </section>
        </div>
        </div>
      </div>
    </div>
  </div>
</form>

@include ('sweetalert::alert')
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
             <div class="row">
              <div class="col-md-4">
                <div class="form-group rounded text-center" style ="background-color:rgba(114, 114, 114, 1);">
                  <label for="" class="text-center mt-1 text-light h5">First Name</label>
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
              </div>
              <div class="col-md-4">
                <div class="form-group rounded text-center" style ="background-color:rgba(114, 114, 114, 1);">
                  <label for="" class="text-center mt-1 text-light h5">Last Name</label>
                  <input type="text" name="lname" class="form-control text-center fw-bold" value="{{$lname}}">
                  @error('lname')
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
              <div class="col-md-4">
                <div class="form-group rounded text-center" style ="background-color:rgba(114, 114, 114, 1);">
                  <label for="" class="text-center mt-1 text-light h5">Middle Name</label>
                  <input type="text" name="mname" class="form-control text-center fw-bold" value="{{$mname}}">
                  @error('mname')
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
<script>
  function myfirst(){
    document.getElementById("first").style.display = 'block';
    document.getElementById("second").style.display = 'none';
    document.getElementById("third").style.display = 'none';
    document.getElementById("fourth").style.display = 'none';
    document.getElementById("myssecond").style.backgroundColor  = 'blue';
    document.getElementById("mythird").style.backgroundColor  = 'blue';
    document.getElementById("myfourth").style.backgroundColor  = 'blue';
    document.getElementById("myssecond").style.color  = 'white';
    document.getElementById("mythird").style.color  = 'white';
    document.getElementById("myfourth").style.color  = 'white';
  }
  function mysecond(){
    document.getElementById("second").style.display = 'block';
    document.getElementById("myssecond").style.backgroundColor  = 'yellow';
    document.getElementById("myssecond").style.color  = 'black';
    document.getElementById("mythird").style.backgroundColor  = 'blue';
    document.getElementById("myfourth").style.backgroundColor  = 'blue';
    document.getElementById("mythird").style.color  = 'white';
    document.getElementById("myfourth").style.color  = 'white';
    document.getElementById("first").style.display = 'none';
    document.getElementById("third").style.display = 'none';
    document.getElementById("fourth").style.display = 'none';
  }
  function myfthird(){
    document.getElementById("third").style.display = 'block';
    document.getElementById("mythird").style.backgroundColor  = 'yellow';
    document.getElementById("myssecond").style.backgroundColor  = 'yellow';
    document.getElementById("myfourth").style.backgroundColor  = 'blue';
    document.getElementById("myfourth").style.color  = 'white';
    document.getElementById("myssecond").style.color  = 'black';
    document.getElementById("mythird").style.color  = 'black';
    document.getElementById("first").style.display = 'none';
    document.getElementById("second").style.display = 'none';
    document.getElementById("fourth").style.display = 'none';
    document.getElementById("mysubmit").style.display = 'none';
  }
  function last(){
    document.getElementById("fourth").style.display = 'block';
    document.getElementById("myfourth").style.backgroundColor  = 'yellow';
    document.getElementById("myssecond").style.backgroundColor  = 'yellow';
    document.getElementById("myssecond").style.color  = 'black';
    document.getElementById("mythird").style.backgroundColor  = 'yellow';
    document.getElementById("mythird").style.color  = 'black';
    document.getElementById("myfourth").style.color  = 'black';
    document.getElementById("first").style.display = 'none';
    document.getElementById("second").style.display = 'none';
    document.getElementById("third").style.display = 'none';
    document.getElementById("mysubmit").style.display = 'block';
  }
</script>
</body>
</html>