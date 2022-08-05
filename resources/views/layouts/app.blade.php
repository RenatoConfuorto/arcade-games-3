<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>@yield('title')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">
  @yield('style')
</head>
<body>
  <main>
    @yield('content')
  </main>
  @env('local')
        <script src="http://localhost:35729/livereload.js"></script>
  @endenv
  @yield('script')
</body>
</html>