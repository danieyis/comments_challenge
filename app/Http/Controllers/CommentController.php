<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Http\Requests\CommentValidation;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Create comment
     *
     * @param CommentValidation $request
     *
     * @return Comment
     *
     * @author Dany
     */
    public function create(CommentValidation $request){
       return response()->json(Comment::addComment($request->input('article_id'),
           $request->input('comment_id'),
           $request->input('name'),
           $request->input('comment')));
    }
}
