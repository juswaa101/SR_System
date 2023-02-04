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
        table,th,td{
            border: solid black 1px;
            border-collapse: collapse;
        }
    </style>
</head>

<body>

    
       <div class="container">
        <div class="h1 fw-bold text-center" style="text-align: center; font-weight:bold;">REPORTS as of {{ date('Y-m-d ') }}</div>

        <div class="mt-5">
            <table style="width:100%; margin-top:50px">
                <th>LRN</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Middle Name</th>
                <th>Recommended Strand</th>
                
                @forelse ($StudentData as $student)
                    <tr>
                        <td>{{ $student[0] }}</td>
                        <td>{{ $student[1] }} {{ $student[2] }} {{ $student[3] }}</td>
                        <td>{{ $student[4] }}</td>
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
