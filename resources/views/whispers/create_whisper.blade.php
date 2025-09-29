@extends("layouts.master")

@section("title")
Whispers:Login
@endsection("title")


@section("content")
<!-- DASHBOARD -->
  <x-userdashboard></x-userdashboard>
<!-- FORM -->
  <div class="card-body">
    <h3 class="card-title my-4 text-primary text-center">Create Whispers</h3>
    <div class="row">
                <div>
                    @if(session("success"))
                    <x-alert type="success" message="{{session('success')}}"></x-alert>
                    @endif
                    <form action="{{route('dashboard.store')}}" method="post">
                      @csrf
                        <div class="mb-3">
                            @error("name")
                            <p class="alert alert-warning">{{$message}}</p>
                            @enderror
                            <label for="name">Whisper Title:</label>
                            <input type="text" name="name" class="form-control" placeholder="title">
                        </div>
                        <div class="mb-3">
                           @error("name")
                            <p class="alert alert-warning">{{$message}}</p>
                            @enderror
                            <label  for="content">Whisper Content:</label>
                            <textarea name="content" class="form-control" placeholder="whisper post..."></textarea>
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
  