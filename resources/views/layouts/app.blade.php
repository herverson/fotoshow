<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Foto Show</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.5.3/css/foundation.css">
  </head>
  <body>
    @include('inc.topbar')
    <br>
    <div class="grid-container">
      @include('inc.mensagens')
      @yield('content')
    </div>
  </body>
</html>
