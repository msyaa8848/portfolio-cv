<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Laravel CV</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Saira+Extra+Condensed:500,700" rel="stylesheet"
        type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Muli:400,400i,800,800i" rel="stylesheet" type="text/css" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="{{ asset('depan') }}/css/styles.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">

</head>

<body id="page-top">
    <!-- Navigation-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top" id="sideNav">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">
            <span class="d-block d-lg-none">{{ $about->tajuk }}</span>
            <span class="d-none d-lg-block"><img class="img-fluid img-profile rounded-circle mx-auto mb-2"
                    src="{{ asset('foto') . '/' . get_meta_value('_foto') }}" alt="..." /></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span
                class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#experience">Experience</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#education">Education</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#skills">Skills</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#interests">Interests</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#awards">Awards</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#references">References</a></li>
                <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#login">Login</a></li>
            </ul>
        </div>
    </nav>
    <!-- Page Content-->
    <div class="container-fluid p-0">
        <!-- About-->
        <section class="resume-section" id="about">
            <div class="resume-section-content">
                <h1 class="mb-0">
                    {!! set_about_nama($about->tajuk) !!}
                </h1>
                <div class="subheading mb-5">
                    {{ get_meta_value('_kota') }} · {{ get_meta_value('_provinsi') }} · {{ get_meta_value('_nohp') }} ·
                    <a href="{{ get_meta_value('_email') }}">{{ get_meta_value('_email') }}</a>
                </div>
                <div class="lead mb-5">{!! $about->isi !!}</div>
                <div class="social-icons">
                    <a class="social-icon" href="{{ get_meta_value('_linkedin') }}"><i
                            class="fab fa-linkedin-in"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_github') }}"><i class="fab fa-github"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_twitter') }}"><i class="fab fa-twitter"></i></a>
                    <a class="social-icon" href="{{ get_meta_value('_facebook') }}"><i
                            class="fab fa-facebook-f"></i></a>
                </div>
            </div>
        </section>
        <hr class="m-0" />
        <!-- Experience-->
        <section class="resume-section" id="experience">
            <div class="resume-section-content">
                <h2 class="mb-5">Experience</h2>
                @foreach ($experience as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->tajuk }}</h3>
                            <div class="subheading mb-3">{{ $item->info1 }}</div>
                            {!! $item->isi !!}
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{ $item->tgl_mulai_indo }} -
                                {{ $item->tgl_akhir_indo }}</span></div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Education-->
        <section class="resume-section" id="education">
            <div class="resume-section-content">
                <h2 class="mb-5">Education</h2>
                @foreach ($education as $item)
                    <div class="d-flex flex-column flex-md-row justify-content-between mb-5">
                        <div class="flex-grow-1">
                            <h3 class="mb-0">{{ $item->tajuk }}</h3>
                            <div class="subheading mb-3">{{ $item->info1 }}</div>
                            <div>{{ $item->info2 }}</div>
                            <p>{{ $item->info3 }}</p>
                        </div>
                        <div class="flex-shrink-0"><span class="text-primary">{{ $item->tgl_mulai_indo }} -
                                {{ $item->tgl_akhir_indo }}</span></div>
                    </div>
                @endforeach
            </div>
        </section>
        <hr class="m-0" />
        <!-- Skills-->
        <section class="resume-section" id="skills">
            <div class="resume-section-content">
                <h2 class="mb-5">Skills</h2>
                <div class="subheading mb-3">Programming Languages & Tools</div>
                <ul class="list-inline dev-icons">
                    @foreach (explode(', ', get_meta_value('_language')) as $item)
                        <li class="list-inline-item"><i class="devicon-{{ strtolower($item) }}-plain"></i></li>
                    @endforeach
                </ul>
                <div class="subheading mb-3">Workflow</div>
                {!! set_list_workflow(get_meta_value('_workflow')) !!}

            </div>
        </section>
        <hr class="m-0" />
        <!-- Interests-->
        <section class="resume-section" id="interests">
            <div class="resume-section-content">
                <h2 class="mb-5">{{ $interest->tajuk }}</h2>
                {{ $interest->isi }}
            </div>
        </section>
        <hr class="m-0" />
        <!-- Awards-->
        <section class="resume-section" id="awards">
            <div class="resume-section-content">
                <h2 class="mb-5">{{ $award->tajuk }}</h2>
                {!! set_list_award($award->isi) !!}
            </div>
        </section>
        <!--References-->
        <hr class="m-0" />
        <section class="resume-section" id="references">
            <div class="resume-section-content">
                <h2 class="mb-5">References</h2>
                <ul class="fa-ul mb-0">
                    <li>
                        <h3>Puan Hasnatul Nazuha binti Hasan</h3>
                        Supervisor<br>
                        Universiti Pendidikan Sultan Idris<br>
                        <strong>Email:</strong> hasnatulnazuha@fskik.upsi.edu.my<br>
                        <strong>Contact No:</strong> 012-3297862
                    </li><br>
                    <li>
                        <h3>Encik Rasyidi bin Johan</h3>
                        University Lecture<br>
                        Universiti Pendidikan Sultan Idris<br>
                        <strong>Email:</strong> rasyidi@fskik.upsi.edu.my<br>
                        <strong>Contact No:</strong> 012-3297862
                    </li>
                </ul>
            </div>
        </section>

        <!--Login-->
        <hr class="m-0" />
        <section class="resume-section" id="login">
            <div class="resume-section-content">
                <h2 class="mb-5"> Login</h2>
                <a class="dropdown-item" href="{{ ('./auth/') }}">
                    <i class="mdi mdi-login text-primary"></i>
                    [Click Here] You will redirect into admin page
                </a>
            </div>
        </section>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="{{ asset('depan') }}/js/scripts.js"></script>
</body>

</html>
