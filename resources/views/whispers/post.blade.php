@extends("layouts.master")

@section("title")
Whispers:Login
@endsection("title")


@section("content")

 <!-- Post comments -->
  <div class="container-fluid my-5">
    <div class="row my-5 ">
  @foreach($post as $po)

            <div class="col-md-4 mb-3">
                <div class="card" >
                    <div class="card-body" style="height:250">
                       <div class="border border-subtle rounded p-2 my-2  title">
                         <h4 class="card-title  text-center">{{$po->name}}</h4>
                       </div>
                        <p class="card-text border border-subtle rounded p-2">{{ Str::limit($po->content,110,'...')}}</p>
                    </div>
                    <div class="card-body ">
                    <div class="my-2">
                        <!-- like btn -->
                        <button class="btn btn-outline-primary like-btn"  data-id="{{$po->id}}">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span id="like-count-{{ $po->id }}">{{ $po->likes()->count() ?: '' }}</span></button>
                            <!-- heart btn -->
                            <button class="btn btn-outline-danger heart-btn" data-id="{{ $po->id }}">
                            <i class="fa-solid fa-heart"></i> 
                            <span id="heart-count-{{ $po->id }}">{{ $po->hearts()->count() ?: '' }}</span>
                        </button>
                        <!-- comment btn -->
                        <a   href="{{ route('whispers.postdetail',$po->id) }}" class="btn btn-outline-dark commentbtn" data-id="{{ $po->id }}"><i class="fa-solid fa-comment"></i> <span id="comment-count-{{ $po->id}}">{{ $po->comments()->count() ?: '' }}</span></a>
                    </div>
                    <div class="my-2">
                        <a href="{{ route('whispers.postdetail',$po->id) }}" class="btn btn-primary">Read more</a>
                        
                    </div>
                    </div>
                    </div>
            </div>
            @endforeach
        </div>
    </div>   
@endsection("content")
<script src="/whispers/js/jquery-3.7.1.min.js"></script>
    <script>
$(function() {
    // Like button
    $('.like-btn').click(function() {
        postId = $(this).data('id');
        button =$(this);

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

        alert(postId);
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


    function commentsCounts(){
         $(".comment-count").each(function(){
            span = $(this);
            postId = $(this).data("id");  
            
                   span.load("/whispers/posts/" + postId + "/comments/count")
                    
                   });
               }
             commentsCounts();  
});
</script>
  