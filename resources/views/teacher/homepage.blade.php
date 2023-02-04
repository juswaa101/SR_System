<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Page</title>

    <link href="assets/images/logo.jpg" rel="icon">
    <link href="assets/images/logo.jpg" rel="apple-touch-icon">
    

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{  asset('assets/css//login.css')}}">
    <link rel="stylesheet" href="{{  asset('assets/css//app.css')}}">
    <link rel="stylesheet" href="{{  asset('assets/css//nav.css')}}">

    <script src="{{  asset('assets/js//nav.js')}}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  


    <style>
        body{
            background-image: url('assets/images/mainbg.jpg');
        }
    </style>
    
</head>
<body>
    
    <nav class="navbar navbar-expand-sm navbar-light" id="neubar">
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
            <a class="nav-link mx-2 text-light " href="/studentlist">STUDENT</a>
            </li>
            <li class="nav-item">
            <a class="nav-link mx-2 text-light" href="/logout">LOGOUT </a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
    @if(Session::get('success'))
    <br>
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="alert alert-success col text-center">
                    {{ Session::get('success') }}
                </div>
            </div>
        </div>
        <script>
        $('div.alert').delay(3000).fadeOut(350);
    </script>
    @endif
    <?php if(isset($_GET['delete'])){ ?>
        <?php $id = $_GET['mydelid']; ?>
        <script>
             $(window).on('load', function() {
                $('#exampleModal2').modal('show');
            });
        </script>
        <!-- Modal -->  
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <img src="/assets/images/warning.gif" class="img-thumbnail" alt="df">
            </div>
            <div class="modal-body">
                <p class="h3 text-center">Are You Sure You Want to Delete This Item?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <?php echo "<a class='btn btn-danger' href='/delexam/{$id}' role='button'>Delete</a>"; ?>
                
            </div>
            </div>
        </div>
        </div>
    <?php }?>
    @if(Session::get('id'))
        <script>
             $(window).on('load', function() {
                $('#exampleModal1').modal('show');
            });
        </script>
    @endif
        <div class="container-fluid">
            <div class="row justify-content-center mt-5">
                <div class="col-md-10">
                </div>
            </div>
        </div>
        <div class="container-fluid mt-2">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header bg-primary">
                            <div class="row">
                                <div class="col-2">
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-warning addItemBtn fs-5 mt-3 fw-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        ADD EXAM <i class="fa fa-plus" style="font-size:20px;"></i>
                                    </button>
                                </div>
                                <div class="col-8">
                                    <div class="col-mb-3 text-end">
                                        <p class="display-5 fw-bold text-light text-center">List Of Exam<i class="fa fa-edit" style="font-size:40px"></i></p> 
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="col-mb-3 text-end mt-3">
                                        <button class="btn btn-warning " id="download" style="border-radius: 5px;"><i class="fa fa-download" aria-hidden="true"></i> PDF</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th>Choice A</th>
                                        <th>Choice B</th>
                                        <th>Choice C</th>
                                        <th>Choice D</th>
                                        <th>Answer</th>
                                        <th>Exam Code</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($examList as $item)
                                        <tr>
                                            <td >{{$item -> question}}</td>
                                            <td>{{$item -> choice_a}}</td>
                                            <td>{{$item -> choice_b}}</td>
                                            <td>{{$item -> choice_c}}</td>
                                            <td>{{$item -> choice_d}}</td>
                                            <td>{{$item -> answer}}</td>
                                            <td>
                                                <?php
                                                    if($item -> examcode == 1){
                                                        echo("STEM");
                                                    } 
                                                    else if($item -> examcode == 2){
                                                        echo("ABM");
                                                    } 
                                                    else if($item -> examcode == 3){
                                                        echo("HUMSS");
                                                    }
                                                    else{
                                                        echo("COOKERY   ");
                                                    }
                                                ?>
                                            </td>
                                            <td style="width:100px">
                                                <form action="" method="get">
                                                    <input type="hidden" name="mydelid" value ="{{$item -> id}}">
                                                <button type="submit" name="delete" class="btn btn-danger"><i class="fa fa-trash" style="font-size:25x;"></i></button>
                                                <a class="btn btn-info" href="/edit/{{$item -> id}}" role="button"><i class="fa fa-edit" style="font-size:25x;"></i></a>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                <tfoot>
                                    <tr>
                                        <th>Question</th>
                                        <th>Choice A</th>
                                        <th>Choice B</th>
                                        <th>Choice C</th>
                                        <th>Choice D</th>
                                        <th>Answer</th>
                                        <th>Exam Code</th>
                                        <th>Action</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <br>

   
    
