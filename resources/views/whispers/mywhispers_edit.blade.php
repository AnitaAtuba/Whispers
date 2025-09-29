@extends("layouts.master")

@section("title")
Whispers:Login
@endsection("title")



@section("content")

<!-- DASHBOARD -->
   <div class="container-fluid my-5">
    <div class="row my-5 ">
            <div class="col-md-8 offset-md-2 ">
               <div class="card">
  <div class="card-header d-flex justify-content-center align-items-center">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <a class="nav-link " aria-current="true" href="{{route('dashboard')}}"><i class="fa-solid fa-bars"></i> Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('dashboard.create')}}"><i class="fa-solid fa-pen-to-square"></i> Write Whisper</a>
      </li>
      <li class="nav-item">
        <a class="nav-link"  href="{{route('dashboard.mywhispers')}}"><i class="fa-solid fa-list"></i> My whispers</a>
      </li>
     <li class="nav-item">
        <a class="nav-link"  href="profile.html"><i class="fa-solid fa-user"></i> Profile</a>
      </li>
    </ul>
  </div>

 
                   <!-- FORM -->
  <div class="card-body">
    <h3 class="card-title my-4 text-primary text-center">Update Whisper Post</h3>
    <div class="row">
                <div>
                    @if(session("success"))
                    <x-alert type="success" message="{{session('success')}}"></x-alert>
                    @endif
                    <form action="{{route('dashboard.postupdate',['id'=>$post->id])}}" method="post">
                       @method("patch") 
                      @csrf
                        <div class="mb-3">
                            @error("name")
                            <p class="alert alert-warning">{{$message}}</p>
                            @enderror
                            <label for="name">Whisper Title:</label>
                            <input type="text" name="name" class="form-control" placeholder="title" value="{{old('name',$post->name)}}">
                        </div>
                        <div class="mb-3">
                           @error("name")
                            <p class="alert alert-warning">{{$message}}</p>
                            @enderror
                            <label  for="content">Whisper Content:</label>
                            <textarea name="content" class="form-control" placeholder="whisper post...">{{old('content',$post->content)}}</textarea>
                        </div>
                        <div class="mb-3">
                           <button name="btn" class="btn btn-warning">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div> 
                </div>
            </div>
        </div>
    </div>
    
    <!-- CARD LISTING -->
<!-- <div class="container-fluid my-5">
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
</div> -->

   <!--TOP POST -->
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
  