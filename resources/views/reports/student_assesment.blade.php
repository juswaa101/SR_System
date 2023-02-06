<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.css" rel="stylesheet" /> --}}
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 5px;
        }

        th {
            text-align: left;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        body {
            font-size: 11px;
        }

        .page_break {
            page-break-before: always;
        }

        .text-nowrap {
            white-space: nowrap;
        }

        .text-center {
            text-align: center;
        }
    </style>
</head>

<body>


    <div class="container">
        <div class="h1 fw-bold text-center" style="text-align: center; font-weight:bold;">REPORTS as of
            {{ date('Y-m-d ') }}<br />
            @if (session()->has('section'))
                <h1 class="text-center">Section: {{ session()->get('section') }}</h1>
            @else
                <h1 class="text-center">All Section</h1>
            @endif
        </div>
        <div class="h1 fw-bold text-center" style="text-align: center; font-weight:bold;">FINISH THE EXAM</div>

        <div class="mt-5">
            <table style="width:100%; margin-top:50px">
                <th class="text-nowrap text-center">LRN</th>
                <th class="text-nowrap text-center">Full Name</th>
                <th class="text-nowrap text-center">Section</th>
                <th class="text-nowrap text-center">User Type</th>


                @forelse ($student_assessment as $student)
                    <tr>
                        <td class="text-nowrap text-center">{{ $student->lrn }}</td>
                        <td class="text-nowrap text-center">{{ $student->fname }} {{ $student->mname }}
                            {{ $student->lname }}</td>
                        <td class="text-nowrap text-center">{{ $student->section }}</td>
                        <td class="text-nowrap text-center">{{ Str::upper($student->usertype) }}</td>
                    </tr>

                @empty
                    <tr>
                        <td colspan="4">No Data</td>
                    </tr>
                @endforelse
            </table>
        </div>
    </div>




    <!-- MDB -->
    {{-- <script
type="text/javascript"
src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.1.0/mdb.min.js"
></script> --}}
</body>

</html>
