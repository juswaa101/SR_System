<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Page</title>

    <link href="assets/images/logo.jpg" rel="icon">
    <link href="assets/images/logo.jpg" rel="apple-touch-icon">

    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css//login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css//app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css//nav.css') }}">

    <script src="{{ asset('assets/js//nav.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <script type="text/javascript">
        google.charts.load("current", {
            packages: ['corechart']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ["Stand", "Percentage", {
                    role: "style"
                }],
                ["STEM", {{ Session::get('stem') }}, "green"],
                ["ABM", {{ Session::get('abm') }}, "yellow"],
                ["COOKERY", {{ Session::get('cookery') }}, "blue"],
                ["HUMSS", {{ Session::get('humss') }}, "color: red"]
            ]);

            var view = new google.visualization.DataView(data);
            view.setColumns([0, 1,
                {
                    calc: "stringify",
                    sourceColumn: 1,
                    type: "string",
                    role: "annotation"
                },
                2
            ]);

            var options = {
                title: "USER EXAM DETAILS",
                width: 600,
                height: 380,
                bar: {
                    groupWidth: "95%"
                },
                legend: {
                    position: "none"
                },
            };
            var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
            chart.draw(view, options);
        }
    </script>

    <style>
        body {
            background-image: url('assets/images/mainbg.jpg');
        }
    </style>

