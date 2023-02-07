<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

    <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/nav.css') }}">

    <style>
        body {
            background-image: url('assets/images/mainbg.jpg');
        }
    </style>
    <title>Document</title>
</head>

<body>
    <nav class="navbar navbar-expand-sm navbar-light" id="neubar">
        <div class="container">
            <a class="navbar-brand" href="#"><img src="assets/images/nobglogo1.png" height="60" />SR-SYSTEM</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span><i class="fa fa-bars hidden-light"></i></span>
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
                        @if (session()->get('take_survey_exam') == 1)
                            <a class="nav-link mx-2 active" aria-current="/strand_survey"
                                onclick="take_survey_exam()">Strand
                                Survey
                                List</a>
                        @else
                            <a class="nav-link mx-2 active" aria-current="/strand_survey" href="/strand_survey">Strand
                                Survey
                                List</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" aria-current="/announcement_area"
                            href="/announcement_area">Guidelines
                            & Announcement</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link mx-2 text-light" href="/logout">Logout </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid p-5">
        <form action="/strand_survey" method="post">
            {{ csrf_field() }}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        {{-- STEM --}}
                        <div class="col-md-6">
                            @foreach ($questions2 as $question)
                                @if ($loop->index % 7 == 0 && $question->category_name == 'STEM')
                                    <input type="hidden" name="total_one" value="0" id="total"
                                        class="total_one">
                                    <b class="mt-2">{{ $question->category_name }}</b>
                                    <hr class="mt-2 mb-2">
                                @endif
                                @if ($question->survey_type == 0 && $question->category_name == 'STEM')
                                    <div class="col-md-6">
                                        {{ $loop->iteration }}. {{ $question->question }}<br />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" class="question_one" name=""
                                                    id="" value="0">
                                                <input type="hidden" name="category_id1" id="category_id1"
                                                    value="{{ $question->clone_strand_id }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="col-md-6">
                            @foreach ($questions1 as $question)
                                @if ($loop->index % 5 == 0 && $question->category_name == 'STEM')
                                    <b class="mt-2">{{ $question->category_name }}</b>
                                    <hr class="mt-2 mb-2">
                                @endif
                                @if ($question->survey_type == 1 && $question->category_name == 'STEM')
                                    <div class="col-md-6">
                                        {{ $loop->iteration }}. {{ $question->question }}<br />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" class="question_one" name=""
                                                    id="" value="0">

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- HUMSS --}}
                        <div class="col-md-6">
                            @foreach ($questions2 as $question)
                                @if ($loop->index % 7 == 0 && $question->category_name == 'HUMMS')
                                    <input type="hidden" name="total_two" value="0" id="total"
                                        class="total_two">
                                    <b class="mt-2">{{ $question->category_name }}</b>
                                    <hr class="mt-2 mb-2">
                                @endif
                                @if ($question->survey_type == 0 && $question->category_name == 'HUMMS')
                                    <div class="col-md-6">
                                        {{ $loop->iteration }}. {{ $question->question }}<br />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" class="question_two" name=""
                                                    id="" value="0">
                                                <input type="hidden" name="category_id2" id="category_id2"
                                                    value="{{ $question->clone_strand_id }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="col-md-6">
                            @foreach ($questions1 as $question)
                                @if ($loop->index % 5 == 0 && $question->category_name == 'HUMMS')
                                    <b class="mt-2">{{ $question->category_name }}</b>
                                    <hr class="mt-2 mb-2">
                                @endif
                                @if ($question->survey_type == 1 && $question->category_name == 'HUMMS')
                                    <div class="col-md-6">
                                        {{ $loop->iteration }}. {{ $question->question }}<br />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" class="question_two" name=""
                                                    id="" value="0">

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- ABM --}}
                        <div class="col-md-6">
                            @foreach ($questions2 as $question)
                                @if ($loop->index % 7 == 0 && $question->category_name == 'ABM')
                                    <input type="hidden" name="total_three" value="0" id="total"
                                        class="total_three">
                                    <b class="mt-2">{{ $question->category_name }}</b>
                                    <hr class="mt-2 mb-2">
                                @endif
                                @if ($question->survey_type == 0 && $question->category_name == 'ABM')
                                    <div class="col-md-6">
                                        {{ $loop->iteration }}. {{ $question->question }}<br />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" class="question_three" name=""
                                                    id="" value="0">
                                                <input type="hidden" name="category_id3" id="category_id3"
                                                    value="{{ $question->clone_strand_id }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="col-md-6">
                            @foreach ($questions1 as $question)
                                @if ($loop->index % 5 == 0 && $question->category_name == 'ABM')
                                    <b class="mt-2">{{ $question->category_name }}</b>
                                    <hr class="mt-2 mb-2">
                                @endif
                                @if ($question->survey_type == 1 && $question->category_name == 'ABM')
                                    <div class="col-md-6">
                                        {{ $loop->iteration }}. {{ $question->question }}<br />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" class="question_three" name=""
                                                    id="" value="0">

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        {{-- TVL --}}
                        <div class="col-md-6">
                            @foreach ($questions2 as $question)
                                @if ($loop->index % 7 == 0 && $question->category_name == 'TVL')
                                    <input type="hidden" name="total_four" value="0" id="total"
                                        class="total_four">
                                    <b class="mt-2">{{ $question->category_name }}</b>
                                    <hr class="mt-2 mb-2">
                                @endif
                                @if ($question->survey_type == 0 && $question->category_name == 'TVL')
                                    <div class="col-md-6">
                                        {{ $loop->iteration }}. {{ $question->question }}<br />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" class="question_four" name=""
                                                    id="" value="0">
                                                <input type="hidden" name="category_id4" id="category_id4"
                                                    value="{{ $question->clone_strand_id }}">
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach

                        </div>
                        <div class="col-md-6">
                            @foreach ($questions1 as $question)
                                @if ($loop->index % 5 == 0 && $question->category_name == 'TVL')
                                    <b class="mt-2">{{ $question->category_name }}</b>
                                    <hr class="mt-2 mb-2">
                                @endif
                                @if ($question->survey_type == 1 && $question->category_name == 'TVL')
                                    <div class="col-md-6">
                                        {{ $loop->iteration }}. {{ $question->question }}<br />
                                        <div class="row">
                                            <div class="col-md-3">
                                                <input type="checkbox" class="question_four" name=""
                                                    id="" value="0">

                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">SUBMIT</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @include ('sweetalert::alert')
