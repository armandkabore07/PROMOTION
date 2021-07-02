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

    
    <nav class="navbar  fixed-top" id="menu">  
        <!--<a  class="fa fa-fw fa-calendar-alt "  > {{ date('d/m/y')  }} <br> {{ date('G:i') }}</a> -->
        <a  href="{{route('home')}} "  class="nav-link  @if(Request::segment(1) == '') active @endif "><i class="fa fa-fw fa-home"></i> Acceuil</a>
        <a href="{{route('informations.index')}} "  class="nav-link @if(Request::segment(1) == 'informations') active @endif"><i class="fa fa-fw fa-book"></i> Publications</a> 
        <a href="{{route('mesCotisations.show',Auth::user()->id)}} "  class="nav-link @if(Request::segment(1) == 'mesCotisations') active @endif"><i class="fa fa-fw fa-money"></i>Mes Cotisations</a>

        @role('admin')
        <a href="{{route('membres.index') }}" class="nav @if(Request::segment(1) == 'membres') active @endif"> <i class="fa fa-fw fa-user"></i> Membres</a>
        <a href="{{route('adhesions.index')}}" class="nav-link @if(Request::segment(1) == 'adhesions') active @endif"><i class="fa fa-fw fa-user"  class="nav @if(Request::segment(1) == 'adhesions') active @endif"></i> Adhesions</a>
        <a href="{{route('cotisations.index')}} "  class="nav-link @if(Request::segment(1) == 'cotisations') active @endif"><i class="fa fa-fw fa-envelope"></i> Cotisations</a> 
        
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
            <i class="fa fa-fw fa-user"></i>{{Auth::user()->nom}} <br> {{Auth::user()->prenom}}

            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown" id="dropdown">
              
              <li><a class="dropdown-item @if(Request::segment(1) == 'moncompte') active @endif" href="{{route('moncompte.show', Auth::user()->id) }} " ><i class="fa fa-fw fa-user"></i>Mon profil</a></li>
              <li><a class="dropdown-item @if(Request::segment(1) == 'mdp') active @endif" href="{{route('mdp.edit', Auth::user()->id) }}"><i class="fa fa-fw fa-edit"></i>Changer MDP</a></li>
              @role('admin')
              <a href="{{route('parametres.index')}} " class="nav-link @if(Request::segment(1) == 'parametres') active @endif"><i class="fa fa-fw fa-wrench"></i> Parametres</a>
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

           <a href="#" class="nav-link @if(Request::segment(1) == 'logout') active @endif">
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <x-responsive-nav-link :href="route('logout')"
                    onclick="event.preventDefault();
                                this.closest('form').submit();">
                                <i class="fa fa-fw fa-sign-out"></i>
                {{ __('Deconnexion') }}
            </x-responsive-nav-link>
        </form>
        </a> 

       {{-- </ul> --}} 
      {{-- <a href="#">
          <div class="ml-3">
            <div class="font-medium text-base text-gray-800">{{ Auth::user()->nom }}</div>
            <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
        </div>
        </a> --}} 
     </nav> 


    

    <main id="contentbody">
       <div style="height: 100%; ">
        {{ $slot }}
        </div>

        <script >
           
              
          
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
    <script src="{{ asset('js/script.js') }}" ></script>
  </body>
</html>