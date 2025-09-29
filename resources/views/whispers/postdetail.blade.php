@extends("layouts.master")

@section("title")
Whispers:Login
@endsection("title")


@section("content")

 <!-- Post comments -->
  <div class="container-fluid my-5">
    <div class="row my-5 ">
  @if($post)

            <div class="col-md-8 offset-md-2 mb-3">
                <div class="card" >
                    <div class="card-body" style="height:250">
                       <div class="border border-subtle rounded p-2 my-2  title">
                         <h4 class="card-title  text-center">{{$post->name}}</h4>
                       </div>
                        <p class="card-text border border-subtle rounded p-2">{{$post->content}}</p>
                    </div>
                   
                    <div class="card-body ">
                    <div class="my-2">
                        <!-- like button -->
                         <button class="btn btn-outline-primary like-btn" data-id="{{$post->id}}">
                            <i class="fa-solid fa-thumbs-up"></i>
                          <span id="like-count-{{ $post->id }}">{{ $post->likes()->count()?: ""}}</span></button>
                          <!-- heart button -->
                           <button class="btn btn-outline-danger heart-btn" data-id="{{ $post->id }}">
                            <i class="fa-solid fa-heart"></i> 
                            <span id="heart-count-{{ $post->id }}">{{ $post->hearts()->count()?: ""}}</span>
                        </button>
                        <!-- comment button -->
                         <button class="btn btn-outline-dark " data-id="{{ $post->id }}"><i class="fa-solid fa-comment"></i> <span id="comment-count-{{ $post->id}}">{{ $post->comments()->count() ?: "" }}</span></button>
                    </div>
                    <div class="my-2"> 
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Comment</span>
                        <textarea class="form-control" aria-label="With textarea" id="commentContent" placeholder="type comment here..."></textarea>
                        </div>
                        <button class="btn btn-dark my-3 commentbtn" data-id="{{ $post->id }}">Post Comment</button>
                        <hr class="mb-4">
                         <ul class="list-group list-group-flush" id="listComment">
                        @forelse($post->comments as $comment) 
                        <span class="bg-dark text-center text-white py-1 rounded-5" style="width:40px">{{ $loop->iteration}}.</span>{{-- Numbering --}}
                        <li class="list-group-item"> <strong>{{ $comment->user->username }}:</strong> 
                        {{ $comment->content }}<br> <small class="text-muted">posted {{ $comment->created_at->diffForHumans() }}</small></li>
                        <hr>
                        @empty
                        <li class="list-group-item">No comments yet.</li>
                        @endforelse
                    </ul>
                    </div>
                    </div>
            </div>
            @endif
        </div>
    </div>   
@endsection("content")
  <script src="/whispers/js/jquery-3.7.1.min.js"></script>
  <script>
    $(function(e){
        $(".commentbtn").click(function(e){
            e.preventDefault();
           postId= $(this).data('id');
           content = $('#commentContent').val();
    //    alert(content);

    if(content.trim() === ""){
        alert("Comment cannot be empty");
        return;
    }

        $.ajax({
            url:"{{ url('/whispers/postdetail') }}/"+ postId + "/comments/ajax",
            type:"POST",
            data: {
                _token:"{{ csrf_token() }}",
                content:content
            },
            success:function(response){
                if(response.success){
                    $('#listComment').append('<li class="list-group-item">'+'<strong>'+response.comment.user+':'+'</strong>'+response.comment.content+'<br><small class="text-muted">Just Now</small>'+'</li>'+ '<hr>');

                    $('#commentContent').val('');
                }else{
                    alert("Failed to save comment");
                }
            },
            error:function(xhr){
                alert("falied to load comment.")
            }
        })
      });

      $('.like-btn').click(function() {
        postId = $(this).data('id');
        button =$(this);

        // alert(postId);
        $.ajax({
            url: "{{ url('/whispers/posts') }}/" + postId + "/like",
            type: "POST",
            data: { _token: "{{ csrf_token() }}"},
            success: function(response) {
                if (response.success) {
                    $('#like-count-'+postId).text(response.count);
                }
            }
        });
    });

    // Heart button
    $('.heart-btn').click(function() {
         postId = $(this).data('id');
         button =$(this);

        
        $.ajax({
            url: "{{ url('/whispers/posts') }}/" + postId + "/heart",
            type: "POST",
            data: { _token: "{{ csrf_token() }}" },
            success: function(response) {
                if (response.success) {
                    $('#heart-count-' +postId).text(response.count);
                }
            }
        });
    });


   });
  </script>