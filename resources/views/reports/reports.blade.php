<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports Page</title>

    <link href="assets/images/logo.jpg" rel="icon">
    <link href="assets/images/logo.jpg" rel="apple-touch-icon">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
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
                        <a class="nav-link mx-2 text-light " href="/studentlist">Student</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 active" href="/reports">Reports</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" href="/logout">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-4" style="height:calc(100vh - 120px)">
            <div class="card-body">
                <div class="d-flex justify-content-start">
                    <div class="h3">
                        Reports
                    </div>

                </div>
                <hr>

                <div class="table-responsive">
                    <table class="table table-xl table-bordered table-hovered">
                        <tr class="bg-primary">
                            <th class="text-white">Report Name</th>
                            <th class="text-white">Action</th>
                        </tr>


                        <tr>
                            <td class="fw-bold">Recommended Strands of Students Base on the Assesment.</td>
                            <td><a href="/reports/student_base" target="_blank"><i
                                        class="far fa-file-pdf text-danger fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">List of Name of Grade 10 Students with the strands they are qualified to
                                take</td>
                            <td><a href="/reports/student_qualified" target="_blank"><i
                                        class="far fa-file-pdf text-danger fa-2x"></i></a>
                            </td>
                        </tr>
                        @if (session()->has('usertype') == 'counselor')
                            <tr>
                                <td class="fw-bold">List of Recommended Strand base on the career survey</td>
                                <td><a href="/reports/student_qualified" target="_blank"><i
                                            class="far fa-file-pdf text-danger fa-2x"></i></a>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td class="fw-bold">Number of students who already finish the assessment</td>
                            <td><a href="/reports/student_assesment" target="_blank"><i
                                        class="far fa-file-pdf text-danger fa-2x"></i></a>
                            </td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Number of students who created accounts</td>
                            <td><a href="/reports/student_accounts" target="_blank"><i
                                        class="far fa-file-pdf text-danger fa-2x"></i></a>
                            </td>
                        </tr>

                    </table>


                </div>
            </div>
        </div>
    </div>
</body>

</html>
