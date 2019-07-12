<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Types\Integer;

class CommentController extends Controller
{
    use SoftDeletes;

    public function __construct()
    {
        $this->middleware('auth');

        $this->middleware('admin', ['only' => ['update']]);

        $this->middleware('sysadmin', ['only' => ['destroy']]);
    }

    public function index()
    {
        $comments = Comment::all();
        return view('comments.index', compact('comments'));
    }

    public function store()
    {
        $data = request()->validate([
            'content' => 'required',
            'author_id' => ['required', 'numeric'],
        ], [
            'content.required' => 'El comentario no puede estar vacío.',
            'author_id.required' => 'Debe indicar el autor',
            'author_id.numeric' => 'El id de autor debe ser numérico'
        ]);

        $comment = Comment::create([
            'content' => $data['content'],
            'author_id' => $data['author_id']
        ]);

        return response()->json($comment);
    }

    public function update($id)
    {
        $data = request()->validate([
            'content' => 'required',
            'author_id' => ['required', 'numeric'],
        ], [
            'content.required' => 'El comentario no puede estar vacío.',
            'author_id.required' => 'Debe indicar el autor',
            'author_id.numeric' => 'El id de autor debe ser numérico'
        ]);

        $comment = Comment::findOrFail($id);
        $comment->update($data);

        return response()->json($comment);
    }

    public function destroy($id)
    {
        $comment = Comment::findOrFail($id);
        $comment->delete();

        return response()->json($comment);
    }
}
