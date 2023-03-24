<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Tag;
use App\Models\Todo;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

use function GuzzleHttp\Promise\all;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = Auth::user();
        $user_id = Auth::id();
        $todos = Todo::where('user_id', $user_id)->get();
        // dd($todos);
        return view('index', ['todos' => $todos, 'user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(ClientRequest $request)
    {
        $user_id = Auth::id();
        $form = array(
            'user_id' => $user_id,
            'content' => $request->input('content'),
            'tag_id' => $request->input('tag_id')
        );
        // dd($form);
        Todo::create($form);
        return redirect('/todos');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request)
    {
        $form = $request->all();
        unset($form['_token']);
        Todo::find($request->id)->update($form);
        return redirect('/todos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Todo::find($request->id)->delete();
        return redirect('/todos');
    }

    public function find()
    {
        $user = Auth::user();
        $todos = array();
        return view('find', compact('user', 'todos'));
    }

    public function search(Request $request)
    {
        $user_id = Auth::id();
        $tag_id = $request->input('tag_id');
        $keyword = $request->input('content');

        if (isset($tag_id) && isset($keyword)) {
            $user = Auth::user();
            $todos = Todo::where('user_id', $user_id)
                ->where('tag_id', $tag_id)
                ->where('content', 'LIKE', "%{$keyword}%")
                ->get();
            return view('find', compact('user', 'todos'));
        }


        if (isset($keyword)) {
            $user = Auth::user();
            $todos = Todo::where('user_id', $user_id)
                ->where('content', 'LIKE', "%{$keyword}%")
                ->get();
            return view('find', compact('user', 'todos'));
        }

        if (isset($tag_id)) {
            $user = Auth::user();
            $todos = Todo::where('user_id', $user_id)
                ->where('tag_id', $tag_id)
                ->get();
            return view('find', compact('user', 'todos'));
        }

        if (!isset($tag_id) && !isset($keyword)) {
            $user = Auth::user();
            $todos = Todo::where('user_id', $user_id)
                ->get();
            return view('find', compact('user', 'todos'));
        }
        // dd($todos);

    }
}
