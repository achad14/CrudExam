<!doctype html>
<html lang="en">
 
<head>
    <title>MyExam</title>
</head>
<body>
 <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav me-auto mb-2 mb-md-0">
       
         @guest
        <li class="nav-item">
           <a class="nav-link" href="{{ route('login') }}">Login</a>
         </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('register') }}">Register</a>
             </li>
         @else
          
        @endguest
            </ul>
       
        </div>
    
 
    @yield('content')
 
    
</body>
 
</html>