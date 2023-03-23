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
        $todos = Todo::all();
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
        unset($form['_token']);
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

        $user = Auth::user();
        $tag_id = $request->input('tag_id');
        $keyword = $request->input('content');
        // $input = array(
        //     'tag_id' => $tag_id,
        //     'keyword' => $keyword
        // );
        // $todos = Todo::doSearch($input);

        if (null !== $tag_id and $keyword) {
            $todos = Todo::where('tag_id', $tag_id)
                ->where('content', 'LIKE BINARY', "%{$keyword}%")
                ->get();
        } elseif (!empty($tag_id)) {
            $todos = Todo::where('tag_id', $tag_id)
                ->get();
        } else {
            if (!empty($keyword)) {
                $todos = Todo::where('content', 'LIKE BINARY', "%{$keyword}%")
                    ->get();
            }
        }

        return view('find', compact('user', 'todos'));
    }
}
