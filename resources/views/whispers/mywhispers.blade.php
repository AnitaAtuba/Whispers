@extends("layouts.master")

@section("title")
Whispers:Login
@endsection()


@section("content")

            <!-- DASHBOARD -->
            <x-userdashboard/>
                    @if(session("success"))
                    <x-alert type="success" message="{{session('success')}}"></x-alert>
                    @endif
            
                    <div style="overflow-x:auto">
                   <table class="table table-bordered table-hover border border-subtle rounded" >
                    <tr class="text-center text-primary">
                        <th class="text-primary">S/N</th>
                        <th class="text-primary">Title</th>
                        <th class="text-primary">Post</th>
                        <th class="text-primary">likes</th>
                        <th class="text-primary">Hearts</th>
                        <th class="text-primary">Comments</th>
                        <th class="text-primary" >Date</th>
                        <th class="text-primary">Action</th>
                    </tr>
                    <tbody>
                      @forelse($post as $po)
                      <tr>
                        <td>{{$loop->iteration}}.</td>
                        <td ><strong>{{ $po->name }}</strong></td>
                        <td>{{ $po->content }}</td>
                        <td class="text-center">{{$po->likes_count ?: ""}}</td>
                        <td class="text-center">{{$po->hearts_count ?: ""}}</td>
                        <td class="text-center">{{$po->comments_count ?: ""}}</td>
                        <td style="" class="">{{ $po->updated_at->format('d/m/y') }}</td>
                        <td>
                      <a href="{{route('dashboard.postedit',['id'=>$po->id])}}" class="btn btn-dark mb-1"><span><i class="fa-solid fa-pen"></i></span> Edit</a>
                      <a href="{{route('dashboard.delete',['id'=>$po->id])}}" class="btn btn-warning"><span><i class="fa-solid fa-trash"></i></span> Delete</a>
                      </td>
                      @empty
                      <td colspan="8" >
                       <p class="alert alert-info"> No,Whispers yet,share your thoughts,desires and secrets... </p>
                      </td>
                    </tr>
                    @endforelse
                   
                </tbody>
                   </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
    
@endsection()
  