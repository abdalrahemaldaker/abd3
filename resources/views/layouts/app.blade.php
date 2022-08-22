<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
{{-- layout --}}
<meta charset="utf-8">
<title>@yield('title', 'PefrectSchool') |</title>

<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Free HTML Templates" name="keywords">
<meta content="Free HTML Templates" name="description">

<!-- Favicon -->
<link href="/img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Flaticon Font -->
<link href="/lib/flaticon/font/flaticon.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

<!-- Customized Bootstrap Stylesheet -->
<link href="/css/style.css" rel="stylesheet">






    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')
    @livewireStyles
</head>
<body>

    @include ('partials.navbar')

    @auth



    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <a class="navbar-brand" href="#" class="nav-link mr-auto">Control panel</a>
        <ul class="list-inline mr-auto navbar-nav">
            <li class="list-inline-item active"><a href="{{ route('admin.users.index') }}" class="nav-link mr-auto ">Users</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.years.index') }}" class="nav-link mr-auto">Years</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.stages.index') }}" class="nav-link mr-auto">Stages</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.subjects.index') }}" class="nav-link mr-auto">Subjects</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.students.index') }}" class="nav-link mr-auto">Students</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.teachers.index') }}" class="nav-link mr-auto">Teachers</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.sclasses.index') }}" class="nav-link mr-auto">Classes</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.attendances.index') }}" class="nav-link mr-auto">Attendance</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.exam-types.index') }}" class="nav-link mr-auto">Exam Types</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.exams.index') }}" class="nav-link mr-auto">Exams</a></li>
            <li class="list-inline-item"><a href="{{ route('admin.exam-results.index') }}" class="nav-link mr-auto">Results</a></li>
            <li class="list-inline-item"><a class="nav-link mr-auto" href="#">Home <span class="sr-only">(current)</span></a></li>
            </ul>

    </nav>

    @endauth




    <div id="app">


        <main class="py-4">
            @yield('content')
        </main>

    <!-- Footer Start -->
    @include('sections.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="/lib/easing/easing.min.js"></script>
    <script src="/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="/lib/isotope/isotope.pkgd.min.js"></script>
    <script src="/lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="/mail/jqBootstrapValidation.min.js"></script>
    <script src="/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="/js/main.js"></script>
    @stack('js')
    @livewireScripts
</body>

</html>
