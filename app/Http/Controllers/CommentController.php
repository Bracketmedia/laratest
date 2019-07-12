<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCommentRequest;
use App\Comment;
use \Mail;
use \Response;

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

        $view = view('comments.tablerow', ['row' => $oStore])->render();
        $oStore = array_merge($oStore->toArray(), array('tablerow' => $view));

        return Response::json($oStore);
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
            #$comment->user_id = \Auth::user()->id;
            $comment->save();

            $view = view('comments.tablerow', ['row' => $comment])->render();
            $comment = array_merge($comment->toArray(), array('tablerow' => $view));

            return Response::json($comment);
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

            return Response::json($comment);
        } else {
            abort(404);
        }
    }

    /**
     * Get data of the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function getone($id)
    {   
        $user  = Comment::where('id', $id)->first();
 
        return Response::json($user);
    }
}
