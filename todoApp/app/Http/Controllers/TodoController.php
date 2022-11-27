<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; //--------//
use App\Exports\FileExport; //--------//
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel; //-------//

class TodoController extends Controller
{

    public function index()
    {
        $user_id = Auth::getUser()->id;
        $lists = DB::select("SELECT * FROM todos WHERE user_id = $user_id");
        $header = ['id', 'title', 'done', 'img', 'created_at', 'updated_at'];
        $line =[];

        $f = fopen(public_path('csv/file.csv'), 'w');
        fputcsv($f, $header);

        foreach($lists as $list){
            $line = array($list->id, $list->title, $list->done, $list->img, $list->created_at, $list->updated_at);
            // Storage::disk('csvFile')->put('csv/file.csv', $line);
            fputcsv($f, $line);
        }
        fclose($f);

        return view('home',compact('lists'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'img'=> 'required'
        ]);

        $data = $request->all();
        $myData = new Todo;
        $myData->title = $request->title;
        $myData->user_id = Auth::id();
        // $myData->img = $request->img;

        $image = $request->file('img')->extension();
        $path = public_path('img');
        $imgList = date('YmdHms').'.'.$image;
        $request->img->move($path,$imgList);
        $myData['img'] = $imgList;
        $myData->save();

        return redirect('todo/');
        
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
        return redirect('todo/');
    }


    public function destroy($id)
    {
        $deleteTarget = Todo::find($id);
        isset($deleteTarget) ? $deleteTarget->delete() : null;
        session()->flash('delete', "The To Do With Title '$deleteTarget->title' Has Been Deleted ⚠️");
        return redirect()->back();
    }

}
