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
    <h3 class="card-title my-4 text-primary text-center">Delete Whisper Post</h3>
    <div class="row">
                <div>
                    @if(session("success"))
                    <x-alert type="success" message="{{session('success')}}"></x-alert>
                    @endif
                    <form action="{{route('dashboard.postdelete',['id'=>$post->id])}}" method="post">
                       @method("delete") 
                      @csrf
                        <div class="mb-3">
                            <h5>Are you sure you want to delete <strong class="text-danger">" {{$post->name}} "?</strong></h5>
                        </div>

                        <div class="mb-3">
                           <button name="btn" class="btn btn-danger">Delete</button>
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
    

@endsection("content")
  