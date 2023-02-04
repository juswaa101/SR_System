<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table,
        th,
        td {
            border: solid black 1px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="h1 fw-bold text-center" style="text-align: center; font-weight:bold;">REPORTS as of
            {{ date('Y-m-d ') }}</div>

        <div class="mt-5">
            <table style="width:100%; margin-top:50px">
                <th>LRN</th>
                <th>Full Name</th>
                <th>User Type</th>

                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->lrn }}</td>
                        <td>{{ $student->fname }} {{ $student->mname }} {{ $student->lname }}</td>
                        <td>{{ $student->usertype }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</body>

</html>