</body>
<script>
    let total1 = 0;
    const questions1 = document.querySelectorAll(".question_one");
    const hiddenTotal1 = document.querySelector(".total_one");
    // total[0, 0, 0, 0]
    questions1.forEach(question_one => {
        question_one.addEventListener("change", function() {
            if (this.checked) {
                total1 += 1;
            } else {
                total1 -= 1;
            }
            console.log(total1);
            hiddenTotal1.value = total1;
        });
    });

    let total2 = 0;
    const questions2 = document.querySelectorAll(".question_two");
    const hiddenTotal2 = document.querySelector(".total_two");
    // total[0, 0, 0, 0]
    questions2.forEach(question_two => {
        question_two.addEventListener("change", function() {
            if (this.checked) {
                total2 += 1;
            } else {
                total2 -= 1;
            }
            hiddenTotal2.value = total2;
        });
    });

    let total3 = 0;
    const questions3 = document.querySelectorAll(".question_three");
    const hiddenTotal3 = document.querySelector(".total_three");
    // total[0, 0, 0, 0]
    questions3.forEach(question_three => {
        question_three.addEventListener("change", function() {
            if (this.checked) {
                total3 += 1;
            } else {
                total3 -= 1;
            }
            hiddenTotal3.value = total3;
        });
    });

    let total4 = 0;
    const questions4 = document.querySelectorAll(".question_four");
    const hiddenTotal4 = document.querySelector(".total_four");
    // total[0, 0, 0, 0]
    questions4.forEach(question_four => {
        question_four.addEventListener("change", function() {
            if (this.checked) {
                total4 += 1;
            } else {
                total4 -= 1;
            }
            hiddenTotal4.value = total4;
        });
    });

    function take_survey_exam() {
        new swal({
                title: 'Strand Survey already taken!',
                icon: 'warning',
                showCancelButton: false,
                allowOutsideClick: false,
                allowEscKey: false,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Okay'
            })
            .then(() => {
                window.location.href = "/landingpage";
            });
    }
</script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</html>
{{-- <div class="col-md-6">
    @foreach ($questions2 as $question)
        @if ($loop->index % 7 == 0)
            <input type="hidden" name="total_{{ $question->category_name }}" value="0" id="total"
                class="total_one{{ $loop->iteration }}">
            <b class="mt-2">{{ $question->category_name }}</b>
            <hr class="mt-2 mb-2">
        @endif
        <div class="col-md-12">
            {{ $loop->iteration }}. {{ $question->question }}<br />
            <div class="row">
                <div class="col-md-3">
                    <input type="checkbox" class="question_one{{ $loop->iteration }}" name=""
                        id="" value="0"
                        onclick="check()">

                </div>
            </div>
        </div>
    @endforeach
</div>
<div class="col-md-6">
    @foreach ($questions1 as $question)
        @if ($loop->index % 7 == 0)
            <input type="hidden" name="total_{{ $question->category_name }}" value="0" id="total"
                class="total_one{{ $loop->iteration }}">
            <b class="mt-2">{{ $question->category_name }}</b>
            <hr class="mt-2 mb-2">
        @endif
        <div class="col-md-12">
            {{ $question->question }}<br />
            <div class="row">
                <div class="col-md-3">
                    <input type="checkbox" class="question_one{{ $loop->iteration }}" name=""
                        id="" value="0"
                        onclick="check()">

                </div>
            </div>
        </div>
    @endforeach
</div> --}}

{{-- <div class="col-md-6">
    @foreach ($questions as $question)
        <div class="col-md-12">
            {{ $loop->iteration }}. {{ $question->question }}<br />
            <div class="row">
                <div class="col-md-3">
                    <input type="checkbox" class="question_one{{ $loop->iteration }}" name=""
                        id="" value="0" onclick="check({{ $loop->iteration }})">

                </div>
            </div>
        </div>
    @endforeach
</div> --}}
