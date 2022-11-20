<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{

    public function index()
    {
        $lists = Todo::all();
        return view('home',compact('lists'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required'
        ]);

        $data = $request->all();
        $myData = new Todo;
        $myData->title = $request->title;
        $myData->save();
        return redirect('/');
        
    }


    public function show(Todo $toDoList)
    {
        //
    }


    public function edit($id)
    {
        $editList = Todo::find($id);
        return view('edit', compact('editList'));
        // dd('edit', $id);
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'title'=>'required'
        ]);
        $editList = Todo::find($id);
        $editList->title = $request->title;
        if(isset($_POST['checkbox'])){
            $editList->done = 1;
        }else{
            $editList->done = 0;
        }
        $editList->save();
        return redirect('/');
    }


    public function destroy($id)
    {
        $deleteTarget = Todo::find($id);
        isset($deleteTarget) ? $deleteTarget->delete() : null;
        return redirect()->back();
    }
}