<!-- Modal -->
<form action="addexam" method="post">]
    @csrf
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add Exam Item</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body" style = "background-image: url('assets/images/mainbg.png');">
            <div class="form-group rounded text-center" style ="background-color:rgba(114, 114, 114, .8);">
                <label for="" class=" text-center text-light mt-1">Question</label>
                <textarea name="question" class="restextbox" rows="5"></textarea>
                @error('question')
                    <p class="text-danger">{{$message}}</p>
                    <script>
                         $(window).on('load', function() {
                            $('#exampleModal').modal('show');
                        });
                    </script>
                @enderror
            </div>
            <div class="mt-2">&nbsp;</div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-2 rounded text-center" style ="background-color:rgba(114, 114, 114, .8);">
                        <label for="" class="text-light  text-center ">Exam Category</label>
                        <select class="form-select text-center" name="examcode" aria-label="Default select example">
                            <option value="1">STEM</option>
                            <option value="2">ABM</option>
                            <option value="3">HUMSS</option>
                            <option value="4">COOKERY</option>
                        </select>
                        @error('examcode')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-2">
                    <div class="form-group rounded text-center" style ="background-color:rgba(114, 114, 114, .8);">
                        <label for="" class="text-center text-light ">Answer</label>
                        <input type="text" class="form-control text-center" placeholder="ENTER ANSWER" name="Answer">
                    </div>
                        @error('Answer')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal').modal('show');
                                });
                            </script>
                        @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-4 rounded " style ="background-color:rgba(114, 114, 114, .8);">
                        <label for="" class=" text-light mt-1">&nbsp;Choice A</label>
                        <input type="text" class="form-control" placeholder="ENTER CHOICE A" name="choice_A">
                        @error('choice_A')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-4 rounded " style ="background-color:rgba(114, 114, 114, .8);">
                        <label for="" class="text-light mt-1">&nbsp;Choice B</label>
                        <input type="text" class="form-control" placeholder="ENTER CHOICE B" name="choice_B">
                        @error('choice_B')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group mt-3 rounded " style ="background-color:rgba(114, 114, 114, .8);">
                        <label for="" class="text-light mt-1">&nbsp;Choice C</label>
                        <input type="text" class="form-control" placeholder="ENTER CHOICE C" name="choice_C">
                        @error('choice_C')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group mt-3 rounded " style ="background-color:rgba(114, 114, 114, .8);">
                        <label for="" class="text-light mt-1">&nbsp;Choice D</label>
                        <input type="text" class="form-control" placeholder="ENTER CHOICE D" name="choice_D">
                        @error('choice_D')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-secondary">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-warning" type="submit">Add Item</button>
        </div>
        </div>
    </div>
    </div>
