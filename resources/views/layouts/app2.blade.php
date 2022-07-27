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
    <link rel="stylesheet" href="/autocomplete/jquery-ui.css">
    <link rel="stylesheet" href="/autocomplete/style.css">
    <style>
    .ui-autocomplete-loading {
      background: white url("/autocomplete/ui-anim_basic_16x16.gif") right center no-repeat;
    }
    </style>
    @stack('css')
</head>
<body>

    @include ('partials.navbar')






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
    <script src="/autocomplete/jquery-3.6.0.js"></script>
    <script src="/autocomplete/jquery-ui.js"></script>
    <script>
    $( function() {
      function split( val ) {
        return val.split( /,\s*/ );
      }
      function extractLast( term ) {
        return split( term ).pop();
      }

      $( "#birds" )
        // don't navigate away from the field on tab when selecting an item
        .on( "keydown", function( event ) {
          if ( event.keyCode === $.ui.keyCode.TAB &&
              $( this ).autocomplete( "instance" ).menu.active ) {
            event.preventDefault();
          }
        })
        .autocomplete({
          source: function( request, response ) {
            $.getJSON( "{{ route('/sclasses.autocomplete-search') }}", {
              term: extractLast( request.term )
            }, response );
          },
          search: function() {
            // custom minLength
            var term = extractLast( this.value );
            if ( term.length < 2 ) {
              return false;
            }
          },
          focus: function() {
            // prevent value inserted on focus
            return false;
          },
          select: function( event, ui ) {
            var terms = split( this.value );
            // remove the current input
            terms.pop();
            // add the selected item
            terms.push( ui.item.value );
            // add placeholder to get the comma-and-space at the end
            terms.push( "" );
            this.value = terms.join( ", " );
            return false;
          }
        });
    } );
    </script>
</body>

</html>