</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light" id="neubar">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/images/nobglogo1.png" height="60" />SR-SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa fa-bars text-light"></i></span>
            </button>

            <div class=" collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" aria-current="/teacherhomepage" href="/teacherhomepage">Hi,
                            {{ Session::get('fname') }} {{ Session::get('mname') }} {{ Session::get('lname') }},
                            ({{ Str::upper(Session::get('usertype')) }})</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" aria-current="/teacherhomepage" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" aria-current="/surveylist"
                            href="/surveylist">Survey List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" aria-current="/announcement" href="/announcement">Guidelines
                            & Announcement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 active " href="/studentlist">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" href="/reports">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" href="/logout">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @if (Session::get('success'))
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
                    <?php echo "<a class='btn btn-danger' href='/deluser/{$id}' role='button'>Delete</a>"; ?>

                </div>
            </div>
        </div>
    </div>
    <?php }?>
    @if (Session::get('id'))
        <script>
            $(window).on('load', function() {
                $('#exampleModal1').modal('show');
            });
        </script>
    @endif
    <div class="container-fluid mt-5">
        <div class="row justify-content-center">
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
                                <button type="button" class="btn btn-warning addItemBtn fs-5 mt-3"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    ADD STUDENT <i class="fa fa-plus" style="font-size:20px;"></i>
                                </button>
                            </div>
                            <div class="col-8">
                                <div class="col-mb-3 text-end">
                                    <p class="display-5 fw-bold text-light text-center">Student list <i
                                            class="fa fa-edit" style="font-size:40px"></i></p>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="col-mb-3 text-end mt-3">
                                    <button class="btn btn-warning " id="download" style="border-radius: 5px;"><i
                                            class="fa fa-download" aria-hidden="true"></i> PDF</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Fullname</th>
                                    <th>LRN</th>
                                    <th>User Type</th>
                                    <th>Section</th>
                                    <th>Exam</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($studentlist as $item)
                                    <tr>
                                        <td>{{ $item->fname }}</td>
                                        <td>{{ $item->lrn }}</td>
                                        <td>{{ $item->usertype }}</td>
                                        <td>{{ $item->section }}</td>
                                        <?php if($item -> take_exam == 1){ ?>
                                        <td>DONE</td>
                                        <?php }else{ ?>
                                        <td>WAITING</td>
                                        <?php }?>
                                        <td>

                                            <form action="" method="get">
                                                <input type="hidden" name="mydelid" value="{{ $item->id }}">
                                                <a class="btn btn-info" href="/edituser/{{ $item->id }}"
                                                    role="button"><i class="fa fa-edit"
                                                        style="font-size:25x;"></i></a>
                                                <button type="submit" name="delete" class="btn btn-danger"><i
                                                        class="fa fa-trash" style="font-size:25x;"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            <tfoot>
                                <tr>
                                    <th>Fullname</th>
                                    <th>LRN</th>
                                    <th>User Type</th>
                                    <th>Section</th>
                                    <th>Exam</th>
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
    <form action="addstudents" method="post">]
        @csrf
        <div class="modal fade mt-5" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">Add New Student</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-image: url('assets/images/mainbg.png');">
                        <div class="form-group text-center rounded" style="background-color:rgba(114, 114, 114, 1);">
                            <label for="" class="mt-1 h5 text-light">First Name</label>
                            <input type="text" name="Fullname" class="form-control text-center fw-bold"
                                value="{{ old('Fullname') }}">
                            @error('Fullname')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                <script>
                                    $(window).on('load', function() {
                                        $('#exampleModal').modal('show');
                                    });
                                </script>
                                </script>
                            @enderror
                        </div>
                        <div class="form-group text-center rounded mt-2"
                            style="background-color:rgba(114, 114, 114, 1);">
                            <label for="" class="mt-1 h5 text-light">Last Name</label>
                            <input type="text" name="lname" class="form-control text-center fw-bold"
                                value="{{ old('lname') }}">
                            @error('lname')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                <script>
                                    $(window).on('load', function() {
                                        $('#exampleModal').modal('show');
                                    });
                                </script>
                                </script>
                            @enderror
                        </div>
                        <div class="form-group text-center rounded mt-2"
                            style="background-color:rgba(114, 114, 114, 1);">
                            <label for="" class="mt-1 h5 text-light">Middle Name</label>
                            <input type="text" name="mname" class="form-control text-center fw-bold"
                                value="{{ old('mname') }}">
                            @error('mname')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                <script>
                                    $(window).on('load', function() {
                                        $('#exampleModal').modal('show');
                                    });
                                </script>
                                </script>
                            @enderror
                        </div>
                        <div class="form-group mt-2 rounded text-center"
                            style="background-color:rgba(114, 114, 114, 1);">
                            <label for="" class="h5 mt-1 text-center text-light fw-bold">LRN: </label>
                            <input type="text" name="lrn" class="form-control text-center"
                                value="{{ old('lrn') }}">
                            @error('lrn')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                <script>
                                    $(window).on('load', function() {
                                        $('#exampleModal').modal('show');
                                    });
                                </script>
                                </script>
                            @enderror
                        </div>
                        <div class="form-group mt-2 rounded text-center"
                            style="background-color:rgba(114, 114, 114, 1);">
                            <label for="" class="h5 mt-1 text-center text-light fw-bold">Section: </label>
                            <div class="custom-form-group mt-2">
                                <select class="form-select text-center" name="section"
                                    aria-label="Default select example">
                                    <option selected>Rizal</option>
                                    <option value="Quezon">Quezon</option>
                                    <option value="Mabini">Mabini</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-secondary">
                        <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                        <button class="btn btn-warning" type="submit">Add Student</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <!-- Modal -->
    <form action="usersaveedit" method="post">]
        @csrf
        <div class="modal fade mt-5 " id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-xl ">
                <div class="modal-content">
                    <div class="modal-header bg-secondary">
                        <h1 class="modal-title fs-5 text-light" id="exampleModalLabel">View / Update User</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body" style="background-image: url('assets/images/mainbg.png');">
                        <input type="hidden" name="myid" value="{{ Session::get('id') }}">
                        <div class="row">
                            <div class="col-text-center">
                                <p class="h3 text-center text-warning">
                                    RECOMMENDED STRAND: <span class="bg-warning text-dark"
                                        style="padding:0 20px;border-radius:25px;">{{ Session::get('recomended') }}
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-md-5 ">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group rounded text-center"
                                            style="background-color:rgba(114, 114, 114, 1);">
                                            <label for="" class="text-light h5 mt-1">First Name:</label>
                                            <input type="text" name="Fullname"
                                                class="form-control text-center fw-bold"
                                                value="{{ old('Fullname') }}{{ Session::get('fullname') }}">
                                            @error('Fullname')
                                                <p class="text-danger">
                                                    {{ $message }}
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
                                        <div class="form-group rounded text-center"
                                            style="background-color:rgba(114, 114, 114, 1);">
                                            <label for="" class="text-light h5 mt-1">Last Name:</label>
                                            <input type="text" name="lname"
                                                class="form-control text-center fw-bold"
                                                value="{{ old('Fullname') }}{{ Session::get('lname') }}">
                                            @error('lname')
                                                <p class="text-danger">
                                                    {{ $message }}
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
                                        <div class="form-group rounded text-center"
                                            style="background-color:rgba(114, 114, 114, 1);">
                                            <label for="" class="text-light h5 mt-1">Middle Name</label>
                                            <input type="text" name="mname"
                                                class="form-control text-center fw-bold"
                                                value="{{ old('Fullname') }}{{ Session::get('mname') }}">
                                            @error('mname')
                                                <p class="text-danger">
                                                    {{ $message }}
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

                                <div class="form-group mt-2 rounded text-center "
                                    style="background-color:rgba(114, 114, 114, 1);">
                                    <label for="" class="text-light h5 mt-1">LRN: </label>
                                    <input type="text" name="lrn" class="form-control text-center fw-bold"
                                        value="{{ old('lrn') }}{{ Session::get('lrn') }}">
                                    @error('lrn')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        <script>
                                            $(window).on('load', function() {
                                                $('#exampleModal').modal('show');
                                            });
                                        </script>
                                        </script>
                                    @enderror
                                </div>
                                <div class="form-group mt-2 rounded text-center"
                                    style="background-color:rgba(114, 114, 114, 1);">
                                    <label for="" class="h5 mt-1 text-center text-light fw-bold">Section:
                                    </label>
                                    <div class="custom-form-group mt-2">
                                        <select class="form-select text-center" name="section"
                                            aria-label="Default select example">
                                            <option selected>{{ Session::get('section') }}</option>{
                                            <option value="Rizal">Rizal</option>
                                            <option value="Quezon">Quezon</option>
                                            <option value="Mabini">Mabini</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group mt-2 text-center rounded"
                                    style="background-color:rgba(114, 114, 114, 1);">
                                    <label for="" class="text-light h5 mt-1">MATH GRADE: </label>
                                    <input type="number" name="math" class="form-control text-center fw-bold"
                                        value="{{ old('lrn') }}{{ Session::get('math') }}">
                                    @error('lrn')
                                        <p class="text-danger">
                                            {{ $message }}
                                        </p>
                                        <script>
                                            $(window).on('load', function() {
                                                $('#exampleModal').modal('show');
                                            });
                                        </script>
                                        </script>
                                    @enderror
                                </div>

                                <div class="form-group mt-2 text-center rounded"
                                    style="background-color:rgba(114, 114, 114, 1);">
                                    <label for="" class="text-light h5 mt-1">SCIENCE GRADE: </label>
                                    <input type="number" name="science" class="form-control text-center fw-bold"
                                        value="{{ old('lrn') }}{{ Session::get('science') }}">
                                    @error('lrn')
                                        <p class="text-danger">
                                            {{ $message }}
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
                            <div class="col-md-7">
                                <div class="row text-light">
                                    <div
                                        class="col-md-6"style="background-color:rgba(114, 114, 114, 1); border-radius:20px;margin-left:10px;">
                                        <span class="text-warning ">Date & Time:</span> {{ Session::get('date') }}
                                    </div>
                                </div>
                                <div class="row mt-2" id="columnchart_values"></div>
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
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
    <script>
        window.onload = function() {
            document.getElementById("download")
                .addEventListener("click", () => {
                    const invoice = this.document.getElementById("example");
                    console.log(invoice);
                    console.log(window);
                    var opt = {
                        margin: 1,
                        filename: 'myfile.pdf',
                        image: {
                            type: 'jpeg',
                            quality: 10000
                        },
                        html2canvas: {
                            scrollX: 0,
                            scrollY: 0,
                            scale: window.devicePixelRatio && window.devicePixelRatio > 0.4 ? 1 : .3
                        },
                        jsPDF: {
                            unit: 'in',
                            format: 'legal',
                            orientation: 'portrait'
                        }
                    };
                    html2pdf().from(invoice).set(opt).save();
                })
        }
    </script>
</body>

</html>
