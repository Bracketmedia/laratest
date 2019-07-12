@extends('.layouts.custom')

@section('title', 'Comments')

@section('content')
    <main class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-xs-12">
                    <div class="card">
                        <div class="card-header">Comments...</div>
                        <div class="card-body" id="commentContent">
                            @foreach($comments as $comment)
                                <div class="col item{{$comment->id}}">
                                    <h6 class="text-info text-right">{{$comment->updated_at}}</h6>
                                    <p class="text-justify font-italic">{{$comment->content}}</p>
                                    <h6 class="text-left font-weight-bold">{{$comment->author->name}}</h6>

                                    @if(auth()->user()->role_id == 1)
                                        <button class="edit-modal btn btn-info" data-id="{{$comment->id}}"
                                                data-content="{{$comment->content}}">
                                            Edit
                                        </button>
                                        <button class="delete-modal btn btn-danger" data-id="{{$comment->id}}"
                                                data-content="{{$comment->content}}">
                                            Delete
                                        </button>
                                    @elseif(auth()->user()->role_id == 2)
                                        <button class="edit-modal btn btn-info" data-id="{{$comment->id}}"
                                                data-content="{{$comment->content}}">
                                            Edit
                                        </button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                        <br>
                        <br>
                        <a role="button" href="#" class="add-modal btn btn-success">Add a Comment</a>
                    </div>
                </div>


            </div>
        </div>
    </main>

    <!-- Modal form to add a comment -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_add" cols="40" rows="5"></textarea>
                            </div>
                        </div>
                        <input type="hidden" id="author_id" name="author_id" value="{{auth()->user()->id}}">
                        <input type="hidden" id="author_name" name="author_name" value="{{auth()->user()->name}}">
                        <input type="hidden" id="author_role" name="author_role" value="{{auth()->user()->role_id}}">
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success add" data-dismiss="modal">
                            Add
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to edit a comment -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_edit" disabled>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="content">Content:</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" id="content_edit" cols="40" rows="5"></textarea>
                            </div>
                        </div>
                        <input type="hidden" id="author_id" name="author_id" value="{{auth()->user()->id}}">
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            Edit
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to delete a form -->
    <div id="deleteModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body">
                    <h3 class="text-center">Are you sure you want to delete the following comment?</h3>
                    <br />
                    <form class="form-horizontal" role="form">
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="id">ID:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="id_delete" disabled>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger delete" data-dismiss="modal">
                            Delete
                        </button>
                        <button type="button" class="btn btn-warning" data-dismiss="modal">
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
