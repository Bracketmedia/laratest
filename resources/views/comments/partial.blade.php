@foreach($comments as $comment)
    <div class="col">
        <h6 class="text-info text-right">{{$comment->updated_at}}</h6>
        <p class="text-justify font-italic">{{$comment->content}}</p>
        <h6 class="text-left font-weight-bold">{{$comment->author->name}}</h6>
        @if(auth()->user()->role_id == 1)
            <a href="" role="button" class="btn btn-link">Edit</a>
            <a href="" role="button" class="btn btn-link">Delete</a>
        @elseif(auth()->user()->role_id == 2)
            <a href="" role="button" class="btn btn-link">Edit</a>
        @endif
    </div>
    <hr>
@endforeach
