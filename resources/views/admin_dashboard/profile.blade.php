@extends("layouts.master")

@section("title")
Whispers:Login
@endsection("title")


@section("content")
                <!-- DASHBOARD -->
    <x-admin-nav/>
            <!-- FORM -->
  <div class="card-body">
    <h3 class="card-title my-4 text-primary text-center">Update Admin Profile</h3>
    <div class="row">
                <div>
                    @if(session("success"))
                    <x-alert type="success" message="{{session('success')}}"></x-alert>
                    @endif
                    <form action="{{route('dashboard.profile')}}" method="post">
                     @method("patch") 
                      @csrf
                        <div class="mb-3">
                            @error("name")
                            <p class="alert alert-warning">{{$message}}</p>
                            @enderror
                            <label for="username">Update Username:</label>
                            <input type="text" name="username" class="form-control" value="{{ucfirst($user->username)}}">
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
    
@endsection("content")
  