<?php

namespace App\Http\Controllers;

use App\Http\Requests\EditTodoRequest;
use App\Http\Requests\TodoCreateRequest;
use App\Todo;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Http\Request;
use Request;



class TodoController extends Controller
{
    //
    public function index(Request $request){

        $id = Auth::user()->id;

        $todos = Todo::latest('created_at')->where('owner_id', '=', $id )->limit(5)->get();

        $categorys = DB::table('todos_category')->where('owner_id', '=', $id )->get();
        $for_select = [];

        foreach ($categorys as $category) {
            $for_select[$category->id] = $category->name;
        }

        $quant = 5;

        return view('todo_in', array('user' => Auth::user(), 'todos' => $todos, 'quant' => $quant, 'request' => $request, 'categorys' =>$categorys, 'for_select' => $for_select ));
    }

    // show single todo_task
    public function show($id){
        $todo = Todo::findOrFail($id);
        return view('todo_id', array('user' => Auth::user(), 'todo' => $todo ));
    }

    public function store(Request $request){

        $input = Request::all();
        if($input!=''){
            $input['owner_id'] = Auth::user()->id;
            Todo::create($input);
        }


        //$todos = Todo::latest()->get();

        //   return view('todo', array('user' => Auth::user(), 'todos' => $todos ));
        return redirect('todo');
    }

    public function edit($id){

        $todo = Todo::findOrFail($id);

        return view('edit_todo', array('user' => Auth::user(), 'todo' => $todo ));

    }

    public function update($id, Request $request){

        $todo = Todo::findOrFail($id);
        $ver = Request::all();
        $todo->update($ver);

        return view('edit_todo', array('user' => Auth::user(), 'todo' => $todo ));

    }

    public function destroy($id){

        $todo = Todo::findOrFail($id);

        $todo->delete();

        $todos = Todo::latest()->get();

        $quant = '';

        $categorys = DB::table('todos_category')->where('owner_id', '=', $id )->get();

        foreach ($categorys as $category) {
            $for_select[$category->id] = $category->name;
        }

        return view('todo_in', array('user' => Auth::user(), 'todos' => $todos, 'quant' => $quant, 'for_select' => $for_select ));
    }

    public function load_data(Request $request, $from){

        $id = Auth::user()->id;

            $todos = Todo::latest('created_at')->where('owner_id', '=', $id )->offset($from)->limit(5)->get();
        //

        $quant = '5';

        $categorys = DB::table('todos_category')->where('owner_id', '=', $id )->get();

        foreach ($categorys as $category) {
            $for_select[$category->id] = $category->name;
        }

        return view('todo_in_in', array('user' => Auth::user(), 'todos' => $todos, 'quant' => $quant, 'request' => $request, 'categorys' =>$categorys, 'for_select' => $for_select));

    }

    public function load_data_cat(Request $request, $from, $cat_id){

        $id = Auth::user()->id;
        if($cat_id){
            $todos = Todo::latest('created_at')->where([
                ['owner_id', '=', $id],
                ['cat_id', '=', $cat_id],
            ] )->offset($from)->limit(5)->get();
        }else{
            $todos = Todo::latest('created_at')->where('owner_id', '=', $id )->offset($from)->limit(5)->get();
        }
//


        $quant = '5';

        $categorys = DB::table('todos_category')->where('owner_id', '=', $id )->get();

        foreach ($categorys as $category) {
            $for_select[$category->id] = $category->name;
        }

        return view('todo_in_in', array('user' => Auth::user(), 'todos' => $todos, 'quant' => $quant, 'request' => $request, 'categorys' =>$categorys, 'for_select' => $for_select));

    }

    public function todo_cat($cat_id){

        $id = Auth::user()->id;

        $categorys = DB::table('todos_category')->where('owner_id', '=', $id )->get();

        $todos = Todo::latest('created_at')->where([
            ['owner_id', '=', $id],
            ['cat_id', '=', $cat_id],
            ] )->limit(5)->get();

        $quant = '5';

        foreach ($categorys as $category) {
            $for_select[$category->id] = $category->name;
        }

        return view('todo_in', array('user' => Auth::user(), 'todos' => $todos, 'quant' => $quant, 'categorys' =>$categorys, 'for_select' => $for_select ));
    }

}
