@extends("layouts.master")

@section("title")
Whispers:Homepage
@endsection("title")


@section("hero")
 <!-- HERO -->
 
<div class="container-fluid">
    <div class="row">
            <div class="col">
                <div class="hero">
                     <img src="/whispers/image/2.jpg"  alt="hero">
                      <div class="col hero-body">
                    <p class="hero-txt">Whispers</p>
                    <p class="mb-2 hero-msg">share your thoughts,desires and secrets...</p>
                    <a href="#" class="btn btn-outline-dark col-lg-6 p-2 fs-4">Join Whispers</a>
                </div>
</div>
            </div>
            <hr>

</div>

 <br>
  <br>
  <br>

@endsection("hero")
@section("content")
<!-- CARD LISTING -->
<div class="container-fluid my-5">
    <div class="row my-5" align="center">
        <div class="col-md-4 mb-2">
            <div class="card py-4 shadow" style="height:200">
        <p class="text-center"><i class="fa-solid fa-handshake text-primary"></i></p>
  <div class="card-body">
    <h4 class="card-title text-primary">Your Thoughts</h4>
    <p class="card-text">Share your thoughts and opinions.</p>
  </div>
    </div>
            </div>
            <div class="col-md-4 mb-2 ">
                <div class="card py-4 shadow"  style="height:200">
            <p class="text-center"><i class="fa-solid fa-comments text-primary"></i></p>
    <div class="card-body">
        <h4 class="card-title text-primary">Your Desires</h4>
        <p class="card-text ">Sare your secret desires,what do you want.</p>
    </div>
    </div>
            </div>
            <div class="col-md-4 mb-2">
                <div class="card py-4 shadow" style="height:200">
            <p class="text-center"><i class="fa-solid fa-user-secret text-primary"></i></p>
    <div class="card-body">
        <h4 class="card-title text-primary">Your Secrets</h4>
        <p class="card-text ">Your secrets remain anonymous.</p>
    </div>
    </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
   <!--TOP POST -->
   <div class="container-fluid my-5">
    <div class="row my-5">
        <div class="col-12">
                <p class="fs-2 head"><strong>Top Whispers</strong></p>
        </div>
        @foreach($post as $po)
        <div class="col-md-4 mb-3">
            <div class="card">
            <img src="/whispers/image/kristina-flour-BcjdbyKWquw-unsplash.jpg" class="card-img-top" alt="...">
            
            <div class="card-body">
            <h5 class="card-title fw-1 border border-subtle rounded p-3 my-3">{{$po->name}}</h5>
            <p class="card-text">{{ Str::limit($po->content,110,'...')}}</p>
            <!-- <a href="#" class="btn btn-outline-dark">Read more</a> -->
        </div>
        </div>
        </div>
        @endforeach
        </div>
        </div>
    </div>
   </div>
@endsection("content")
