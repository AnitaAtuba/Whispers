@extends("layouts.master")

@section("title")
Whispers:Login
@endsection("title")

@section("hero")
  <!-- HERO -->
   <div class="container-fluid">
    <div class="row">
            <div class="col">
                <div class="hero">
                     <img src="/whispers/image/2.jpg" class="img-fluid" alt="hero">
                      <div class="col hero-body">
                    <p class="hero-txt">Whispers</p>
                    <p class="mb-5 hero-msg text-white">share your thoughts,desires and secrets</p>
                    <a href="#" class="btn btn-outline-dark p-3">Join Whispers</a>
                </div>
                </div>
            </div>
        </div>
   </div>
@endsection("hero")
@section("content")

<!-- DASHBOARD-->
    <x-userdashboard></x-userdashboard>
   
  <div class="card-body">
    <h5 class="card-title my-4"> User Profile</h5>
    <div class="row">
        <div class="col">
                <form >
                        <div class="mb-3">
                            <label for="title">Update Username:</label>
                            <input type="text" name="name" class="form-control" placeholder="username">
                        </div>
                        <div class="mb-3">
                           <button name="btn" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
            </div>
        </div>
    </div> 
    
    <!-- CARD LISTING -->
<div class="container-fluid my-5">
    <div class="row my-5" align="center">
        <div class="col-md-4 mb-2">
            <div class="card py-4" style="width: 18rem;">
        <p class="text-center"><i class="fa-solid fa-handshake text-warning"></i></p>
  <div class="card-body">
    <h5 class="card-title">Your Thoughts</h5>
    <p class="card-text">Share your thoughts and opinions.</p>
  </div>
    </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card py-4" style="width: 18rem;">
            <p class="text-center"><i class="fa-solid fa-comments text-warning"></i></p>
    <div class="card-body">
        <h5 class="card-title">Your Desires</h5>
        <p class="card-text">Sare your secret desires,what do you want.</p>
    </div>
    </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card py-4" style="width: 18rem;">
            <p class="text-center"><i class="fa-solid fa-user-secret text-warning"></i></p>
    <div class="card-body">
        <h5 class="card-title">Your Secrets</h5>
        <p class="card-text">Your secrets remain anonymous,don't hold back.</p>
    </div>
    </div>
        </div>
    </div>
</div>

   <!--TOP POST -->
   <div class="container-fluid">
    <div class="row my-4">
        <div class="col-12">
                <h3>Top Whispers</h3>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card">
            <img src="/whispers/image/kristina-flour-BcjdbyKWquw-unsplash.jpg" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Best Birthday</h5>
            <p class="card-text">Last years birthday, i finally broke free from the shackles of my parents,had the craziest house party...</p>
            <a href="#" class="btn btn-outline-dark">Read more</a>
        </div>
        </div>
        </div>

        <div class="col-md-4  mb-3">
            <div class="card">
            <img src="/whispers/image/Screenshot 2025-07-29 021438.jpg" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Lost in my thoughts</h5>
            <p class="card-text">I did something i shouldn't have done,now it haunts me everywhere i go all i see are flashes of ...</p>
            <a href="#" class="btn btn-outline-dark">Read more</a>
        </div>
        </div>
        </div>

        <div class="col-md-4  mb-3">
            <div class="card ">
            <img src="/whispers/image/Screenshot 2025-07-29 021735.jpg" class="card-img-top" alt="...">
            <div class="card-body">
            <h5 class="card-title">Sugar mamacita</h5>
            <p class="card-text">My sugar mummy picked me up from the streets,cleaned me up,invested in my business now she wants me to ....</p>
            <a href="#" class="btn btn-outline-dark">Read more</a>
        </div>
        </div>
        </div>

    </div>
   </div>
@endsection("content")
  