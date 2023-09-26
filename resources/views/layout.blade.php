<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>gestion_examens</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-secondary text-white">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-bs-target="#navbarSupportedcontent"
        aria-controls="navbarSupportedcontent" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedcontent">

        <a class="nav-brand mt-2 mt-lg-0 text-white"> <img src="{{ asset('images/samlogo.png') }}" alt=""
            style="width:50px;height:50px" logo></a>


        @if (Route::has('login'))


        @auth
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <button class="btn btn-outline-info" type="submit"><a class="dropdown-item"
              href="{{ route('students.index') }}">Etudiants</a>
          </button>
          <button class="btn btn-outline-warning" type="submit"><a class="dropdown-item"
              href="{{ route('filiere.index') }}">Filières</a>
          </button>
          <button class="btn btn-outline-info" type="submit"><a class="dropdown-item"
              href="{{ route('courses.index') }}">Cours</a>
          </button>
          <button class="btn btn-outline-warning" type="submit"><a class="dropdown-item"
              href="{{ route('exams.index') }}">Examens</a>
          </button>

        </ul>
        @else
        <ul class="navbar-nav w-100 d-flex justify-content-end mb-2 mb-lg-0">
          <button class="btn btn-outline-info texte-white" type="submit"><a class="dropdown-item"
              href="{{ route('exams.results.show') }}">RESULTATS</a>
          </button>
          <button class="btn btn-outline-info texte-white" type="submit"><a class="dropdown-item"
              href="{{ route('login') }}">CONNEXION</a>
          </button>
          <button class="btn btn-outline-info texte-white" type="submit"><a class="dropdown-item"
              href="{{ route('register') }}">INSCRIPTION</a>
          </button>
          @if(Route::has('register'))
          @endif
        </ul>
        @endauth
        @endif
      </div>
      @auth

      <div class="d-flex align-items-center">
        <a class="text-reset me-3" href="">
          <i class="fas fa-shopping-cart"></i>
        </a>
        <form class="d-flex">

          <button class="btn btn-outline-warning" type="submit">

            <a class="dropdown-item" href="{{route('signout')}}">Déconnexion</a>

          </button>
        </form>
      </div>

    </div>
    @endauth

  </nav>

  <div class="container">
    @yield('content')

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
  </script>
</body>

</html>