</form>
<!-- Modal -->
<form action="saveedit" method="post">]
    @csrf
    <div class="modal fade mt-5" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header bg-secondary">
            <h1 class="modal-title text-light fs-5" id="exampleModalLabel">Update Item</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body"  style = "background-image: url('assets/images/mainbg.png');">
            <input type="hidden" name="id" value="{{Session::get('id')}}">
            <div class="form-group">
                <label for="" class="text-light">Question</label>
                <textarea name="question" class="restextbox" rows="5">{{Session('question')}}</textarea>
                @error('question')
                    <p class="text-danger">{{$message}}</p>
                    <script>
                         $(window).on('load', function() {
                            $('#exampleModal').modal('show');
                        });
                    </script>
                @enderror
            </div>
            <div class="mt-2">&nbsp;</div>
            <div class="row">
                <div class="col-md-6" >
                    <div class="form-group mt-2 text-light text-center rounded mt-1" style ="background-color:rgba(114, 114, 114, .8);" >
                        <label for="">SELECT EXAM FOR</label>
                        <select class="form-select text-center" name="examcode" aria-label="Default select example">
                            <option value ="{{Session::get('code')}}" selected>
                            <?php
                                if(Session::get('code') == 1){
                                    echo("STEM");
                                } 
                                else if(Session::get('code') == 2){
                                    echo("ABM");
                                } 
                                else if(Session::get('code') == 3){
                                    echo("HUMSS");
                                }
                                else{
                                    echo("COOKERY");
                                }
                            ?>
                            </option>
                            <option value="1">STEM</option>
                            <option value="2">ABM</option>
                            <option value="3">HUMSS</option>
                            <option value="4">COOKERY</option>
                        </select>
                        @error('examcode')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal1').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6 mt-1">
                    <div class="form-group text-light text-center rounded mt-1" style ="background-color:rgba(114, 114, 114, .8);" >
                        <label for="">Answer</label>
                        <input type="text" class="form-control text-center" placeholder="ENTER ANSWER" name="Answer" value="{{Session::get('answer')}}">
                    </div>
                        @error('Answer')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal1').modal('show');
                                });
                            </script>
                        @enderror
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group text-light text-center rounded mt-1" style ="background-color:rgba(114, 114, 114, .8);" >
                        <label for="">Choice A</label>
                        <input type="text" class="form-control text-center" placeholder="ENTER CHOICE A" name="choice_A" value="{{Session::get('a')}}">
                        @error('choice_A')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal1').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group text-light text-center rounded mt-1" style ="background-color:rgba(114, 114, 114, .8);" >
                        <label for="">Choice B</label>
                        <input type="text" class="form-control text-center" placeholder="ENTER CHOICE B" name="choice_B" value="{{Session::get('b')}}">
                        @error('choice_B')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal1').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-md-6">
                    <div class="form-group text-light text-center rounded mt-1" style ="background-color:rgba(114, 114, 114, .8);" ">
                        <label for="">Choice C</label>
                        <input type="text" class="form-control text-center" placeholder="ENTER CHOICE C" name="choice_C" value="{{Session::get('c')}}">
                        @error('choice_C')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal1').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group  text-light text-center rounded mt-1" style ="background-color:rgba(114, 114, 114, .8);"">
                        <label for="">Choice D</label>
                        <input type="text" class="form-control text-center" placeholder="ENTER CHOICE D" name="choice_D" value="{{Session::get('d')}}">
                        @error('choice_D')
                            <p class="text-danger">{{$message}}</p>
                            <script>
                                $(window).on('load', function() {
                                    $('#exampleModal1').modal('show');
                                });
                            </script>
                        @enderror
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer bg-secondary">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
            <button class="btn btn-warning" type="submit">Save Changes</button>
        </div>
        </div>
    </div>
    </div>
</form>
    @include('sweetalert::alert')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>
    <script>
        $(document).ready(function () {
            $('#example').DataTable();
        });
    </script>
    <script>
                
        window.onload = function () {
            document.getElementById("download")
                .addEventListener("click", () => {
                    const invoice = this.document.getElementById("example");
                    console.log(invoice);
                    console.log(window);
                    var opt = {
                        margin: 1,
                        filename: 'myfile.pdf',
                        image: { type: 'jpeg', quality: 10000 },
                        html2canvas: { scrollX: 0,
                            scrollY: 0,
                            scale: window.devicePixelRatio  && window.devicePixelRatio > 0.4 ?1 :.3},
                        jsPDF: { unit: 'in', format: 'legal', orientation: 'portrait' }
                    };
                    html2pdf().from(invoice).set(opt).save();
                })
        }
    </script>
</body>
</html>