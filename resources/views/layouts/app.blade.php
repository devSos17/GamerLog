<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }}@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js" defer></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        @include('partials.nav')
        @include('partials.status')
        <main class="py-4">
            <div class="container">
				@include('partials.errors')
                @yield('content')
            </div>
        </main>
    </div>
    @if (session('delete'))

        <script>
            swal("Poof! Your imaginary file has been deleted!", {
                  icon: "success",
                });
        </script>
    @endif

    <!-- Sweetalert -->
    <script>
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
        $('.form-delete').submit( (e)=>{
        e.preventDefault()
            swal({
              title: "Are you sure?",
              text: "Once deleted, you will not be able to recover this imaginary file!",
              icon: "warning",
              buttons: true,
              dangerMode: true,
            })
            .then((willDelete) => {
              if (willDelete) {
                this.submit()
              } else {
                swal("Your imaginary file is safe!");
              }
            });
        }
        )
    </script>
</body>
</html>
