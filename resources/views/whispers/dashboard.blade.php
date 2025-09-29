@extends("layouts.master")

@section("title")
Whispers:Login
@endsection("title")


@section("content")

  <!-- DASHBOARD -->
  <x-userdashboard/>
  <!-- DASHBOARD CONTENT-->
  <div class="card-body text-center">
    <h3 class="card-title my-4 text-primary">Hello, {{ucfirst(auth()->user()->username)}}</h3>
    <div class="row">
        <div class="col ">
            <div class="col border border-subtle p-1 card m-1 shadow">
                <p><i class="fa-solid fa-thumbs-up text-primary"></i></p>
                <p class="text-primary">Likes</p>
                <p  class="text-primary">{{ $totalLikes ?: ''}}</p>
            </div>
        </div>
        <div class="col border border-subtle p-1 card m-1 shadow">
            <p><i class="fa-solid fa-heart text-danger"></i></p>
                <p  class="text-danger">Hearts</p>
                <p  class="text-danger">{{ $totalHearts ?: ''}}</p>
        </div>
        <div class="col border border-subtle p-1 card m-1 shadow">
            <p><i class="fa-solid fa-comment text-dark"></i></p>
                <p  class="text-dark">Comments</p>
                <p  class="text-dark">{{$totalComments ?: ''}}</p>
        </div>
    </div>
  </div>
</div> 
            </div>
        </div>
    </div> 
      
    



  <!-- <div class="container-fluid">
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
</div> -->

@endsection("content")
  