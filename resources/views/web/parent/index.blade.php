<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Fashion Mart</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <link href="{{ url('css/app.css') }}" rel="stylesheet" type="text/css">

    </head>
    <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom box-shadow">
      <a href="{{ route('index') }}" class="my-0 mr-md-auto font-weight-normal">
          <h5>Fashion Mart</h5>
      </a>
      <nav class="my-2 my-md-0 mr-md-3">
    
        <div class="btn-group">
            <button type="button" class="btn btn-secodary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Category
            </button>
            <div class="dropdown-menu">
                @foreach( \App\Category::all() as $key => $value )
                    <a class="dropdown-item" href="{{ route('showByCategory', $value->id) }}">{{ $value->name }}</a>
                @endforeach
            </div>
        </div>
      </nav>
    </div>

    <div class="container">
        <div class="card-deck mb-3 text-center">
        @yield('content')
        
        </div>
      </div>
    <!-- Script -->
    <script src="{{ url('js/app.js') }}"></script>        
    </body>
</html>
