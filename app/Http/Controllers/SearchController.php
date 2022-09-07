<?php

namespace App\Http\Controllers;

use App\Contracts\CommentServiceContract;
use App\Http\Requests\SearchRequest;

class SearchController extends Controller
{

    private CommentServiceContract $commentService;

    public function __construct(CommentServiceContract $commentService)
    {
        $this->commentService = $commentService;
    }

    public function searchByWord(SearchRequest $request)
    {
        $data = $this->commentService->getCommentByWord($request->input('text'));
//        dd($data);

        return view('layouts\search', compact('data'));

    }
}
