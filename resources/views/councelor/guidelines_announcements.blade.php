<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Page</title>

    <link href="assets/images/logo.jpg" rel="icon">
    <link href="assets/images/logo.jpg" rel="apple-touch-icon">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">

    <script src="{{ asset('assets/js//nav.js') }}"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


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
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="card mt-4" style="border-radius: 15px; min-height:calc(100vh - 120px)">
            <div class="card-header bg-primary">
                <div class="text-white h4">
                    <i class="fas fa-bullhorn"></i> Announcement & Guidelines
                </div>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Posts</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Pending Comments</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-contact" type="button" role="tab"
                            aria-controls="pills-contact" aria-selected="false">Approved Comments</button>
                    </li>

                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-contact-tab1" data-bs-toggle="pill"
                            data-bs-target="#pills-contact1" type="button" role="tab"
                            aria-controls="pills-contact1" aria-selected="false">Declined Comments</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        <div class="d-flex justify-content-end mt-4">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Add Post
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="post" action="/createAnnouncement">
                                        {{ csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><i
                                                        class="fas fa-plus-circle"></i> Add Posts?</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-floating">
                                                    <textarea class="form-control" placeholder="Leave a post here" id="floatingTextarea2" style="height: 100px"
                                                        name="announcement"></textarea>
                                                    <label for="floatingTextarea2" class="text-black">Post</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Create Post</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>

                            <div class="modal fade" id="editModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <form method="post" action="/updateAnnouncement">
                                        {{ csrf_field() }}
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel"><i
                                                        class="fas fa-plus-circle"></i> Edit Post</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-floating">
                                                    <input type="hidden" name="announcement_id"
                                                        id="announcement_id">
                                                    <textarea class="form-control" placeholder="Leave a post here" id="edit_announcement" style="height: 100px"
                                                        name="announcement"></textarea>
                                                    <label for="floatingTextarea2" class="text-black">Post</label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Update Post</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="mt-5">
                            <table id="example1" class="table table-striped table-bordered mt-5" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Post</th>
                                        <th>Created At</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($announcements as $announcement)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $announcement->posts }}</td>
                                            <td>{{ $announcement->created_at }}</td>
                                            <td class="d-flex">

                                                <button class="btn btn-warning me-3" id="editPostBtn"
                                                    data-id="{{ $announcement->ann_id }}"><i
                                                        class="fas fa-edit"></i></button>


                                                <form action="/deleteAnnouncement" method="post">
                                                    @csrf
                                                    <input type="hidden" name="announcement_id"
                                                        value="{{ $announcement->ann_id }}">
                                                    <button class="btn btn-danger me-3"
                                                        onclick="return confirm('Are you sure?')"><i
                                                            class="fas fa-trash"></i></button>
                                                </form>

                                                <a href="/announcement_area" class="btn btn-secondary "><i
                                                        class="fas fa-eye"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                        aria-labelledby="pills-profile-tab" tabindex="0">
                        <table id="example2" class="table table-striped table-bordered mt-5" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Lrn</th>
                                    <th>Full name</th>
                                    <th>Comment</th>
                                    <th>Status</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendingComments as $comment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $comment->lrn }}</td>
                                        <td>{{ $comment->fname }} {{ $comment->mname }} {{ $comment->lname }}</td>
                                        <td>{{ $comment->comments }}</td>
                                        <td>
                                            @if ($comment->status == 0)
                                                <span class="badge text-bg-warning">PENDING</span>
                                            @endif
                                        </td>
                                        <td>{{ $comment->created_at }}</td>
                                        <td class="d-flex">

                                            <form action="/approveComment" method="post">
                                                @csrf
                                                <input type="hidden" name="comment_id"
                                                    value="{{ $comment->com_id }}">
                                                <button class="btn btn-success me-3"
                                                    onclick="return confirm('Are you sure?')"><i
                                                        class="fas fa-check"></i></button>
                                            </form>


                                            <form action="/declineComment" method="post">
                                                @csrf
                                                <input type="hidden" name="comment_id"
                                                    value="{{ $comment->com_id }}">
                                                <button class="btn btn-danger"
                                                    onclick="return confirm('Are you sure?')"><i
                                                        class="fas fa-ban"></i></button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel"
                        aria-labelledby="pills-contact-tab" tabindex="0">
                        <div class="mt-5">
                            <table id="example3" class="table table-striped table-bordered mt-5" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lrn</th>
                                        <th>Full name</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($approvedComments as $comment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $comment->lrn }}</td>
                                            <td>{{ $comment->fname }} {{ $comment->mname }} {{ $comment->lname }}
                                            </td>
                                            <td>{{ $comment->comments }}</td>
                                            <td>
                                                @if ($comment->status == 1)
                                                    <span class="badge text-bg-success">APPROVED</span>
                                                @endif
                                            </td>
                                            <td>{{ $comment->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-contact1" role="tabpanel"
                        aria-labelledby="pills-contact-tab1" tabindex="0">
                        <div class="mt-5">
                            <table id="example4" class="table table-striped table-bordered mt-5" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Lrn</th>
                                        <th>Full name</th>
                                        <th>Comment</th>
                                        <th>Status</th>
                                        <th>Created at</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($declinedComments as $comment)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $comment->lrn }}</td>
                                            <td>{{ $comment->fname }} {{ $comment->mname }} {{ $comment->lname }}
                                            </td>
                                            <td>{{ $comment->comments }}</td>
                                            <td>
                                                @if ($comment->status == 2)
                                                    <span class="badge text-bg-danger">DECLINED</span>
                                                @endif
                                            </td>
                                            <td>{{ $comment->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
</body>

</html>
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
    $(document).ready(function() {
        $('#example1').DataTable();
    });
    $(document).ready(function() {
        $('#example2').DataTable();
    });
    $(document).ready(function() {
        $('#example3').DataTable();
    });
    $(document).ready(function() {
        $('#example4').DataTable();
    });

    $(document).ready(function() {
        $('#editPostBtn').click(function(e) {
            e.preventDefault();
            $('#editModal').modal('show');
            console.log($(this).attr('data-id'));
            $.ajax({
                type: "get",
                url: "/editAnnouncement/" + $(this).attr('data-id'),
                dataType: "json",
                success: function(res) {
                    console.log(res)
                    $('#announcement_id').val(res.ann_id);
                    $('#edit_announcement').val(res.posts);
                }
            });
        });
    });
</script>
