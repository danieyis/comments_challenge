<?php

namespace App\Http\Controllers;

use App\Article;

class ArticleController extends Controller
{
    /**
     * Default function who return first article from database
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     *
     * @author Dany
     */
    public function index(){

        return view('index', ["article" => Article::first()]);
    }
}
