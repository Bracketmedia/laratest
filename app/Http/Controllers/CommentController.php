<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Comment;
use \Mail;

class CommentController extends Controller
{
    const APAGINATE = '1|2|5|10|20|50|100|200|500';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->paginate = $request->paginate ?? 10;
        $aPaginate = explode('|', $this::APAGINATE);

        $comment = $this->comment
            ->fullSearch($request->search)
            ->paginate($request->paginate)
        ;
        return view('comments.index', compact('comment', 'request', 'aPaginate'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCommentRequest $request)
    {
        $oStore = new Comment([
            'comment' => $request->get('comment'),
            'user_id' => \Auth::user()->id
        ]);
        $oStore->save();

        return redirect(route('comments.index'))->with(
            'success',
            'El comentario se agregó con éxito'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comment = $this->comment
            ->find($id)
        ;
        if ($comment) {
            return view('comments.show', compact('comment'));
        } else {
            abort(404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comment = $this->comment
            ->find($id)
        ;
        if ($comment) {
            return view('comments.edit', compact('comment'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCommentRequest $request, $id)
    {
        $comment = $this->comment
            ->find($id)
        ;
        if ($comment) {
            $comment->comment = $request->get('comment');
            $comment->user_id = \Auth::user()->id;
            $comment->save();

            return redirect(route('comments.index'))->with(
                'success',
                'El comentario se modificó con éxito'
            );
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyform($id)
    {
        $comment = $this->comment
            ->find($id)
        ;
        if ($comment) {
            return view('comments.destroyform', compact('comment'));
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment = $this->comment
            ->find($id)
        ;
        if ($comment) {
            $comment->delete();

            return redirect(route('comments.index'))->with(
                'success',
                'El comentario se borró con éxito'
            );
        } else {
            abort(404);
        }
    }
}
