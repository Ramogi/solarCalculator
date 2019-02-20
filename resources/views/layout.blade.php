<!DOCTYPE html>
<html lang="en">
    @include('_head')
    <body>
        <!--Navigation Bar-->
        <header>
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="/"><img src="{{asset('storage/logo.png')}}" width="170" height="110" alt=""></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="myNav navbar-nav ml-auto" >
                            <li class="nav-item {{Request::is('calculator') ? "active" : ""}}" >
                                <a class="nav-link" href="/calculator">Calculator</a>
                            </li>
                            <li class="nav-item {{Request::is('blog') ? "active" : ""}}">
                                <a class="nav-link" href="/posts">Blog</a>
                            </li>
                            <li class="nav-item {{Request::is('installers') ? "active" : ""}}">
                                <a class="nav-link" href="/installers">Installers</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sign in</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Sign up</a>
                            </li>
                        </ul>
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        </form>
                    </div>
                </div>
            </nav>
        </header>
        <!--Main Content-->
        <div class="container">
            @include('_messages')
            @yield('content')

        </div>
        @include('_footer')

        <!--Scripts-->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    </body>
    
    <!--Footer-->
   
</html>