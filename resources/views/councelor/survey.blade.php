<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Counselor Page</title>

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
                height: 400,
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
                        <a class="nav-link mx-2 active" aria-current="/surveylist"
                            href="/surveylist">Survey List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" aria-current="/announcement" href="/announcement">Guidelines
                            & Announcement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light " href="/studentlist">Student</a>
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
    @if (Session::get('s1'))
        <script>
            $(window).on('load', function() {
                $('#exampleModal2').modal('show');
            });
        </script>
    @endif
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <!-- Button trigger modal -->
                <!-- <button type="button" class="btn btn-primary addItemBtn fs-5 mt-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        ADD STUDENT <i class="fa fa-plus" style="font-size:20px;"></i>
                    </button> -->
                <div class="mt-5"></div>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-3">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header bg-primary">
                        <div class="row">
                            <div class="col-2">
                                <button type="button" class="btn btn-warning addItemBtn fs-5 mt-3 fw-bold"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                    ADD Survey <i class="fa fa-plus" style="font-size:20px;"></i>
                                </button>
                            </div>
                            <div class="col-8">
                                <p class="display-5 fw-bold text-light text-center">Survey List <i class="fa fa-edit"
                                        style="font-size:40px"></i></p>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example" class="display" style="width:100%">
                            <thead>
                                <tr>
                                    <th>Survey ID:</th>
                                    <th>Suervey Question</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($take_survey as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->survey_question }}</td>
                                        <td>
                                            <a class="btn btn-info"
                                                href="/editsurvey/{{ $item->id }}/{{ $item->survey_question }}"
                                                role="button"><i class="fa fa-edit" style="font-size:25x;"></i></a>
                                            <a class="btn btn-danger" href="/deletesurvey/{{ $item->id }}"
                                                role="button"><i class="fa fa-trash" style="font-size:25x;"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            <tfoot>
                                <tr>
                                    <th>Survey ID:</th>
                                    <th>Suervey Question</th>
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

    @if (Session::get('survey'))
        <script type="text/javascript">
            $(window).on('load', function() {
                $('#exampleModal3').modal('show');
            });
        </script>
    @endif

    <form action="/savechanges" method="post">
        @csrf
        <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Update Survey</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <input type="hidden" name="surveyid" value="{{ Session::get('id') }}">
                            <label for=""class="fw-bold">Survey Question</label>
                            <input type="text" name="Survey_Question" value="{{ Session::get('survey') }}"
                                class="form-control" required>
                            @error('$Survey_Question')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                <script type="text/javascript">
                                    $(window).on('load', function() {
                                        $('#exampleModal2').modal('show');
                                    });
                                </script>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Save Changes</button>
                        <button type="button btn-secondary" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    <form action="/addsurvey" method="post">
        @csrf
        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Add Survey</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for=""class="fw-bold">Survey Question</label>
                            <input type="text" name="Survey_Question" class="form-control" required>
                            @error('$Survey_Question')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                                <script type="text/javascript">
                                    $(window).on('load', function() {
                                        $('#exampleModal2').modal('show');
                                    });
                                </script>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button class="btn btn-success">Add</button>
                        <button type="button btn-secondary" class="btn btn-light"
                            data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>

    @include('sweetalert::alert')
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>
</body>

</html>
