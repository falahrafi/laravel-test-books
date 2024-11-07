<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- CSRF token meta tag -->
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <title>Laravel Test Books</title>
      {{-- Favicon --}}
      {{-- <link rel="icon" sizes="32x32" href="./favicon-dark.png" media="(prefers-color-scheme: dark)" />
      <link rel="icon" sizes="32x32" href="./favicon-light.png" media="(prefers-color-scheme: light)" /> --}}
      <!-- Google Font-->
      <link rel="preconnect" href="https://fonts.googleapis.com">
      <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
      <link href="https://fonts.googleapis.com/css2?family=Maven+Pro:wght@400;500;600;700&family=Nunito+Sans:ital,opsz,wght@0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700&display=swap" rel="stylesheet">
      <!-- Font Awesome Icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
      {{-- Flowbite CSS --}}
      {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.0/flowbite.min.css"  rel="stylesheet" /> --}}
      <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
      {{-- tailwind CSS --}}
      @vite('resources/css/app.css')
      {{-- Scroll Reveal --}}
      <script src="https://unpkg.com/scrollreveal"></script>
  </head>
  <body>    
    @include('partials.navbar')
    @include('partials.sidebar')

    <main id="mainContent" class="">
      @yield('main-content')
    </main>

    

    @vite('resources/js/app.js')
  </body>
</html>