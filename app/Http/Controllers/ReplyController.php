<?php

namespace App\Http\Controllers;

use App\Reply;
use Illuminate\Http\Request;
use App\Http\Resources\ReplyResource;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Console\Question\Question;

class ReplyController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(question $question)
    {
        return ReplyResource::collection($question->replies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(question $question, Request $request)
    {
       $reply =  $question->replies()->create($request->all());   

        return response( ['reply' => new ReplyResource($reply)] , Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function show(question $question, Reply $reply)
    {
        return new ReplyResource($reply);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Reply $reply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Reply  $reply
     * @return \Illuminate\Http\Response
     */
    public function destroy(question $question, Reply $reply)
    {
        $reply->delete();

        return response('reply deleted successfully' ,  Response::HTTP_NO_CONTENT );
    }
}
