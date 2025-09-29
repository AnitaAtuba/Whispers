<!DOCTYPE php>
<php lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/whispers/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/whispers/fontawesome/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/whispers/css/style.css">
    <title>"@yield("title","Whispers :opinions,thoughts & secrets");</title>
</head>
<body>

        <!-- NAVBAR -->
            <header class="sticky-top">
            <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand fs-3" href="/whispers/index"><strong>Whispers</strong></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav  me-auto">
                    @guest
                    <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="/whispers/index">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="{{route('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="{{route('register')}}">Sign up</a>
                    </li>
                    @endguest
                     @auth
                     <li class="nav-item">
                    <a class="nav-link text-dark" aria-current="page" href="/whispers/index">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link text-dark" href="{{route('whispers.post')}}">All Whispers</a>
                    </li>
                </ul>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
                    <div class="d-flex">
                       
                        @if(auth()->user()->role == "admin")
                        <a href="{{route('admin.dashboard')}}" class="btn btn-outline-danger me-2"><i class="fas fa-user"></i> Dashboard</a>
                        @else
                      <a href="{{route('dashboard')}}" class="btn btn-dark me-2"><i class="fas fa-bars"></i> Dashboard</a>
                        @endif
                        <form action="{{route('logout')}}" method="post">
                            @csrf
                         <button class="btn btn-danger">Logout</button>
                        </form>
                        @endauth
                   
                    <!-- <a href="{{route('logout')}}" class="btn btn-warning">Logout</a> -->
                   
                 </div>
                   
                </div>
            </div>
            </nav>
            </header>

 @yield("hero")
 @yield("content")
    <!-- FOOTER -->
<footer>
   <div class="container-fluid ">
    <div class="row footer py-5">
        <div class="col-md-3 mb-3">
            <h4>Whispers</h4>
            <p>Whispers aims to connect people who love to share thier thoughts,opions,interests,desires and secrets together. </p>
                <div class="socials mb-3">
            <a href="#"><i class="fa-brands fa-twitter text-center p-2"></i></a>
            <a href="#"><i class="fa-brands fa-instagram text-center p-2"></i></a>
             <a href="#"><i class="fa-brands fa-whatsapp text-center p-2"></i></a>
             <a href="#"><i class="fa-brands fa-facebook text-center p-2"></i></a>
                </div>
        </div>  
         <div class="col-md-3  mb-3">
            <h4>Quick Links</h4>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="#">Whispers</a></li>
                <li><a href="#">About Us</a></li>
                <li><a href="#">Contact Us</a></li>
            </ul>
        </div>  
           <div class="col-md-3  mb-3">
            <h4>Contact Us</h4>
            <ul>
                <li><i class="fas fa-map-marker-alt"></i> 420 kingston street Ikeja Lagos</li>
                <li><i class="fas fa-phone me-2"></i> +234-706-345-87</li>
                <li><i class="fas fa-envelope me-2"></i> haven@whispers.com</li>
            </ul>
        </div>  
        <div class="col-md-3  mb-3">
            <h4>News Letter</h4>
            <div class="input-group">
                <input type="email" class="form-control" placeholder="Your email">
                <button class="btn btn-dark text-white" type="button">Subscribe</button>
         </div>
        </div>  
    </div>
    <hr>
    <div class="text-center">
        <p>&copy; copy 2025 Whispers</p>
        <p>All rights reserved</p>
    </div>
   </div>
</footer>

<script src="/whispers/bootstrap/js/bootstrap.bundle.js"></script>
</body>
</php>