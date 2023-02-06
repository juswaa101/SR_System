<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <link href="assets/images/logo.jpg" rel="icon">
    <link href="assets/images/logo.jpg" rel="apple-touch-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="{{ asset('assets/css//nav.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css//login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css//app.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>



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
                        <a class="nav-link mx-2 text-light" aria-current="/surveylist" href="/surveylist">Survey
                            List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2  active" aria-current="/announcement" href="/announcement">Guidelines
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
                    <li class="nav-item">
                        <!-- Button trigger modal -->
                        <button type="button" class="nav-link mx-2 active btn " data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            <i class="fa fa-user" style="font-size:20px;color:black"></i>
                        </button>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light mt-1" href="/logout"><i class="fa fa-sign-out"
                                style="font-size:30px;color:red"></i> </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-5" style="border-radius:15px; min-height:calc(100vh - 120px)">
            <div class="card-header bg-primary">
                <div class="h4 text-white">
                    <i class="fas fa-bullhorn"></i> Announcement and Guidelines
                </div>
            </div>
            @foreach ($announcements as $announcement)
                <div class="card-body p-5">
                    <div class="card-body border border-1 mt-3 mb-5" style="border-radius:15px">
                        <div class="card ">
                            <div class="card-body ">
                                <div class="d-flex justify-content-start">
                                    <div class="h6 fw-bold"><i class="fas fa-users-cog"></i> Posted by:
                                        {{ $announcement->fname }} {{ $announcement->mname }} {{ $announcement->lname }}
                                    </div>

                                </div>
                                <div class="h6 text-muted text-start"><i class="far fa-calendar"></i> Date Posted:
                                    {{ $announcement->created_at }}
                                </div>
                                <hr>

                                <div class="h5">{{ $announcement->posts }}</div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="button" onclick="view({{ $announcement->ann_id }})"
                                class="btn-primary btn mt-3 mb-5" id="view{{ $announcement->ann_id }}">View All
                                Comments</button>
                        </div>
                        @foreach ($approvedComments as $comment)
                            <section id="comments{{ $announcement->ann_id }}" class=" mt-3 mb-3 "
                                style="display:none">
                                <div class="card ">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-end">
                                            <div class="h6 fw-bold"><i class="fas fa-users-cog"></i> Commented by:
                                                {{ $comment->fname }} {{ $comment->mname }} {{ $comment->lname }}
                                            </div>

                                        </div>
                                        <div class="h6 text-muted text-end"><i class="far fa-calendar"></i> Comment
                                            Date:
                                            {{ $comment->created_at }}</div>
                                        <hr>

                                        <div class="h6">{{ $comment->comments }}</div>
                                    </div>
                                </div>

                            </section>
                        @endforeach
                        <form action="/addComment" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="announcement_id" value="{{ $announcement->ann_id }}">
                            <div class="form-floating">
                                <textarea class="form-control" name="comment" placeholder="Leave a comment here" id="floatingTextarea2"
                                    style="height: 100px" required></textarea>
                                <label for="floatingTextarea2" class="text-muted">Comments</label>
                            </div>

                            <div class="mt-3">
                                <div class="d-flex justify-content-end">
                                    <button class="btn btn-success btn-md">Submit Comment</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session()->has('success'))
        <script>
            new swal({
                title: '<?php echo session()->get('success'); ?>',
                icon: 'success',
                showCancelButton: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Okay'
            })
        </script>
    @endif
    <script>
        function view(id) {
            $('#comments'+id).toggle("");
        }
    </script>
</body>

</html>
