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
            @endif
            @if (!session()->has('section'))
                <h1 class="text-center">All Section</h1>
            @endif
        </div>

        <div class="mt-5">
            <table style="width:100%; margin-top:50px">
                <th class="text-nowrap text-center">LRN</th>
                <th class="text-nowrap text-center">Fullname</th>
                <th class="text-nowrap text-center">Section</th>
                <th class="text-nowrap text-center">ABM (SCORE)</th>
                <th class="text-nowrap text-center">HUMMS (SCORE)</th>
                <th class="text-nowrap text-center">COOKERY (SCORE)</th>
                <th class="text-nowrap text-center">STEM (SCORE)</th>
                <th class="text-nowrap text-center">Recommended Strand</th>

                @forelse ($StudentData as $student)
                    <tr>
                        <td class="text-nowrap text-center">{{ $student[0] }}</td>
                        <td class="text-nowrap text-center">{{ $student[1] }} {{ $student[2] }} {{ $student[3] }}
                        </td>
                        <td class="text-nowrap text-center">{{ $student[4] }}</td>
                        <td class="text-nowrap text-center">{{ $student[5] }}</td>
                        <td class="text-nowrap text-center">{{ $student[6] }}</td>
                        <td class="text-nowrap text-center">{{ $student[7] }}</td>
                        <td class="text-nowrap text-center">{{ $student[8] }}</td>
                        <td class="text-nowrap text-center">{{ $student[9] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="9">No Data</td>
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
