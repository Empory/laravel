<?php
namespace App\Http\Controllers;
use App\Models\Task;  

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TodoController extends Controller
{
    function edit($id){
        $data=Task::find($id);
    	return view('update',['todo'=>$data]);
    }

    // Update Todo
    function update(Request $request,$id){
        $todo=Task::find($id);
        $todo->title=$request->input('title');
        $todo->description=$request->input('desc');
        $todo->save();
        return redirect('todo/edit/'.$id)->with('success', 'Task has been updated!');
    }
    // Delete Todo Task
    function delete($id){
        DB::table('tasks')->where('id', $id)->delete();
        return redirect('/')->with('success', 'Task has been deleted!');
    }
}
