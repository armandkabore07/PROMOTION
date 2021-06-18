<!doctype html>
<html lang="en">
  <head>
    <title> {{ config('app.name') }}</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">


</head>
  <body >

    
    <div class="navbar" id="menu">
        <a  class="fa fa-fw fa-calendar-alt "  > {{ date('d/m/y')  }} <br> {{ date('G:i') }}</a>
        <a  href="{{route('home')}} "  class="nav active"><i class="fa fa-fw fa-home"></i> Acceuil</a>
        <a href="{{route('cotisations.show',Auth::user()->id)}} "  class="nav"><i class="fa fa-fw fa-money"></i>Mes Cotisations</a>

        @role('admin')
        <a href="{{route('membres.index') }}" class="nav"> <i class="fa fa-fw fa-user"></i> Membres</a>
        <a href="{{route('adhesions.index')}}"><i class="fa fa-fw fa-user"  class="nav"></i> Adhesions</a>
        <a href="{{route('cotisations.index')}} "  class="nav"><i class="fa fa-fw fa-envelope"></i> Cotisations</a> 
        
        @endrole
        <a href="#"><i class="fa fa-fw fa-user-plus"  class="nav"></i> Contact</a>
        <a href="#"><i class="fa fa-fw fa-search"></i> Recherche</a>
   {{-- <a href="#">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <i class="fa fa-fw fa-sign-out"></i>
                {{ __('Deconnexion') }}
            </x-responsive-nav-link>
        </form>
        </a> --}}
         {{--<ul class="">--}}
          <div class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{Auth::user()->nom}} <br> {{Auth::user()->prenom}}

            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown" id="dropdown">
              
              <li><a class="dropdown-item " href="{{route('moncompte.show', Auth::user()->id) }} " ><i class="fa fa-fw fa-user"></i>Mon profil</a></li>
              <li><a class="dropdown-item " href="{{route('mdp.edit', Auth::user()->id) }}"><i class="fa fa-fw fa-edit"></i>Changer MDP</a></li>
              @role('admin')
              <a href="{{route('parametres.index')}} "><i class="fa fa-fw fa-wrench"></i> Parametres</a>
              @endrole
              <li><hr class="dropdown-divider "></li>
              <li>
              <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"> 
                      {{--    <i class="fa fa-fw fa-sign-out"></i> --}}
                          {{ __('Deconnexion') }}
                    </x-responsive-nav-link>
                </form> 
              </li>
            </ul>
          </div>
       {{-- </ul> --}} 
      {{-- <a href="#">
          <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->nom }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>
        </a> --}} 
     </div> 


     

   <!-- Creating Nav Bar  -->
{{--
<div  id="navigation">
    <nav class="navbar navbar-expand-sm 
    navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#" 
            style="color:greenyellow;">
            Geeks for Geeks
        </a>

        <div class=" navbar-default">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">

                    <!--Initially active class 
                        is set to home link -->
                    <a class="nav-link " href="#">
                        Home
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#section1">
                        Section 1
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#section2">
                        Section 2
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#section3">
                        Section 3
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#section4">
                        Section 4
                    </a>
                </li>
                <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Mon compte
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li><a class="dropdown-item" href="#">Another action</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="#">Something else here</a></li>
                  </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
</div>--}} 
{{--
<div  id="navigation">
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar scroll</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Link
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Link</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</div>
--}}

    <main >

        {{ $slot }}

        <script>
            /* Code for changing active 
            link on clicking */
            var btns = 
                $("#navigation .navbar-nav .nav-link");
  
            for (var i = 0; i < btns.length; i++) {
                btns[i].addEventListener("click",
                                      function () {
                    var current = document
                        .getElementsByClassName("active");
  
                    current[0].className = current[0]
                        .className.replace(" active", "");
  
                    this.className += " active";
                });
            }


         </script>

    </main>
      
    <footer>
      {{--<div class="container-fluid bg-dark pt-4 pb-4">--}}
        <div class="container-fluid pt-4 pb-4 footer">
            <div class="text-center text-white">
                <span id="copyright symbol">&copy; Copyright {{ date('Y') }} &middot; Tous droits reservés!<a href="/" title="Acceuil"> La page d'acceuil</a> </span >         
              </div>
        </div>
        
    </footer>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
   
      
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>