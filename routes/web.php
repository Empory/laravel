<?php
use App\Models\Task;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $tasks = Task::orderBy("created_at", "asc")->get();
    return view('tasks',[
        "tasks" => $tasks
    ]);
});

Route::post("/task", function (Request $request){
    $validator = Validator::make($request->all(),[
        "name" => "required|max:255"
    ]);
    if($validator->fails()){
        return redirect("/")
        ->withInput()
        ->withErrors($validator);
    }
    $task = new Task;
    $task->name = $request->name;
    $task->save();

    return redirect("/");

});
Route::delete("/task/{id}",function ($id){
    Task::findOrFail($id)->delete();
    
});