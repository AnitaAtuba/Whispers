@extends("layouts.master")



@section("content")
   <!-- WHISPER REGISTERATION -->
   <div class="container-fluid mb-4">
    <div class="row">
        <div class="col-md-8 offset-md-2 p-4 border border-subtle my-5 card rounded">
        <div class="mb-4"><h4>Whisper Registration</h4></div>
            <form action="{{route('action_register')}}" method="post">
                @csrf
                <div class="col mb-3 ">
                    @error("name")
                     <p class="alert alert-warning">{{$message}}</p>
                     @enderror
                    <label for="full name">Full name</label>
                    <input type="text" class="form-control" name="name" placeholder="Enter your fullname">
                </div>
                <div class="col mb-3">
                    @error("email")
                     <p class="alert alert-warning">{{$message}}</p>
                     @enderror
                    <label for="email">Email </label>
                    <input type="email" class="form-control" name="email" placeholder="Enter your email">
                </div>
                <div class="col mb-3">
                     @error("username")
                     <p class="alert alert-warning">{{$message}}</p>
                     @enderror
                    <label for="username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your Username">
                </div>
                 <div class="col mb-3">
                     @error("password")
                     <p class="alert alert-warning">{{$message}}</p>
                     @enderror
                    <label for="password">Password </label>
                    <input type="password"  class="form-control"name="password" placeholder="Enter your password">
                </div>
                <div class="col mb-3">
                    <label for="password">Confirm Password </label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="confirm your password">
                </div>
                    <div class="col mb-3">
                     @error("gender")
                     <p class="alert alert-warning">{{$message}}</p>
                     @enderror
                    <label for="gender">Gender </label><br>
                    <input type="radio" value="male"  name="gender"> Male
                    <input type="radio" value="female" name="gender"> female
                </div>
                    <div class="col-mb-3">
                    <button class="btn btn-warning col-6 text-white">Sign Up</button>
                </div>
            </form>
            </div>
        </div>
    </div>   
@endsection("content")